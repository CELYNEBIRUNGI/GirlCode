// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-analytics.js";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyD5S-UYsUxh4-Qz3vcchQ1jpqM96GSeDV8",
    authDomain: "pennywise-2023.firebaseapp.com",
    databaseURL: "https://pennywise-2023-default-rtdb.firebaseio.com",
    projectId: "pennywise-2023",
    storageBucket: "pennywise-2023.appspot.com",
    messagingSenderId: "286276321895",
    appId: "1:286276321895:web:1af99f1ee96a429efacac2",
    measurementId: "G-QFMHB13DPC"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);
// const database = getDatabase(app);
// const auth = getAuth();

export { app, analytics };
