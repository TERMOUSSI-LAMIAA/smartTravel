<!DOCTYPE html>
<html lang="en">

<head>
    <title>update bus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/my_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
         .container {
            max-width: 400px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
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
    <div class="container">
        <form action="index.php?action=updtBus" method="POST" enctype="multipart/form-data">
            <h2 class="text-center">Update Bus</h2>

            <div class="form-group">
                <label for="immatriculation">Immatriculation:</label>
                <input type="text" value="<?= $bus->getImmat() ?>" id="immatriculation" name="immatriculation"
                    class="form-control" readonly>
            </div>

            <div class="form-group">
                <label for="numero_bus">Numero Bus:</label>
                <input type="text" value="<?= $bus->getNumbus() ?>" id="numero_bus" name="numero_bus"
                    class="form-control">
            </div>

            <div class="form-group">
                <label for="capacite">Capacite:</label>
                <input type="text" value="<?= $bus->getCapacite() ?>" id="capacite" name="capacite"
                    class="form-control">
            </div>
            <div class="form-group">
                <label for="fk_idEn">Entreprise:</label>
                <select name="fk_idEn" class="form-control">
                    <?php foreach ($entreprises as $entreprise): ?>
                        <?php if ($entreprise->getIdEn() === $bus->getFk_idEn()) { ?>
                            <option value="<?= $entreprise->getIdEn(); ?>" selected>
                                <?= $entreprise->getNomEn() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $entreprise->getIdEn(); ?>">
                                <?= $entreprise->getNomEn() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Modifier" class="btn btn-primary">
            </div>
        </form>
    </div>
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