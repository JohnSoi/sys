<!-- Вывод проектов по клиенту -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   Страница вывода проектов по определенной	 -->
<!--				  компании					 -->
<!-- 	--------------------------------------	 -->
<!-- 			Весь функционал реализован		 -->
<!-- 	--------------------------------------	 -->

<?php
	include("includes/includes.php");
?>
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>
<br>

<?php
	include("includes/nav.php");
	logwrite("access", "Пользователь перешел на страницу Вывода проектов компании");
	$namecompany=$_GET['company'];
	$query = mysql_query("SELECT * FROM project WHERE company = '". $namecompany."'") or  trigger_error($mes = mysql_error());;
?>

<div id='main'>
	<h1>Для компании <?php echo $namecompany;?> в базе содержится <?php echo mysql_num_rows($query);
		if (mysql_num_rows($query) == 1)
			echo " заказ";
		elseif (mysql_num_rows($query) >= 2 and mysql_num_rows($query) <= 4)
			echo " заказа";
		else 
			echo " заказов";
	 ?> :</h1>
	<?php
	if (mysql_num_rows($query) != 0){
			echo '<table align="center">' ;
			echo  '<td align="center"> Название </td>';
			echo  '<td align="center"> Компания</td>';
			echo  '<td align="center"> Описание</td>';
			echo  '<td align="center"> Дата начала</td>';
			echo  '<td align="center"> Стоимость</td>';
			echo  '<td align="center"> Путь к ТЗ</td>';
			echo  '<td align="center">Статус</td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($query))
			{
  				echo  '<td align="center"><a href="edit.php?flag=2&id='.$data['id'].'">'. $data['name'] .'</a></td>';
   				echo '<td align="center">'. $data['company'] . '</td>' ;
				echo '<td align="center">'. $data['distr'] . '</td>' ;
				echo '<td align="center">'. $data['start'] . '</td>' ;
				echo '<td align="center">'. $data['cost'] . '</td>' ;
				if ($data['path'] != "ТЗ не прикреплено")
					echo '<td align="center"><a target="_blank"  href="'. $data['path'] .'">'. $data['path'] . '</a></td>' ;
				else 
					echo '<td align="center">'. $data['path'] . '</td>' ;
				echo '<td align="center">'. $data['flag'] . '</td>' ;
				echo '<tr>' ;
  				}
			echo '</table>' ;
			logwrite("good", "Страница выведена успешно ". __FILE__);

	}
	else {
		echo "Для данной компании нет заказов";
		logwrite("good", "Страница выведена успешно(нет заказов) ". __FILE__);
	}
	?>
</div>

<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>
<!-- -->