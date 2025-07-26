<!-- Main -->
    <main class="container seccion">
        <h1>Contacto</h1>

        <?php 
        if($mensaje){
            echo '<p class="alerta exito">' . $mensaje . '</p>';
        }
        ?>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
        </picture>

        <h2>Llene el formulario de Contacto</h2>
        
        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
                
                <label for="mensaje">Mensaje: </label>
                <textarea name="contacto[mensaje]" id="mensaje" required></textarea>
            </fieldset>
            
            <fieldset>
                <legend>Información sobre la propiedad</legend>
                
                <label for="opciones">Vende o Compra: </label>
                <select name="contacto[tipo]" id="opciones" required>
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[precio]" required>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como gustaria que nos comuniquemos con usted</p>
                
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" required>
                    
                    <label for="contactar-email">Correo</label>
                    <input name="contacto[contacto]" type="radio" value="correo" id="contactar-email" required>
                </div>

                <div id="contacto"> </div>


                
            </fieldset>
            <input type="submit" value="Enviar" class="button-green">
        </form>
    </main>