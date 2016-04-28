<? 
session_start();
session_unset();
session_destroy();

header("location:index_seguro.php");
exit();
?>

