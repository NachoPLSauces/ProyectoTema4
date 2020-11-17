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
                 * @since: 28/10/2020
                 * @description: 1.(ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.
                 */
                
                //Llamada al fichero de almacenamiento de consantes en PDO
                require_once '../config/confDBPDO.php';
                
                //Conexión establecida correctamente
                echo "<h2>Conexión a la base de datos 1</h2>";
                try{
                    //Instanciar un objeto PDO y establecer la conexión con la base de datos
                    $miDB = new PDO(DSN, USER, PASSWORD);
                    
                    //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
                    //
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    //Crear un array para almacenar los parámetros de getAttribute()

                    $aParametros = [
                        "Información del servidor" => "SERVER_INFO",
                        "Autocommit" => "AUTOCOMMIT",
                        "Versión del cliente" => "CLIENT_VERSION",
                        "Versión del servidor" => "SERVER_VERSION",
                        "Estado de la conexión" => "CONNECTION_STATUS",
                        "Nombre del driver" => "DRIVER_NAME",
                        "Case" => "CASE",
                        "Errmode" => "ERRMODE",
                        "Oracle nulls" => "ORACLE_NULLS"

                    ];

                    //Mostrar los valores de getAttribute con cada parámetro
                    
                    echo "<h2>Atributos de la conexión a la base de datos</h2>";
                    foreach ($aParametros as $nombre => $parametro){
                        echo "<h3>" . $nombre . "</h3>";
                        echo "<p>PDO::ATTR_" . $parametro . ": <b>" . $miDB->getAttribute(constant("PDO::ATTR_$parametro")) . "</b></p>";

                    }   
                    
                    echo "<p style='color:green'>Conexión establecida correctamente</p>";

                } catch (PDOException $pdoe) {
                    //Mostrar mensaje de error
                    echo "<p style='color:red'>ERROR: " . $pdoe ."</p>";
                } finally {
                    //Cerrar la conexión
                    unset($miDB);
                }
                
                //Conexión con errores
                echo "<br><h2>Conexión a la base de datos 2</h2>";
                try{
                    //Instanciar un objeto PDO y establecer la conexión con la base de datos
                    $miDB = new PDO(DSN, USER, 'pas');
                    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    echo "<p style='color:green'>Conexión establecida correctamente</p>";

                } catch (PDOException $pdoe) {
                    //Mostrar mensaje de error
                    echo "<p style='color:red'>ERROR: " . $pdoe ."</p>";
                } finally {
                    //Cerrar la conexión
                    unset($miDB);
                }
                
                
            ?>
        </p>
    </body>
</html>



