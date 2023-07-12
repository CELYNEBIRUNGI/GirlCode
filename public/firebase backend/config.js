// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.23.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDodmc9vI2ySsQ2AQZ7p_XdpYIghIZ_2HE",
  authDomain: "tubayo-community-fund-6544c.firebaseapp.com",
  projectId: "tubayo-community-fund-6544c",
  storageBucket: "tubayo-community-fund-6544c.appspot.com",
  messagingSenderId: "2533269119",
  appId: "1:2533269119:web:35ecd83478d0bdd006e94a",
  measurementId: "G-6YJLEXZ7K4"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

export { app, analytics };
