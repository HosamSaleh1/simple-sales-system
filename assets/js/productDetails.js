var select = document.getElementById('product');
var quntity = document.getElementById('quantity');
var tax = document.getElementById('tax');
var tax_price = document.getElementById('tax_price');
var paid = document.getElementById('paid');
var charge = document.getElementById('charge');



function showProduct(str) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var product = JSON. parse(this.responseText);
        charge.value = product.price;
      }
    };
    xmlhttp.open("GET","getProduct.php?id="+str,true);
    xmlhttp.send();
}

showProduct(select.value);

quantity.value = 1;
tax.value = 10;


function changeQuantity(int) {
    if (int == 0) {
        return;
    }  
    charge.value *= int;
}

function changeTax(int) {  
    tax_price.value = parseInt(charge.value) * parseInt(int) / 100;
}

paid.addEventListener('keyup',(e)=>{
    if (paid.value == '') {
        paid.value = 0;
    }
    charge.value = parseInt(charge.value) - parseInt(paid.value);
    charge.value = parseInt(charge.value) + parseInt(tax_price.value);
})

charge.addEventListener('volumechange',(e)=>{
    charge.value = parseInt(charge.value) + parseInt(tax_price.value);
})