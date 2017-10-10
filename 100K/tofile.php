<?php
/**
 * Created by PhpStorm.
 * User: Shai
 * Date: 19/11/2016
 * Time: 18:56
 */

$myfile = fopen("income.txt", "w") or die("Unable to open file!");
$txt = $_POST['income'];
fwrite($myfile, $txt);
$ok=fclose($myfile);

if ($ok){

    header('Location:index.php');
}
