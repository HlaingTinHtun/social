function likeAction(counter, status_id, action) {

    var datastring = counter + ',' + status_id + ',' + action;


    if(action == 'unlike') {

        var path = '/timelineUnlike/'

    } else if ( action == 'like') {
        path = '/timelinelike/';


    }

    $.get(path + datastring, function (response) {
        console.log(response);
        $('#likes'+counter).html(response);

    });
}

function voteAction(counter, status_id, action) {

    var datastring = counter + ',' + status_id + ',' + action;


    if(action == 'unlike') {

        var path = '/homeUnlike/'


    } else if ( action == 'like') {
        path = '/homelike/';


    }

    $.get(path + datastring, function (response) {
        console.log(response);
        $('#likes'+counter).html(response);

    });
}

function guestlikeAction(counter, status_id, action) {

    var datastring = counter + ',' + status_id + ',' + action;


    if(action == 'unlike') {

        var path = '/guestUnlike/'


    } else if ( action == 'like') {
        path = '/guestlike/';


    }

    $.get(path + datastring, function (response) {
        console.log(response);
        $('#likes'+counter).html(response);

    });
}
