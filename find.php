<?php

require dirname(__DIR__, 2) . '/environment.php';
require dirname(__DIR__, 2) . '/src/helpers/Category.php';


$categories = new Category();

$id=$_GET['id'];
$item = $categories->find($id);



?>


<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Metrics</title>
    <link rel="stylesheet" href="./css/style.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="h-full flex">
        <!-- Narrow sidebar -->
        <div class="hidden w-28 bg-indigo-700 overflow-y-auto md:block">
            <div class="w-full py-6 flex flex-col items-center">
                <div class="flex-shrink-0 flex items-center"></div>
                <div class="flex-1 mt-6 w-full px-2 space-y-1"></div>
            </div>
        </div>

     
        <div class="md:hidden" role="dialog" aria-modal="true">
            <div class="fixed inset-0 z-40 flex">
               
                <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>


                <div class="relative max-w-xs w-full bg-indigo-700 pt-5 pb-4 flex-1 flex flex-col">
 
                    <div class="absolute top-1 right-0 -mr-14 p-1">
                        <button type="button"
                            class="h-12 w-12 rounded-full flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-white">
                            <!-- Heroicon name: outline/x -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <span class="sr-only">Close sidebar</span>
                        </button>
                    </div>

                    <div class="flex-shrink-0 px-4 flex items-center"></div>
                    <div class="mt-5 flex-1 h-0 px-2 overflow-y-auto">
                        <nav class="h-full flex flex-col">
                            <div class="space-y-1"></div>
                        </nav>
                    </div>
                </div>

                <div class="flex-shrink-0 w-14" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>

        <!-- Content area -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="w-full">
                <div class="relative z-10 flex-shrink-0 h-16 bg-white border-b border-gray-200 shadow-sm flex">
                    <button type="button"
                        class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <!-- Heroicon name: outline/menu-alt-2 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </button>
                    <div class="flex-1 flex justify-between px-4 sm:px-6">
                        <div class="flex-1 flex">
                            <form class="w-full flex md:ml-0" action="#" method="GET">
                                <label for="search-field" class="sr-only">Search all files</label>
                                <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
                                        <!-- Heroicon name: solid/search -->
                                        <svg class="flex-shrink-0 h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input name="search-field" id="search-field"
                                        class="h-full w-full border-transparent py-2 pl-8 pr-3 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400"
                                        placeholder="Search" type="search" />
                                </div>
                            </form>
                        </div>
                        <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                            <!-- Profile dropdown -->
                            <div class="relative flex-shrink-0">
                                <div>
                                    <button type="button"
                                        class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                    </button>
                                </div>

                                <!--
                    Dropdown menu, show/hide based on menu state.
                    Entering: "transition ease-out duration-100"
                      From: "transform opacity-0 scale-95"
                      To: "transform opacity-100 scale-100"
                    Leaving: "transition ease-in duration-75"
                      From: "transform opacity-100 scale-100"
                      To: "transform opacity-0 scale-95"
                  -->
                                <div x-data x-show="false"
                                    class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                    tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Your Profile</a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="user-menu-item-1">Sign out</a>
                                </div>
                            </div>

                            <button type="button"
                                class="flex bg-indigo-600 p-1 rounded-full items-center justify-center text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <!-- Heroicon name: outline/plus-sm -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                <span class="sr-only">Add file</span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <div class="flex-1 flex items-stretch overflow-hidden">
                <main class="flex-1 overflow-y-auto">
                    <!-- Primary column -->
                    <section aria-labelledby="primary-heading"
                        class="min-w-0 flex-1 h-full flex flex-col lg:order-last">
                        <h1 id="primary-heading" class="sr-only">Category</h1>

                        <div class=" px-4 sm:px-6 lg:px-8">
                  
                            <div class="mt-8 flex flex-col">
                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div
                                            class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                                            <div class="sm:flex sm:items-center pt-4 pl-4">
                                                <div class="sm:flex-auto">
                                                    <h1 class="text-3xl font-semibold text-gray-900">Category:
                                                        ID-<?php echo $item['id'] ;?></h1>
                                                    <p class="mt-2 text-xl text-gray-700">
                                                    Category Details
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                                                <dl class="sm:divide-y sm:divide-gray-200">
                                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">parent_id</dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            <?php echo $item['parent_id'] ;?>
                                                        </dd>
                                                    </div>
                                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">name
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            <?php echo $item['name'] ;?>
                                                        </dd>
                                                    </div>
                                                     <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">description
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            <?php echo $item['description'] ;?>
                                                        </dd>
                                                    </div>
                                                     <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">image
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            
                                                            <img src="<?php echo $item['image'] ;?>">
                                                        </dd>
                                                    </div>
                                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">created at
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            <?php echo $item['created_at'] ;?>
                                                        </dd>
                                                    </div>
                                                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                                                        <dt class="text-sm font-medium text-gray-500">updated at
                                                        </dt>
                                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:grid-cols-1">
                                                            <?php echo $item['updated_at'] ;?>
                                                        </dd>
                                                    </div>

                                                </dl>
                                            </div>

                                            <div class="pt-8 flex justify-end pr-10 pb-10">
                                                    <a href="all.php"
                                                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                       Back
                                                    </a> 
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <!-- Secondary column (hidden on smaller screens) -->
                <!-- <aside class="hidden w-96 bg-white border-l border-gray-200 overflow-y-auto lg:block">
                    <div class="grid grid-cols-1 gap-4"></div>
                </aside> -->
            </div>
        </div>
    </div>
</body>

</html>