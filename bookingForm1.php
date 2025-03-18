<?php
include 'sendMail.php';
if(!isset($_COOKIE['userid']))
    header("location:login.php");
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST")
{


    $app_date = $_POST['ap-date'];
    $app_time = $_POST['ap-time'];
    $department_name = $_POST['deparment-name'];
    $mobile_no = $_POST['mobile-no'];
    $booker_name = $_POST['booker-name'];
    $reason = $_POST['reason'];

    $u_id = $_COOKIE['userid'];
    $status = "pending";
    
$sql = "SELECT * FROM bookings1 WHERE b_date= '$app_date' AND b_time='$app_time' AND status='Approved'";

$result = mysqli_query($conn,$sql);
if($result)
{
    if(mysqli_num_rows($result)>=1)
    {
        echo '<div class="success-msg py-2 px-4 bg-red-300 text-red-700 rounded-md w-fit fixed top-24 left-1/2 translate-x-[-50%] translate-y-[-50%]">
        <p>
        <i data-feather="calendar" class="inline"></i>'.$app_date.' is Already Booked at '.$app_time.' please choose another slot <i data-feather="check-circle" class="inline"></i>
        </p>
        <a href="user/dashboard1.php" >Check All Bookings Here <i data-feather="chevron-right" class="inline"></i></a>
        </div>';

    }
    else
    {
        $sql = "INSERT INTO `bookings1`(`b_date`, `b_time`, `department_name`, `b_mobile_no`, `b_booker_name`, `b_reason`, `status`, `U_Id`,`b_request`) VALUES ('$app_date','$app_time','$department_name','$mobile_no','$booker_name','$reason','$status','$u_id',CURRENT_TIMESTAMP())";

        $result = mysqli_query($conn,$sql);
        if($result)
        {
            // sending mail to the admin
            $url ="https://google.com";
            $bodyinfotable = '<table style="border-collapse: collapse; width: 100%;">
                <caption>Seminar Hall Enquriey</caption>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px; background-color: #f9f9f9; white-space: nowrap;">User Account</th>
              <td style="border: 1px solid #ddd; padding: 8px;">'.$_COOKIE['useremail'].'</td>
            </tr>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px; background-color: #f9f9f9; white-space: nowrap;">Booker Name</th>
              <td style="border: 1px solid #ddd; padding: 8px;">'.$booker_name.'</td>
            </tr>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px; background-color: #f9f9f9; white-space: nowrap;">Department</th>
              <td style="border: 1px solid #ddd; padding: 8px;">'.$department_name.'</td>
            </tr>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px; background-color: #f9f9f9; white-space: nowrap;">Reason for Booking</th>
              <td style="border: 1px solid #ddd; padding: 8px; font-weight: bold;">'.$reason.'</td>
            </tr>
            <tr>
              <th style="border: 1px solid #ddd; padding: 8px; background-color: #f9f9f9; white-space: nowrap;">Action</th>
              <td style="border: 1px solid #ddd; padding: 8px;">
                <a href="'.$url.'" style="color: #3498db; text-decoration: none;">Approve/Reject</a>
              </td>
            </tr>
          </table>
          
          
          ';
            sendMail($bodyinfotable,"seminarhall.tccollege.org","villandark420@gmail.com","Hall Request pending");
            header("location:requestPending.php");
        }
        else
            echo "query Error";
    }

    
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/styles.css">
         
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <form method="post" class="bg-gray-100 min-h-screen lg:grid grid-cols-[70%_70%]">
        <div class="main-form p-2">
            <!-- section 1 -->
            <div class="section-1 my-4 p-2 bg-white rounded-md">
                <div class="select-slot flex items-center">
                </div>

                <div class="px-4 py-2 pb-4 select-date border-b-2">
                    <div class="flex items-center gap-2">
                        <h2 class="font-semibold capitalize text-lg">Select Date</h2>
                        <input type="date" name="ap-date" id="selectedDate" min="">
                         <p id="displayDate" class="text-gray-500 capitalize"></p>
                </div>

            <div class="date-week flex items-center flex-wrap gap-4 mt-4">
        
             </div>
</div>

                <div class="px-4 py-2 select-time">
                    <div class="flex items-center gap-2">
                        <h2 class="capitalize text-lg">select time</h2>
                       
                           
                            <div class="customize-time hidden absolute bg-gray-50 rounded-md left-0 top-10 shadow overflow-hidden transition-all">
                               <!-- this first lapse is emtpy because its index is zero -->
                                <p class="select-lapse-container"> <span class="select-lapse"></span></p>
                                
                                <p class="select-lapse-container uppercase py-2 px-[27px] rounded-md cursor-pointer text-black transition bg-gray-200"><span class="select-lapse">1</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">2</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">3</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">4</span> hr</p>
                                <p class="select-lapse-container text-gray-500 uppercase py-2 px-[27px] rounded-md cursor-pointer hover:text-black transition hover:bg-gray-200 flex items-center"><span class="select-lapse">5</span> hr</p>
                            </div>
                        </div>
                
                    <div class="flex items-center flex-wrap gap-4 mt-4">
                        
                       
                        <label for="time-2" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <h3 class="time-label font-semibold text-lg uppercase">09-10 am</h3>
                            <input type="radio" name="ap-time" id="time-2" class="hidden input-time">
                        </label>
                        <label for="time-3" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">10-11 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-3" class="hidden input-time">
                        </label>
                        <label for="time-4" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">11-12 am</h3>
                            
                            <input type="radio" name="ap-time" id="time-4" class="hidden input-time">
                        </label>
                        <label for="time-5" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">12-01 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-5" class="hidden input-time">
                        </label>
                        <label for="time-6" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">01-02 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-6" class="hidden input-time">
                        </label>
                        <label for="time-7" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">02-03 pm</h3>
                            <input type="radio" name="ap-time" id="time-7" class="hidden input-time">
                        </label>
                        <label for="time-8" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">03-04 pm</h3>
                            <input type="radio" name="ap-time" id="time-8" class="hidden input-time">
                        </label>
                        <label for="time-6" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">04-05 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-6" class="hidden input-time">
                        </label>
                        <label for="time-7" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">05-06 pm</h3>
                            <input type="radio" name="ap-time" id="time-7" class="hidden input-time">
                        </label>
                        <label for="time-8" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">06-07 pm</h3>
                            <input type="radio" name="ap-time" id="time-8" class="hidden input-time">
                        </label>
                        <label for="time-9" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">04-05 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-9" class="hidden input-time">
                        </label>
                        <label for="time-10" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">05-06 pm</h3>
                            <input type="radio" name="ap-time" id="time-10" class="hidden input-time">
                        </label>
                        
                    
                        <label for="time-12" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                            <h3 class="time-label font-semibold text-lg uppercase">09-11 am</h3>
                            <input type="radio" name="ap-time" id="time-12" class="hidden input-time">
                        </label>
                        <label for="time-13" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">11-01 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-13" class="hidden input-time">
                        </label>
                        <label for="time-14" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">01-03 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-14" class="hidden input-time">
                        </label>
                        <label for="time-15" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">03-05 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-15" class="hidden input-time">
                        </label>
                        <label for="time-16" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">09-12 pm</h3>
                            
                            <input type="radio" name="ap-time" id="time-16" class="hidden input-time">
                        </label>
                        <label for="time-17" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">12-03 pm</h3>
                            <input type="radio" name="ap-time" id="time-17" class="hidden input-time">
                        </label>
                        <label for="time-18" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">03-06 pm</h3>
                            <input type="radio" name="ap-time" id="time-18" class="hidden input-time">
                        </label>
                        <label for="time-19" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">09-01 pm</h3>
                            <input type="radio" name="ap-time" id="time-19" class="hidden input-time">
                        </label>
                        <label for="time-20" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">01-05 pm</h3>
                            <input type="radio" name="ap-time" id="time-20" class="hidden input-time">
                        </label>
                        <label for="time-21" class="time-box cursor-pointer px-6 py-2 rounded-md border-2 border-gray-400">
                         <h3 class="time-label font-semibold text-lg uppercase">Full day</h3>
                            <input type="radio" name="ap-time" id="time-21" class="hidden input-time">
                        </label>
                      

                    </div>

                </div>

            </div>
            <!-- section2 -->
            <div class="setion-2 p-2 bg-white rounded-md my-4">
                <div class="sec-2-sub px-4 py-2 flex gap-4">
                    <i class="fa-solid fa-school text-paymentReqPrimaryClr"></i>
                    <div class="text-all-sise">
                        <h3 class="capitalize text-lg">department name <span class="text-red-500">*</span></h3>
                        <p class="text-gray-400">Enter Deparment name</p>
                        <input name="deparment-name" type="text" class="popup-inputs border-2 rounded-md px-3\
                         py-2 sm:w-100" id="department" placeholder="eg. Computer Science" required>
                        <div id="departments-popup" class="allPopUps hidden bg-gray-100 rounded-md max-w-80">
                          </div>
                    </div>
                </div>
                <div class="sec-2-sub px-4 py-2 flex gap-4">
                    <i class="text-blue-700" data-feather="phone"></i>
                    <div class="text-all-sise">
                        <h3 class="capitalize text-lg">mobile number <span class="text-red-500">*</span></h3>
                        <p class="text-gray-400">Enter the number on which you want to receive checkup related information.</p>
                        <input name="mobile-no" type="text
                        " class="border-2 rounded-md px-3 py-2 sm:w-100" placeholder="10 digit number" maxlength="10" required>
                    </div>
                </div>
            </div>
        <!--section 3 -->
        <div class="setion-2 p-2 bg-white rounded-md my-4">
            <div class="sec-2-sub px-4 py-2 flex gap-4">
                <i class="fa-regular fa-user text-2xl"></i>
                <div class="text-all-sise">
                    <h3 class="capitalize text-lg">booking name <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400">To identify the user .</p>
                    <input name="booker-name" type="text" class="border-2 rounded-md px-3 py-2 sm:w-100" placeholder="Yash Bhosale" required>
                </div>
            </div>
            <div class="sec-2-sub px-4 py-2 flex gap-4">
                <i class="text-red-500" data-feather="alert-triangle"></i>
                <div class="text-all-sise">
                    <h3 class=" text-lg">Reason for want Seminar hall <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400">Avoid falsy reason.</p>
                    <input name="reason" type="text" class=" border-2 rounded-md px-3 py-2 sm:w-100" placeholder="eg. for Cultural Fest">
                    <div class="allPopUps reasons-popup hidden bg-gray-100 rounded-md">
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">Cultural Fest</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">school function</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">annual function</p>
                        <p class="reasons line-clamp-1 py-2 px-4 rounded-md cursor-pointer hover:bg-gray-300 capitalize">private meetings</p>
                    </div>
                    
                </div>
            </div>
            <button type="submit" class="pay-button capitalize py-3 w-full font-semibold text-white bg-black rounded-md hover:bg-gray-700 transition"> <i data-feather="credit-card" class="inline-block"></i> request hall</button>

        </div>
        <!--  -->

        </div>
        <!-- booking details -->
        <div class="sm:w-[100%]">
       <div class=middle> <img src="assets/cutmlogo.png" class="relative z-  w-[43%] h-[50%] object-cover" alt="" /></div>
        <!-- help us -->
        <div class="conatct-us px-2 py-2 flex gap-4 bg-white m-2 rounded-md">
            <i class="text-blue-700 w-8 h-8" data-feather="users"></i>
            <div class="text-all-sise">
                <h3 class="capitalize text-lg">we can help you</h3>
                <p class="text-gray-400">call us <a class="text-blue-600" href="tel:+917989288704">+917989288704</a> or chat with our customer support team.</p>
                <a href="#" class="mt-2 px-6 py-2 block border-2 text-blue-700 border-blue-700 rounded-md w-fit">Contact us</a>
            </div>
        </div>
    </div>
    </form>
</body>

<script>
    // Set the minimum date to today's date
    const today = new Date().toISOString().split('T')[0];
    const dateInput = document.getElementById('selectedDate');
    dateInput.setAttribute('min', today);

    const displayDate = document.getElementById('displayDate');

    // Display the selected date in the desired format
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const options = { weekday: 'short', day: '2-digit', month: 'long', year: 'numeric' };
        const formattedDate = selectedDate.toLocaleDateString('en-US', options);
        displayDate.textContent = `Selected Date: ${formattedDate}`;
    });
</script>
<script>
    feather.replace();
  </script>
  <script src="scripts/tailwind.js"></script>
  <script src="scripts/selectedDateStyling.js"></script>
  <script src="scripts/settingDayAndDate.js"></script>
  <script src="scripts/toggleCustomizeTime.js"></script>
  <script src="scripts/TimeLapse.js"></script>
  <script src="scripts/selectedTimeStyling.js"></script>
  <script src="admin/ajax/getDeparment.js"></script>
  <script src="scripts/selectPopupValues.js"></script>
</html>