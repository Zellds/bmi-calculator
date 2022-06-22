<?php

$safepost = filter_input_array(INPUT_POST, [
    "altura" => FILTER_VALIDATE_FLOAT,
    "peso"  => FILTER_VALIDATE_FLOAT
]);

$safepost['altura'];
$safepost['peso'];


function redirect(array $parametros)
{

    $getparametros =  http_build_query($parametros);
    header("Location: http://localhost/index.php?{$getparametros}");
}

if ($safepost['peso'] === false) {
    return redirect(['error' => 'Por favor, digite numeros válidos no campo peso!']);
} elseif ($safepost['altura'] === false) {
    return redirect(['error' => 'Por favor, digite numeros válidos no campo altura!']);
}

$imc = round($safepost['peso'] / ($safepost['altura'] ** 2), 2);

if ($imc <= 18.6) {
    return redirect([
        'menssagem' => 'você está abaixo do IMC ideal, o IMC ideal é entre 18,6 a 24,9, seu IMC é = ',
        'imc' => $imc
    ]);
} elseif ($imc >= 25) {
    return redirect([
        'menssagem' => 'você está acima do IMC ideal, o IMC ideal é entre 18,6 a 24,9, seu IMC é = ',
        'imc' => $imc
    ]);
} else {
    return redirect([
        'menssagem' => 'você esta dentro do IMC ideal, o IMC ideal é entre 18,6 a 24,9, seu IMC é = ',
        'imc' => $imc
    ]);
}
