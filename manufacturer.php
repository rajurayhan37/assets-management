<?php
    include "includes/header.php";
    include "includes/aside.php";

    $records_per_page = 10;
    $page = 1;

    if(isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    }

    $start_record = ($page -1 ) * $records_per_page;
    $total_records = mysqli_query($conn, "SELECT COUNT(*) FROM manufacturer")->fetch_array()[0];
    $total_pages = ceil($total_records / $records_per_page);

    $sql = "SELECT * FROM manufacturer LIMIT ?, ?";

    if(isset($_POST['search-btn'])) {
        $mfg_src = $_POST['mfg-search'];
        $sql = "SELECT * FROM manufacturer WHERE MfgName = '$mfg_src' LIMIT ?, ?";
    }
    $stmt = mysqli_prepare($conn, $sql);
    $stmt->bind_param("ii", $start_record, $records_per_page);
    $stmt->execute();
    $result = $stmt->get_result();
?>

    <!-- main section -->
    <main class="p-4 sm:ml-64">
        <section class="mt-14">
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <!-- filter section -->
                <ul class="grid grid-cols-3 md:grid-cols-3 text-sm font-medium text-center text-gray-500 divide-y md:divide-y-0 divide-x divide-gray-200">
                    <li class="w-full">
                        <button id="add-btn" type="button" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Add</button>
                    </li>
                    <li class="w-full">
                        <button id="save-btn" type="button" class="inline-block w-full p-4 rounded-tr-lg rounded-0 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Save</button>
                    </li>
                    <li class="w-full">
                        <button id="delete-btn" type="button" class="inline-block w-full p-4 rounded-tr-lg text-white hover:text-white bg-rose-500 hover:bg-rose-600 focus:outline-none dark:bg-rose-500 dark:hover:bg-rose-600">Delete</button>
                    </li>
                </ul>
                <hr class="divide-y ">

                <div class="w-full p-3 bg-white border-gray-200 rounded-lg  sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                    <!-- filter  -->
                    <div class="w-full bg-white border-gray-200 rounded-lg shadow my-3">
                        <div class="flex justify-between py-2">
                            <h5 class="pl-4 text-xl font-semibold text-gray-900 md:text-2xl dark:text-white">
                                Filter
                            </h5>
                            <div class="mr-1 md:mr-4">
                                <a href="manufacturer.php" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                    Clear
                                </a>
                            </div>
                        </div>
                        <hr class="divide-y">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-5 px-4 pr-4 py-3">
                            <div class="flex">
                                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Location: </button>
                                <div class="relative w-full">
                                    <input type="search" id="mfg-input" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="" value="" required>
                                </div>
                            </div>
                            <form method="post" action="" class="relative w-full">
                                <input type="search" id="mfg-search" name="mfg-search" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg  border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Enter location..." required>
                                <button type="submit" name="search-btn" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 0c17.7 0 32 14.3 32 32V66.7C368.4 80.1 431.9 143.6 445.3 224H480c17.7 0 32 14.3 32 32s-14.3 32-32 32H445.3C431.9 368.4 368.4 431.9 288 445.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V445.3C143.6 431.9 80.1 368.4 66.7 288H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H66.7C80.1 143.6 143.6 80.1 224 66.7V32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z"/></svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- manuacturer table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="all-checked" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 inline-flex gap-3">
                                        Manufacturer
                                        <svg aria-hidden="true" class="w-3 h-3" fill="currentColor" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M32 32C14.3 32 0 46.3 0 64V304v48 80c0 26.5 21.5 48 48 48H464c26.5 0 48-21.5 48-48V304 152.2c0-18.2-19.4-29.7-35.4-21.1L320 215.4V152.2c0-18.2-19.4-29.7-35.4-21.1L128 215.4V64c0-17.7-14.3-32-32-32H32z"/></svg>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input value="<?= $row['MfgId'] ?>" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                        </td>
                                        <th scope="row" data-id="<?= $row['MfgId'] ?>" class="table-data px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['MfgName'] ?></th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <nav class="flex items-center justify-between py-2 px-4" aria-label="Table navigation">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400">Showing <span class="font-semibold text-gray-900 dark:text-white"><?= $start_record ?>-<?= $start_record + $result->num_rows ?></span> of <span class="font-semibold text-gray-900 dark:text-white"><?= $total_records ?></span></span>
                            <ul class="inline-flex items-center -space-x-px">
                                <li>
                                    <a href="<?php if($page > 1){ echo "?page=" . ($page - 1); }else { echo "javascript:void(0)"; } ?>" class="block px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Previous</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php if($page < $total_pages){ echo "?page=" . ($page + 1); }else { echo "javascript:void(0)"; } ?>" class="block px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="sr-only">Next</span>
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        $(document).ready(function() {

            //adding the location
            $("#add-btn").on("click", function() {
                const mfg = $("#mfg-input").val();
                if(mfg === "") {
                    $("#mfg-input").addClass('bg-rose-50 border-rose-200 placeholder-rose-700')
                    $("#mfg-input").attr("placeholder", "Enter the location");
                }else {
                    $.ajax({
                        url: "functions/add-manufacturer.php",
                        method: "POST",
                        data: {
                            manufacturer: mfg
                        },
                        success: function(data) {
                            if(data == 1) {
                                swal("Successfull", "Successfully added the location.", "success");
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000)
                            }else {
                                swal("Failed", "Failed to insert the location!", "error");
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                }
            });

            //modify the location 
            $("#save-btn").on("click", function() {
                const mfg = $("#mfg-input").val();
                const id  = $("#mfg-input").attr('data-id');
                if(mfg === "" || id == "") {
                    $("#mfg-input").addClass('bg-rose-50 border-rose-200 placeholder-rose-700')
                    $("#mfg-input").attr("placeholder", "Enter the location");
                }else {
                    $.ajax({
                        url: "functions/update-manufacturer.php",
                        method: "POST",
                        data: {
                            manufacturer: mfg,
                            id: id
                        },
                        success: function(data) {
                            if(data == 1) {
                                swal("Successfull", "Successfully updated the location.", "success");
                                setTimeout(function() {
                                    window.location.reload();
                                }, 1000)
                            }else {
                                swal("Failed", "Failed to update the location!", "error");
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                }
            });

            //delete the location 
            $("#delete-btn").on("click", function() {
                let id = [];
                $(":checkbox:checked").each(function(key) {
                    id[key] = $(this).val();
                });

                if(id.length === 0) {
                    swal("Warning", "Please select the location!", "warning");
                }else {
                    $.ajax({
                        url: "functions/delete-manufacturer.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if(data == 1) {
                                swal("Successfull", "Successfully deleted the locations.", "success");
                            }else {
                                swal("Failed", "Failed to delete the locations!", "error");
                            }
                            setTimeout(function() {
                                location.reload();
                            }, 1000)
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                }
            });

            //show location data on click event
            $(".table-data").each(function(key) {
                $(this).on("click", function() {
                    $("#mfg-input").val($(this).text())
                    $("#mfg-input").attr('data-id', $(this).attr('data-id'));
                })
            });
            
            //mark all data selected
            $("#all-checked").on("change", function() {
                if($("#all-checked").is(":checked")) {
                    $(":checkbox").each(function() {
                        $(this).prop('checked', true);
                    });
                }else {
                    $(":checkbox").each(function() {
                        $(this).prop('checked', false);
                    });
                }
            })
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>