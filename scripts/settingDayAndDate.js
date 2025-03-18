const dateLabels = document.querySelectorAll('.date-labels');
const dayLabels = document.querySelectorAll('.day-labels');
const inputLabel = document.querySelectorAll('.input-label');
const currentMonth = document.querySelector('.currentMonth');
// date vairable
const currDate = new Date();
// 
const Week = ["sun","Mon","Tue","wed","thu","fri","sat"];

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

// set month and year
const month = currDate.getMonth();
const year = currDate.getFullYear();
currentMonth.innerHTML = months[month]+" "+year;


// code for select date

const day = currDate.getDay();


const todayDate = currDate.getDate();
let counter = day;
for(let i=0;i<7;i++)
{
    dateLabels[i].innerHTML = todayDate+i;
    // console.log(Week[counter]);
    dayLabels[i].innerHTML = Week[counter];
    // setting day and date value to input tag
    inputLabel[i].setAttribute('value',Week[counter]+" "+Number(todayDate+i)+","+months[month]+" "+year);
    // checking counter is greater than the weeks (7)
    // here week is started from 0 index
    (counter >5)?counter=0:counter++;
}
