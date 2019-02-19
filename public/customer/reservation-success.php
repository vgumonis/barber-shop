<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
if (isset($params['message'])) {
    echo "<div class='badge badge-success message'>".$params['message']."</div>";
}
?>

<?php if (isset($params['reservation'])) {
    $reservation = $params['reservation'];
    echo '<br>';
    echo 'Your reservation at : ' . $reservation['datetime'] . ' .Your request number is : ' . $reservation['code'];
    echo '<form action="/customer/reservation/cancel" method="POST">';
    echo '<input type="hidden" name="id" value="'.$reservation['id'].'">';
    echo '<input type="submit" value="Cancel ReservationController" class="btn btn-danger">';
    echo '</form>';
}
?>

</body>
</html>