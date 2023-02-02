import "./App.css";
import Home from "./components/Home";
import Form from "./components/Form";
import Login from "./components/Login";
import UpdateDetails from "./components/updateDetails";
import { BrowserRouter as Router, Route, Routes } from "react-router-dom";

function App() {
  return (
    <div className="App">
      <Router>
                      <Routes>
                          <Route path="/" element={<Login />} />
                          <Route path="/home" element={<Home />} />
                          <Route path="/form" element={<Form />} />
                          <Route path="/edit/:id" element={<UpdateDetails />} />
                        </Routes>
                      
                    </Router>
    </div>
  );
}

export default App;
