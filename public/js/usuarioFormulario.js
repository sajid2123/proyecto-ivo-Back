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
    if (currentStep < totalSteps) {
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
 

  saveData(currentStep);
  document.getElementById('siguiente').addEventListener('click' , nextStep);
  document.getElementById('anterior').addEventListener('click' , previousStep);

  showStep(currentStep);
});


