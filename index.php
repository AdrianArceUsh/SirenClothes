<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" media="all" href="estilos.css"  />
  <title>SirenClothes</title>
</head>
<body>
  <input type="text" id="codigo" placeholder="codigo"><br>
    <select id="tipo">
    <option></option>
    <option value="Pantalones">Pantalones</option>
    <option value="Polleras">Polleras</option>
    <option value="Lenceria">Lenceria</option>
    <option value="Accesorios">Accesorios</option>
    <option value="Camperas">Camperas</option>
    <option value="Joyeria">Joyeria</option>
  </select><br>
  <input type="text" id="descripcion" placeholder="Descripcion"><br>
  <input type="number" id="precio" placeholder="0.00"><br>
  <input type="file" id="imagen" accept="image/*"><hr>  

  <button id="agregar">Agregar</button>
  <button id="modificar">Modificar</button>
  <button id="Eliminar">Eliminar</button>
  <button id="obtener">Obtener Lista</button>
  <pre id="salida"></pre>
<div id="galeria" class="galeria"></div>
<script type="module" src="./script.js"></script>


</body>
</html>
