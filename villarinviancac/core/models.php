<?php 

require_once 'dbConfig.php';

function insertIntoDbAdmins($pdo,$first_name, $last_name, $gender, $birthdate, $contact_number, $email, $profession) {

	$sql = "INSERT INTO db_admins (first_name,last_name,gender,birthdate,contact_number,email,profession) VALUES (?,?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $birthdate, 
		$contact_number, $email, $profession]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllDbAdmins($pdo) {
	$sql = "SELECT * FROM db_admins";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getEmployeeByID($pdo, $employee_id) {
	$sql = "SELECT * FROM db_admins WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$employee_id])) {
		return $stmt->fetch();
	}
}

function updateEmployee($pdo, $employee_id, $first_name, $last_name, 
	$gender, $birthdate, $contact_number, $email, $profession) {

	$sql = "UPDATE db_admins 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					birthdate = ?, 
					contact_number = ?, 
					email = ?, 
					profession = ? 
			WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$birthdate, $contact_number, $email, $profession, $employee_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteEmployee($pdo, $employee_id) {

	$sql = "DELETE FROM db_admins WHERE employee_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$employee_id]);

	if ($executeQuery) {
		return true;
	}

}




?>