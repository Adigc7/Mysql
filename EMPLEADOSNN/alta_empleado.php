<HTML>
<HEAD><TITLE>ALTA EMPLEADO</TITLE></HEAD>
<style>
h3{
	text-align:center;
}
</style>
<link rel="stylesheet" href="bootstrap.min.css">
<BODY>
<?php
    require("funciones.php");
?>

<h1>ALTA DE EMPLEADOS</h1>
<form name="formu" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label type="text" name="dni">DNI <input name="dni"></label>
    <br>
    <br>
    <label type="text" name="nombre">Nombre <input name="nombre"></label>
    <br>
    <br>
    <label type="text" name="salario">Salario <input name="salario"></label>
    <br>
    <br>
    <label type="date" name="fecha_nac">Fecha Nacimiento <input name="fecha_nac"></label>
    <br>
    <br>
    <label type="date" name="fecha_alta">Fecha Alta <input name="fecha_alta"></label>
    <br>
    <br>
    DEPARTAMENOTS <select name="dpto">
        <?php
        $conn=conexion();
        $dpto=verDepartamento($conn);
        foreach($dpto as $row) {
            echo "<option value=".$row["cod_dpto"].">". $row["nombre"]. "</option>";
        }
        $conn = null;
        ?>
    </select>
    <br>
    <br>
    <input type="submit" value="Añadir" name="enviar" />
    <input type="reset" value="Limpiar" name="enviar" />
</form>
<br>
<a href="empleadosnn.php">Volver a Inicio</a>
<br>

<?php
if(empty($_POST)){}
else{
    $dni=$_POST["dni"];
    $nombre=$_POST["nombre"];
    $salario=$_POST["salario"];
    $fecha=$_POST["fecha_nac"];
    $fecha_alta=$_POST["fecha_alta"];
    $cod_dpto=$_POST["dpto"];
    if($dni=="" || $nombre=="" || $salario=="" || $fecha=="" || $fecha_alta==""){
        echo "Hay que rellenar todos los campos";
    }else{
        $conn=conexion();
        nuevoeEmpleado($conn,$dni,$nombre,$salario,$fecha);
        nuevoEmpleadoFechaAlta($conn,$dni,$cod_dpto,$fecha_alta);

    $conn=null;
    }
}
?>

</BODY>
</HTML>