<?php 
require("login_autentica.php"); 
include("layout.php");
if($_SESSION['inicio']==1){
?>
<?php 
$_SESSION['inicio']='2';
}
?>
<?php 

$fechaactual=date('Y-m-d');	 		
$param4='covid19';
$campo='preencuesta';
$preoperacional='preoperacional';
include("preoperacional.php");	
  $FB->llena_texto("id_usuario", 1, 13, $DB, "", "", "$id_usuario", 5, 0);
	 ?>

<?php
include("footer.php");
?>



