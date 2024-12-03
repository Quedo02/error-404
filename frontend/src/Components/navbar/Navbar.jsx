import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import logo from '../../assets/Images/logo.png';
import login from '../../assets/Images/login.svg';
import carrito from '../../assets/Images/carrito.svg';

const Navbar = () => {
    return (
        <nav className="navbar navbar-expand-lg navbar-light bg-primary">
            <div className="container">
                {/* Logo */}
                <a className="navbar-brand" href="#">
                    <img src={logo} alt="LoboSimulador" height="80" />
                </a>

                {/* Botón de colapso para pantallas pequeñas */}
                <button
                    className="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span className="navbar-toggler-icon"></span>
                </button>

                {/* Links y elementos colapsables */}
                <div className="collapse navbar-collapse" id="navbarNav">
                    {/* Páginas */}
                    <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                            <a className="nav-link text-white" href="#">Inicio</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link text-white" href="#">¿Quiénes somos?</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link text-white" href="#">¿Cómo comprar?</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link text-white" href="#">Cursos</a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link text-white" href="#">Simuladores</a>
                        </li>
                    </ul>

                    {/* Íconos */}
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <a className="nav-link" href="#">
                                <img src={login} alt="Iniciar sesión" height="35" width="35" />
                            </a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link" href="#">
                                <img src={carrito} alt="Carrito de compras" height="35" width="35" />
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
};

export default Navbar;
