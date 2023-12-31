    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Bus Form</title>
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
            <form action="index.php?action=addBus" method="POST" enctype="multipart/form-data">
                <h2 class="text-center">Add Bus</h2>

                <div class="form-group">
                    <label for="immatriculation">Immatriculation:</label>
                    <input type="text" id="immatriculation" name="immatriculation" class="form-control">
                </div>

                <div class="form-group">
                    <label for="numero_bus">Numero Bus:</label>
                    <input type="text" id="numero_bus" name="numero_bus" class="form-control">
                </div>

                <div class="form-group">
                    <label for="capacite">Capacite:</label>
                    <input type="text" id="capacite" name="capacite" class="form-control">
                </div>

                <div class="form-group">
                    <label for="fk_idEn">Entreprise:</label>
                    <select name="fk_idEn" class="form-control">
                        <?php foreach ($entreprises as $entreprise) { ?>
                            <option value="<?= $entreprise->getIdEn(); ?>">
                                <?= $entreprise->getNomEn(); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary" value="add">Ajouter</button>
                </div>
            </form>
        </div>
    </body>

    </html>
