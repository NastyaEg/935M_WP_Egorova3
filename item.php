<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
		$item = getItemById($id);

		$name_model = clearData($item['name_model']);
		$description = clearData($item['description']);
		$strength = clearData($item['strength']);
		$weight = clearData($item['weight']);
		$price = clearData($item['price']);
		$uploadlink = clearData($item['uploadlink']);
	}
?>
<br/>
<a href='index.php?command=catalog' class="item-ref">Назад</a>
<a href='index.php?command=edit&id=<?=$id?>' class="item-ref">Редактировать</a>
<br/><br/>
<table class="lab1" border="1">
	<tr>
		<th width="15%" bgcolor="#838283">Модель гаджета</th>
		<td colspan="2" width="45%" style="padding:0px 0px 0px 5px;"><?= $name_model ?></td>
		<td rowspan="5"><img src="<?= $uploadlink ?>" width="100%" height="100%"></td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#838283">Описание</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $description ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#838283">Название</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $strength ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#838283">Ёмкость аккумулятора, мАч</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $weight ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#838283">Цена</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $price ?> руб.</td>
	</tr>
</table>
<br/>
