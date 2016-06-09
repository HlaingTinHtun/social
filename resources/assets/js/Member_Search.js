/**
 * Created by Dell on 3/28/2016.
 */

$('#member_search').keyup(function(e){

    var url = '/Cashier/getdatamember?term='+$(this).val();
    var jqxhr = $.get( url, function(json) {
            $('#member_listing tbody').html("");
            json.forEach(function(value, index, ar){

                console.log(value.name,value.item);
                var temp_html="";
                var food = ""; 
                value.item.forEach(function(v, i, a){

                    food = (food.length!=0)?( food += ','+v):food += food += v;

                    });
                temp_html=
                    '<tr>' +
                    '<td><input type="checkbox" name="member-check" value="'+value.id+'" id="all" >'+value.id+'</td>'+
                    '<td>'+value.name+'</td>' +
                    '<td>'+value.phone+'</td>' +
                    '<td>'+value.email+'</td>' +
                    '<td>'+value.birthdate+'</td>'+
                    '<td>'+food+'</td>'+
                    '<td>'+value.type+'</td>' +
                    '</tr>';
                $('#member_listing tbody').append(temp_html);


            });
        })


        .fail(function() {
            alert( "error" );
        })
});
