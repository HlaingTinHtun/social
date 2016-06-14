$('#discount_auto').keyup(function(e){
    console.log($(this).val());
    var url = 'getdatadiscount?term='+$(this).val();
    var jqxhr = $.get( url, function(json) {
            $('#discount_listing tbody').html("");
            json.forEach(function(value, index, ar){
                var discount = value.id;
                var temp_html=
                    '<tr>' +
                    '<td>'+discount+'</td>'+
                    '<td>'+value.start_date+'</td>' +
                    '<td>'+value.end_date+'</td>' +
                        '<td>'+value.item_id+'</td>'+
                    '<td>'+value.amount+value.type+'</td>' +
                    '<td>'+value.name+'</td>' +

                    '</tr>';
                $('#discount_listing tbody').append(temp_html);
            });
        })
        .fail(function() {
            alert( "error" );
        })
});
