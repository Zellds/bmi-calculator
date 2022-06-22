<?php

$imc    = filter_input(INPUT_GET, 'imc', FILTER_DEFAULT);
$error   = filter_input(INPUT_GET, 'error', FILTER_DEFAULT);
$menssagem   = filter_input(INPUT_GET, 'menssagem', FILTER_DEFAULT);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>IMC Calc</title>
</head>

<body>

    <div class="row justify-content-md-center">
        <div class="col-lg-3 my-5">
            <h1>Calcule seu IMC!</h1>
        </div>
    </div>

    <form action="/calculadora.php" method="POST">
        <div class="row justify-content-md-center">
            <div class="col-lg-3 my-2">
                <label for="altura">Sua altura:</label>
                <input name="altura" step="any" class="form-control" placeholder="Ex: 1,70">
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-3 my-2">
                <label for="peso">Digite seu peso:</label>
                <input name="peso" step="any" class="form-control" placeholder="Ex: 60">
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-auto my-2 ">
                <button type="submit" class="btn btn-primary">Calcular</button>
            </div>
        </div>

        <?php if ($error) : ?>
            <div class="row justify-content-md-center">
                <div class=" alert alert-danger col-3 my-2" role="alert">
                    <?= $error ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($imc && $menssagem) : ?>
            <div class="row justify-content-md-center">
                <div class=" alert alert-success col-3 my-2" role="alert">
                    <?= $menssagem . $imc ?>
                </div>
            </div>
        <?php endif; ?>

    </form>
</body>

</html>