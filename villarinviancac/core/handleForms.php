<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';  

// Handle inserting a new employee
if (isset($_POST['insertNewEmployeeBtn'])) {
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $contactNumber = trim($_POST['contactNumber']);
    $profession = trim($_POST['profession']);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($experienceLevel) && !empty($certifications) && !empty($profession)) {
        $query = insertIntoDBAdmins($pdo, $firstName, $lastName, $email, $phone, $experienceLevel, $certifications, $profession);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

// Handle editing an existing employee
if (isset($_POST['editEmployeeBtn'])) {
    $employee_id = $_GET['employee_id'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $contactNumber = trim($_POST['contactNumber']);
    $profession = trim($_POST['profession']);

    if (!empty($employee_id) && !empty($firstName) && !empty($lastName) && !empty($email) && !empty($phone) && !empty($experienceLevel) && !empty($certifications) && !empty($profession)) {
        $query = updateEmployee($pdo, $employee_id, $firstName, $lastName, $email, $phone, $experienceLevel, $certifications, $profession);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Update failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

// Handle deleting an employee
if (isset($_POST['deleteEmployeeBtn'])) {
    $employee_id = $_GET['employee_id'];

    $query = deleteEmployee($pdo, $employee_id);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

?>
