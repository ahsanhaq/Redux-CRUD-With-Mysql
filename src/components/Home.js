import React, { useEffect } from "react";
import { GetApiAction, DeleteApiAction } from "../redux/action/action";
import { useDispatch, useSelector } from "react-redux";
import { Link ,useNavigate} from "react-router-dom";

export const Home = () => {
  const navigate = useNavigate();
  const responseData = useSelector((state) => state.Reducer.details);
  const isDeleteResponse = useSelector((state) => state.Reducer.isDeleteResponse);
  const dispatch = useDispatch();
  useEffect(() => {
    const loggedInUser = localStorage.getItem("loggedInUser");
    console.log(loggedInUser)
    if (!loggedInUser) {
      navigate("/");
    } 
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
