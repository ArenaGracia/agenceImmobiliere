<?php
    function psqlConnection(){
        $_user = 'postgres';
        $_pass = 'adminp15';
        $_host = 'localhost';
        $_port = '5432';
        $_dbName = 'postgres';
        $_dsn='pgsql:host='.$_host.';port='.$_port.';dbname='.$_dbName;

        try {
            $_connection = new PDO($_dsn, $_user, $_pass);
        } catch (PDOException $e) {
            print "Erreur ! : " . $e->getMessage();
            die();
        }
            var_dump($_connection);
            return $_connection;
    }
    psqlConnection();

?>