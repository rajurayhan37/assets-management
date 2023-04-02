<?php
    $title = "Asset Information | Asset Management System";
    include "includes/header.php";
    include "includes/aside.php";

    $records_per_page = 10;
    $page = 1;

    if(isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = $_GET['page'];
    }

    $start_record = ($page -1 ) * $records_per_page;
    $total_records = mysqli_query($conn, "SELECT COUNT(*) FROM assetinfo")->fetch_array()[0];
    $total_pages = ceil($total_records / $records_per_page);

    $sql = "SELECT * FROM assetinfo LIMIT ?, ?";

    if(isset($_POST['search-btn'])) {
        $filter = array(
            'ItemName' => $_POST['item_name'],
            'MfgId' => $_POST['mfg_id'],
            'PartNumber' => $_POST['part_no'],
            'SerialNumber' => $_POST['serial_no'],
            'HwRev' => $_POST['hwrev'],
            'AssetTag' => $_POST['asset_tag'],
            'SwVersion' => $_POST['sw_version'],
            'IpAddress' => $_POST['ip_address'],
            'LocId' => $_POST['loc_id'],
            'Description' => $_POST['description'],
            'UserId' => $_POST['user_id'],
        );

        $has_filter = false;
        foreach ($filter as $field => $value) {
            if (!empty($value)) {
                $has_filter = true;
                $where_clause= "$field LIKE '%" . mysqli_real_escape_string($conn, $value) . "%' AND ";
            }
        }
        if($has_filter) {
            $where_clause = rtrim($where_clause, "AND ");
            $sql = "SELECT * FROM assetinfo WHERE $where_clause LIMIT ?, ?";
        }else {
            $sql = "SELECT * FROM assetinfo LIMIT ?, ?";
        }
        
        echo $sql;
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
                    <form action="" method="post" class="w-full bg-white border border-gray-200 rounded-lg shadow my-3">
                        <div class="flex justify-between py-2">
                            <h5 class="pl-4 text-xl font-semibold text-gray-900 md:text-2xl dark:text-white">
                                Filter
                            </h5>
                            <div class="mr-1 md:mr-4">
                                <button id="clear-btn" type="button" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-1" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                                    Clear
                                </button>
                                <button name="search-btn" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
                                    Apply
                                </button>
                            </div>
                        </div>
                        <hr class="divide-y">

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2 md:gap-2 px-4 pr-4 py-3">
                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Name: </button>
                                <div class="relative w-full">
                                    <input type="text" id="item_name" name="item_name" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Item name" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Manufacturer: </button>
                                <div class="relative w-full">
                                    <select name="mfg_id" id="mfg_id" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" >
                                        <option selected value="">Select manufacturer</option>
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM manufacturer");
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while($data = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?= $data['MfgId'] ?>"><?= $data['MfgName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Part No: </button>
                                <div class="relative w-full">
                                    <input type="text" id="part_no" name="part_no" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Part number" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Serial No: </button>
                                <div class="relative w-full">
                                    <input type="text" id="serial_no" name="serial_no" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Port number" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Hardware Rev: </button>
                                <div class="relative w-full">
                                    <input type="text" id="hwrev" name="hwrev" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Hardware rev" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Assets Tag: </button>
                                <div class="relative w-full">
                                    <input type="text" id="asset_tag" name="asset_tag" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Assets tag" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Software VR: </button>
                                <div class="relative w-full">
                                    <input type="text" id="sw_version" name="sw_version" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Software version" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>IP: </button>
                                <div class="relative w-full">
                                    <input type="text" id="ip_address" name="ip_address" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="IP address" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Location: </button>
                                <div class="relative w-full">
                                    <select name="loc_id" id="loc_id" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Location" >
                                        <option selected value="">Select location</option>
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM location");
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while($data = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?= $data['LocId'] ?>"><?= $data['LocName'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Description: </button>
                                <div class="relative w-full">
                                    <input type="text" id="description" name="description" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Description" >
                                </div>
                            </div>

                            <div class="flex">
                                <button class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg focus:ring-4 focus:outline-none dark:bg-gray-700 dark:text-white dark:border-gray-600" type="button" disabled>Last user: </button>
                                <div class="relative w-full">
                                    <select name="user_id" id="user_id" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="User name" >
                                        <option selected value="">Select user</option>
                                        <?php
                                            $stmt = $conn->prepare("SELECT * FROM username");
                                            $stmt->execute();
                                            $res = $stmt->get_result();
                                            while($data = mysqli_fetch_assoc($res)) {
                                        ?>
                                            <option value="<?= $data['UserId'] ?>"><?= $data['Username'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- assets table -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <div class="flex items-center">
                                            <input id="all-checked" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Manufacturer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Part Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Serial Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Hardware Rev
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Asset Tag
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Software Ver
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        IP Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Location
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Description
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Last user
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Update
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr  class="table-data" asset-data="<?= str_replace("\"", "'", json_encode($row))  ?>" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox" type="checkbox" value="<?= $row['AssetId'] ?>" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            </div>
                                        </td>
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"><?= $row['ItemName'] ?></th>
                                        <td class="px-6 py-4"><?= $row['MfgId'] ?></td>
                                        <td class="px-6 py-4"><?= $row['PartNumber'] ?></td>
                                        <td class="px-6 py-4"><?= $row['SerialNumber'] ?></td>
                                        <td class="px-6 py-4"><?= $row['HwRev'] ?></td>
                                        <td class="px-6 py-4"><?= $row['AssetTag'] ?></td>
                                        <td class="px-6 py-4"><?= $row['SwVersion'] ?></td>
                                        <td class="px-6 py-4"><?= $row['IpAddress'] ?></td>
                                        <td class="px-6 py-4"><?= $row['LocId'] ?></td>
                                        <td class="px-6 py-4"><?= $row['Description'] ?></td>
                                        <td class="px-6 py-4"><?= $row['UserId'] ?></td>
                                        <td class="px-6 py-4"><?= date("d/m/Y", strtotime($row['LastUpdate'])) ?></td>
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
            function validate(data, id) {
                if(data === "" || data === null) {
                    $("#" + id).addClass('bg-rose-50 border-rose-200 placeholder-rose-700')
                    $("#" + id).attr("placeholder", "Enter the " + id.replace("_", " "));
                    return false;
                }else {
                    return true;
                }
            }

            //adding the location
            $("#add-btn").on("click", function() {
                let data = {
                    item_name: $("#item_name").val(),
                    mfg_id: $("#mfg_id").val(),
                    part_no: $("#part_no").val(),
                    serial_no: $("#serial_no").val(),
                    hwrev: $("#hwrev").val(),
                    asset_tag: $("#asset_tag").val(),
                    sw_version: $("#sw_version").val(),
                    ip_address: $("#ip_address").val(),
                    loc_id: $("#loc_id").val(),
                    description: $("#description").val(),
                    user_id: $("#user_id").val(),
                }

                let isValidate = true;

                if(!validate(data.item_name, "item_name")) {
                    isValidate = false
                }
                if(!validate(data.mfg_id, "mfg_id")) {
                    isValidate = false
                }
                if(!validate(data.part_no, "part_no")) {
                    isValidate = false
                }
                if(!validate(data.serial_no, "serial_no")) {
                    isValidate = false
                }
                if(!validate(data.hwrev, "hwrev")) {
                    isValidate = false
                }
                if(!validate(data.asset_tag, "asset_tag")) {
                    isValidate = false
                }
                if(!validate(data.sw_version, "sw_version")) {
                    isValidate = false
                }
                if(!validate(data.ip_address, "ip_address")) {
                    isValidate = false
                }
                if(!validate(data.loc_id, "loc_id")) {
                    isValidate = false
                }
                if(!validate(data.description, "description")) {
                    isValidate = false
                }
                if(!validate(data.user_id, "user_id")) {
                    isValidate = false
                }
    
                if(isValidate) {
                    $.ajax({
                        url: "functions/add-asset.php",
                        method: "POST",
                        data: data,
                        success: function(data) {
                            console.log(data)
                            if(data == 1) {
                                swal("Successfull", "Successfully added the asset.", "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }else {
                                swal("Failed", "Failed to insert the asset!", "error");
                            }
                        },
                        error: function(error) {
                            swal("Failed", "Something went wrong!", "error");
                        }
                    })
                }
            });

            //modify the location 
            $("#save-btn").on("click", function() {
                let data = {
                    asset_id : $("#item_name").attr("asset-id"),
                    item_name: $("#item_name").val(),
                    mfg_id: $("#mfg_id").val(),
                    part_no: $("#part_no").val(),
                    serial_no: $("#serial_no").val(),
                    hwrev: $("#hwrev").val(),
                    asset_tag: $("#asset_tag").val(),
                    sw_version: $("#sw_version").val(),
                    ip_address: $("#ip_address").val(),
                    loc_id: $("#loc_id").val(),
                    description: $("#description").val(),
                    user_id: $("#user_id").val(),
                }

                let isValidate = true;

                if(!validate(data.item_name, "item_name")) {
                    isValidate = false
                }
                if(!validate(data.mfg_id, "mfg_id")) {
                    isValidate = false
                }
                if(!validate(data.part_no, "part_no")) {
                    isValidate = false
                }
                if(!validate(data.serial_no, "serial_no")) {
                    isValidate = false
                }
                if(!validate(data.hwrev, "hwrev")) {
                    isValidate = false
                }
                if(!validate(data.asset_tag, "asset_tag")) {
                    isValidate = false
                }
                if(!validate(data.sw_version, "sw_version")) {
                    isValidate = false
                }
                if(!validate(data.ip_address, "ip_address")) {
                    isValidate = false
                }
                if(!validate(data.loc_id, "loc_id")) {
                    isValidate = false
                }
                if(!validate(data.description, "description")) {
                    isValidate = false
                }
                if(!validate(data.user_id, "user_id")) {
                    isValidate = false
                }

                if(isValidate) {
                    $.ajax({
                        url: "functions/update-asset.php",
                        method: "POST",
                        data: data,
                        success: function(data) {
                            console.log(data)
                            if(data == 1) {
                                swal("Successfull", "Successfully updated the asset.", "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 1000);
                            }else {
                                swal("Failed", "Failed to update the asset!", "error");
                            }
                        },
                        error: function(error) {
                            swal("Failed", "Something went wrong!", "error");
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
                    swal("Warning", "Please select the assets!", "warning");
                }else {
                    $.ajax({
                        url: "functions/delete-asset.php",
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if(data == 1) {
                                swal("Successfull", "Successfully deleted the assets.", "success");
                                setTimeout(function() {
                                    location.reload();
                                }, 1000)
                            }else {
                                swal("Failed", "Failed to delete the assets!", "error");
                            }
                        },
                        error: function(error) {
                            swal("Failed", "Something went wrong!", "error");
                        }
                    })
                }
            });

            $("#clear-btn").click(function() {
                window.location.replace("assets.php");
            });
            
            //show location data on click event
            $(".table-data").each(function(key) {
                $(this).click(function() {
                    assetData = $(this).attr("asset-data");
                    assetData = assetData.replace(/'/g, "\"");
                    data = JSON.parse(assetData);
                    $("#item_name").attr("asset-id", data.AssetId)
                    $("#item_name").val(data.ItemName)
                    $("#mfg_id").val(data.MfgId)
                    $("#part_no").val(data.PartNumber)
                    $("#serial_no").val(data.SerialNumber)
                    $("#hwrev").val(data.HwRev)
                    $("#asset_tag").val(data.AssetTag)
                    $("#sw_version").val(data.SwVersion)
                    $("#ip_address").val(data.IpAddress)
                    $("#loc_id").val(data.LocId)
                    $("#description").val(data.Description)
                    $("#user_id").val(data.UserId)
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

<?php
    include 'includes/footer.php';
?>
