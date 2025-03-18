let departmentName = document.querySelectorAll('.department');
let departmentwrapper = document.querySelectorAll('.department-wrapper');
// console.log(departmentName);
window.addEventListener("DOMContentLoaded",()=>{
    const popUps = document.querySelector(".allPopUps");
    let popUpsInp = document.querySelector(".popup-inputs");
    setTimeout(()=>{
        console.log('fetch')
        popUpsInp = document.querySelector(".popup-inputs");
        departmentName = document.querySelectorAll('.department');
        departmentwrapper = document.querySelectorAll('.department-wrapper');
        console.log(departmentName);
    },500)
    // checks only if we are clicking on the input tag and the department value into input tag 
    document.addEventListener('click',(e)=>{
        // console.log(e.target);
        (e.target.classList.contains("department") || e.target.classList.contains("department-wrapper"))?popUpsInp.value=e.target.innerText:"";
        (e.target.classList.contains("popup-inputs"))?popUps.classList.remove('hidden'):popUps.classList.add('hidden');
    });
    
    // search department name
    popUpsInp.addEventListener('input',()=>{
        departmentName.forEach((name,index)=>{
            let n= name.innerHTML.toLowerCase();
            if(n.includes(popUpsInp.value))
            {
                departmentwrapper[index].classList.remove('hidden');
            }
            else
            {
                departmentwrapper[index].classList.add('hidden');
            }
  
        });
    });
   
});
