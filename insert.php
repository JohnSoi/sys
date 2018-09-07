<!-- Ввод нового клиента, пользователя или проекта -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--   Динамическая страница ввода новых данных	 -->
<!--    с флагами, для определения функционала 	 -->
<!-- 	--------------------------------------	 -->
<!--   		   Весь функционал реализован		 -->
<!-- 	--------------------------------------	 -->

<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
?>

<!-- Обработка формы и добавление данных в БД -->
<?php
	if(isset($_POST["register"]))
	{
		//Добавление клиентов 
		if ($_SESSION['flag'] == 1){
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['name']) && !empty($_POST['namecompany']) 
				&& !empty($_POST['spher']) && !empty($_POST['tel']) ) 
			{
				$name=$_POST['name'];
				$namecompany=$_POST['namecompany'];
				$spher=$_POST['spher'];
				$tel = $_POST['tel'];
				$mail=$_POST['mail'];
				$query=mysql_query("SELECT * FROM clienttbl WHERE 
				fio= '".$name."' and company = '".$namecompany."'") 
				or  trigger_error($mes = mysql_error());
				$numrows=mysql_num_rows($query);
	
				if($numrows==0)
				{
					/*--- Добавления значений из полей ввода ---*/
					$sql="INSERT INTO clienttbl
						(fio, company, spher, telephone, mail) 
						VALUES('$name','$namecompany','$spher','$tel','$mail')";
					$result=mysql_query($sql) or  trigger_error($mes = mysql_error());
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result)
					{
	 					$messagegood = "Клиент успешно создан!";
	 					logwrite("operation", "Создан новый клиент ".$name);
						echo '
							<script language="JavaScript">
								setTimeout (function(){self.location="clients.php";}, 1500);
							</script>
							';
					} 
					else 
					{
						$message = "Ошибка заполнения!";
					}
				} 
				else
				{
	 				$message = "Клиент уже существует!";
	 				logwrite("error","Клиент существует");
				}
			} 
			else
			{
	 			$message = "Заполните все поля!";
	 			logwrite("error","Незаполненые поля ".__FILE__);
			}
		}
		//Добавление проектов
		elseif ($_SESSION['flag'] == 2){
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['name']) && !empty($_POST['namecompany']) && !empty($_POST['start']) && !empty($_POST['finish']) && !empty($_POST['cost'])) 
			{
				$name=$_POST['name'];
				$company=$_POST['namecompany'];
				$dist=$_POST['dist'];
				$start = $_POST['start'];
				$finish=$_POST['finish'];
				$cost=$_POST['cost'];
				if(!empty($_FILES['filename']))
				{
					$idmax = mysql_query('SELECT * from project');
					while($data = mysql_fetch_array($idmax))
					{
						$maxid = $data['id'];
					}
					$maxid = $maxid + 1;
					$tmp_name = $_FILES["filename"]["tmp_name"];
					$type = end(explode(".", $_FILES["filename"]["name"]));
					if (!empty ($type))
					{
						$_FILES["filename"]["name"] = 'tz'.$maxid.'.'.$type;
						$namef = $_FILES["filename"]["name"];
						move_uploaded_file($tmp_name, "doc/$namef");
						$path = 'doc/'.$namef;	
					}
					else
						$path = 'ТЗ не прикреплено';
				}
				$query=mysql_query("SELECT * FROM project WHERE 
				name= '".$name."' and company = '".$company."'");
				$numrows=mysql_num_rows($query);
				if($numrows==0)
				{
					/*--- Добавления значений из полей ввода ---*/
					$sql="INSERT INTO project
						(name, company, distr, start, finish, cost, path, flag) 
						VALUES('$name','$company','$dist','$start','$finish', '$cost','$path', 'Не выполнен')";
					$q=1;
					$query1=mysql_query("UPDATE `clienttbl` SET `sum_project` = `sum_project` + '$q' WHERE `company`='$company'") or  trigger_error($mes = mysql_error());
					$result=mysql_query($sql) or  trigger_error($mes = mysql_error());
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result)
					{
	 					$messagegood = "Проект успешно создан!";
							logwrite("operation", "Создан новый проект ".$name);

									echo '
										<script language="JavaScript">
											setTimeout (function(){self.location="project.php";}, 1500);
										</script>
										';
					} 
					else 
					{
						$message = "Ошибка заполнения!";
					}
				} 
				else{
	 				$message = "Проект уже существует!";
	 				logwrite("error","Проект существует");
				}
			} 
			else
			{
	 			$message = "Заполните все поля!";
	 			logwrite("error","Незаполенные поля ".__FILE__);
			}
		}
		//Добавление пользователей
		elseif ($_SESSION['flag'] == 3){
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['name']) && !empty($_POST['password'])) 
			{
				$login=$_POST['name'];
				$password=$_POST['password'];
				$query=mysql_query("SELECT * FROM usertbl WHERE 
				username= '".$login."' and password = '".$password."'") or  trigger_error($mes = mysql_error());
				$numrows=mysql_num_rows($query);
	
				if($numrows==0)
				{
					/*--- Добавления значений из полей ввода ---*/
					$sql="INSERT INTO usertbl
						(username, password) 
						VALUES('$login','$password')";
					$result=mysql_query($sql) or  trigger_error($mes = mysql_error());
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result)
					{
	 					$messagegood = "Пользователь успешно создан!";
	 				 	logwrite("operation", "Создан новый пользователь ".$login);
						echo '
							<script language="JavaScript">
								setTimeout (function(){self.location="service.php";}, 1500);
							</script>
							';			
					} 
					else {
						$message = "Ошибка заполнения!";
					}
				} 
				else
				{
	 				$message = "Пользователь уже существует!";
	 				logwrite("error","Пользователь существует");
				}
			} 
			else{
	 			$message = "Заполните все поля!";
	 			logwrite("error","Незаполненные поля ".__FILE__);
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
			logwrite("error",$mes);
	}
?>

<!-- Верхняя каотинка -->
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
	//Получение флага и передача его в сессию
	if (isset($_GET['flag']))
		$_SESSION['flag'] = $_GET['flag'];
		logwrite("access", "Пользователь перешел на страницу Добавления с флагом ". $_SESSION['flag']);
	//Форма добавления клиента
	if ($_SESSION['flag'] == 1){
		echo'
		<div id="main">
			<h1>Регистрация нового клиента</h1>
		<form name="registerform" id="registerform1" action="insert.php" method="post">
			<p>
				<label for="name">ФИО клиента<br />
				<input type="text" name="name" id="name" class="input" autocomplete="off" size="32" /></label>
			</p>
			<p>
				<label for="namecompany">Название компании<br />
				<input type="text" name="namecompany" id="namecompany" class="input" size="32" /></label>
			</p>
			<p>
				<label for="spher">Сфера деятельности<br />
				<input type="text" name="spher" id="spher" class="input" size="32" /></label>
			</p>
            <p>
				<label for="tel">Номер Телефона<br />
				<input type="tel" name="tel" id="tel" class="input" size="32"/></label>
			</p>
			<p>
				<label for="mail">Электронная почта<br />
				<input type="email" name="mail" id="mail" class="input" size="32" value="No@email.com"/></label>
			</p>
			<p class="submit">
				<input type="submit" name="register" id="register" class="button" value="Зарегистрировать" />
			</p>
		</form>
		</div>';
	}
	//Форма добавления проекта
	elseif ($_SESSION['flag'] == 2){
		echo'
		<div id="main">
			<h1>Регистрация нового проекта</h1>
		<form name="registerform" id="registerform1" action="insert.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="name">Название проекта<br />
				<input type="text" name="name" id="name" autocomplete="off" class="input" size="32" /></label>
			</p>
			<p>
				<label for="namecompany">Компания заказчик<br />
				<select name="namecompany">';
				$qr_result = mysql_query("select company from clienttbl") 
    			or die(mysql_error());
				while($data = mysql_fetch_array($qr_result)){
					echo '<option value = "'.$data['company'].'">'.$data['company'].'</option>';
				}
				echo '</select>
				</label>
			</p>
			<p>
				<label for="spher">Описание<br />
				<input type="text" name="dist" id="dist" class="input" size="32" /></label>
			</p>
            <p>
				<label for="tel">Дата начала<br />
				<input type="date" data-lang="ru" name="start" id="start" class="input" size="32"/></label>
			</p> 
			<p>
				<label for="mail">Дата окончания<br />
				<input type="date" name="finish" id="finish" class="input" size="32" /></label>
			</p>
			<p>
				<label for="mail">Стоимость<br />
				<input type="text" name="cost" id="cost" class="input" size="32" /></label>
			</p>
			<input type="range" min=0 max=50000 step="100" oninput="fun1()" id="r1">
			<p>
				<label for="mail">Путь к ТЗ (Только PDF, DOC, DOCX)<br />
				</label>
				<input type="file" name="filename" id="filename" >
				<span class="mess" id="mess">Поддерживаются форматы PDF, DOC, DOCX</span>
			</p>
			<p class="submit">
				<input type="submit" name="register" id="register" class="button" value="Добавить проект" />
			</p>
		</form>
		</div>
		<script>
			var type = document.getElementById("filename");
			var val = type.value;


			type.oninput = function(event){
				var typ = event.target.value.split(\'.\').pop();
				if ((typ == \'doc\') || (typ == \'docx\') ||(typ == \'pdf\'))
				{
					document.getElementById(\'mess\').style.display = "none";
					document.getElementById(\'register\').style.display = "block";
				}
				else
				{
					document.getElementById(\'mess\').style.display = "block";
					document.getElementById(\'register\').style.display = "none";
				}
				}
		</script>';
	}
	//Форма добавления пользователя
	elseif ($_SESSION['flag'] == 3){
		echo'
		<div id="main">
			<h1>Регистрация нового пользователя</h1>
		<form name="registerform" id="registerform1" action="insert.php" method="post">
				<p>
				<label for="name">Логин<br />
				<input type="text" name="name" id="name" class="input" autocomplete="off" size="32" /></label>
			</p>
			<p>
				<label for="password">Пароль<br />
				<input type="password" name="password" id="password" class="input" size="32" /></label>
			</p>
			<p class="submit">
				<input type="submit" name="register" id="register" class="button" value="Зарегистрировать" />
			</p>
		</form>
		</div>';
	}
	//Форма ошибки
	else{
		logwrite("error","Противоправное действие ".__FILE__);
		echo'
		<div id="main">
			<h1>Внимание! Противоправное действие. <br> Пожалуйста, покиньте страницу</h1>
		</div>';
			echo '
				<script language="JavaScript">
					setTimeout (function(){self.location="login.php";}, 3000);
				</script>
				';}
?>
<!-- Подключение скриптов -->
<script src="js/fun.js"></script>
<script src="js/jquery.maskedinput.min.js"></script>
<script type="text/javascript">
	jQuery(function($) {
		$("#tel").mask("+7 (999) 999-99-99");
		});
</script>
<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>
