<!-- Страница вывода журнал регистрации документов -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--Таблица документов, находящихся в организации-->
<!--   с возможностью редактирования и удаления	 -->
<!-- 	--------------------------------------	 -->
<!-- 			Весь функционал реализован		 -->
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

<!-- Меню-->
<?php
	include("includes/nav.php");
			if (isset($_GET['sort']))
	{
		$_SESSION['sort'] = $_GET['sort'];
		$sort = $_SESSION["sort"];}
		else
			$sort = 0;
?>

<!-- Основной блок с выводом таблицы -->
<div id='main'>
	<h1>База документов</h1>
	<div id="table">
		<p align="center">Сортировать по:
		<?php
		if ($sort == 1)
			{echo'<a href="doc.php?sort=1" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По наименованию</a>
							<a href="doc.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По типу</a>
							<a href="doc.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица остортирована по наименованию");}
		elseif ($sort == 2)
			{echo '
							<a href="doc.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По наименованию</a>
							<a href="doc.php?sort=2" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По типу</a>
							<a href="doc.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица остортирована по типу");}
		else
			{echo '
							<a href="doc.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По наименованию</a>
							<a href="doc.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По типу</a>
							<a href="doc.php?sort=0" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица остортирована по ИД");}?>
	</p>
	<?php
	include ("includes/search.php");
		logwrite("access", "Пользователь перешел на страницу Документы");
				if($sort == 1)
			$qr_result = mysql_query("select * from documents order by name") 
    			or  trigger_error($mes = mysql_error());
    	elseif ($sort == 2)
    		 $qr_result = mysql_query("select * from documents order by type") or  trigger_error($mes = mysql_error());
    	else 
		$qr_result = mysql_query("select * from documents") 
    			or  trigger_error($mes = mysql_error());
		if(mysql_num_rows($qr_result)!= 0)
		{
			echo '<table align="center">' ;
			echo  '<td> Номер </td>';
			echo  '<td> Вид документа</td>';
			echo  '<td> Наименование</td>';
			echo  '<td> Дата подписания</td>';
			echo  '<td> Компания</td>';
			echo  '<td> Удалить</td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($qr_result))
			{
   				echo  '<td><a href="edit.php?flag=3&id='.$data['id'].'">'. $data['id'] .'</a></td>';
				echo '<td>'. $data['type'] . '</td>' ;
				echo '<td>'. $data['name'] . '</td>' ;
				echo '<td>'. $data['date'] . '</td>' ;
				echo '<td>'. $data['company'] . '</td>' ;
				echo '<td><a href="delete.php?flag=3&id='.$data['id'].'"><img width = "40%" src="img/del.png"></a></td>';
		        echo '<tr>' ;
  			}
			echo '</table>' ;
			logwrite("good", "Страница выведена успешно ". __FILE__);
		}
		else
		{
			$message =  'Нет данных о документах!';
			if (empty($mes))
				$mes = "Нет данных в БД ". __FILE__;
			logwrite("error", $mes);
		}
	?>
	</div>
</div>
<!-- Подвал -->
<?php include("includes/footer.php"); ?>