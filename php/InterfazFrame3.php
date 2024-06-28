<?php 
    /* Se llama a la función de conexión con la base de datos */
    include("conexion.php");

    /* Se definen las variables del nombre de la tabla de base de datos y del archivo en cuestion*/
    $NombreEjercicios = $_NombreEjercicios["NombreEjercicios"];
    $NombreDelArchivo = $_NombreDelArchivo["NombreDelArchivo"];

    /* Se definen las variables usadas para el método "POST" para evitar el error de
       que la variable no exista*/
    if (!isset($_POST["buscar"])) {$_POST["buscar"] = "";}
    if (!isset($_POST["buscarcategoria"])) {$_POST["buscarcategoria"] = "";} 
    if (!isset($_POST["id"])) {$_POST["buscarcategoria"] = "";};
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=device=width, initial=scale=1.0">
    <title>Rutinas</title>
    <link rel="stylesheet" href="../css\EstiloInterfazFrame3.css">
</head>


<body>
    <!-- Header mediante el método include de php  -->
    <header>
        <?php
        include ("header.php");
        ?>
    </header>


    <!--  Div de la derecha -->
    <div id="div-2" class="div-derecha"></div>

    <!--  Div de la izquierda -->
    <div id="div-1" class="div-principal">

        <form  method="POST" action="<?php $NombreDelArchivo ?>">
            <div>
                <th>
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar..." value="<?php echo $_POST["buscar"] ?>">
                </th> 
                <th>
                    <!--  Filtro  -->
                    <select id="buscarcategoria" name ="buscarcategoria">

                        <!--  filtro parte lógica mediante el método POST en php -->
                        <?php if($_POST["buscarcategoria"] != ''){ ?>    
                            <option value="<?php echo $_POST['buscarcategoria'];?>"><?php echo $_POST['buscarcategoria']; ?></option>
                        <?php } ?>
                        
                        <!--  Filtro selecciones   -->
                        <option value="">Todos</option>
                        <option value= "Mancuernas">Mancuernas</option>
                        <option value= "Barra" >Barra</option>
                        <option value= "Polea" >Polea</option>
                        <option value= "Maquina" >Maquina</option>
                        <option value= "Calistenia">Calistenia</option>

                    </select>
                </th>
                <!--  Botón enviar   -->
                <th>
                    <input type="submit" class= "btn" value="ver" >
                </th>
                 <!--  Parte lógica en php del método buscar y definiciones del query para su utilización 
                       a la hora de mostrar los <a> con los nombres de los ejercicios    -->
                <?php

                    /*Compara si la caja de texto buscar esta vacía se der así la define con un espacio"*/
                    if ($_POST['buscar'] == '') { $_POST['buscar'] = ' ';
                    }
                    /*Define como $aKeyWord el contenido que se encuentra dentro del area de texto"*/
                    $aKeyword = explode(" ", $_POST["buscar"]);
                    
                    /*Compara si la caja de texto buscar esta vacía y si la categoría también se encuentra 
                      vacía"  de ser asi define el query como la tabla de base de datos completa*/ 
                    if ($_POST["buscar"] == '' AND $_POST["buscarcategoria"] == '') {
                        $query = "SELECT * FROM $NombreEjercicios";

                    /*Compara si la caja de texto buscar esta vacía y el selector del filtro también se encuentra 
                      vacío"  de ser asi define el query como la tabla de base de datos completa*/ 
                    }else{

                        $query = "SELECT * FROM $NombreEjercicios";
                        /*Compara si la caja de texto buscar es distinto de vacío de ser asi define el query como 
                          la tabla de base de donde el nombre sea igual a la aKeyword definida anteriormente*/ 
                        if ($_POST["buscar"] != "" ){
                            $query = "SELECT * FROM $NombreEjercicios WHERE (nombres LIKE LOWER('%".$aKeyword[0]."%')) ";
                        for($i = 1; $i < count($aKeyword); $i++) {
                            if(!empty($aKeyword[$i])) {
                            $query = "SELECT * FROM $NombreEjercicios OR nombres LIKE '%".$aKeyword[$i]."%'";
                            }
                        }
                        }   
                    }
                    /*Compara si el selector de filtro esta vacío y el selector del filtro de ser asi define el query 
                      como la tabla de base con los datos iguales a la categoria seleccionada en el filtro*/ 
                    if ($_POST["buscarcategoria"] != '') {
                        
                        $query .= "AND categoria ='".$_POST["buscarcategoria"]."' ";
                    }
                    
                    // $sql = a la base de datos*/ 
                    $sql = $conexion->query($query);
                    //Se calcular el numero de registros en la tabla
                    $numero_registros = mysqli_num_rows($sql);
                
                ?>
                
            
            </div>
        </form>
        <!-- Parte lógica del páginador -->
        <?php
        // $REQUEST["nume"] metodo que recoge la pagina 
        if (!empty($_REQUEST["nume"])) {
            $_REQUEST["nume"] = $_REQUEST["nume"];
        } else {
            $_REQUEST["nume"] = '1';
        }
        if ($_REQUEST["nume"] == "") {
            $_REQUEST["nume"] = "1";
        }
        // Numero de registros en base a la base de datos definida anteriomente
        $numero_registros = @mysqli_num_rows($sql);
        // Son la cantidad de <a> mostrados por pagina
        $registros = '6';
        // Se define la pagina
        $pagina = $_REQUEST["nume"];
        if (is_numeric($pagina))
            $inicio = (($pagina - 1) * $registros);
        else
        /*Inicio define el comienzo del limite inferior de la recogida de datos en la tabla
            y el numero de registro limite superior, esto hace que se muestren
            n° cantidad de registros definidos en la variable $registros por cada pagina */
        $inicio = 0;
        $busqueda = mysqli_query($conexion, "$query LIMIT $inicio,$registros ");
        //Define el numero total de paginas redondeada hacia arriba para que no se pierda ningun elemento
        $paginas = ceil($numero_registros / $registros);

        ?>
    
        <!-- Recorre la tabla de datos para imprimir todos los <a>  con el nombre correspondiente en base al query 
             indicado anteriormente y ahora el limite por lo cual se llama a la variable $busqueda que contiene estos
             dos -->
        <?php while ($resultado = mysqli_fetch_assoc($busqueda)) { ?>
            <form  method="POST" action="<?php $NombreDelArchivo ?>">
            <p class="div-principal-contenedores">
                <a href=<?php echo $resultado['links'] ?> class="div-principal-links"><?php echo $resultado['nombres'] ?><br></a>
            </p>
            </form>
        <?php } ?>

    </div>
    <!-- Botones del paginador con su parte logica en php -->
    <div class="Paginador">
        <ul style="float: none">
            <?php
            if ($_REQUEST["nume"] == "1") {
                $_REQUEST["nume"] == 0; {
                    echo "";
                }

            } else {
                if ($pagina > 1)
                    $ant = $_REQUEST["nume"] - 1;
                echo "<li class='page-item' ><a class='page-link' aria-label='Previous' href='$NombreDelArchivo?nume=1'><span aria-hidden='true'>&laquo;</span><span class='sr-only'>Previous</span></a></li>";
                echo "<li class='page-item '><a class='page-link' href='$NombreDelArchivo?nume=" . ($pagina - 1) . "'>" . $ant . "</a></1i>";}
                echo "<li class='page-item-active'><a class='page-link' >" . $_REQUEST["nume"] . "</a></1i>";
                $sigui = $_REQUEST["nume"] + 1;
                $ultima = $numero_registros / $registros;

            if ($ultima == $_REQUEST["nume"] + 1) {
                $ultima == "";
            }
            if ($pagina < $paginas && $paginas > 1) {
                echo "<li class='page-item'><a class='page-link' href='$NombreDelArchivo?nume=" . ($pagina + 1) . "'>" . $sigui . "</a></li>";
            }
            if ($pagina < $paginas && $paginas > 1)
                echo "<li class='page-item'><a class='page-link' aria=label='Next' href='$NombreDelArchivo?nume=" . ceil($ultima) . "'><span aria-hidden='true'>&raquo;</span><span class='sr-only'>Next</span></a></li>";

            ?>
        </ul>
    </div>
</body>
</html>
