<?
require("autoCarga.php");

$login = new Login();
/* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la funci�n
 htmlentities para evitar inyecciones SQL. */
$nmyusuario = $login->ValidaUsuario($_POST["usuario"]);

//Si existe el usuario, validamos tambi�n la contrase�a ingresada y el estado del usuario�
if($nmyusuario != 0)
{
 $rs = $login->Valida($_POST["usuario"],$_POST["pwd"]);
 //Si el usuario y clave ingresado son correctos (y el usuario est� activo en la BD), creamos la sesi�n del mismo.
 if($rs->num_rows)
 {
  session_start();
  //Guardamos dos variables de sesi�n que nos auxiliar� para saber si se est� o no �logueado� un usuario
  $_SESSION["autentica"] = "OTTW";
  $row = $rs->fetch_assoc();
  $_SESSION["usuarioactual"] = $row["usuario"]; //nombre del usuario logueado.
  //Direccionamos a nuestra p�gina principal del sistema.
  header ("Location: edicion.php");
 }
 else
 {
  header ("Location: index.php");
 }
}
else
{
 header ("Location: index.php");
}
?>