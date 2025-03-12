
 <script>

function cambioo(valor, valor2, valor3, destino)
{
	destino="cotiza_clientes.php?param1="+valor+"&param2="+valor2+"&param3="+valor3;
	document.location.href=destino;
}
</script>
<?php 

 

require("connection/conectarse.php");
require("connection/funciones.php");
require("connection/arrays.php");
require("connection/funciones_clases.php");
require("connection/sql_transact.php");
require("connection/llenatablas.php");
include("cabezote1.php"); 
include("cabezote4.php"); 

$DB = new DB_mssql;
$DB->conectar();
$DB1 = new DB_mssql;
$DB1->conectar();
$FB = new funciones_varias;
$QL = new sql_transact;
$LT = new llenatablas;



 $fechaactual=date("Y-m-d");
 // $nivel_acceso=$_SESSION['usuario_rol'];
 // echo$paramcambio=$_POST['param3'];
$valor1=$_REQUEST["param1"];
$valor2=$_REQUEST["param2"];
$valor3=$_REQUEST["param3"];
  $sql="SELECT `tip_descripcion`,`tip_nom`FROM  `tiposervicio` where idtiposervicio=$valor3";

	 $DB->Execute($sql);
	 // $descripcion=$DB->recogedato(0);
	 $rw=mysqli_fetch_array($DB->Consulta_ID);
echo '<form action="#" method="post" enctype="multipart/form-data" name="form1" id="form1"  >';
// $FB->titulo_azul1("Paquete Volumen",9,0,7);  

// echo "<tr><td><a type='button' class='btn btn-success' style='margin: auto;' href='tablapaquetes.php')'>Consulta la tabla de valores de envios frecuentes </a></td></tr>";
// echo "<tr><td><a type='button' class='btn btn-success' style='margin: auto;' href='tablapaquetes.php')'>cotizar compra prestamo </a></td></tr>";

// $FB->llena_texto("Paquetes Volumen:",2,223,$DB,"(SELECT `idpaquetes`,`paq_nombre`,paq_precio  FROM `paquetes` order by paq_nombre )", "", "", 17, 1);
// echo "</tr>";
// $FB->titulo_azul1("Clientes Prestamosa Autorizados",9,0,7);  
// echo "</tr>";
// $FB->llena_texto("Clientes Prestamos:",3,223,$DB,"(SELECT idclientes,cli_nombre,FORMAT(cli_valoraprobado,'Currency') as cli_valoraprobado FROM `clientes` inner join clientesdir on idclientes=cli_idclientes where cli_valoraprobado>0 order by cli_nombre)", "", "", 1, 1);
// $FB->titulo_azul1("SEDES DE TRABAJO",9,0,7);  
// echo "</tr>";
// $FB->llena_texto("SEDES:",3,223,$DB,"(SELECT `idsedes`, concat_ws(' : ', sed_nombre, sed_direccion) as sede,sed_telefono FROM `sedes` where sed_principal='si'  order by sed_nombre)", "", "", 1, 1);
// if($nivel_acceso==2){

//     $FB->titulo_azul1("EMPLEADOS DE RUTA",9,0,7);  
//     echo "</tr>";
//     $FB->llena_texto("EMPLEADOS:",3,223,$DB,"(SELECT idusuarios,concat_ws(' : ', usu_nombre,'Tel:',usu_celular) as user, veh_placa FROM `usuarios` inner join  seguimiento_user  on idusuarios=seg_idusuario inner join `pre-operacional` on idusuarios=preidusuario left join  vehiculos on idvehiculos=prevehiculo  where seg_motivo='Ingreso' and seg_fechaalcohol='$fechaactual' and prefechaingreso like '$fechaactual%')", "", "", 1, 1);     
// }elseif($nivel_acceso!=3){

//     $FB->titulo_azul1("EMPLEADOS DE RUTA",9,0,7);  
//     echo "</tr>";
//     $FB->llena_texto("EMPLEADOS:",3,223,$DB,"(SELECT idusuarios,concat_ws(' : ', usu_nombre, usu_identificacion,'Tel:',usu_celular) as user, veh_placa FROM `usuarios` inner join  seguimiento_user  on idusuarios=seg_idusuario inner join `pre-operacional` on idusuarios=preidusuario left join  vehiculos on idvehiculos=prevehiculo  where seg_motivo='Ingreso' and seg_fechaalcohol='$fechaactual' and prefechaingreso like '$fechaactual%')", "", "", 1, 1); 
// }




$FB->titulo_azul1("Cotizar",9,0,7);  
echo "</tr>";
$FB->llena_texto("Ciudad Origen:",4,2,$DB,"(SELECT `idciudades`,`ciu_nombre` FROM `ciudades` where inner_estados=1 )", "", "$valor1", 1, 1);
$FB->llena_texto("Ciudad Destino:",11,2,$DB,"(SELECT `idciudades`,`ciu_nombre` FROM `ciudades`  where inner_estados=1)", "verificar(this.value)", "$valor2", 1, 1);
$FB->llena_texto("Tipo de servicio: $descripcion",37,2,$DB,"SELECT `idtiposervicio`,`tip_nom` FROM `tiposervicio` where tip_pagina='si'","cambioo(param4.value,param11.value,this.value,\"cotiza_clientes.php\",1);",$valor3,17,0);
if ($rw[0]!='') {
	$FB->llena_texto("<mark>$rw[1]:  </mark>","", 16, $DB, "", "", "$rw[0]:", 1, 0);
	
}

//echo "<div id='mensaje2'></div>";
// $FB->llena_texto("Ingresa el valor de la compra o prestamo que deseas ",17, 1, $DB, "", "", "",17, 0);
$FB->llena_texto("Si desea hacer una compra y solicitar un prestamo<br>  Ingresa el valor de la compra o prestamo que desea",16, 118, $DB, "", "", "",17, 0);

$FB->llena_texto("param17", 1, 13, $DB, "", "", "0", 5, 0); 
$seguro='50000';
$FB->llena_texto("Seguro:",18, 126, $DB, "", "50000", $seguro, 17, 0);
$FB->llena_texto("Peso KG:",26,1, $DB, "", "","$rw[24]" ,1, 1);	
// $FB->llena_texto("Volumen:",27,1, $DB, "", "","",17, 0);
// $param27=0;
$valorapagar=0;


echo "<tr><td><button type='button'  class='btn btn-success' onclick='cotizarguiacliente(23,\"llega_sub2\")'>Consultar</button></td></tr>";

$FB->div_valores("mensaje2",6); 
$FB->div_valores("destino_vesr",6); 
// echo "<li>";
//                             echo "<a  onclick='pop_dis55(1, \"Cotizar\")'; > Cotizar</a>";
// 
                             echo "</li>";
                             echo '</form >';
                             echo $param3;

    
?>



 <script>
function cotizarguiacliente(destino, div)
{

	var cuidadori=document.getElementById("param4").value;
	var cuidaddes=document.getElementById("param11").value;
	var prestamo=document.getElementById("param16").value;
	var abono=document.getElementById("param17").value;
	var seguro=document.getElementById("param18").value;
	var peso=document.getElementById("param26").value;
	// var volumen=document.getElementById("param27").value;
	var valortservicio=document.getElementById("param37").value;
	// var valor=$('input:radio[name=param7]:checked').val();
	// var cliente=document.getElementById("param8").value;
	//var valor=0;
	destino="resultadoscotizacioncl.php?param2="+cuidadori+"&param3="+cuidaddes+"&param4="+prestamo+"&param5="+abono+"&param6="+seguro+"&param7="+peso+"&param8=0&cond=23&valortservicio="+valortservicio;
	MostrarConsulta4(destino, "destino_vesr")

	
    alert('El valor mostrado acontinuacion está sujeto al volumen del paquete, es decir que el tamaño podria aumentar el valor del envio, si tiene dudas envienos su número de telefono o comuniquese a nuestros números. ');
}
// function cambioo(valor, valor2, valor3, destino)
// {
// 	destino="cotiza_clientes.php?param1="+valor+"&param2="+valor2+"&param3="+valor3;
// 	document.location.href=destino;
// }



</script>