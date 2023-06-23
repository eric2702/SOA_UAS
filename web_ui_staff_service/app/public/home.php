<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


    <title>Staff - Home</title>
</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f9e7dd;
    }

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: #333;
        margin-bottom: 2%;
        margin-top: 2%;
    }

    table.dataTable tbody tr {
        background-color: #ffffffbd;
        border-bottom: 3px solid #cd9678;
    }

    table.dataTable.no-footer {
        border-bottom: 0px solid #cd9678;
    }

    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        border-color: #cd9678;
        border-style: solid;
        border-bottom-width: 3px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #6f4933 !important;
        border: none;
        background-color: transparent;
        background: transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        outline: none;
        background-color: #6f4933;
        background: #6f4933;
        color: #f9e7dd;
        box-shadow: none;
    }

    :focus-visible {
        outline: -webkit-focus-ring-color auto 0px;
    }

    .btn-primary {
        border-radius: 0px;
        color: #f8f9fa;
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
        transition: ease-in-out 0.5s;
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn-primary:hover {
        color: #f8f9fa;
        border-color: transparent;
        background-color: #877971;
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }

    .btn-check:focus+.btn-primary,
    .btn-primary:focus {
        color: #f8f9fa;
        background-color: #877971;
        border-color: transparent;
        box-shadow: none;
    }

    .btn-check:active+.btn-primary:focus,
    .btn-check:checked+.btn-primary:focus,
    .btn-primary.active:focus,
    .btn-primary:active:focus,
    .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: none;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }

    .btn-check:active+.btn-primary,
    .btn-check:checked+.btn-primary,
    .btn-primary.active,
    .btn-primary:active,
    .show>.btn-primary.dropdown-toggle {
        color: #f8f9fa;
        background-color: #877971;
        border-color: transparent;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }

    .modal-header {
        display: flex;
        flex-shrink: 0;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1rem;
        border-bottom: 1.8px solid #7f411e;
        border-top-left-radius: calc(0.3rem - 1px);
        border-top-right-radius: calc(0.3rem - 1px);
        color: #6f4933;
        font-weight: bold;
    }

    .modal-content {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #deb69e;
        background-clip: padding-box;
        border: none;
        border-radius: 0px;
        outline: 0;
    }

    .modal-title {
        font-family: 'Lobster', cursive;
    }

    .modal-body {
        position: relative;
        flex: 1 1 auto;
        padding: 1rem;
        color: #6f4933;
        background-color: #f9e7dd;
        font-family: 'Raleway', sans-serif;
    }

    .modal-footer {
        display: flex;
        flex-wrap: wrap;
        flex-shrink: 0;
        align-items: center;
        justify-content: flex-end;
        padding: 0.75rem;
        border-top: none;
        border-bottom-right-radius: calc(0.3rem - 1px);
        border-bottom-left-radius: calc(0.3rem - 1px);
        background-color: #f9e7dd;
    }

    .btn-cancel {
        background-color: #b1a9a4;
        color: #f8f9fa;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
        border-radius: 0px;
        transition: ease-in-out 0.5s;
    }

    .btn-cancel:hover {
        color: #f8f9fa;
    }

    .btn-check:focus+.btn,
    .btn:focus {
        outline: 0;
        box-shadow: none;
    }

    .btn-close:focus {
        outline: 0;
        box-shadow: none;
        opacity: 0;
    }
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section style="min-height: 100vh;" class="background-radial-gradient overflow-hidden">
        <?php include 'navbar.php'; ?>
        <div class="container">




            <div class="row justify-content-center">
                <div class="col-12">
                    <table class="table" id="tableOrder">
                        <thead class="text-center" style="background: #cd9678; color: white !important;">
                            <tr>

                                <th class="text-white">
                                    #
                                </th>
                                <th class="text-white">
                                    Client Name
                                </th>
                                <th class="text-white">
                                    Client Email
                                </th>
                                <th class="text-white">
                                    Description
                                </th>
                                <th class="text-white">
                                    Actions
                                </th>



                            </tr>
                        </thead>
                        <tbody class="text-center" id="orderListBody"></tbody>
                    </table>
                </div>
            </div>



        </div>
    </section>

    <div class="modal fade" id="eventsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Manage Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal event -->
    <div class="modal fade" id="addEventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="addEventModalLabel">Add Event</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">






                    <div id="detailsContainer">
                        <div class="row">
                            <div class="col">
                                <h3>Add Event Details:</h3>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary" id="addDetailBtn">Add More
                                    Rundown</button>
                            </div>
                        </div>
                        <div class="orderDetail mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Description:</label>
                                    <input type="text" id="description" class="form-control description" name="description[]" required>
                                </div>


                                <div class="col-md-2">
                                    <label for="timeStart" class="form-label">Start Time:</label>
                                    <input type="time" class="form-control timeStart" name="timeStart[]" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="timeEnd" class="form-label">End Time:</label>
                                    <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                                </div>

                                <div class="col-md-4">
                                    <label for="location" class="form-label">PIC:</label>
                                    <select class="form-select location" name="staff[]" required>

                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary" id="submitorder">Add new rundown</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Section: Design Block -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script>
        //if session storage is empty, redirect to login page
        if (sessionStorage.getItem("id") == null) {
            window.location.href = "http://localhost:81/index.php";
        }
        $(document).ready(function() {
            var isEditing = false; // Flag to track the editing state

            var staffArray = [];
            var idorderdetails = 0;
            var idorderdetailsArr = [];

            $.ajax({
                url: 'http://localhost:8082/staff/list',
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var staffList = response.data;

                        // Iterate over the staff list and extract ID and name
                        for (var i = 0; i < staffList.length; i++) {
                            var staff = staffList[i];
                            var staffData = {
                                id: staff.id,
                                name: staff.name
                            };

                            // Push the staff data into the array
                            staffArray.push(staffData);
                            var selectLocation = $('.location');
                            selectLocation.empty(); // Clear existing options

                            // Add a hidden default option
                            selectLocation.append(
                                '<option value="" hidden>Select a PIC staff</option>');

                            // Add staff names and IDs as options
                            for (var j = 0; j < staffArray.length; j++) {
                                var staffItem = staffArray[j];
                                selectLocation.append('<option value="' + staffItem.id + '">' +
                                    staffItem.name + '</option>');
                            }
                        }

                        // Print the staff array
                        console.log(staffArray);
                        // alert(staffArray[0].name);
                    } else {
                        console.log('Failed to retrieve staff list.');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('An error occurred while retrieving staff list.');
                }
            });



            var addDetailBtn = document.getElementById('addDetailBtn');
            addDetailBtn.addEventListener('click', addDetailFields);


            function addDetailFields() {
                var detailContainer = document.getElementById('detailsContainer');

                var newDetail = document.createElement('div');
                newDetail.className = 'orderDetail mb-3';

                newDetail.innerHTML = `
                <div class="row border-top">
                    <div class="col-md-12">
                                        <label for="description" class="form-label">Description:</label>
                                        <input type="text" id="description" class="form-control description" name="description[]" required>
                    </div>
                    <div class="col-md-2">
                        <label for="timeStart" class="form-label">Start Time:</label>
                        <input type="time" class="form-control timeStart" name="timeStart[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="timeEnd" class="form-label">End Time:</label>
                        <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                    </div>

                    <div class="col-md-4">
                                    <label for="location" class="form-label">Location:</label>
                                    <select class="form-select location" name="staff[]" required>
                                      
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                    <div class="col-md-1">
                        <button style="margin-top: 30px;" type="button" class="btn btn-danger removeRowBtn">&times;</button>
                    </div>


                </div>
            `;

                var selectLocation = newDetail.querySelector('.location');
                selectLocation.innerHTML = ''; // Clear existing options

                // Add a hidden default option
                selectLocation.innerHTML += '<option value="" hidden>Select a PIC staff</option>';

                // Add staff names and IDs as options
                for (var j = 0; j < staffArray.length; j++) {
                    var staffItem = staffArray[j];
                    selectLocation.innerHTML += '<option value="' + staffItem.id + '">' + staffItem.name +
                        '</option>';
                }

                detailContainer.appendChild(newDetail);
            }
            $(document).on('click', '.removeRowBtn', function() {
                $(this).closest('.row').remove();
            });

            function format(order) {
                var orderDetails = order.orderDetails;
                var table = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

                for (var i = 0; i < orderDetails.length; i++) {
                    var orderDetail = orderDetails[i];
                    table +=
                        '<tr>' +
                        '<td>Date: ' + orderDetail.date + '</td>' +
                        '<td>Start Time: ' + orderDetail.time_start + '</td>' +
                        '<td>End Time: ' + orderDetail.time_end + '</td>' +
                        '<td>Location: ' + orderDetail.location + '</td>' +
                        '</tr>';
                }

                table += '</table>';
                return table;
            }

            $(document).on('click', '.expand-details', function() {

                var order = JSON.parse($(this).data('order'));
                var row = $(this).closest('tr');

                if (row.hasClass('shown')) {
                    // Detail sudah ditampilkan, sekarang kita sembunyikan
                    row.next().remove();
                    row.removeClass('shown');
                } else {
                    // Detail belum ditampilkan, sekarang kita tambahkan
                    row.after('<tr class="details-row"><td colspan="3">' + format(order) + '</td></tr>');
                    row.addClass('shown');
                }
            });

            $.ajax({
                url: "http://localhost:8084/order/lists",
                method: "GET",
                success: function(response) {
                    var orderList = response.data;

                    // Clear the existing table body
                    $("#orderListBody").empty();

                    // Loop through the orders and add them to the table
                    for (var i = 0; i < orderList.length; i++) {
                        var order = orderList[i].order;
                        var row = $("<tr></tr>");

                        // alert(JSON.stringify(order));

                        row.append(
                            '<td class="details-control"><span class="expand-details" data-order="' +
                            JSON.stringify(order) + '">' + order.id + '</span></td>');

                        row.append("<td>" + orderList[i].clientName + "</td>");
                        row.append("<td>" + orderList[i].clientEmail + "</td>");

                        row.append("<td>" + order.description + "</td>");
                        row.append(
                            '<td><button class="btn btn-primary create-events" data-order-id="' +
                            order.id + '">Manage Details</button></td>'
                        );

                        // Add the row to the table body
                        $("#orderListBody").append(row);
                    }
                    var table = $('#tableOrder').DataTable({
                        dom: 'lBfrtip',
                        responsive: true,
                        buttons: [{
                                extend: 'copy',
                                attr: {
                                    class: 'btn btn-primary'
                                }
                            },
                            {
                                extend: 'csv',
                                attr: {
                                    class: 'btn btn-primary'
                                }
                            },
                            {
                                extend: 'excel',
                                attr: {
                                    class: 'btn btn-primary'
                                }
                            },
                            {
                                extend: 'pdf',
                                attr: {
                                    class: 'btn btn-primary'
                                }
                            },
                            {
                                extend: 'print',
                                attr: {
                                    class: 'btn btn-primary'
                                }
                            },
                            {
                                text: 'Edit',
                                attr: {
                                    id: 'editButton',
                                    class: 'btn btn-primary'
                                }
                            }
                        ],
                        lengthMenu: [
                            [5, 10, 25, 50, 100, -1],
                            [5, 10, 25, 50, 100, "All"]
                        ], // Use "All" instead of -1 // Configure the available options for number of rows
                        pageLength: 10 // Set the initial number of rows to display
                    });

                },
                error: function(xhr, status, error) {
                    console.log(error);
                    var err = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.message
                    });
                }
            });

            //when click Order Details button in table get the order details from api 
            $(document).on('click', '.create-events', function() {
                var orderID = $(this).data("order-id");
                idorderdetailsArr = [];


                // AJAX request to retrieve order details
                $.ajax({
                    url: 'http://localhost:8084/order/details/' + orderID,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            var orderDetails = response.data;

                            // Populate the modal with order details
                            var modalBody = $('#eventsModal').find('.modal-body');
                            modalBody.empty();

                            // Create an accordion container
                            var accordionContainer = $(
                                '<div class="accordion" id="orderAccordion"></div>');

                            // Iterate over order details and append them as accordion items
                            for (var i = 0; i < orderDetails.length; i++) {
                                var detail = orderDetails[i].orderDetails;

                                // Create an accordion item
                                var accordionItem = $('<div class="accordion-item"></div>');

                                // Create the item header
                                var itemHeader = $('<h2 class="accordion-header" id="heading' +
                                    i + '"></h2>');
                                itemHeader.append(
                                    '<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' +
                                    i + '" aria-expanded="false" aria-controls="collapse' +
                                    i + '">Day: ' + (i + 1) + '</button>');

                                // Create the item content
                                var itemContent = $('<div id="collapse' + i +
                                    '" class="accordion-collapse collapse" aria-labelledby="heading' +
                                    i + '"></div>');

                                var itemBody = $('<div class="accordion-body"></div>');

                                // Create a row for the left column (date and location)
                                var row1 = $('<div class="row justify-content-center"></div>');
                                var leftColumn = $('<div class="col-md-2"></div>');
                                leftColumn.append('<p>Date: ' + detail.date + '</p>');
                                leftColumn.append('<p>Location: ' + detail.location + '</p>');
                                row1.append(leftColumn);

                                // Create a row for the right column (time)

                                var rightColumn = $('<div class="col-md-2"></div>');
                                rightColumn.append('<p>Time Start: ' + detail.time_start +
                                    '</p>');
                                rightColumn.append('<p>Time End: ' + detail.time_end + '</p>');
                                row1.append(rightColumn);

                                // Append the rows to the item body
                                itemBody.append(row1);


                                // Create a row for the edit button
                                var row3 = $('<div class="row justify-content-center"></div>');
                                var addbutton = $(
                                    '<div class="col-md-4"></div>'
                                );
                                addButton2 = $(
                                    '<button style="width: 100%" id="' +
                                    detail.id +
                                    '" class="btn btn-primary btn-sm" type="button">Add Event</button>'
                                );
                                addbutton.append(addButton2);
                                addButton2.click((function(index) {

                                    idorderdetailsArr.push(detail.id);


                                    return function() {
                                        // alert(idorderdetailsArr);
                                        // alert(index);
                                        // alert(idorderdetailsArr[index]);
                                        idorderdetails = idorderdetailsArr[
                                            index];

                                        // Handle edit button click event here
                                        // You can access the corresponding order detail using the index
                                        $('#addEventModal').modal('show');


                                    };
                                })(i));
                                row3.append(addbutton);


                                // Append the edit button row to the item body
                                itemBody.append(row3);

                                var row4 = $('<div class="row"></div>');
                                var divEditButton = $('<div class="col-md-2"></div>');
                                var editButton = $(
                                    '<button style="width: 100%" class="btn btn-primary btn-sm" id="buttonEdit-' +
                                    detail.id + '" type="button">Edit</button>'
                                );
                                editButton.click(function() {
                                    isEditing = !isEditing; // Toggle the edit state
                                    var inputElements = $('.editInput-' + this.id.split(
                                        '-')[1]);
                                    // var inputElementsid = $('#editInputId').val();
                                    // alert(inputElementsid);
                                    var idIni = this.id.split('-')[1];

                                    if (isEditing) {
                                        inputElements.removeAttr('disabled');
                                        $(this).text('Save');
                                    } else {
                                        inputElements.attr('disabled', 'disabled');
                                        $(this).text('Edit');

                                        var idEdit = [];
                                        $('input[name="idEditVal-' + this.id.split('-')[
                                            1] + '[]"]').each(function() {
                                            var value = $(this).val();
                                            idEdit.push(value);
                                        });

                                        var timeStartEdit = [];
                                        $('input[name="timeStartEdit-' + this.id.split(
                                            '-')[1] + '[]"]').each(function() {
                                            var value = $(this).val();
                                            timeStartEdit.push(value);
                                        });

                                        var timeEndEdit = [];
                                        $('input[name="timeEndEdit-' + this.id.split(
                                            '-')[1] + '[]"]').each(function() {
                                            var value = $(this).val();
                                            timeEndEdit.push(value);
                                        });

                                        var descriptionEditValues = [];
                                        $('input[name="descriptionEdit-' + this.id
                                            .split('-')[1] + '[]"]').each(
                                            function() {
                                                var value = $(this).val();
                                                descriptionEditValues.push(value);
                                            });
                                        var staffNameEditValues = [];
                                        $('select[name="staffNameEdit-' + this.id.split(
                                            '-')[1] + '[]"]').each(function() {
                                            var value = $(this).val();
                                            staffNameEditValues.push(value);
                                        });


                                        var orderDetail = [];

                                        for (var i = 0; i < idEdit.length; i++) {
                                            var detail = {
                                                "id": idEdit[i],
                                                "time_start": formatTime(
                                                    timeStartEdit[i]),
                                                "time_end": formatTime(timeEndEdit[
                                                    i]),
                                                "description": descriptionEditValues[
                                                    i],
                                                "staff_id": staffNameEditValues[i],
                                                "orderDetailsId": idIni
                                            };
                                            orderDetail.push(detail);
                                        }

                                        // alert(JSON.stringify(orderDetail));\
                                        saveData(JSON.stringify(orderDetail));

                                    }
                                });
                                divEditButton.append(editButton);
                                row4.append(divEditButton);



                                // Append the edit button row to the item body
                                itemBody.append(row4);


                                var eventRow = $('<div class="row"></div>');

                                // Create a column for the event details
                                var eventColumn = $('<div class="col-md-12"></div>');

                                // Create a table for the event details
                                var eventTable = $(
                                    '<table class="table table-bordered table-striped dataTable" id="table' +
                                    i + '"></table>');

                                // Create the table header
                                var eventTableHeader = $('<thead></thead>');
                                var headerRow = $('<tr></tr>');
                                headerRow.append('<th>ID</th>');
                                headerRow.append('<th>Start Time</th>');
                                headerRow.append('<th>End Time</th>');
                                headerRow.append('<th>Description</th>');
                                headerRow.append('<th>PIC Staff Name</th>');
                                headerRow.append('<th>Actions</th>')
                                // headerRow.append('<th>PIC Staff Email</th>')

                                eventTableHeader.append(headerRow);

                                // Create the table body
                                var eventTableBody = $('<tbody class="row_position"></tbody>');
                                var eventDetails = orderDetails[i].events;

                                // Iterate over the event details and create rows for each event
                                for (var j = 0; j < eventDetails.length; j++) {
                                    var event = eventDetails[j].event;
                                    var eventTableRow = $('<tr id="' + event.id + '"></tr>');

                                    eventTableRow.append(
                                        '<td><input type="text" class="editInputId" name="idEditVal-' +
                                        detail.id + '[]" value="' + event.id +
                                        '" disabled></td>');
                                    eventTableRow.append(
                                        '<td><input type="time" class="editInput-' + detail
                                        .id + '"  name="timeStartEdit-' + detail.id +
                                        '[]" value="' + event.time_start +
                                        '" disabled></td>');
                                    eventTableRow.append(
                                        '<td><input type="time" class="editInput-' + detail
                                        .id + '"  name="timeEndEdit-' + detail.id +
                                        '[]" value="' + event.time_end + '" disabled></td>');
                                    eventTableRow.append(
                                        '<td><input type="text" class="editInput-' + detail
                                        .id + '"  name="descriptionEdit-' + detail.id +
                                        '[]" value="' + event.description +
                                        '" disabled></td>');

                                    var staffNameDropdown = $('<td></td>');
                                    var staffNameDropdown2 = $('<select class="editInput-' +
                                        detail.id + '" name="staffNameEdit-' + detail.id +
                                        '[]" disabled></select>');

                                    for (var z = 0; z < staffArray.length; z++) {
                                        var staffItem = staffArray[z];
                                        var option = $('<option value="' + staffItem.id + '">' +
                                            staffItem.name + '</option>');

                                        if (staffItem.name === eventDetails[j].staffName) {

                                            option.prop('selected', true);
                                        }

                                        staffNameDropdown2.append(option);
                                    }

                                    staffNameDropdown.append(staffNameDropdown2);
                                    eventTableRow.append(staffNameDropdown);
                                    var deleteTd = $('<td></td>');
                                    var deleteButton = $(
                                        '<button type="button" class="btn btn-danger delete-event" delete-id=' +
                                        event.id +
                                        '><i class="fa fa-trash" aria-hidden="true"></i></button>'
                                    );
                                    deleteTd.append(deleteButton);
                                    eventTableRow.append(deleteTd);

                                    deleteButton.click(function() {
                                        var eventId = $(this).attr('delete-id');
                                        var thisTableId = $(
                                                this
                                            )
                                            .closest(
                                                'table'
                                            )
                                            .attr(
                                                'id'
                                            )
                                            .replace(
                                                'table',
                                                ''
                                            );



                                        //ajaax call to delete
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "You won't be able to revert this!",
                                            icon: 'warning',

                                            showCancelButton: true,
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',

                                            confirmButtonText: 'Yes, delete it!'
                                        }).then((result) => {
                                            if (result.value) {
                                                $.ajax({
                                                    url: 'http://localhost:8086/event/delete/' +
                                                        eventId,
                                                    type: 'DELETE',
                                                    contentType: "application/json",
                                                    success: function(
                                                        response
                                                    ) {
                                                        // remove the data from the datatable
                                                        //get this button's table


                                                        var table =
                                                            $(
                                                                '#table' +
                                                                thisTableId
                                                            )
                                                            .DataTable();
                                                        var row = $(
                                                            '#' +
                                                            eventId
                                                        );
                                                        table.row(
                                                                row)
                                                            .remove()
                                                            .draw();


                                                        console.log
                                                        // Handle the success response
                                                        var message =
                                                            response
                                                            .message;
                                                        Swal.fire({
                                                            title: 'Success!',
                                                            text: message,
                                                            icon: 'success',
                                                            confirmButtonText: 'OK'
                                                        })

                                                    },
                                                    error: function(
                                                        xhr,
                                                        textStatus,
                                                        errorThrown
                                                    ) {
                                                        // Handle the error response
                                                        var err =
                                                            JSON
                                                            .parse(
                                                                xhr
                                                                .responseText
                                                            );
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error',
                                                            text: err
                                                                .message
                                                        });
                                                    }
                                                });
                                            }
                                        })
                                    });




                                    eventTableBody.append(eventTableRow);
                                }



                                // Append the table header and body to the table
                                eventTable.append(eventTableHeader);
                                eventTable.append(eventTableBody);

                                // Append the table to the column
                                eventColumn.append(eventTable);

                                // Append the column to the row
                                eventRow.append(eventColumn);

                                // Append the event row to the item body
                                itemBody.append(eventRow);

                                // Append the item body to the item content
                                itemContent.append(itemBody);

                                // Append the header and content to the accordion item
                                accordionItem.append(itemHeader);
                                accordionItem.append(itemContent);

                                // Append the accordion item to the accordion container
                                accordionContainer.append(accordionItem);
                            }

                            // Append the accordion container to the modal body
                            modalBody.append(accordionContainer);

                            // Show the modal
                            $(".dataTable").DataTable(

                            );
                            $('.row_position').sortable({
                                stop: function() {
                                    var selectedData = new Array();
                                    $('.row_position>tr').each(function() {
                                        selectedData.push($(this).attr(
                                            "id"));
                                    });
                                    // alert(selectedData);
                                    updateOrder(selectedData);
                                }
                            });
                            $('#eventsModal').modal('show');



                        } else {
                            alert('Failed to retrieve order details.');


                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while retrieving order details.');
                    }
                });

            });

            function toggleEditState() {
                var inputs = $('tr input[type="text"]');
                inputs.prop('disabled', isEditing);
            }


            function saveData(data) {
                $.ajax({
                    url: 'http://localhost:8086/event/data/multiple',
                    type: 'PUT',
                    contentType: "application/json",
                    data: data,
                    success: function(response) {
                        // Handle the success response
                        var message = response.message;
                        Swal.fire({
                            title: 'Success!',
                            text: message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        })
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle the error response
                        var err = JSON.parse(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.message
                        });
                    }
                });
            }

            function updateOrder(data) {
                $.ajax({
                    url: 'http://localhost:8086/event/update-order',
                    type: 'POST',
                    contentType: "application/json",
                    data: JSON.stringify(data),
                    success: function(response) {
                        // Handle the success response
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle the error response
                    }
                });
            }



            $('#addEventButton').click(function() {

                $('#addEventModal').modal('show');
            });

            $("#submitorder").click(function(e) {
                event.preventDefault(); // Prevent the default form submission behavior

                var jsonData = [];
                // alert(idorderdetails);
                var detailElements = document.getElementsByClassName('orderDetail');
                for (var i = 0; i < detailElements.length; i++) {
                    var detailElement = detailElements[i];
                    var timeStartValue = detailElement.querySelector('.timeStart').value;
                    // alert(timeStartValue);
                    var timeEndValue = detailElement.querySelector('.timeEnd').value;
                    // alert(detailElement.querySelector('.location').value);
                    var orderDetail = {
                        "staff_id": detailElement.querySelector('.location').value,
                        "description": detailElement.querySelector('.description').value,
                        "orderDetailsId": idorderdetails,
                        "time_start": formatTime(timeStartValue),
                        "time_end": formatTime(timeEndValue)

                    };

                    // alert(JSON.stringify(orderDetail));
                    jsonData.push(orderDetail);
                    // alert(JSON.stringify(jsonData));
                }

                $.ajax({
                    url: "http://localhost:8086/event/add/multiple",
                    method: "POST",
                    data: JSON.stringify(jsonData),
                    contentType: "application/json",
                    success: function(response) {

                        Swal.fire('Success', 'Order added successfully!', 'success');
                        // reset the values in the form



                        $('#addEventModal').modal('hide');



                    },
                    error: function(error) {
                        console.log(error);
                        Swal.fire('Error', 'Failed to add the order. Please try again.',
                            'error');
                    }

                });

            });

            function formatTime(time) {
                var [hours, minutes, seconds] = time.split(':');
                return hours + ':' + minutes + ':00';
            }


            function format(order) {
                var orderDetails = order.orderDetails;
                var table = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

                for (var i = 0; i < orderDetails.length; i++) {
                    var orderDetail = orderDetails[i];
                    table +=
                        '<tr>' +
                        '<td>Date: ' + orderDetail.date + '</td>' +
                        '<td>Start Time: ' + orderDetail.time_start + '</td>' +
                        '<td>End Time: ' + orderDetail.time_end + '</td>' +
                        '<td>Location: ' + orderDetail.location + '</td>' +
                        '</tr>';
                }

                table += '</table>';
                return table;
            }




        });
    </script>

</body>

</html>