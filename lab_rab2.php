<?php
include_once "lib.inc.php";

$way = "";
$time = "";
$result = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $way = trim(strip_tags($_POST['way']));
    $time = trim(strip_tags($_POST['time']));
    $result = calculateSpeed($way, $time);
}

$array = array(
    1,
    2.,
    null,
    true,
    array(
        "a",
        "b",
        "c"
    )
);
?>

<form method="post">
    <h2><p>Лабораторная работа</p></h2>
	Путь: <input type="text" name="way"> <br /> <br /> 
	Время: <input type="text" name="time"> <br /> <br /> 
    <input type="submit" value="Результат" />
</form>
<?php showSpeedValue(); ?>
<p>My dump: </p>
<?php my_var_dump($array); ?>
