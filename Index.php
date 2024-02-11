<?php
if (isset($_POST["btnsubmit"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connection
    $con = mysqli_connect("localhost", "root", "");
    // Select database
    mysqli_select_db($con, "quickdone");

    // Updated SQL query to retrieve User_type
    $sql = "SELECT User_id, Re_password, User_Type FROM logint WHERE User_id ='$username'";

    $result = mysqli_query($con, $sql) or die("error insert");

    if ($row = mysqli_fetch_array($result)) {
        // Check password
        if ($row['Re_password'] === $password) {
            $userType = $row['User_Type'];

            // Successful login
            session_start();
            // Debugging output

            if ($userType === 'E') {
                // Employee login
                $_SESSION["un"] = $username;
                $_SESSION["ll"] = time();
                header("Location: ./EmDash.php");
            } elseif ($userType === 'C') {
                // Customer login
                $_SESSION["un"] = $username;
                $_SESSION["ll"] = time();

                // Get customer information

                header("Location: ./2nd.php");
            } else {
                // Invalid user type
                echo "Invalid user type";
            }
        } else {
            // Invalid password
            echo "Invalid password";
        }
    } else {
        // Invalid username
        echo "Invalid username";
    }

    // Disconnect
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="output.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <script src="javaScript/index.js"></script>

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
    </style>
</head>




<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">QuickDone</span>
            </a>
            <div class="flex md:order-2 space-x-3 md:space-x-2  rtl:space-x-reverse">
                <button type="button" onclick="togglePopup()" class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2  text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 ">Login</button>
                <div class="relative inline-block text-left">
                    <button type="button" onclick="toggleDropdown()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register
                    </button>
                    <div id="dropdown" class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                            <button onclick="location.href='Register.php'" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Customer Register</button>
                            <button onclick="location.href='Employeereg.php'" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">Employee Register</button>
                        </div>
                    </div>
                </div>

                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="about_link">About</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700" id="ser">Services</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 px-3 md:p-0 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br><br>

    <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center filter blur-xs  h-55% pt-64 text-white py-24 px-10 object-fill" style="background-image: url(https://img.freepik.com/free-photo/we-are-hiring-digital-collage_23-2149667063.jpg?w=1380&t=st=1706435290~exp=1706435890~hmac=ee334ea64cde6b86fed592bca9b381265fd6c46a9ff0d27c79775711222e5735)">
            <div class="md:w-1/2">
                <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Join Us</a>
            </div>
        </div> <!-- container -->
        <br>
    </div>
    <div class="container mx-auto mt-10 text-center ">

        <div id="popup" class="overlay">
            <div class="popup">
                <button class="relative ml-[323px] -mt-[27px] p-4 text-gray-500" onclick="togglePopup()">
                    <!-- SVG close icon -->
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <!-- Your registration form goes here -->
                <h2 class="text-2xl font-bold mb-4">LOGIN</h2><br>
                <form class="" action="#" method="post">
                    <!-- Your form fields go here -->
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label><br>
                        <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label><br>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded">
                    </div><br>
                    <button type="submit" name="btnsubmit" class="bg-green-500 text-white px-4 py-2 rounded">Login</button>

                </form>
                <!-- Close button -->

            </div>
        </div>
    </div>
    </div>
    <br><br><br><br>

    <section id="about" class="bg-gray-100 py-12">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="text-5xl font-bold mb-6">
                    <span class="text-gray-800">About</span>
                    <span class="text-blue-500">Us</span>
                </div>
                <p class="text-lg text-gray-600 mb-12">
                    At Quick Done, we understand that building a successful team is paramount to achieving organizational goals. Our Employer Hiring System is designed to streamline and simplify your recruitment process, providing you with the tools you need to find the best talent for your team </p>
                <div class="flex flex-col md:flex-row items-center justify-center space-y-4 md:space-y-0 md:space-x-4">
                    <div class="flex flex-col items-center">
                        <img src="" class="w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Shawindu Madushan</h3>
                        <p class="text-gray-600">CEO and Founder</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="https://example.com/person2.jpg" class="w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Yuvani Karunarathna</h3>
                        <p class="text-gray-600">COO and Co-Founder</p>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="https://example.com/person3.jpg" class="w-32 h-32 rounded-full object-cover mb-4">
                        <h3 class="text-lg font-bold text-gray-800">Oshani Malka</h3>
                        <p class="text-gray-600">CTO and Co-Founder</p>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br>

    <section id="servise" class="bg-gray-100 py-12">
        <div class="container mx-auto">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="text-5xl font-bold mb-6">
                    <span class="text-gray-800">Our</span>
                    <span class="text-blue-500">Services</span>
                </div>
                <p class="text-lg text-gray-600 mb-12">
                    "Unlock the best hiring experience for both employers and customers! Discover the efficiency of completing your tasks swiftly with QuickDone. Your work, done quickly and efficiently – that's the QuickDone promise!" </p>
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-4xl text-blue-500">
                                    <i class="fas fa-cog"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 ml-4">Find the Right People Easily </h3>
                            </div>
                            <p class="text-gray-600">
                                What We Do: We help you find the best people for your job without any hassle. We look for candidates from different places and make sure they are a good fit for your needs.
                                Why It Helps: Saves you time by finding qualified candidates quickly. </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-4xl text-blue-500">
                                    <i class="fas fa-cloud"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 ml-4"> User-Friendly Hiring Dashboard</h3>
                            </div>
                            <p class="text-gray-600">
                                What We Do: We provide a simple dashboard where you can see all your job postings, applications, and communication with candidates in one place. It's an easy way to manage your hiring process.
                                Why It Helps: Keeps your hiring process organized, making it easy for you to track and manage your interactions with potential employees. </p>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 px-4 mb-8">
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex items-center mb-4">
                                <div class="text-4xl text-blue-500">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 ml-4">Efficient Job Posting</h3>
                            </div>
                            <p class="text-gray-600">
                            Quickly create and post job openings to attract suitable candidates, saving time in the hiring process.                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br>
    <footer class="bg-white dark:bg-gray-900  ">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8 ">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">QuickDone</span>
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
<script>
    const aboutLink = document.getElementById('about_link');
    const aboutSection = document.getElementById('about');

    aboutLink.addEventListener('click', (e) => {
        e.preventDefault();
        aboutSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    });
</script>
<script>
    const serv = document.getElementById('ser');
    const ser = document.getElementById('servise');

    serv.addEventListener('click', (e) => {
        e.preventDefault();
        ser
            .scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
    });
</script>


</html>