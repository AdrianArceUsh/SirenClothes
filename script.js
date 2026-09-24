const salidaEl=document.getElementById("salida");
const salida = (msg) => {
    if(salidaEl){
        salidaEl.textContent=JSON.stringify(msg,null, 2);
    }
}
const db = await new Promise( (resolve, reject) => {
    const req = indexedDB.open("Siren",1);
    req.onupgradeneeded = () =>
        req.result.createObjectStore("productos",{
            keyPath:"id",
            autoIncrement:true,
        });
        req.onsuccess = () => resolve(req.result);
        req.onerror = () => reject(req.error);
    },
);

const store = (mode) => 
    db
        .transaction("productos", mode)
        .objectStore("productos");

const put = (producto) =>
    new Promise ((res, rej) =>{
        const req = store("readwrite").put(producto);
        req.onsuccess = () => res(req.result);
        req.reject = () => rej(req.error);
    });

    const getAll= () =>
        new Promise ((res, rej) => {
        const req = store("readonly").getAll();
        req.onsuccess = () => res(req.result);
        req.onerror = () => rej(req.error)    
        });

// Función para AGREGAR un producto enviándolo a PHP
agregar.onclick = async () => {
    // Como vas a enviar un archivo (imagen), usamos FormData
    const formData = new FormData();
    formData.append("nombre", nombre.value);
    formData.append("precio", +precio.value);
    formData.append("descripcion", descripcion.value);
    // Enviamos el archivo real de la imagen
    if (imagen.files[0]) {
        formData.append("imagen", imagen.files[0]);
    }

    try {
        const respuesta = await fetch("agregar_producto.php", {
            method: "POST",
            body: formData // Enviamos los datos del formulario a PHP
        });
        
        const resultado = await respuesta.json();
        if (resultado.success) {
            alert("¡Producto agregado a MySQL!");
            // Limpiar campos si quieres
        } else {
            alert("Error: " + resultado.error);
        }
    } catch (error) {
        console.error("Error en la petición:", error);
    }
};

// Función para OBTENER los productos desde PHP
obtener.onclick = async () => {
    try {
        // Le pedimos a PHP que nos traiga los productos de MySQL
        const respuesta = await fetch("obtener_productos.php");
        const productos = await respuesta.json(); // PHP nos responderá un JSON

        // Tu misma lógica para renderizar la galería queda intacta:
        galeria.innerHTML = productos.map(p => `
            <div class="card">
                <img src="imagenes/${p.imagen || 'default.jpg'}" alt="${p.nombre}">
                <h3>${p.nombre}</h3>
                <p>${p.descripcion}</p>
                <span>$${p.precio.toLocaleString("es-AR")}</span>
            </div>
        `).join("");
        
    } catch (error) {
        console.error("Error al obtener productos:", error);
    }
};
