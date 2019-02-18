<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>customer</title>
</head>
<body>

<form action="/barber/complain-form" method="get">
    <input type="submit" value="Submit Complain" />
</form>

<?php

echo '<pre>';
print_r($params['reservations']);
echo '</pre>';
?>



</body>
</html>