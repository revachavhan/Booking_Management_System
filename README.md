🏨 Room Booking Management System

A simple and responsive *Room Booking Management System* built using *PHP, **MySQL, **HTML, **CSS (Bootstrap)*. It mimics a Laravel-style UI and provides a clean admin dashboard to manage room bookings.

## 🚀 Features

- 📅 Book a Room with Date & Time
- 📝 Edit/Delete Bookings
- 📊 Dashboard with Room Stats (Total, Booked, Available)
- 🔎 Search Functionality
- 🧑 Laravel-style layout with Bootstrap

## 🛠 Technologies Used

- PHP (Core)
- MySQL (Database)
- Bootstrap 5
- HTML, CSS, JavaScript

## 💾 Database

Database Name: room_booking_db  
Tables: rooms, bookings

> Import the provided room_booking_db.sql file to get started.


## 📁 Project Structure
```room-booking-system/
│
├── index.php                # Dashboard with stats
├── booking.php              # Add booking form
├── edit_booking.php         # Edit existing booking
├── delete_booking.php       # Delete a booking
├── db_connect.php           # Database connection
├── style.css                # Custom styling
└── room_booking_db.sql      # Database file
```

## 🧑‍💻 How to Run

1. Clone this repo
2. Import room_booking_db.sql into phpMyAdmin
3. Start Apache & MySQL (XAMPP/WAMP)
4. Visit localhost/room-booking-system
