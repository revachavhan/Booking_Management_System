<?php
include 'db_connect.php';
$result = $conn->query("SELECT * FROM bookings");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Booking Management System</title>
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
        <div class="header d-flex justify-content-between align-items-center">
            <h3>Current Bookings</h3>
            <a href="booking.php" class="btn btn-success">+ Add Booking</a>
        </div>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-bordered table-hover mt-4 bg-white">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Room No</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['customer_name'] ?></td>
                        <td><?= $row['contact_no'] ?></td>
                        <td><?= $row['room_number'] ?></td>
                        <td><?= $row['check_in_date'] ?></td>
                        <td><?= $row['check_out_date'] ?></td>
                        <td>
                            <span class="badge bg-<?= 
                                $row['status'] == 'Booked' ? 'primary' :
                                ($row['status'] == 'Checked In' ? 'success' :
                                ($row['status'] == 'Checked Out' ? 'secondary' :
                                ($row['status'] == 'Cancelled' ? 'danger' : 'dark')))
                            ?>">
                                <?= $row['status'] ?>
                            </span>
                        </td>
                        <td>
                            <a href="edit_booking.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete_booking.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this booking?');">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-info mt-4">No bookings found. Click "Add Booking" to create one.</div>
        <?php endif ?>
    </div>
</div>

</body>
</html>