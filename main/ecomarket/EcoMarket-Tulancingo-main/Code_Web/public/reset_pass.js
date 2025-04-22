import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js';
import { getAuth, sendPasswordResetEmail } from 'https://www.gstatic.com/firebasejs/9.0.2/firebase-auth.js';

// Configuración de Firebase
const firebaseConfig = {
  apiKey: "AIzaSyAcGgbS2CuvMe_-5nNLHtfh6_Tq2U6OU7c",
  authDomain: "ecomarket-tulancingo.firebaseapp.com",
  projectId: "ecomarket-tulancingo",
  storageBucket: "ecomarket-tulancingo.appspot.com",
  messagingSenderId: "335657772340",
  appId: "1:335657772340:web:47c642021d844ef1ad3161"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

document.getElementById('resetForm').addEventListener('submit', function(event) {
  event.preventDefault();  // Evitar que el formulario se envíe de manera predeterminada
  var email = document.getElementById('email').value;

  sendPasswordResetEmail(auth, email).then(function() {
    alert('Correo de restablecimiento de contraseña enviado.');
    window.location.href = '../templates/inicio_sesion.html';
  }).catch(function(error) {
    alert('Error al enviar el correo de restablecimiento de contraseña: ' + error.message);
  });
});