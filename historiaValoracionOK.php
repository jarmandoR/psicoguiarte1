<?php
require("login_autentica.php");
include("declara.php");
@$accion = $_REQUEST["accion"];
$fechatiempo = date("Y-m-d H:i:s");
$fecha = date("Y-m-d");
error_reporting(E_ALL);
ini_set('display_errors', 1);
function subirimagen($var, $tipo)
{
	if ($var != '') {
		move_uploaded_file($var["tmp_name"], "./imghojadevida/" . $tipo . "/" . $var["name"]);		
		$imagen = $var["name"];
	} else {
		$imagen = "";
	}
	return $imagen;
}

if ($accion == 1) {
	if ($_FILES["param101"] != '') {
		subirimagen($_FILES["param101"], "fotos");
	}
	if ($_FILES["param102"] != '') {
		if (is_uploaded_file($_FILES['param102']['tmp_name'])) {
			move_uploaded_file($_FILES['param102']['tmp_name'], "./imghojadevida/hojadevidadigi/" . $imagen1);
			$imagen1 = $_FILES['param102'];
		} else {
			$imagen1 = "";
		}
		$QL->addDocumento1($_FILES["param102"], 2, "hojadevida", $vinculo, "hojadevida", $DB);//hoja de vida
	}
	if ($_FILES["param103"] != '') {
		$QL->addDocumento1($_FILES["param103"], 3, "parejas", $vinculo, "parejas", $DB); //celular
	}
    $sql1 = "INSERT INTO `valoraInicial`(`valo_nombre`,`valo_fecha`,`valo_vestimenta`, `valo_vesti_cual`, `valo_higiene`, `valo_higie_caul`, `valo_nutricional`, `valo_nutri_cual`, `valo_expfacial`, `valo_expfacial_cual`, `valo_comportamiento`, `valo_comp_caul`) 
	VALUES ('$param1','$param2'	,'$param3'	,'$param4'	,'$param5'	,'$param6'	,'$param7'	,'$param8'	,'$param9'	,'$param10'	,'$param11'	,'$param12')";
	$vinculo = $DB->Executeid($sql1);
	$caso = 'Comportamiento';
	$idPareja = $vinculo;

} else {
	@$idPareja = $_REQUEST["idPareja"];
	// $sql = "SELECT `id_valoracion`, `valo_nombre`, `valo_fecha`, `valo_vestimenta`, `valo_vesti_cual`, `valo_higiene`, `valo_higie_caul`, `valo_nutricional`, `valo_nutri_cual`, `valo_expfacial`, `valo_expfacial_cual`, `valo_comportamiento`, `valo_comp_caul`, `valo_tpAtencion`, `valo_tpConciencia`, `valo_tiemDisem`, `valo_tiemMes`, `valo_tiemAno`, `valo_tiempoEsp`, `valo_espaLugarEncu`, `valo_espaSirveLugar`, `valo_espaCiudad`, `valo_espaEsp`, `valo_persoNombre`, `valo_persoEdad`, `valo_persoEsp`, `val_calClaro`, `val_calComprensi`, `val_calIncompre`, `val_calConfuso`, `val_calNoValorable`, `val_vozTono`, `val_vozElevado`, `val_vozModerado`, `val_vozNoValorable`, `val_velLento`, `val_velTaqui`, `val_velDiafo`, `val_velInquie`, `val_velNoValora`, `val_velNinguna`, `val_cantiVerbo`, `val_cantiLaconismo`, `val_cantiMutismo`, `val_cantiNoValo`, `val_cursoCoherencia`, `val_cursoBloqueo`, `val_cursoPerseve`, `val_cursoMonoto`, `val_cursoFluido`, `val_cursolocuas`, `val_cursoNoValora`, `valo_calClaro`, `valo_calComprensi`, `valo_calIncompre`, `valo_calConfuso`, `valo_calNoValorable`, `valo_vozTono`, `valo_vozElevado`, `valo_vozModerado`, `valo_vozNoValorable`, `valo_velLento`, `valo_velTaqui`, `valo_velDiafo`, `valo_velInquie`, `valo_velNoValora`, `valo_velNinguna`, `valo_cantiVerbo`, `valo_cantiLaconismo`, `valo_cantiMutismo`, `valo_cantiNoValo`, `valo_cursoCoherencia`, `valo_cursoBloqueo`, `valo_cursoPerseve`, `valo_cursoMonoto`, `valo_cursoFluido`, `valo_cursolocuas`, `valo_cursoNoValora`, `valo_TenenciaPesimista`, `valo_TenenciaHipocondriaca`, `valo_TenenciaAnsiosa`, `valo_TenenciaParanoide`, `valo_Tenencia ObseCompu`, `valo_TenenciaDelusiva`, `valo_TenenciaFbica`, `valo_NoPosValo`, `valo_SinEneReco`, `valo_riesgo_pare_confli`, `valo_riesgo_peh_c`, `valo_riesgo_sus_psico`, `valo_riesgo_descola`, `valo_riesgo_afi_salu`, `valo_riesgo_repor_nino`, `valo_memo_Conser`, `valo_memo_lev`, `valo_memo_Mar`, `valo_memo_Emp`, `valo_memo_Cari`, `valo_memo_Mani`, `valo_memo_Intr`, `valo_memo_Ext`, `valo_memo_Cola`, `valo_memo_No_Valor`, `valo_memo_Ot`, `valo_memo_Cu`, `valo_vida_acti_in`, `valo_vida_expe_futu`, `valo_ries_pc`, `valo_ries_ph`, `valo_ries_sp`, `valo_ries_des`, `valo_ries_ns`, `valo_ries_rn`, `valo_obse_anagene`, `valo_obse_no`, `valo_obse_sicual`, `valo_obse_to`, `valo_obse_neuro`, `valo_obse_psiqui`, `valo_obse_fono`, `valo_obse_otra`, `valo_obse_cual`, `valo_obse_si`, `valo_obse_no2`, `valo_obse_anagene2` FROM `valoraInicial` WHERE id_valoracion='$idPareja'";
	// $DB1->Execute($sql);
	// $rw = mysqli_fetch_row($DB1->Consulta_ID);
	// $id_sedes = $rw[2];
	switch ($condecion) {
		case "Comportamiento":		
			$sql1 = "UPDATE `valoraInicial` SET `valo_nombre`='$param1',`valo_fecha`='$param2',`valo_vestimenta`='$param3',`valo_vesti_cual`='$param4',`valo_higiene`='$param5',`valo_higie_caul`='$param6',`valo_nutricional`='$param7',`valo_nutri_cual`='$param8',
			
			`valo_expfacial`='$param9',`valo_expfacial_cual`='$param10',`valo_comportamiento`='$param11',`valo_comp_caul`='$param12' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
			$caso = 'Conciencia';
			break;
		case "Conciencia":

			echo$sql1 = "UPDATE `valoraInicial` SET `valo_tpAtencion`='$param13',`valo_tpConciencia`='$param14' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);

			$caso = 'Orientacion';
		break;
		case "Orientacion":

		
			$sql1 = "UPDATE `valoraInicial` SET `valo_tiemDisem`='$param1',`valo_tiemMes`='$param2',`valo_tiemAno`='$param3',`valo_tiemConcreto`='$param4',`valo_tiemInconcre`='$param5',`valo_espaLugarEncu`='$param6',`valo_espaSirveLugar`='$param7',`valo_espaCiudad`='$param8',`valo_espaConcreto`='$param9',`valo_espaInconcre`='$param10',`valo_persoNombre`='$param11',`valo_persoEdad`='$param12',`valo_persoConcreto`='$param13',`valo_persoInconcre`='$param14' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
	
				$caso = 'Lenguaje';
			


		break;
		case "Lenguaje":
			echo$sql1 = "UPDATE `valoraInicial` SET `val_calClaro`='$param1',`val_calComprensi`='$param2',`val_calIncompre`='$param3',`val_calConfuso`='$param4',`val_calNoValorable`='$param5',`val_vozTono`='$param6',`val_vozElevado`='$param7',`val_vozModerado`='$param8',`val_vozNoValorable`='$param9',`val_velLento`='$param10',`val_velTaqui`='$param11',`val_velDiafo`='$param12',`val_velInquie`='$param13',`val_velNoValora`='$param14',`val_velNinguna`='$param15',`val_cantiVerbo`='$param16',`val_cantiLaconismo`='$param17',`val_cantiMutismo`='$param18',`val_cantiNoValo`='$param19',`val_cursoCoherencia`='$param20',`val_cursoBloqueo`='$param21',`val_cursoPerseve`='$param22',`val_cursoMonoto`='$param23',`val_cursoFluido`='$param24',`val_cursolocuas`='$param25',`val_cursoNoValora`='$param26' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
			
			$caso = 'Afectivo';
			break;
		case "Afectivo":
			$sql1 = "UPDATE `valoraInicial` SET `valo_calClaro`='$param1',`valo_calComprensi`='$param2',`valo_calIncompre`='$param3',`valo_calConfuso`='$param4',`valo_calNoValorable`='$param5',`valo_vozTono`='$param6',`valo_vozElevado`='$param7',`valo_vozModerado`='$param8',`valo_vozNoValorable`='$param9',`valo_velLento`='$param10',`valo_velTaqui`='$param11',`valo_velDiafo`='$param12',`valo_velInquie`='$param13',`valo_velNoValora`='$param14',`valo_velNinguna`='$param15',`valo_cantiVerbo`='$param16',`valo_cantiLaconismo`='$param17',`valo_cantiMutismo`='$param18',`valo_cantiNoValo`='$param19',`valo_cursoCoherencia`='$param20',`valo_cursoBloqueo`='$param21',`valo_cursoPerseve`='$param22',`valo_cursoMonoto`='$param23',`valo_cursoFluido`='$param24',`valo_cursolocuas`='$param25',`valo_cursoNoValora`='$param26' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
			$caso = 'Actitudes';
			break;
		
		case "Actitudes":
			$sql1 = "UPDATE `valoraInicial` SET`valo_TenenciaPesimista`='$param1',`valo_TenenciaHipocondriaca`='$param2',`valo_TenenciaAnsiosa`='$param3',`valo_TenenciaParanoide`='$param4',`valo_Tenencia ObseCompu`='$param5',`valo_TenenciaDelusiva`='$param6',`valo_TenenciaFbica`='$param7',`valo_NoPosValo`='$param8',`valo_SinEneReco`='$param9' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
			$caso = 'Memoria';
			break;
		case "Memoria":
			$sql1 = "UPDATE `valoraInicial` SET `valo_memo_Conser`='$param1',`valo_memo_lev`='$param2',`valo_memo_Mar`='$param3',`valo_memo_Emp`='$param4',`valo_memo_Cari`='$param5',`valo_memo_Mani`='$param6',`valo_memo_Intr`='$param7',`valo_memo_Ext`='$param8',`valo_memo_Cola`='$param9',`valo_memo_No_Valor`='$param10',`valo_memo_Ot`='$param11',`valo_memo_Cu`='$param12' WHERE id_valoracion='$idPareja' ";
			$DB1->Execute($sql1);
			$caso = 'expectativas';

			break;
			case "expectativas":
				$sql1 = "UPDATE `valoraInicial` SET `valo_vida_acti_in`='$param1',`valo_vida_expe_futu`='$param2'WHERE id_valoracion='$idPareja' ";
				$DB1->Execute($sql1);
				$caso = 'riesgo';
				break;
			
			case "riesgo":
				$sql1 = "UPDATE `valoraInicial` SET `valo_ries_pc`='$param1',`valo_ries_ph`='$param2',`valo_ries_sp`='$param3',`valo_ries_des`='$param4',`valo_ries_ns`='$param5',`valo_ries_rn`='$param6' WHERE id_valoracion='$idPareja' ";
				$DB1->Execute($sql1);
				$caso = 'Observaciones';
				break;
			case "Observaciones":
				echo$sql1 = "UPDATE `valoraInicial` SET `valo_obse_anagene`='$param1',`valo_obse_no`='$param2',`valo_obse_sicual`='$param3',`valo_obse_to`='$param4',`valo_obse_neuro`='$param5',`valo_obse_psiqui`='$param6',`valo_obse_fono`='$param7',`valo_obse_otra`='$param8',`valo_obse_cual`='$param9',`valo_obse_si`='$param10',`valo_obse_no2`='$param11',`valo_obse_anagene2`='$param12' WHERE id_valoracion='$idPareja' ";
				$DB1->Execute($sql1);
				$caso = 'Observaciones';
	
				break;
				
				case "Observaciones":
					$sql1 = "UPDATE `valoraInicial` SET `valo_obse_anagene`='$param1',`valo_obse_no`='$param2',`valo_obse_sicual`='$param3',`valo_obse_to`='$param4',`valo_obse_neuro`='$param5',`valo_obse_psiqui`='$param6',`valo_obse_fono`='$param7',`valo_obse_otra`='$param8',`valo_obse_cual`='$param9',`valo_obse_si`='$param10,`valo_obse_no2`='$param11',`valo_obse_anagene2`='$param12' WHERE id_valoracion='$idPareja' ";
					$DB1->Execute($sql1);
					$caso = 'final';
		
					break;



		default:

			break;
	}


}


if ($caso == 'final') {
	header("Location:valoracion.php");
} else {

	header("Location:historiaValoracion.php?bandera=1&condecion=$caso&idPareja=$idPareja");
}



?>