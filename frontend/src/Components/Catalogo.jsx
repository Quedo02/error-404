import React from 'react';
import Producto from './Producto'; // Importa el componente Producto

import '../assets/Styles/Catalogo.css'

const Catalogo = () => {
    // Array de productos (puede ser estático o venir de una API)
    const productos = [
        {
            id: 1,
            imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s',
            nombre: 'Producto 1',
            precio: 100,
        },
        {
            id: 2,
            imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s',
            nombre: 'Producto 2',
            precio: 150,
        },
        {
            id: 3,
            imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s',
            nombre: 'Producto 3',
            precio: 200,
        },
    ];

    return (
        <div className="catalogo-container">
            {/* Mapea cada producto al componente Producto */}
            {productos.map((producto) => (
                <Producto
                    key={producto.id} // Clave única para React
                    imagen={producto.imagen}
                    nombre={producto.nombre}
                    precio={producto.precio}
                    onAddToCart={() => console.log(`Agregado: ${producto.nombre}`)}
                />
            ))}
        </div>
    );
};

export default Catalogo;
