import { useState,useEffect } from "react";
import { UpdateApiAction } from "../redux/action/action";
import { useDispatch,useSelector } from "react-redux";
import { useParams } from "react-router-dom";
import GetDetailsByHooks from "../hooks/getDetailsByHooks";

const UpdateDetails = () =>{
  const {id}=useParams();
  
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [country, setCountry] = useState("");
  const dispatch = useDispatch();
  const isUpdateResponse = useSelector((state) => state.Reducer.isUpdateResponse);

  const [detailById]=GetDetailsByHooks(id);
  console.log(detailById);
  useEffect(() => {
    
   const datas =() =>{
    if(detailById.data){
        
        setName(detailById.data.data[0].name);
        setEmail(detailById.data.data[0].email);
        setPhone(detailById.data.data[0].phone);
        setCountry(detailById.data.data[0].country);
    }
   };
   datas();
  }, [detailById.data]);
  
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
    dispatch(UpdateApiAction(finalData,id))
  };
  if(isUpdateResponse){
    if(isUpdateResponse.error===false){
      alert("submit");
    }
    
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
              defaultValue={name}
              onChange={(e) => nameHandler(e)}
            />
          </div>
          <div className="col">
            <input
              type="email"
              className="form-control"
              name="email"
              placeholder="Email"
              defaultValue={email}
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
              defaultValue={phone}
              onChange={(e) => phoneHandler(e)}
            />
          </div>
          <div className="col">
            <input
              type="text"
              className="form-control"
              name="country"
              placeholder="Country"
              defaultValue={country}
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
export default UpdateDetails;
