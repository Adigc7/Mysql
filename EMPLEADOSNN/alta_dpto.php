<HTML>
<HEAD><TITLE>ALTA DPTO</TITLE></HEAD>
<style>
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<br>
<h1>ALTA DE DEPARTAMENTO</h1>
<form name="formulario" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="nuevoDepartamento">Añadir departamento <input name="nuevoDepartamento"></label>
    <br><br>
    <input type="submit" value="Añadir" name="enviar" />
</form>

<a href="empleadosnn.php">Volver a Inicio</a>
<?php
if(empty($_POST)){
    echo "<br>";
    echo "Introduzca datos del nuevo departamento";
}
else if($_POST["nuevoDepartamento"]!=""){
    $conn=conexion();
    $lineas= lineasDpto($conn);
    $incre=incremDpto($lineas);

    if ($_SERVER["REQUEST_METHOD"]== "POST"){
        $dpto = $_POST["nuevoDepartamento"];
    }
    
    nuevoDepartamento($conn,$incre,$dpto);
    $conn = null;

}
?>
</BODY>
</HTML