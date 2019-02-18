<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if (isset($params['message'])) {
    echo "<div class='message'>".$params['message']."</div>";
}
?>

<?php if (isset($params['reservation'])) {
    $reservation = $params['reservation'];

    echo 'Your reservation at : ' . $reservation['datetime'] . ' .Your request number is : ' . $reservation['code'];
    echo '<form action="/customer/reservation/cancel" method="POST">';
    echo '<input type="hidden" name="id" value="'.$reservation['id'].'">';
    echo '<input type="submit" value="Cancel Reservation">';
    echo '</form>';
}
?>

</body>
</html>