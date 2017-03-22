<?php
	function database_create($db_name) {
		$servername = "localhost";
		$username = "root";
		$password = "secretpass";

		try {
			$conn = new PDO("mysql:host=$servername", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "CREATE DATABASE IF NOT EXISTS $db_name";
			$conn->exec($sql);
			$sql = "USE " . $db_name;
			$conn->exec($sql);
			$sql = "CREATE TABLE IF NOT EXISTS users (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				email_address VARCHAR(255) NOT NULL,
				username VARCHAR(255) NOT NULL,
				password VARCHAR(255) NOT NULL
			)";
			$conn->exec($sql);
			$sql = "CREATE TABLE IF NOT EXISTS pictures (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				picture VARCHAR(255) NOT NULL,
				user_id INT(11) NOT NULL,
				likes INT(11) NOT NULL,
				INDEX (user_id)
			)";
			$conn->exec($sql);
			$sql = "CREATE TABLE IF NOT EXISTS comments (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				comments VARCHAR(255) NULL,
				picture_id INT(11) NOT NULL,
				INDEX (picture_id)
			)";
			$conn->exec($sql);
		}
		catch(PDOException $error) {
			echo $sql . "<br>" . $error->getMessage();
		}
	}
?>
