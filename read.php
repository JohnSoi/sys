<!-- Вывод информации о клиентах -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!-- 	Таблица вывода клиентов с возможностью	 -->
<!-- 	  		редактирования, удаления.		 -->
<!-- 	   Картинка является ссылкой на сайт.	 -->
<!-- 	--------------------------------------	 -->
<!-- 			Весь функционал реализован		 -->
<!-- 	--------------------------------------	 -->

<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
?>

<!-- Логотип -->
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>

<br>

<!-- Меню и обнуление сессии-->
<?php
	include("includes/nav.php");
	$flag = $_GET['f'];
?>
<!-- Основной блок с выводом таблицы -->
<div id='main'>		
	<?php
	if ($flag  == 1)
		{$str = htmlentities(file_get_contents("log/error.txt"));
				echo $str;}
	elseif($flag  == 2)
		{$str = htmlentities(file_get_contents("log/operation.txt"));
				echo $str;}
	elseif($flag  == 3)
		{$str = htmlentities(file_get_contents("log/access.txt"));
				echo $str;}
	elseif($flag  == 4)
		{$str = htmlentities(file_get_contents("log/good.txt"));
				echo $str;}
	?>
</div>

<!-- Подвал -->
<?php include("includes/footer.php"); ?>
