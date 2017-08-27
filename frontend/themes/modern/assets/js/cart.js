jQuery(document).ready(function($){
    var usr_id = null;
    var stored = [];
    //stored[1] = 'item_name';
    if( $('.top-header a').hasClass('usr-name') ) {
        usr_id = $(".usr-name").attr('id').split('-')[1];
        stored = JSON.parse(localStorage.getItem(usr_id));
    }
    //var usr = $(".top-header");
    //console.log(usr_id);
    var shelfItem = $(".simpleCart_shelfItem .item_add");
    $(shelfItem).click(function(){
        if(!usr_id){
            alert('Please login');
            return;
        }
        var item_id = $(this).closest('.simpleCart_shelfItem').attr('id');
        var id = item_id.split('-')[1];
        var name = $('#'+item_id).find('.item_name').text();
        var price = $('#'+item_id).find('.item_price').text();
        var number = 1;
        if(stored == null){
            stored = [];
            stored[id]['id'] = id;
            stored[id]['name'] = name;
            stored[id]['price'] = price.replace("$", "");
            stored[id]['number'] = number;
        }
        else{
        console.log(stored);
            if(typeof stored[id] === 'undefined'){
                stored[id]['id'] = id;
                stored[id]['name'] = name;
                stored[id]['price'] = price.replace("$", "");
                stored[id]['number'] = number;
            }
            else{
                //stored[id]['id'] = id;
                //stored[id]['name'] = name;
                //stored[id]['price'] = price.replace("$", "");
                stored[id]['number'] = stored[id]['number'] + number;
            }
        }
        console.log(stored);
        localStorage.setItem(usr_id, JSON.stringify(stored));
    });
    function checkUser(){
        if(!usr_id){
            alert('Please login');
            return;
        }
    }
});

