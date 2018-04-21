<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 13:38
 */

    require __DIR__ . '/../dataClass/Client.php';
    require __DIR__ . '/../dataClass/Chambre.php';
    require __DIR__ . '/../dataClass/Agent.php';
    require __DIR__ . '/../dataClass/ElementFacture.php';
    require __DIR__ . '/../dataClass/Sejour.php';


    class BDRequestManager
    {
        //some static attribute describing the database
        private static $_dbname = "BDHOTEL";
        private static $_user = "root";
        private static $_pwd = "";
        private static $_host = "localhost";
        private static $_bdd = null;
        private static $_bdrm = null;

        //private constructor to make one object
        private function __construct()
        {
            try {
                self::$_bdd = new PDO("mysql:host=" . self::$_host . ";dbname=" . self::$_dbname . ";charset=utf8",
                    self::$_user,
                    self::$_pwd,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));

            } catch (PDOException $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }

        //it controls the construction of this class object
        public static function getInstance()
        {

            if (!self::$_bdrm) {
                self::$_bdrm = new BDRequestManager();
                return self::$_bdrm;
            } else
                return self::$_bdrm;
        }

        // add client from attributes to database - returns his database id
        public function addClientToBd($nom, $prenom, $ntel, $email, $idtype, $idnumber)
        {
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into bdhotel.client (`nom`, `prenom`, `NTel`, `email`, `idtype`, `idnumber`) 
                                                           VALUES (:val1,:val2,:val3,:val4,:val5,:val6)");
                    $req->execute(array(
                        'val1' => $nom,
                        'val2' => $prenom,
                        'val3' => $ntel,
                        'val4' => $email,
                        'val5' => $idtype,
                        'val6' => $idnumber,
                    ));
                    return self::$_bdd->lastInsertId();
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }


        }

        // add client from attributes to database  fro reservation - returns his database id
        public function addClientToBdForReservation($nom, $prenom,$idtype, $idnumber)
        {
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into bdhotel.client (`nom`, `prenom`, `NTel`, `email`, `idtype`, `idnumber`) 
                                                           VALUES (:val1,:val2,:val5,:val6)");
                    $req->execute(array(
                        'val1' => $nom,
                        'val2' => $prenom,
                        'val5' => $idtype,
                        'val6' => $idnumber,
                    ));
                    return self::$_bdd->lastInsertId();
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }


        }

        //return array of all clients in database
        public function getAllClients(){
            $sqlreq = "SELECT * FROM CLIENT";

            try{
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute();
                return $req->fetchAll(PDO::FETCH_CLASS,"Client");
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }

        //check the admin's credentials - returns boolean
        public function checkAdmin($login,$mdp){
            $sqlreq = "SELECT * FROM admin where admin.LOGIN = ? and admin.PASSWORD = ?";
            try{

                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($login,$mdp));
                $abc = $req->fetch(PDO::FETCH_OBJ);

                if(is_bool($abc))
                    return false;
                return true;

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return false;
            }
        }

        //return true if agent login is available - false if not
        public function checkAgentLogin($login){
            $sqlreq = "SELECT * FROM agent where agent.Login_Agent = ?";
            try{

                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($login));
                $abc = $req->fetch(PDO::FETCH_OBJ);

                if(is_bool($abc))
                    return false;
                else{
                    return true;
                }

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return false;
            }
        }

        //returns the client bd id if exists - if not returns -1
        public function isClientInBd($idtype,$idval){
            $sqlreq = "SELECT * FROM client cl where cl.IDNumber = ? and cl.IDType = ?";
            try{

                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($idval,$idtype));
                $abc = $req->fetch(PDO::FETCH_OBJ);

                if(is_bool($abc))
                    return -1;
                else{
                    return $abc->CLIENTID;
                }

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return -1;
            }
        }

        //check the agent's credentials - returns agent object
        public function checkAgent($login,$mdp){
            $sqlreq = "SELECT * FROM agent where agent.Login_Agent = ? and agent.Password_Agent = ?";
            try{

                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($login,$mdp));
                $abc = $req->fetch(PDO::FETCH_OBJ);

                if(is_bool($abc))
                    return null;
                else{
                    return new Agent($abc->AGENTID,$abc->LastName,$abc->FirstName,$abc->Address,$abc->NumTel,
                        $abc->Login_Agent,$abc->Password_Agent);
                }

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }

        //returns all element facture by type
        public function getElementFactureByType($type){
            $sqlreq = "SELECT * FROM elementfacture el where el.TYPE = ? ";

            try{
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($type));
                return $req->fetchAll(PDO::FETCH_CLASS,"ElementFacture");
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }

        //returns all distinct types of element facture
        public function getAllEFTypes(){
            $sqlreq = "SELECT DISTINCT el.TYPE FROM elementfacture el";

            try{
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute();
                return $req->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }

        }

        //create reservation form roomnumber and two dates - returns database sejour id at success - -1 if not
        public function createReservation($roomnumber,$datearr,$datedepp){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into sejour (`CheckIn`, `CheckOut`, `CHAMBREID`, `RESERVE`) 
                                                           VALUES (:val1,:val2,:val5,:val6)");
                    $req->execute(array(
                        'val1' => $datearr,
                        'val2' => $datedepp,
                        'val5' => $roomnumber,
                        'val6' => 1,
                    ));
                    return self::$_bdd->lastInsertId();
                }
                else{
                    return -1;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }
        }

        //link client and sejour in SEJOURCLIENT table in database
        public function addClientToSejour($idclient,$idsejour){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into sejourclient (`CLIENTID`, `SEJOURID`) 
                                                           VALUES (:val1,:val2)");
                    $req->execute(array(
                        'val1' => $idclient,
                        'val2' => $idsejour
                    ));
                    return self::$_bdd->lastInsertId();
                }
                else
                    return -1;
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }
        }

        //get reservations by client id - returns array of Sejour having reservation set to 1
        public function getReservationsForClient($idclient){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("select * from `sejour` inner join `sejourclient` s on `sejour.SEJOURID` = `s.SEJOURID` where `CLIENTID` = ? and `sejour.RESERVE` = ?");
                    $req->execute(array($idclient,1));
                    return $req->fetchAll(PDO::FETCH_CLASS,"Sejour");
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return null;
            }
        }

        //converts reservation to normal sejour when checking in
        public function setReservationToFalse($sejourid){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("UPDATE `sejour` set `RESERVE` = ? where  `SEJOURID` = ?");
                    $req->execute(array(0,$sejourid));
                    return true;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return false;
            }
        }

        //update client

        //remove sejour after checkout

        //generate facture

        //unlink sejour - client when checking out

        //remove dead reservations

        //add element facture to sejour when consumming

        //add agent by admin

        /*

        public function  getClientsFromRoom($roomid){

            $sqlreq = 'SELECT * FROM client as cl inner join clientsejour c2 on cl.CLIENTID = c2.CLIENTID
                                                  inner join sejour s on c2.SEJOURID = s.SEJOURID
                                                  inner join chambrepleine c3 on s.SEJOURID = c3.SEJOURID
                                                  inner join chambre c4 on c3.CHAMBREID = c4.CHAMBREID
                                                  where c4.CHAMBREID is ? and c4.Type is ? and c4.VueMer is ?';

            try {
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($roomid));
                return $req->fetchAll(PDO::FETCH_CLASS,"Client");

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }



        public function getRoomsFromType($type){
            $sqlreq = ' select * from chambre where Type is ?';

            try {
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($type));
                return $req->fetchAll(PDO::FETCH_CLASS,"Chambre");

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }

        }

        public function getRoomsFromView($view){
            $sqlreq = ' select * from chambre where VueMer is ?';

            try {
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($view));
                return $req->fetchAll(PDO::FETCH_CLASS,"Chambre");

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }

        public function getRoomsFromTypeWView($type,$view){

            $sqlreq = ' select * from chambre where VueMer is ? and  TYPE is ?';

            try {
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array($view,$type));
                return $req->fetchAll(PDO::FETCH_CLASS,"Chambre");

            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }

        }

        public function getEmptyRoomsFromType($type){

        }

        public function getElementFactureFromRoom($room){

        }*/

        public function getOccupiedRooms()
        {
            $sqlreq = "SELECT CHAMBRE.CHAMBREID FROM CHAMBRE INNER JOIN SEJOUR SJ ON SJ.CHAMBREID = CHAMBRE.CHAMBREID
                        where ((sj.CheckIn <=:minDate AND sj.CheckOut>= :minDate )
                        or 	(sj.CheckIn<= :maxDate AND sj.CheckOut>= :maxDate) 
                        or (sj.CheckIn>= :minDate AND sj.CheckOut<= :maxDate))";

            try{
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute(array('minDate'=>$_GET["date_in"],
                                    'maxDate'=>$_GET["date_out"]));
                return $req->fetchAll(PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());

            }
        }
    }