<!-- Регистрация нового документа -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--  Форма добавления нового документа в журнал -->
<!-- 	--------------------------------------	 -->
<!-- 			Функционал реализован			 -->
<!-- 	--------------------------------------	 -->

<!-- Подключение сторонних файлов -->
<?php
	include("includes/includes.php");
	logwrite("access", "Пользователь перешел на страницу Добавления документа");

	if(isset($_POST["register"])){
		//Добавление документа
			/*--- Проверка на непустоты полей ---*/
			if(!empty($_POST['dist']) && !empty($_POST['namecompany']) && !empty($_POST['typedoc']) && !empty($_POST['date']) ) {
				$name=$_POST['dist'];
				$namecompany=$_POST['namecompany'];
				$typedoc=$_POST['typedoc'];
				$date = $_POST['date'];
				$query=mysql_query("SELECT * FROM documents WHERE 
				name= '".$name."' and company = '".$namecompany."' and date = '".$date."'") or  trigger_error($mes = mysql_error());
				$numrows=mysql_num_rows($query);
	
				if($numrows==0){
					/*--- Добавления значений из полей ввода ---*/
					$sql="INSERT INTO documents
						(type, name, date, company) 
						VALUES('$typedoc','$name','$date','$namecompany')";
					$result=mysql_query($sql) or  trigger_error($mes = mysql_error());
					/*--- Проверка на успешность и обработка ошибок ---*/
					if($result){
	 					$messagegood = "Документ зарегестрирован!";
	 					logwrite("operation","Был зарегестрирован документ с именем ".$name);
									echo '
										<script language="JavaScript">
											setTimeout (function(){self.location="doc.php";}, 3000);
										</script>
										';
			
					} 
					else {
						$message = "Ошибка заполнения!";
						logwrite("error",$mes);
					}

				} 
				else{
	 				$message = "Документ уже существует!";
	 				logwrite("error", "Документ уже существует ".__FILE__);
				}

			} 
			else{
	 			$message = "Заполните все поля!";
	 			logwrite("error", "Незаполненые поля ".__FILE__);
			}
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

<!-- основной блок -->
<div id='main'>
	<h1>Регистрация нового документа</h1>
		<form name="registerform" id="registerform1" action="docnew.php" method="post" enctype="multipart/form-data">
			<p>
				<label for="namecompany">Компания заказчик<br />
				<select name="namecompany">
					<option value='Нет компании'>Нет компании</option>
					<?php
						$qr_result = mysql_query("select company from clienttbl") 
    						or die(mysql_error());
						while($data = mysql_fetch_array($qr_result)){
							echo '<option value = "'.$data['company'].'">'.$data['company'].'</option>';
				}
				?>
				</select>
				</label>
			</p>
			<p>
				<label for="typedoc">Тип документа<br />
				<select name="typedoc">
					<option value='Акт'>Акт</option>
					<option value='Доверенность'>Доверенность</option>
					<option value='Письмо'>Письмо</option>
					<option value='Справка'>Справка</option>
					<option value='Договор'>Договор</option>
					<option value='Счет'>Счет</option>
					<option value='Протокол'>Протокол</option>
					<option value='Заявление'>Заявление</option>
					<option value='Прочее'>Прочее</option>
				</select>
				</label>
			</p>
			<p>
				<label for="dist">Номер на документе<br />
				<input type="text" name="dist" id="dist" class="input" size="32" /></label>
			</p>
            <p>
				<label for="date">Дата подписания<br />
				<input type="date" data-lang="ru" name="date" id="date" autocomplete="on" class="input" size="32"/></label>
			</p> 
			<p class="submit">
				<input type="submit" name="register" id="register" class="button" value="Добавить документ" />
			</p>
		</form>
		<?php
			logwrite("good", "Страница выведена успешно ". __FILE__);
		?>
</div>

<!-- Подвал и сообщения -->
<?php include("includes/footer.php"); ?>