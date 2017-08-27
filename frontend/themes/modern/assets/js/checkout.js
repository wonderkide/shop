jQuery(document).ready(function($){
    var asset = $('.assets').val();
    var count = 0;
    
        /*simpleCart({
        cartColumns: [
            { attr: 'name' , label: 'Name' } ,
            { attr: 'price' , label: 'Price', view: 'currency' } ,
            { view: 'decrement' , label: false , text: '-' } ,
            { attr: 'quantity' , label: 'Qty' } ,
            { view: 'increment' , label: false , text: '+' } ,
            { attr: 'total' , label: 'SubTotal', view: 'currency' } ,
            { view: 'remove' , text: 'Remove' , label: false }
        ]
    });*/
    
    
    var allItem = JSON.parse(allStorage()[0]);
    if(Object.keys(allItem).length > 0){
        //$('.cart_total_item').text('('+Object.keys(allItem).length+')');
        Object.keys(allItem).forEach(function(key, i) {
            var cart = JSON.parse(allStorage()[0])[key];
            console.log(cart);
            genItem(cart, key, i*2+5);
            
            /*var url = "/store/getitem";
            var cart = JSON.parse(allStorage()[0])[key];
            console.log(cart);
            $.ajax({
                type: "POST",
                url: url,
                data:"selected="+cart['pid'],
                success: function(data){
                    if(data){
                        
                        genItem(data, cart, key, i*2+5);
                    }
                }
            });*/
        });
        //console.log(allStorage()[0]);
        //$('.cart-items .container.items').append('<div class="text-center"><a class="btn btn-warning" onclick="checkoutProduct();">Checkout!</a></div>');
        $('.cart-items .container.items').append('<div class="text-center"><a class="btn btn-warning" href="/store/create-order">ดำเนินการสั่งซื้อ</a></div>');
    }
    else{
        $('.cart-items .container.items').append('<h4 class="text-center wow slideInRight animated" data-wow-delay=".5s">your cart is empty</h4>');
    }
    function genItem(cart, key, animate){
        var color = "";
        var show_color = "-";
        var productLink = cart["name"].replace(" ", "-");
        if (cart["color"] !== '-') {
            //console.log(cart["name"]);
            color = '?color='+cart["color"].replace("#", "");
            show_color = '<span class="item-detail-color" style="background:'+cart["color"]+'"></span>';
        }
        //var img = JSON.parse(data["image"])[0];
        //console.log(key);
        
        var content =   '<tr><td>'+
                            '<div class="itemRow cart-header-'+cart["id"]+' wow fadeInUp animated" data-wow-delay=".'+animate+'s" id="cartItem_'+key+'">'+
                                '<div class="alert-close simpleCart_remove" id="'+cart["id"]+'"> </div>'+
                                '<div class="cart-sec simpleCart_shelfItem">'+
                                    '<div class="cart-item cyc">'+
                                        '<a href="/product/detail/'+productLink+color+'"><img src="'+cart["image"]+'" class="img-responsive" alt=""></a></div>'+
                                    '<div class="cart-item-info">'+
                                        //'<h4><a href="/product/detail/'+productLink+color+'"> '+cart["name"]+' </a><span>Quantity : '+cart["quantity"]+'</span></h4>'+
                                        /*'<ul class="qty">'+
                                            '<li><p>Min. order value :</p></li>'+
                                            '<li><p>FREE delivery</p></li>'+
                                        '</ul>'+*/
                                        /*'<div class="delivery">'+
                                            '<p>Service Charges : $10.00</p>'+
                                            '<span>Delivered in 1-1:30 hours</span>'+
                                            '<div class="clearfix"></div>'+
                                        '</div>'+*/
                                        '<div class="item-name">'+
                                            '<h4><a href="/product/detail/'+productLink+color+'"> '+cart["name"]+' </a></h4>'+
                                            '<div class="cart-item-detail">'+
                                                '<span class="item-detail">Color : '+show_color+'</span>'+
                                                '<span class="item-detail">Size : '+cart["size"]+'</span>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="item-price">'+cart["price"]+'</div>'+
                                        '<div class="item-qt">'+cart["quantity"]+'</div>'+
                                        '<div class="item-price-total">'+cart["price"]*cart["quantity"]+'</div>'+
                                    '</div>'+
                                    '<div class="clearfix"></div>'+
                                '</div>'+
                            '</div>'+
                        '</td></tr>';
                                
        
        
        $('.cart-items .container.items table tbody').append(content);
    }

    $(document).on('click', '.alert-close', function(e) {
        var id = $(this).attr('id');
        $('.cart-header-'+id).fadeOut('slow', function(c){
            $('.cart-header-'+id).remove();
        });
    });
    $(".simpleCart_empty").click(function(){
        $('.itemRow').fadeOut('slow', function(c){
            $('.itemRow').remove();
        });
    });
    
    
    
    
});
function allStorage() {

        var values = [],
            keys = Object.keys(localStorage),
            i = keys.length;
            count = i;

        while ( i-- ) {
            values.push( localStorage.getItem(keys[i]) );
        }

        return values;
    }
function checkoutProduct(){
    var url = "/store/checkoutproduct";
    $.ajax({
        type: "POST",
        url: url,
        data:"p="+allStorage()[0],
        //contentType: "application/json; charset=utf-8",
        //dataType: "json",
        success: function(data){
            if(data){
                console.log(data);
            }
        }
    });
}

function createOrder(){
    var url = "/store/create-order";
    $.ajax({
        type: "POST",
        url: url,
        data:"p="+allStorage()[0],
        //contentType: "application/json; charset=utf-8",
        //dataType: "json",
        success: function(data){
            if(data){
                console.log(data);
            }
        }
    });
}