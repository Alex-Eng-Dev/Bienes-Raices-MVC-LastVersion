<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class PropiedadController {

    public static function index(Router $router)
    {
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        /* Mostrar mensaje condicional*/
        $resultado = $_GET['resultado'] ?? null;

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedores
        ]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedor::getAll();
        //Arreglo con mensjes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //?Crea una nueva instancia de la clase Propiedad
            $propiedad = new Propiedad($_POST['propiedad']);
            // debuguear($_FILES['propiedad']);


            //Generar nombre unico 
            $nombreImagen = md5(uniqid(rand(), true));

            //Setear la imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            $errores = $propiedad->validar();


            //Revisar que el array este vacio
            if (empty($errores)) {


                /* Subida de Archivos */
                //Crear carpeta

                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $imagen->save(CARPETA_IMAGENES . $nombreImagen . ".jpg");

                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            //muestra o renderiza el template
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {

        $id = validarDireccionar('/admin');

        $propiedad = Propiedad::find($id);
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::getAll();

        //METODO POST PARA ACTUALIZAR
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            //Asignar los atributos de la propiedad
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);

            //Validacion
            $errores = $propiedad->validar();

            //Subida de archivos

            //Generar nombre unico 
            $nombreImagen = md5(uniqid(rand(), true));
            //Setear la imagen
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']) {
                    //Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen . ".jpg");
                }
                $propiedad->guardar();
            }
        }


        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //validar Id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
        }
    }

}
