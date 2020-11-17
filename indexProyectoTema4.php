<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="./webroot/css/estilo.css">
		
		<title>NPL - Proyecto DAW2</title>
	</head>
	
	<body>
		<header>
			<div class="title">
                            <div class="logo">
                                <img src="doc/logo.png" alt="logo">
                            </div>
                            
                            <div>
                                <h2><a href="../../index.html">Proyecto DAW2</a></h2>
                            </div>				
			</div>
			
			<div class="navegador">
				<nav>
					<div>
						<a href="#">DAW</a>
					</div>
					
					<div>
						<a href="../indexProyectoDWES.php">DWES</a>
					</div>
					
					<div>
						<a href="#">DWEC</a>
					</div>
					
					<div>
						<a href="#">DIW</a>
					</div>
				</nav>
			</div>
		</header>
		
		<main>
                    <div class="contenido">
                        <table>
                            <tr>
                                <td><a href="codigoPHP/ejercicio00.php">Scripts de creación base de datos</a></td>
                            </tr>
                            
                            <tr>
                                <td><a href="mostrarcodigo/muestraConfDBPDO.php">Constantes PDO</a></td>
                            </tr>
                            
                            <tr>
                                <td><a href="mostrarcodigo/muestraConfDBMySQLi.php">Constantes MySQLi</a></td>
                            </tr>
                            
                            <tr>
                                <th><br>EJERCICIO</th>
                                <th colspan="2"><br>PDO</th>
                                <th colspan="2"><br>SQLI</th>
                            </tr>
                            
                            <tr>
                                <td>1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</td>
                                <td><a href="codigoPHP/ejercicio01.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio01.php">Inspeccionar</a></td>
                                <td><a href="codigoPHP/ejercicio01_mysqli.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio01_mysqli.php">Inspeccionar</a></td>
                            </tr>
                            
                            
                            <tr>
                                <td>2.Mostrar el contenido de la tabla Departamento y el número de registros.</td>
                                <td><a href="codigoPHP/ejercicio02.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio02.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>3.Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</td>
                                <td><a href="codigoPHP/ejercicio03.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio03.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>4.Formulario   de   búsqueda   de   departamentos   por   descripción   (por   una   parte   del   campoDescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</td>
                                <td><a href="codigoPHP/ejercicio04.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio04.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>5.Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</td>
                                <td><a href="codigoPHP/ejercicio05.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio05.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>6.Pagina web que cargue registros en la tabla Departamento desde un array departamentos nuevos utilizando una consulta preparada.</td>
                                <td><a href="codigoPHP/ejercicio06.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio06.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>7.Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla Departamento de nuestra base de datos. (IMPORTAR)</td>
                                <td><a href="codigoPHP/ejercicio07.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio07.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                            
                            <tr>
                                <td>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en unfichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR)</td>
                                <td><a href="codigoPHP/ejercicio08.php">Ejecutar</a></td>
                                <td><a href="mostrarcodigo/muestraEjercicio08.php">Inspeccionar</a></td>
                                <td><a href="#">Ejecutar</a></td>
                                <td><a href="#">Inspeccionar</a></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
		</main>
		
            <footer style="position: inherit">
			<div>
				<h3>2020-2021 - Nacho del Prado Losada - ignacio.pralos@educa.jcyl.es</h3>
			</div>
		</footer>
	</body>
</html>
