<?php
/* Seleccion del fichero con los resultados */
$fichero = "resultados.txt";
$contenido = file($fichero);

/* Guardar los valores de la votación */

$array = explode("||", $contenido[0]);
$aritzA = $array[0];
$aritzP = $array[1];
$randyW = $array[2];
$adrianV = $array[3];

/* Aumentar los valores de la votacion */

$voto = isset($_GET['voto']) ? $_GET['voto'] : null;

if ($voto === '0') {
    $aritzA++;
}
if ($voto === '1') {
    $aritzP++;
}
if ($voto === '2') {
    $randyW++;
}
if ($voto === '3') {
    $adrianV++;
}

/* Devuelve el valor al fichero de resultados */

$insertVoto = $aritzA . "||" . $aritzP . "||" . $randyW . "||" . $adrianV;

$fp = fopen($fichero, "w");
fputs($fp, $insertVoto);
fclose($fp);

$denominador = (int)$aritzA + (int)$aritzP + (int)$randyW + (int)$adrianV;
$tantoAA = 100 * round($aritzA / $denominador, 2);
$tantoAP = 100 * round($aritzP / $denominador, 2);
$tantoRW = 100 * round($randyW / $denominador, 2);
$tantoAV = 100 * round($adrianV / $denominador, 2);
?>

<!-- Muestra el porcentaje de la votación -->
<h2>Resultado:</h2>
<table>

    <tr>

        <td>Aritz A:</td>
        <td>

            <img src="barrita.png" width='<?php echo($tantoAA); ?>' height='20'> <?php echo($tantoAA); ?>%

        </td>

    </tr>
    <tr>

        <td>Aritz P:</td>
        <td>

            <img src="barrita.png" width='<?php echo($tantoAP); ?>' height='20'> <?php echo($tantoAP); ?>%

        </td>

    </tr>
    <tr>

        <td>Randy W:</td>
        <td>

            <img src="barrita.png" width='<?php echo($tantoRW); ?>' height='20'> <?php echo($tantoRW); ?>%

        </td>

    </tr>
    <tr>

        <td>Adrian V:</td>
        <td>

            <img src="barrita.png" width='<?php echo($tantoAV); ?>' height='20'> <?php echo($tantoAV); ?>%

        </td>

    </tr>

</table>

