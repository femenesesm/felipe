<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        //var_dump($_SERVER);
        
        $miconn=new mysqli("10.20.25.214", "root", "avaras08", "datospersonales");
        
        if( $miconn->connect_errno){
            echo "Fallo al conectar a MySQL: (" .$miconn->connect_errno .")". $miconn->connect_errno
        }
        
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $infoconexion=$miconn->client_info;
        
        $sql="INSTERT INTO persona(nombre, apellido, host) VALUES ('$nombre','$apellido);";
        $sqlip="Select host from information_schema.processlist WHERE ID=connection_id();";
        $resultado= $miconn->query($sqlip);
        
        //consultas de seleccion que devuelven un conjunto de resultados
        
        if($resultado = $miconn->query($sqlip)){
            $miconn->close();
        }
        
        ?>
    </body>
</html>
