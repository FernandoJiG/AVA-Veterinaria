var boton = document.querySelectorAll(".controles .boton");
var siguiente = document.querySelector(".btnsiguiente");
var FormPropietario = document.querySelector(".propietarioForm");
var FormPaciente = document.querySelector(".pacienteForm");
var actualizar=false;
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

$('.btnbuscar').on("click", function(e){
    e.preventDefault();
    if($('input[name="regPrevio"]').val()){
        
        var idRegistroPrevio = $('input[name="regPrevio"]').val();

        let data = new FormData();
        data.append('id', idRegistroPrevio);

        fetch('Obj/regPrevio.php',{
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(function(datos){
            if(datos == "false"){
                actualizar=false;
            }else{
                actualizar=true;
                var inputs = $('input');
                console.log(inputs);
                console.log(datos);


                for(i=0; i<12;i++){
                    inputs[(i+1)].value=datos[i];
                }
                $(`#marketing option[value=${datos[12]}]`).attr({selected: true});

                $(`#sex option[value="${datos[14]}"]`).attr({selected: true});


                for(i=13; i<20;i++){
                    inputs[(i)].value=datos[i];
                }
                
                $(`#esterilizado option[value=${datos[20]}]`).attr({selected: true});
                $(`#tipoMascota option[value=${datos[21]}]`).attr({selected: true});                
            }
            
        })

    }else{
        console.log("No tiene valor");
    }
    

})

$('.cedula input').on("keyup", function(){
    if(this.value.length > 6){

        var cedula=this.value;
        let data = new FormData();
        data.append('cedula', cedula);

        fetch('Obj/buscaDoctor.php',{
            method: "POST",
            body: data
        })
        .then(response => response.json())
        .then(function(datos){
            if(datos){
                $("#doctor").val(datos[0]);
            }else{
                $("#doctor").val("");
            }
            
        })
    }
})

$('.enviar').on("click", function(e){
    e.preventDefault();
    lleno=true;
    validar();

    if(lleno){
        if(actualizar){
            console.log("Actualizaré");
            $('#form').attr('action','Obj/ActPat.php');
            $('#form').submit();
        }else{
            console.log("Haré un nuevo registro");

            const data = new FormData(document.getElementById("form"));
            fetch('Obj/NewPat.php',{
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(function(datos){
                if(datos){
                    console.log(datos);
                    alert("Datos registrados.");
                    window.location.href="index.html";
                }
            })
        }
    }else{
        $(".mensajeError").css("display", "block").delay(2000).queue(function(n){
            $(".mensajeError").css("display", "none");
            n();
        });
    }
    
})

function validar (){
    let selecciones = ["marketing", "sex", "tipoMascota", "esterilizado", "optReg"];
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