let navbar = document.querySelector('.navbar');

document.querySelector('.menu-btn').onclick = () => {
    navbar.classList.toggle('active'); // nếu chưa có class active thì thêm vào và ngược lại
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

// search
let searchForm = document.querySelector('.search-form');

document.querySelector('.search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    cartItem.classList.remove('active');
}

let cartItem = document.querySelector('.cart-items-container');

document.querySelector('.cart-btn').onclick = () => {
    cartItem.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
}

window.onscroll = () => {
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    cartItem.classList.remove('active');
}

// my cart
let gt = 0;
let iprice = document.getElementsByClassName('iprice');
let iquantity = document.getElementsByClassName('iquantity');
let itotal = document.getElementsByClassName('itotal');
let gtotal = document.getElementById('gtotal');
let paymentForm = document.getElementById('paymentForm');
let iquantityInput = document.getElementById('iquantityInput');
let gtotalInput = document.getElementById('gtotalInput');

function subTotal() {
    gt = 0;

    for (i = 0; i < iprice.length; i++) {
        itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
        gt += ((iprice[i].value) * (iquantity[i].value))
    }

    gtotal.innerText = gt;
    gtotalInput.value = gt;
}

paymentForm.addEventListener('submit', function(event) {
    var iquantityArray = [];

    for (i = 0; i < iquantity.length; i++) {
        iquantityArray.push(iquantity[i].value);
    }
    iquantityInput.value = JSON.stringify(iquantityArray);
});

// increase and decrease button

let minusBtns = document.querySelectorAll('.fa-minus');
let plusBtns = document.querySelectorAll('.fa-plus');
let inputs = document.querySelectorAll('.iquantity');

for (let i = 0; i < minusBtns.length; i++) {
    minusBtns[i].addEventListener('click', function () {
        // get the current value of input
        let value = parseInt(inputs[i].value);
        if (value > 1) {
            value--;
        }
        //update value of input
        inputs[i].value = value;
        subTotal();
    });
}

for (let i = 0; i < plusBtns.length; i++) {
    plusBtns[i].addEventListener('click', function () {
        // get the current value of input
        let value = parseInt(inputs[i].value);
        value++;
        //update value of input
        inputs[i].value = value;
        subTotal();
    });
}



// function run to recalculate the grand total 
subTotal();