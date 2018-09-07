<!--  Файл с навигационным меню  -->

<!--  --------------------------------------   -->
<!--    Компания: ServicePro.Автоматизация     -->
<!--  Исполнители: Старков Е. и Горбунова Н.   -->
<!--  --------------------------------------   -->
<!--    Подключаемы файл, содержащий данные    -->
<!--           о  навигационном меню           -->
<!--  --------------------------------------   -->
<!--      Весь функционал реализован           -->
<!--  --------------------------------------   -->

<?php
	echo '
	<div class="category-wrap">
  <h3 id="menu">Меню</h3>

  <ul id="all">

    <li id="cl"><a><strong>Клиенты</strong><img width="25%" style="float:right;" src="http://videorepiter.ru/images/stuff/promo.png?v=9"></a>
      <ul id="clall" class = "hid">
		    <li><a href="insert.php?flag=1">Новый клиент</a></li>
   		 <li><a href="clients.php">Клиентская база</a></li>
      </ul>
    </li>

    <li id="pr"><a><strong>Проекты</strong><img width="15%" style="float:right;" src="https://images.kz.prom.st/10515468_w640_h2048_ratings_100.png?PIMAGE_ID=10515468"></a>
      <ul id="prall" class = "hid">
		    <li><a href="main.php">Текущие проекты</a></li>
   	    <li><a href="insert.php?flag=2">Добавить проект</a></li>
   	    <li><a href="project.php">Проектная база</a></li>
      </ul>
    </li>

	  <li id="doc"><a><strong>Документы</strong><img width="15%" style="float:right;" src="https://ostrovkarelia.ru/img/icons_preimushestv/documents.png"></a>
      <ul id="docall" class = "hid">
		    <li><a href="doc.php">Журнал регистрации</a></li>
		    <li><a href="docnew.php">Новый документ</a></li>
      </ul>
    </li>

    <li><a href="service.php"><strong>Учетные записи</strong><img width="20%" style="float:right; margin-top: -10%;" src="http://theadview.com/images/2017/07/24/icons8-user-group-man-man-100.png"></a></li>

    <li><a href="logout.php"><strong>Выход</strong><img width="15%" style="float:right;" src="http://5567051726614.hostingkunde.de/images/icons/blue/logout.png"></a></li>
  </ul>
</div>
<script>
  var menu = document.getElementById("menu");
  var menuall = document.getElementById("all");
  var cl = document.getElementById("cl");
  var clall = document.getElementById("clall");
  var pr = document.getElementById("pr");
  var prall = document.getElementById("prall");
  var doc = document.getElementById("doc");
  var docall = document.getElementById("docall");

  menu.onclick = function(event){
    if (menuall.style.display == "none")
      menuall.style.display = "block";
    else
      menuall.style.display = "none";
    }

    cl.onclick = function(event){
    if (clall.style.display == "block")
      clall.style.display = "none";
    else
      clall.style.display = "block";
    }

    pr.onclick = function(event){
    if (prall.style.display == "block")
      prall.style.display = "none";
    else
      prall.style.display = "block";
    }

    doc.onclick = function(event){
    if (docall.style.display == "block")
      docall.style.display = "none";
    else
      docall.style.display = "block";
    }
</script>
';
?>