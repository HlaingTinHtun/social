
function user_delete() {


    var data = [];
    $("input[name='usercheck']:checked").each(function () {
        data.push($(this).val());
    });
    var d = typeof(data);

    //console.log(data[]);


    if (data[0] == null) {


        sweetAlert("Oops...", "Please select at least one item to delete !", "error");

    }
    else {
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55 ",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    window.location = "/Cashier/userDelete/" + data;
                    //route path to do deletion in controller
                } else {


                    window.location = "/Cashier/userList";
                    //index page which show list
                }
            });

    }
}



function discount_delete(){

    var data = [];
    $("input[name='check']:checked").each(function() {
        data.push($(this).val());
    });
    var d= typeof(data);

    //console.log(data[]);

    if(data[0] == null){

        sweetAlert("Oops...", "Please select atleast one item to delete !", "error");

    }
    else{
        swal({   title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55 ",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location ="/Cashier/discount_delete/"+data;

                } else {

                    window.location ="";
                    //index page which show list
                }
            });

    }
}



    //=========================MemberDelete Function================//
    function MemberDelete(){

        var data = [];
        $("input[name='member-check']:checked").each(function() {
            data.push($(this).val());
        });
        var d= typeof(data);

        //console.log(data[]);

        if(data[0] == null){

            sweetAlert("Oops...", "Please select at least one item to delete !", "error");

        }
        else{
            swal({   title: "Are you sure?",
                    text: "You will not be able to recover this imaginary file!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55 ",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel plx!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        window.location ="/Cashier/memberDelete/"+data; ///Route name of delete function
                        //route path to do deletion in controller
                    } else {

                        window.location ="/Cashier/memberListing";/// url name in route.php
                        //index page which show list
                    }
                });

        }

    }


function categoryDelete(){

    var data = [];
    $("input[name='category-check']:checked").each(function() {
        data.push($(this).val());
    });
    var d= typeof(data);



    if(data[0] == null){
        sweetAlert("Oops...", "Please select atleast one category to delete !", "error");
    }
    else{
        swal({   title: "Are you sure?",
                text: "You will not be able to recover this category!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55 ",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {

                    window.location ="/Cashier/categoryDelete/"+data;

                } else {

                    window.location ="/Cashier/categoryListing/";
                }
            });

    }



}



function item_delete(){

    var data = [];
    $("input[name='check']:checked").each(function() {
        data.push($(this).val());
    });
    var d= typeof(data);

    //console.log(data[]);

    if(data[0] == null){

        sweetAlert("Oops...", "Please select atleast one item to delete !", "error");

    }
    else{
        swal({   title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55 ",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm){
                if (isConfirm) {
                    window.location ="item_delete/"+data;
                    //route path to do deletion in controller
                } else {

                    window.location ="itemlisting";
                    //index page which show list
                }
            });

    }



}


function member_type_delete() {


    var data =[];



    $("input[name='member_type_check']:checked").each(function () {
        data.push($(this).val());
    });
    //var d = typeof(data);


    if (data[0] == null) {

        sweetAlert("Oops...", "Please select at least one item to delete !", "error");

    }
    else {
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this  file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55 ",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel !",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    window.location = "delete/" + data;
                    //route path to do deletion in controller
                } else {

                    window.location = "member_type_listing";
                    //index page which show list
                }
            });
    }
}


                  function table_delete() {

                      var data = [];
                      $("input[name='table_check']:checked").each(function () {
                          data.push($(this).val());
                      });
                      //var d = typeof(data);


                      if (data[0] == null) {

                          sweetAlert("Oops...", "Please select at least one item to delete !", "error");

                      }
                      else {
                          swal({
                                  title: "Are you sure?",
                                  text: "You will not be able to recover this  file!",
                                  type: "warning",
                                  showCancelButton: true,
                                  confirmButtonColor: "#DD6B55 ",
                                  confirmButtonText: "Yes, delete it!",
                                  cancelButtonText: "No, cancel",
                                  closeOnConfirm: false,
                                  closeOnCancel: false
                              },
                              function (isConfirm) {
                                  if (isConfirm) {
                                      window.location = "tabledelete/" + data;
                                      //route path to do deletion in controller
                                  } else {

                                      window.location = "tablelisting";
                                      //index page which show list
                                  }
                              });
                      }
                  }

