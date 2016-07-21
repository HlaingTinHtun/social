
function postEdit(status_id,status_text){
    swal({
        title: "Edit Post!",
        text: "<textarea id='text' style='width:300px;height:300px;'>"+status_text+"</textarea>",
        background_color:'#00FF00',

        html: true,
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        animation: "slide-from-top",
        inputPlaceholder: "Write something"
    }, function(inputValue) {
        if (inputValue === false) return false;


        var val = document.getElementById('text').value;
        swal("Nice!", "You wrote: " + val, "success");
        var data = status_id + ',' + val;
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
