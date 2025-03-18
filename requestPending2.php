<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
  <header>
 
  </header>


    <!-- main msg -->
    <div class="main-container sm:grid grid-cols-2 place-items-center px-14">
      <div class="main-container-title">
        <h2 class="capitalize font-bold text-4xl">your request send succesfully</h2>
        <p class="text-gray-500 mt-4 text-lg">Your request will be pending we will send your request status on your Mail.</p>
        <p class="text-gray-500 mb-6 text-lg">You can also track your request in your Dashboard.</p>
        
        <div class="progress-bar grid grid-cols-1 mb-4">
          <div class="bg-paymentReqPrimaryClr p-2 rounded-full after relative">
            <p class="absolute p-2 rounded-full bg-paymentReqPrimaryClr shadow top-[-11px] left-0">
              <i data-feather="check"></i>
            </p>
            <p class="absolute p-2 rounded-full bg-paymentReqPrimaryClr shadow top-[-11px] right-0">
              <i data-feather="check"></i>
            </p>
          </div>
        </div>

        <div class="progress-status-title flex items-center justify-between">
          <p class="text-gray-900 font-semibold">Hall requested</p>
          <p class="text-gray-900 font-semibold">Pending request</p>
        </div>

        <div class="action-btns flex items-center gap-4">
          <a href="user/dashboard2.php" class="back-home-btn my-4 capitalize text-lg px-8 py-2 border-2 rounded-lg block w-fit border-paymentReqPrimaryClr text-white bg-paymentReqPrimaryClr hover:bg-secondaryHoverBg hover:text-black transition-all duration-300 shadow">open dashboard</a>
          <a href="index.html" class="back-home-btn my-4 capitalize text-lg px-8 py-2 border-2 rounded-lg block w-fit border-paymentReqPrimaryClr text-paymentReqPrimaryClr hover:bg-secondaryHoverBg transition-all duration-300">back home</a>
        </div>
      </div>
      <!-- main title end -->
      <div class="main-container-img">
        <img src="assets/pending_request_img/pendingMail.jpg" class="w-full h-[450px]" alt="">
      </div>
    </div>
  </main>
</body>

<script>
    feather.replace();
  </script>
  <script src="scripts/tailwind.js"></script>
  
</html>