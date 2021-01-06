<?php
require_once 'php/operation.php'; //connection to the operation file to connect to db_connection and components

//Get the result set from the database with a SQL query
$result = mysqli_query($conn, "SELECT * FROM contact")
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

if (isset($_POST['create'])){
    //making variables of the checked input
    $firstname  = mysqli_escape_string($conn, $_POST['firstname']);
    $lastname   = mysqli_escape_string($conn, $_POST['lastname']);
    $email      = mysqli_escape_string($conn, $_POST['email']);
    $phone      = mysqli_escape_string($conn, $_POST['phone']);
    $adress     = mysqli_escape_string($conn, $_POST['adress']);
    $zipcode    = mysqli_escape_string($conn, $_POST['zipcode']);
    $city       = mysqli_escape_string($conn, $_POST['city']);
    $products   = mysqli_escape_string($conn, $_POST['products']);
    $date       = mysqli_escape_string($conn, $_POST['date']);
    $time       = mysqli_escape_string($conn, $_POST['time']);

    //Require the form validation handling
    require_once "php/form-validation.php";

    if(isset($_REQUEST['$state']) && $_REQUEST['$state'] == '0') {
        $errors['state'] = 'Provincie mag niet leeg zijn';
    }
//
//    if (empty($errors)) {
//        //Save the record to the database
//        $sql = "INSERT INTO contact(firstname, lastname, email, phone, adress, zipcode, city, state, products, date, time)
//        VALUES('$firstname', '$lastname', '$email', '$phone', '$adress', '$zipcode', '$city', '$state', '$products', '$date', '$time')";
//        $result = mysqli_query($conn, $sql)
//            or die ('Error: '.$sql);
//        if($result){
//            TextNode("succes", "Afpraak is goed toegevoegd!");
//        }else{
//            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($conn);
//        }
//    }
}

//Close connection
$conn->close();
?>
<!doctype html>
<html>
<head>
<!--    Connect to bootstrap font awesome and style.css for the looks -->
    <script src="https://kit.fontawesome.com/587a279f36.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link href = 'Styles/style.css' type = "text/css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables/responsive.bootstrap4.min.css">
    <script type="text/javascript" src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="plugins/datatables/responsive.bootstrap4.min.js"></script>
</head>
<body>
<script>
    function GetSelectedValue(){
        var e = document.getElementById("state");
        var result = e.options[e.selectedIndex].value;

        document.getElementById("result").innerHTML = result;
    }
    function GetSelectedText(){
        var e = document.getElementById("state");
        var result = e.options[e.selectedIndex].text;

        document.getElementById("result").innerHTML = result;
    }
</script>
<main>
    <div>
        <!-- Making the form -->
        <div class="container">
            <!-- title of the Form -->
            <div id="logo">
            <img src="logocovid.png">
            </div>
            <h1 class="py-4 text-center"><i class="far fa-calendar-check"></i> Afspraken Toevoegen</h1>
            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-50">
                    <div class="row g-2">
                        <div class=col-md-2">
                            <input type="text" class="form-control" name="id" placeholder="Id Nummer (Automatiche ingevuld)" aria-label="id" min="0" readonly="true">
                        </div>
                        <!-- Using the Function inputElements out of thecomponents.php file for the form inputs -->
                        <div class="data-field col-md-6">
                            <input class="form-control" id="firstname" type="text" name="firstname" placeholder="Voornaam" aria-label="First Name" value="<?= isset($firstname) ? htmlentities($firstname) : '' ?>"/>
                            <span class="errors"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-6">
                            <input class="form-control" id="lastname" type="text" name="lastname" placeholder="Achternaam" aria-label="Last Name" value="<?= isset($lastname) ? htmlentities($lastname) : '' ?>"/>
                            <span class="errors"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-12">
                            <input class="form-control" id="email" type="text" name="email" placeholder="Email" aria-label="Email" value="<?= isset($email) ? htmlentities($email) : '' ?>"/>
                            <span class="errors"><?= isset($errors['email']) ? $errors['email'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-12">
                            <input class="form-control" id="phone" type="varchar" name="phone" placeholder="Telefoonummer" aria-label="phone" value="<?= isset($phone) ? htmlentities($phone) : '' ?>"/>
                            <span class="errors"><?= isset($errors['phone']) ? $errors['phone'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-12">
                            <input class="form-control" id="adress" type="varchar" name="adress" placeholder="Adres" aria-label="adress" value="<?= isset($adress) ? htmlentities($adress) : '' ?>"/>
                            <span class="errors"><?= isset($errors['adress']) ? $errors['adress'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-7">
                            <input class="form-control" id="city" type="text" name="city" placeholder="Plaats" aria-label="City" value="<?= isset($city) ? htmlentities($city) : '' ?>"/>
                            <span class="errors"><?= isset($errors['city']) ? $errors['city'] : '' ?></span>
                        </div>
                        <div class="data-field col-md-5">
                            <input class="form-control" id="zipcode" type="text" name="zipcode" placeholder="Postcode" aria-label="zipcode" value="<?= isset($zipcode) ? htmlentities($zipcode) : '' ?>"/>
                            <span class="errors"><?= isset($errors['zipcode']) ? $errors['zipcode'] : '' ?></span>
                        </div>
                        <!-- Making the dropdown menu for the states in the Netherlands -->
                        <div class=" data-field col-md-7">
                            <select id="state" class="form-select" placeholder="Provincie"  name="state" aria-label="zipcode">
                                <option selected disabled>Kies...</option>
                                <option value="Drenthe">Drenthe </option>
                                <option value="Flevoland">Flevoland</option>
                                <option value="Friesland">Friesland</option>
                                <option value="Gelderland">Gelderland</option>
                                <option value="Groningen">Groningen</option>
                                <option value="Limburg">Limburg</option>
                                <option value="Noord-Brabant">Noord-Brabant</option>
                                <option value="Noord-Holland">Noord-Holland</option>
                                <option value="Overijssel">Overijssel</option>
                                <option value="Utrecht">Utrecht</option>
                                <option value="Zeeland">Zeeland</option>
                                <option value="Zuid-Holland">Zuid-Holland</option>
                            </select>
                        </div>
                        <!-- setting up the cell for how many products -->
                        <div class="col-md-5">
                            <input type="number" min="0" class="form-control" placeholder="Testen" aria-label="Products" name="products">
                        </div>
                        <!-- setting up the cell for the date -->
                        <div class="col-md-7">
                            <input type="date" class="form-control" placeholder="Datum" aria-label="Date" name="date">
                        </div>
                        <!-- setting up the cell for the time -->
                        <div class="col-md-5">
                            <input type="time" class="form-control" placeholder="Tijd" aria-label="Time" name="time">
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
                </form>
            </div>
        </div>
            <!-- Bootstrap table -->
            <div class="card-body">
                <table id="appointments" class="table dataTable table-striped table-light" width="100%">
                    <thead>
                        <tr>
                            <th colspan="14">Contact Informatie</th>
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
                    <tbody>
                        <?php foreach ($contact as $index => $costumers) { ?>
                            <tr>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['id'] ?></td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['firstname'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['lastname'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['email'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['phone'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['adress'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['zipcode'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['city'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['state'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['products'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['date'] ?> </td>
                                <td data-id="<?= $costumers['id'] ?>"> <?= $costumers['time'] ?> </td>
                                <td><i class="fas fa-edit btnedit" id="edit"></i></td>
                            </tr>
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div>
</main>
<script src="php/main.js"></script>
</body>
</html>
</body>
</html>
