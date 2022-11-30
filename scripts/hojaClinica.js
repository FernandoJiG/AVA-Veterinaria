$(function(){

    var btnHoja = $('.boton');
    var contListP=0;
    var contListM=0;
    var contPlanDiag=0;
    var contOtro=0;


    $("#agrProblema").on("click", function(){
        contListP+=1;
        $("#tablaProblemas").append('<tr><td>'+contListP+'.- <input type="text" name="prob'+contListP+'" class="inputWidth"></td></tr>');
    });

    $("#agrMaestra").on("click", function(){
        contListM+=1;
        var romano = convertirNum(contListM);
        $("#tablaMaestra").append('<tr><td>'+romano+'.-<textarea name="maest'+romano+'" cols="20" rows="2" style="width: 100%;"></textarea></td></tr>');
    });

    $("#agrPlanDiag").on("click", function(){
        contPlanDiag+=1;
        $("#tablaPlanDiag").append('<tr>\
                <td style="width: 25%;"><input type="text" style="width: 100%" name:"planDiag'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"copro'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"bh'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"qs'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"ua'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"pDerma'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"cito'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"hp'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"us'+contPlanDiag+'"></td>\
                <td style="width: 8.3%"><input type="text" style="width: 100%" name:"pm'+contPlanDiag+'"></td>\
    </tr>');
    });

    $("#agrOtro").on("click",function(){
        contOtro+=1;
        $("#tablaOtros").append('<tr>\
        <td style="width: 33.3%;"><input type="text" style="width: 100%; name:"otroPrim'+contOtro+'"></td>\
        <td style="width: 33.3%;"><input type="text" style="width: 100%; name:"otroSeg'+contOtro+'"></td>\
        <td style="width: 33.3%;"><input type="text" style="width: 100%; name:"OtroTer'+contOtro+'"></td>\
        </tr>');
    });


    
    btnHoja[0].addEventListener('click', function(){
        $('.expediente-hoja-1').removeClass('ocultarHoja');
        $('.expediente-hoja-2').addClass('ocultarHoja');
        btnHoja[0].style.backgroundColor = "rgb(148, 228, 201)";
        btnHoja[1].style.backgroundColor = "rgb(109, 168, 149)";
        
    });
    btnHoja[1].addEventListener('click', function(){
        $('.expediente-hoja-2').removeClass('ocultarHoja');
        $('.expediente-hoja-1').addClass('ocultarHoja');
        btnHoja[0].style.backgroundColor = "rgb(109, 168, 149)";
        btnHoja[1].style.backgroundColor = "rgb(148, 228, 201)";
    });

    $('#env').on("click", function(e){
        var valores = new Array();
        $('#tabla tr:not(#titulos)').each(function () {
            var vacu = $(this).find('td').eq(0).data("vac");
            var labs = $(this).find('td').eq(1).data("lab");
            var fh = $(this).find('td').eq(2).data("fec");

            valor = new Array(vacu, labs, fh);
            valores.push(valor);
        });
        $.ajax({
            async: false,
            type: "POST",
            url: "/Obj/infoVacuna.php",
            data: {'valores': JSON.stringify(valores)},//capturo array
            success: function(data) { if(data!="");
            alert(data)}
        });
    });

    $("#agr").on("click",function(){
        addRow('tabla');
    });

    function addRow(tableID) {
        // Obtiene una referencia a la tabla
        var tableRef = document.getElementById(tableID);

        var posicion = $("#tabla tr").length -2;
        var newRow   = tableRef.insertRow(posicion);

        // Inserta una celda en la fila, en el índice 0
        var newCell  = newRow.insertCell(-1);
        var newCell2 = newRow.insertCell(0);
        var newCell3 = newRow.insertCell(1);

        // Valores de los select
        var comb = document.getElementById("vacunas");
        // Selecciona el texto del option
        var vac = comb.options[comb.selectedIndex].text;
        var vacuna = document.getElementById("vacunas").value;
        var comb2 = document.getElementById("labs");
        var lab = comb2.options[comb2.selectedIndex].text;
        var laboratorios = document.getElementById("labs").value;
        var fech = document.getElementById("fecha").value;

        // Añade un nodo de texto a la celda
        var newText  = document.createTextNode(vac);
        var newText2  = document.createTextNode(lab);
        var newText3  = document.createTextNode(fech);
        newCell.appendChild(newText3);
        newCell2.appendChild(newText);
        newCell3.appendChild(newText2);
        newCell.setAttribute("data-fec", fech);
        newCell2.setAttribute("data-vac", vacuna);
        newCell2.setAttribute("colspan","2");
        newCell3.setAttribute("data-lab", laboratorios);
    }

    function convertirNum(num){
        var romano = '';
        // Array con los números romanos
        var roman_numerals = {'M': 1000,'CM': 900, 'D' : 500,'CD':400,'C':100,'XC':90,'L':50, 'XL': 40, 'X': 10, 'IX': 9, 'V': 5, 'IV': 4, 'I': 1};
        for(elem in roman_numerals) {
            while(num >= roman_numerals[elem]){ 
                romano += elem;
                num -= roman_numerals[elem]; 
            } 
        }
        return romano;
    }


});