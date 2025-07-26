<main class="container seccion">
        <h1>Actualizar Vendedor(a)</h1>

        <a href="/admin" class="button button-green">Volver</a>

        <!-- mostrar errores -->

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error ?>
            </div>
        <?php endforeach ?>

        <form class="formulario" method="POST">

            <?php include __DIR__ . '../formulario.php'; ?>

        <input type="submit" value="Actualizar Vended@r" class="button button-green">
        </form>
    </main>