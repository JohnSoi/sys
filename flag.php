<!-- Установка флага проекта на Выполнено -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!-- 	  Файл, меняющий статус проекта на  	 -->
<!-- 	 			Выполнено					 -->
<!-- 	--------------------------------------	 -->
<!-- 			Функционал реализован			 -->
<!-- 	--------------------------------------	 -->


<?php
include('includes/session.php');
include('includes/connection.php');
include('includes/log.php');

$id = $_GET['id'];

mysql_query("UPDATE `project` SET `flag` = 'Выполнен' WHERE id='$id'") or  trigger_error($mesql = mysql_error());

if(!empty($mesql))
	logwrite("error", $mesql);
else
	logwrite("operation", "Был выполнен проект с ID ".$id);
logwrite("good","Выполнено изменение статуса проекта");

header("Location: project.php");
