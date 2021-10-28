// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getFirestore } from "@firebase/firestore";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyCzgNkM0X7shPYUyUwIKFlVinNTtnNMn9s",
  authDomain: "test-37e00.firebaseapp.com",
  databaseURL: "https://test-37e00.firebaseio.com",
  projectId: "test-37e00",
  storageBucket: "test-37e00.appspot.com",
  messagingSenderId: "1027528548618",
  appId: "1:1027528548618:web:d60ac850a31e4064561af3",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);
