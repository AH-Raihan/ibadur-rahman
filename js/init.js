// *********** full project init **********
// datatable init

// backbtn
var backBTN = document.getElementsByClassName('backPage');

for (let index = 0; index < backBTN.length; index++) {
    backBTN[0].classList.add('fas');
    backBTN[0].classList.add('fa-arrow-alt-circle-left');
    backBTN[index].addEventListener('click', function () {
        window.location.href = "index.php";
    });
}
// cencel btn
function cencel(i) {
    i.parentNode.parentNode.parentNode.parentNode.classList.add('d-none');
}
//modal open
function modalOpen(modalName) {
    let modal = document.getElementById(modalName);
    modal.classList.remove('d-none');
}
// toast 
$('body').append(`<div class="toastMy"></div>`);
function toastMy(text) {
    $('.toastMy').addClass('active');
    $('.toastMy').html(text);
    setTimeout(function () {
        $('.toastMy').removeClass('active');
    }, 2000);
}
// taka coma
var STaka = document.getElementsByClassName("STaka");

STakaFu();

function STakaFu() {
    for (let index = 0; index < STaka.length; index++) {
        let STakaVal = STaka[index].innerHTML;
        if (STakaVal.length == 4) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{1})([\d]+)/i, "$1,$2"); // 1,000
        } else if (STakaVal.length == 5) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{2})([\d]+)/i, "$1,$2"); // 10,000
        } else if (STakaVal.length == 6) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{1})([\d]{2})([\d]+)/i, "$1,$2,$3"); // 1,10,000
        } else if (STakaVal.length == 7) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{2})([\d]{2})([\d]+)/i, "$1,$2,$3"); // 10,10,000
        } else if (STakaVal.length == 8) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{1})([\d]{2})([\d]{2})([\d]+)/i, "$1,$2,$3,$4"); // 1,10,10,000
        } else if (STakaVal.length == 9) {
            STaka[index].innerHTML = STakaVal.replace(/([\d]{2})([\d]{2})([\d]{2})([\d]+)/i, "$1,$2,$3,$4"); // 10,10,10,000
        } else {
            STaka[index].innerHTML = STakaVal.replace(/([\d]+)/i, "$1"); // unknown
        }
    }

}