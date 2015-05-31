/**
 * Created by rodrigochaves on 31/05/15.
 */

function deleteConfirm(url) {
    swal({
        title: "Tem certeza?",
        type: "warning",
        showCancelButton: true,
        closeOnConfirm: false,
        confirmButtonText: "Sim",
        confirmButtonColor: "#80cbc4",
        cancelButtonText: "Cancelar"
    }, function(isConfirm) {
        if(isConfirm){
            window.location.replace(url);
        }
    });
}