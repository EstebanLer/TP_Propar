<?php


class dbSingleton
{

    /*
* Mysql database class - only one connection alowed
*/

    private $_connection;
    private static $_instance; //instance unique
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_dbname = "propar_cleaning_company";

    /*
    Get an instance of the Database
    si une instance existe la methode va la retourner
    @return Instance
    */
    public static function getInstance() {
        if(!self::$_instance) {
            self::$_instance = new dbSingleton();
        }
        return self::$_instance;
    }


    // Constructeur
    private function __construct() {
        try{

            $this->_connection = new PDO('mysql:host='.$this->_host.';dbname='.$this->_dbname,
                $this->_username, $this->_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (PdoException $e) {

            echo 'Error : '.$e->getMessage();

        }
    }

    public function __destruct() {
        $this->_connection = null;
    }

    public function getConnection() {
        return $this->_connection;
    }

}