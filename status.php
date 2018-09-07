<html>
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
  	<?php
  		include('includes/includes.php');
  	?>
  	<style type="text/css">
  		body{
	 		background: url(img/gray-ornamic.png);
   			padding: 0px;
  			margin: 0px;
  			display: inline;
 			}

		.top{
			background: rgba(255,0,68,0.2);
			margin-left: 5%;
			width: 90%;
			border: 1px solid rgba(255,0,68,0.5);
			border-radius: 10px;
			text-align: center;
		}
		h1{
			font-size: 16px;
		}

		.main{
			background: rgba(12,0,20,0.5);
			margin-left: 5%;
			width: 90%;
			border-radius: 10px;
			color: white;
			padding: 5px;
		}
		ul{
			cursor: pointer;
		}
		.hid
		{
			display: none;
		}
  	</style>
    <div id="gradient">
    	<div class="top">
    		<h1>Диагностическая страница системы ведения деятельности<br>"ServicePro.Автоматизация"<br>VERSION: 1.0.256 beta</h1>
    		<script>
				function clock() {
				var d = new Date();
				var month_num = d.getMonth()
				var day = d.getDate();
				var hours = d.getHours();
				var minutes = d.getMinutes();
				var seconds = d.getSeconds();

				month=new Array("января", "февраля", "марта", "апреля", "мая", "июня",
				"июля", "августа", "сентября", "октября", "ноября", "декабря");

				if (day <= 9) day = "0" + day;
				if (hours <= 9) hours = "0" + hours;
				if (minutes <= 9) minutes = "0" + minutes;
				if (seconds <= 9) seconds = "0" + seconds;

				date_time = "Сегодня - " + day + " " + month[month_num] + " " + d.getFullYear() +
				" г.&nbsp;&nbsp;&nbsp;Текущее время - "+ hours + ":" + minutes + ":" + seconds;
				if (document.layers) {
				 document.layers.doc_time.document.write(date_time);
				 document.layers.doc_time.document.close();
				}
				else document.getElementById("doc_time").innerHTML = date_time;
				 setTimeout("clock()", 1000);
				}
    		</script>
    		<span id="doc_time">
			 Дата и время
			</span>
			<script type="text/javascript">
			 clock();
			</script>
    	</div>
    	<div class="main">
    		<h1 align="center">Проверка наличия файлов</h1>
    		<ol>
    			<ul id="css"><strong>CSS</strong>
    				<ol id="cssall" class="hid" style="border: 2px solid white; border-radius: 5px; padding: 2%;"">
    					<ul style="border-bottom: 2px solid black;"><span aligh="left">style.css</span><span style="float:right;"><?php
						if (file_exists("css/style.css"))
							echo '<span style="color:green; font-size: 18px;">[GOOD] 	</span>';
						else
							echo '<span style="color:red; font-size: 18px;">[BAD] 	</span>';
    					 ?></span></ul>
    				</ol>
    			</ul>
    			<ul id="inc"><strong>Includes</strong>
    				<ol id="incall" class="hid" style="border: 2px solid white; border-radius: 5px; padding-right: 2%;"">
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">connection.php </span><?php
								if (file_exists("includes/connection.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">constants.php</span><?php
								if (file_exists("includes/constants.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">footer.php</span><?php
								if (file_exists("includes/footer.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">header.php</span><?php
								if (file_exists("includes/header.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p> <span aligh="left">includes.php</span><?php
								if (file_exists("includes/includes.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD] 	</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD] 	</span>';
    					 	?></p>
    					 </ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">log.php</span><?php
								if (file_exists("includes/log.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD] 	</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD] 	</span>';
    					 	?></p>
    					 </ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">nav.php</span><?php
								if (file_exists("includes/nav.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD] 	</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD] 	</span>';
    					 	?></p>
    					 </ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">search.php</span><?php
								if (file_exists("includes/search.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD] 	</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD] 	</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">session.php</span><?php
								if (file_exists("includes/session.php"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD] 	</span>';
    					 	?></p>
    					</ul>
    				</ol>
    			</ul>
    			<ul id="js"><strong>Js</strong>
    				<ol id="jsall" class="hid" style="border: 2px solid white; border-radius: 5px; padding-right: 2%;" padding-right: 2%;">
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">fun.js</span><?php
								if (file_exists("js/fun.js"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">jquery.maskedinput.min.js</span><?php
								if (file_exists("js/jquery.maskedinput.min.js"))
									echo '<span style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    				</ol>
    			</ul>
    			<ul id="log"><strong>Log</strong>
    				<ol id="logall" class="hid" style="border: 2px solid white; border-radius: 5px; padding-right: 2%;"">
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">access.txt</span><?php
								if (file_exists("log/access.txt"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">error.txt</span><?php
								if (file_exists("log/error.txt"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">good.txt</span><?php
								if (file_exists("log/good.txt"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">operation.txt</span><?php
								if (file_exists("log/operation.txt"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    				</ol>
    			</ul>
    			<ul id="roots"><strong>Корневой каталог</strong>
    				<ol id="rootsall" class="hid" style="border: 2px solid white; border-radius: 5px; padding-right: 2%;"">
    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">.htaccess</span><?php
								if (file_exists(".htaccess"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">clients.php</span><?php
								if (file_exists("clients.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">delete.php</span><?php
								if (file_exists("delete.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">doc.php</span><?php
								if (file_exists("doc.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">docnew.php</span><?php
								if (file_exists("docnew.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">edit.php</span><?php
								if (file_exists("edit.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">flag.php</span><?php
								if (file_exists("flag.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">index.php</span><?php
								if (file_exists("index.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">input.php</span><?php
								if (file_exists("input.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">insert.php</span><?php
								if (file_exists("insert.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">login.php</span><?php
								if (file_exists("login.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">logout.php</span><?php
								if (file_exists("logout.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">main.php</span><?php
								if (file_exists("main.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">project.php</span><?php
								if (file_exists("project.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>

    					<ul style="border-bottom: 2px solid black;">
    						<p><span aligh="left">service.php</span><?php
								if (file_exists("service.php"))
									echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
								else
									echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
    					 	?></p>
    					</ul>
    				</ol>
    			</ul>
    		</ol>
    		<h1 align="center">Проверка подключения к БД</h1>
    		<p><span aligh="left">&nbsp;&nbsp;&nbsp;&nbsp;Подключение к БД</span>
    			<?php
    			if(!empty($con))
    			{
					if(!empty($mesql))
					{
						echo 
							'<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
						echo '<p>'.$mesql.'</p>';
					}
					else
						echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
				}
				else
					{echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
					echo '<p style="color:red;">Ошибка подключения: '.$mesql.'</p>';}
    		?>
    	    </p>
            <p><span aligh="left">&nbsp;&nbsp;&nbsp;&nbsp;Установка сессий</span>
                <?php
                if(!empty($_SESSION["session_username"]))
                {
                    echo '<span  style="color:green; float:right; font-size: 18px;">[GOOD]</span>';
                }
                else
                    echo '<span style="color:red; float:right; font-size: 18px;">[BAD]</span>';
            ?>
            </p>
            <ol id="data" style = "cursor: pointer;"><strong>Данные для подключения к БД</strong>
                <ul id="dataall" class="hid" style="border: 2px solid white; border-radius: 5px; padding-right: 2%;"">
                    <ol>
                        <br>
                        <ul aligh="left" style="border-bottom: 2px solid black;">Размещение
                                <span style="color:red; float:right;"><?php echo DB_SERVER;?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </ul>
                        <ul aligh="left" style="border-bottom: 2px solid black;">Имя пользователя
                                <span style="color:red; float:right;"><?php echo DB_USER;?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </ul>
                        <ul aligh="left" style="border-bottom: 2px solid black;">Пароль
                                <span style="color:red; float:right;"><?php if (!empty(DB_PASS)) echo DB_PASS; else echo "Пароль не установлен";?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </ul>
                        <ul aligh="left" style="border-bottom: 2px solid black;">Имя БД
                                <span style="color:red; float:right;"><?php echo DB_NAME;?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </ul>
                    </ol>
                </ul>
            </ol>
            <ol><strong>Чтение логов</strong>
                <ul style="padding-right: 2%;">
                    <ol>
                        <br>
                        <ul aligh="left" id="error">Ошибки
                        </ul>
                        <ul aligh="left" id="access">Доступ
                        </ul>
                        <ul aligh="left" id="operation">Операции
                        </ul>
                        <ul aligh="left" id="good">Вывод
                        </ul>
                    </ol>
                </ul>
            </ol>
    	</div>
    </div>
    <script>
  var css = document.getElementById("css");
  var cssall = document.getElementById("cssall");
  var inc = document.getElementById("inc");
  var incall = document.getElementById("incall");
  var js = document.getElementById("js");
  var jsall = document.getElementById("jsall");
  var log = document.getElementById("log");
  var logall = document.getElementById("logall");
  var roots = document.getElementById("roots");
  var rootsall = document.getElementById("rootsall");
  var data = document.getElementById("data");
  var datasall = document.getElementById("dataall");
  var logs = document.getElementById("logs");
  var logsall = document.getElementById("logsall");
  var error = document.getElementById("error");
  var operation = document.getElementById("operation");
  var good = document.getElementById("good");
  var access = document.getElementById("access");

    css.onclick = function(event){
    if (cssall.style.display == "none")
      cssall.style.display = "block";
    else
      cssall.style.display = "none";
    }

    inc.onclick = function(event){
    if (incall.style.display == "block")
      incall.style.display = "none";
    else
      incall.style.display = "block";
    }

    js.onclick = function(event){
    if (jsall.style.display == "block")
      jsall.style.display = "none";
    else
      jsall.style.display = "block";
    }

    log.onclick = function(event){
    if (logall.style.display == "block")
      logall.style.display = "none";
    else
      logall.style.display = "block";
    }

    roots.onclick = function(event){
    if (rootsall.style.display == "block")
      rootsall.style.display = "none";
    else
      rootsall.style.display = "block";
    }

    data.onclick = function(event){
    if (datasall.style.display == "block")
     datasall.style.display = "none";
    else
     datasall.style.display = "block";
    }

    error.onclick = function(){
      swal({
      title: "Error",
      text: "Вы перейдете на страницу чтения лог - файла ошибок",
      icon: "error",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        self.location.href='read.php?f=1';
      }
    });
    }

    operation.onclick = function(){
      swal({
      title: "Operation",
      text: "Вы перейдете на страницу чтения лог - файла операций",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        self.location.href='read.php?f=2';
      }
    });
    }

    access.onclick = function(){
      swal({
      title: "Access",
      text: "Вы перейдете на страницу чтения лог - файла доступа",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        self.location.href='read.php?f=3';
      }
    });
    }

    good.onclick = function(){
      swal({
      title: "Access",
      text: "Вы перейдете на страницу чтения лог - файла вывода",
      icon: "success",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        self.location.href='read.php?f=4';
      }
    });
    }
</script>
 </body>
</html>

   