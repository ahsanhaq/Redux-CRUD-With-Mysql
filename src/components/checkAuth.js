import { useEffect, useState } from "react";
import { useNavigate } from "react-router-dom";
function CheckStatus(url) {
  const navigate = useNavigate();
  const [userData, setDatas] = useState(null);
  useEffect(() => {
    const loggedInUser = localStorage.getItem("loggedInUser");
    console.log("hooked",loggedInUser)
    setDatas(loggedInUser);
    if (!loggedInUser) {
      navigate("/");
    }
  }, [url]);

  return { userData };
}
function CheckStatusLogin() {
  const navigate = useNavigate();
  const [userData, setDatas] = useState(null);
  useEffect(() => {
    const loggedInUser = localStorage.getItem("loggedInUser");
    console.log("hooked",loggedInUser)
    setDatas(loggedInUser);
    if (loggedInUser) {
      navigate("/home");
    }
  }, []);

  return { userData };
}

export { CheckStatus,CheckStatusLogin };
