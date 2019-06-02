(function(){
    //Acceso al formulario
    var formulario= document.getElementById('form-usuario');
   
    var firs_name = formulario.first_name;  
    var last_name = formulario.last_name; 
    var gender = formulario.gender;
    var email = formulario.email;      
    var birthdate = formulario.birthdate;
    var user_type = formulario.user_type; 
    var password = formulario.password;   
    var password2 = formulario.password2;  
  
    //Accedemos al contenedor de errores
    var errores = document.getElementById('errores');
  
    function validarFirst_name(e){
      if (firs_name.value == '' || firs_name.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor Ingrese el nombre</p>'; 
        e.preventDefault();
      }else if (firs_name.value.length > 50) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>El nombre debe tener menos de 50 Caracteres</p>';
        e.preventDefault();
      }
    }
  
    function validarLast_name(e){
      if (last_name.value == '' || last_name.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor Ingrese el apellido</p>';
        e.preventDefault();
      }else if (last_name.value.length > 50) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>El apellido debe tener menos de 50 Caracteres</p>';
        e.preventDefault();
      }
    }
  
    function validarGender(e){
      if (gender.value == '' || gender.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor seleccione un genero</p>';
        e.preventDefault();
      }
    }


    function validarEmail(e){
      if (email.value == '' || email.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor Ingrese el correo</p>';
        e.preventDefault();
      }else if (email.value.length > 50) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>El correo debe tener menos de 50 Caracteres</p>';
        e.preventDefault();
      }
    }

    function validarBirthdate(e){
      if (birthdate.value == '' || birthdate.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor Ingrese fecha de nacimiento</p>';
        e.preventDefault();
      }
    }
  
    function validarUserType(e){
      if (user_type.value == '' || user_type.value == null) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor seleccione una Tipo de Usuario</p>';
        e.preventDefault();
      }
    }
  
    function validarPassword(e){
      if (password.value == '' || password.value == null) {
        //console.log('Ingrese Nombre');
        errores.style.display = 'block';
        errores.innerHTML += '<p>Por favor Ingrese su Contraseña</p>';
        e.preventDefault();
      }else if (password.value.length > 50) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>La Contraseña debe tener menos de 50 Caracteres</p>';
        e.preventDefault();
      }
    }
  
    function validarPassword2(e) {
      if (password.value != password2.value) {
        errores.style.display = 'block';
        errores.innerHTML += '<p>Las Contraseñas no coinciden.</p>';
        e.preventDefault();
      }
    }
  
    function validarFormulario(e){
      //Limpiar contenedor
      errores.innerHTML = '';
      validarFirst_name(e);
      validarLast_name(e);
      validarGender(e);
      validarEmail(e)
      validarBirthdate(e);
      validarUserType(e);
      validarPassword(e);
      validarPassword2(e);
    }
  
  
    formulario.addEventListener('submit', validarFormulario);
    //Mascara de Texto para usuario
  $(document).ready(function(){
    $('#birthdate').mask('00-00-00');
});
  }());
  