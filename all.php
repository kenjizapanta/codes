<?php

require dirname(__DIR__, 2) . '/environment.php';
require dirname(__DIR__, 2) . '/src/helpers/Category.php';


$categories = new Category();
$results = $categories->all();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            margin: auto;
            margin-top:100px;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
        <div class="max-w-7xl mx-auto">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-900">Category</h1>
                        <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their
                            name,title, email and role.</p>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <button type="button"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                            Metric</button>
                    </div>
                </div>
                <div class="mt-8 flex flex-col">
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="py-3 pl-4 pr-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500 sm:pl-6">
                                                parent_id</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                name</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                description</th>
                                            <th scope="col"
                                                class="px-3 py-3 text-left text-xs font-medium uppercase tracking-wide text-gray-500">
                                                image</th>

                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <?php foreach ($results as $result): ?>
                                        <tr>
                                            
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <?php echo $result['parent_id']; ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <?php echo $result['name']; ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <?php echo $result['description']; ?>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                <?php echo $result['image']; ?>
                                            </td>
                
                                            <td
                                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                            <a href="find.php?id=<?php echo $result['id'];?>"
                                                                class="text-indigo-600 hover:text-indigo-900">View<span
                                                                    class="sr-only">, Action</span></a>
                                            
                                                            <a href="update.php?id=<?php echo $result['id'];?>"
                                                                class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                                    class="sr-only">, Action</span></a>
                                                            <a href="#"
                                                                class="delete text-indigo-600 hover:text-indigo-900"
                                                                data-id="<?php echo $result['id']; ?>"
                                                                id="delete-button-<?php echo $result['id']; ?>"     
                                                                >Delete
                                                                <span class="sr-only"></span>
                                                            </a>
                                                        </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div
                                                class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                                                <div class="flex-1 flex justify-between sm:hidden">
                                                    <a href="#"
                                                        class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                        Previous
                                                    </a>
                                                    <a href="#"
                                                        class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                                        Next
                                                    </a>
                                                </div>
                                                <div
                                                    class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                                    <div>
                                                        <p class="text-sm text-gray-700">
                                                            Showing
                                                            <span class="font-medium">1</span>
                                                            to
                                                            <span class="font-medium">10</span>
                                                            of
                                                            <span class="font-medium">97</span>
                                                            results
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                                            aria-label="Pagination">
                                                            <a href="#"
                                                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                                <span class="sr-only">Previous</span>
                                                                <!-- Heroicon name: solid/chevron-left -->
                                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                            <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                                                            <a href="#" aria-current="page"
                                                                class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                                1
                                                            </a>
                                                            <a href="#"
                                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                                2
                                                            </a>
                                                            <a href="#"
                                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                                                3
                                                            </a>
                                                            <span
                                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">
                                                                ...
                                                            </span>
                                                            <a href="#"
                                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 hidden md:inline-flex relative items-center px-4 py-2 border text-sm font-medium">
                                                                8
                                                            </a>
                                                            <a href="#"
                                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                                9
                                                            </a>
                                                            <a href="#"
                                                                class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                                                10
                                                            </a>
                                                            <a href="#"
                                                                class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                                                <span class="sr-only">Next</span>
                                                                <!-- Heroicon name: solid/chevron-right -->
                                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 20 20" fill="currentColor"
                                                                    aria-hidden="true">
                                                                    <path fill-rule="evenodd"
                                                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </a>
                                                        </nav>
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
                <aside class="hidden w-96 bg-white border-l border-gray-200 overflow-y-auto lg:block">
                    <div class="grid grid-cols-1 gap-4"></div>
                </aside>
            </div>
        </div>
    </div>
    <div id="popup-modal" class="modal">
        <div class="modal-content relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="close" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                </button>
                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this data?<br> ID: <span id="what"></span></h3>
                    <button id="confirm-delete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button id="cancel-delete" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    (function() {
        var deleteButton = document.getElementsByClassName('delete');        
        var count = document.getElementsByClassName('delete').length;
        for(let i=0; i<count; i++){
            deleteButton[i].addEventListener("click", showModal);
        }                       
        function showModal(e) {
            e.preventDefault();            
           
            //modal
            var el = document.getElementById("popup-modal");
            el.style.display = 'block';
            document.getElementById("what").innerHTML = e.target.dataset.id;

            //cancel button
            var cancel = document.getElementById("cancel-delete");
            cancel.onclick = function(){
                el.style.display = "none";
            }

            //x button
            var close = document.getElementById("close");
            close.onclick = function(){
                el.style.display = "none";
            }
            
            //confirm button
            var confirm = document.getElementById("confirm-delete");
            confirm.onclick = function(){
                //room id
                var roomId = e.target.dataset.id;
                
                // data to be sent to the POST request                
                let formData = new FormData();
                formData.append("del_id", roomId);

                fetch('delete.php', {
                method: "POST",
                body: formData
                })
                .then(function (response){
                    return response.text();
                }) 
                .then(function (body){
                    location.reload();
                    // document.getElementById("stock-data").innerHTML = body // works but sub sequent deleting of data does not work 
                })
                .catch(err => console.log(err));

                el.style.display = "none";
            }
            
            //close modal when user clicks anywhere outside the modal
            window.onclick = function(event) {
                if (event.target == el) {
                    el.style.display = "none";
                }
            }
        }
    })();
</script>

</html>
