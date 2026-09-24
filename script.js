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

agregar.onclick =async () =>
    await put ({
        nombre: nombre.value,
        precio: +precio.value,
        descripcion: descripcion.value,
        imagen: imagen.files[0]?.name || null
    });

obtener.onclick = async () => {
    const productos = await getAll();
    galeria.innerHTML = productos.map(p => `
        <div class="card">
            <img src="imagenes/${p.imagen}" alt="${p.nombre}">
            <h3>${p.nombre}</h3>
            <p>${p.descripcion}</p>
            <span>$${p.precio.toLocaleString("es-AR")}</span>
        </div>
    `).join("");
};
