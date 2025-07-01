<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $room_number = $_POST['room_number'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $contact = $_POST['contact_number'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("INSERT INTO bookings (customer_name, contact_no, room_number, check_in_date, check_out_date, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $customer_name, $contact, $room_number, $check_in, $check_out, $status);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>New Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <h4 class="text-white text-center py-3" style="border-bottom: 1px solid #fff;">
            <img src="logo.png" alt="Logo" style="width: 30px; margin-right: 10px;">
            HOTELS
        </h4>
        <a href="index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>">Dashboard</a>
        <a href="booking.php" class="<?= basename($_SERVER['PHP_SELF']) == 'booking.php' ? 'active' : '' ?>">New Booking</a>
    </div>

    <div class="container-main w-100">
        <div class="header">
            <h3>Add New Booking</h3>
        </div>

        <form class="mt-4 bg-white p-4 rounded shadow-sm" method="POST" action="">
            <div class="mb-3">
                <label for="customer_name" class="form-label">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="room_number" class="form-label">Room Number</label>
                <input type="number" name="room_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Check-in Date</label>
                <input type="date" name="check_in" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check-out Date</label>
                <input type="date" name="check_out" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Booking Status</label>
                <select name="status" class="form-select" required>
                    <option value="Booked">Booked</option>
                    <option value="Checked In">Checked In</option>
                    <option value="Checked Out">Checked Out</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Booking</button>
            <a href="index.php" class="btn btn-secondary">Back</a>
        </form>
    </div>
</div>
</body>
</html>