function postDelete(id){
    swal({   title: "Are you sure?",
            text: "You will not be able to recover this post!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false },
        function(isConfirm){
            if (isConfirm) {

                window.location = "/social/delete/" + id;

            } else {
                swal("Cancelled", "Your post is safe!", "error");
            }
        });
}

function commentDelete(id){

    swal({   title: "Are you sure?",
            text: "You will not be able to recover this comment!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnConfirm: false,
            closeOnCancel: false },
        function(isConfirm){
            if (isConfirm) {

                window.location = "/comment/delete/" + id;

            } else {
                swal("Cancelled", "Your post is safe!", "error");
            }
        });

}