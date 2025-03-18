const saveToggleBtn = document.querySelector('.save-card-details');
const check = document.querySelector('.save-details-icon');
saveToggleBtn.addEventListener('click',()=>{
    check.classList.toggle('bg-paymentReqPrimaryClr');
    if(check.classList.contains('bg-paymentReqPrimaryClr'))
        check.setAttribute('data-saved','true');
    else
        check.setAttribute('data-saved','false');
})