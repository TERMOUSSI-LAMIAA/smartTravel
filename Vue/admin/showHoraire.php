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
                Ajouter horaire
            </a>
        </div>

        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Heure départ</th>
                        <th>Heure d'arrivée</th>
                        <th>Sieges disponibles</th>
                        <th>Prix</th>
                        <th>Date</th>
                        <th>Immatriculation</th>
                        <th>Ville départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($horaires as $b) { ?>
                        <tr>
                            <td><?= $b->getHr_dep(); ?></td>
                            <td><?= $b->getHr_arv(); ?></td>
                            <td><?= $b->getSieg_dispo(); ?></td>
                            <td><?= $b->getPrix(); ?></td>
                            <td><?= $b->getDate_(); ?></td>
                            <td><?= $b->getFk_immat(); ?></td>
                            <td><?= $b->getFk_vil_dep(); ?></td>
                            <td><?= $b->getFk_vil_arv(); ?></td>
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
