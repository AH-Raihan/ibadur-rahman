// other

var paySaveBtn = document.getElementById('paySaveBtn');

var modalPaid = document.getElementById('paidModal');
var modalPaidNot = document.getElementById('paidNotModal');
var modalPaY = document.getElementById('payModal');

var paidModalRecieptNo = document.getElementById('paidModalRecieptNo');
var paidNotModalRecieptNo = document.getElementById('paidNotModalRecieptNo');

var payRecieptNo = document.getElementById('payRecieptNo');
var payDate = document.getElementById('payDate');
var payMonth = document.getElementById('payMonth');
var payYear = document.getElementById('payYear');
var payStudentClass = document.getElementById('payStudentClass');

var paytotal = document.getElementById('paytotal');
var payjoma = document.getElementById('payjoma');
var paybokeya = document.getElementById('paybokeya');


var today = new Date();
if (payDate) {
    payDate.value = `${today.getDate()}/${today.getMonth()}/${today.getFullYear()}`;
    payYear.value = today.getFullYear();
}


function payTotal() {
    let payaddmission_form = document.getElementById('payaddmission_form').value;
    let payaddmission_fee = document.getElementById('payaddmission_fee').value;
    let payadvance = document.getElementById('payadvance').value;
    let paysongsthapon = document.getElementById('paysongsthapon').value;
    let paytiuson = document.getElementById('paytiuson').value;
    let payogrim_bokeya = document.getElementById('payogrim_bokeya').value;
    let paybibid = document.getElementById('paybibid').value;
    let payjoma = document.getElementById('payjoma');
    let paybokeya = document.getElementById('paybokeya');
    paytotal.value = Math.round(payaddmission_form) + Math.round(payaddmission_fee) + Math.round(payadvance) + Math.round(paysongsthapon)  + Math.round(paytiuson) + Math.round(payogrim_bokeya) + Math.round(paybibid);

    // payjoma.value = paytotal.value;
    paybokeya.value = paytotal.value - payjoma.value;
}
if (paytotal) {
    payTotal();
}


function submitPay() {
    paySaveBtn.innerHTML = `<div class="spinner-border spinner-border-sm" role="status"></div>`;
    paySaveBtn.setAttribute('disabled', 'true');
    let payRecieptNo = document.getElementById('payRecieptNo');
    let payStudentId = paySaveBtn.getAttribute('data-id');
    let payDate = document.getElementById('payDate').value;
    let payStudentName = document.getElementById('payStudentName').value;
    let payStudentClass = document.getElementById('payStudentClass').value;
    let payMonth = document.getElementById('payMonth').value;
    let payYear = document.getElementById('payYear').value;

    let payaddmission_form = document.getElementById('payaddmission_form').value;
    let payaddmission_fee = document.getElementById('payaddmission_fee').value;
    let payadvance = document.getElementById('payadvance').value;
    let paysongsthapon = document.getElementById('paysongsthapon').value;
    let paytiuson = document.getElementById('paytiuson').value;
    let payogrim_bokeya = document.getElementById('payogrim_bokeya').value;
    let paybibid = document.getElementById('paybibid').value;

    let paytotal = document.getElementById('paytotal').value;
    let payjoma = document.getElementById('payjoma').value;
    let paybokeya = document.getElementById('paybokeya').value;

    axios.post(`./core/pay_core.php?
            studentid=${payStudentId}&&
            payRecieptNo=${payRecieptNo.value}&&
            studentName=${payStudentName}&&
            payDate=${payDate}&&
            payStudentClass=${payStudentClass}&&
            payMonth=${payMonth}&&
            payYear=${payYear}&&
            payaddmission_form=${payaddmission_form}&&
            payaddmission_fee=${payaddmission_fee}&&
            payadvance=${payadvance}&&
            paysongsthapon=${paysongsthapon}&&
            paytiuson=${paytiuson}&&
            payogrim_bokeya=${payogrim_bokeya}&&
            paybibid=${paybibid}&&
            paytotal=${paytotal}&&
            payjoma=${payjoma}&&
            paybokeya=${paybokeya}
            `)
        .then(function (response) {
            paySaveBtn.innerHTML = `Save`;
            paySaveBtn.removeAttribute('disabled');
            $('.toastMy').addClass('bg-secondary text-white');
            toastMy(response.data);
            modalPaY.classList.add('d-none');
            window.location.reload();
        })
        .catch(function (error) {
            alert(error);
        })
}


var pay = document.getElementsByClassName('pay');
for (let i = 0; i < pay.length; i++) {
    pay[i].addEventListener('click', function () {
        let payRecieptNo = pay[i].getAttribute('data-id');
        let payStudentNameValue = pay[i].getAttribute('data-name');
        let payMonthValue = pay[i].getAttribute('data-month');
        let payClassValue = pay[i].getAttribute('data-class');
        paySaveBtn.setAttribute('data-id', payRecieptNo);
        let payStudentName = document.getElementById('payStudentName');
        payStudentName.value = payStudentNameValue;
        payStudentClass.value = payClassValue;
        payMonth.value = payMonthValue;
        modalPaY.classList.remove('d-none');
    });
}

function payModalOpen() {
    let payNot = document.getElementById('payNot');
    let payRecieptNoV = document.getElementById('payRecieptNo');
    let payRecieptNo = payNot.getAttribute('data-id');
    let payStudentNameValue = payNot.getAttribute('data-name');
    let payClassValue = payNot.getAttribute('data-class');
    let payMonthValue = payNot.getAttribute('data-month');
    let recieptnoPay = payNot.getAttribute('data-recieptnoPay');
    paySaveBtn.setAttribute('data-id', payRecieptNo);
    paySaveBtn.setAttribute('data-recieptnoPay', recieptnoPay);
    let payStudentName = document.getElementById('payStudentName');
    payStudentName.value = payStudentNameValue;
    payStudentClass.value = payClassValue;
    payMonth.value = payMonthValue;
    payRecieptNoV.value = recieptnoPay;

    modalPaY.classList.remove('d-none');
    modalPaid.classList.add('d-none');
    document.getElementById('paidModalJson').classList.add('d-none');
}

$(document).ready(function () {
    if (document.querySelector("#datatable")) {
        $('#datatable').DataTable({
            paging:false
        });
        $('.dataTables_length').addClass('bs-select');
    }
});