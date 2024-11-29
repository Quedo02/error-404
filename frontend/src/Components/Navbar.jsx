import React from 'react';
import '../assets/Styles/Navbar.css';
import logo from '../assets/Images/logo.png'
import login from '../assets/Images/login.png'
import carrito from '../assets/Images/carrito.png'

const Navbar = () => {
    return (
        <div className='navbar'>
            <img src={logo} alt="LoboSimulador" />
            <ul className='pages'>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">¿Quiénes somos?</a></li>
                <li><a href="#">¿Cómo comprar?</a></li>
                <li><a href="#">Cursos</a></li>
                <li><a href="#">Simuladores</a></li>
            </ul>

            <ul className='icons'>
                <li><a href="#"><img className='login_icon' src={login} alt="Iniciar sesión" /></a></li>
                <li><a href="#"><img className='carrito_icon' src={carrito} alt="Carrito de compras" /></a></li>
            </ul>
        </div>
    );
};

export default Navbar;
