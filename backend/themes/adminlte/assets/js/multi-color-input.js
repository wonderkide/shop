jQuery(document).ready(function($){

    var check = $('#data-count').val();

    if(check == 0){
        createColorArr(parseInt(check)+1, true, null);
        colorScript(parseInt(check)+1);
        $('#data-count').val(parseInt(check)+1);
    }
    //multiInputScript(5);
    for(var i=0;i<check;i++){
        /*var color = $('#model-data-'+i).val();
        console.log(color);
        if(i==0){
            createColorArr(i+1, true, color);
        }
        else{
            createColorArr(i+1, false, color);
        }*/
        colorScript(i+1);
    }
    
    $('#btn-block-1.plus').click(function(event){
        var colorRow = $('#data-count').val();
        createColorArr(parseInt(colorRow)+1);
        colorScript(parseInt(colorRow)+1);
        $('#data-count').val(parseInt(colorRow)+1);
    });
    
    $(document).on('click', '[id^=btn-block-].minus', function(e) {
        var id = $(this).attr('id').replace('btn-block-', '');
        $('.block-'+id).remove();
    });
    
    $(document).on('change', 'input[id^=cp].spectrum-input', function() {
        var id = $(this).attr('id').replace('cp', '');
        console.log(id);
        $('#img-cp'+id).attr('name', 'imageFile-'+$(this).val()+'[]');
    });
    
    function createColorArr(lastID, plus, color){
        $('.detail-form .row').append('<div class="block-'+lastID+'"><div class="col-md-10 col-xs-10"><div class="input-block-'+lastID+'"></div></div></div>');
        $('.block-'+lastID).append('<div class="col-md-2 col-xs-2"><div class="btn-block-'+lastID+'"></div></div>');
        $('.input-block-'+lastID).append('<label class="control-label">Color '+lastID+'</label>');
        $('.input-block-'+lastID).append(colorPicker(lastID, color));
        $('.input-block-'+lastID).append('<div class="img-detail" id="for-color-'+lastID+'"></div>');
        $('#for-color-'+lastID).append('<input name="imageFile-'+lastID+'[]" type="file" multiple="multiple" accept="image/*" />');
        if(plus){
            $('.btn-block-'+lastID).append('<label class="control-label">Add</label>');
            $('.btn-block-'+lastID).append(btnPlus(lastID));
        }else{
            $('.btn-block-'+lastID).append('<label class="control-label">Remove</label>');
            $('.btn-block-'+lastID).append(btnMunus(lastID));
        }
    }
    
    function colorPicker(id, color){
        if(!color){
            color = '#000000';
        }
        var html = '<div class="spectrum-group input-group input-group-html5">'+
                        '<span id="cp'+id+'-cont" class="input-group-sp input-group-addon addon-text" style="width:60px">'+
                            '<input type="text" id="cp'+id+'-source" class="spectrum-source" name="cp'+id+'-source" value="'+color+'" style="display:none">'+

                        '</span>'+
                        '<input type="text" id="cp'+id+'" class="spectrum-input form-control" name="pick_color[]" value="'+color+'">'+
                    '</div>';
        return html;
    }
    function btnPlus(id){
        var html = '<button id="btn-block-'+id+'" class="btn btn-default input-group plus" type="button" style="padding:6px 15px;"><i class="glyphicon glyphicon-plus"></i></button>';
        return html;
    }
    function btnMunus(id){
        var html = '<button id="btn-block-'+id+'" class="btn btn-danger input-group minus" type="button" style="padding:6px 15px;"><i class="glyphicon glyphicon-minus"></i></button>';
        return html;
    }
    
    function colorScript(id){
        var script = "kvInitHtml5('#cp"+id+"','#cp"+id+"-source');if (jQuery('#cp"+id+"').data('spectrum')) { jQuery('#cp"+id+"').spectrum('destroy'); }jQuery.when(jQuery('#cp"+id+"-source').spectrum(spectrum_659a43ea)).done(function(){jQuery('#cp"+id+"-source').spectrum('set',jQuery('#cp"+id+"').val());jQuery('#cp"+id+"-cont').removeClass('kv-center-loading');});";
        $('<script>'+script+'</' + 'script>').appendTo(document.body);
        
    }
    
    function multiInputScript(id){
        //id = 5;
        var script = 'jQuery("#pd'+id+'").multipleInput({"id":"pd'+id+'","inputId":"productdetail-'+id+'","template":"<tr class=\"multiple-input-list__item\"><td class=\"list-cell__size\"><div class=\"form-group field-productdetail-'+id+'-{multiple_index_pd'+id+'}-size\"><input type=\"text\" id=\"productdetail-'+id+'-{multiple_index_pd'+id+'}-size\" class=\"form-control\" name=\"ProductDetail['+id+'][{multiple_index_pd'+id+'}][size]\"></div></td>\n<td class=\"list-cell__qtt\"><div class=\"form-group field-productdetail-'+id+'-{multiple_index_pd'+id+'}-qtt\"><input type=\"text\" id=\"productdetail-'+id+'-{multiple_index_pd'+id+'}-qtt\" class=\"form-control\" name=\"ProductDetail['+id+'][{multiple_index_pd'+id+'}][qtt]\"></div></td>\n<td class=\"list-cell__button\"><div class=\"btn multiple-input-list__btn js-input-remove btn btn-danger\"><i class=\"glyphicon glyphicon-remove\"></i></div></td></tr>","jsInit":[],"jsTemplates":[],"max":9223372036854775807,"min":1,"attributes":{"productdetail-'+id+'-size":[],"productdetail-'+id+'-qtt":[]},"indexPlaceholder":"multiple_index_pd'+id+'"});';
        $('<script>'+script+'</' + 'script>').appendTo(document.body);
    }
    
});

