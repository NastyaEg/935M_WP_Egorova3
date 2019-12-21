<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{	
		$id = clearData($_GET['id']);
		$item = getItemById($id);
		$name_model = $item['name_model'];
		$description = $item['description'];
		$strength = $item['strength'];
		$weight = $item['weight'];
		$price = $item['price'];
		$uploadlink = $item['uploadlink'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//filter
		if (empty($_POST['name_model']) | empty($_POST['description']) | 
		empty($_POST['strength']) | empty($_POST['weight']) |
		empty($_POST['price']) | empty($_POST['id'])) {
			echo 'Полностью заполните форму!';	
		} 
		else{
			if(!is_numeric($_POST['price'])){
				echo 'Цена должна быть числовым значением!';
			} 
			else{
				$id = clearData($_POST['id']);
				$temp = editItem($id);
				addItem($temp);
				header("Location: index.php?command=catalog");
			}
		}
	}
?>
	
<div>
	<h3>Редактировать запись</h3>
	<?php include "item_form.php" ?>
</div>
