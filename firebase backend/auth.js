import { app } from "./config.js";
import { getFirestore, collection, doc, setDoc, updateDoc, getDoc, getDocs, query, where } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-firestore.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut, } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-auth.js";

const db = getFirestore(app);
const auth = getAuth();

// SIGNUP FUNCTION

const signup = document.getElementById('signUp');
if (signup) {
    signup.addEventListener('click', (e) => {
        var firstname = document.getElementById('firstName').value;
        var lastname = document.getElementById('lastName').value;
        var email = document.getElementById('email').value;
        var countryCode = document.getElementById('countryCode').value;
        var phoneNumber = document.getElementById('phoneNumber').value;
        var password = document.getElementById('password').value;

        createUserWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                const user = userCredential.user;

                setDoc(doc(db, 'Users', user.uid), {
                    firstName: firstname,
                    lastName: lastname,
                    email: email,
                    Contact: countryCode + ' ' + phoneNumber
                })
                    .then(() => {
                        alert("User Created");
                        window.location = "/sitelogin.html"
                    })
                    .catch((error) => {
                        const errorMessage = error.message;
                        alert(errorMessage);
                    });
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert(errorMessage);
            });
    });
}

// LOGIN FUNCTION

const login = document.getElementById('logIn');
if (login) {
    login.addEventListener('click', (e) => {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                const user = userCredential.user;

                const userRef = doc(db, 'Users', user.uid);
                updateDoc(userRef, {
                    last_login: new Date().toString()
                })
                    .then(() => {
                        alert("Login Successfull");
                        window.location = "/dashboard.html"
                    })
                    .catch((error) => {
                        const errorMessage = error.message;
                        alert(errorMessage);
                    });

            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
                alert(errorMessage);
            });
    });
}