import React, { useEffect } from "react";
import { GetApiAction, DeleteApiAction } from "../redux/action/action";
import { useDispatch, useSelector } from "react-redux";
import { Link } from "react-router-dom";
import { CheckStatus } from "./checkAuth";
import { useNavigate } from "react-router-dom";
export const Home = () => {
  CheckStatus();
  const responseData = useSelector((state) => state.Reducer.details);
  const isDeleteResponse = useSelector((state) => state.Reducer.isDeleteResponse);
  const dispatch = useDispatch();
 
  const navigate = useNavigate();
  const logout = () => {
    
   localStorage.clear(); //for localStorage
sessionStorage.clear(); //for sessionStorage
navigate("/")
//navigate('/form', {state:{responseData}})
  };
  useEffect(() => {
    // const loggedInUser = localStorage.getItem("loggedInUser");
    // console.log(loggedInUser)
    
    dispatch(GetApiAction());
  }, [dispatch]);

  if(isDeleteResponse){
    alert("delete");
    window.location.reload(false);
  }
  const result = responseData ? responseData.map((data, index) => {
    return (
      <tr key={index}>
        <td>{data.id}</td>
        <td>{data.name}</td>
        <td>{data.email}</td>
        <td>{data.phone}</td>
        <td>{data.country}</td>
        <td>
          <Link to={`/edit/${data.id}`}>
            <span className="material-icons">edit</span>
          </Link>
        </td>
        <td>
          <span
            className="material-icons text-danger"
            onClick={() => dispatch(DeleteApiAction(data.id))}
          >
            delete
          </span>
        </td>
      </tr>
    );
  }):null;
  return (
    <div className="container">
      <button
          className="btn btn-primary"
          type="submit"
          onClick={(e) => {
            logout();
          }}
        >
          Logout
        </button>
      <table className="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Country</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>{result}</tbody>
      </table>
    </div>
  );
};

export default Home;
