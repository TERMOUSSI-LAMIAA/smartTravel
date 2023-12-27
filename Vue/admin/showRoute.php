<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style="background-color:white;">
    <nav>
        <img src="assets/images/logo.png" alt="logo" height="60" width="300">
        <a href="logout.php">Bus</a>
        <a href="logout.php">route</a>
        <a href="logout.php">Horaire</a>
    </nav>
    <!-- form -->
    <div class="container">
        <div class="row">
            <a href="addRoute.php" id="addBusButton">
                <button>Ajouter route</button>
            </a>
        </div>





        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ville départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Distance</th>
                        <th>Duree</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>


</body>

</html>