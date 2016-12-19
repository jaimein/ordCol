<?php

switch ($_GET['salida']) {
    case "Añadir para este centro":
        //include('index.php?accion=altas_especifico');
        header('Location: index.php?accion=altas_especifico');
        break;
case "Lista de este centro":
        echo 'Lista de este centro';

        break;
    default:
        break;
}