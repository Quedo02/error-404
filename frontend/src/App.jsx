import React from "react";
import Navbar from "./Components/navbar/Navbar";
import Catalogo from "./Components/catalogo_productos/Catalogo";
import 'bootstrap/dist/css/bootstrap.min.css';


const App = () => {
  return (
      <div className="App">
      <Navbar />
      <Catalogo />
      </div>
  );
};

export default App;
