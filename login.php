<!-- Страница авторизации -->

<!-- 	--------------------------------------	 -->
<!-- 	  Компания: ServicePro.Автоматизация	 -->
<!-- 	Исполнители: Старков Е. и Горбунова Н. 	 -->
<!-- 	--------------------------------------	 -->
<!--  Страница авторизации в системе без доступа -->
<!--    		при отсутствии авторизации 	 	 -->
<!-- 	--------------------------------------	 -->
<!--  			Функционал реализрван			 -->
<!-- 	--------------------------------------	 -->


<?php
/*--- Запуск сессии ---*/
	session_start();
/*---  ---*/
?>

<?php 
/*--- Подключение сторонних файлов ---*/
require_once("includes/connection.php"); 
include("includes/header.php"); 
include ('includes/log.php');
logwrite("access", "Пользователь перешел на страницу Авторизации");
/*---  ---*/
?>

<?php
	/*--- Если авторизован, перейти на страницу ---*/
	if(isset($_SESSION["session_username"]))
	{
	//echo "Session is set"; // Для тестирования
	logwrite("good", "Пользователь уже авторизован ".$_SESSION["session_username"]);
	header("Location: main.php");
	}
	/*---  ---*/
	
	/*---	Поиск логина и пароля  ---*/
	if(isset($_POST["login"]))
	{

		if(!empty($_POST['username']) && !empty($_POST['password'])) 
		{
    		$username=$_POST['username'];
    		$password=$_POST['password'];

			echo  '<td> Описание</td>';
    		$query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'") ;

   			$numrows=mysql_num_rows($query);
			
    		if($numrows!=0)
    		{
   				while($row=mysql_fetch_assoc($query))
    			{
    				$dbusername=$row['username'];
    				$dbpassword=$row['password'];
    			}
				
    			if($username == $dbusername && $password == $dbpassword)
    			{
					$_SESSION['session_username']=$username;
					logwrite("good", "Пользователь авторизован ".$_SESSION["session_username"]);
					/* Переход */
    				header("Location: index.php");
    			}
    		}
			/*--- Оброботчик ошибок ---*/
			else 
			{
				$message =  "Неверный логин и пароль. Проверьте введенные данные!";
				$mes = "Неверные данные при авторизации";
    		}

		} 
		
		else 
		{
   			$message = "Пожалуйста, заполните все поля!";
   			$mes = "Незаполненые поля ">__FILE__;
		}
		if(!empty($mes))
			logwrite("error",$mes);
	}
	/*---  ---*/
?>
<div id="image">
	<a href="http://www.ser-pro.ru" target="_blank"><img width="80%" src="img/4.png"></a>
</div>
<br>
<div id="login">
	<h1>Welcome</h1>
		<form name="loginform" id="loginform" action="" method="POST">
    		<p>
        		<label for="user_login">Логин<br />
        		<input type="text" name="username" id="username" class="input" value="" size="20" /></label>
    		</p>
    		<p>
        		<label for="user_pass">Пароль<br />
        		<input type="password" name="password" id="password" class="input" value="" size="20" required /></label>
   			</p>
        	<p class="submit">
        		<input type="submit" name="login" class="button" value="Войти" />
    		</p>
		</form>

</div>
	<!-- Подвал и сообщения -->
<?php 
logwrite("good", "Страница выведена успешно ". __FILE__);
include("includes/footer.php"); ?>	