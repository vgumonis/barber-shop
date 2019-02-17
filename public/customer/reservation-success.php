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
}

?>

</body>
</html>