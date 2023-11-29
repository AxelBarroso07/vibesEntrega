const buscar_prod=(buscar)=>{
    let parametros = {"buscar":buscar};
    console.log(parametros),
    $.ajax({
        data: parametros,
        type: 'POST',
        url: '../includes/buscador.php',
        success: function(data) {
            document.getElementById("datos_buscador").innerHTML = data ;
        }
    });
    }
    buscar_prod();