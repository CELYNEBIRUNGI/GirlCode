import { app } from "./config.js";
import { getFirestore, collection, doc, setDoc, updateDoc, getDoc, getDocs, query, where } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-firestore.js";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-auth.js";
import { getStorage, ref, uploadBytesResumable, getDownloadURL } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-storage.js";

const db = getFirestore(app);
const auth = getAuth();
const storage = getStorage(app);

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

onAuthStateChanged(auth, async (user) => {
  if (user) {
    // User is signed in
    const uid = user.uid;
    const allowedUrls = [
        '/dashboard.html',
        '/users-profile.html',
        '/charts-apexcharts.html',
        '/charts-chartjs.html',
        '/pages-contact.html',
        '/pages-faq.html',
        '/'
    ];
    const currentUrl = window.location.pathname;

    if (!allowedUrls.includes(currentUrl)) {
        // Redirect to authed page if not already there
        window.location = '/dashboard.html';
    } else {
      // Update profile information
        const profileNames = document.querySelectorAll('.pname1, .pname2, .pname3, .pname4');
        const company = document.querySelector('.c1');
        const jobs = document.querySelectorAll('.j1, .j2, .j3');
        const country = document.querySelector('.co1');
        const address = document.querySelector('.a1');
        const phone = document.querySelector('.ph1');
        const email = document.querySelector('.email');
        const about = document.querySelector('.About');
        const profileImage = document.querySelectorAll('.pimg1, .pimg2, .pimg3');

      // Get user information from Firebase Auth
      // const db = getFirestore();
      const userRef = doc(db, 'Users', uid);
      getDoc(userRef)
        .then((doc) => {
          if (doc.exists()) {
              const userData = doc.data();
              
            profileNames.forEach((profileName) => {
                profileName.textContent = userData.firstName + ' ' + userData.lastName || 'Anonymous';
                const fullNameInput = document.getElementById('fullName');
                fullNameInput.value = profileName.textContent;
            });
              
            company.textContent = userData.company || 'No Company';
            const companyInput = document.getElementById('company');
            companyInput.value = company.textContent;
              
            jobs.forEach((job) => {
                job.textContent = userData.job || 'No Job';
                const jobInput = document.getElementById('Job');
                jobInput.value = job.textContent;
            });
              
            country.textContent = userData.country || 'No Country';
            const countryInput = document.getElementById('Country');
            countryInput.value = country.textContent;
              
            address.textContent = userData.address || 'No Address';
            const addressInput = document.getElementById('Address');
            addressInput.value = address.textContent;
                    
            phone.textContent = userData.Contact || 'No Phone No';
            const phoneInput = document.getElementById('Phone');
            phoneInput.value = phone.textContent;
        
            email.textContent = userData.email || 'No Email';
            const emailInput = document.getElementById('Email');
            emailInput.value = email.textContent;
            
            about.textContent = userData.about || 'No About Information';
            const aboutInput = document.getElementById('about');
            aboutInput.value = about.textContent;
            
            profileImage.forEach((profileImg) => {
                profileImg.src = userData.profileImage || '/assets/img/avatar.png';
            });
          }
        })
        .catch((error) => {
            console.log('Error getting user document:', error);
        });

        // // Get the number of cases reported by the user
        // const reportsRef = collection(db, 'Reports');
        // const filteredReports = query(reportsRef, where('uploadedby', '==', user.email)); // or getDocs(query(reportsRef))
        // const querySnapshot = await getDocs(filteredReports);
        // try {
        //         document.getElementById('numCases').textContent = querySnapshot.size;
        //     } catch (error) {
        //         console.log('Error getting reports:', error);
            // }
        
    }
    } else {
        // User is signed out
        const allowedUrls = [
            '/index.html',
            '/siteregister.html',
            '/sitelogin.html',
        ];
        const currentUrl = window.location.pathname;

        if (!allowedUrls.includes(currentUrl)) {
            // Redirect to login page if not already there
            window.location = '/index.html';
        }
    }
});

const logout = document.getElementById('logOut');
if (logout) {
    logout.addEventListener('click', (e) => {
        signOut(auth).then(() => {
            // Sign-out successful.
            alert('Logged Out Successfully');
            window.location = "/sitelogin.html";
        }).catch((error) => {
            // An error happened.
            const errorCode = error.code;
            const errorMessage = error.message;
            alert(errorMessage);
        });
    });
}

const profileChange = document.getElementById('submit');
if (profileChange) {
  // Add a submit event listener to the form
  profileChange.addEventListener('click', async (e) => {
    e.preventDefault(); // Prevent the default form submission

    // Get the input field values
    const fullName = document.getElementById('fullName').value;
    const about = document.getElementById('about').value;
    const company = document.getElementById('company').value;
    const job = document.getElementById('Job').value;
    const country = document.getElementById('Country').value;
    const address = document.getElementById('Address').value;
    const phone = document.getElementById('Phone').value;
    const email = document.getElementById('Email').value;

    // Update the user's details in the database
    const userId = auth.currentUser.uid;
    const userRef = doc(db, 'Users', userId);

    try {
      // Update the user's details in the database
      await updateDoc(userRef, {
        fullName: fullName,
        about: about,
        company: company,
        job: job,
        country: country,
        address: address,
        phone: phone,
        email: email
      });

      // Handle the profile image upload (assuming you have implemented this separately)
      const profileImageInput = document.getElementById('profileImageChange');
      if (profileImageInput.files.length > 0) {
        const file = profileImageInput.files[0];
        const storageRef = ref(storage, 'profileImages/' + userId);
        const uploadTask = uploadBytesResumable(storageRef, file);

        uploadTask.on(
          'state_changed',
          (snapshot) => {
            // Track upload progress if needed
            const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log(`Upload progress: ${progress}%`);
          },
          (error) => {
            console.error('Error uploading profile image:', error);
            alert('Error uploading profile image:', error);
          },
          async () => {
            // Upload completed successfully
            const downloadURL = await getDownloadURL(uploadTask.snapshot.ref);

            // Update the user's document with the image URL
            await updateDoc(userRef, { profileImage: downloadURL });
            console.log('Profile Image Updated Successfully!');
              alert('Profile Image Updated Successfully');
                    console.log('User details updated successfully!');
      alert('User Details Updated Successfully!');
      window.location.reload();
          }
        );
      }


    } catch (error) {
      console.error('Error updating user details:', error);
      alert('Error updating user details:', error);
    }
  });
}

