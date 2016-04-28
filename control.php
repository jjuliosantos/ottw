<?
require("autoCarga.php");

$login = new Login();
/* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
 htmlentities para evitar inyecciones SQL. */
$nmyusuario = $login->ValidaUsuario($_POST["usuario"]);

//Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario…
if($nmyusuario != 0)
{
 $rs = $login->Valida($_POST["usuario"],$_POST["pwd"]);
 //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
 if($rs->num_rows)
 {
  session_start();
  //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no “logueado” un usuario
  $_SESSION["autentica"] = "OTTW";
  $row = $rs->fetch_assoc();
  $_SESSION["usuarioactual"] = $row["usuario"]; //nombre del usuario logueado.
  //Direccionamos a nuestra página principal del sistema.
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