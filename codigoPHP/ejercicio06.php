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
         * @since: 10/11/2020
         * @description: Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevosutilizando una consulta preparada.
         */

        //Llamada al fichero de almacenamiento de consantes en PDO
        require_once '../config/confDBPDO.php';

        try {
            //Instanciar un objeto PDO y establecer la conexión con la base de datos
            $miDB = new PDO(DSN, USER, PASSWORD);

            //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Creo una variable que almacena los registros que se van a cargar
            $sql = <<<EOD
                INSERT INTO Departamento (CodDepartamento,DescDepartamento,VolumenNegocio) VALUES 
                (:CodDepartamento, :DescDepartamento, :VolumenNegocio); 
EOD;

            for($departamento=0;$departamento<3;$departamento++){
                //Preparar la consulta
                $consulta = $miDB->prepare($sql);
                
                //Creación de variables para rellenar los registros
                $CodDepartamento = "DP$departamento";
                $DescDepartamento = "Resgistro departamento";
                $VolumenNegocio = 7;                
                
                //Llamada a bindParam
                $consulta->bindParam(":CodDepartamento", $CodDepartamento);
                $consulta->bindParam(":DescDepartamento", $DescDepartamento);
                $consulta->bindParam(":VolumenNegocio", $VolumenNegocio);
                
                //Ejecución de la consulta
                $consulta->execute();
            }
            
            echo "<p style='color: green'>Las consultas se han realizado correctamente</p>";
        } catch (PDOException $pdoe) {
            echo "<p style='color: red'>ERROR: " . $pdoe->getMessage() . "</p>";
            
        } finally {
            //Cerrar la conexión
            unset($miDB);
        }
        ?>
    </body>
</html>



