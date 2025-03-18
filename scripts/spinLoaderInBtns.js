const buttons = document.querySelectorAll('button');
const goodPay = document.querySelector('.good-pay')
buttons.forEach((btn,index)=>{
    btn.addEventListener('click',(e)=>{
        e.preventDefault();
        const BtnText = btn.textContent;
        
        btn.classList.replace('bg-paymentReqPrimaryClr','bg-black');
        btn.innerHTML = `
        <div class="flex items-center justify-center gap-4">
        <div class="spin-circle w-fit text-center w-8 h-8 rounded-full border-4 border-b-green-500 animate-spin"></div
        <h3 class="capitalize font-bold italic">checking payment details</h3>
        </div>`;

        form.classList.add('bg-gray-800','text-white');
        check.classList.add('bg-black');
        goodPay.classList.replace('bg-paymentReqPrimaryClr','bg-gray-900');
        document.querySelectorAll('input').forEach(inp=>inp.classList.add('bg-gray-700','text-black'));
    })
})