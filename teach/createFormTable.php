<?php

$sql = "CREATE TABLE IF NOT EXISTS `myDb`.`dailyForm` ( `formID` INT(5) NOT NULL AUTO_INCREMENT , `timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `username` VARCHAR(30) NOT NULL , `class` VARCHAR(10) NOT NULL , `title` TINYTEXT NOT NULL , `questions` TEXT NOT NULL , `completed` TINYINT NULL DEFAULT NULL , PRIMARY KEY (`formID`)) ENGINE = InnoDB;"


$mysqli = new mysqli("localhost","root","duckvin","myDb");
if ($mysqli->connect_errno){
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
};



$mysqli->close();

?>