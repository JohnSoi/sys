<!-- Удаление клиентов, проектов, документов -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!-- 	  Файл, удаляющий строку из БД по ИД.	 -->
<!-- 	 Флаг используется для удаления строки	 -->
<!-- 	  		  из нужной таблицы БД.			 -->
<!-- После выполнения ведет на прежнюю страницу	 -->
<!-- 	--------------------------------------	 -->
<!-- 			Весь функционал реализован		 -->
<!-- 	--------------------------------------	 -->


<?php
include('includes/session.php');
include('includes/connection.php');
include('includes/log.php');

logwrite("access", "Пользователь перешел на страницу Удаления");

#Удаление клиента
if ($_GET['flag'] == 1)
{
	$id = $_GET['id'];
	$query =mysql_query("DELETE FROM clienttbl WHERE id = '".$id."'") or  trigger_error($mesql = mysql_error());
	logwrite("operation", "Был удален клиент с ID ".$id);
	header('Location:clients.php');
}

#Удаление проекта
elseif ($_GET['flag'] == 2)
{
	$id = $_GET['id'];
	$company = $_GET['company'];
	$query =mysql_query("DELETE FROM project WHERE id = '".$id."'") or  trigger_error($mesql = mysql_error());
	$query1=mysql_query("UPDATE `clienttbl` SET `sum_project` = `sum_project` - 1 WHERE `company`='$company'") or  trigger_error($mes = mysql_error());
	logwrite("operation", "Был удален проект с ID ".$id);
	header('Location:project.php');
}
#Удаление документа
elseif ($_GET['flag'] == 3)
{
	$id = $_GET['id'];
	$query =mysql_query("DELETE FROM documents WHERE id = '".$id."'") or  trigger_error($mesql = mysql_error());
	logwrite("operation", "Был удален документ с ID ".$id);
	header('Location:doc.php');
}
#Удаление учетной записи
elseif ($_GET['flag'] == 4)
{
	$id = $_GET['id'];
	$query =mysql_query("DELETE FROM usertbl WHERE id = '".$id."'") or  trigger_error($mesql = mysql_error());
	logwrite("operation", "Был удален пользователь с ID ".$id);
	header('Location:service.php');
}
else
{
	echo '<h1>Внимание! Противоправное действие. <br> Пожалуйста, покиньте страницу</h1>';
	logwrite("error", "Попытка противоправного действия");
	echo '
	<script language="JavaScript">
		setTimeout (function(){self.location="login.php";}, 3000);
	</script>
	';
}
if (!empty($mesql))
	logwrite("error", $mesql);
?>