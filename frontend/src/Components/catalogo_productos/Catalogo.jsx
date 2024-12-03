import React from 'react';
import Producto from './Producto';
import 'bootstrap/dist/css/bootstrap.min.css';

const Catalogo = () => {
    const productos = [
        { id: 1, imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s', nombre: 'Producto 1', precio: 100 },
        { id: 2, imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s', nombre: 'Producto 2', precio: 150 },
        { id: 3, imagen: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSKgvmJ8Oz3pJmypAHKuOuXvfR5_iRg3rNJMQ&s', nombre: 'Producto 3', precio: 200 },
    ];

    return (
        <div className="container my-4">
            <div className="row">
                {productos.map((producto) => (
                    <div key={producto.id} className="col-md-4 d-flex justify-content-center">
                        <Producto
                            imagen={producto.imagen}
                            nombre={producto.nombre}
                            precio={producto.precio}
                            onAddToCart={() => console.log(`Agregado: ${producto.nombre}`)}
                        />
                    </div>
                ))}
            </div>
        </div>
    );
};

export default Catalogo;
