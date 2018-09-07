<?php
		if(isset($_GET['search']))
		{
			echo"<script>
			document.getElementById('table').style.display = \"none\";
			document.getElementById('main').innerHTML='";
				$search = $_GET['search'];
	
    			$resultcl = mysql_query(("SELECT * FROM `clienttbl` WHERE `fio` LIKE '%".$search."%' OR `spher` LIKE '%".$search."%'  OR `telephone` LIKE '%".$search."%'")) or die(mysql_error());
    			$resultpr = mysql_query("SELECT * FROM `project` WHERE `name` LIKE '%".$search."%' OR `company` LIKE '%".$search."%'") or die(mysql_error());
    			$resultdoc = mysql_query ("SELECT * FROM `documents` WHERE `name` LIKE '%".$search."%' OR `type` LIKE '%".$search."%'") or die(mysql_error());
    			echo '<h1>Поиск по клиентам</h1>';
    			if (mysql_num_rows($resultcl) != 0)
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
  					while($data = mysql_fetch_array($resultcl))
					{
  						echo  '<td><a href="edit.php?flag=1&id='.$data['id'].'">'. $data['fio'] .'</a></td>';
   						echo '<td>'. $data['company'] . '</td>' ;
						echo '<td>'. $data['spher'] . '</td>' ;
						echo '<td><a href="tel:'. $data['telephone'] .'">'. $data['telephone'] . '</a></td>' ;
						echo '<td><a href="mail:'. $data['mail'] .'">'. $data['mail'] . '</a></td>' ;
						echo '<td><a href="input.php?company='.$data['company'].'">'.$data['sum_project'] . '</a></td>'		 ;
						echo '<td><a href="delete.php?flag=1&id='.$data['id'].'"><img width = "40%" src="img/del.png"></a></td>';
						echo '<tr>' ;
  					}
					echo '</table>';
    			}
    			else
    			{
    				echo "<h2 align = \"center\">Не дал результатов</h2>";
    			}

    			echo '<h1>Поиск по проектам</h1>';

    			if (mysql_num_rows($resultpr) != 0)
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
  					while($data = mysql_fetch_array($resultpr))
					{
  						echo  '<td align="center"><a href="edit.php?flag=2&id='.$data['id'].'">'. $data['name'] .'</a></td>';
   						echo '<td align="center">'. $data['company'] . '</td>' ;
						echo '<td align="center">'. $data['distr'] . '</td>' ;
						echo '<td align="center">'. $data['start'] . '</td>' ;
						echo '<td align="center">'. $data['finish'] . '</td>' ;
						echo '<td align="center">'. $data['cost'] . '</td>' ;
						if ($data['path'] != "ТЗ не прикреплено")
							echo '<td align="center"><a target="_blank"  href="'. $data['path'] .'">'. $data['path'] . '		</a></td>' ;
						else 
							echo '<td align="center">'. $data['path'] . '</td>' ;
						if ($data['flag'] == "Выполнен")
							echo '<td align="center">Выполнено</td>';
						else
						{
							echo '<td align="center"><a href="flag.php?id='. $data['id'] .'">Завершить</a></td>';
						}
						echo '<td align="center"><a href="delete.php?flag=2&id='.$data['id'].'&company='. $data['company'] . 		'"><img width = "40%" src="img/del.png"></a></td>';
						echo '<tr>' ;
  					}
					echo '</table>' ;
    			}
    			else
   				{
 					echo "<h2 align = \"center\">Не дал результатов</h2>";
    			}
    			echo '<h1>Поиск по документам</h1>';
    			if (mysql_num_rows($resultdoc) != 0)
   				{
    				echo '<table align="center">' ;
					echo  '<td> Номер </td>';
					echo  '<td> Вид документа</td>';
					echo  '<td> Наименование</td>';
					echo  '<td> Дата подписания</td>';
					echo  '<td> Компания</td>';
					echo  '<td> Удалить</td>';
					echo '<tr>';
  					while($data = mysql_fetch_array($resultdoc))
					{
   						echo  '<td><a href="edit.php?flag=3&id='.$data['id'].'">'. $data['id'] .'</a></td>';
						echo '<td>'. $data['type'] . '</td>' ;
						echo '<td>'. $data['name'] . '</td>' ;
						echo '<td>'. $data['date'] . '</td>' ;
						echo '<td>'. $data['company'] . '</td>' ;
						echo '<td><a href="delete.php?flag=3&id='.$data['id'].'"><img width = "40%" src="img/	del.png"></a></td>';
		        		echo '<tr>' ;
  					}
					echo '</table>' ;
					echo '<a href="#" onclick="history.back();return false;">Назад</a>';

    			}
    			else
    			{
    				echo "<h2 align = \"center\">Не дал результатов</h2>";
					echo '<a href="#" onclick="history.back();return false;">Назад</a>';
    			}

    			echo "';
    		</script>";
		}
?>

<div class="search">
	<form action="" method="get">
  	<input name="search" placeholder="Искать здесь..." type="search">
  	<button name="searchstart" type="submit">Поиск</button>
	</form>
</div>