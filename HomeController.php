<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "IDEAAssignment";

    class HomeController{

        function HomeControllerConstruct($row){
            $conn = getConnection();
            putData($row, $conn);
            $conn->close();
        }
        
    }

    function getConnection() {
        return new mysqli($servername, $username, $password, $dbname);
    }
	
	function putData($data, $conn){
		//WRITE A FUNCTION TO INSERT YOUR DATA INTO MYSQL DB. YOU DONT NEED TO BUILD DB THOUGH. SCHEMA IS GIVEN IN schema.txt IN ROOT FOLDER

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $stmt = $conn->prepare("insert into covidStats(stateCode, resultCount) values(?, ?)");
        $stmt->bind_param("ss", $data['stateCode'], $data['resultCount']);
        $stmt->execute();
	}

?>