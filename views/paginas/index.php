<!-- Main -->
<main class="container seccion">
    <h1>Mas Sobre Nosotros</h1>
    <!-- Iconos -->
     <?php 
    include 'iconos.php';
    ?>
</main>
<!-- Casas Info -->
<section class="seccion container">
    <h2>Casas y Depas en Venta</h2>
    <!-- template de anuncios -->
    <?php 
    include 'listado.php';
    ?>


    <div class="align-right">
        <a href="/propiedades" class="button-green">Ver Todas</a>
    </div>
</section>

<section class="img-contact">
    <h2>Encuentra la Casa de Tus Sueños</h2>
    <p>Llena el fommulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="/contacto" class="button-yellow-inline">Contactanos</a>
</section>
<!-- Blog -->
<!-- Blog Testimonial -->
<div class="container seccion seccion-inf">
    <section>
        <h3>Nuestro Blog</h3>
        <article class="entry-blog">
            <div class="imag">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Entrada Blog">
                </picture>
            </div>
            <div class="text-entry">
                <a href="/entrada">
                    <h4>Terraza en el Techo de tu casa</h4>
                </a>
                <p class="info-meta">Escrito el: <span>28/05/2025</span>por: <span>Admin</span></p>
                <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
            </div>
        </article>

        <article class="entry-blog">
            <div class="imag">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Entrada Blog">
                </picture>
            </div>
            <div class="text-entry">
                <a href="/entrada">
                    <h4>Guía para la decoración de tu hogar</h4>
                </a>
                <p class="info-meta">Escrito el: <span>28/05/2025</span>por: <span>Admin</span></p>
                <p>Maximiza el espacio en tu hogar con esta guía, aprende a combinar muebles y colores para darle vida a tu espacio</p>
            </div>
        </article>
    </section>
    <section class="testimony">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal de Bienes Raices me ayudo a encontrar la casa de mis sueños, siempre estuvieron atentos a mis necesidades y me brindaron un excelente servicio.
            </blockquote>
            <p>- Alexis Bautista</p>
        </div>

    </section>
</div>