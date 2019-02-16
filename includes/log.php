<!-- Файл создания логов -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   		  	   Функция записи логов 		 -->
<!-- 	--------------------------------------	 -->
<!-- 			 Функционал реализован      	 -->
<!-- 	--------------------------------------	 -->
<?php
function logwrite($type, $message)
{
	if ((!file_exists("log/error.txt")) or (count(file("log/error.txt"))>300))
	{
		fopen("log/error.txt", "w");
	}
	if ((!file_exists("log/good.txt")) or (count(file("log/good.txt"))>300))
	{
		fopen("log/good.txt", "w");
	}
	if ((!file_exists("log/access.txt")) or (count(file("log/access.txt"))>800))
	{
		fopen("log/access.txt", "w");
	}
	if ((!file_exists("log/operation.txt")) or (count(file("log/operation.txt"))>800))
	{
		fopen("log/operation.txt", "w");
	}



	if ($type == "error")
	{
		$write = "[".date("d.m.y H:i")."] [ERROR] ".$message."\n";
		$fp = fopen("log/error.txt", "a+"); // Открываем файл в режиме записи 
		fwrite($fp, $write); // Запись в файл
		fclose($fp); //Закрытие файла
	}
	elseif ($type == "good")
	{
		$write = "[".date("d.m.y H:i")."] [GOOD] ".$message."\n";
		$fp = fopen("log/good.txt", "a+"); // Открываем файл в режиме записи 
		fwrite($fp, $write); // Запись в файл
		fclose($fp); //Закрытие файла
	}
	elseif ($type == "access")
	{
		$write = "[".date("d.m.y H:i")."] [ACCESS] ".$message."\n";
		$fp = fopen("log/access.txt", "a+"); // Открываем файл в режиме записи 
		fwrite($fp, $write); // Запись в файл
		fclose($fp); //Закрытие файла
	}
	elseif ($type == "operation")
	{
		$write = "[".date("d.m.y H:i")."] [OPERATION] ".$message."\n";
		$fp = fopen("log/operation.txt", "a+"); // Открываем файл в режиме записи 
		fwrite($fp, $write); // Запись в файл
		fclose($fp); //Закрытие файла
	}
}