<?php
$menu = array( 
    "Главная"=>"index.php", 
    "Работа №1"=>"index.php?command=lab1",
    "Работа №2"=>"index.php?command=lab2",
    "Работа №3"=>"index.php?command=lab3",
    "Каталог"=>"index.php?command=catalog"
);
?>

<ul id="menu">
    <?php getMenu($menu);?>
</ul>
