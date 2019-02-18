<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>customer</title>
</head>
<body>
<?php
    if (isset($params['message'])) {
        echo $params['message'];
    }
?>
    <form action="/customer/reservation/create" method="POST">
        First name:<br>
        <input type="text" name="first_name" required>
        <br>
        Last name:<br>
        <input type="text" name="last_name" required>
        <input type="datetime-local" step= "900" name="datetime" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <form action="/customer/reservation/existing" method="POST">
        Code:<br>
        <input type="text" name="code" required>
        <br>
        <input type="submit" value="Find reservation">
    </form>
</body>
</html>