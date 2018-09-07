<!-- Страница вывода текущих проектов -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   Страница вывода проектов, находящихся 	 -->
<!--  				 на исполнении 	 			 -->
<!-- 	--------------------------------------	 -->
<!--       Добавить вывод проектов, которые		 --> 
<!--         выполняються в данный момент  		 -->
<!-- 	 файлов. Добавить проверку расширения	 -->
<!-- 	--------------------------------------	 -->

<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
?>

<!-- Верхняя каотинка -->
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>

<br>

<!-- Подключение меню -->
<?php
	include("includes/nav.php");
	logwrite("access", "Пользователь перешел на страницу Текущие Проекты");
?>

<!-- основной блок -->
<div id='main'>
<?php
	$query = mysql_query("SELECT * FROM project WHERE flag != 'Выполнен'")or  trigger_error($mes = mysql_error());
?>
<h1>На текущий момент 
	<?php 
		$num = mysql_num_rows($query);
		if ($num == 1)
			echo "имеется ".$num." заказ";
		elseif (($num >=2) and ($num <= 4)) 
			echo "имеются ".$num." заказа";
		else
			echo "имеются ".$num." заказов";
	?> в работе</h1>
	<?php
		if(mysql_num_rows($query)!= 0)
		{
			echo '<table align="center">' ;
			echo  '<td align="center"> Название </td>';
			echo  '<td align="center"> Компания</td>';
			echo  '<td align="center"> Описание</td>';
			echo  '<td align="center"> Дата начала</td>';
			echo  '<td align="center"> Дата окончания</td>';
			echo  '<td align="center"> Стоимость</td>';
			echo  '<td align="center"> Путь к ТЗ</td>';
			echo  '<td align="center"> Статус</td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($query))
			{
  				echo  '<td align="center"><a href="edit.php?flag=2&id='.$data['id'].'">'. $data['name'] .'</a></td>';
   				echo '<td align="center">'. $data['company'] . '</td>' ;
				echo '<td align="center">'. $data['distr'] . '</td>' ;
				echo '<td align="center">'. $data['start'] . '</td>' ;
				echo '<td align="center">'. $data['finish'] . '</td>' ;
				echo '<td align="center">'. $data['cost'] . '</td>' ;
				if ($data['path'] != "ТЗ не прикреплено")
					echo '<td align="center"><a target="_blank"  href="'. $data['path'] .'">'. $data['path'] . '</a></td>' ;
				else 
					echo '<td align="center">'. $data['path'] . '</td>' ;
				if ($data['flag'] == "Выполнен")
					echo '<td align="center">Выполнено</td>';
				else
				{
					echo '<td align="center"><a href="flag.php?id='. $data['id'] .'">Завершить</a></td>';
				}
				echo '<tr>' ;
  				}
			echo '</table>' ;
		}
		else
			$messagegood =  'Поздравляю! Вы можете отдохнуть!';
		logwrite("good", "Страница выведена успешно ". __FILE__);
		if(!empty($mes))
			logwrite("error",$mes);
	?>
</div>
<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>
