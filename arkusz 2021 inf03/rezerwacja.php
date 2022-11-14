<?php
$conn = new mysqli('localhost','root','','');
$base = "CREATE DATABASE IF NOT EXISTS restauracja";
if($conn -> query($base)){
    echo "Utworzono bazę. <br>";
    if($conn -> query("USE restauracja")){
        echo "Użyto bazę. <br>";
    }
    $date = $_POST['date'];
    $howMany = $_POST['howMany'];
    $phone = $_POST['phone'];
    $query = "INSERT INTO stolik (date, howMany, phone)
    VALUES
    ('$date', '$howMany', '$phone')";
    if ($conn -> query($query)){
        echo "Dodano rezerwację.";
    }
};

$conn -> close();
?>