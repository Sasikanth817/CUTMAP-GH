
const timebgClr = "bg-black";
const timeClr = "text-white";
const timeBorderTransparent = "border-transparent";
const timeBorderClr = "border-gray-400";
timeBox.forEach(select=>{
    select.addEventListener('click',()=>{
        timeBox.forEach(tm=>{tm.classList.remove(timeClr,timebgClr) ;tm.classList.replace(timeBorderTransparent,timeBorderClr);});
        select.classList.add(timeClr,timebgClr);
        select.classList.replace(timeBorderClr,timeBorderTransparent);
    });
});