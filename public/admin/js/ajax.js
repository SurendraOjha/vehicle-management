$(document).ready(function () {

$("select[name='category_id']").on('change',function () {

    var id =  $("select[name='category_id'] option:selected").val();

    var url = $('#url').val();

    $.ajax({
        url: url + '/' + id,
        type: "GET",
        // dataType: "json",
        // async: false,

        success: function (data) {
            console.log('data',data);

            $("select[name='sub_category_id']").empty();

            $("select[name='sub_category_id']").append(`<option value=>Select Sub Category</option>`)

            data.forEach(function (d, index) {


                $("select[name='sub_category_id']").append(`<option value="${d.id}" >${d.title}</option>`)


            });

        }
    });
});


// pm document ready


var id =  $("select[name='category_id'] option:selected").val();

var url = $('#url').val();

var selected_sub_category_id = $('#selected_sub_category_id').val();

 console.log('sub category id',selected_sub_category_id);


$.ajax({
    url: url + '/' + id,
    type: "GET",
    // dataType: "json",
    // async: false,

    success: function (data) {
        console.log('data',data);

        $("select[name='sub_category_id']").empty();

        $("select[name='sub_category_id']").append(`<option value=>Select Sub Category</option>`)

        data.forEach(function (d, index) {

            if(d.id == selected_sub_category_id){
                $("select[name='sub_category_id']" ).append(`<option value="${d.id}" selected>${d.title}</option>`)

            }else{
                $("select[name='sub_category_id']").append(`<option value="${d.id}" >${d.title}</option>`)

            }



        });

    }
});
});


