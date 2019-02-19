<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>barber</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="form-group">
<form action="/barber/complain/create" method="POST">
    <p>Please fill your complain and possible solution bellow</p>
    <label>Complaint</label>
    <input type="text"  name="complaint" id="complaint-input" class="form-control" required>
    <label>Possible Solution</label>
    <input type="text" name="solution"  class="form-control" id="solution-input">
    <input type="submit" value="Submit Complain"  class="btn btn-primary">
</form>
</div>


</body>
</html>
