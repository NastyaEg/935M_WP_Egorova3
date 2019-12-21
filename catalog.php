<?php
	//Инициализация переменных
	$name_model = "";
	$description = "";
	$strength = "";
	$weight = "";
	$price	 = "";
	$uploadlink = "";

	if (isset($_POST['delete']))
	{
		foreach ($_SESSION['Items'] as $item){
			$id = $item['id'];
			if (isset($_POST["checkbox$id"])){
				deleteItem($id);
			}
		}
	}	
?>

<button id="add" class='btn' style='margin: 5px' onclick="location.href='index.php?command=add';">Добавить</button>
<br/><br/>

<form method='POST'>
<table class="lab1" border="1">
	<tr>
		<th width="20%" bgcolor="#838283" align="center">Модель гаджета</th>
		<th width="20%" bgcolor="#838283" align="center">Описание</th>
		<th width="20%" bgcolor="#838283" align="center">Название</th>
		<th width="20%" bgcolor="#838283" align="center">Ёмкость аккумулятора,мАч</th>
		<th width="20%" bgcolor="#838283" align="center">Цена</th>
	</tr>
	<?php 
	if (!empty($_SESSION['Items'])) {
		foreach ($_SESSION['Items'] as $item){
			$name_model = $item['name_model'];
			$description = $item['description'];
			$strength = $item['strength'];
			$weight = $item['weight'];
			$price = $item['price'];
			$id = $item['id'];
		echo 
		"<tr>
		<td> <a href='index.php?command=item&id=$id';' style='color:black; display:inline;'> $name_model </a> </td>
		<td>$description</td>
		<td>$strength</td>
		<td>$weight</td>
		<td>$price</td>
		<td>
			<input type='checkbox' name='checkbox$id' value=$id/>
		</td>
		</tr>";
		}
	}
	?>
	
	</table>
	<input id='delete' class='btn' style='margin: 5px' type='submit' class='button' name='delete' value='Удалить'/>
</form>
