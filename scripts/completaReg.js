$(function(){
    var encontrado = false;
    $('.btnbuscar').on("click", function(e){
        e.preventDefault();
        if($('input[name="busqueda"]').val()){
            
            var idRegistroPrevio = $('input[name="busqueda"]').val();
    
            let data = new FormData();
            data.append('id', idRegistroPrevio);
    
            fetch('Obj/buscaPropietario.php',{
                method: 'POST',
                body: data
            })
            .then(response => response.json())
            .then(function(datos){

                var inputs = $('input');
                console.log(inputs);
                console.log(datos);
                for(i=0; i<12;i++){
                    if(!datos[i]){
                        datos[i]="Sin datos";
                    }
                    inputs[(i+1)].value=datos[i];
                }
                $(`#marketing option[value=${datos[12]}]`).attr({selected: true});
                encontrado = true;
            })
    
        }else{
            console.log("No tiene valor");
        }
    })

    $(".btnactualizar").on("click", function(e){
        if(!encontrado){
            e.preventDefault();
            $(".mensaje").text("No hay información").delay(2000).queue(function(n){
                $(".mensaje").text("");
                n();
            });
        }
        
    });
});