<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//filter
	if (empty($_POST['name_model']) | empty($_POST['description']) | 
	empty($_POST['strength']) | empty($_POST['weight']) |
	empty($_POST['price'])){
		echo 'Полностью заполните форму!';	
	} 
	else {
		if(!is_numeric($_POST['price'])){
			echo 'Цена должна быть числовым значением!';
		} 
		else{
			$item = createNewItem();
			addItem($item);
			header("Location: index.php?command=catalog");
		}
	}
}
?>
<div>	
	<h3>Добавить запись</h3>
	<?php include "item_form.php" ?>
</div>