 // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyBjDbI7XvX7HmcbvglM2dugrFxeYWrILs4",
    authDomain: "team-cord-web-ar.firebaseapp.com",
    projectId: "team-cord-web-ar",
    storageBucket: "team-cord-web-ar.appspot.com",
    messagingSenderId: "221647981080",
    appId: "1:221647981080:web:a4100e48ba42aad0d3516d",
    measurementId: "G-G5RYMQLPQ7"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);


  console.log("Firebase started.");

  // Facebook
  var googleProvider = new firebase.auth.GoogleAuthProvider();
