<!DOCTYPE html>
<html>
    <head>
        <title> Insertar registros - PHP con MYSQL </title>
</head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "quickroom";
            
            $estudiante = htmlspecialchars($_POST["txtestudiante"]);
            $cuarto = htmlspecialchars($_POST["txtcuarto"]);
            $rentar = htmlspecialchars($_POST["txtrentar"]);
            $tiempo = htmlspecialchars($_POST["txttiempo"]);

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name );
            #
            if (mysqli_connect_errno())
            {
            #
                printf("ERROR: %u- %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            $insertar = "INSERT INTO rentas VALUES (null,null, '$estudiante', '$cuarto',
             '$rentar', '$tiempo' )";
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                header("Location:../../Rentas/registroalmacenado.html");
            }
            else 
            {
                printf("ERROR - Al almacenar en la BD");
            }
            #
            mysqli_close($conectar);
        ?>
    </body>
</html>