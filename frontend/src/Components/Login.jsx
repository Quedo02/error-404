import React, { useState } from "react";

import "../assets/Styles/Login.css";

const Login = () => {
  const [loginData, setLoginData] = useState({ email: "", password: "" });
  const [signupData, setSignupData] = useState({ username: "", email: "", broj: "", password: "" });

  // Maneja el cambio de datos en los formularios
  const handleChange = (e, formType) => {
    const { name, value } = e.target;

    if (formType === "login") {
      setLoginData({ ...loginData, [name]: value });
    } else {
      setSignupData({ ...signupData, [name]: value });
    }
  };

  // Manejo del envío del formulario de Login
  const handleLoginSubmit = async (e) => {
    e.preventDefault();
    console.log("Login Data:", loginData);
    // Aquí iría la lógica para conectar con el backend (fetch o axios)
  };

  // Manejo del envío del formulario de Sign Up
  const handleSignupSubmit = async (e) => {
    e.preventDefault();
    console.log("Signup Data:", signupData);
    // Aquí iría la lógica para conectar con el backend (fetch o axios)
  };

  return (
    <div className="login_card">
      <input type="checkbox" id="chk" aria-hidden="true" />

      {/* Formulario de Sign Up */}
      <div className="sign_up">
        <form onSubmit={handleSignupSubmit}>
          <label htmlFor="chk" aria-hidden="true">
            Sign up
          </label>
          <input
            type="text"
            name="username"
            placeholder="User name"
            value={signupData.username}
            onChange={(e) => handleChange(e, "signup")}
            required
          />
          <input
            type="email"
            name="email"
            placeholder="Email"
            value={signupData.email}
            onChange={(e) => handleChange(e, "signup")}
            required
          />
          <input
            type="number"
            name="broj"
            placeholder="BrojTelefona"
            value={signupData.broj}
            onChange={(e) => handleChange(e, "signup")}
            required
          />
          <input
            type="password"
            name="password"
            placeholder="Password"
            value={signupData.password}
            onChange={(e) => handleChange(e, "signup")}
            required
          />
          <button type="submit">Sign up</button>
        </form>
      </div>

      {/* Formulario de Login */}
      <div className="login">
        <form onSubmit={handleLoginSubmit}>
          <label htmlFor="chk" aria-hidden="true">
            Login
          </label>
          <input
            type="email"
            name="email"
            placeholder="Email"
            value={loginData.email}
            onChange={(e) => handleChange(e, "login")}
            required
          />
          <input
            type="password"
            name="password"
            placeholder="Password"
            value={loginData.password}
            onChange={(e) => handleChange(e, "login")}
            required
          />
          <button type="submit">Login</button>
        </form>
      </div>
    </div>
  );
};

export default Login;
