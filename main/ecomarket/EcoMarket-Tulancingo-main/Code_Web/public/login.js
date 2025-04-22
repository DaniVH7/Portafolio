// Import the functions you need from the SDKs you need
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.0.2/firebase-app.js';
import {sendEmailVerification, getAuth, signInWithPopup, 
    createUserWithEmailAndPassword, signInWithEmailAndPassword,  
    onAuthStateChanged} from 'https://www.gstatic.com/firebasejs/9.0.2/firebase-auth.js';

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAcGgbS2CuvMe_-5nNLHtfh6_Tq2U6OU7c",
  authDomain: "ecomarket-tulancingo.firebaseapp.com",
  projectId: "ecomarket-tulancingo",
  storageBucket: "ecomarket-tulancingo.appspot.com",
  messagingSenderId: "335657772340",
  appId: "1:335657772340:web:47c642021d844ef1ad3161"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);

login.addEventListener('click', (e) => {
  e.preventDefault();
  var email = document.getElementById('email').value;
  var password = document.getElementById('pass').value;

  signInWithEmailAndPassword(auth, email, password).then(cred => {
      console.log("Usuario logueado", cred.user);
      if (cred.user.emailVerified) {
          window.location.href = "../templates/principal.html"; // Redirigir al usuario autenticado y con correo verificado
      } else {
          alert("Por favor verifica tu correo electrónico antes de continuar.");
          sendEmailVerification(auth.currentUser).then(() => {
              alert("Se ha enviado un correo de verificación.");
          });
      }
  }).catch(error => {
      const errorCode = error.code;
      
      if (errorCode === 'auth/invalid-email') {
          alert("Correo no válido");
      } else if (errorCode === 'auth/user-disabled') {
          alert("Usuario deshabilitado");
      } else if (errorCode === 'auth/user-not-found') {
          alert("Usuario no existe");
      } else if (errorCode === 'auth/wrong-password') {
          alert("Contraseña incorrecta");
      } else {
          alert("Error desconocido: " + error.message);
      }
  });
});

cerrar.addEventListener('click', (e) => {
  e.preventDefault();
  auth.signOut().then(() => {
    alert("Sesión cerrada");
    window.location.href = '../../index.html';
  }).catch((error) => {
    alert("Error al cerrar sesión: " + error.message);
  });
});

onAuthStateChanged(auth, user => {
  if (user) {
    if (user.emailVerified) {
      console.log("Usuario activo y correo verificado");
    } else {
      console.log("Usuario activo pero correo no verificado");
    }
  } else {
    console.log("Usuario inactivo");
  }
});
