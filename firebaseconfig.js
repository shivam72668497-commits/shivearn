// Firebase Config
const firebaseConfig = {
  apiKey: "AIzaSyDYdTJdXbxZ4bUGW-wO1BRaszEUb2Q_BAg",
  authDomain: "shivearnapp.firebaseapp.com",
  projectId: "shivearnapp",
  storageBucket: "shivearnapp.firebasestorage.app",
  messagingSenderId: "467728812929",
  appId: "1:467728812929:web:a73f12827309d9c09d7680"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Auth
const auth = firebase.auth();

// Google Provider
const provider = new firebase.auth.GoogleAuthProvider();