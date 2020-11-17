<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Tema 4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <p>
            <?php
                /*
                 * @author: Nacho del Prado Losada
                 * @since: 27/10/2020
                 * @description: 0. Mostrar scripts
                 */
                
                echo "<h3>Muestra script de creación</h3>";
                highlight_file("../scriptDB/CreaDAW202-DBdepartamentos.sql");
                
                echo "<h3>Muestra script de carga inicial</h3>";
                highlight_file("../scriptDB/CargaInicialDAW202DBDepartamentos.sql");
                
                echo "<h3>Muestra script de borrado</h3>";
                highlight_file("../scriptDB/BorraDAW202DBDepartamentos.sql");
            ?>
        </p>
    </body>
</html>



