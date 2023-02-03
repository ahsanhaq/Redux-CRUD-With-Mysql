import React, { useState } from "react";
import { PostLoginApiAction } from "../redux/action/action";
import { useDispatch, useSelector } from "react-redux";
import { CheckStatusLogin } from "./checkAuth";
import { useNavigate } from "react-router-dom";
const Login = () => {
  CheckStatusLogin();
  const navigate = useNavigate();
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  //const [user, setData] = useState(null)

  const dispatch = useDispatch();
  const userData = useSelector((state) => state.Reducer.userData);
 if(userData){
    if(userData.error===false){
   console.log("here we go",userData)
    // setData(userData);
    localStorage.setItem('userData', JSON.stringify(userData.data))

    // const loggedInUser = localStorage.getItem("userData");
    // const log =JSON.parse(loggedInUser)
    //console.log("ahsan---------------",log.user_id);
    localStorage.setItem('loggedInUser', true);
    navigate("/home")


    }

 }
  const emailHandler = (e) => {
    setEmail(e.target.value);
  };
  const passwordHandler = (e) => {
    setPassword(e.target.value);
  };

  const clickHandler = (e) => {
    e.preventDefault();
    const finalData = {
      email: email,
      password: password,
    };
    dispatch(PostLoginApiAction(finalData));
  };
  
  return (
    <div>
      <form>
        <div className="row">
          <div className="col">
            <input
              type="text"
              className="form-control"
              name="name"
              placeholder="Name"
              onChange={(e) => emailHandler(e)}
            />
          </div>
          <div className="col">
            <input
              type="email"
              className="form-control"
              name="email"
              placeholder="Email"
              onChange={(e) => passwordHandler(e)}
            />
          </div>
        </div>
        <button
          className="btn btn-primary"
          type="submit"
          onClick={(e) => {
            clickHandler(e);
          }}
        >
          Submit form
        </button>
      </form>
    </div>
  );
};

export default Login;
