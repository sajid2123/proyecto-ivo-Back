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
  
  
  