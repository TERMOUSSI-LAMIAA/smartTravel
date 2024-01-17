<!DOCTYPE html>
<html lang="en">

<head>
    <title>add horaire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/my_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            margin-top: 10px;
            display: block;
        }
    </style>
</head>

<body>
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
    <form method="POST" action="index.php?action=addHoraire" enctype="multipart/form-data" class="form-horizontal"
        id="formAdd">
        <!-- onsubmit="return validateForm()" -->
        <h2 class="text-center">Add Horaire</h2>
        <div class="form-group">
            <label for="hr_dep" class="control-label col-sm-2">Heure départ:</label>
            <div class="col-sm-10">
                <input type="time" id="hr_dep" name="hr_dep" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="hr_arv" class="control-label col-sm-2">Heure d'arrivée:</label>
            <div class="col-sm-10">
                <input type="time" id="hr_arv" name="hr_arv" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="sieg_dispo" class="control-label col-sm-2">Sieges disponibles:</label>
            <div class="col-sm-10">
                <input type="number" id="sieg_dispo" name="sieg_dispo" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="prix" class="control-label col-sm-2">Prix:</label>
            <div class="col-sm-10">
                <input type="number" name="prix" id="prix" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="date_" class="control-label col-sm-2">Date:</label>
            <div class="col-sm-10">
                <input type="date" name="date_" id="date_" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="fk_immat" class="control-label col-sm-2">Immatriculation:</label>
            <div class="col-sm-10">
                <select id="fk_immat" name="fk_immat" class="form-control">
                    <?php foreach ($buses as $b) { ?>
                        <option value="<?= $b->getImmat(); ?>">
                            <?= $b->getImmat(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="fk_vil_arv" class="control-label col-sm-2">Route:</label>
            <div class="col-sm-10">
                <select id="fk_vil_arv" name="route" class="form-control">
                    <?php foreach ($routes as $v) { ?>
                        <option value="<?= $v->getVil_dep() ?>,<?= $v->getVil_arv() ?>">
                            <?= $v->getVil_dep() . " to " . $v->getVil_arv(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Ajouter" class="btn btn-primary">
            </div>
        </div>
    </form>
    <!-- Footer -->
    <footer class="footer navbar-fixed-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>&copy; 2024 Smart Travel. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <script>
        <?php
        if (isset($_GET['status'])) {
            echo "alert('" . $_GET['status'] . "');";
            // echo "window.location.href='index.php?action=addHoraireform';";
        }
        ?>
    </script>
</body>

</html>