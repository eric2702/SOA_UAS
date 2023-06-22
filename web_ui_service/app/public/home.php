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

    <title>Client - Home</title>
</head>
<style>
    .background {
        font-family: 'Nunito', sans-serif;
        background-color:#f9e7dd;
    }

    .question{
        font-family: 'Raleway', sans-serif;
        font-weight: 500;
        color:black;
    }

    .btn.help-button, .edit-btn, .expand-details {
        /* border: solid 1.5px #f8f9fa; */
        border-radius: 0px;
        color:#f8f9fa;
        /* font-weight: bold; */
        
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
        transition: ease-in-out 0.5s; 
    }

    .btn.add-button {
        background-color:#cd9678;
        border-radius: 0px;
        color:#f8f9fa;
        /* border-right: solid 1.5px #f8f9fa;
        border-bottom: solid 1.5px #f8f9fa;
        border-left: solid 0.5px #f8f9fa;
        border-top: solid  0.5px #f8f9fa; */
        transition: ease-in-out 0.5s; 
    }

    .btn.help-button:hover, .edit-btn:hover, .expand-details:hover {
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }

    .btn:hover{
        transform: scale(1.05);
    }

    a:hover {
        color: #f8f9fa;
    }

    .btn-check:active+.btn-primary, .btn-check:checked+.btn-primary, .btn-primary.active, .btn-primary:active, .show>.btn-primary.dropdown-toggle {
        color: #f8f9fa;
        background-color:#877971;
        border-color: transparent;
    }

    .btn-primary:hover {
        color: #f8f9fa;
        border-color: transparent;
        background-color:#877971;
    }

    .btn-check:focus+.btn-primary, .btn-primary:focus {
        color: #f8f9fa;
        background-color:#877971;
        border-color: transparent;
        box-shadow: none;
    }

    .redirect {
        color:#f8f9fa;
        text-decoration: none;
    }

    .introduction {
        background-color:#f8f9fa;
    }

    .wrapper {
        /* border: solid 2px #cd9678; */
        height: 300px;
        padding: 10%;
        background-image: linear-gradient(90deg, #f8f9fa 25%, #f5f5f5 25%, #f5f5f5 50%, #f8f9fa 50%, #f8f9fa 75%, #f5f5f5 75%, #f5f5f5 100%);
        background-size: 280.00px 280.00px;
        /* background-image: linear-gradient(90deg, #e3b294 25%, #cd9678 25%, #cd9678 50%, #e3b294 50%, #e3b294 75%, #cd9678 75%, #cd9678 100%);
        background-size: 280.00px 280.00px; */
    }

    i {
        color:#cd9678;
    }

    .submit-section{
        display:flex;
        justify-content:center;
        /* background-color:#cd9678; */
    }

    .submit-order{
        /* background-color:#cd9678; */
        width: 90%;
        padding: 2%;
    }

    .title-submit, .title-order  {
        font-family: 'Lobster', cursive;
        /* font-family: 'Raleway', sans-serif; */
        /* color:#f8f9fa; */
        /* color:#cd9678; */
    }

    label {
        font-family: 'Nunito', sans-serif;
        /* color:#cd9678; */
        /* font-weight:bold; */
    }

    .help {
        background-color: #675347;
    }

    .frame{
        /* border: solid 2.5px #cd9678; */
        /* padding: 5%; */
        background-color: #675347;
        color: #f9e7dd!important;
        
    }

    .form-control.input-help{
        background-color: transparent;
        /* color:#cd9678; */
        border: none;
        border-bottom: solid 3px #cd9678;
        border-radius: 0px;
        color: #f9e7dd!important;

    }

    .form-control.modal-edit {
        border: solid 1.3px #6f4933;
        color: #6f4933;
    }

    .form-control.input-help:focus {
        color: #f9e7dd!important;
        background-color: transparent;
        border-bottom: solid 3px #cd9678;
        outline: 0;
        box-shadow: none;
    }

    .form-control.modal-edit:focus {
        color: #6f4933;
        background-color: #fff;
        border: solid 1.4px #6f4933;
        outline: 0;
        box-shadow: none;
    }

    :focus-visible {
        outline: -webkit-focus-ring-color auto 0px;
    }

    .btn-check:focus+.btn, .btn:focus, .edit-btn {
        outline: 0;
        box-shadow: none;
    }

    .btn-check:active+.btn-primary:focus, .btn-check:checked+.btn-primary:focus, .btn-primary.active:focus, .btn-primary:active:focus, .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: none;
    }

    ::-webkit-calendar-picker-indicator {
        filter: invert(1);
        }

    /* h6 > i{
        color:#f8f9fa;
    }  */

    .decoration > h6 {
        background-color: #deb69e;
        padding: 0.5%;
        color: #f8f9fa;
    }

    /* table.dataTable {
        margin-top:1%!important;
        margin-bottom:1% !important;
    } */

    .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
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
    
    tbody, td, tfoot, th, thead, tr {
        border-color: #cd9678;
        border-style: solid;
        border-bottom-width: 3px;
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

    .modal-title{
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

    .btn-close:focus {
        outline: 0;
        box-shadow: none;
        opacity: 0;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        color: #6f4933 !important;
        border: none;
        background-color: transparent;
        background: transparent;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:active {
        outline: none;
        background-color: #6f4933;
        background:#6f4933;
        color:#f9e7dd;
        box-shadow: none;
    }
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section style="min-height: 100vh;" class="background overflow-hidden">
        <?php include 'navbar.php'; ?>
       

        <section class="mt-5">
            <div class="container">
            <div class="row  text-center">
                <div class="col-md-6 col-xs-12">
                    <div class="wrapper">
                        <i class="fa fa-edit fa-3x"></i>
                        <h3 class="question mt-2 ">Do you have any event<br>  in mind?</h3>
                        <button class="btn help-button mt-2" type="button">
                            <a href="#help" class="redirect">Tell us your ideas!</a>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="wrapper">
                        <i class="fas fa-history fa-3x"></i>
                        <h3 class="question mt-2">Wanna see your ongoing/ <br> past events?</h3>
                        <button class="btn help-button mt-2" type="button">
                            <a href="#information" class="redirect">See events!</a>
                        </button>
                    </div>
                </div>
            </div>
            </div>
        </section>

        
        <section class="help mt-5" id="help">
            <div class="decoration text-center">
                <h6 class="d-none d-sm-block d-sm-none d-md-block">Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i></h6>
            </div>
            <div class="container-fluid submit-section">
            <div class="row submit-order mb-3">
                <div class="frame">
                <h1 class="title-submit text-center mt-3">- Add new Order -</h1>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <input type="text" id="description" class="form-control input-help" name="description" required>
                </div>
                <div id="detailsContainer">
                    <div class="row">
                        <div class="col">
                            <h3 class="title-order">Order Details:</h3>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn add-button" id="addDetailBtn"> <i class="fas fa-plus" style="color:white;"></i> Add More Date</button>
                        </div>
                    </div>
                    <div class="orderDetail mb-3">
                        <div class="row date-details">
                            <div class="col-md-2">
                                <label for="date" class="form-label">Date:</label>
                                <input type="date" class="form-control input-help date" name="date[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="timeStart" class="form-label">Start Time:</label>
                                <input type="time" class="form-control input-help timeStart" name="timeStart[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="timeEnd" class="form-label">End Time:</label>
                                <input type="time" class="form-control input-help timeEnd" name="timeEnd[]" required>
                            </div>
                            <div class="col-md-2">
                                <label for="location" class="form-label">Location:</label>
                                <input type="text" class="form-control input-help location" name="location[]" required>
                            </div>
                            <!-- <div class="col-md-1">
                                <button style="margin-top: 30px;" type="button" class="btn btn-danger removeRowBtn">&times;</button>
                            </div> -->
                        </div>
                    </div>
                    </div>
                    
                    <div align="center">
                        <button type="submit" class="btn add-button mt-2" id="submitorder">Add new order</button>
                    </div>


                </div>
                </div>
                
            </div>
            <div class="decoration text-center">
                <h6>Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i> Make your Order now! - <i class="fas fa-glass-cheers"></i></h6>
            </div>
        </section>
           

        <section class="information mt-5" id="information">
            <div class="container" style="margin-top: 30px;">
                <h1 class="text-center mt-3" style="color:#cd9678; font-family: 'Lobster', cursive;">List of Events</h1>
                <div class="row justify-content-center" >
                    <div class="col-12">
                        <table class="table " id="tableOrder">
                            <thead class="text-center" style="background: #cd9678; color: white !important;">
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
        </section>

            
        <div class="modal fade" id="orderDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

        <div class="modal fade" id="EditorderDetailsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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

                                var detailRow = '<p><b>Day: </b>' + (i + 1) + '</p>' + '<p><b>Date: </b>' + detail.date + '</p>' +
                                    '<p><b>Time Start: </b>' + detail.time_start + '</p>' +
                                    '<p><b>Time End: </b>' + detail.time_end + '</p>' +
                                    '<p><b>Location: </b>' + detail.location + '</p>' + '<hr>';
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
                            modalBody.append('<label for="description2" class="form-label"><b>Description:</b></label>');
                            modalBody.append('<input type="text" id="description2" class="form-control modal-edit mb-2" name="description" required>');
                            $('#description2').val(order.order.description);


                            // Populate the order details table
                            var orderDetailsTable = $('#orderDetailsTable');
                            orderDetailsTable.empty();

                            order.orderDetails.forEach(function(orderDetail) {
                                var row = $('<div class="row">');
                                var col0 = $('<div class="col-md-3" style="display:none;">');
                                col0.append('<label for="date" class="form-label"><b>id:</b></label>');
                                col0.append('<input type="text" class="form-control modal-edit id" name="id[]" value="' + orderDetail.id + '" disabled>');
                                row.append(col0);
                                var col1 = $('<div class="col-md-3">');
                                col1.append('<label for="date" class="form-label"><b>Date:</b></label>');
                                col1.append('<input type="date" class="form-control modal-edit date" name="date[]" value="' + orderDetail.date + '" required>');
                                row.append(col1);

                                var col2 = $('<div class="col-md-3">');
                                col2.append('<label for="timeStart" class="form-label"><b>Start Time:</b></label>');
                                col2.append('<input type="time" class="form-control modal-edit timeStart" name="timeStart[]" value="' + orderDetail.time_start + '" required>');
                                row.append(col2);

                                var col3 = $('<div class="col-md-3">');
                                col3.append('<label for="timeEnd" class="form-label"><b>End Time:</b></label>');
                                col3.append('<input type="time" class="form-control modal-edit timeEnd" name="timeEnd[]" value="' + orderDetail.time_end + '" required>');
                                row.append(col3);

                                var col4 = $('<div class="col-md-3">');
                                col4.append('<label for="location" class="form-label"><b>Location:</b></label>');
                                col4.append('<input type="text" class="form-control modal-edit location" name="location[]" value="' + orderDetail.location + '" required>');
                                row.append(col4);

                                modalBody.append(row);
                            });


                            // Show the edit modal
                            $('#EditorderDetailsModal').modal('show');
                            modalBody.append('<div align="center"><br><button type="button" class="btn edit-btn btn-primary" id="updateOrder">Update Order</button></div>');

                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $.ajax({
                url: "http://localhost:8084/order/list",
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
                        row.append('<td class="details-control"><button class="expand-details">' + order.id + '</button></td>');



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
                        <input type="date" class="form-control input-help date" name="date[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="timeStart" class="form-label">Start Time:</label>
                        <input type="time" class="form-control input-help timeStart" name="timeStart[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="timeEnd" class="form-label">End Time:</label>
                        <input type="time" class="form-control input-help timeEnd" name="timeEnd[]" required>
                    </div>

                    <div class="col-md-2">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" class="form-control input-help location" name="location[]" required>
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
                        Swal.fire('Error', 'Failed to add the order. Please try again.', 'error');
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