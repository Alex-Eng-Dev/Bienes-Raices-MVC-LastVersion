document.addEventListener('DOMContentLoaded', function(){

    evenListeners();
    darkMode();
});

function darkMode(){
/* Codigo de preferencias de dark mode */
    const preferencia = window.matchMedia('(prefers-color-scheme: dark)');
    // console.log(preferencia.matches);

    if(preferencia.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    preferencia.addEventListener('change', function(){
        if(preferencia.matches){
        document.body.classList.add('dark-mode');
        }else{
        document.body.classList.remove('dark-mode');
        }
    });
    /* Termina preferencia de dark-mode */

    const botonDarkMode = document.querySelector('.dark-mode-button');

    botonDarkMode.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    })

}

function evenListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navRespons);

    //Muestra cambios condicionales

    const metodoContacto =  document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach(input => input.addEventListener('click', mostrarMetodosContacto));

}

function navRespons(){
   const navegacion = document.querySelector('.navigation');
   navegacion.classList.toggle('show')

}

function mostrarMetodosContacto(e){
    const contactoDiv = document.querySelector('#contacto');
    
    if(e.target.value === 'telefono'){
        contactoDiv.innerHTML = `
        <label for="telefono">Registre su número</label>
        <input type="tel" placeholder="No.Cel" id="telefono" name="contacto[telefono]">

        <p>Elija fecha y hora para comunicarnos</p>
                
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="contacto[fecha]">
                
        <label for="hora">Hora:</label>
        <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        contactoDiv.innerHTML = `
        <label for="email">Registre su correo</label>
        <input type="email" placeholder="correo@correo.com" id="email" name="contacto[email]" required>
        
        `;
    }
}