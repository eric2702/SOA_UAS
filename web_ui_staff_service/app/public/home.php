<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
        integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Staff - Home</title>
</head>
<style>
.background-radial-gradient {
    background-color: hsl(218, 41%, 15%);
    background-image: radial-gradient(650px circle at 0% 0%,
            hsl(218, 41%, 35%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
            hsl(218, 41%, 45%) 15%,
            hsl(218, 41%, 30%) 35%,
            hsl(218, 41%, 20%) 75%,
            hsl(218, 41%, 19%) 80%,
            transparent 100%);
}
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section style="min-height: 100vh;" class="background-radial-gradient overflow-hidden">
        <?php include 'navbar.php'; ?>
        <div class="container">




            <div class="row justify-content-center" style="margin-top: 30px;">
                <div class="col-12 p-3" style="border-radius: 10px; background-color: #ffffff;">
                    <table class="table rounded rounded-3 overflow-hidden w-100" id="tableOrder"
                        style="border-radius: 5px;">
                        <thead class="text-center" style="background: #800000; color: white !important;">
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

    <div class="modal fade" id="eventsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    <div class="modal fade" id="addEventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addEventModalLabel" aria-hidden="true">
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
                                    <input type="text" id="description" class="form-control description"
                                        name="description[]" required>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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

        var staffArray = [];
        var idorderdetails = 0;

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
                            var editButton = $(
                                '<div class="col-md-4"><button style="width: 100%" id="' +
                                detail.id +
                                '" class="btn btn-primary btn-sm" type="button">Add Event</button></div>'
                            );
                            editButton.click((function(index) {
                                return function() {
                                    // Handle edit button click event here
                                    // You can access the corresponding order detail using the index
                                    $('#addEventModal').modal('show');
                                    idorderdetails = detail.id;

                                };
                            })(i));
                            row3.append(editButton);


                            // Append the edit button row to the item body
                            itemBody.append(row3);
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
                            headerRow.append('<th>PIC Staff Email</th>')

                            eventTableHeader.append(headerRow);

                            // Create the table body
                            var eventTableBody = $('<tbody class="row_position"></tbody>');
                            var eventDetails = orderDetails[i].events;

                            // Iterate over the event details and create rows for each event
                            for (var j = 0; j < eventDetails.length; j++) {
                                var event = eventDetails[j].event;
                                var eventTableRow = $('<tr id="' + event.id + '"></tr>');
                                eventTableRow.append('<td>' + event.id + '</td>');
                                eventTableRow.append('<td>' + event.time_start + '</td>');
                                eventTableRow.append('<td>' + event.time_end + '</td>');
                                eventTableRow.append('<td>' + event.description + '</td>');
                                eventTableRow.append('<td>' + eventDetails[j].staffName +
                                    '</td>');;
                                eventTableRow.append('<td>' + eventDetails[j].staffEmail +
                                    '</td>');;
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
                        $(".dataTable").DataTable();
                        $('.row_position').sortable({
                            stop: function() {
                                var selectedData = new Array();
                                $('.row_position>tr').each(function() {
                                    selectedData.push($(this).attr(
                                        "id"));
                                });
                                alert(selectedData);
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

        function updateOrder(data) {
            $.ajax({
                url: 'http://localhost:8086/event/update-order',
                type: 'POST',
                data: {
                    position: data
                },
                success: function(response) {
                    // alert("successfully updated");
                }

            });

        }


        $('#addEventButton').click(function() {

            $('#addEventModal').modal('show');
        });

        $("#submitorder").click(function(e) {
            event.preventDefault(); // Prevent the default form submission behavior

            var jsonData = [];
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