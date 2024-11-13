<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

// Ensure employee_id is set in the URL for editing
if (isset($_GET['employee_id'])) {
    $employee_id = $_GET['employee_id'];
    $getEmployeeByID = getEmployeeByID($pdo, $employee_id);

    // Check if the employee exists in the database
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
    <title>Edit Employee</title>
    <style>
        body {
            font-family: "Arial";
        }
        input, select {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
        input[type="date"] {
            width: 250px;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>    
</head>
<body>
    <h1>Edit Employee Details</h1>
    <form action="core/handleForms.php?employee_id=<?php echo htmlspecialchars($employee_id); ?>" method="POST">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($getEmployeeByID['first_name']); ?>" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($getEmployeeByID['last_name']); ?>" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="">Select</option>
                <option value="Male" <?php echo ($getEmployeeByID['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($getEmployeeByID['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>		
            </select>
        </p>
        <p>
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo htmlspecialchars($getEmployeeByID['birthdate']); ?>" required>
        </p>
        <p>
            <label for="contactNumber">Contact Number</label>
            <input type="text" name="contactNumber" value="<?php echo htmlspecialchars($getEmployeeByID['contact_number']); ?>" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($getEmployeeByID['email']); ?>" required>
        </p>
        <p>
            <label for="profession">Profession</label>
            <select name="profession" id="profession" required>
                <option value="">Select</option>
                <?php
                // List of professions to choose from
                $professions = [
                    "Database Administrator", "Software Engineer", "Network Administrator",
                    "Cybersecurity Analyst", "Data Scientist", "Web Developer",
                    "DevOps Engineer", "Cloud Architect", "IT Support Specialist",
                    "Machine Learning Engineer"
                ];
                foreach ($professions as $profession) {
                    $selected = ($getEmployeeByID['profession'] == $profession) ? 'selected' : '';
                    echo "<option value=\"$profession\" $selected>$profession</option>";
                }
                ?>
            </select>
        </p>
        <p>
            <input type="submit" name="editAdminBtn" value="Update">
        </p>
    </form>
</body>
</html>
