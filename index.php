<?php
// Start the PHP session, if needed, for managing user logins or state.
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthy Life Clinic</title>
    <link rel="stylesheet" href="original_template/style.css"> <!-- Make sure this path is correct -->
</head>
<body>
    <h1>Welcome to Healthy Life Clinic</h1>
    <nav>
        <ul>
            <!-- Link to original template if needed -->
            <li><a href="original_template/index.php">Original Template</a></li>
            <!-- Link to the converted template -->
            <li><a href="converted_template/index.php">Converted Template</a></li>
        </ul>
    </nav>

    <p>This is the homepage of Healthy Life Clinic's web application.</p>

    <h2>Navigation</h2>
    <ul>
        <li><a href="List_appointments.php">List Appointments</a></li>
        <li><a href="Make_appointment.php">Make an Appointment</a></li>
        <li><a href="edit_appointment.php">Edit an Appointment</a></li>
        <li><a href="delete_appointment.php">Delete an Appointment</a></li>
        <li><a href="view_appointment.php">View an Appointment</a></li>
    </ul>
</body>
</html>
