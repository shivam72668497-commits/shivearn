// Firebase SDK Imports
import { initializeApp } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-auth.js";
import { getDatabase } from "https://www.gstatic.com/firebasejs/10.12.2/firebase-database.js";

// Firebase Config
const firebaseConfig = {
  apiKey: "AIzaSyDYdTJdXbxZ4bUGW-wO1BRaszEUb2Q_BAg",
  authDomain: "shivearnapp.firebaseapp.com",
  databaseURL: "https://shivearnapp-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "shivearnapp",
  storageBucket: "shivearnapp.firebasestorage.app",
  messagingSenderId: "467728812929",
  appId: "1:467728812929:web:a73f12827309d9c09d7680"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Services Export
const auth = getAuth(app);
const database = getDatabase(app);

export { app, auth, database };
