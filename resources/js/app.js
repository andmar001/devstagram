import Dropzone from "dropzone";

Dropzone.autoDiscover = false; // Disable auto discover for all elements

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg,.jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function(){
        //ejecutar si hay un name en el input
        if (document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada = {};
            imagenPublicada.size = 1234;  //tamaño de la imagen -obligatorio
            imagenPublicada.name = document.querySelector('[name="imagen"]').value; //nombre de la imagen -obligatorio

            this.options.addedfile.call(this, imagenPublicada); //agregar la imagen al dropzone
            
            this.options.thumbnail.call(
                this, 
                imagenPublicada, 
                `/uploads/${imagenPublicada.name}`); //agregar la imagen al path
            
            imagenPublicada.previewElement.classList.add(
                'dz-sucess',
                'dz-complete'
            ); //agregar la clase dz-sucess y dz-complete propias de dropzone
            
        }
    }

})

dropzone.on("success", function(file, response){
    // asignar valor de la imagen a un input hidden
    document.querySelector('[name="imagen"]').value = response.imagen;
})

//eliminar imagen, resetear el input hidden
dropzone.on("removedfile", function(){
    document.querySelector('[name="imagen"]').value = '';
})