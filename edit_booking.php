<?php
include 'db_connect.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM bookings WHERE id = $id");
$booking = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $contact_no = $_POST['contact_no'];
    $room_number = $_POST['room_number'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE bookings SET customer_name=?, contact_no=?, room_number=?, check_in_date=?, check_out_date=?, status=? WHERE id=?");
    $stmt->bind_param("ssisssi", $customer_name, $contact_no, $room_number, $check_in, $check_out, $status, $id);

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
    <title>Edit Booking</title>
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
            <h3>Edit Booking</h3>
        </div>

        <form class="mt-4 bg-white p-4 rounded shadow-sm" method="POST">
            <div class="mb-3">
                <label class="form-label">Customer Name</label>
                <input type="text" name="customer_name" value="<?= $booking['customer_name'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contact_no" value="<?= $booking['contact_no'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Room Number</label>
                <input type="number" name="room_number" value="<?= $booking['room_number'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Check-in Date</label>
                <input type="date" name="check_in" value="<?= $booking['check_in_date'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Check-out Date</label>
                <input type="date" name="check_out" value="<?= $booking['check_out_date'] ?>" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select" required>
                    <option value="Booked" <?= $booking['status'] == 'Booked' ? 'selected' : '' ?>>Booked</option>
                    <option value="Checked In" <?= $booking['status'] == 'Checked In' ? 'selected' : '' ?>>Checked In</option>
                    <option value="Checked Out" <?= $booking['status'] == 'Checked Out' ? 'selected' : '' ?>>Checked Out</option>
                    <option value="Cancelled" <?= $booking['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update Booking</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
</body>
</html>