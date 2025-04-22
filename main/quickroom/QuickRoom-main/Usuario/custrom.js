const verNotificacion = document.querySelector('#button');

verNotificacion.addEventListener('click', () => {
    if (Notification.permission === 'granted') {
        const notificacion = new Notification('QuickRoom', {
            icon: '../sources/images/logo_size.jpg',
            body: 'No hay internet'
        });

        notificacion.onclick = function(){
            window.open('http://localhost/Proyecto_Integrador_QuickRoom-main/Usuario/notificaciones.php');
        }
    }
    const notificacion = new Notification('QuickRoom', {
        icon: '../sources/images/logo_size.jpg',
        body: 'No hay luz'
    });

    notificacion.onclick = function(){
        window.open('http://localhost/Proyecto_Integrador_QuickRoom-main/Usuario/notificaciones.php');
    }
});

var button = document.getElementById("button");


button.addEventListener('click', function(){
notify();

});

function notify(){
// verificar que el navegador soporta  noticaciones
    if(!("Notification" in window)) {
        alert("Tu navegador no soporta notificaiones");

    }else if(Notification.permission === "granted"){
     //lanzar notificacion siya esta autorizado
         var notification = new Notification("QuicRoom",{
            icon: '../sources/images/logo_size.jpg',
            body: 'No hay luz'
        });
       

         var notification = new Notification("QuicRoom",{
            icon: '../sources/images/logo_size.jpg',
            body: 'No hay Internet'

        });
        


    } else if(Notification.permission !== "denied"){
        Notification.requestPermission(function(permission){
            if(Notification.permission === "granted"){
                var notification = new Notification("Sin internet");
            }

        }); 
    } 
}




