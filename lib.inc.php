<?php
	function getMenu($menu, $vertical=true)
	{
		$style = "";
		if(!$vertical)
		{
			$style = "display:inline";
		}
		echo '<ul style="list-style-type:none">';
		foreach ($menu as $link=>$href)
		{
			echo "<li style='$style'><a href=\"$href\">", $link, '</a></li>';
		}
		echo '</ul>';
	}

// return result in meters per second
	function calculateSpeed($way, $time)
	{
		if($time != 0) return $way / $time;
	}

	function toKilomitersPerHour($value)
	{
		return $value * 3.59999712;
	}

	function toMilePerHour($value)
	{
		return $value * 2.23694;
	}

	function showSpeedValue()
	{
		global $result;
		if($result){
			echo "<p>Result: </p>";
			echo "<p>$result.m/s</p>";
			echo "<p>" . toKilomitersPerHour($result) . " km/h</p>";
			echo "<p>" . toMilePerHour($result) . " mile/h</p>";
		}
	}

	function my_var_dump($array)
	{
		$i = 0;
		foreach ($array as $value) {
			if (is_array($value)) {
				my_var_dump($value);
			} else {
				echo "<p>[$i] =><p>";
				echo "<p>" . gettype($value) . "($value)</p>";
				$i++;
			}
		}
	}

	function clearData($data)
	{
		return trim(strip_tags($data));
	}

	function imageCheck()
	{
		if ($_FILES['uploadfile']['type'] == "image/jpeg")
		{
			if ($_FILES['uploadfile']['size']<=1024000)
				return 1;
			else
				return "Размер файла не должен превышать 1000Кб!";
		}
		else {
			ini_set('upload_tmp_dir', getcwd());
			echo getcwd();
			echo ini_get('upload_tmp_dir');
			$tmp_dir = ini_get('upload_tmp_dir') ? ini_get('upload_tmp_dir') : sys_get_temp_dir();
			die($tmp_dir);
				return "Файл должен иметь jpeg-расширение!";
		}
	}

	function resize($file)
	{
		global $tmp_path;
		// Ограничение по ширине в пикселях
		$max_size = 250;
		// Cоздаём исходное изображение на основе исходного файла
		$src = imagecreatefromjpeg($file['tmp_name']);
		// Определяем ширину и высоту изображения
		$w_src = imagesx($src);
		$h_src = imagesy($src);
		// Если ширина больше заданной
		if ($w_src > $max_size)
		{
			// Вычисление пропорций
			$ratio = $w_src/$max_size;
			$w_dest = round($w_src/$ratio);
			$h_dest = round($h_src/$ratio);
			// Создаём пустую картинку
			$dest = imagecreatetruecolor($w_dest, $h_dest);
			// Копируем старое изображение в новое с изменением параметров
			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
			// Вывод картинки и очистка памяти
			imagejpeg($dest, $tmp_path . $file['name']);
			imagedestroy($dest);
			imagedestroy($src);
			return $file['name'];
		}
		else
		{
			// Вывод картинки и очистка памяти
			imagejpeg($src, $tmp_path . $file['name']);
			imagedestroy($src);
			return $file['name'];
		}
	}

	function debug_to_console( $data ) {
		$output = $data;
		if ( is_array( $output ) )
			$output = implode( ',', $output);
		echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
	}

	function getId(){
		if (!isset($_SESSION['last_index'])){
			$_SESSION['last_index'] = 0;
		} 
		return ++$_SESSION['last_index'];
	}

	function getItemById($id){
		if (isset($_SESSION['Items'])){
			foreach($_SESSION['Items']  as $item){
				if ($item['id'] == $id){
					return $item;
					break;
				}
			}
		}
	}

	function createNewItem(){
		return createItem(getId());  
	}

	function editItem($id){
		deleteItem($id);
		return createItem($id); 
	}

	function createItem($id){
		$item_array = array();
		
			$item_array['id'] = $id;
			$item_array['name_coffee'] = clearData($_POST['name_coffee']);
			$item_array['description'] = clearData($_POST['description']);
			$item_array['strength'] = clearData($_POST['strength']);
			$item_array['weight'] = clearData($_POST['weight']);
			$item_array['price'] = clearData($_POST['price']);

			$item_array['uploadlink'] = null;
			if (!empty($_FILES['uploadfile']['name']))
			{
				$tmp_path = 'tmp/';
				$file_path = 'Images/';
				$result = imageCheck();
				if ($result == 1)
				{
					$name = resize($_FILES['uploadfile']);
					$uploadfile = $file_path . $name;
					if (@copy($tmp_path . $name, $file_path . $_POST['title'] . '.jpeg'))
						$uploadlink = "Images/". $_POST['title'] . '.jpeg';
					unlink($tmp_path . $name);
					$item_array['uploadlink'] = $uploadlink;
				}
				else
				{
					echo $result;
					exit;
				}
			}
		return $item_array;
	}

	function addItem($item){
		if (!isset($_SESSION['Items'])){
			$_SESSION['Items'] = array();
		}
		array_push($_SESSION['Items'], $item);
	}

	function deleteItem($id){
		if (isset($_SESSION['Items'])){
			for($i = 0; $i < count($_SESSION['Items']); ++$i) {
				if ($_SESSION['Items'][$i]['id'] == $id){
					array_splice($_SESSION['Items'], $i, 1);
				}
			}
		}
	}

	function is_numeric_array($array) 
	{ 
		if ($array != null)
		{ 
			foreach ($array as $elem) 
			{ 
				if (!is_numeric($elem)) 
				{ 
					return false; 
				} 
			} 
		} 
		else 
		{ 
			return false; 
		} 
		return true; 
	} 

	function sum($numbers) 
	{ 
		$sum = 0; 
		foreach ($numbers as $number) 
		{ 
			$sum += $number; 
		} 
		return $sum; 
	} 

	function avg($numbers) 
	{ 
		return sum($numbers)/count($numbers); 
	} 

	function multiple($numbers) 
	{ 
		$mult = 1; 
		foreach ($numbers as $number) 
		{ 
			$mult = $mult * $number; 
		} 
		return $mult; 
	} 

	function min_value($numbers) 
	{ 
		$min = $numbers[0]; 
		for ($i=1; $i < count($numbers); $i++) 
		{ 
			if ($min > $numbers[$i]) 
			{ 
				$min = $numbers[$i]; 
			} 
		} 
		return $min; 
	} 

	function max_value($numbers) 
	{ 
		$max = $numbers[0]; 
		for ($i=1; $i < count($numbers); $i++) 
		{ 
			if ($max < $numbers[$i]) 
			{ 
				$max = $numbers[$i]; 
			} 
		} 
		return $max; 
	}

?>
