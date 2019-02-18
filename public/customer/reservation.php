<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../Style/styles.css">
</head>
<body>
<?php
    if (isset($params['message'])) {
        echo "<div class='message'>".$params['message']."</div>";
    }
?>
    <form action="/customer/reservation/create" method="POST">
        First name:<br>
        <input type="text" name="first_name" required>
        <br>
        Last name:<br>
        <input type="text" name="last_name" required>
        <input type="datetime-local" step= "900" name="datetime"  required>
        <br><br>
        <input type="submit" value="Create">
    </form>
    <br>
    <form action="/customer/reservation/existing" method="POST">
        Find Reservation
        <br>Code:<br>
        <input type="text" name="code" required>
        <br>
        <input type="submit" value="Find reservation">
    </form>

<script src="../Scripts/script.js"></script>
</body>
</html>