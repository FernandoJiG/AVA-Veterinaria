var lleno = false;

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
            $("#doctor").val(datos[0]);
        })
    }
})

$('.enviar').on("click", function(e){
    e.preventDefault();
    validar();

    if(lleno){
        console.log("Haré un nuevo registro");

        $('#form').attr('action','Obj/addPat.php');
        $('#form').submit();
    }else{
        $(".mensajeError").css("display", "block").delay(2000).queue(function(n){
            $(".mensajeError").css("display", "none");
            n();
        });
    }
    
})

function validar (){
    var entradas = $('.solicitar');
    for(i=0; i<entradas.length; i++){
        if(entradas[i].value==""){
            entradas[i].classList.add('falta');
            lleno=false;
        }else{
            lleno=true;
            entradas[i].classList.remove('falta');
        }
    }
    let selecciones = ["sex", "tipoMascota", "esterilizado"];
    for(i=0; i<selecciones.length;i++){
        if($(`#${selecciones[i]} option:selected`).val() == "NoSelected"){
            $(`#${selecciones[i]}`).addClass("falta");
        }else{
            $(`#${selecciones[i]}`).removeClass("falta");
        }
    }

    if($('#sex option:selected').val() == "NoSelected" || $('#tipoMascota option:selected').val() == "NoSelected" || $('#esterilizado option:selected').val() == "NoSelected"){
        lleno = false;
    }else{
        lleno=true;
    }
}