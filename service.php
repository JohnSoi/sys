<!-- Страница управления и настроек -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   Страница управления учетными записями 	 -->
<!-- 	--------------------------------------	 -->
<!--       		Функционал реализован			 -->
<!-- 	--------------------------------------	 -->


<?php
	include("includes/includes.php");
?>
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>
<br>
<?php
	include('includes/nav.php');
	logwrite("access", "Пользователь перешел на страницу Учетные записи");
?>

<div id='main'>
<h1>Учетные записи</h1>
	<?php
		$qr_result = mysql_query("select * from usertbl") 
    			or die(mysql_error());
		if(mysql_num_rows($qr_result)!= 0)
		{
			echo '<table align="center">' ;
			echo  '<td> Имя пользователя </td>';
			echo  '<td> Пароль </td>';
			echo  '<td> Удалить </td>';
			echo '<tr>';
  			while($data = mysql_fetch_array($qr_result))
			{
  				echo  '<td>'.$data['username'].'</td>';
   				echo '<td>'. $data['password'] . '</td>' ;
				echo '<td><a href="delete.php?flag=4&id='.$data['id'].'"><img width = "40%" src="img/del.png"></a></td>';
				echo '<tr>' ;
  				}
			echo '</table>' ;
		}
		else{
			$message =  'Нет данных об учетных записях!';
			$mes = 'Нет данных о пользователях';}
		logwrite("good", "Страница выведена успешно ". __FILE__);
		if(!empty($mes))
			logwrite("error",$mes);
	?>
	<a href="insert.php?flag=3" class="fciA navItem"><span class="fciSpan">Создать пользователя</span></a>
</div>

<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>
