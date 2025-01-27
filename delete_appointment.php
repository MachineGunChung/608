<?php
include 'config.php';

// Get the appointment ID from the URL
$appointment_id = intval($_GET['id']);

// Query to fetch the appointment details
$query = "SELECT * FROM appointments WHERE appointment_id = $appointment_id";
$result = mysqli_query($conn, $query);
$appointment = mysqli_fetch_assoc($result);

if (!$appointment) {
    echo "<p>Appointment not found.</p>";
    exit;
}

// Handle the delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
    if (mysqli_query($conn, $query)) {
        header('Location: list_appointments.php');
        exit;
    } else {
        echo "<p>Error deleting appointment.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Appointment</title>
</head>
<body>
    <h1>Delete Appointment</h1>
    <p>Are you sure you want to delete the following appointment?</p>
    <p>Appointment ID: <?php echo $appointment['appointment_id']; ?></p>
    <p>Patient ID: <?php echo $appointment['patient_id']; ?></p>
    <p>Provider ID: <?php echo $appointment['provider_id']; ?></p>
    <p>Appointment Date: <?php echo $appointment['appointment_date']; ?></p>
    <p>Appointment Time: <?php echo $appointment['appointment_time']; ?></p>
    <p>Reason: <?php echo $appointment['reason']; ?></p>
    <p>Status: <?php echo $appointment['status']; ?></p>

    <form method="POST">
        <button type="submit">Delete Appointment</button>
        <a href="list_appointments.php">Cancel</a>
    </form>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
