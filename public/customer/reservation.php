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
        echo "<div class='badge badge-success message'>".$params['message']."</div>";
    }
?>
    <div class="form-group">
    <form action="/customer/reservation/create" method="POST" >
        <p>Make Reservation</p>
        <label> First name:</label>
        <input type="text" name="first_name"  class="form-control"required>
        <label> Last name:</label>
        <input type="text" name="last_name"  class="form-control" required>
        <label> Date:</label>
        <input type="datetime-local" step= "900" name="datetime"  class="form-control" required>
        <input type="submit" value="Create" class="btn btn-primary">
    </form>
    </div>
    <br>
<div class="form-group">
    <form action="/customer/reservation/existing" method="POST">
        <p>Find Reservation<p>
        <label>Code:</label>
        <input type="text" name="code" class="form-control" required>
        <input type="submit" value="Find reservation" class="btn btn-primary">
    </form>
    <div>

<script src="../Scripts/script.js"></script>
</body>
</html>