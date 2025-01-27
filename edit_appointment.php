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

// Handle form submission to update the appointment
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient_id = intval($_POST['patient_id']);
    $provider_id = intval($_POST['provider_id']);
    $appointment_date = mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time = mysqli_real_escape_string($conn, $_POST['appointment_time']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $update_query = "UPDATE appointments 
                     SET patient_id = $patient_id, provider_id = $provider_id, 
                         appointment_date = '$appointment_date', appointment_time = '$appointment_time', 
                         reason = '$reason', status = '$status' 
                     WHERE appointment_id = $appointment_id";

    if (mysqli_query($conn, $update_query)) {
        header('Location: list_appointments.php');
        exit;
    } else {
        echo "<p>Error updating appointment.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Appointment</title>
</head>
<body>
    <h1>Edit Appointment</h1>
    <form method="POST">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" value="<?php echo $appointment['patient_id']; ?>"><br>
        
        <label for="provider_id">Provider ID:</label>
        <input type="text" name="provider_id" value="<?php echo $appointment['provider_id']; ?>"><br>

        <label for="appointment_date">Date:</label>
        <input type="date" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>"><br>

        <label for="appointment_time">Time:</label>
        <input type="time" name="appointment_time" value="<?php echo $appointment['appointment_time']; ?>"><br>

        <label for="reason">Reason:</label>
        <input type="text" name="reason" value="<?php echo $appointment['reason']; ?>"><br>

        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $appointment['status']; ?>"><br>

        <button type="submit">Update Appointment</button>
        <a href="list_appointments.php">Cancel</a>
    </form>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
