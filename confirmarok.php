<?php
require("login_autentica.php"); 

$id_usuario=$_SESSION['usuario_id'];
$nivel_acceso=$_SESSION['usuario_rol'];
$DB = new DB_mssql;
$DB->conectar();
$DB1 = new DB_mssql;
$DB1->conectar();
$id_nombre=$_SESSION['usuario_nombre'];

$param6=str_replace(".","", $param6);
if($id_param2=='confirmar'){
    $tipo_gastos=$_REQUEST["tipo_gastos"];
	if($tipo_gastos!='Gastos'){
		$param10=0;
	}
	$sql2="UPDATE `cajamenor` SET `caj_usucom`='$id_nombre',`caj_cantcom`='$param6',`caj_feccom`='$fechatiempo',caj_idgastos=$param10  WHERE idcajamenor='$id_param'";	
	$DB->Execute($sql2);
	$dir="cajamenor.php";

}else if($id_param2=='Verificar Remesa') {

	$sql2="UPDATE `gastos` SET `gas_descrecogio`='$param2', `gas_nomvalida`='$id_nombre', `gas_fechavalida`='$fechatiempo'   WHERE idgastos='$id_param'";	
	$DB->Execute($sql2);

	$dir="verificarpeso.php";

	
}
else if($id_param2=='Confirmargastos') {
	$param8=str_replace(".","", $param8);
	$tipo_gastos=$_REQUEST["tipo_gastos"];
	if($tipo_gastos!='Gastos'){
		$param10=0;
	}
	 $sql2="UPDATE `asignaciondinero` SET  `asi_usercom`='$id_usuario', `asi_valorcom`='$param8',asi_fechaconf='$fechatiempo',asi_idgastos=$param10  WHERE `idasignaciondinero`='$id_param' ";
	$DB->Execute($sql2);

	$dir="gastosoperador.php";

	
}else if($id_param2=='Confirmarnovedades') {
	$param8=str_replace(".","", $param8);
	$tipo_gastos=$_REQUEST["tipo_gastos"];
	if($tipo_gastos!='Gastos'){
		$param10=0;
	}
	 echo$sql2="UPDATE `novedades` SET  `nov_estado`='$param9'  WHERE `novid`='$id_param' ";
	$DB->Execute($sql2);

	$dir="novedades.php";

}else if($id_param2=='ConfirmarCapacitacion') {
	$param8=str_replace(".","", $param8);
	$tipo_gastos=$_REQUEST["tipo_gastos"];
	if($tipo_gastos!='Gastos'){
		$param10=0;
	}

	//  echo$sql2="UPDATE `docum_capaci` SET  `capaci_estado`='$param99'  WHERE `capaci_id`='$id_param' ";
	 echo$sql2="INSERT INTO `registrocapaci`(`reg_idusuario`, `reg_iddocumento`, `reg_confirmacion`) VALUES ('$id_usuario','$id_param','$param99')";
	$DB->Execute($sql2);

	$dir="capaciberm.php";

	
	
}else if($id_param2=='Validarsolicitud') {
	// $param8=str_replace(".","", $param8);
	// $tipo_gastos=$_REQUEST["tipo_gastos"];
	// if($tipo_gastos!='Gastos'){
	// 	$param10=0;
	// }

	echo$sql2="UPDATE `solicitudes` SET  `soli_valida`='$param9', `soli_inicio`='$param4', `soli_fin`='$param5', `soli_soporte`='$param10', `soli_gerente`='$param11', `soli_gefeinme`='$param12' , `soli_remunerado`='$param13' WHERE `soli_id`='$id_param' ";	
	$DB->Execute($sql2);

	$dir="solicitudess.php";

	
}else if($id_param2=='Confirmarpqr') {
	// $param8=str_replace(".","", $param8);
	// $tipo_gastos=$_REQUEST["tipo_gastos"];
	// if($tipo_gastos!='Gastos'){
	// 	$param10=0;
	// }

	echo$sql2="UPDATE `pqr` SET  `pqr_estado`='$param99', `pqr_respuesta`='$param20'  WHERE `pqr_id`='$id_param' ";	
	$DB->Execute($sql2);

	$dir="pqrsusu.php";
	
}



	$DB->cerrarconsulta();
//pop_dis3($id_p,\"Recoger Paquete\")

header ("Location: $dir?bandera=$bandera&tabla=$tabla");
?>

