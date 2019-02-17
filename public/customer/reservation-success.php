<?php $reservation = $params['reservation']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
success

<?php echo 'Your reservation at : ' . $reservation['datetime'] . ' .Your request number is : ' . $reservation['code']; ?>

</body>
</html>