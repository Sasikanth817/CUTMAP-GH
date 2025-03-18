const toggleCustomizeBtn = document.querySelector('.customize-time-btn');
const CustomizeTime = document.querySelector('.customize-time');

toggleCustomizeBtn.addEventListener('click',()=>{
    CustomizeTime.classList.toggle("hidden");
})
document.addEventListener('click',(e)=>{
    if(!e.target.classList.contains("customize-time-btn"))
    {
        CustomizeTime.classList.add("hidden");
    }
    
})