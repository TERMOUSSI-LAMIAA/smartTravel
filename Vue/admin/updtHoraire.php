<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Horaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

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
    <form method="POST" action="index.php?action=addHoraire" enctype="multipart/form-data" class="form-horizontal">
        <h2 class="text-center">Update Horaire</h2>
        <div class="form-group">
            <label for="id" class="control-label col-sm-2">ID:</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $hor->getId() ?>" id="id" name="id" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="hr_dep" class="control-label col-sm-2">Heure départ:</label>
            <div class="col-sm-10">
                <input type="text" value="<?= $hor->getHr_dep() ?>" id="hr_dep" name="hr_dep" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="hr_arv" class="control-label col-sm-2">Heure d'arrivée:</label>
            <div class="col-sm-10">
                <input type="time" value="<?= $hor->getHr_arv() ?>" id="hr_arv" name="hr_arv" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="sieg_dispo" class="control-label col-sm-2">Sieges disponibles:</label>
            <div class="col-sm-10">
                <input type="number" value="<?= $hor->getSieg_dispo() ?>" id="sieg_dispo" name="sieg_dispo"
                    class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label for="prix" class="control-label col-sm-2">Prix:</label>
            <div class="col-sm-10">
                <input type="number" value="<?= $hor->getPrix() ?>" name="prix" id="prix" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="date_" class="control-label col-sm-2">Date:</label>
            <div class="col-sm-10">
                <input type="date" value="<?= $hor->getDate_() ?>" name="date_" id="date_" class="form-control">
            </div>
        </div>


        <div class="form-group">
            <label for="fk_immat" class="control-label col-sm-2">Immatriculation:</label>
            <div class="col-sm-10">
                <select id="fk_immat" name="fk_immat" class="form-control">
                    <?php foreach ($buses as $b): ?>
                        <?php if ($b->getImmat() === $hor->getFk_immat()) { ?>
                            <option value="<?= $b->getImmat(); ?>" selected>
                                <?= $b->getImmat() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $b->getImmat(); ?>">
                                <?= $b->getImmat() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="fk_vil_dep" class="control-label col-sm-2">Ville départ:</label>
            <div class="col-sm-10">
                <select id="fk_vil_dep" name="fk_vil_dep" class="form-control">
                    <?php foreach ($villes as $v): ?>
                        <?php if ($v->getNomVil() === $hor->getFk_vil_dep()) { ?>
                            <option value="<?= $v->getNomVil(); ?>" selected>
                                <?= $v->getNomVil() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $v->getNomVil(); ?>">
                                <?= $v->getNomVil() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>


        <div class="form-group">
            <label for="fk_vil_arv" class="control-label col-sm-2">Ville d'arrivée:</label>
            <div class="col-sm-10">
                <select id="fk_vil_arv" name="fk_vil_arv" class="form-control">
                    <?php foreach ($villes as $v): ?>
                        <?php if ($v->getNomVil() === $hor->getFk_vil_arv()) { ?>
                            <option value="<?= $v->getNomVil(); ?>" selected>
                                <?= $v->getNomVil() ?>
                            </option>
                        <?php } else { ?>
                            <option value="<?= $v->getNomVil(); ?>">
                                <?= $v->getNomVil() ?>
                            </option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="Modifier" class="btn btn-primary">
            </div>
        </div>
    </form>
</body>

</html>