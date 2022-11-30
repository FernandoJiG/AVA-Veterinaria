var logo = document.querySelector(".logo");
var opciones = document.querySelectorAll(".opcion");

opciones[0].addEventListener("animationend", function(){
    changeAnimation(opciones[0], 0)
});

opciones[1].addEventListener("animationend", function(){
    changeAnimation(opciones[1], 0.3)   
})

opciones[2].addEventListener("animationend", function(){
    changeAnimation(opciones[2], 0.16)
})

opciones[3].addEventListener("animationend", function(){
    changeAnimation(opciones[3], 0.15)
})

opciones[4].addEventListener("animationend", function(){
    changeAnimation(opciones[4], 0)    
})

opciones[5].addEventListener("animationend", function(){
    changeAnimation(opciones[5], 0.26)
})

function changeAnimation(element, delay){
    var coordenadas = $(element).offset();
    element.setAttribute("style", `animation-name: flotando; animation-iteration-count: 4; animation-delay:${delay}s; animation-direction: alternate; top: ${coordenadas.top}px; left: ${coordenadas.left}px`);
}



