<?php
 header('Content-type: application/vnd.ms-excel; charset=utf-8');
header("Content-Disposition: attachment; filename=reporte_creditos.xls;  charset=utf-8");
header("Pragma: no-cache");
header("Expires: 0");  
require("login_autentica.php");

//include("layout.php");
$DB = new DB_mssql;
$DB->conectar();
$DB1 = new DB_mssql;
$DB1->conectar();

$asc="ASC";
$conde1=""; 
$conde3=""; 
$opcion=$_REQUEST["preguia"];
$idfactura=$_REQUEST["idfactura"];

if($param4!=''){  $fechainicio=$param4;}
if($param5!=''){  $fechaactual=$param5;}

if($param2!="" and $param1!=""){ 
 $conde1="and $param1 like '%$param2%' "; 
  }else { $conde1="  "; } 

if($param1==""){ $param1="ser_prioridad"; } 
if($param3!=''){ $conde3 =" and rel_nom_credito like '%$param3%'";  }
	
 ?>
    <table width="99%" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="">
     <tr bgcolor="#F75700">
     <td width="10%"  class=""><div align="center" class="tittle2">Fecha Ingreso</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">#Guia</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">#Relacionado</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Remitente</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Telefono</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Direccion</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Ciudad O</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Destinatario</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Telefono</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Direccion</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Ciudad D</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Servicio</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Prestamo</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Piezas</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Peso</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Volumen</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Seguro</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">%Seguro</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Flete+%Seguro</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Credito</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">Tipo Servicio</div></td>
	
       </tr>
     <?php	

if($param6=='Sin Facturar'){
	$conde4=' and ser_numerofactura is null';
}elseif($param6=='Facturados'){
	$conde4=' and ser_numerofactura>=1';
}else{
	$conde4='';	
}

if($opcion==4){

	$sql1="Select fac_idservicios from facturascreditos where idfacturascreditos=$idfactura ";
	$DB->Execute($sql1); 
	$prefac=$DB->recogedato(0); 

	$sql="SELECT `idservicios`,`ser_fechaentrega`,`cli_nombre`, `cli_telefono`,`cli_direccion`, `ser_destinatario`, `ser_telefonocontacto`,
	`ser_direccioncontacto`,`ciu_nombre`,`ser_prioridad`,ser_fecharegistro,ser_consecutivo,ser_guiare,cli_idciudad,ser_valorprestamo,ser_valor,rel_nom_credito,ser_piezas,ser_peso,ser_volumen,ser_valorseguro
	 FROM serviciosdia  s inner join rel_sercre rs on rs.idservicio=idservicios  where idservicios in ($prefac) and ser_clasificacion=2 and ser_estado!=100 $conde1 $conde2 $conde3 $conde4 ORDER BY $param1 $asc ";
}else{
$sql="SELECT `idservicios`,`ser_fechaentrega`,`cli_nombre`, `cli_telefono`,`cli_direccion`, `ser_destinatario`, `ser_telefonocontacto`,
`ser_direccioncontacto`,`ciu_nombre`,`ser_prioridad`,ser_fecharegistro,ser_consecutivo,ser_guiare,cli_idciudad,ser_valorprestamo,ser_valor,rel_nom_credito,ser_piezas,ser_peso,ser_volumen,ser_valorseguro
 FROM serviciosdia  s inner join rel_sercre rs on rs.idservicio=idservicios  where date(ser_fecharegistro)>='$fechainicio' and  date(ser_fecharegistro)<='$fechaactual' and ser_clasificacion=2 and ser_estado!=100 $conde1 $conde2 $conde3 $conde4 ORDER BY $param1 $asc ";
}
$DB->Execute($sql); $va=0; 
$totalcontado=0;
	while($rw1=mysqli_fetch_row($DB->Consulta_ID))
	{
		$id_p=$rw1[0];
		$va++; $p=$va%2;
		if($p==0){$color="#FFFFFF";} else{$color="#EFEFEF";}
		$sel="SELECT ciu_nombre FROM ciudades where idciudades=$rw1[13]";
		$DB1->Execute($sel);		
		$ciudadnombre=$DB1->recogedato(0);	
		$rw1[20]=str_replace(".","", $rw1[20]);
		$pordeclarado=(intval($rw1[20])*1)/100;
		$totalflete=$rw1[15]+$pordeclarado;
		$totalcontado=$totalflete+$totalcontado;
		$sql21="select tip_nom from guias inner join tiposervicio on idtiposervicio=gui_idservicio where gui_idservicio=$id_p";
		$DB1->Execute($sql21);
		$valortservicio=$DB1->recogedato(0);

		echo "<tr class='text' bgcolor='$color' onmouseover='this.style.backgroundColor=\"#C8C6F9\"' onmouseout='this.style.backgroundColor=\"$color\"'>";
		$direc1=str_replace("&"," ", $rw1[4]);
		$direct2=str_replace("&"," ", $rw1[7]);
		echo "<td>".$rw1[10]."</td>
		<td>".$rw1[11]."</td>
		<td>".$rw1[12]."</td>
		<td>".$rw1[2]."</td>
		<td>".$rw1[3]."</td>
		<td>".$direc1."</td>
		<td>".$ciudadnombre."</td>
		<td>".$rw1[5]."</td>
		<td>".$rw1[6]."</td>
		<td>".$direct2."</td>
		<td>".$rw1[8]."</td>
		<td>".$rw1[9]."</td>
		<td>$ ".$rw1[14]."</td>
		<td> ".$rw1[17]."</td>
		<td> ".$rw1[18]."</td>
		<td> ".$rw1[19]."</td>
		<td>$ ".$rw1[20]."</td>
		<td>$ ".$pordeclarado."</td>
		<td>$ ".$totalflete."</td>
		<td> ".$rw1[16]."</td>
		<td> ".$valortservicio."</td>
		";

		echo "</tr>"; 
	}
	
	echo'<tr bgcolor="#F75700">
	<td width="10%"  class=""><div align="center" class="tittle2">Total Factura</div></td>
	<td width="10%"  class=""><div align="center" class="tittle2">'.$totalcontado.'</div></td>';

	echo "</tr>"; 
?>


</table>
