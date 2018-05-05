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

        //done
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

        //done
        // add client from attributes to database  fro reservation - returns his database id
        public function addClientToBdForReservation($nom, $prenom,$idtype, $idnumber)
        {
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into client (`nom`, `prenom`, `idtype`, `idnumber`) 
                                                           VALUES (:val1,:val2,:val3,:val4)");
                    $req->execute(array(
                        'val1' => $nom,
                        'val2' => $prenom,
                        'val3' => $idtype,
                        'val4' => $idnumber
                    ));
                    return self::$_bdd->lastInsertId();
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }


        }

        //done
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

        //done
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

        //done
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

        //done
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

        //done
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

        //done
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

        //done
        //returns all element facture by type
        public function getAllElementFacture()
        {
            $sqlreq = "SELECT * FROM elementfacture";

            try {
                $req = self::$_bdd->prepare($sqlreq);
                $req->execute();
                return $req->fetchAll(PDO::FETCH_CLASS, "ElementFacture");
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
                return null;
            }
        }

        //done
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

        //done
        //create reservation form roomnumber and two dates - returns database sejour id at success - -1 if not
        public function createReservation($roomnumber,$datearr,$datedepp){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into sejour (`CheckIn`, `CheckOut`, `CHAMBREID`, `RESERVE`) 
                                                           VALUES (:val1,:val2,:val3,:val4)");
                    $req->execute(array(
                        'val1' => date("Y-m-d", strtotime($datearr)),
                        'val2' => date("Y-m-d", strtotime($datedepp)),
                        'val3' => $roomnumber,
                        'val4' => 1
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

        //done
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


        //done
        //get reservations by client id - returns array of Sejour having reservation set to 1
        public function getReservationsForClient($idclient){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("select * from sejour e inner join sejourclient s on e.SEJOURID = s.SEJOURID where s.CLIENTID = ? and  e.RESERVE = ?");
                    $req->execute(array($idclient,1));
                    return $req->fetchAll(PDO::FETCH_CLASS,"Sejour");
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return null;
            }
        }

        //done
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

        //done
        //update client - returns boolean
        public function updateClientInfo($clientid, $ntel, $email){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("UPDATE client set `NTel` = ? ,  `Email` = ? where `CLIENTID` = ?");
                    $req->execute(array($ntel,$email,$clientid));
                    return true;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return false;
            }
        }

        //done
        //remove sejour after checkout - return boolean
        public function deleteSejour($sejourid){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("DELETE FROM `sejour` where `SEJOURID` = ?");
                    $req->execute(array($sejourid));
                    return true;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return false;
            }
        }

        //done
        //returns sejourid from room
        public function getSejourFromRoom($room){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("SELECT * FROM `sejour` where `CHAMBREID` = ? and RESERVE = ?");
                    $req->execute(array($room,0));

                    $a = $req->fetch(PDO::FETCH_OBJ);
                    if(isset($a->SEJOURID))
                        return $a->SEJOURID;
                    return -1;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return -1;
            }
        }

        //done
        //generate facture
        public function  generateFacture($sejourid){

            $sqlreq = "SELECT * from facturecomplete e
                                inner join elementfacture f on e.ELEMENTID = f.ELEMENTID   
                                inner join bdhotel.sejour s on e.SEJOURID = s.SEJOURID     
                                where s.SEJOURID  = ? ";

            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare($sqlreq);
                    $req->execute(array($sejourid));
                    return $req->fetchAll(PDO::FETCH_CLASS,'ElementFacture');
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return null;
            }


        }

        //done
        //unlink sejour - client when checking out - return boolean
        public function unlinkSejourFromClient($idclient,$sejourid){
            $sqlreq = "DELETE from `sejourclient` where `CLIENTID` = ? and `SEJOURID` = ?";

            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare($sqlreq);
                    $req->execute(array( $idclient, $sejourid ));
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return false;
            }
        }

        //done
        //remove dead reservations
        public function removeDeadReservation(){
            $today = date("Y-m-d");
            $sqlreq = "DELETE FROM sejour where `RESERVE` = ? and `CheckIn` < ? ";
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare($sqlreq);
                    $req->execute(array(1,$today));
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return false;
            }

        }

        //done
        //get dead reservations
        public function getDeadReservation(){
            $today = date("Y-m-d");
            $sqlreq = "SELECT * FROM `sejour` where `RESERVE` = ? and `CheckIn` < ? ";

            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare($sqlreq);
                    $req->execute(array(1,$today));
                    return $req->fetchAll(PDO::FETCH_CLASS,"Sejour");
                }
                else{
                    return null;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return null;
            }

        }

        //done
        //---------- CONSUMPTION MANAGER ---------------- USE ONLY RESOLVE CONSUMPTION
        private function addConsumptionToSejour($idsejour,$iditem,$quantite){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into facturecomplete (`SEJOURID`, `ELEMENTID`,`Quantite`) 
                                                           VALUES (:val1,:val2,:val3)");
                    $req->execute(array(
                        'val1' => $idsejour,
                        'val2' => $iditem,
                        'val3' => $quantite
                    ));
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return false;
            }
        }
        //done
        private function checkElementExistsInFacture($idsejour,$iditem){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("SELECT * from facturecomplete 
                                  where `ELEMENTID` = ? and `SEJOURID` = ? ");

                    $req->execute(array($iditem,$idsejour));
                    $res = $req->fetch(PDO::FETCH_OBJ);
                    if(isset($res->ELEMENTID))
                        return $res;
                    return -1;
                }
                else{
                    return -1;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return false;
            }

        }
        //done
        private function updateQuantiteElementFacture($idsejour,$iditem,$quatiteFinal){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare(" UPDATE facturecomplete  
                                  set `Quantite` = ? where `sejourid` = ?  and `elementid` = ?");

                    $req->execute(array($quatiteFinal,$idsejour,$iditem));
                    return true;
                }
                else{
                    return false;
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return false;
            }
        }
        //done
        public function resolveConsumption($idsejour,$iditem,$quantite){
            $a = $this->checkElementExistsInFacture($idsejour,$iditem);
            if(isset($a->ELEMENTID)){
                $this->updateQuantiteElementFacture($idsejour,$iditem,$a->Quantite + $quantite);
            }else{
                $this->addConsumptionToSejour($idsejour,$iditem,$quantite);
            }
        }

        //done
        //add agent by admin - return his id in database
        public function addAgent($prenom, $nom, $adr, $NumTel, $login,$password)
        {
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into bdhotel.agent (`FirstName`, `LastName`, `NumTel`, `Address`, `Login_Agent`, `Password_Agent`) 
                                                           VALUES (:val1,:val2,:val3,:val4,:val5,:val6)");
                    $req->execute(array(
                        'val1' => $prenom,
                        'val2' => $nom,
                        'val3' => $NumTel,
                        'val4' => $adr,
                        'val5' => $login,
                        'val6' => $password
                    ));
                    return self::$_bdd->lastInsertId();
                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();

                return -1;
            }


        }




        /**
        FIX ELEMENT FACTURE TABLE + TREAMTMENT-



         **/

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