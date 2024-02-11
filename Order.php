<?php

if (isset($_POST["userid"])) {
    $Uid = $_POST["userid"];
    $Name = $_POST["username"];
    $Address = $_POST["Address"];
    $Fault = $_POST["Fault"];
    $price = $_POST["pricee"];
    $Date = $_POST["Date"];

    session_start();
    $CUid = $_SESSION["un"];

    // Connection
    $conn = mysqli_connect("localhost", "root", "");

    // Select database
    mysqli_select_db($conn, "quickdone");

    // Insert into logint table

    $sql = "INSERT INTO orderr(Employee_Id,Customer_Id,Customer_Name,Address,Discription,Price,Order_Date) VALUES ('$Uid','$CUid','$Name','$Address','$Fault',$price,'$Date')";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));  // Improved error handling

    // Close connection
    mysqli_close($conn);

    // Redirect to a different page
    header("Location: http://localhost/quickDone/quick/OrderStatus.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
     initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="javaScript/order.js"></script>

    <style>
        /* Add your custom styles here */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 400px;
            height: 450px;
        }

        .popuppp {

            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 700px;
            height: 750px;

        }
    </style>

</head>

<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="2nd.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">QuickDone</span>
            </a>

            <div class="flex md:order-2 space-x-3 md:space-x-2  rtl:space-x-reverse">
                <a href="OrderStatus.php">
                    <div>
                        <button class="bg-blue-500 text-white p-2 rounded ">View My Orders</button>
                    </div>
                </a>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>

                </ul>
            </div>

        </div>

    </nav><br>

    <h1 class="text-4xl font-bold text-center mx-auto mt-4 mb-4"> Place Your Order Here</h1><br><br>


    <div class="container mx-auto mt-10 text-center ">

        <div id="popupp" class="overlay">
            <div class="popup">
                <button class="relative ml-[323px] -mt-[27px] p-4 text-gray-500" onclick="togglePopupp()">
                    <!-- SVG close icon -->
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <!-- Your registration form goes here -->
                <h2 class="text-2xl font-bold mb-2">Employee Details</h2><br>
                <form class="" action="#" method="post">
                    <!-- Your form fields go here -->
                    <div class="mb-2">
                        <label for="userId" class="block text-gray-700 text-sm font-bold mb-2">UserId:</label>
                        <input type="text" id="useid" name="use" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="password" id="name" name="name" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">NIC Number:</label>
                        <input type="password" id="NIC" name="NIC" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div class="mb-2">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="password" id="email" name="password" class="w-full px-3 py-2 border rounded">
                    </div>


                </form>
                <!-- Close button -->

            </div>
        </div>
    </div>
    <div class="container mx-auto mt-10 text-center ">

        <div id="pop" class="overlay">
            <div class="popuppp">
                <button class="relative ml-[323px] -mt-[27px] p-4 text-gray-500" onclick="togglePopu()">
                    <!-- SVG close icon -->
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <!-- Your registration form goes here -->
                <h2 class="text-2xl font-bold mb-2">Order Details</h2><br>
                <form class="" action="#" method="post">
                    <!-- Your form fields go here -->
                    <label for="">Employee Id</label><br>
                    <div class="mb-2">
                        <input type="text" id="userId" name="userid" class="w-5/6 px-3 py-2 border rounded">
                    </div><br><br>

                    <div class="mb-2">
                        <input type="text" id="us" name="username" class="w-5/6 px-3 py-2 border rounded">
                    </div>
                    <div class="mb-2">
                        <textarea name="Address" id="" cols="30" placeholder="Enter Your Address" rows="10" class="h-20 w-5/6"></textarea>
                    </div>
                    <div class="mb-2">
                        <textarea name="Fault" id="" cols="30" placeholder="Enter Small Discription About Your Fault" rows="10" class="h-20 w-5/6"></textarea>
                    </div>
                    <label for="">Employee Cost Rupee</label>
                    <div class="mb-2">
                        <input type="text" id="price" name="pricee" class="w-5/6 px-3 py-2 border rounded">
                    </div><br><br>
                    <label for="">Current Date</label><br>
                    <div class="mb-2">
                        <input type="text" id="Date" name="Date" class="w-5/6 px-3 py-2 border rounded">
                    </div><br>
                    <button type="submit" name="btnsubmit" class="bg-green-500 text-white px-4 py-2 rounded">conferm Order</button>


                </form>
                <!-- Close button -->

            </div>
        </div>
    </div>
    <div class="container mx-auto mt-10 text-center  ">

        <div id="popup" class="overlay">
            <div class="popup">
                <button class="relative ml-[323px] -mt-[27px] p-4 text-gray-500" onclick="togglePo()">
                    <!-- SVG close icon -->
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <p class="bg-green-200 text-green-800 border-l-4 border-green-500 p-4 rounded-md shadow-md">YOUR ORDER IS CONFIRMED AND EMPLOYEE WILL ARRIVE AT YOUR DOOR WITHIN 30 MINUTES</p><br><br>
                <div class="countdown-container justify-items-center">
                    <p id="countdown" class="text-xl font-bold"></p>
                </div>
            </div>


        </div>
    </div>



    <form id="searchForm" method="post">
        <div class="flex space-x-4">
            <!-- First Select Dropdown -->
            <div class="relative">
                <select name="location" id="locationn" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500">
                    <option value="">Select your distric</option>
                    <option value="Galle">Galle</option>
                    <option value="Tangalle">Tangalle</option>
                    <option value="Galle">Matara</option>
                    <option value="Tangalle">Hambanthota</option>
                    <option value="Tangalle">Kandy</option>
                    <option value="Tangalle">NuwaraEliya</option>


                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9 11l3 3m0 0l3-3m-3 3V6"></path>
                    </svg>
                </div>
            </div>

            <!-- Second Select Dropdown -->
            <div class="relative">
                <select name="job" id="jobb" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-blue-500">
                    <option value="">Select JobRole</option>
                    <option value="Electretion">Electretion</option>
                    <option value="Plumber">Plumber</option>
                    <option value="Guardner">Guardner</option>
                    <option value="Builder">Builder</option>
                    <option value="Mechanic">Mechanic</option>
                    <option value="Babysitter">Babysitter</option>
                    <option value="Driver">Driver</option>
                    <option value="Cleaner">Cleaner</option>
                    <option value="Chef">Chef</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9 11l3 3m0 0l3-3m-3 3V6"></path>
                    </svg>
                </div>
            </div>

            <!-- Search Button -->
            <button type="submit" name="btnsubmit" class="bg-blue-500 text-white p-2 rounded">
                Search in Database
            </button>
        </div>

    </form>
    <br><br>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b"> User_Id </th>
                    <th class="py-2 px-4 border-b"> Address </th>
                    <th class="py-2 px-4 border-b"> Location </th>
                    <th class="py-2 px-4 border-b"> JobRole </th>
                    <th class="py-2 px-4 border-b"> Price Rupee </th>
                    <th class="py-2 px-4 border-b"> Perchase </th>
                    <th class="py-2 px-4 border-b"> View details </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['btnsubmit'])) {
                    // Assuming $Lodata and $Rodata are defined based on your form data
                    $Lodata = isset($_POST['location']) ? $_POST['location'] : '';
                    $Rodata = isset($_POST['job']) ? $_POST['job'] : '';


                    $conn = mysqli_connect("localhost", "root", "", "quickdone");

                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    $sql = mysqli_query($conn, "SELECT * FROM services WHERE Location ='$Lodata' AND JobRole ='$Rodata'");
                    $num = mysqli_num_rows($sql);

                    if ($num > 0) {
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($sql)) {
                ?>
                            <tr>
                                <td class="py-2 px-4 border-b"><?php echo $row['User_Id']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['EAddress']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['Location']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['JobRole']; ?></td>
                                <td class="py-2 px-4 border-b"><?php echo $row['Price']; ?></td>
                                <td class="py-2 px-4 border-b">
                                    <button type="submit" name="btns" class="bg-blue-500  hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="togglePopu();getUserId(document.getElementById('userId'), this.parentNode.parentNode);getPrice(document.getElementById('price'), this.parentNode.parentNode)">
                                        Button
                                    </button>
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="togglePopupp();getUserId(document.getElementById('useid'), this.parentNode.parentNode);">
                                        Button
                                    </button>
                                </td>

                            </tr>
                <?php
                            $cnt = $cnt + 1;
                        }
                    }
                    mysqli_close($conn); // Close the connection
                }
                ?>

            </tbody>
        </table>
    </div><br><br><br><br><br><br><br><br><br>
    <footer class="bg-white dark:bg-gray-900  ">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 ">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="https://flowbite.com/" class="flex items-center">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">QuickDone™</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                      
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Facebook</a>
                            </li>
                            <li>
                                <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Twitter</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">QuickDone™</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Dribbble account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>