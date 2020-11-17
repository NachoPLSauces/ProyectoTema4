<?php
if (isset($_REQUEST['exportar'])) {
    header('Content-Disposition: attachment;filename="departamento.xml"');
    header('Content-Type: text/xml');
    readfile("../tmp/departamento.xml");
} else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicios Tema 4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <?php
        /*
         * @author: Nacho del Prado Losada
         * @since: 10/11/2020
         * @description: Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR
         */

        //Llamada al fichero de almacenamiento de consantes en PDO
        require_once '../config/confDBPDO.php';
        
        //Creación variable tipo DOMDocument
        $dom = new DOMDocument("1.0", "UTF-8");
        $dom->formatOutput = true;
        
        try {
            //Instanciar un objeto PDO y establecer la conexión con la base de datos
            $miDB = new PDO(DSN, USER, PASSWORD);

            //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Creo una variable que almacena una consulta sql
            $sql = "SELECT CodDepartamento, DescDepartamento from Departamento";

            //Preparar la consulta
            $consulta = $miDB->prepare($sql);

            //Ejecución de la consulta
            $consulta->execute();

            //Creo la raíz del documento xml
            $xmlTablaDepartamentos = $dom->appendChild($dom->createElement("TablaDepartamentos"));

            //Recorro las filas de la consulta sql
            $registro = $consulta->fetchObject();
            while($registro){
                //Creo un elemento hijo de TablaDepartamentos
                $xmlDepartamento = $xmlTablaDepartamentos->appendChild($dom->createElement("Departamento"));

                //Creo los hijos de Departamento, que serán CodDepartamento y DescDepartamento
                $xmlDepartamento->appendChild($dom->createElement("CodDepartamento", $registro->CodDepartamento));
                $xmlDepartamento->appendChild($dom->createElement("DescDepartamento", $registro->DescDepartamento));

                $registro = $consulta->fetchObject();
            }

            //Guardar el archivo xml
            $dom->save("../tmp/departamento.xml");                

            echo "<p style='color: green'>Las consultas se han realizado correctamente</p>";
        } catch (PDOException $pdoe) {
            echo "<p style='color: red'>ERROR: " . $pdoe->getMessage() . "</p>";

        } finally {
            //Cerrar la conexión
            unset($miDB);
        }
        ?>
            <form>
                <fieldset>
                    <legend>Exportar archivos</legend>
                    <label>Pulsa para exportar el archivo .xml</label><br>
                    <input type="submit" name="exportar" value="Exportar">
                </fieldset>
            </form>
        
        <?php
        }
        ?>
    </body>
</html>



