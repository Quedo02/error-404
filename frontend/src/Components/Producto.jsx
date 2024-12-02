import React from 'react'; // Importamos React para crear el componente

import '../assets/Styles/Producto.css'

// Definimos el componente funcional llamado Producto, que recibe `props`
const Producto = (props) => {
    const { imagen, nombre, precio, onAddToCart } = props; // Desestructuramos las props para facilidad de uso

    return (
        <div className="producto_card">
            {/* Muestra la imagen del producto */}
            <img src={imagen} alt={nombre} className="producto_imagen" />

            {/* Muestra el nombre del producto */}
            <h3 className="producto_nombre">{nombre}</h3>

            {/* Muestra el precio del producto */}
            <p className="producto_precio">${precio}</p>

            {/* Botón para agregar al carrito */}
            <button className="producto_boton" onClick={onAddToCart}>
                Agregar al carrito
            </button>
        </div>
    );
};

export default Producto; // Exportamos el componente para que pueda ser usado en otros lugares
