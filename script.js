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

/// Función para AGREGAR un producto enviándolo a PHP
agregar.onclick = async () => {
    const formData = new FormData();
    // Asegúrate de tener inputs en tu HTML con estas IDs (codigo, nombre, etc.)
    formData.append("codigo", codigo.value);
    formData.append("descripcion", descripcion.value);
    formData.append("precio", +precio.value);
    formData.append("tipo", tipo.value); // Por ejemplo: 'Remera', 'Pantalón'
    
    if (imagen.files[0]) {
        formData.append("imagen", imagen.files[0]);
    }

    try {
        const respuesta = await fetch("agregar_producto.php", {
            method: "POST",
            body: formData
        });
        
        const resultado = await respuesta.json();
        if (resultado.success) {
            alert("¡Producto agregado a MySQL con éxito!");
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
        const respuesta = await fetch("https://sirenclothes-production.up.railway.app/obtener_productos.php");
        const productos = await respuesta.json();

        // Mapeo adaptado a las columnas exactas de tu tabla 'stock'
        galeria.innerHTML = productos.map(p => `
            <div class="card" data-codigo="${p.codigo}">
                <img src="imagenes/${p.imagen || 'default.jpg'}" alt="${p.descripcion}">
                <h3>Código: ${p.codigo}</h3>
                <p>${p.descripcion}</p>
                <small>Categoría: ${p.tipo}</small>
                <br>
                <span>$${parseFloat(p.precio).toLocaleString("es-AR")}</span>
            </div>
        `).join("");
        
    } catch (error) {
        console.error("Error al obtener productos:", error);
    }
};
