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
            <a href="addBus.php" id="addBusButton">
                <button>Add Bus</button>
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
                            <td>
                                <?= $b->getImmat(); ?>
                            </td>
                            <td>
                                <?= $b->getNumbus(); ?>
                            </td>
                            <td>
                                <?= $b->getCapacite(); ?>
                            </td>
                            <td>
                                <?= $b->getFk_idEn(); ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


</body>

</html>