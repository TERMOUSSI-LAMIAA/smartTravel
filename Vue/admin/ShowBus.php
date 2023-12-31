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
                <li><a href="index.php?action=showBus">Bus</a></li>
                <li><a href="index.php?action=showRoute">Route</a></li>
                <li><a href="index.php?action=showHoraire">Horaire</a></li>
            </ul>
        </div>
    </nav>
    <!-- form -->
    <div class="container">
        <div class="row">
            <a href="index.php?action=addBusform" id="addBusButton" class="btn btn-success">
                Add Bus
            </a>
        </div>
        <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Immatriculation</th>
                        <th>Numero Bus</th>
                        <th>Capacite</th>
                        <th>Entreprise</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($buses as $b) { ?>
                        <tr>
                            <td><?= $b->getImmat(); ?></td>
                            <td><?= $b->getNumbus(); ?></td>
                            <td><?= $b->getCapacite(); ?></td>
                            <td><?= $b->getEnterpriseName(); ?></td>
                            <td>
                                <a href="index.php?action=updateBusShow&immat=<?= $b->getImmat() ?>"
                                    class="btn btn-primary">Update</a>
                                <a href="index.php?action=deleteBus&immat=<?= $b->getImmat() ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
