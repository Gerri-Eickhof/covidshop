<?php
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $adress = $_POST['adress'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $products = $_POST['products'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $mysqli = new mysqli('localhost', 'root', '', 'covid-db');

}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="jumbotron text-center">
    <div class="container">
        <h2 class="text-center">Reserveer voor datum: <?php echo date('d F, Y', strtotime($date));?></h2>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Voornaam</label>
                        <input type="text" class="form-control" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="">Achternaam</label>
                        <input type="text" class="form-control" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="Email">
                    </div>
                    <div class="form-group">
                        <label for="">Telefoonnummer</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="">Adres</label>
                        <input type="text" class="form-control" name="adress">
                    </div>
                    <div class="form-group">
                        <label for="">Postcode</label>
                        <input type="text" class="form-control" name="zipcode">
                    </div>
                    <div class="form-group">
                        <label for="">Plaats</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group">
                        <label for="">Provincie</label>
                        <input type="text" class="form-control" name="state">
                    </div>
                    <div class="form-group">
                        <label for="">Aantal producten</label>
                        <input type="number" class="form-control" name="products">
                    </div>
                    <div class="form-group">
                        <label for="">Datum</label>
                        <input type="text" class="form-control" name="date" value="<?php echo date('d/m/Y', strtotime($date)); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tijd</label>
                        <input type="time" class="form-control" name="time">
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit"> Verzenden</button>
                </form>
            </div>

        </div>
    </div>
        <p>Resize this responsive page to see the effect!</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Column 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>

    </body>
    </html>
