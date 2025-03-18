const departmentsPopup = document.getElementById('departments-popup');

// use callback function to handle the response after the AJAX request completes
function  fetchDepartments(inputValue,callback) {

    let arrayOp = Array();
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            // arrayOp.push(response);
            if(typeof response === "object")
            {
                Array.from(response).forEach(input=>{
                    arrayOp.push(input);
                })
                // console.log(arrayOp);
                callback(arrayOp);
            }
        } else if (xhr.readyState === 4) {
            console.error('Request failed with status:', xhr.status);
        }
    };
    const url = 'http://localhost/hallBooking/admin/ajax/fetchDepartments.php?inputValue='+inputValue;
    xhr.open('GET', url, true);
    xhr.send();
    return "use callback func";
}


const input= document.getElementById('department');
// list of all departments in the form of array 
 function listDepartment(inputValue) {    
        console.log(fetchDepartments(inputValue,(depts)=>{
            depts.forEach(dept=>{
                const li = document.createElement("li");
                li.className = "department-wrapper py-2 px-4 rounded-md cursor-pointer hover:bg-green-300 block";
                const p = document.createElement("p");
                p.innerHTML = dept;
                p.className = "department line-clamp-1 capitalize";
                li.appendChild(p);
                departmentsPopup.append(li);
            });
        }));
};
listDepartment(input.value);
