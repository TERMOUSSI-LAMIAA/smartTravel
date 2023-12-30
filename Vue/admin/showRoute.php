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

<body style="background-color: white;">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <img src="assets/images/logo.png" alt="logo" height="60" width="300">
            </div>
            <ul class="nav navbar-nav">
                <li><a href="logout.php">Bus</a></li>
                <li><a href="logout.php">Route</a></li>
                <li><a href="logout.php">Horaire</a></li>
            </ul>
        </div>
    </nav>
    <!-- form -->
    <div class="container">
        <div class="row">
            <a href="addRoute.php" id="addBusButton" class="btn btn-success">
                Ajouter route
            </a>
        </div>

        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Ville départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Distance</th>
                        <th>Durée</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($routes as $b) { ?>
                        <tr>
                            <td><?= $b->getVil_dep(); ?></td>
                            <td><?= $b->getVil_arv(); ?></td>
                            <td><?= $b->getDist(); ?></td>
                            <td><?= $b->getDuree(); ?></td>
                            <td>
                                <button type="button" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
