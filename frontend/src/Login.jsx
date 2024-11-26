import React, { useState } from "react";

const Login = () => {
  // State para manejar los datos del formulario
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");

  // Manejador de envío del formulario
  const handleSubmit = async (e) => {
    e.preventDefault(); // Previene el comportamiento por defecto del formulario (recargar la página)

    // Crea un objeto con los datos del formulario
    const data = {
      username: username,
      password: password,
    };

    // Realiza la solicitud POST al backend
    try {
      const response = await fetch("http://localhost/error-404/public/index.php/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      const result = await response.json();

      // Procesa la respuesta
      if (result.success) {
        alert("Inicio de sesión exitoso");
      } else {
        alert("Credenciales incorrectas");
      }
    } catch (error) {
      console.error("Error al hacer login:", error);
      alert("Hubo un problema al realizar el inicio de sesión");
    }
  };

  return (
    <div style={{ textAlign: "center", marginTop: "50px" }}>
      <h2>Iniciar sesión</h2>
      <form onSubmit={handleSubmit}>
        <div>
          <input
            type="text"
            placeholder="Usuario"
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            required
          />
        </div>
        <div>
          <input
            type="password"
            placeholder="Contraseña"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
            required
          />
        </div>
        <div>
          <button type="submit">Ingresar</button>
        </div>
      </form>
    </div>
  );
};

export default Login;
