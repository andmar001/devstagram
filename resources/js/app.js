import Dropzone from "dropzone";

Dropzone.autoDiscover = false; // Disable auto discover for all elements

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg,.jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false
})

dropzone.on("success", function(file, response){
    // asignar valor de la imagen a un input hidden
    document.querySelector('[name="imagen"]').value = response.imagen;
})

dropzone.on("removedfile", function(){
    console.log( 'Archivo eliminado' );
}   )