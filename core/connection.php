<?php

    namespace Core;
    /**
     * Connection
     */
    class Connection
    {

        public $conn;
        public function __construct()
        {
            //Insere as configurações de conexão com o banco de dados
            require_once 'config/database.php';
            
            try {
                $this->conn = new \PDO($db['db_driver'].":host=".$db['db_host'].";dbname=".$db['db_name']."",$db['db_user'],$db['db_pass']);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
