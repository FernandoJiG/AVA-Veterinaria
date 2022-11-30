$(function(){
    var boton = document.querySelectorAll(".controles .boton");
    var siguiente = document.querySelector(".btnsiguiente");
    var FormPropietario = document.querySelector(".propietarioForm");
    var FormPaciente = document.querySelector(".pacienteForm");
    var lleno;

    boton[0].addEventListener("click", function(){
        FormPropietario.classList.remove("invisible");
        FormPaciente.classList.add("invisible");
        boton[1].style.backgroundColor = "rgb(109, 168, 149)";
        boton[0].style.backgroundColor = "rgb(148, 228, 201)";
        
    });
    
    boton[1].addEventListener("click", function(){
        FormPropietario.classList.add("invisible");
        FormPaciente.classList.remove("invisible");
        boton[0].style.backgroundColor = "rgb(109, 168, 149)";
        boton[1].style.backgroundColor = "rgb(148, 228, 201)";
        darApellido();
    });
    
    siguiente.addEventListener("click", function(e){
        e.preventDefault();
        FormPropietario.classList.add("invisible");
        FormPaciente.classList.remove("invisible");
        boton[0].style.backgroundColor = "rgb(109, 168, 149)";
        boton[1].style.backgroundColor = "rgb(148, 228, 201)";
        darApellido();
    });
    
    function darApellido(){
        $apellido = $('input[name="apellidoPat"]').val();
        $('input[name="apellidoMasc"]').val($apellido);
    }

    $('.enviar').on("click", function(e){
        e.preventDefault();
        lleno=true;
        validar();
    
        if(lleno){
            console.log("Haré un nuevo registro");

            const data = new FormData(document.getElementById("form"));
            console.log(data),
            fetch('Obj/NewPat.php',{
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(function(datos){
                console.log(datos);
                $('.controles, form').css('display', 'none');
                $('.contenedorMensajeFin').css('display', 'flex');
                $(".id").text(datos);
            })

            
            
        }else{
            $(".mensajeError").css("display", "block").delay(2000).queue(function(n){
                $(".mensajeError").css("display", "none");
                n();
            });
        }
        
    })
    
    function validar (){
        let selecciones = ["marketing", "sex", "tipoMascota", "esterilizado"];
        var entradas = $('.solicitar');
        for(i=0; i<selecciones.length;i++){
            if($(`#${selecciones[i]} option:selected`).val() == "NoSelected"){
                $(`#${selecciones[i]}`).addClass("falta");
            }else{
                $(`#${selecciones[i]}`).removeClass("falta");
            }
        }
    
        for(i=0; i<entradas.length; i++){
            if(entradas[i].value==""){
                entradas[i].classList.add('falta');
            }else{
                entradas[i].classList.remove('falta');
            }
        }
    
        if($("select, .solicitar").hasClass('falta')){
            lleno=false;
        }
    }
})