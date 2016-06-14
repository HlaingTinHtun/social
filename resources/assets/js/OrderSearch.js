$('#orderauto').keyup(function(e){
    console.log($(this).val());
    var url = '/Cashier/getdataorder?term='+$(this).val();
    var search = $.get( url, function(json) {
            $('#tbl_listing tbody').html("");
            json.forEach(function(value, index, ar){
                var order = value.order_id;
                var temp_html=
                    '<tr>' +
                    '<td>'+order+'</td>'+
                    '<td>'+value.order_time+'</td>' +
                    '<td>'+value.user_id+'</td>' +
                    '<td>'+value.table_id+'</td>' +
                    '<td>'+value.name+'</td>' +
                    '<td>'+value.price+'</td>' +
                    '<td>'+value.quantity+'</td>' +
                    '<td>'+value.exception+'</td>' +
                    '<td>'+value.extra+'</td>' +
                    '<td>'+value.order_type_id+'</td>' +
                    '<td>'+value.status_id+'</td>' +
                    '<td>'+value.total_amount+'</td>' +
                    '</tr>';
                $('#tbl_listing tbody').append(temp_html);
            });
        })
        .fail(function() {
            alert( "error" );
        })
});