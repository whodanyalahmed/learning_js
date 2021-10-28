import { useState, useEffect } from "react";
import "./App.css";
import { db } from "./firebase-config";
import { collection, getDocs } from "firebase/firestore";

function App() {
  const [users, SetUsers] = useState([]);
  const userCollectionRef = collection(db, "employees");
  useEffect(() => {
    const getUsers = async () => {
      const data = await getDocs(userCollectionRef);
      SetUsers(data.docs.map((doc) => ({ ...doc.data(), id: doc.id })));
      console.log(data);
    };
    getUsers();
  }, []);
  return (
    // <div className="App">

    //   {users.map((users)=>{
    //     return
    //      <div>
    //        {""}
    //       <h1>Name:{user.name}</h1>
    //       <h1>age:{user.age}</h1>
    // </div>
    //   })}

    // eslint-disable-next-line react/react-in-jsx-scope
    <div className="App">
      {users.map((user) => {
        return (
          <div>
            {" "}
            <h1>NAme: {user.name}</h1>
            <h1>Age: {user.age}</h1>
          </div>
        );
      })}
    </div>
  );
}

export default App;
