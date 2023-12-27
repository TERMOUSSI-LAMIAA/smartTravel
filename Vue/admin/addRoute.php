<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" enctype="multipart/form-data">
        <label>Ville départ:</label>
        <select id="vil_dep" name="vil_dep">
            <?php foreach ($villes as $v) { ?>
                <option value="<?= $v->getNomVil(); ?>">
                    <?= $v->getNomVil(); ?>
                </option>
            <?php } ?>
        </select><br>

        <label>Ville d'arrivée:</label>
        <select id="vil_arv" name="vil_arv">
            <?php foreach ($villes as $v) { ?>
                <option value="<?= $v->getNomVil(); ?>">
                    <?= $v->getNomVil(); ?>
                </option>
            <?php } ?>
        </select><br>
        <label>Dsitance:</label>
        <input type="text" id="dist" name="dist"><br>

        <label>Durée:</label><br>
        <input type="text" name="dure" id="dure">
      

        </select><br>
        <input type="submit" value="Ajouter">
    </form>
</body>

</html>