$(function() {
	$('#product').change(function() {
        var productId = $(this).val();
        if(productId != "") {
            $.ajax({
                type: 'get',
                url: baseUrl + "productsubcategories/getlist/" + productId,
                dataType:'json',
                beforeSend: function(xhr) {
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                },
                success: function(response) {
                    if (response) {
                        $('#product_sub_category_id').find('option')
                        .remove().end().append('<option value="">Select</option>');
                        $.each(response, function( index, value ) {
                            $('#product_sub_category_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                        });
                    }
                },
                error: function(e) {
                    alert("An error occurred: " + e.responseText.message);
                    console.log(e);
                }
            });
        } 
    });
});