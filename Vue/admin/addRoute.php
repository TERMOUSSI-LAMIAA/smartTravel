<!DOCTYPE html>
<html lang="en">

<head>
    <title>add route</title>
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
    <form method="POST" action="index.php?action=addRoute" enctype="multipart/form-data" class="form-horizontal">
        <h2 class="text-center">Add Route</h2>
        <div class="form-group">
            <label for="vil_dep" class="control-label col-sm-2">Ville départ:</label>
            <div class="col-sm-10">
                <select id="vil_dep" name="vil_dep" class="form-control">
                    <?php foreach ($villes as $v) { ?>
                        <option value="<?= $v->getNomVil(); ?>">
                            <?= $v->getNomVil(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="vil_arv" class="control-label col-sm-2">Ville d'arrivée:</label>
            <div class="col-sm-10">
                <select id="vil_arv" name="vil_arv" class="form-control">
                    <?php foreach ($villes as $v) { ?>
                        <option value="<?= $v->getNomVil(); ?>">
                            <?= $v->getNomVil(); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="dist" class="control-label col-sm-2">Distance:</label>
            <div class="col-sm-10">
                <input type="text" id="dist" name="dist" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="dure" class="control-label col-sm-2">Durée:</label>
            <div class="col-sm-10">
                <input type="text" name="dure" id="dure" class="form-control">
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
</body>

</html>