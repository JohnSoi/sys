<!-- Вывод информации о проектах -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   		  Страница вывода всех проектов 	 -->
<!-- 	--------------------------------------	 -->
<!-- 			 Функционал реализован      	 -->
<!-- 	--------------------------------------	 -->


<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
?>

<!-- ЛОготип -->
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>

<br>

<!-- Меню и обнуление сессии-->
<?php
	include("includes/nav.php");
	if (isset($_SESSION['flag']))
			unset($_SESSION['flag']);
	if (isset($_SESSION['id']))
			unset($_SESSION['id']);
	if (isset($_SESSION['com']))
		unset($_SESSION['com']);
		if (isset($_GET['sort']))
	{
		$_SESSION['sort'] = $_GET['sort'];
		$sort = $_SESSION["sort"];}
		else
			$sort = 0;
?>

<!-- Основной блок с выводом таблицы -->
<div id='main'>
	<h1>Проектная база</h1>
	<div id="table">
	<p align="center">Сортировать по:
		<?php
		if ($sort == 1)
			{echo'<a href="project.php?sort=1" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По названию</a>
							<a href="project.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По компании</a>
							<a href="project.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица отсортирована по Названию");}
		elseif ($sort == 2)
			{echo '
							<a href="project.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По названию</a>
							<a href="project.php?sort=2" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По компании</a>
							<a href="project.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица отсортирована по Компании");}
		else
			{echo '
							<a href="project.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По названию</a>
							<a href="project.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По компании</a>
							<a href="project.php?sort=0" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица отсортирована по ИД");}?>
	</p>
	<?php
		include('includes/search.php');
		logwrite("access", "Пользователь перешел на страницу Проекты");
		if($sort == 1)
			$qr_result = mysql_query("select * from project order by name") 
    			or  trigger_error($mes = mysql_error());
    	elseif ($sort == 2)
    		 $qr_result = mysql_query("select * from project order by conmpany") or  trigger_error($mes = mysql_error());
    	else 
			$qr_result = mysql_query("select * from project") 
    			or  trigger_error($mes = mysql_error());
		if(mysql_num_rows($qr_result)!= 0)
		{
			echo '<table class = "table-wrapper" align="center">' ;
			echo  '<td> Название </td>';
			echo  '<td> Компания</td>';
			echo  '<td> Описание</td>';
			echo  '<td> Дата начала</td>';
			echo  '<td> Дата окончания</td>';
			echo  '<td> Стоимость</td>';
			echo  '<td> Путь к ТЗ</td>';
			echo  '<td> Статус</td>';
			echo  '<td>Удалить</td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($qr_result))
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
				echo '<td align="center"><a href="delete.php?flag=2&id='.$data['id'].'&company='. $data['company'] . '"><img width = "40%" src="img/del.png"></a></td>';
				echo '<tr>' ;
  				}
			echo '</table>' ;
			logwrite("good", "Страница выведена успешно ". __FILE__);
		}
		else
		{
			$message =  'Нет данных о проектной базе!';
			if (empty($mes))
				$mes = "Нет данных в БД ". __FILE__;
			logwrite("error", $mes);
		}
	?>
</div>
</div>

<!-- Подвал -->
<?php include("includes/footer.php"); ?>