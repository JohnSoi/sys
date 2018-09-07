<!-- 	Изменение кдиентов, проектов, документов	-->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!-- 	Флаги и ИД храняться в сессиях, чтобы	 -->
<!-- 	  не терять значения при исполнении 	 -->
<!-- 	  кода. Каждый модуль и отображение		 -->
<!-- 	не зависят от остальных. Присутствует 	 -->
<!-- 	  защита от непроизвольного доступа		 -->
<!-- 	--------------------------------------	 -->
<!--        Весь функционал реализован   		 -->
<!-- 	--------------------------------------	 -->

<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
	if (isset($_GET['flag']))
		$_SESSION['flag'] = $_GET['flag'];
	if (isset($_GET['id']))
		$_SESSION['id'] = $_GET['id'];
	$id = $_SESSION['id'];
?>

<!-- Обработка формы и изменение данных в БД -->
<?php
	if(isset($_POST["edit"])){
		//Ввод измененого клиента	
		if ($_SESSION['flag'] == 1){
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['name']) && !empty($_POST['namecompany']) && !empty($_POST['spher']) && !empty($_POST['tel']) ) {
				$name=$_POST['name'];
				$namecompany=$_POST['namecompany'];
				$spher=$_POST['spher'];
				$tel = $_POST['tel'];
				$mail=$_POST['mail'];
				$query=mysql_query("SELECT * FROM clienttbl WHERE id='$id'") or  trigger_error($mes = mysql_error());;
				$numrows=mysql_num_rows($query);
	
				if($numrows==1){
					/*--- Добавления значений из полей ввода ---*/
					$result=mysql_query("UPDATE `clienttbl` SET `fio` = '$name', `company` = '$namecompany',`spher` = '$spher',`telephone` = '$tel',`mail` = '$mail' WHERE id='$id'") or  trigger_error($mes = mysql_error());
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result){
	 					$messagegood = "Клиент успешно изменен!";
	 					logwrite("operation", "Был изменен клиент с ID ".$id);
						echo '
							<script language="JavaScript">
								setTimeout (function(){self.location="clients.php";}, 1500);
							</script>
							';
					} 
					else {
						$message = "Ошибка заполнения!";
					}

				} 
				else{
	 				$message = "Клиент не существует!";
	 				$mes = 'Попытка редактирования несуществующего клиента';

				}

			} 
			else{
	 			$message = "Заполните все поля!";
	 			$mes = 'Незаполненость полей в клиентах';
			}
			
		}
		//Ввод измененого проекта
	elseif ($_SESSION['flag'] == 2){
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['name']) && !empty($_POST['namecompany']) && !empty($_POST['start']) && !empty($_POST['finish']) && !empty($_POST['cost'])) {
				$name=$_POST['name'];
				$namecompany=$_POST['namecompany'];
				$dist=$_POST['dist'];
				$start = $_POST['start'];
				$finish=$_POST['finish'];
				$cost=$_POST['cost'];
				$query=mysql_query("SELECT * FROM project WHERE 
				id='$id'") or  trigger_error($mes = mysql_error());;
				$numrows=mysql_num_rows($query);

				if(!empty($_SESSION['com']))
				{
					$com = $_SESSION['com'];
					if ($_SESSION['com'] != $namecompany)
					{
						$query1=mysql_query("UPDATE `clienttbl` SET `sum_project` = `sum_project` - 1 WHERE `company`='$com'") or  trigger_error($mes = mysql_error());;
						$query=mysql_query("UPDATE `clienttbl` SET `sum_project` = `sum_project` + 1 WHERE `company`='$namecompany'") or  trigger_error($mes = mysql_error());;
					}
				}
				if($numrows==1){
					/*--- Добавления значений из полей ввода ---*/
					$sql=("UPDATE project  SET `name` = '$name', `company` = '$namecompany',`distr` = '$dist',`start` = '$start',`finish` = '$finish', `cost` = '$cost'  WHERE id='$id'") or  trigger_error($mes = mysql_error());;
					$result=mysql_query($sql);
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result){
	 					$messagegood = "Проект успешно изменен!";
						logwrite("operation", "Был изменен проект с ID ".$id);
						echo '
							<script language="JavaScript">
								setTimeout (function(){self.location="project.php";}, 1500);
							</script>
						';
			
					} 
					else {
						$message = "Ошибка заполнения!";
					}

				} 
				else{
	 				$message = "Проект не существует!";
	 				$mes = 'Попытка редактирования несуществующего проекта';
				}

			} 
			else{
	 			$message = "Заполните все поля!";
	 			$mes = 'Незаполненость полей в проектах';
			}
		}
		//Ввод измененого документа
		elseif ($_SESSION['flag'] == 3){
			if(!empty($_POST['dist']) && !empty($_POST['namecompany']) && !empty($_POST['typedoc']) && !empty($_POST['date']) ) 
				$name=$_POST['dist'];
				$namecompany=$_POST['namecompany'];
				$typedoc=$_POST['typedoc'];
				$date = $_POST['date'];
				$query=mysql_query("SELECT * FROM documents WHERE id='$id'") or  trigger_error($mes = mysql_error());;
				$numrows=mysql_num_rows($query);
				
				if($numrows==1){
					/*--- Добавления значений из полей ввода ---*/
					$result=mysql_query("UPDATE `documents` SET `name` = '$name', `company` = '$namecompany',`date` = '$date',`type` = '$typedoc' WHERE id='$id'") or  trigger_error($mes = mysql_error());;
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result){
	 					$messagegood = "Документ успешно изменен!";
	 					logwrite("operation", "Был изменен документ с ID ".$id);
						echo '
							<script language="JavaScript">
								setTimeout (function(){self.location="doc.php";}, 1500);
							</script>
							';
					} 
					else {
						$message = "Ошибка заполнения!";
					}

				} 
				else{
	 				$message = "Документ не существует!";
	 				$mes = 'Попытка редактирования несуществующего документа';
				}

			} 
		}
?>

<!-- Верхняя картинка -->
<div id="imagemin">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="10%" src="img/4.png"></a>
</div>

<br>

<!-- Подключение меню -->
<?php
	include("includes/nav.php");
?>

<!-- Основной блок -->
<?php
	//Редактирование клиента
	if ($_SESSION['flag'] == 1){
		$query=mysql_query("SELECT * FROM clienttbl WHERE 
				id= '".$id."'");
		while($data = mysql_fetch_array($query)){
		echo'
		<div id="main">
			<h1>Редактирование клиента</h1>
		<form name="editform" id="editform1" action="edit.php" method="post">
			<p>
				<label for="name">ФИО клиента<br />
				<input type="text" name="name" id="name" class="input" size="32" value='.$data["fio"].' /></label>
			</p>
			<p>
				<label for="namecompany">Название компании<br />
				<input type="text" name="namecompany" id="namecompany" class="input" size="32" value='.$data["company"].' /></label>
			</p>
			<p>
				<label for="spher">Сфера деятельности<br />
				<input type="text" name="spher" id="spher" class="input" size="32" value='.$data["spher"].' /></label>
			</p>
            <p>
				<label for="tel">Номер Телефона<br />
				<input type="tel" name="tel" id="tel" class="input" size="32" value='.$data["telephone"].' /></label>
			</p>
			<p>
				<label for="mail">Электронная почта<br />
				<input type="email" name="mail" id="mail" class="input" size="32" value='.$data["mail"].' /></label>
			</p>
			<p class="submit">
				<input type="submit" name="edit" id="edit" class="button" value="Редактировать" />
			</p>
		</form>
		</div>';
		logwrite("good", "Страница выведена успешно (Редактирование клиента)". __FILE__);

		}
	}
	//Редактирование проекта
	elseif ($_SESSION['flag'] == 2){
		$query=mysql_query("SELECT * FROM project WHERE 
				id= '".$id."'");
		while($data = mysql_fetch_array($query)){
			if (empty($_SESSION['com']))
				$_SESSION['com'] = $data['company'];
			echo'
			<div id="main">
				<h1>Редактирование проекта</h1>
			<form name="registerform" id="registerform1" action="edit.php" method="post" enctype="multipart/form-data">
				<p>
					<label for="name">Название проекта<br />
					<input type="text" name="name" id="name" autocomplete="off" class="input" value="'.$data['name'].'" size="32" /></label>
				</p>
				<p>
					<label for="namecompany">Компания заказчик<br />
					<select name="namecompany">';
						echo '<option value = "'.$data['company'].'">'.$data['company'].'</option>';
						$qr_result = mysql_query("select company from clienttbl") 
    					or die(mysql_error());
						while($data1 = mysql_fetch_array($qr_result)){
							echo '<option value = "'.$data1['company'].'">'.$data1['company'].'</option>';
						}
					echo '</select>
					</label>
			</p>
			<p>
				<label for="spher">Описание<br />
				<input type="text" name="dist" id="dist" value="'.$data['distr'].'" class="input" size="32" /></label>
			</p>
            <p>
				<label for="tel">Дата начала<br />
				<input type="date" data-lang="ru" name="start" id="start" value="'.$data['start'].'" class="input" size="32"/></label>
			</p> 
			<p>
				<label for="mail">Дата окончания<br />
				<input type="date" name="finish" id="finish" class="input" value="'.$data['finish'].'" size="32" /></label>
			</p>
			<p>
				<label for="mail">Стоимость<br />
				<input type="text" name="cost" id="cost" class="input" value="'.$data['cost'].'" size="32" /></label>
			</p>
			<p class="submit">
				<input type="submit" name="edit" id="edit" class="button" value="Изменить проект" />
			</p>
		</form>
		</div>';
		logwrite("good", "Страница выведена успешно (Редактирование проекта)". __FILE__);

	}
	}
	//Редактирование журнала документов
	elseif ($_SESSION['flag'] == 3){
		$query=mysql_query("SELECT * FROM documents WHERE 
				id= '".$id."'");
		while($data = mysql_fetch_array($query)){
		echo '
		<div id="main">
			<form name="editform" id="editform1" action="edit.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="namecompany">Компания заказчик<br />
				<select name="namecompany">
					<option value=\'Нет компании\'>Нет компании</option>';
						$qr_result = mysql_query("select company from clienttbl") 
    						or die(mysql_error());
						while($data1 = mysql_fetch_array($qr_result)){
							if ($data['company'] == $data1['company'])
								echo '<option selected value = "'.$data1['company'].'">'.$data1['company'].'</option>';
							else
								echo '<option value = "'.$data1['company'].'">'.$data1['company'].'</option>';
				}
				echo '
				</select>
				</label>
			</p>
			<p>
				<label for="typedoc">Тип документа<br />
				<select name="typedoc" >';
					echo '<option selected value='.$data['type'].'>'.$data['type'].'</option>';
					echo'
					<option value=\'Акт\'>Акт</option>
					<option value=\'Доверенность\'>Доверенность</option>
					<option value=\'Письмо\'>Письмо</option>
					<option value=\'Справка\'>Справка</option>
					<option value=\'Договор\'>Договор</option>
					<option value=\'Счет\'>Счет</option>
					<option value=\'Протокол\'>Протокол</option>
					<option value=\'Заявление\'>Заявление</option>
					<option value=\'Прочее\'>Прочее</option>
				</select>
				</label>
			</p>
			<p>
				<label for="dist">Номер на документе<br />
				<input type="text" name="dist" id="dist" class="input" size="32" value="'.$data['name'].'"  /></label>
			</p>
            <p>
				<label for="date">Дата подписания<br />
				<input type="date" data-lang="ru" name="date" id="date" class="input" size="32" value="'.$data['date'].'"/></label>
			</p> 
			<p class="submit">
				<input type="submit" name="edit" id="edit" class="button" value="Изменить документ" />
			</p>
		</form>
		</div>';
		logwrite("good", "Страница выведена успешно (Редактирование документа)". __FILE__);
		}
	}
	//Непредвиденная ошибка
	else{
		echo '<h1>Внимание! Противоправное действие. <br> Пожалуйста, покиньте страницу</h1>';
		$mes = "Противоправное действие ".__FILE__;
		echo '
			<script language="JavaScript">
				setTimeout (function(){self.location="login.php";}, 3000);
			</script>
			';
	}
	if(!empty($mes))
		logwrite("error", $mes);
?>
<script src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
		jQuery(function($) {
		$("#tel").mask("+7 (999) 999-99-99");
		});
</script>
<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>
