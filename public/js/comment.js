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



