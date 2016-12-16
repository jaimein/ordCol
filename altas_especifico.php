<?php
if ($_POST) {
    // insert query
    $query = "INSERT INTO `vdc-ordenadores`.`ordenadores` (`id`, `id_ordenador`, `centro_id`, `aula`, `departamento`, `so_id`, `baja`) "
            . " VALUES (NULL, ?, ?, ?, ?, ?, '0')";
    echo $query, "<br>";
    // prepare query for execution
    if ($stmt = $conexion->prepare($query)) {
        echo "<div>registro preparado.</div>";
    } else {
        die('Imposible preparar el registro.' . $conexion->error);
    }
    // asociar los parámetros
    $stmt->bind_param('iissi', $_POST['id_ordenador'], $_POST['centro'], $_POST['aula'], $_POST['departamento'], $_POST['so']);
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "<div>Registro guardado.</div>";
    } else {
        die('Imposible guardar el registro: ' . $conexion->error);
    }
}
?>
<?php
if ($_GET) {
    $idCentro = $_GET['idCentro'];
    $nombreCentro = $_GET['nombreCentro'];
}
?>
<h1>Alta Cliente</h1>
<form action='index.php?accion=altas_especifico' method='post'>
    <table border='0'>
        <tr>
            <td>id</td>
            <td><input type='text' name='id_ordenador' required/></td>
        </tr>
        <tr>
            <td>centro</td>
            <td>
                <input type='text' name='nombre_centro' value="<?php echo $nombreCentro; ?>" readonly />
                <input type="hidden" name="centro" value="<?php echo $idCentro; ?>" />
            </td>

        </tr>

        <tr>
            <td>aula</td>
            <td><input type='text' name='aula' /></td>
        </tr>
        <tr>
            <td>departamento/lugar</td>
            <td><input type='text' name='departamento' /></td>
        </tr>
        <tr>
            <td>so</td>
            <td>
                <select name='so' required>
                    <option value='' selected='selected' >- Sin SO -</option>
                    <?php
                    $asignado = "SELECT id, descripcion FROM so";
                    echo $asignado;
                    if ($stmt = $conexion->prepare($asignado)) {
                        if (!$stmt->execute()) {
                            die('Error de ejecución de la consulta. ' . $conexion->error);
                        };
                        $stmt->bind_result($id, $descripcion);

                        while ($stmt->fetch()) {
                            echo "<option value='" . $id . "'>" . $descripcion . "</option>";
                            $rowasignado = mysql_fetch_array($queryasignado);
                        }
                    };
                    ?>
                </select>

            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" name="save" value="Save"/>
                <a href="./index.php">Volver al inicio</a>
            </td>
        </tr>
    </table>
</form> 

