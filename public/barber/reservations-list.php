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
    echo "<div class='message'>".$params['message']."</div>";
}
?>
<?php
//echo '<pre>';
//print_r($params['reservations']);
//echo '</pre>';
?>

<!--style="display: none;"-->

<form id="loyalty" action="/barber/reservation/get-by-loyalty" method="GET">
    <input type="hidden" name="loyalty" value="max">
    <input type="submit" value="Get Reservations By Loyalty">
</form>

<form id="today" action="/barber/reservation/get-by-date" method="GET">
    <input type="hidden" name="date" value="today">
    <input type="submit" value="Get Todays Reservations">
</form>


<form id="tomorrow" action="/barber/reservation/get-by-date" method="GET">
    <input type="hidden" name="date" value="tomorrow">
    <input type="submit" value="Get Tomorrows Reservations">
</form>

<p id="search-by-name-p">Search By Name</p>
<form id="search-by-name" action="/barber/reservation/search-by-name" method="POST"">
    Search by Name
    <br>First name:<br>
    <input type=" text" name="first_name" required>
<br>
Last name:<br>
<input type="text" name="last_name" required>
<br>
<input type="submit" value="Find">
</form>

<p id="search-by-date-p">Search By Date</p>
<form id="search-by-date" action="/barber/reservation/get-by-date" method="POST" >
    Search by date<br>
    <input type="date" name="date" required>
    <br><br>
    <input type="submit" value="Find">
</form>

<p id="create-new-p">Create New</p>
<form id="create-new" action="/barber/reservation/create" method="POST" ">
    First name:<br>
    <input type="text" name="first_name" required>
    <br>
    Last name:<br>
    <input type="text" name="last_name" required>
    <input type="datetime-local" step="900" name="datetime" required>
    <br><br>
    <input type="submit" value="Create">
</form>


<table class="table table-striped">
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
    $canceled = \App\Models\ReservationStatus::RESERVATION_STATUS_CANCELED;
    $active = \App\Models\ReservationStatus::RESERVATION_STATUS_ACTIVE;
    $finished = \App\Models\ReservationStatus::RESERVATION_STATUS_FINISHED;

    $discount = "<div class='discount'> Apply -10% !</div>";

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
                    <select name="status">
                        <option value="<?php echo $canceled ?>"<?php echo($reservationData['status'] != $canceled ?: "selected"); ?>>
                            Canceled
                        </option>
                        <option value="<?php echo $finished ?>"<?php echo($reservationData['status'] != $finished ?: "selected"); ?>
                        ">Finished</option>
                        <option value="<?php echo $active ?>"<?php echo($reservationData['status'] != $active ?: "selected"); ?> >
                            Active
                        </option>
                    </select>
                    <input type="submit" value="Change">
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<form action="/barber/complain-form" method="get">
    Got a Complain?<br>
    <input type="submit" value="Submit Complain"/>
</form>

<script type="text/javascript" src="../Scripts/script.js"></script>
</body>
</html>