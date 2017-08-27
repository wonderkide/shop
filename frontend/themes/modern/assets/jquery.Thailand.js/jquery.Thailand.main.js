var asset = $('.assets').val();
$.Thailand({
    database: asset+'/jquery.Thailand.js/database/db.json', 

    $district: $('.cart-address #useraddress-district'),
    $amphoe: $('.cart-address #useraddress-amphoe'),
    $province: $('.cart-address #useraddress-province'),
    $zipcode: $('.cart-address #useraddress-zipcode'),

    /*onDataFill: function(data){
        console.info('Data Filled', data);
    },*/

    onLoad: function(){
        console.info('Autocomplete is ready!');
        $('#address-form-loader, #address-form').toggle();
    }
});
/*$('.cart-address #useraddress-district').change(function(){
    console.log('ตำบล', this.value);
});
$('.cart-address #useraddress-amphoe').change(function(){
    console.log('อำเภอ', this.value);
});
$('.cart-address #useraddress-province').change(function(){
    console.log('จังหวัด', this.value);
});
$('.cart-address #useraddress-zipcode').change(function(){
    console.log('รหัสไปรษณีย์', this.value);
});*/