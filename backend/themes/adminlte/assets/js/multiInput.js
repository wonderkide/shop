jQuery(document).ready(function($){
    
    $('.multiple-input-list__btn.js-input-plus').click(function(event){
        var id = $(this).attr('id').replace('btn-', '');
        var row = $('#input-data-'+id).val();
        $('#pd-'+id).find("tbody").append(tempRow(id, parseInt(row)+1));
        $('#input-data-'+id).val(parseInt(row)+1);
        console.log(id);
    });
    
    $(document).on('click', '.multiple-input-list__btn.js-input-remove', function(e) {
        var id = $(this).attr('id').replace('btn', 'row');
        $('#'+id).remove();
    });
    
    function tempRow(id, row){
        
        var item = '<tr id="row-'+id+'-'+row+'" class="multiple-input-list__item">'+
                        '<td class="list-cell__size">'+
                            '<div class="form-group field-productdetail-'+id+'-'+row+'-size">'+
                                '<input type="text" id="productdetail-'+id+'-'+row+'-size" class="form-control" name="ProductDetail['+id+']['+row+'][size]">'+
                            '</div>'+
                        '</td>'+
                        '<td class="list-cell__qtt">'+
                            '<div class="form-group field-productdetail-'+id+'-'+row+'-qtt">'+
                                '<input type="text" id="productdetail-'+id+'-'+row+'-qtt" class="form-control" name="ProductDetail['+id+']['+row+'][qtt]">'+
                            '</div>'+
                        '</td>'+
                        '<td class="list-cell__button">'+
                            '<div id="btn-'+id+'-'+row+'" class="btn multiple-input-list__btn js-input-remove btn btn-danger">'+
                                '<i class="glyphicon glyphicon-remove"></i>'+
                            '</div>'+
                        '</td>'+
                    '</tr>';
        return item;
    }
    
    
});

