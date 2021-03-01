import firebase from 'firebase/app'
import 'firebase/auth'

const firebaseConfig = {
    apiKey: "AIzaSyAx7Ley_cwxr-bM8IE5XqZJkygnvaNxhqM",
    authDomain: "sayaot.firebaseapp.com",
    projectId: "sayaot",
    storageBucket: "sayaot.appspot.com",
    messagingSenderId: "453492556801",
    appId: "1:453492556801:web:c30ce1c3f1ff5762742c00",
    measurementId: "G-MYQ4LCBBWG"
}
firebase.initializeApp(firebaseConfig)

const auth = firebase.auth

export {
    auth
}
