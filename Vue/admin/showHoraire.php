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
    <style>
        .navbar {
            height: 50px;
            background-color: #dfa974;
        }

        .navbar-header h3 {

            margin-top: 10px;

        }

        /* Navbar Links */
        .navbar-nav li a {
            /* color: #ffffff; */
            font-size: 16px;
            /* Font size */
            margin-right: 15px;
            /* Adjust the right margin as needed */
            margin-left: 40px;
            /* Adjust the right margin as needed */
        }

        /* Change the color of the active link */
        .navbar-nav li.active a {
            /* color: #ffcc00; */
        }
    </style>
</head>

<body style="background-color: white;">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3>Smart Travel</h3>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="index.php?action=showBus">Bus</a></li>
                <li><a href="index.php?action=showRoute">Route</a></li>
                <li><a href="index.php?action=showHoraire">Horaire</a></li>
            </ul>
        </div>
    </nav>
    <!-- form -->
    <div class="container">
        <h2 class="text-center">Gestion Horaire</h2>
        <div class="row">
            <a href="index.php?action=addHoraireform" id="addBusButton" class="btn btn-success">
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
                            <td>
                                <?= $b->getHr_dep(); ?>
                            </td>
                            <td>
                                <?= $b->getHr_arv(); ?>
                            </td>
                            <td>
                                <?= $b->getSieg_dispo(); ?>
                            </td>
                            <td>
                                <?= $b->getPrix(); ?>
                            </td>
                            <td>
                                <?= $b->getDate_(); ?>
                            </td>
                            <td>
                                <?= $b->getFk_immat(); ?>
                            </td>
                            <td>
                                <?= $b->getFk_vil_dep(); ?>
                            </td>
                            <td>
                                <?= $b->getFk_vil_arv(); ?>
                            </td>
                            <td>
                                <a href="index.php?action=updateHorShow&idHor=<?= $b->getIdHor() ?> "
                                    class="btn btn-primary">Update</a>
                                    <a href="index.php?action=deleteHor&idHor=<?= $b->getIdHor() ?>"
                                    class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>