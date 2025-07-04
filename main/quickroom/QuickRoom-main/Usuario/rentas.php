<!DOCTYPE html>
<html>
    <html lang="es"></html>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">

    <head>
        <title> Renta </title>
        <style>
            body{ background-color: #1b262c;}
            table{margin: auto; width: 900px; border-collapse: collapse; }
            table, tr, th, td { border: 1px solid black; justify-content: center; background-color: #0f4c75;}
            h1{text-align: center; background-color: #0f4c75;color:#BBE1FA;height:70px;}
            td {width: 125px; text-align:center; color:#BBE1Fa; } th{color:black}
            .container{border: 1px solid #BBE1FA;background-color: #1B262C;width: 100%;height: 9vh;}
            .iniciar{width: 100%;height: 100%;}
            .texto{color:white; text-align:center;font-size:6vh;}
            .cuadro{width:100%; height:880%; border:1px solid blue;}
            .seguridad{width:50%; height:50%;}
        </style>
    </head>
 <meta charset="utf-8">
    <title>Cuartos Express</title>
    <link rel="stylesheet" type="text/css" href="../sources/css//padres/padresinicio.css">
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <body>
    <main class="container">
        <div class="iniciar">
                <div class="texto">Cuarto en Renta</div><br>
                <?php
                    try
                    {
                    #
                    $conMySQL = new PDO("mysql:host=localhost; port=3306;
                    dbname=quickroom", "root","");
                    $conMySQL ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $conMySQL ->exec("SET CHARACTER SET UTF8");
                    #
                    $sentenciaSQL = "SELECT id_estudiante,id_cuarto,fecha,tiempo_de_renta FROM rentas";
                    foreach($conMySQL->query($sentenciaSQL) as $fila)
                        {
                            printf ("<div>
                            <table>
                                <tr>
                                    <th>Numero de Cuarto</th>
                                    <th>Numero de Estudiante</th>
                                    <th>Inicio de Renta </th>
                                    <th>Tiempo limite de Renta</th>
                                    <th>Calififca el Cuarto</th>
                                    <th>Paga</th>
                                </tr>
                                <tr>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td>%s</td>
                                    <td><a href='calificacuarto.html' style='color:#BBE1FA;'>Califica</td> 
                                    <td><a href='pagos.html' style='color:#BBE1FA;'>Paga Renta</td>
                                </tr>
                            </table><br>",
                            $fila[0],$fila[1],$fila[2],$fila[3]);
                        }
                    }
                    
                    #
                    catch(PDOException $e)
                    {
                    print "¡ERROR!: " . $e-> getMessage() . "<br>";
                    die();
                    }
                    finally
        
                    {
                    $conMySQL = null;
                    }
                ?>
                <div class="firebase">
                    <body>
   <h1>Control de Acceso RFID</h1>
<table>
  <thead>
    <tr>
      <th>ID de Tarjeta</th>
      <th>Último Acceso</th>
      <th>Estado</th> 
    </tr>
  </thead>
  <tbody id="card-table-body">
    <tr>
      <td colspan="3" align="center">Cargando...</td>
    </tr>
  </tbody>
</table>
<script>
  var cardDataRef = new EventSource("https://quickroom-8f067-default-rtdb.firebaseio.com/rfid-access-control/cards.json");

  cardDataRef.addEventListener('put', function (e) {
    var json = JSON.parse(e.data);
    console.log(json);

    if (json.path == "/") {
      // Clear table body
      document.getElementById("card-table-body").innerHTML = "";

      var cardId = "c0bb321d";
var cardData = json.data[cardId];

if (cardData) {
  console.log(cardId);
  console.log(cardData.time);
  console.log(cardData.status);

  var cardRow = document.createElement("tr");
  var cardIdCell = document.createElement("td");
  cardIdCell.innerHTML = cardId;
  var cardTimeCell = document.createElement("td");
  var cardTimeString = (cardData.time).toLocaleString();
  cardTimeCell.innerHTML = cardTimeString;

  var cardStatusCell = document.createElement("td");
  cardStatusCell.innerHTML = cardData.status;

  cardRow.appendChild(cardIdCell);
  cardRow.appendChild(cardTimeCell);
  cardRow.appendChild(cardStatusCell);
  document.getElementById("card-table-body").appendChild(cardRow);
} else {
  console.log("No se encontró el registro con el ID de tarjeta: " + cardId);
}
            
    } else {
      var s = json.path.split("/");
      console.log(s[1]);
      console.log(json.data.time);
      console.log(json.data.status);

      var cardTimeCell = document.getElementById(s[1] + "-last-access");
      var cardTimeString = new Date(json.data.time).toLocaleString();
      cardTimeCell.innerHTML = cardTimeString;
    }
  });
</script>
                </div>
 <footer><div class="ayuda"><a href="../../Admin/ayudaadmin.html" style="color: #BBE1FA;">Ayuda
            <div class="antes"><a href="usuario.php" style="color:#BBE1FA; float:right;">Regresar</a></footer>
        </div>
       
    </main>
</body>