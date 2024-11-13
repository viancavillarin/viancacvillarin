<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Professionals Registration</title>
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
    <h3>Welcome to IT Professionals Registration System. Input your details here to register</h3>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="firstName">First Name</label>
            <input type="text" name="firstName" required>
        </p>
        <p>
            <label for="lastName">Last Name</label>
            <input type="text" name="lastName" required>
        </p>
        <p>
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </p>
        <p>
            <label for="birthdate">Birthdate</label>
            <input type="date" name="birthdate" id="birthdate" required>
        </p>
        <p>
            <label for="contactNumber">Contact Number</label>
            <input type="text" name="contactNumber" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="text" name="email" required>
        </p>
        <p>
            <label for="profession">Profession</label>
            <select name="profession" id="profession" required>
                <option value="">Select</option>
                <option value="Database Administrator">Database Administrator</option>
                <option value="Software Engineer">Software Engineer</option>
                <option value="Network Administrator">Network Administrator</option>
                <option value="Cybersecurity Analyst">Cybersecurity Analyst</option>
                <option value="Data Scientist">Data Scientist</option>
                <option value="Web Developer">Web Developer</option>
                <option value="DevOps Engineer">DevOps Engineer</option>
                <option value="Cloud Architect">Cloud Architect</option>>
                <option value="IT Support Specialist">IT Support Specialist</option>
                <option value="Machine Learning Engineer">Machine Learning Engineer</option>
            </select>
        </p>
        <input type="submit" name="insertNewEmployeeBtn">
    </form>

    <table style="width:50%; margin-top: 50px;">
        <tr>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Birthdate</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Profession</th>
        </tr>
        <?php $seeAllDbAdmins = seeAllDbAdmins($pdo); ?>
        <?php foreach ($seeAllDbAdmins as $row): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['employee_id']); ?></td>
                <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                <td><?php echo htmlspecialchars($row['gender']); ?></td>
                <td><?php echo htmlspecialchars($row['birthdate']); ?></td>
                <td><?php echo htmlspecialchars($row['contact_number']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['profession']); ?></td>
                <td>
                    <a href="editAdmin.php?employee_id=<?php echo $row['employee_id']; ?>">Edit</a>
                    <a href="deleteAdmin.php?employee_id=<?php echo $row['employee_id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>