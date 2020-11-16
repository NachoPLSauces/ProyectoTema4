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
        <?php
        /*
         * @author: Nacho del Prado Losada
         * @since: 09/11/2020
         * @description: 5.Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
         */

        //Llamada al fichero de almacenamiento de consantes en PDO
        require_once '../config/confDBPDO.php';
        
        //Variable que indica si la transacción se ha realizado correctamente
        $transaccionOK = true;

        try {
            //Instanciar un objeto PDO y establecer la conexión con la base de datos
            $miDB = new PDO(DSN, USER, PASSWORD);

            //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            /*//Creo varias variables que almacenan tres insert
            $sql1 = <<<EOD
                    INSERT INTO Departamento VALUES ('RG1', 'Primer registro', null, 1);", 
EOD;
            $sql2 = <<<EOD
                    INSERT INTO Departamento VALUES ('RG2', 'Segundo registro', null, 2);", 
EOD;
            $sql3 = <<<EOD
                    INSERT INTO Departamento VALUES ('RG3', 'Tercer registro', null, 3);", 
EOD;
             * 
             */

            //Creación de variable que almacena la consulta para insertar registros
            $sql = <<<EOD
                        INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) 
                        VALUES (:CodDepartamento, :DescDepartamento, :VolumenNegocio)
EOD;
            
            //Iniciamos la transacción
            $miDB->beginTransaction();
            
            //Preparar la consulta
            $consulta = $miDB->prepare($sql);
            
            for($departamento=0;$departamento<3;$departamento++){
                //Creación de variables para rellenar los registros
                $CodDepartamento = "RG$departamento";
                $DescDepartamento = "Resgistro departamento";
                $VolumenNegocio = 5;                
                
                //Llamada a bindParam
                $consulta->bindParam(":CodDepartamento", $CodDepartamento);
                $consulta->bindParam(":DescDepartamento", $DescDepartamento);
                $consulta->bindParam(":VolumenNegocio", $VolumenNegocio);
                
                //Ejecución de la consulta
                $consulta->execute();
            }
            
            /*//Ejecutar los insert
            $miDB->exec($sql1);  
            $miDB->exec($sql2);
            $miDB->exec($sql3);
             * 
             */
            
            //Confirmar la transacción
            $miDB->commit();
            echo "<p style='color: green'>Transacción realizada correctamente</p>";

        } catch (PDOException $pdoe) {
            echo "<p style='color: red'>ERROR: " . $pdoe->getMessage() . "</p>";
            
            $miDB->rollBack();
        } finally {
            //Cerrar la conexión
            unset($miDB);
        }
        ?>
    </body>
</html>



