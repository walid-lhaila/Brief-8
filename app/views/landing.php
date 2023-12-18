<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/brief8/app/Models/repositories/datacnx.php");
require_once ($_SERVER["DOCUMENT_ROOT"]."/brief8/app/config/config.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    
<header>
        <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-cyan-800">
        <div>
    <header x-data="{ open: false }" class="bg-cyan-800 shadow-lg shadow-cyan-800">
      <div class="max-w-7xl mx-auto px-2 sm:px-4 lg:divide-y lg:divide-gray-700 lg:px-8">
        <div class="relative h-16 flex justify-between">
          <div class="relative z-10 px-2 flex lg:px-0">
            <div class="flex-shrink-0 flex items-center">
            <img class="hidden lg:block h-14 w-14" src="<?= PUBLICROOT?>/img/unnamed-removebg-preview.png">
            </div>
          </div>
          <div class="relative z-0 flex-1 px-2 flex items-center justify-center sm:absolute sm:inset-0">
            <div class="w-full sm:max-w-xs">
              <label for="search" class="sr-only">Search</label>
              <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 pl-3 flex items-center">
                  <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
                </div>
                <input id="search" name="search" class="block w-full bg-cyan-900 border border-transparent rounded-md py-2 pl-10 pr-3 text-sm placeholder-gray-400 focus:outline-none focus:bg-white focus:border-white focus:ring-white focus:text-gray-900 focus:placeholder-gray-500 sm:text-sm" placeholder="Search" type="search">
              </div>
            </div>
          </div>
          <div class="relative z-10 flex items-center lg:hidden">
            <!-- Mobile menu button -->
            <button type="button" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
              <span class="sr-only">Open menu</span>
              <svg x-description="Icon when menu is closed.
  
  Heroicon name: outline/menu" x-state:on="Menu open" x-state:off="Menu closed" class="block h-6 w-6" :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
  </svg>
              <svg x-description="Icon when menu is open.
  
  Heroicon name: outline/x" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6" :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
  </svg>
            </button>
          </div>
          <div class="hidden lg:relative lg:z-10 lg:ml-4 lg:flex lg:items-center">
            <a href="login.php"><h1 class="text-gray-200 font-bold text-lg hover:text-orange-600 duration-700">LOG IN</h1></a>
        </div>

          
        </div>
        <nav class="hidden lg:py-2 lg:flex lg:space-x-8" aria-label="Global">
          
            <a href="#" class="hover:bg-orange-600 text-white duration-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
              HOME
            </a>
          
            <a href="#" class="text-white hover:bg-orange-600 hover:text-white duration-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
              ABOUT US
            </a>
          
            <a href="#" class="text-white hover:bg-orange-600 hover:text-white duration-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
              FAQ
            </a>
          
            <a href="#" class="text-white hover:bg-orange-600 hover:text-white duration-500 rounded-md py-2 px-3 inline-flex items-center text-sm font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">
              FOOTER
            </a>
          
        </nav>
      </div>
  
      <nav x-description="Mobile menu, show/hide based on menu state." class="lg:hidden" aria-label="Global" id="mobile-menu" x-show="open">
        <div class="pt-2 pb-3 px-2 space-y-1">
          
            <a href="#" class="bg-gray-900 text-white block rounded-md py-2 px-3 text-base font-medium" aria-current="page" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-gray-900 text-white&quot;, Default: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Dashboard</a>
          
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Team</a>
          
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Projects</a>
          
            <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md py-2 px-3 text-base font-medium" x-state-description="undefined: &quot;bg-gray-900 text-white&quot;, undefined: &quot;text-gray-300 hover:bg-gray-700 hover:text-white&quot;">Calendar</a>
          
        </div>
        <div class="border-t border-gray-700 pt-4 pb-3">
          <div class="px-4 flex items-center">
            <div class="flex-shrink-0">
              <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
            </div>
            <div class="ml-3">
              <div class="text-base font-medium text-white">Tom Cook</div>
              <div class="text-sm font-medium text-gray-400">tom@example.com</div>
            </div>
            <button type="button" class="ml-auto flex-shrink-0 bg-gray-800 rounded-full p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">View notifications</span>
              <svg class="h-6 w-6" x-description="Heroicon name: outline/bell" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
  </svg>
            </button>
          </div>
          <div class="mt-3 px-2 space-y-1">
            
              <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
            
              <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
            
              <a href="#" class="block rounded-md py-2 px-3 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
            
          </div>
        </div>
      </nav>
    </header>
  
    </div>
    </header>

                                        <!-- HEADER SECTION -->

    <section class="bg-white mt-10 ">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl ">Payments tool for software companies</h1>
                <p class="max-w-2xl mb-6 font-light  lg:mb-8 md:text-lg lg:text-xl ">From checkout to global sales tax compliance, companies around the world use Flowbite to simplify their payment stack.</p>
                <a href="#" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center  rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="inline-flex items-center justify-center px-5 py-2 text-base font-medium text-center  border border-gray-300 bg-cyan-800 text-white rounded-lg hover:text-black duration-700 focus:ring-4 focus:ring-gray-100 dark:border-gray-700 dark:hover:bg-white  dark:focus:ring-gray-800">
                    Speak to Sales
                </a> 
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                
                <img class="h-auto max-w-lg transition-all duration-300 rounded-lg cursor-pointer filter grayscale hover:grayscale-0" src="<?= PUBLICROOT?>/img/3082dd40cdbe3ce2a85c3d8ad661ddc0.gif" alt="image description">

            </div>                
        </div>
    </section>

    
                                    <!-- NEWSLETTER SECTION -->
<div id="nwesletter" class="mt-20">
    <div class="flex flex-col justify-center font-bold items-center text-3xl">
        <h1>NEWSLETTER</h1>
        <div class="bg-gray-900 w-48  h-[1px]"></div>
    </div>
    
    
    <div class="max-w-7xl mx-auto py-12 sm:px-6 lg:px-8 ">
      <div class="max-w-3xl mx-auto">
        
  <div class="bg-white shadow-lg sm:rounded-2xl">
    <div class="px-4 py-5 sm:p-6">
      <h3 class="text-lg leading-6 font-medium text-gray-900">
        Update your email
      </h3>
      <div class="mt-2 max-w-xl text-sm text-gray-500">
        <p>
          Change the email address you want associated with your account.
        </p>
      </div>
      <form class="mt-5 sm:flex sm:items-center">
        <div class="w-full sm:max-w-xs">
          <label for="email" class="sr-only">Email</label>
          <input type="email" name="email" id="email" class="shadow-sm  focus:ring-indigo-500 h-10 w-[546px] px-5 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com">
        </div>
        <button type="submit" class="mt-3 ml-[266px] w-full inline-flex items-center justify-center px-4 py-2 border  shadow-sm font-medium rounded-md border-1 border-black text-white bg-cyan-800 hover:bg-white hover:text-black duration-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Save
        </button>
      </form>
    </div>
  </div>

      </div>
    </div>
  </div>



                                    <!-- ABOUT SECTION -->


<div id="about" class="bg-white py-24 sm:py-32 mt-18">

    <div class="flex flex-col justify-center font-bold items-center text-3xl">
        <h1>ABOUT US</h1>
        <div class="bg-gray-900 w-48  h-[1px]"></div>
    </div>

    <div class="mx-auto grid max-w-7xl gap-[650px]   px-6 lg:px-8 xl:grid-cols-3 mt-20">
        <div class="max-w-2xl w-[380px]">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Meet our leadership</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">Libero fames augue nisl porttitor nisi, quis. Id ac elit odio vitae elementum enim vitae ullamcorper suspendisse.</p>
        </div>
        <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
        <li>
            <div class="flex items-center gap-x-6">
            <img class="h-16 w-16 rounded-full" src="<?= PUBLICROOT?>/img/816-1696616296.jpg" alt="">
            <div>
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Soufian Najim</h3>
                <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
            </div>
            </div>
        </li>

        <li>
            <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="<?= PUBLICROOT?>/img/819-1696616128.jpg" alt="">
                <div>
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Abelouahed Senane</h3>
                <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
            </div>
            </li>

            <li>
            <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="<?= PUBLICROOT?>/img/996-1696616120.jpg" alt="">
                <div>
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Abdelaziz Chemmam</h3>
                <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
            </div>
            </li>

            <li>
            <div class="flex items-center gap-x-6">
                <img class="h-16 w-16 rounded-full" src="<?= PUBLICROOT?>/img/825-1696616239.jpg" alt="">
                <div>
                <h3 class="text-base font-semibold leading-7 tracking-tight text-gray-900">Mohamed Joual</h3>
                <p class="text-sm font-semibold leading-6 text-indigo-600">Co-Founder / CEO</p>
                </div>
            </div>
            </li>
    
        <!-- More people... -->
        </ul>
    </div>
    </div>



                        <!--FOOOTER SECTION-->

    

<footer id="footer" class="bg-white dark:bg-cyan-800">
    <div class="mx-auto w-full max-w-screen-xl">
      <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class=" hover:underline">About</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Careers</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Brand Center</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Blog</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Help center</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">Discord Server</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Twitter</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Facebook</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Contact Us</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Licensing</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
            </ul>
        </div>
        <div>
            <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Download</h2>
            <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                    <a href="#" class="hover:underline">iOS</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Android</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">Windows</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="hover:underline">MacOS</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="px-4 py-6 bg-gray-100 dark:bg-cyan-800 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 dark:text-gray-300 sm:text-center">© 2023 <a href="https://flowbite.com/">CIH BANK™</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 sm:justify-center md:mt-0 space-x-5 rtl:space-x-reverse">
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 18">
                        <path d="M18 13.446a3.02 3.02 0 0 0-.946-1.985l-1.4-1.4a3.054 3.054 0 0 0-4.218 0l-.7.7a.983.983 0 0 1-1.39 0l-2.1-2.1a.983.983 0 0 1 0-1.389l.7-.7a2.98 2.98 0 0 0 0-4.217l-1.4-1.4a2.824 2.824 0 0 0-4.218 0c-3.619 3.619-3 8.229 1.752 12.979C6.785 16.639 9.45 18 11.912 18a7.175 7.175 0 0 0 5.139-2.325A2.9 2.9 0 0 0 18 13.446Z"/>
                    </svg>
                  <span class="sr-only">Phone page</span>
              </a>
            <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
              <a href="#" class="text-gray-400 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
        </div>
      </div>
    </div>
</footer>

</body>
</html>