const selectDate = document.querySelectorAll('.date-box');
const dayLabel = document.querySelectorAll('.day-labels');
const boxBg = 'bg-paymentReqPrimaryClr';
const boxClr = 'text-white';
const borderClr = 'border-transparent';
selectDate.forEach((currDate,index)=>{
    currDate.addEventListener('click',()=>{
        selectDate.forEach(date=>date.classList.remove(boxBg,boxClr,borderClr))
        currDate.classList.add(boxBg,boxClr,borderClr);
        dayLabel.forEach(day=>day.classList.replace('text-white','text-gray-500'))
        // replacing the label color gray to white
        dayLabel[index].classList.add('text-gray-500','text-white');
    })
})