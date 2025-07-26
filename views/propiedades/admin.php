 <main class="container seccion">
     <h1>Administrador de Bienes Raices</h1>
     <!-- mostrar mensaje -->
     <?php
        if ($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
            if ($mensaje) { ?>
             <p class="alerta exito"><?php echo s($mensaje); ?></p>
         <?php } ?>
     <?php } ?>

     <a href="/propiedades/crear" class="button button-green">Nueva Propiedad</a>
     <a href="/vendedores/crear" class="button button-yellow-inline">Nuev@ Vended@r</a>
     <h2 class="">Propiedades</h2>
     <table class="propiedades">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Titulo</th>
                 <th>Imagen</th>
                 <th>Precio</th>
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody> <!-- Mostrar los resultados -->
             <?php foreach ($propiedades as $propiedad): ?>

                 <tr>
                     <td> <?php echo $propiedad->id; ?> </td>
                     <td><?php echo $propiedad->titulo; ?></td>
                     <td><img src="/imagenes/<?php echo $propiedad->imagen . ".jpg"; ?>" class="imagen-tabla" alt=""></td>
                     <td>$ <?php echo $propiedad->precio; ?></td>
                     <td>
                         <form method="POST" class="w-100" action="/propiedades/eliminar">
                             <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                             <input type="hidden" name="tipo" value="propiedad">
                             <input type="submit" class="button-red-block" value="Borrar">
                         </form>
                         <a class="button-yellow-block" href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>">Actualizar</a>
                     </td>
                 </tr>

             <?php endforeach; ?>
         </tbody>
     </table>

     <h2 class="">Vendedores</h2>

     <table class="propiedades">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Nombre</th>
                 <th>Telefono</th>
                 <th>Acciones</th>
             </tr>
         </thead>
         <tbody> <!-- Mostrar los resultados -->
             <?php foreach ($vendedores as $vendedor): ?>

                 <tr>
                     <td> <?php echo $vendedor->id; ?> </td>
                     <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                     <td> <?php echo $vendedor->telefono; ?></td>
                     <td>
                         <form method="POST" class="w-100" action="/vendedores/eliminar">
                             <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                             <input type="hidden" name="tipo" value="vendedor">
                             <input type="submit" class="button-red-block" value="Borrar">
                         </form>
                         <a class="button-yellow-block" href="/vendedores/actualizar?id=<?php echo $vendedor->id; ?>">Actualizar</a>
                     </td>
                 </tr>
             <?php endforeach; ?>
         </tbody>
     </table>
 </main>