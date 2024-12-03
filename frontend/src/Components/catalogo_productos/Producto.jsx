import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

const Producto = (props) => {
    const { imagen, nombre, precio, onAddToCart } = props;

    return (
        <div className="card text-center m-3" style={{ width: '18rem' }}>
            <img src={imagen} className="card-img-top" alt={nombre} />
            <div className="card-body">
                <h5 className="card-title">{nombre}</h5>
                <p className="card-text text-success">${precio}</p>
                <button className="btn btn-primary" onClick={onAddToCart}>
                    Agregar al carrito
                </button>
            </div>
        </div>
    );
};

export default Producto;
