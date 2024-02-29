document.addEventListener('DOMContentLoaded', (event) => {
  let formData = {};
  let currentStep = 1;
  const totalSteps = 3;

  function showStep(step) {
    for (let i = 1; i <= totalSteps; i++) {
      const el = document.getElementById(`paso-${i}`);
      if (i === step) {
        el.style.display = 'block';
      } else {
        el.style.display = 'none';
      }
    }
    displayOfButtons(step);
    formSteps(step);
  }
  function formSteps(step){
    if(step == 1){

      document.getElementById("paso-barra-1").classList.remove("non-active-paso");
      document.getElementById("paso-barra-2").classList.remove("active-paso");
      document.getElementById("paso-barra-3").classList.remove("non-active-paso");

      document.getElementById("paso-barra-1").classList.add("active-paso");
      document.getElementById("paso-barra-2").classList.add("non-active-paso");
      document.getElementById("paso-barra-3").classList.add("non-active-paso");

    }else if(step == 2){
      document.getElementById("paso-barra-1").classList.remove("active-paso");
      document.getElementById("paso-barra-2").classList.remove("non-active-paso");
      document.getElementById("paso-barra-3").classList.remove("non-active-paso");

      document.getElementById("paso-barra-1").classList.add("non-active-paso");
      document.getElementById("paso-barra-2").classList.add("active-paso");
      document.getElementById("paso-barra-3").classList.add("non-active-paso");

    }else if(step == 3){
      document.getElementById("paso-barra-1").classList.remove("non-active-paso");
      document.getElementById("paso-barra-2").classList.remove("active-paso");
      document.getElementById("paso-barra-3").classList.remove("non-active-paso");

      document.getElementById("paso-barra-1").classList.add("non-active-paso");
      document.getElementById("paso-barra-2").classList.add("non-active-paso");
      document.getElementById("paso-barra-3").classList.add("active-paso");
    }
  }
  function displayOfButtons(step){
    if(step == 1){
      document.getElementById('anterior').style.display = 'none';
      document.getElementById('confirmar').style.display = 'none';
    }else if(step == 2){
      saveData(currentStep);
      document.getElementById('anterior').style.display = 'flex';
      document.getElementById('siguiente').style.display = 'flex';
      document.getElementById('confirmar').style.display = 'none';
    }else if(step == 3){
      document.getElementById('confirmar').style.display = 'block';
      document.getElementById('siguiente').style.display = 'none';
    }
  }

  function nextStep() {
    let validacionPasada = true;
    if (currentStep === 1) validacionPasada = validarPaso1();
    if (currentStep === 2) validacionPasada = validarPaso2();

    if (validacionPasada && currentStep < totalSteps) {
      currentStep++;
      showStep(currentStep);
    }
  }

  function previousStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }
  
  function saveData(step) {
    
    if (step === 2) {
      //Recoger
      formData['dni'] = document.getElementById('dni').value;
      formData['nombre'] = document.getElementById('nombre').value;
      formData['apellido1'] = document.getElementById('apellido1').value;
      formData['apellido2'] = document.getElementById('apellido2').value;
      formData['rol'] = document.getElementById('rol').value;
      formData['servicio'] = document.getElementById('servicio').value;
      formData['sexo'] = document.getElementById('sexo').value;
      formData['correo'] = document.getElementById('correo').value;
      formData['codigoPostal'] = document.getElementById('codigoPostal').value;
      formData['direccion'] = document.getElementById('direccion').value;
      formData['fechaNac'] = document.getElementById('fechaNac').value;
      formData['telefono'] = document.getElementById('telefono').value;

      //Pegar correo
      document.getElementById('correo-paso-2').value = formData.correo;


      //Pegar Paso 3
      document.getElementById('dniDisabled').value = formData.dni;
      document.getElementById('nombreDisabled').value = formData.nombre;
      document.getElementById('apellido1Disabled').value = formData.apellido1;
      document.getElementById('apellido2Disabled').value = formData.apellido2;
      document.getElementById('rolDisabled').value = formData.rol;
      document.getElementById('servicioDisabled').value = formData.servicio;
      document.getElementById('sexoDisabled').value = formData.sexo;
      document.getElementById('correoDisabled').value = formData.correo;
      document.getElementById('codigoPostalDisabled').value = formData.codigoPostal;
      document.getElementById('direccionDisabled').value = formData.direccion;
      document.getElementById('fechaNacDisabled').value = formData.fechaNac;
      document.getElementById('telefonoDisabled').value = formData.telefono;
      console.log(formData);
    }
  
  
    
  }
  
  function validarPaso1(){
    let valido = true;
    let mensajesError = [];

    // Validación DNI
    let dni = document.getElementById('dni').value;
    if(dni.length === 0 || dni.length > 255) {
        mensajesError.push('El DNI es obligatorio y debe tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Nombre
    let nombre = document.getElementById('nombre').value;
    if(nombre.length === 0 || nombre.length > 255) {
        mensajesError.push('El Nombre es obligatorio y debe tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Apellido 1
    let apellido1 = document.getElementById('apellido1').value;
    if(apellido1.length === 0 || apellido1.length > 255) {
        mensajesError.push('El Primer Apellido es obligatorio y debe tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Apellido 2 (opcional)
    let apellido2 = document.getElementById('apellido2').value;
    if(apellido2.length > 255) {
        mensajesError.push('El Segundo Apellido debe tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Sexo
    let sexo = document.getElementById('sexo').value;
    if(sexo.length === 0) {
        mensajesError.push('El Sexo es obligatorio.');
        valido = false;
    }

    // Validación Correo
    let correo = document.getElementById('correo').value;
    if(correo.length === 0 || correo.length > 255 || !/\S+@\S+\.\S+/.test(correo)) {
        mensajesError.push('El Correo es obligatorio, debe ser un correo válido y tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Código Postal
    let codigoPostal = document.getElementById('codigoPostal').value;
    if(codigoPostal.length === 0 || !/^\d{5}$/.test(codigoPostal)) {
        mensajesError.push('El Código Postal es obligatorio y debe tener 5 dígitos.');
        valido = false;
    }

    // Validación Dirección
    let direccion = document.getElementById('direccion').value;
    if(direccion.length === 0 || direccion.length > 255) {
        mensajesError.push('La Dirección es obligatoria y debe tener menos de 255 caracteres.');
        valido = false;
    }

    // Validación Fecha de Nacimiento
    let fechaNac = document.getElementById('fechaNac').value;
    if(fechaNac.length === 0 || !/^\d{4}-\d{2}-\d{2}$/.test(fechaNac)) {
        mensajesError.push('La Fecha de Nacimiento es obligatoria y debe seguir el formato aaaa-mm-dd.');
        valido = false;
    }

    // Validación Teléfono
    let telefono = document.getElementById('telefono').value;
    if(telefono.length === 0 || !/^\d{9}$/.test(telefono)) {
        mensajesError.push('El Teléfono es obligatorio y debe tener 9 dígitos.');
        valido = false;
    }

    mostrarMensajes(mensajesError);

    return valido;
   
  }
  function validarPaso2(){

    let valido = true;
    let mensajesError = [];

    
    
    let usuario = document.getElementById('usuario').value;
    if( usuario.length === 0 ) {
      mensajesError.push('El usuario es obligatoria..');
      valido =  false;
    }
    // Validación Contraseña
    let password = document.getElementById('password').value;
    let passwordConfirmacion = document.getElementById('passwordConfirmar').value;
    if(password.length < 8 ) {
        mensajesError.push('La Contraseña es obligatoria y debe tener al menos 8 caracteres.');
        valido =  false;
    }
    if(password != passwordConfirmacion ) {
      mensajesError.push('La Contraseñas no coinciden.');
      valido =  false;
  }

    mostrarMensajes(mensajesError);
    return valido;

  }
  function mostrarMensajes(mensajesError){
    let contenedorErrores = document.getElementById('errores-js');
    let listaErrores = document.getElementById('lista-errores');

    while (listaErrores.firstChild) {
        listaErrores.removeChild(listaErrores.firstChild);
    }

    if(mensajesError.length > 0) {
        mensajesError.forEach(function(error) {
            let li = document.createElement('li');
            li.textContent = error;
            listaErrores.appendChild(li);
        });

        contenedorErrores.style.display = 'block'; 
    } else {
        contenedorErrores.style.display = 'none'; 
    }
  }
 

  saveData(currentStep);
  document.getElementById('siguiente').addEventListener('click' , nextStep);
  document.getElementById('anterior').addEventListener('click' , previousStep);

  showStep(currentStep);
});


