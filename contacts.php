<?php
require_once 'php/db_connection.php'; //connecting the db_connection to this file
require_once 'php/components.php'; //connection to the components to use the form function
$conn = openCon(); //making connection to the database

//Get the result set from the database with a SQL query
$result = mysqli_query($conn, "SELECT id, firstname, lastname, email, phone, adress, zipcode, city, state, products, date, time FROM contact")
or die(mysqli_error());

//Loop through the result to create a custom array
$contact=[];
while($row = mysqli_fetch_assoc($result)){
    $contact[] =
        [
            'id' => $row['id'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'adress' => $row['adress'],
            'zipcode' => $row['zipcode'],
            'city' => $row['city'],
            'state' => $row['state'],
            'products' => $row['products'],
            'date' => $row['date'],
            'time' => $row['time']
            ];
}
//print_r($contact). "<br>";

//Close connection
$conn->close();
?>
<!doctype html>
<html>
<head>
<!--    Connect to bootstrap font awesome and style.css for the looks -->
    <script src="https://kit.fontawesome.com/587a279f36.js" crossorigin="anonymous"></script>
    <link href = 'Styles/style.css' type = "text/css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
<main>
    <div>
        <!-- Making the form -->
        <div class="container text-center">
            <!-- title of the Form -->
            <h1 class="py-4"><i class="far fa-calendar-check"></i> Afspraken Toevoegen</h1>
            <div class="d-flex justify-content-center">
                <div action="insert.php" method="post" class="w-50">
                    <div class="row g-2">
                        <!-- Using the Function inputElements out of thecomponents.php file for the form inputs -->
                        <? inputElement("col-md-6", "text", "fname", "Voornaam", "First name"); ?>
                        <? inputElement("col-md-6", "text","lname", "Achternaam", "Last name"); ?>
                        <? inputElement("col-md-12", "email","inputEmail4", "Email", "Email"); ?>
                        <? inputElement("col-md-7", "text","inputAddress", "Adres", "Adres"); ?>
                        <? inputElement("col-md-5", "text","inputAddress2", "Huisnummer", "House number"); ?>
                        <? inputElement("col-md-7", "text","inputCity", "Plaats", "City"); ?>
                        <? inputElement("col-md-5", "text","inputZip", "Postcode", "Zipcode"); ?>
                        <!-- Making the dropdown menu for the states in the Netherlands -->
                        <div class="col-md-7">
                            <select id="inputState" class="form-select" placeholder="Provincie" ">
                                <option selected disabled>Kies...</option>
                                <option>Drenthe</option>
                                <option>Flevoland</option>
                                <option>Friesland</option>
                                <option>Gelderland</option>
                                <option>Groningen</option>
                                <option>Limburg</option>
                                <option>Noord-Brabant</option>
                                <option>Noord-Holland</option>
                                <option>Overijssel</option>
                                <option>Utrecht</option>
                                <option>Zeeland</option>
                                <option>Zuid-Holland</option>
                            </select>
                        </div>
                        <!-- setting up the cell for how many products -->
                        <div class="col-md-5">
                            <input type="number" min="0" class="form-control" placeholder="Testen" aria-label="Products">
                        </div>
                        <!-- setting up the cell for the date -->
                        <div class="col-md-7">
                            <input type="date" class="form-control" placeholder="Datum" aria-label="Date">
                        </div>
                        <!-- setting up the cell for the time -->
                        <div class="col-md-5">
                            <input type="time" class="form-control" placeholder="Tijd" aria-label="Time">
                        </div>
                    </div>
                    <div class="row">
                        <!-- setting up the buttons to create, read, update and delete -->
                        <div class="d-flex justify-content-center">
                        <? buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>", "create", "dat-toggle='tooltip' data-placement='buttom' title='Toevoegen'");?>
                        <? buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>", "read", "dat-toggle='tooltip' data-placement='buttom' title='Verversen'");?>
                        <? buttonElement("btn-update", "btn btn-light border", "<i class='fas fa-pen-alt'></i>", "update", "dat-toggle='tooltip' data-placement='buttom' title='Updaten'");?>
                        <? buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>", "delete", "dat-toggle='tooltip' data-placement='buttom' title='Verwijderen'");?>
                    </div>
                </div>
                </form>
            </div>
        </div>
            <!-- Bootstrap table -->
            <div class=" table-data text-align='center'">
                <table class="table table-striped table-light">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="13">Contact Informatie</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Voornaam</th>
                            <th>Achternaam</th>
                            <th>Email</th>
                            <th>Telefoon nummer</th>
                            <th>adres</th>
                            <th>Postcode</th>
                            <th>Plaats</th>
                            <th>Provincie</th>
                            <th>Hoeveel Producten</th>
                            <th>Datum</th>
                            <th>Tijd</th>
                            <th>Aanpassen</th>
                      </tr>
                    </thead>
                    <tbody id="tbody"
                        <?php foreach ($contact as $index => $costumers) { ?>
                            <tr>
                                <td><?= $costumers['id'] ?></td>
                                <td><?= $costumers['firstname'] ?></td>
                                <td><?= $costumers['lastname'] ?></td>
                                <td><?= $costumers['email'] ?></td>
                                <td><?= $costumers['phone'] ?></td>
                                <td><?= $costumers['adress'] ?></td>
                                <td><?= $costumers['zipcode'] ?></td>
                                <td><?= $costumers['city'] ?></td>
                                <td><?= $costumers['state'] ?></td>
                                <td><?= $costumers['products'] ?></td>
                                <td><?= $costumers['date'] ?></td>
                                <td><?= $costumers['time'] ?></td>
                                <td><i class="fas fa-edit btnedit"></i></i></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>


<!--<br> <br> <br>-->
<!--<h1>Contact Informatie</h1>-->
<!--<table>-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>#</th>-->
<!--        <th>Voornaam</th>-->
<!--        <th>Achternaam</th>-->
<!--        <th>Email</th>-->
<!--        <th>Telefoon nummer</th>-->
<!--        <th>adres</th>-->
<!--        <th>Postcode</th>-->
<!--        <th>Plaats</th>-->
<!--        <th>Provincie</th>-->
<!--        <th>Hoeveel Producten</th>-->
<!--        <th>Datum</th>-->
<!--        <th>Tijd</th>-->
<!--        <th>Aanpassen</th>-->
<!--        <th colspan="2"></th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tfoot>-->
<!--    </tfoot>-->
<!--    <tbody>-->
<!--    --><?php //foreach ($contact as $index => $costumers) { ?>
<!--        <tr>-->
<!--            <td>--><?//= $costumers['id'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['firstname'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['lastname'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['email'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['phone'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['adress'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['zipcode'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['city'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['state'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['products'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['date'] ?><!--</td>-->
<!--            <td>--><?//= $costumers['time'] ?><!--</td>-->
<!--        </tr>-->
<!--    --><?php //}; ?>
<!--    </tbody>-->
<!--</form>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>-->
</body>
</html>
</body>
</html>
