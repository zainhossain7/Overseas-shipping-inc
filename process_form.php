<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "your-email@example.com"; // Replace with your email
    $subject = "New Booking Request";
    
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service-type'];
    $pickup = $_POST['pickup'];
    $delivery = $_POST['delivery'];
    $date = $_POST['date'];
    $details = $_POST['details'];
    
    // Create email message
    $message = "New Booking Details:\n\n";
    $message .= "Name: $name\n";
    $message .= "Email: $email\n";
    $message .= "Phone: $phone\n";
    $message .= "Service: $service\n";
    $message .= "Pickup Location: $pickup\n";
    $message .= "Delivery Location: $delivery\n";
    $message .= "Preferred Date: $date\n";
    $message .= "Additional Details: $details\n";
    
    // Save to CSV file
    $csv_file = 'bookings.csv';
    $csv_data = array($name, $email, $phone, $service, $pickup, $delivery, $date, $details, date('Y-m-d H:i:s'));
    
    $fp = fopen($csv_file, 'a');
    fputcsv($fp, $csv_data);
    fclose($fp);
    
    // Send email
    mail($to, $subject, $message);
    
    // Redirect back with success message
    header("Location: booking.html?status=success");
    exit();
}
?> 