import React, { useState, } from "react";
import { PostApiAction } from "../redux/action/action";
import { useDispatch,useSelector, } from "react-redux";
import { CheckStatus } from "./checkAuth";
import { useLocation } from 'react-router-dom'

const Form = () =>{
  //const location  = useLocation(); 
    
    //console.log('locaaation',location)
   
  CheckStatus();
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [country, setCountry] = useState("");
  const dispatch = useDispatch();
  const isResponse = useSelector((state) => state.Reducer.isResponse);
  
  const nameHandler = (e) => {
    setName(e.target.value);
  };
  const emailHandler = (e) => {
    setEmail(e.target.value);
  };
  const phoneHandler = (e) => {
    setPhone(e.target.value);
  };
  const countryHandler = (e) => {
    setCountry(e.target.value);
  };
  const clickHandler = (e) => {
    e.preventDefault();
    const finalData = {
        name:name,
        email:email,
        phone:phone,
        country:country
    }
    dispatch(PostApiAction(finalData))
  };
  if(isResponse.error===false){
        alert("submit");
  }
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
              onChange={(e) => nameHandler(e)}
            />
          </div>
          <div className="col">
            <input
              type="email"
              className="form-control"
              name="email"
              placeholder="Email"
              onChange={(e) => emailHandler(e)}
            />
          </div>
        </div>
        <div className="row">
          <div className="col">
            <input
              type="text"
              className="form-control"
              name="phone"
              placeholder="Phone"
              onChange={(e) => phoneHandler(e)}
            />
          </div>
          <div className="col">
            <input
              type="text"
              className="form-control"
              name="country"
              placeholder="Country"
              onChange={(e) => countryHandler(e)}
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
}

export default Form;



