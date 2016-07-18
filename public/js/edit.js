
function postEdit(status_id,status_text){
   swal({
    title: "Edit Post",
    text: "Write something you want to edit!",
    type: "input",

    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
           inputValue:status_text

           },
    function(inputValue){
        if (inputValue === false) return false;

        swal("Nice!", "You wrote: " + inputValue, "success");
        var data = status_id + ',' + inputValue;
        window.location = "/updatepost/" + data;


    });

}


function commentEdit(comment_id,comment_text) {
    bootbox.prompt({
        title: "Edit Comment!!",
        value: comment_text,
        callback: function (result) {
            if (result === null) {
                return null;
            } else {
                var data = comment_id + ',' + result;
                window.location = "/comment/edit/" + data;
                Example.show("Edited <b>" + result + "</b>");
            }
        }

    });
}
