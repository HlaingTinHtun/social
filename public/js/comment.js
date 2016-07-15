function commentAction(counter, status_id) {

    var comment_text = $('input[name="comment-text' + counter + '"]').val();

    if (comment_text == "") {

        sweetAlert("Error", "Please write the comment!", "error");
    } else {


        var datastring = counter + ',' + status_id + ',' + comment_text;

        $('input[name="comment-text' + counter + '"]').val('');


        var path = '/comment/';
        $.get(path + datastring, function (response) {
            console.log(response);
            $('#comments' + counter).html(response);
        });

    }
}

function commentEnter(event,counter, status_id){

    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13') {


        var comment_text = $('input[name="comment-text' + counter + '"]').val();

        if (comment_text == "") {
            sweetAlert("Error", "Please write the comment!", "error");

        } else {


            var datastring = counter + ',' + status_id + ',' + comment_text;

            var path = '/comment/';

            $('input[name="comment-text' + counter + '"]').val('');


            $.get(path + datastring, function (response) {
                console.log(response);
                $('#comments' + counter).html(response);
            });
        }
    }
}

$(document).ready(function(){
    $(".editlink").on("click", function(e){
        e.preventDefault();
        var dataset = $(this).prev(".datainfo");

        var savebtn = $(this).next(".savebtn");
//                var cancelbtn = $(this).next(".cancelbtn");

        var theid   = dataset.attr("id");
        var newid   = theid+"-form";
        var currval = dataset.text();

        dataset.empty();

        $('<input type="text" name="'+newid+'" id="'+newid+'" value="'+currval+'" class="hlite">').appendTo(dataset);


        $(this).css("display", "none");
        savebtn.css("display", "block");

    });

    $(".savebtn").on("click", function(e){
        e.preventDefault();
        var elink   = $(this).prev(".editlink");

        var dataset = elink.prev(".datainfo");

        var newid   = dataset.attr("id");

        var path = '/comment/edit/';

        var comment_id = dataset.attr("saveid");

        var cinput  = "#"+newid+"-form";

        var einput  = $(cinput);

        var newval  = einput.attr('value');

        var datastring =  comment_id + ',' + newval;
        $.get(path + datastring, function (response) {
            console.log(response);
            $('#editcmt').html(response);
        });

        $(this).css("display", "none");
        einput.remove();
        dataset.html(newval);
        elink.css("display", "block");



    });
});

function homecommentAction(counter, status_id) {

    var comment_text = $('input[name="comment-text' + counter + '"]').val();

    if (comment_text == "") {

        sweetAlert("Error", "Please write the comment!", "error");

    } else {


        var datastring = counter + ',' + status_id + ',' + comment_text;

        $('input[name="comment-text' + counter + '"]').val('');


        var path = '/homecomment/';
        $.get(path + datastring, function (response) {
            console.log(response);
            $('#comments' + counter).html(response);
        });

    }
}

function homecommentEnter(event,counter, status_id){

    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13') {


        var comment_text = $('input[name="comment-text' + counter + '"]').val();

        if (comment_text == "") {

            sweetAlert("Error", "Please write the comment!", "error");

        } else {


            var datastring = counter + ',' + status_id + ',' + comment_text;

            var path = '/homecomment/';

            $('input[name="comment-text' + counter + '"]').val('');


            $.get(path + datastring, function (response) {
                console.log(response);
                $('#comments' + counter).html(response);


            });
        }
    }


}

function guestcommentAction(counter, status_id) {

    var comment_text = $('input[name="comment-text' + counter + '"]').val();

    if (comment_text == "") {

        sweetAlert("Error", "Please write the comment!", "error");
    } else {


        var datastring = counter + ',' + status_id + ',' + comment_text;

        $('input[name="comment-text' + counter + '"]').val('');


        var path = '/comment/';
        $.get(path + datastring, function (response) {
            console.log(response);
            $('#comments' + counter).html(response);
        });

    }
}

function guestcommentEnter(event,counter, status_id){

    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13') {


        var comment_text = $('input[name="comment-text' + counter + '"]').val();

        if (comment_text == "") {
            sweetAlert("Error", "Please write the comment!", "error");

        } else {


            var datastring = counter + ',' + status_id + ',' + comment_text;

            var path = '/comment/';

            $('input[name="comment-text' + counter + '"]').val('');


            $.get(path + datastring, function (response) {
                console.log(response);
                $('#comments' + counter).html(response);


            });
        }
    }


}


