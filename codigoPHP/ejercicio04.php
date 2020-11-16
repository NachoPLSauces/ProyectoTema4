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
         * @description: 4.Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campoDescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).
         */

        //Llamada a la librería de validación de formularios
        require_once '../core/201020libreriaValidacion.php';
        //Llamada al fichero de almacenamiento de consantes en PDO
        require_once '../config/confDBPDO.php';

        
        //Array de errores inicializado a null
        $aErrores = ["campoDescDepartamento" => null];

        //Varible de entrada correcta inicializada a true
        $entradaOK = true;           

        //Array de respuestas inicializado a null
        $aRespuestas = ["campoDescDepartamento" => null];

        if(isset($_REQUEST['enviar'])){
            //Comprobar que el campo campoDescDepartamento se ha rellenado con un alfanumérico
            $aErrores["campoDescDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['campoDescDepartamento']);
                        
            //Comprobar si algún campo del array de errores ha sido rellenado
            foreach ($aErrores as $clave => $valor) {
                //Comprobar si el campo ha sido rellenado
                if($valor!=null){
                    $_REQUEST[$clave] = "";
                    $entradaOK = false;
                }
            }

        }
        else{
            $entradaOK = false;
        }
        
        if($entradaOK){
            //Si los datos han sido introducidos correctamente
            $aRespuestas = ["campoDescDepartamento" => $_REQUEST['campoDescDepartamento']];

            //Mostrar registros de la tabla Departamento
            try {
                //Instanciar un objeto PDO y establecer la conexión con la base de datos
                $miDB = new PDO(DSN, USER, PASSWORD);

                //Establecer PDO::ERRMODE_EXCEPTION como valor del atributo PDO::ATTR_ERRMODE
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                /*//Creo una variable que almacena una consulta sql para insertar los valores en la tabla Departamento
                $sql = <<<EOD
                        SELECT * FROM Departamento WHERE DescDepartamento LIKE "%{$aRespuestas['campoDescDepartamento']}%"
EOD;
                 * 
                 * //Se utiliza el método query, que devuele un objeto de la clase PDOStatement
                 * $resultado = $miDB->query($sql);
                 */
                
                
                //Creación de una variable que almacena una consulta sql para insertar los valores en la tabla Departamento
                $sql = "SELECT * FROM Departamento WHERE DescDepartamento LIKE '%{$aRespuestas['campoDescDepartamento']}%'";
                
                //Preparación de la consulta
                $consulta = $miDB->prepare($sql);
                
                //Ejecución de la consulta
                $consulta->execute();
                
                
                ?>
                
                <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <fieldset>
                        <legend>Búsqueda de departamentos</legend>
                        <div>
                            <p>Introduzca la descripción del departamento o nada para ver todos los departamentos</p>
                            <input type="text" name="campoDescDepartamento" placeholder="Descripción del departamento" value="<?php 
                                //Devuelve el campo campoDescDepartamento si se había introducido correctamente
                                if(isset($_REQUEST['campoDescDepartamento']) && $aErrores["campoDescDepartamento"] == null){
                                    echo $_REQUEST['campoDescDepartamento'];
                                }
                            ?>"/>

                            <span style="color:red">
                                <?php
                                //Imprime el error en el caso de que se introduzca mal el código del Departamento
                                if($aErrores["campoDescDepartamento"] != null){
                                    echo $aErrores['campoDescDepartamento'];
                                }
                                ?> 
                            </span>

                        </div>

                        <br>

                        <input type="submit" value="Buscar" name="enviar"/>
                        <input type="reset" value="Borrar"/>
                    </fieldset>
                </form>
        
                <?php
                
                echo "<p style='color: green'>Búsqueda realizada correctamente</p>";
                
                ?>
        
                <table>
                    <tr>
                        <th>Código del Departamento</th>
                        <th>Descripción</th>
                        <th>Volumen del negocio</th>
                    </tr>

                    <?php
                    $registro = $consulta->fetchObject();
                    while ($registro != null) {
                        ?>
                        <tr>
                            <td><?php echo $registro->CodDepartamento; ?></td>
                            <td><?php echo $registro->DescDepartamento; ?></td>
                            <td><?php echo $registro->VolumenNegocio; ?></td>
                        </tr>
                        <?php
                        $registro = $consulta->fetchObject();
                    }
                    ?>
                </table>

                <?php
                
            } catch (PDOException $pdoe) {
                //Mostrar mensaje de error
                echo "<p style='color:red'>ERROR: " . $pdoe . "</p>";
            } finally {
                //Cerrar la conexión
                unset($miDB);
            }
        }
        else{
        ?>

        <form name="input" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <fieldset>
                <legend>Búsqueda de departamentos</legend>
                <div>
                    <p>Introduzca la descripción del departamento o nada para ver todos los departamentos</p>
                    <input type="text" name="campoDescDepartamento" placeholder="Descripción del departamento" value="<?php 
                        //Devuelve el campo campoDescDepartamento si se había introducido correctamente
                        if(isset($_REQUEST['campoDescDepartamento']) && $aErrores["campoDescDepartamento"] == null){
                            echo $_REQUEST['campoDescDepartamento'];
                        }
                    ?>"/>
                    
                    <span style="color:red">
                        <?php
                        //Imprime el error en el caso de que se introduzca mal el código del Departamento
                        if($aErrores["campoDescDepartamento"] != null){
                            echo $aErrores['campoDescDepartamento'];
                        }
                        ?> 
                    </span>
                     
                </div>
                
                <br>

                <input type="submit" value="Buscar" name="enviar"/>
                <input type="reset" value="Borrar"/>
            </fieldset>
        </form>

        <?php
        }
        ?>
    </body>
</html>



