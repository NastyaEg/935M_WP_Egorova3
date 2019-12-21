<div id="header">
	<a href="index.php"><img src="Images/logo.jpg" width="75" height="75" class="logo"/></a>
	<span class="slogan">Интернет-магазин смартфонов и планшетов</span>
</div>

<div class="logout"> 
    <?php
		if (!empty($_SESSION['user_login'])){
            echo "<b>{$_SESSION['user_login']}</b> <a href='index.php?command=logout'>(Выход)</a>";
        } else {
            echo "<a href='index.php?command=login'> Зайдите в свой аккаунт </a>";
        }			
	?>
</div>