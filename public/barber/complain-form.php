<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>barber</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


<form action="/barber/complain/create" method="post">
    Complaint:<br>
    <input type="text"  name="complaint" id="complaint-input"  required>
    <br>
    Possible Solution<br>
    <input type="text" name="solution" id="solution-input">
    <br><br>
    <input type="submit" value="Submit Complain">
</form>


</body>
</html>
