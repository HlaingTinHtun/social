

$('#member_type_search').keyup(function(e){
    console.log($(this).val());
    var url = 'getmembertype?term='+$(this).val();
    var jqxhr = $.get( url, function(json) {
            $('#member_type_listing tbody').html("");


            json.forEach(function(value, index, ar){
                var member_type = value.id;
                var temp_html=
                    '<tr>' +
                    '<td><input class="source" type="checkbox" name="member_type_check" value='+ member_type+ ' />'+member_type+'</td>'+
                    '<td>'+value.type+'</td>' +

                    '<td>'+value.description+'</td>' +
                    '<td>'+value.discount_amount+'</td>' +
                    '</tr>';

                $('#member_type_listing tbody').append(temp_html);
            });
        })
        .fail(function() {
            alert( "error" );
        })
});


$('#table_search').keyup(function(e){
    console.log($(this).val());
    var url = 'gettable?term='+$(this).val();
    var jqxhr = $.get( url, function(json) {
            $('#tablelisting tbody').html("");
            json.forEach(function(value, index, ar){
                var table_id = value.id;
                var temp_html=
                    '<tr>' +
                    '<td><input class="source" type="checkbox" name="check" value='+ table_id+ ' />'+table_id+'</td>'+
                    '<td>'+value.table_name+'</td>' +

                    '<td>'+value.capacity+'</td>' +
                    '<td>'+value.status+'</td>' +
                    '</tr>';
                $('#tablelisting tbody').append(temp_html);


        })
        .fail(function() {
            alert( "error" );
        })
});




$('#category_search').keyup(function(e){
    console.log($(this).val());
    var url = 'getdatacategory?term='+ $(this).val();

    var jqxhr = $.get( url, function(json) {
            $('#category tbody').html("");
            json.forEach(function(value, index, ar){
                var category = value.id;

                var temp_html=
                    '<tr>' +
                    '<td><input type="checkbox" name="category-check" value="'+category+'" id="all">'+category+'</td>'+
                    '<td>'+value.name+'</td>' +
                    '<td>'+value.image+'</td>' +
                    '<td>'+value.description+'</td>' +
                    '<td>'+value.status+'</td>' +
                    '</tr>';
                $('#category tbody').append(temp_html);
            });
        })
        .fail(function() {
            alert( "error" );
        })

});


});

