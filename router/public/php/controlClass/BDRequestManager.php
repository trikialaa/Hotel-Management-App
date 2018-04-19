<?php
/**
 * Created by PhpStorm.
 * User: hamouda
 * Date: 15/04/2018
 * Time: 13:38
 */

    require __DIR__ .'/../dataClass/Client.php';
    require __DIR__ .'/../dataClass/Chambre.php';
    require __DIR__ .'/../dataClass/Agent.php';


    class BDRequestManager
    {
        private static $_dbname = "BDHOTEL";
        private static $_user = "root";
        private static $_pwd = "";
        private static $_host = "localhost";
        private static $_bdd = null;
        private static $_bdrm = null;

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

        public static function getInstance()
        {

            if (!self::$_bdrm) {
                self::$_bdrm = new BDRequestManager();
                return self::$_bdrm;
            } else
                return self::$_bdrm;
        }

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
                return true;
            }
        }

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



        /*
        public function verifyAgentCredentials($login, $password)
        {
            try {
                $req = self::$_bdd->prepare('SELECT * FROM agent WHERE Login_Agent = ? AND Password_Agent <= ?');

                $req->execute(array($login, $password));
                if ($req->rowCount() == 0)
                    return false;
                else
                    return true;
            } catch (PDOException $e) {
                die("Error" . $e->getMessage());
            }


        }

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

        public function addSejourToBd($checkin,$checkout,$clientid){
            try {
                if (isset(self::$_bdrm)) {
                    $req = self::$_bdd->prepare("insert into bdhotel.sejour (`checkin`, `checkout`, `clientID`)
                                                           VALUES (:val1,:val2,:val3)");
                    $req->execute(array(
                        'val1' => $checkin,
                        'val2' => $checkout,
                        'val3' => $clientid
                    ));
                    return self::$_bdd->lastInsertId();

                }
            } catch (PDOException $e) {
                print "Erreur : " . $e->getMessage();
                die();
                return -1;
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

    }