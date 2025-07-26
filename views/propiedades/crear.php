<main class="container seccion">
        <h1>Crear</h1>

        <a href="/admin" class="button button-green">Volver</a>
    <!-- Mostrar Errores -->
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>

    <form class="formulario" method="POST" enctype="multipart/form-data" action="/propiedades/crear">

        <?php include __DIR__ . '../formulario.php'; ?>
        <input type="submit" value="Crear Propiedad" class="button button-green">
    </form>

</main>