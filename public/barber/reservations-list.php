<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>barber</title>
    <link rel="stylesheet" type="text/css" href="../Style/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>

</head>
<body>
<?php
if (isset($params['message'])) {
    echo "<div class='badge badge-success message'>" . $params['message'] . "</div><br>";
}
?>

<!--LOYALTY-->
<form id="loyalty" action="/barber/reservation/get-by-loyalty" method="GET">
    <input type="hidden" name="loyalty" value="max">
    <input type="submit" value="Get Reservations By Loyalty" class="btn btn-primary">
</form>
<!--TODAY-->
<form id="today" action="/barber/reservation/get-by-date" method="GET">
    <input type="hidden" name="date" value="today">
    <input type="submit" value="Get Todays Reservations" class="btn btn-primary">
</form>

<!--TOMORROW-->
<form id="tomorrow" action="/barber/reservation/get-by-date" method="GET">
    <input type="hidden" name="date" value="tomorrow">
    <input type="submit" value="Get Tomorrows Reservations" class="btn btn-primary">
</form>

<!--SEARCH BY NAME-->
<div class="form-group" id="search-by-name">
    <form  action="/barber/reservation/search-by-name" method="POST">
        <p id="search-by-name-p">Search By Name</p>
    <label>First name:</label>
    <input type=" text" name="first_name" class="form-control" required>
    <label>Last name:</label>
    <input type="text" name="last_name" class="form-control" required>
    <input type="submit" value="Find" class="btn btn-primary">
    </form>
</div>

<!--SEARCH BY DATE-->
<div class="form-group" id="search-by-date">
    <p id="search-by-date-p">Search By Date</p>
    <form  action="/barber/reservation/get-by-date" method="GET">
        <label>Enter date</label>
        <input type="date" name="date" class="form-control" required>
        <input type="submit" value="Find" class="btn btn-primary">
    </form>
</div>

<!--CREATE NEW-->
<div class="form-group" id="create-new">
    <form action="/barber/reservation/create" method="POST">
    <p id="create-new-p">Create New</p>
    <label>First name:</label>
    <input type="text" name="first_name" class="form-control" required>
    <label>Last name:</label>
    <input type="text" name="last_name" class="form-control" required>
    <label>Date:</label>
    <input type="datetime-local" step="900" name="datetime" class="form-control" required>
    <input type="submit" value="Create" class="btn btn-primary">
    </form>
</div>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Date</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Times visited</th>
        <th>Status</th>
        <th>Change Status</th>
    </thead>
    <tbody>

    <?php
    $canceled = \App\Models\ReservationStatusModel::RESERVATION_STATUS_CANCELED;
    $active = \App\Models\ReservationStatusModel::RESERVATION_STATUS_ACTIVE;
    $finished = \App\Models\ReservationStatusModel::RESERVATION_STATUS_FINISHED;

    $discount = "<div class='badge badge-danger'> Apply -10% !</div>";


    foreach ($params['reservations'] as $reservation) {
        $reservationData = $reservation->toArray();
        $reservationData['times_visited'] = (int)$reservationData['times_visited'];
        ?>
        <tr>
            <td> <?php echo $reservationData['id'] ?> </td>
            <td> <?php echo $reservationData['datetime'] ?> </td>
            <td> <?php echo $reservationData['first_name']; ?> </td>
            <td> <?php echo $reservationData['last_name'] ?> </td>
            <td> <?php echo($reservationData['times_visited']);
                echo(($reservationData['times_visited'] % 5 === 0 && $reservationData['times_visited'] !== 0) ? $discount : ""); ?></td>
            <td> <?php echo $reservationData['status'] ?> </td>
            <td>
                <form action="/barber/reservation/change-status" method="POST">
                    <input type="hidden" name="id" value="<?php echo $reservationData['id'] ?>">
                    <div class="dropdown">
                        <select name="status" class="btn btn-info dropdown-toggle">
                            <option value="<?php echo $canceled ?>"<?php echo($reservationData['status'] != $canceled ?: "selected"); ?>>
                                Canceled
                            </option>
                            <option value="<?php echo $finished ?>"<?php echo($reservationData['status'] != $finished ?: "selected"); ?>
                            ">Finished</option>
                            <option value="<?php echo $active ?>"<?php echo($reservationData['status'] != $active ?: "selected"); ?> >
                                Active
                            </option>
                        </select>
                    </div>
                    <input type="submit" value="Change" class="btn btn-warning">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div class="form-group">
    <form action="/barber/complain-form" method="get">
        <label>Got a complaint ?</label><br>
        <input type="submit" value="Submit Complain" class="btn btn-primary"/>
    </form>
    <div>
        <script type="text/javascript" src="../Scripts/script.js"></script>
</body>
</html>