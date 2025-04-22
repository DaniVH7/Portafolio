<!DOCTYPE html>
<html>
  <head>
<!-- Agrega esto en el head de tu archivo HTML -->
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.4.1/firebase-database.js"></script>
<script>
  const firebaseConfig = {
  apiKey: "AIzaSyDVZ5FvBaF6pA46otk-PVX4iSiREwPHUc0",
  authDomain: "quickroom-8f067.firebaseapp.com",
  databaseURL: "https://quickroom-8f067-default-rtdb.firebaseio.com",
  projectId: "quickroom-8f067",
  storageBucket: "quickroom-8f067.appspot.com",
  messagingSenderId: "726630191739",
  appId: "1:726630191739:web:2446bb582766139913c8de",
  measurementId: "G-JBQ2J6QGFR"
};

  firebase.initializeApp(firebaseConfig);
</script>
    <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../sources/css/administrador/sensores.css">
    <title>Control de Acceso RFID</title>
    <link rel="icon" href="../sources/images/white_logo_transparent_background.png" type="image/png">
    <style>
      .texto{background-color:#0F4C75;
            height: 60%;
            width: 100%;}
      h1 {color:#BBE1FA;
            text-Align:center;}
      table, th, td {
        border: 1px solid white;
        border-collapse: collapse;
      }
      th, td {
        padding: 5px;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <div class="texto">
    <h1>Control de Acceso RFID</h1>
    </div>
    <table>
      <thead>
  <tr>
    <th>ID de Tarjeta</th>
    <th>Último Acceso</th>
    <th>Estado</th> 
    <th>Acción</th>
  </tr>
</thead>
<tbody id="card-table-body" style="align=center">
  <tr>
    <td colspan="3" align="center">Cargando...</td>
  </tr>
</tbody>
    </table>
  </body>
  <script>

    var cardDataRef = new EventSource("https://quickroom-8f067-default-rtdb.firebaseio.com/rfid-access-control/cards.json");

cardDataRef.addEventListener('put', function (e) {
  var json = JSON.parse(e.data);
  console.log(json);

  if (json.path == "/") {
    // Clear table body
    document.getElementById("card-table-body").innerHTML = "";

    for (var key in json.data) {
  console.log(key);
  console.log(json.data[key].time);
  console.log(json.data[key].status);

  var cardRow = document.createElement("tr");
  var cardIdCell = document.createElement("td");
  cardIdCell.innerHTML = key;
  var cardTimeCell = document.createElement("td");
  cardTimeCell.setAttribute("id", key + "-last-access");

  if (json.data[key].time !== undefined) {
    var cardTimeString = (json.data[key].time).toLocaleString();
    cardTimeCell.innerHTML = cardTimeString;
  } else {
    cardTimeCell.innerHTML = "x";
  }
  
  cardTimeCell.style.textAlign = "center"; // centrar contenido de la celda "Último Acceso"

  var cardStatusCell = document.createElement("td");
  cardStatusCell.setAttribute("id", key + "-status");
  cardStatusCell.innerHTML = json.data[key].status;

  var cardStatusButtonCell = document.createElement("td");
  var cardStatusButton = document.createElement("button");
  cardStatusButton.innerHTML = "Cambiar Estado";
  cardStatusButton.onclick = function() {
    var cardId = this.parentNode.parentNode.childNodes[0].innerHTML;
    var cardStatus = this.parentNode.parentNode.childNodes[2].innerHTML;

    if (confirm("¿Estás seguro que deseas cambiar el estado de la tarjeta " + cardId + "?")) {
      var cardStatusRef = firebase.database().ref("rfid-access-control/cards/" + cardId + "/status");
      if (cardStatus == "granted") {
        cardStatusRef.set("denied");
      } else {
        cardStatusRef.set("granted");
      }
    }
  }; 
  cardStatusButtonCell.appendChild(cardStatusButton);

  cardRow.appendChild(cardIdCell);
  cardRow.appendChild(cardTimeCell);
  cardRow.appendChild(cardStatusCell);
  cardRow.appendChild(cardStatusButtonCell);
  document.getElementById("card-table-body").appendChild(cardRow);
}
  } else {
    var s = json.path.split("/");
    console.log(s[1]);
    console.log(json.data.time);
    console.log(json.data.status);

    var cardTimeCell = document.getElementById(s[1] + "-last-access");
    var cardTimeString = new Date(json.data.time).toLocaleString();
    cardTimeCell.innerHTML = cardTimeString;

    var cardStatusCell = document.getElementById(s[1] + "-status");
    cardStatusCell.innerHTML = json.data.status;
  }
});

</script>
  <footer>
    <div class="ayuda"><a href="ayudaadmin.html" style="color: #BBE1FA;" rel="noopener">Ayuda</a></div>
    <div class="antes"><a href="../Admin/admin.html" style="color:#BBE1FA; float: right;" >Regresar</a>
  </footer>
            
</html>
