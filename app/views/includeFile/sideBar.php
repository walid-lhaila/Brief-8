<?php    
 require_once ($_SERVER["DOCUMENT_ROOT"]."/brief8/app/config/config.php"); 
?>
<div class="hidden lg:flex  lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex flex-col w-[56px] hover:w-[180px] transaction duration-700 flex-grow dark:bg-cyan-900 pt-5 pb-4  overflow-x-hidden 	" id="sidebar">
          <div class="flex items-center flex-shrink-0 px-4 gap-5">
            <img class="h-10 w-10 w-auto" src="<?= PUBLICROOT?>/img/unnamed-removebg-preview.png" alt="Bank logo">
            <h1 class="text-white font-bold text-xl" id="title">CIH</h1>
          </div>
          <nav class="mt-5 flex-1 flex flex-col divide-y divide-cyan-800 overflow-x-hidden" aria-label="Sidebar">
            <div class="px-2 space-y-1 mt-10">
              <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:text-white hover:bg-cyan-600" -->
              <a href="../adminDashbord.php" class="hover:bg-orange-600 text-white group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md" aria-current="page">
                <!-- Heroicon name: outline/home -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <div id="title">Home</div>
              </a>
    
              <a href="../bank/bank.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/clock -->
                
               <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 15V9m4 6V9m4 6V9m4 6V9M2 16h16M1 19h18M2 7v1h16V7l-8-6-8 6Z"/>
             </svg>
               <div  id="title">Bank</div> 
              </a>
    
              <a href="../agency/agency.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/scale -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                  <path d="M17 16h-1V2a1 1 0 1 0 0-2H2a1 1 0 0 0 0 2v14H1a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM5 4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4Zm0 5V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Zm6 7H7v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm2-7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Zm0-4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Z"/>
               </svg>
                <div  id="title">Agency</div>
              </a>
    
              <a href="../distributeur/distributeurs.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/credit-card -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
               <div  id="title">Distributeur</div> 
              </a>
    
              <a href="../user/user.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/user-group -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
               <div  id="title">Users</div> 
              </a>
    
              <a href="../account/account.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/document-report -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                  <path d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z"/>
                  </svg>
                <div  id="title">Account</div>
              </a>
  
              <a href="../transaction/transactions.php" class="text-white hover:text-white hover:bg-orange-600 group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md">
                <!-- Heroicon name: outline/document-report -->
                <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 14 3-3m-3 3 3 3m-3-3h16v-3m2-7-3 3m3-3-3-3m3 3H3v3"/>
                 </svg>
                <div  id="title">Transaction</div>
              </a>
            </div>
            <div class="mt-6 pt-6">
              <div class="px-2 space-y-1">
                <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-white hover:text-white hover:bg-orange-600">
                  <!-- Heroicon name: outline/cog -->
                  <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <div  id="title">Settings</div>
                </a>
    
                <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-white hover:text-white hover:bg-orange-600">
                  <!-- Heroicon name: outline/question-mark-circle -->
                  <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                   <div  id="title">Help</div>
                </a>
    
                <a href="#" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-white hover:text-white hover:bg-orange-600">
                  <!-- Heroicon name: outline/shield-check -->
                  <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                  </svg>
                  <div  id="title">Privacy</div>
                </a>
              </div>
            </div>
  
            <div class="mt-6 pt-6 ">
              <div class="px-2 space-y-1">
                <a href="../landing.php" class="group flex items-center px-2 py-2 text-sm leading-6 font-medium rounded-md text-white hover:text-white hover:bg-red-600">
                  <!-- Heroicon name: outline/cog -->
                  <svg class="mr-4 flex-shrink-0 h-6 w-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                 </svg>
                  <div  id="title">Logout</div>
                </a>
    
                
              </div>
            </div>
  
          </nav>
        </div>
      </div>
      