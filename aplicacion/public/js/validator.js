const URL='http://localhost/aplicacion/';

// validación registro de usuario

$( document ).ready(function() {
    $("#registro").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            usr:{
               required:true
            },
            nom: {
            required: true,
            rangelength: [2,50],
            lettersonly: true
            },
            ape: {
            required: true,
            lettersonly:true
            },
            ema: {
            required: true,
            email: true,
            correctemail: true
            },
            pwd: {
            required: true,
            minlength: 5,
            maxlength: 20,
            correctPass: true
            },
            peso:{
                number: true
            },
            alt:{
                number: true
            }
        },
        messages: {
            usr:{
                required: "<small style='color:red'>Debes introducir un usuario</small>"
            },
            nom: {
            required: "<small style='color:red'>El nombre es obligatorio</small>",
            rangelength: "<small style='color:red'>Debe tener entre 2 y 50 caracteres</small>",
            },
            ape: {
            required: "<small style='color:red'>El apellido es obligatorio.</small>"
            },
            ema: {
            required: "<small style='color:red'>El correo electrónico es obligatorio.</small>",
            email: "<small style='color:red'>Introduce un correo que sea válido</small>"
            },
            pwd: {
            required: "<small style='color:red'>Introduce una contraseña (5-20 dígitos).</small>",
            minlength: "<small style='color:red'>Debe contener mínimo 5 dígitos o caracteres.</small>",
            maxlength:"<small style='color:red'>Debe contener 20 dígitos o caracteres como máximo.</small>"
            },
            peso:{
                number: "<small style='color:red'>El peso debe ser numérico</small>"
            },
            alt:{
                number: "<small style='color:red'>La altura debe ser numérica</small>"
            }
        },
        submitHandler : function(){
            var dataRegister = $("#registro").serialize();
            $.ajax({
            cache : false,
            url : URL+'register/registerUser',
            data : dataRegister,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<h1>" + data["message"] + "</h1>";
                    $("#message").html(output);
                    $("#registerModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#registerModal").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});

// validar formulario de registro, cuando el admin registra a un usuario

$( document ).ready(function() {
    $("#registroAdmin").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            usr:{
               required:true
            },
            nom: {
            required: true,
            rangelength: [2,50],
            lettersonly: true
            },
            ape: {
            required: true,
            lettersonly:true
            },
            ema: {
            required: true,
            email: true,
            correctemail: true
            },
            pwd: {
            required: true,
            minlength: 5,
            maxlength: 20,
            correctPass: true
            },
            peso:{
                number: true
            },
            alt:{
                number: true
            }
        },
        messages: {
            usr:{
                required: "<small style='color:red'>Debes introducir un usuario</small>"
            },
            nom: {
            required: "<small style='color:red'>El nombre es obligatorio</small>",
            rangelength: "<small style='color:red'>Debe tener entre 2 y 50 caracteres</small>",
            },
            ape: {
            required: "<small style='color:red'>El apellido es obligatorio.</small>"
            },
            ema: {
            required: "<small style='color:red'>El correo electrónico es obligatorio.</small>",
            email: "<small style='color:red'>Introduce un correo que sea válido</small>"
            },
            pwd: {
            required: "<small style='color:red'>Introduce una contraseña (5-20 dígitos).</small>",
            minlength: "<small style='color:red'>Debe contener mínimo 5 dígitos o caracteres.</small>",
            maxlength:"<small style='color:red'>Debe contener 20 dígitos o caracteres como máximo.</small>"
            },
            peso:{
                number: "<small style='color:red'>El peso debe ser numérico</small>"
            },
            alt:{
                number: "<small style='color:red'>La altura debe ser numérica</small>"
            }
        },
        submitHandler : function(){
            var dataRegister = $("#registroAdmin").serialize();
            $.ajax({
            cache : false,
            url : URL+'userpage/insertNewUser',
            data : dataRegister,
            type : 'POST',
            dataType : 'json'
            }).done(function(data){
                    
                    var output = "<h1>" + data["message"] + "</h1>";
                    $("#message").html(output);
                    $("#registerModalAdmin").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#registerModalAdmin").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});

//validar cuando un usuario modifica sus datos

$( document ).ready(function() {
    $("#modficarDatos").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            usr:{
               required:true
            },
            nom: {
            required: true,
            rangelength: [2,50],
            lettersonly: true
            },
            ape: {
            required: true,
            lettersonly:true
            },
            ema: {
            required: true,
            email: true,
            correctemail: true
            },
            pwd: {
            required: true,
            minlength: 5,
            maxlength: 20,
            correctPass: true
            },
            peso:{
                number: true
            },
            alt:{
                number: true
            }
        },
        messages: {
            usr:{
                required: "<small style='color:red'>Debes introducir un usuario</small>"
            },
            nom: {
            required: "<small style='color:red'>El nombre es obligatorio</small>",
            rangelength: "<small style='color:red'>Debe tener entre 2 y 50 caracteres</small>",
            },
            ape: {
            required: "<small style='color:red'>El apellido es obligatorio.</small>"
            },
            ema: {
            required: "<small style='color:red'>El correo electrónico es obligatorio.</small>",
            email: "<small style='color:red'>Introduce un correo que sea válido</small>"
            },
            pwd: {
            required: "<small style='color:red'>Introduce una contraseña (5-20 dígitos).</small>",
            minlength: "<small style='color:red'>Debe contener mínimo 5 dígitos o caracteres.</small>",
            maxlength:"<small style='color:red'>Debe contener 20 dígitos o caracteres como máximo.</small>"
            },
            peso:{
                number: "<small style='color:red'>El peso debe ser numérico</small>"
            },
            alt:{
                number: "<small style='color:red'>La altura debe ser numérica</small>"
            }
        },
        submitHandler : function(){
            var dataRegister = $("#modficarDatos").serialize();
            $.ajax({
            cache : false,
            url : URL+'userdata/modifyUserData',
            data : dataRegister,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<h1>" + data["message"] + "</h1>";
                    $("#message").html(output);
                    $("#modifyModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#modifyModal").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});

// Validate mail message

$( document ).ready(function() {
    $("#mailMessage").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            name:{
               required:true,
               minlength: 5,
               maxlength: 30,
            },
            email: {
            required: true,
            email: true,
            correctemail: true
            },
            comment: {
            required: true,
            minlength: 20,
            maxlength: 1000,
            }
        },
        messages: {
            name:{
                required: "<small style='color:red'>El nombre es obligatorio</small>",
                minlength: "<small style='color:red'>Debe contener mínimo 5 caracteres.</small>",
                maxlength:"<small style='color:red'>Debe contener 30 caracteres como máximo.</small>"
            },
            email: {
            required: "<small style='color:red'>El correo electrónico es obligatorio.</small>",
            email: "<small style='color:red'>Introduce un correo que sea válido</small>"
            },
            comment: {
            required: "<small style='color:red'>El email no puede estar vacío.</small>",
            minlength: "<small style='color:red'>Debe contener mínimo 20 caracteres.</small>",
            maxlength:"<small style='color:red'>Debe contener 1000 caracteres como máximo.</small>"
            }
        },
        submitHandler : function(){
            var dataMail = $("#mailMessage").serialize();
            $.ajax({
            cache : false,
            url : URL+'contact/sendEmail',
            data : dataMail,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<h1>" + data["message"] + "</h1>";
                    $("#message").html(output);
                    $("#emailModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#emailModal").modal('hide');

            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});

// Validate calculator IMC

$( document ).ready(function() {
    $("#calculatorIMC").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            inputPeso:{
               required:true,
               number: true,
            },
            inputTalla: {
            required: true,
            number: true,
            }
        },
        messages: {
            inputPeso:{
                required: "<small style='color:red'>El peso debe estar en kilogramos</small>",
                number: "<small style='color:red'>Debe ser numérico.</small>",
            },
            inputTalla: {
            required: "<small style='color:red'>La altura debe estar en metros.</small>",
            number: "<small style='color:red'>Debe ser numérico.</small>",
            }
        },
        submitHandler : function(){
            var dataCalculator = $("#calculatorIMC").serialize();
            $.ajax({
            cache : false,
            url : URL+'calculator/getIMC',
            data : dataCalculator,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<p class='modalStyle'>" + data["message"] + "</p>";
                    $("#message").html(output);
                    $("#calcuIMC").html("<h5>" + data["calculator"] + "</h5>");
                    $("#calculatorModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#calculatorModal").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});

// Validate calculator SC

$( document ).ready(function() {
    $("#calculatorSC").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            inputWeight:{
               required:true,
               number: true,
            },
            inputHeight: {
            required: true,
            number: true,
            }
        },
        messages: {
            inputWeight:{
                required: "<small style='color:red'>El peso debe estar en kilogramos</small>",
                number: "<small style='color:red'>Debe ser numérico.</small>",
            },
            inputHeight: {
            required: "<small style='color:red'>La altura debe estar en metros.</small>",
            number: "<small style='color:red'>Debe ser numérico.</small>",
            }
        },
        submitHandler : function(){
            var dataCalculator = $("#calculatorSC").serialize();
            $.ajax({
            cache : false,
            url : URL+'calculator/getSC',
            data : dataCalculator,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<p class='modalStyle'>" + data["message"] + "</p>";
                    $("#message").html(output);
                    $("#calcuSC").html("<h5>" + data["calculator"] + "</h5>");
                    $("#calculatorModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#calculatorModal").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });       
        }
    });
});

// Validate calculator GEB

$( document ).ready(function() {
    $("#calculatorGEB").submit(function(e) {
        e.preventDefault();
        }).validate({
        debug: false,
        rules: {
            inputPeso:{
               required:true,
               number: true,
            },
            inputTalla: {
                required: true,
                number: true,
            },
            edad:{
                required: true,
                number: true,
            },
            sexo:{
                required:true,
            }
        },
        messages: {
            inputPeso:{
                required: "<small style='color:red'>El peso debe estar en kilogramos</small>",
                number: "<small style='color:red'>Debe ser numérico.</small>",
            },
            inputTalla: {
                required: "<small style='color:red'>La altura debe estar en metros.</small>",
                number: "<small style='color:red'>Debe ser numérico.</small>",
            },
            edad:{
                required: "<small style='color:red'>La edad es obligatoria.</small>",
                number: "<small style='color:red'>Debe ser numérico.</small>",
            },
            sexo:{
                required: "<small style='color:red'>El sexo es obligatorio.</small>"
            }
        },
        submitHandler : function(){
            var dataCalculator = $("#calculatorGEB").serialize();
            $.ajax({
            cache : false,
            url : URL+'calculator/getGEB',
            data : dataCalculator,
            type : 'POST',
            dataType : 'json',
            }).done(function(data){
                    
                    var output = "<p class='modalStyle'>" + data["message"] + "</p>";
                    $("#message").html(output);
                    $("#calcuGEB").html("<h5>" + data["calculator"] + "</h5>");
                    $("#calculatorModal").modal('show');
                    console.log( "La solicitud se ha completado correctamente." );
                    $("#calculatorModal").modal('hide');
            }).fail( function(){
                console.log( "Algo ha fallado" );
            });
        
        }


    });

});