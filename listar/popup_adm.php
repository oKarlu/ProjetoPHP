<?php

    $id = $_GET['id'];
    echo"<script type='text/javascript'>

        
        var popup = confirm('Deseja continuar?');
        if(popup == true){
            window.location.href='../deletar/deletar_administrador.php?id=$id'
        }
        else{
          window.location.href='listar_administradores.php'
        };
    
    </script>";

?>