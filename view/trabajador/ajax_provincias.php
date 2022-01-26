<?php 
include '../../model/database.php';

if(isset($_POST['id_dpto'])){ // Cargar solo provincias del Departamento seleccionado
    $pdo = Database::connect();
    $sql = 'SELECT * FROM provincias WHERE idDepartamento = ' . $_POST['id_dpto'];
    $opcionesProvincias = '<option value="">Seleccione Provincia</option>';

    foreach ($pdo->query($sql) as $row) {
        $opcionesProvincias.='<option value="'.$row["id_provincia"].'">'. $row["nombre_provincia"] . '</option>';
    }

    echo $opcionesProvincias;

}else if(isset($_POST['id_provincia'])){ // Cargar solo distritos de provincia seleccionada
    $pdo = Database::connect();
    $sql = 'SELECT * FROM distritos WHERE idProvincia = ' . $_POST['id_provincia'];
    $opcionesDistritos = '<option value="">Seleccione Distrito</option>';

    foreach ($pdo->query($sql) as $row) {
        $opcionesDistritos.='<option value="'.$row["id_distrito"].'">'. $row["nombre_distrito"] . '</option>';
    }

    echo $opcionesDistritos;

}else if(isset($_POST['fecha'])){ // Verificar mayor de edad por fecha de nacimiento
    list($ano,$mes,$dia) = explode("-",$_POST['fecha']);
    
    $ano_diferencia  = date("Y") - $ano;
    $mes_diferencia = date("m") - $mes;
    $dia_diferencia   = date("d") - $dia;
    if ($dia_diferencia < 0 || $mes_diferencia < 0){
        $ano_diferencia--;
    }else{
        if($ano_diferencia < 18){
            echo '<div style="color: red;">Debes ser mayor de edad. Tienes '.$ano_diferencia.' años</div>';
        }else{
            echo'';
        }
    }
}
	

?>