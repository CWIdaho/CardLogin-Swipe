<?php
	require_once 'dbcon.php';
	class DBConnector
	{
        private $_connection;
        function __construct()
        {
            $this->_connection = new mysqli(_IP, _USER, _PASSWORD, _DBNAME);
        }

        public function getUser()
        {
            if($result = $this->_connection->query("SELECT * FROM users"))
            {
                print_r($result->fetch_assoc());
            }
            else
            {
                echo $this->_connection->errno;
            }
        }
        public function getSwipes($id)
        {
			echo $id;
			if($result = $this->_connection->query("SELECT * FROM swipes WHERE cwiid LIKE ".$id.""))
			{
				print_r($result->fetch_assoc);
			}
        }
	}
    $dbconnector = new DBConnector();
