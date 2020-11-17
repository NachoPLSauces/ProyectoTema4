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
         * @since: 29/10/2020
         * @description: 2. Mostrar el contenido de la tabla Departamento y el número de registros.
         */

        //Llamada al fichero de almacenamiento de consantes en PDO
        require_once '../config/confDBPDO.php';

        try {
            //Instanciar un objeto PDO y establecer la conexión con la base de datos
            $miDB = new PDO(DSN, USER, PASSWORD);

            //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Para realizar una consulta con SELECT, se crea una variable que contenga la consulta SQL
            $sql = "SELECT * FROM Departamento";

            /*
            //Se utiliza el método query, que devuele un objeto de la clase PDOStatement
            $resultado = $miDB->query($sql);
             * */
            
            //Preparamos la consulta sql
            $resultado = $miDB->prepare($sql);
            
            //Ejecutamos la consulta
            $resultado->execute();
        ?>

        <table>
            <tr>
                <th>Código del Departamento</th>
                <th>Descripción</th>
                <th>Volumen del negocio</th>
            </tr>

            <?php
            $registro = $resultado->fetchObject();
            while ($registro != null) {
                ?>
                <tr>
                    <td><?php echo $registro->CodDepartamento; ?></td>
                    <td><?php echo $registro->DescDepartamento; ?></td>
                    <td><?php echo $registro->VolumenNegocio; ?></td>
                </tr>
                <?php
                $registro = $resultado->fetchObject();
            }
            ?>
        </table>

        <?php
        echo '<p><b style="color: blue">Número de registros: </b>' . $resultado->rowCount() . '</p>';
        } catch (PDOException $pdoe) {
            //Mostrar mensaje de error
            echo "<p style='color:red'>ERROR: " . $pdoe . "</p>";
        } finally {
            //Cerrar la conexión
            unset($miDB);
        }
        ?>
    </body>
</html>



