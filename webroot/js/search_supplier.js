
$(document).ready(function() {

$('.search_supplier_check').click(function() {
    var isChecked = $(this).is(':checked');
    var id = $(this).attr('id');
    if (isChecked) {
        console.log('Checkbox with ID ' + id + ' is checked');
       
    } else {
        console.log('Checkbox with ID ' + id + ' is unchecked');

    }
});
});
