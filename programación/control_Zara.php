<?php
session_start();
include('cnxh.php');
$conexion=new conexion();
$conexion->conectar();
//Se verifica el usuario y su contrase�a   
$Cuenta = $_POST[Cuenta];
$Contra = $_POST[Contra];
//*********************************************************************************
?>
<head>
	<link href="Favicon.ico" type="image/x-icon" rel="shortcut icon" />
	 <!--[if lt IE 9]> 
	<script type="text/javascript"> 
	   document.createElement("nav"); 
	   document.createElement("header"); 
	   document.createElement("footer"); 
	   document.createElement("section"); 
	   document.createElement("article"); 
	   document.createElement("aside"); 
	   document.createElement("hgroup"); 
	</script> 
	<![endif]-->
		<title>Coordinaci&oacute;n General de Lenguas UNAM</title>
		<link rel="stylesheet" href="css/hugixR.css" type="text/css" media="screen" />
		<link rel="stylesheet" type="text/css" href="print.css" media="print" />
		 
	 <div id="loop"><img border="0" alt="Universidad Nacional Aut&oacute;noma de M&eacute;xico, Coordinaci&oacute;n General de Lenguas" src="images/CGLh1a.png"  width="1200px" height="10%" align="center" border="0" usemap="#CGLh"/></a>
<table border=0 width="100%"><tr><td align="center">
<map name="CGLh"> 
<area alt="Universidad Nacional Aut&oacute;noma de M&eacute;xico" shape="rect" coords="0,0,549,120" href="http://www.unam.mx">
<area alt="Coordinaci&oacute;n General de Lenguas" shape="rect" coords="550,0,1300,120" href="http://www.cgl.unam.mx">
</map>

 </table></div>
	</head>
<?
//*********************************************************************************
$sql = "select Cuenta, Clave from bdZaragoza where Cuenta ='$Cuenta' and Clave='$Contra'";	
    $sql=$conexion->consulta($sql);	
	if(mysql_num_rows($sql)>0){	
		$con=mysql_fetch_array($sql);
		if($con[Cuenta]==$Cuenta && $con[Clave]==$Contra){
			$_SESSION["a1"]="1";
			$_SESSION["Cuenta"]=$Cuenta;
			//echo"Datos validos<br/><br/>";
			echo"EXAMEN DE COLOCACI�N DE INGL�S 2015-II<br/><br/>

			Antes de empezar a contestar el examen, lee con cuidado las siguientes indicaciones:<br/><br/>

			1. El l�mite de tiempo para realizar la prueba es de 90 minutos, en consecutivo.<br/><br/>

			2. El test incluye 115 reactivos de opci�n m�ltiple. Cada reactivo consta de 4 opciones indicadas con las letras a, b, c y d. S�lo una de ellas es correcta.<br/><br/>

			3. Lee los reactivos con detenimiento, especialmente los de la etapa inicial, a�n cuando �stos parezcan ser demasiado f�ciles. Percibir�s que el grado de dificultad se va incrementando conforme avanzas.<br/><br/>

			4. Por �ltimo, no contestes las preguntas al azar porque las respuestas incorrectas afectar�n tu puntuaci�n. <br/><br/>";
			echo"Da click en el link para comenzar<br/><br/>";
			echo"<a href='ecZaragoza.php'><u>Comenzar examen</u></a>";
//			header("Location:ecOdontologia15.php");4. Se te sugiere detenerte en cuanto percibas que tu conocimiento del idioma Ingl�s ha llegado a su l�mite. No es necesario que contestes todo el examen; s�lo lo que est� en tu conocimiento real.<br/><br/>
		}		
		else{
			header("Location:ecZaragoza.html?DatosIncorrectos");		
		}		
	}
	else{
			header("Location:ecZaragoza.html?NoseEncuentranLosDatos");
			}	
?>