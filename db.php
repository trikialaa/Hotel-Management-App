<?php

/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'hotel';

// Create connection
$conn = new mysqli($host,$user,$pass,$db) ;

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected to database\n";