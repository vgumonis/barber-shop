<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
if (isset($params['message'])) {
    echo $params['message'];
}
?>

<?php if (isset($params['reservation'])) {
    $reservation = $params['reservation'];
    echo 'Your reservation at : ' . $reservation['datetime'] . ' .Your request number is : ' . $reservation['code'];
    echo '<form action="/customer/reservation/cancel" method="POST">';
    echo '<input type="hidden" name="id" value="'.$reservation['id'].'">';
    echo '<input type="submit" value="Cancel">';
    echo '</form>';
}


/// FOrma kurioje yra tik submit mygtukas, po submit daro POST i controleri cancelRezervation
/// hidden input va;ue = $reservation['id'];
/// repo update reservation status = cancel
///
///
?>




</body>
</html>