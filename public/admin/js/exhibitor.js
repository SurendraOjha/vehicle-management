
jQuery(document).ready(function () {
    jQuery('#event_id').on('change', function () {

        var id = jQuery(this).val();

        var url = $('#event_type_url').val();

        console.log("event type url",url+'/'+id);

        $('#event_type').empty();

        $('#event_size').empty();


        jQuery.ajax({
            url: url + '/' + id,
            type: "GET",
            dataType: "json",
            async: false,
            success: function success(data) {

                $('#event_type').append('<option value="">Select Booth Type</option>');
                data.forEach(function (d, index) {
                    $('#event_type').append(`<option value='${d.id}'>${d.title}</option>`);
                });
            }
          });

    });



    jQuery('#event_type').on('change', function () {

        var id = jQuery(this).val();

        var url = $('#event_size_url').val();

        $('#event_size').empty();

        jQuery.ajax({
            url: url + '/' + id,
            type: "GET",
            dataType: "json",
            async: false,
            success: function success(data) {

                $('#event_size').append('<option value="">Select Booth Size</option>');
              data.forEach(function (d, index) {

                $('#event_size').append(`<option value='${d.id}'>${d.title}</option>`)


              });
            }
          });

    });


});




