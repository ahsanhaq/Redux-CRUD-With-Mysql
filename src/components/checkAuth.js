import { useNavigate } from "react-router-dom";

export const CheckAuth = () => {
  const navigate = useNavigate();
  const loggedInUser = localStorage.getItem("loggedInUser");
  console.log(loggedInUser);
  if (loggedInUser) {
    navigate("/home");
   
  } else {
    navigate("/");
  }
};

export default CheckAuth;
