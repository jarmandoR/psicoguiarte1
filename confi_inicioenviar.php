<script type="text/javascript"> 
function alerta (){
    window.location.href='confi_inicio.php';
}
</script>

<?php

require("login_autentica.php"); 
include("layout.php");
$nivel_acceso=$_SESSION['usuario_rol'];
$id_usuario=$_SESSION['usuario_id'];


// $imagen=$_POST'param20'];
$conteni=$_POST['param21'];
$id=$_POST['param22'];
$titu1=$_POST['param23'];


if (isset($_FILES['imagen']) && !empty($_FILES['imagen'])) {
    $archivo = $_FILES['imagen']["tmp_name"];
    $nombre_archivo = $_FILES['imagen']["name"];
    $size = $_FILES['imagen']["size"];
    $ext_pat = pathinfo($nombre_archivo);
    $ext = $ext_pat['extension'];
    $fp = fopen($archivo, 'rb');
    $contenido = fread($fp, $size);
    $temp = addslashes($contenido);
    fclose($fp);
    $foto = $temp;
}


if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
        if ($_FILES['imagen']['type']=='image/png' || $_FILES['imagen']['type']=='image/jpeg'){

            move_uploaded_file($_FILES["imagen"]["tmp_name"],"./confi_imagen/".$_FILES["imagen"]["name"]);

        // $imagen = md5(date("Y-m-d-H-i-s").rand(0,9999).$_SESSION['idc']).".jpg";
            $imagen = $_FILES["imagen"]["name"]; 
        }}else{

echo$sql15="SELECT `img_confi`,`contenido_confi` FROM `confi_inicio` WHERE `id_confi`='$id' ";
				$DB->Execute($sql15);
				$rw20=mysqli_fetch_row($DB->Consulta_ID);

		$imagen =$rw20[0]; 
	}


if (is_uploaded_file($_FILES['imagen1']['tmp_name'])){
        // if ($_FILES['imagen1']['type']=='image/png' || $_FILES['imagen1']['type']=='image/jpeg ' || $_FILES['imagen1']['type']=='image/pdf '){

            move_uploaded_file($_FILES["imagen1"]["tmp_name"],"./confi_imagen/".$_FILES["imagen1"]["name"]);

        // $imagen1 = md5(date("Y-m-d-H-i-s").rand(0,9999).$_SESSION['idc']).".jpg";
            $imagen1 = $_FILES["imagen1"]["name"]; 
        // }
    }else{

echo$sql16="SELECT `confi_enlace`,`contenido_confi` FROM `confi_inicio` WHERE `id_confi`='$id' ";
                $DB->Execute($sql16);
                $rw21=mysqli_fetch_row($DB->Consulta_ID);

        $imagen1 =$rw21[0]; 
    }






     // }

// }




// $titu1=$_POST['param24']; 

// if (isset($_POST['titulo'])) {
//      	  echo $sql="UPDATE `confi_inicio` SET `img_confi`='$imagen',`titulo_confi`='$titu1',`contenido_confi`='$conteni' WHERE id_confi='$id'";
//      $DB->Execute($sql);
//      }elseif($titulo==''){
	// 	if ($_FILES['param20']['type']=='image/png' || $_FILES['param20']['type']=='image/jpeg'){

	// 		move_uploaded_file($_FILES["param20"]["tmp_name"],"./confi_imagen/".$_FILES["param20"]["name"]);

	// 	// $imagen = md5(date("Y-m-d-H-i-s").rand(0,9999).$_SESSION['idc']).".jpg";
	// 		$imagen1 = $_FILES["param20"]["name"]; 

	// }// $titu1=$_POST['param24']; 

if (isset($_POST['param23'])) {


     	  echo $sql="UPDATE `confi_inicio` SET `img_confi`='$imagen',`titulo_confi`='$titu1',`contenido_confi`='$conteni',`confi_enlace`='$imagen1' WHERE id_confi='$id'";
     $DB->Execute($sql);
     }elseif($titulo==''){
        echo$sql="UPDATE `confi_inicio` SET `img_confi`='$imagen',`contenido_confi`='$conteni' WHERE id_confi='$id'";
     $DB->Execute($sql);

		
	}


    if ($sql) {
            echo '<script type="text/javascript">alerta(); </script> '; 

        }	
?>
