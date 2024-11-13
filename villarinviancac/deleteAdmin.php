<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

// Fetch the employee details by employee ID
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $getEmployeeByID = getEmployeeByID($pdo, $employee_id);

    // Check if the employee exists
    if (!$getEmployeeByID) {
        echo "Employee not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        body {
            font-family: "Arial";
        }
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        .studentContainer {
            border-style: solid; 
            font-family: 'Arial';
            padding: 20px;
            width: 60%;
            margin: auto;
            background-color: #f9f9f9;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Are you sure you want to delete this user?</h1>
    <form action="core/handleForms.php" method="POST">
        <div class="studentContainer">
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($getEmployeeByID['first_name']); ?></p>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($getEmployeeByID['last_name']); ?></p>
            <p><strong>Gender:</strong> <?php echo htmlspecialchars($getEmployeeByID['gender']); ?></p>
            <p><strong>Birthdate:</strong> <?php echo htmlspecialchars($getEmployeeByID['birthdate']); ?></p>
            <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($getEmployeeByID['contact_number']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($getEmployeeByID['email']); ?></p>
            <p><strong>Profession:</strong> <?php echo htmlspecialchars($getEmployeeByID['profession']); ?></p>

            <!-- Hidden field to pass employee ID for deletion -->
            <input type="hidden" name="employee_id" value="<?php echo $getEmployeeByID['employee_id']; ?>">

            <input type="submit" name="deleteAdminBtn" value="Delete">
        </div>
    </form>
</body>
</html>
