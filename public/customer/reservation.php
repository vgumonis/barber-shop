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
        <input type="text" name="first_name">
        <br>
        Last name:<br>
        <input type="text" name="last_name">
        <input type="datetime-local" step= "900" name="datetime">
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>