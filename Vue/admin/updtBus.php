<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Bus Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

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
                            <option value="<?= $entreprise->getIdEn(); ?>" >
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
</body>


</html>