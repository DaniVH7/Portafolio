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