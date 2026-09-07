<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Siren Clothes</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body { font-family: 'Segoe UI', sans-serif; }

    /* ── Header ── */
    header {
      background: #1a1a1a;
      color: #fff;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    header h1 { font-size: 1.4rem; letter-spacing: 1px; }
    nav a { color: #ccc; text-decoration: none; margin-left: 1.5rem; }
    nav a:hover { color: #fff; }

    /* ── Carrusel ── */
    .carousel {
      position: relative;
      width: 100%;
      height: 500px;
      overflow: hidden;
    }
    .carousel-slide {
      position: absolute;
      inset: 0;
      opacity: 0;
      transition: opacity 0.6s ease;
    }
    .carousel-slide.active { opacity: 1; }
    .carousel-slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .carousel-caption {
      position: absolute;
      bottom: 40px;
      left: 50%;
      transform: translateX(-50%);
      background: rgba(0,0,0,.6);
      color: #fff;
      padding: 1rem 2rem;
      border-radius: 8px;
      text-align: center;
    }
    .carousel-caption h2 { font-size: 1.6rem; margin-bottom: .3rem; }
    .carousel-caption p { font-size: .95rem; }

    /* Flechas */
    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(0,0,0,.4);
      color: #fff;
      border: none;
      font-size: 2rem;
      padding: .5rem 1rem;
      cursor: pointer;
      border-radius: 50%;
      transition: background .3s;
    }
    .carousel-btn:hover { background: rgba(0,0,0,.7); }
    .carousel-btn.prev { left: 15px; }
    .carousel-btn.next { right: 15px; }

    /* Puntos */
    .carousel-dots {
      position: absolute;
      bottom: 10px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 8px;
    }
    .dot {
      width: 12px; height: 12px;
      border-radius: 50%;
      background: rgba(255,255,255,.5);
      cursor: pointer;
      transition: background .3s;
    }
    .dot.active { background: #fff; }

    /* ── Sección productos ── */
    .products {
      padding: 3rem 2rem;
      text-align: center;
    }
    .products h2 { margin-bottom: 2rem; font-size: 1.8rem; }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 1.5rem;
      max-width: 1100px;
      margin: 0 auto;
    }
    .card {
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      overflow: hidden;
      transition: transform .2s;
    }
    .card:hover { transform: translateY(-4px); }
    .card img { width: 100%; height: 260px; object-fit: cover; }
    .card-body { padding: 1rem; }
    .card-body h3 { font-size: 1rem; margin-bottom: .3rem; }
    .card-body .price { color: #c0392b; font-weight: bold; }

    /* ── Footer ── */
    footer {
      background: #1a1a1a;
      color: #aaa;
      text-align: center;
      padding: 1.5rem;
      margin-top: 2rem;
    }
  </style>
</head>
<body>

  <header>
    <h1>Siren Clothes</h1>
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