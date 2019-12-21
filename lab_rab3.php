<?php 
include_once "lib.inc.php";
$numbers = null; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
global $numbers; 
$numbers = explode(" ", clearData($_POST['numbers'])); 
}  
?> 

<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post"> 
	<h2><p>Лабораторная работа</p></h2>
	<input type='text' name='numbers'/> 
	<input type="submit" value="Вычислить"/> 
</form><br/> 
	
<?php 
	if (is_numeric_array($numbers)) 
	{ 
		echo '<div> Массив данных: '.implode(",", $numbers).'</div> <br/>'; 
		echo '<div> Сумма чисел: '.sum($numbers).'</div> <br/>'; 
		echo '<div> Среднее значение: '.avg($numbers).'</div> <br/>'; 
		echo '<div> Умножение: '.multiple($numbers).'</div> <br/>'; 
		echo '<div> Минимальное значение: '.min_value($numbers).'</div> <br/>'; 
		echo '<div> Максимальное значение: '.max_value($numbers).'</div> <br/>'; 
	} 
?> 
