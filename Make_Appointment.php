<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make an Appointment</title>
    
    <!-- Flatpickr CSS for styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>
<body>
    <h1>Make an Appointment</h1>
    
    <!-- Form to create a new appointment -->
    <form action="create_handler.php" method="POST">
        <!-- Label and input field for patient name -->
        <label for="patientName">Patient Name:</label>
        <input type="text" id="patientName" name="patientName" required><br>
        
        <!-- Label and input field for date & time picker -->
        <label for="appointmentDateTime">Date & Time:</label>
        <input type="text" id="appointmentDateTime" name="appointmentDateTime" placeholder="Select date and time" required><br>
        
        <!-- Label and textarea for specifying the reason for the appointment -->
        <label for="reason">Reason:</label>
        <textarea id="reason" name="reason" required></textarea><br>
        
        <!-- Submit button to book the appointment -->
        <button type="submit">Book Appointment</button>
    </form>
    
    <!-- Include Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script>
        // Initialize Flatpickr on the date & time input field
        flatpickr("#appointmentDateTime", {
            enableTime: true,               // Enable time selection
            dateFormat: "Y-m-d H:i",        // Date format (year-month-day hour:minute)
            minDate: "today",               // Prevent past dates from being selected
            time_24hr: true                 // Optional: 24-hour time format
        });
    </script>
</body>
</html>
