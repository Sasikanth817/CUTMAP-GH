const checkInput = document.querySelectorAll('.checkNum');
const nums = [1,2,3,4,5,6,7,8,9,0];
let a =10;

checkInput.forEach((input,index)=>{
    input.addEventListener('keypress',()=>{
        // console.log(Number(input.value))
        if(Number(input.value)!= 'NaN') 
        console.log("number");
    else
    console.log("notnum");

    })
})