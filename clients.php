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
	if (isset($_SESSION['flag']))
			unset($_SESSION['flag']);
	if (isset($_SESSION['id']))
			unset($_SESSION['id']);
	if (isset($_GET['sort']))
	{
		$_SESSION['sort'] = $_GET['sort'];
		$sort = $_SESSION["sort"];}
		else
			$sort = 0;
?>
<!-- Основной блок с выводом таблицы -->
<div id='main'>
	<h1>Клиентская база</h1>
	<div id="table">
	<p align="center">Сортировать по:
		<?php
		if ($sort == 1)
			{echo'<a href="clients.php?sort=1" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По фамилии</a>
							<a href="clients.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По количеству проектов</a>
							<a href="clients.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица отсортирована по фамилии");}
		elseif ($sort == 2)
		{echo '
						<a href="clients.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По фамилии</a>
						<a href="clients.php?sort=2" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По количеству проектов</a>
						<a href="clients.php?sort=0" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
						logwrite("good","Таблица отсортирована по количеству проектов");}
		else
			{echo '
							<a href="clients.php?sort=1" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По фамилии</a>
							<a href="clients.php?sort=2" style = "text-decoration: none; border: 2px solid white; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;">По количеству проектов</a>
							<a href="clients.php?sort=0" style = "text-decoration: none; border: 2px solid red; color: black; border-radius: 7px; margin-right: 5px; margin-left: 5px; padding: 4px;"> По ИД </a>';
							logwrite("good","Таблица отсортирована по ид");}?>
	</p>
	<?php
		include('includes/search.php');
		logwrite("access", "Пользователь перешел на страницу Клиенты");
		if($sort == 1)
			$qr_result = mysql_query("select * from clienttbl order by fio") 
    			or  trigger_error($mes = mysql_error());
    	elseif ($sort == 2)
    		 $qr_result = mysql_query("select * from clienttbl order by sum_project DESC") or  trigger_error($mes = mysql_error());
    	else 
    		$qr_result = mysql_query("select * from clienttbl") 
    			or  trigger_error($mes = mysql_error());  
		if(mysql_num_rows($qr_result)!= 0)
		{
			echo '<table align="center">' ;
			echo  '<td> ФИО </td>';
			echo  '<td> Компания</td>';
			echo  '<td class="long"> Сфера деятельности </td>';
			echo  '<td>Номер телефона</td>';
			echo  '<td>Почта</td>';
			echo  '<td>Количество проектов</td>';
			echo  '<td>Удалить</td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($qr_result))
			{
  				echo  '<td><a href="edit.php?flag=1&id='.$data['id'].'">'. $data['fio'] .'</a></td>';
   				echo '<td>'. $data['company'] . '</td>' ;
				echo '<td>'. $data['spher'] . '</td>' ;
				echo '<td><a href="tel:'. $data['telephone'] .'">'. $data['telephone'] . '</a></td>' ;
				echo '<td><a href="mail:'. $data['mail'] .'">'. $data['mail'] . '</a></td>' ;
				echo '<td><a href="input.php?company='.$data['company'].'">'.$data['sum_project'] . '</a></td>' ;
				echo '<td><a href="delete.php?flag=1&id='.$data['id'].'"><img width = "40%" src="img/del.png"></a></td>';
				echo '<tr>' ;
  				}
			echo '</table>' ;
			logwrite("good", "Страница выведена успешно. ".__FILE__);
		}
		else
			$message =  'Нет данных о клиентской базе!';
		if (empty($mes))
				$mes = "Нет данных  о клиентской базе";
			logwrite("error", $mes);
	?>
	</div>
</div>

<!-- Подвал -->
<?php include("includes/footer.php"); ?>
