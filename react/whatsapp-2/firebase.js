import * as firebase from "firebase/app";
import { getApps,initializeApp } from "firebase/app";
// import * as firebase from "firebase";
import { getFirestore, collection, query, where, getDocs } from "firebase/firestore";
import 'firebase/database'
import { getAuth,GoogleAuthProvider } from "firebase/auth";
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseApp  = initializeApp({
  apiKey: "AIzaSyDL796_yVEGAHq_FtCk0cJfIUuig7vqbNo",
  authDomain: "ipcomet.firebaseapp.com",
  databaseURL: "https://ipcomet.firebaseio.com",
  projectId: "ipcomet",
  storageBucket: "ipcomet.appspot.com",
  messagingSenderId: "77512159797",
  appId: "1:77512159797:web:28d857cd8db3e9cc39b77c",
  measurementId: "G-C7H7G8K3SD",
});


// console.log(firebaseApp);

const db = getFirestore();
const auth =getAuth();

const provider = new GoogleAuthProvider();

export { db, auth, provider };
