<?php
include 'config.php';

// Check if the user is an admin
if (!isAdmin()) {
    header('Location: login.php');
    exit;
}

// Query to fetch all appointments
$query = "SELECT * FROM appointments";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Appointments</title>
</head>
<body>
    <h1>Manage Appointments</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Patient ID</th>
            <th>Provider ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['appointment_id']; ?></td>
            <td><?php echo $row['patient_id']; ?></td>
            <td><?php echo $row['provider_id']; ?></td>
            <td><?php echo $row['appointment_date']; ?></td>
            <td><?php echo $row['appointment_time']; ?></td>
            <td><?php echo $row['reason']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td>
                <a href="view_appointment.php?id=<?php echo $row['appointment_id']; ?>">View</a>
                <a href="edit_appointment.php?id=<?php echo $row['appointment_id']; ?>">Edit</a>
                <a href="delete_appointment.php?id=<?php echo $row['appointment_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
