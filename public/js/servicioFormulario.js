document.addEventListener('DOMContentLoaded', (event) => {
    let formData = {};
    let currentStep = 1;
    const totalSteps = 2;
  
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
   
  
        document.getElementById("paso-barra-1").classList.add("active-paso");
        document.getElementById("paso-barra-2").classList.add("non-active-paso");
     
  
      }else if(step == 2){
        document.getElementById("paso-barra-1").classList.remove("active-paso");
        document.getElementById("paso-barra-2").classList.remove("non-active-paso");
  
  
        document.getElementById("paso-barra-1").classList.add("non-active-paso");
        document.getElementById("paso-barra-2").classList.add("active-paso");
       
  
      }
    }
    function displayOfButtons(step){
      if(step == 1){
        document.getElementById('anterior').style.display = 'none';
        document.getElementById('confirmar').style.display = 'none';
        document.getElementById('siguiente').style.display = 'flex';

      }else if(step == 2){
        saveData(step);
        document.getElementById('anterior').style.display = 'flex';
        document.getElementById('confirmar').style.display = 'block';
        document.getElementById('siguiente').style.display = 'none';
      }
    }
  
    function nextStep() {
      let validacionPasada = true;
      if (currentStep === 1) validacionPasada = validarPaso1();


      if (validacionPasada && currentStep < totalSteps) {
        currentStep++;
        showStep(currentStep);
      }
      // if (currentStep < totalSteps) {
      //   currentStep++;
      //   showStep(currentStep);
      // }
    }
  
    function previousStep() {
      if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
      }
    }
    function validarPaso1(){

      let valido = true;
      let mensajesError = [];
  
      
      
      let nombreServicio = document.getElementById('nombre_servicio').value;
      if( nombreServicio.length === 0 || nombreServicio.length > 255 ) {
        mensajesError.push('El nombre de servicio es obligatoria y debe tener menos de 255 caracteres..');
        valido =  false;
      }
      // Validación fecha
      let fechaCreacion = document.getElementById('fecha_creacion').value;
      if(fechaCreacion.length === 0 || !/^\d{4}-\d{2}-\d{2}$/.test(fechaCreacion)) {
          mensajesError.push('La Fecha de Creacion es obligatoria y debe seguir el formato aaaa-mm-dd.');
          valido = false;
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
    function saveData(step) {
        
        if(step === 2){
            
        //Recoger
        formData['nombre_servicio'] = document.getElementById('nombre_servicio').value;
        formData['fecha_creacion'] = document.getElementById('fecha_creacion').value;
        // console.log(formData);
  
    
        //Pegar Paso 2
        document.getElementById('nombre_servicio_disabled').value = formData.nombre_servicio;
        document.getElementById('fecha_creacion_disabled').value = formData.fecha_creacion;
        }
    }
   
  
    // saveData(currentStep);
    document.getElementById('siguiente').addEventListener('click' , nextStep);
    document.getElementById('anterior').addEventListener('click' , previousStep);
  
    showStep(currentStep);
  });
  
  
  