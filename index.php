<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Siren Clothes</title>
</head>
<body>

  <header>
    <h1>Siren Clothes - 2026</h1>
    <nav>
      <a href="#">Inicio</a>
      <a href="#">Mujer</a>
      <a href="#">Hombre</a>
      <a href="#">Ofertas</a>
    </nav>
  </header>

  <!-- Carrusel -->
  <section class="carousel" id="carousel">
    <div class="carousel-slide active">
      <img src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=1200" alt="Colección Verano" />
      <div class="carousel-caption">
        <h2>Colección Verano 2026</h2>
        <p>Novedades con hasta 30% OFF</p>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1200" alt="Línea Urbana" />
      <div class="carousel-caption">
        <h2>Línea Urbana</h2>
        <p>Streetwear para todos los días</p>
      </div>
    </div>
    <div class="carousel-slide">
      <img src="https://images.unsplash.com/photo-1445205170230-053b83016050?w=1200" alt="Ofertas" />
      <div class="carousel-caption">
        <h2>Ofertas de la Semana</h2>
        <p>2x1 en prendas seleccionadas</p>
      </div>
    </div>

    <button class="carousel-btn prev" onclick="changeSlide(-1)">&#10094;</button>
    <button class="carousel-btn next" onclick="changeSlide(1)">&#10095;</button>
    <div class="carousel-dots" id="dots"></div>
  </section>

  <!-- Productos destacados -->
  <section class="products">
    <h2>Destacados</h2>
    <div class="grid">
      <div class="card">
        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400" alt="Blusa" />
        <div class="card-body">
          <h3>Blusa de Lino</h3>
          <p class="price">$25.000</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1542272604-787c3835535d?w=400" alt="Jeans" />
        <div class="card-body">
          <h3>Jeans Slim Fit</h3>
          <p class="price">$42.000</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=400" alt="Chaqueta" />
        <div class="card-body">
          <h3>Chaqueta de Cuero</h3>
          <p class="price">$89.000</p>
        </div>
      </div>
      <div class="card">
        <img src="https://images.unsplash.com/photo-1515886657613-9f3515b0c78f?w=400" alt="Vestido" />
        <div class="card-body">
          <h3>Vestido Midi</h3>
          <p class="price">$38.000</p>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; 2026 Siren Clothes – Todos los derechos reservados</p>
  </footer>

  <script>
    const slides = document.querySelectorAll('.carousel-slide');
    const dotsContainer = document.getElementById('dots');
    let current = 0;
    let interval;

    // Crear puntos
    slides.forEach((_, i) => {
      const dot = document.createElement('span');
      dot.className = 'dot' + (i === 0 ? ' active' : '');
      dot.onclick = () => goTo(i);
      dotsContainer.appendChild(dot);
    });
    const dots = document.querySelectorAll('.dot');

    function goTo(i) {
      slides[current].classList.remove('active');
      dots[current].classList.remove('active');
      current = (i + slides.length) % slides.length;
      slides[current].classList.add('active');
      dots[current].classList.add('active');
      resetInterval();
    }

    function changeSlide(dir) { goTo(current + dir); }

    function resetInterval() {
      clearInterval(interval);
      interval = setInterval(() => goTo(current + 1), 4000);
    }

    resetInterval();
  </script>

</body>
</html>   