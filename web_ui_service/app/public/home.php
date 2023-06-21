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
    <title>Client - Home</title>
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
            <div align="center" style="margin-top:40px;">
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Add new Order
                </button>
            </div>

            <div class="collapse" id="collapseExample">
                <div class="row"
                    style="background-color: #ffffff57;backdrop-filter: blur(5px); color:white; margin-top:20px; padding:10px">
                    <h1 style="text-align: center;">Add new Order</h1>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input type="text" id="description" class="form-control" name="description" required>
                    </div>



                    <div id="detailsContainer">
                        <div class="row">
                            <div class="col">
                                <h3>Order Details:</h3>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary" id="addDetailBtn">Add More Date</button>
                            </div>
                        </div>
                        <div class="orderDetail mb-3">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="date" class="form-label">Date:</label>
                                    <input type="date" class="form-control date" name="date[]" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="timeStart" class="form-label">Start Time:</label>
                                    <input type="time" class="form-control timeStart" name="timeStart[]" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="timeEnd" class="form-label">End Time:</label>
                                    <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                                </div>

                                <div class="col-md-2">
                                    <label for="location" class="form-label">Location:</label>
                                    <input type="text" class="form-control location" name="location[]" required>
                                </div>

                                <!-- <div class="col-md-1">

                                    <button style="margin-top: 30px;" type="button" class="btn btn-danger removeRowBtn">&times;</button>
                                </div> -->

                            </div>
                        </div>
                    </div>
                    <div align="center">
                        <button type="submit" class="btn btn-primary" id="submitorder">Add new order</button>
                    </div>


                </div>
            </div>

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
                                    Description
                                </th>
                                <th class="text-white">
                                    Action
                                </th>



                            </tr>
                        </thead>
                        <tbody class="text-center" id="orderListBody"></tbody>
                    </table>
                </div>
            </div>



        </div>

        <div class="modal fade" id="orderDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="orderDetailsModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="EditorderDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="EditorderDetailsModalLabel">Edit Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $(document).on('click', '.removeRowBtn', function() {
            $(this).closest('.row').remove();
        });


        $(document).on('click', '.expand-details', function() {
            var orderID = $(this).html();


            // AJAX request to retrieve order details
            $.ajax({
                url: 'http://localhost:8084/order/details/' + orderID,
                method: 'GET',
                success: function(response) {
                    if (response.success) {
                        var orderDetails = response.data;

                        // Populate the modal with order details
                        var modalBody = $('#orderDetailsModal').find('.modal-body');
                        modalBody.empty();

                        // Iterate over order details and append them to the modal body
                        for (var i = 0; i < orderDetails.length; i++) {
                            var detail = orderDetails[i];

                            var detailRow = '<p>Day: ' + (i + 1) + '</p>' + '<p>Date: ' +
                                detail.date + '</p>' +
                                '<p>Time Start: ' + detail.time_start + '</p>' +
                                '<p>Time End: ' + detail.time_end + '</p>' +
                                '<p>Location: ' + detail.location + '</p>' +
                                '<hr>';
                            modalBody.append(detailRow);
                        }

                        // Show the modal
                        $('#orderDetailsModal').modal('show');
                    } else {
                        alert('Failed to retrieve order details.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while retrieving order details.');
                }
            });
        });
        $(document).on('click', '#updateOrder', function() {

            // Retrieve the form data
            var orderID = $(this).closest('.modal-content').find('.expand-details').html();
            var description = $('#description2').val();
            var orderDetails = [];

            var id_client = sessionStorage.getItem('id');



            // Retrieve the order details data from the form
            $('.modal-body .row').each(function() {
                var id = $(this).find('.id').val();
                var date = $(this).find('.date').val();
                var timeStart = formatTime($(this).find('.timeStart').val());
                var timeEnd = formatTime($(this).find('.timeEnd').val());
                var location = $(this).find('.location').val();


                var orderDetail = {
                    id: id,
                    date: date,
                    time_start: timeStart,
                    time_end: timeEnd,
                    location: location,
                    id_order: orderEditVar


                };

                orderDetails.push(orderDetail);
            });


            // Construct the data object
            var data = {
                order: {
                    id: orderEditVar,
                    description: description,
                    id_client: sessionStorage.getItem('id')
                },
                orderDetails: orderDetails
            };



            // Make the AJAX PUT request
            $.ajax({
                url: 'http://localhost:8084/order/data',
                type: 'PUT',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                    // Close the modal or perform any other actions
                    $('#EditorderDetailsModal').modal('hide');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Your order has been updated',
                        showConfirmButton: false,
                        timer: 1500
                    })


                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.error(xhr.responseText);
                }
            });
        });

        var orderEditVar = 0;
        $(document).on('click', '.edit-btn', function() {
            // Retrieve the order ID
            orderEditVar = $(this).closest('tr').find('.expand-details').html();
            // Make an AJAX GET request to retrieve the order and order details data
            $.ajax({
                url: 'http://localhost:8084/order/lists',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    // Find the order with the matching order ID
                    var order = response.data.find(function(item) {
                        return item.order.id == orderEditVar;
                    });

                    if (order) {
                        // alert('Order found!');
                        // Populate the form fields with the order data
                        // $('#orderIDField').val(order.order.id);
                        // $('#description2').val(order.order.description);
                        var modalBody = $('#EditorderDetailsModal').find('.modal-body');
                        modalBody.empty();
                        modalBody.append(
                            '<label for="description2" class="form-label">Description:</label>'
                        );
                        modalBody.append(
                            '<input type="text" id="description2" class="form-control" name="description" required>'
                        );
                        $('#description2').val(order.order.description);


                        // Populate the order details table
                        var orderDetailsTable = $('#orderDetailsTable');
                        orderDetailsTable.empty();

                        order.orderDetails.forEach(function(orderDetail) {
                            var row = $('<div class="row">');
                            var col0 = $(
                                '<div class="col-md-3" style="display:none;">');
                            col0.append(
                                '<label for="date" class="form-label">id:</label>'
                            );
                            col0.append(
                                '<input type="text" class="form-control id" name="id[]" value="' +
                                orderDetail.id + '" disabled>');
                            row.append(col0);
                            var col1 = $('<div class="col-md-3">');
                            col1.append(
                                '<label for="date" class="form-label">Date:</label>'
                            );
                            col1.append(
                                '<input type="date" class="form-control date" name="date[]" value="' +
                                orderDetail.date + '" required>');
                            row.append(col1);

                            var col2 = $('<div class="col-md-3">');
                            col2.append(
                                '<label for="timeStart" class="form-label">Start Time:</label>'
                            );
                            col2.append(
                                '<input type="time" class="form-control timeStart" name="timeStart[]" value="' +
                                orderDetail.time_start + '" required>');
                            row.append(col2);

                            var col3 = $('<div class="col-md-3">');
                            col3.append(
                                '<label for="timeEnd" class="form-label">End Time:</label>'
                            );
                            col3.append(
                                '<input type="time" class="form-control timeEnd" name="timeEnd[]" value="' +
                                orderDetail.time_end + '" required>');
                            row.append(col3);

                            var col4 = $('<div class="col-md-3">');
                            col4.append(
                                '<label for="location" class="form-label">Location:</label>'
                            );
                            col4.append(
                                '<input type="text" class="form-control location" name="location[]" value="' +
                                orderDetail.location + '" required>');
                            row.append(col4);

                            modalBody.append(row);
                        });


                        // Show the edit modal
                        $('#EditorderDetailsModal').modal('show');
                        modalBody.append(
                            '<div align="center"><br><button type="button" class="btn btn-primary" id="updateOrder">Update Order</button></div>'
                        );

                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        var id_s_client = sessionStorage.getItem('id')
        $.ajax({
            url: "http://localhost:8084/order/list/" + id_s_client,
            method: "GET",
            success: function(response) {
                var orderList = response.data;

                // Clear the existing table body
                $("#orderListBody").empty();

                // Loop through the orders and add them to the table
                for (var i = 0; i < orderList.length; i++) {
                    var order = orderList[i];
                    var row = $("<tr></tr>");

                    // alert(JSON.stringify(orderList[i].orderDetails));
                    // var orderDetails = JSON.stringify(orderList[i].orderDetails).replace(/"/g, '');
                    // alert(orderDetails);
                    row.append('<td class="details-control"><button class="expand-details">' + order
                        .id + '</button></td>');



                    row.append("<td>" + order.description + "</td>");
                    row.append('<td><button class="btn btn-primary edit-btn">Edit</button></td>');

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
            error: function(error) {
                console.log(error);
            }
        });

        function addDetailFields() {
            var detailContainer = document.getElementById('detailsContainer');

            var newDetail = document.createElement('div');
            newDetail.className = 'orderDetail mb-3';

            newDetail.innerHTML = `
                <div class="row">
                    <div class="col-md-2">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control date" name="date[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="timeStart" class="form-label">Start Time:</label>
                        <input type="time" class="form-control timeStart" name="timeStart[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="timeEnd" class="form-label">End Time:</label>
                        <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" class="form-control location" name="location[]" required>
                    </div>
                    <div class="col-md-1">
                        <button style="margin-top: 30px;" type="button" class="btn btn-danger removeRowBtn">&times;</button>
                    </div>


                </div>
            `;

            detailContainer.appendChild(newDetail);
        }



        // Add event listener to the "Add More Details" button
        var addDetailBtn = document.getElementById('addDetailBtn');
        addDetailBtn.addEventListener('click', addDetailFields);
        $("#submitorder").click(function(e) {
            event.preventDefault(); // Prevent the default form submission behavior
            var email = sessionStorage.getItem('id');
            var jsonData = {
                "order": {
                    "description": $("#description").val(),
                    "id_client": email
                },
                "orderDetails": []
            };
            var detailElements = document.getElementsByClassName('orderDetail');
            for (var i = 0; i < detailElements.length; i++) {
                var detailElement = detailElements[i];
                var timeStartValue = detailElement.querySelector('.timeStart').value;
                var timeEndValue = detailElement.querySelector('.timeEnd').value;
                var orderDetail = {
                    "location": detailElement.querySelector('.location').value,
                    "date": detailElement.querySelector('.date').value,
                    "time_start": formatTime(timeStartValue),
                    "time_end": formatTime(timeEndValue)

                };

                jsonData.orderDetails.push(orderDetail);
            }

            $.ajax({
                url: "http://localhost:8084/order/add",
                method: "POST",
                data: JSON.stringify(jsonData),
                contentType: "application/json",
                success: function(response) {

                    Swal.fire('Success', 'Order added successfully!', 'success');


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