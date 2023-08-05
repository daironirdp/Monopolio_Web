//document.write("lo esta cogiendo");



// carga de los archivos correspondientes a cada opcion 
$.ajax({
    type:"POST",
    url:"vista/paginas/jugar.php",
    success: function (response) {
        $("#crearjuego_div").html(response);
    }
    
});



$.ajax({
    type:"POST",
    url:"vista/paginas/cargar.php",
    success: function (response) {
        $("#cargar_div").html(response);
    }
    
});


$.ajax({
    type:"POST",
    url:"vista/paginas/opciones.php",
    success: function (response) {
        $("#opciones_div").html(response);
    }
    
});

//$("#salir").click(function(){
//   
//  window.close();
// // return false;
//    
//});

function close_window(){

    if(confirm("Desea salir realmente?")){
       ventana= window.open("","index.php","");
        ventana.close();
        return false;
    }
    
}
 