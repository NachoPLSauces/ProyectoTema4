<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Tema 4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <style>
            b {
                color: #0057ff;
            }
        </style>
    </head>
    
    <body>
        <p>
            <?php
                /*
                 * @author: Nacho del Prado Losada
                 * @since: 29/10/2020
                 * @description: 1.(ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores. Con mysqli
                 */
                require_once '../config/confDBMySQLi.php';
            
                //Conexión establecida correctamente
                echo "<h2>Conexión a la base de datos 1</h2>";
                
                //Instanciar un objeto mysqli y establecer la conexión con la base de datos
                $miDB = new mysqli(HOST, USER, PASSWORD, DB);
                $error = $miDB->connect_errno;
                
                //Comprobar si hay algún error en la conexión
                if($error != null) {
                    echo "<p style='color:red'>ERROR $error: $miDB->connect_error</p>";
                    exit();
                }
                else{
                    echo "<p style='color:green'>Conexión establecida correctamente</p>";
                }
                
                //Cerrar conexión con la base de datos
                $miDB->close();
                
                //Conexión establecida con errores
                echo "<h2>Conexión a la base de datos 2</h2>";
                
                //Instanciar un objeto mysqli y establecer la conexión con la base de datos
                $miDB = new mysqli(HOST, USER, 'pasos', DB);
                $error = $miDB->connect_errno;
                
                //Comprobar si hay algún error en la conexión
                if($error != null) {
                    echo "<p style='color:red'>ERROR $error: $miDB->connect_error</p>";
                    exit();
                }
                else{
                    echo "<p style='color:green'>Conexión establecida correctamente</p>";
                }
                
                //Cerrar conexión con la base de datos
                $miDB->close();
            ?>
        </p>
    </body>
</html>



