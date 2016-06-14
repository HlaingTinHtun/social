$(document).ready(function(){

    $('.sub').hide();
    $('.selectedValue').hide();
    $('.multiselect').hide();


    $(".hida").on('click', function() {
        $(".multiselect").slideToggle('fast');
    });

    $('.multiselect').find('.main').click(function(){
        $(this).next().toggle(); //Expand or collapse this panel
        var id = $(this).attr('id');//get value of id attribute to add in html()
        //check action of toggle is visible or hidden
        var isVisible = $(this).next().is(":visible");//if visible , return true
        var isHidden = $(this).next().is(":hidden");//if hidden , return false
        if(isVisible){
            $(this).html("-"+id);//change + to -
        }
        if(isHidden){
            $(this).html("+ "+id);//change - to +
        }
    });
        //can check only one checkbox
        $('input:checkbox').click(function(){
            $('input:checkbox').not(this).prop('checked',false);
        });

        //pass checkbox value to text box
        $('input:checkbox').click(function(){
            var res = $(this).val();
            $('#category').val(res);
        });

});