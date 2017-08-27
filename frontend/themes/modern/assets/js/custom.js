jQuery(document).ready(function($){
    
    $('#detail-selected-size').on('change', function() {
        //console.log( this.value );
        //console.log('change');
        $('#detail-item-size').text(this.value);
    });
    /*$(document).on('focus', '.select2', function() {
        //alert();
        console.log('focus');
        $(this).siblings('select').select2('open');
    });*/
});
