
/**
 * Created by Dell on 3/25/2016.
 */

function MemberEdit() {

    var data = [];
    $("input[name='member-check']:checked").each(function () {
        data.push($(this).val());
    });

    if (data[0] == null ) {

        sweetAlert("Oops...", "Please select at least one item to edit!", "error");

    }
    else if (data[1] != null) {
        sweetAlert("Oops...", "You can select one item to edit in one time!", "error");
    }

    else {
        window.location='memberEdit/'+data[0];


    }
}

function categoryEdit() {

    var data = [];
    $("input[name='category-check']:checked").each(function () {
        data.push($(this).val());
    });

    if (data[0] == null) {
        sweetAlert("Oops...", "You can select atleast one item to edit !", "error");
    }
    else if (data[1] != null) {
        sweetAlert("Oops...", "You can select one item to edit in one time!", "error");
    }
    else
        window.location = "/Cashier/categoryEdit/" + data;
}

function member_type_edit() {

    var data = [];
    $("input[name='member_type_check']:checked").each(function () {
        data.push($(this).val());
    });


    if (data[0] == null) {
        sweetAlert("Oops...", "You can select at least one item to edit !", "error");
    }
    else if (data[1] != null) {
        sweetAlert("Oops...", "You can select one item to edit in one time!", "error");

    } else
        window.location = "member_type_edit/" + data;
}

function discount_edit() {
    var data = [];
    $("input[name='check']:checked").each(function () {
        data.push($(this).val());
    })

    if (data[0] == null || data[1] >1) {
        sweetAlert("Oops...", "Please select at least one item to edit!", "error");
    }
    else {
        window.location='/Cashier/discount_edit/'+data[0];
    }
}

//Khin Zar Ni Wint
function user_edit() {

    var data = [];
    $("input[name='usercheck']:checked").each(function () {
        data.push($(this).val());
    })

    if (data[0] == null || data[1] > 1) {
        sweetAlert("Oops...", "Please select at least one item to edit!", "error");
    }
    else {
        window.location = 'userEdit/' + data[0];

    }
}


function table_edit() {

    var data = [];
    $("input[name='table_check']:checked").each(function () {
        data.push($(this).val());
    });

    if (data[0] == null) {
        sweetAlert("Oops...", "You can select at least one item to edit !", "error");
    }
    else if (data[1] != null) {
        sweetAlert("Oops...", "You can select one item to edit in one time!", "error");
    }
    else
        window.location = "tableedit/" + data;


}