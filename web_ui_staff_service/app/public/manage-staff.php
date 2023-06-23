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

    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_processing,
    .dataTables_wrapper .dataTables_paginate {
        color: #333;
        margin-bottom: 2%;
        margin-top: 2%;
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

    :focus-visible {
        outline: -webkit-focus-ring-color auto 0px;
    }

    .form-add-staff{
        background-color:#675347;
        padding:3%;
        border: solid 1px #cd9678;
        margin-top: 3%;
    }

    .form-add-staff > h1{
        font-family: 'Lobster', cursive;
        color:#f9e7dd;
    }

    .form-control.input-staff {
        background-color: transparent;
        /* color: #cd9678; */
        border: none;
        border-bottom: solid 3px #cd9678;
        border-radius: 0px;
        color: #f9e7dd !important;
    }

    .form-control.input-staff:focus {
        color: #f9e7dd !important;
        background-color: transparent;
        border-bottom: solid 3px #cd9678;
        outline: 0;
        box-shadow: none;
    }

    .form-add-staff > div > label{
        font-family: 'Nunito', sans-serif;
        color:#f9e7dd;
    }

    .btn.add-button {
        background-color: #cd9678;
        border-radius: 0px;
        color: #f8f9fa;
        transition: ease-in-out 0.5s;
    }

    .form-control.modal-edit {
        border: solid 1.3px #6f4933;
        color: #6f4933;
    }

    .form-control.modal-edit:focus {
        color: #6f4933;
        background-color: #fff;
        border: solid 1.4px #6f4933;
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

</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section style="min-height: 100vh;" class="overflow-hidden">
        <?php include 'navbar.php'; ?>
        <div class="container">
            <div align="center" style="margin-top:40px;">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-plus" style="color:white;"></i> Add new Staff
                </button>
            </div>

            <div class="collapse" id="collapseExample">
                <div class="row form-add-staff">
                    <h1 style="text-align: center;">- Add new Staff -</h1>


                    <div class="mb-3">
                        <label for="description" class="form-label modal-edit">Name:</label>
                        <input type="text" id="add-staff-name" class="form-control input-staff" name="description" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label modal-edit">Email:</label>
                        <input type="text" id="add-staff-email" class="form-control input-staff" name="description" required>
                    </div>

                    <!-- password -->
                    <div class="mb-3">
                        <label for="description" class="form-label modal-edit">Password:</label>
                        <input type="password" id="add-staff-password" class="form-control input-staff" name="description" required>
                    </div>



                    <!-- <div id="detailsContainer">
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
                                <div class="col-md-3">
                                    <label for="date" class="form-label">Date:</label>
                                    <input type="date" class="form-control date" name="date[]" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="timeStart" class="form-label">Start Time:</label>
                                    <input type="time" class="form-control timeStart" name="timeStart[]" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="timeEnd" class="form-label">End Time:</label>
                                    <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                                </div>

                                <div class="col-md-3">
                                    <label for="location" class="form-label">Location:</label>
                                    <input type="text" class="form-control location" name="location[]" required>
                                </div>


                            </div>
                        </div>
                    </div> -->
                    <div align="center">
                        <button type="submit" class="btn add-button" id="submitstaff">Submit</button>
                    </div>


                </div>
            </div>

            <div class="row justify-content-center mb-5" style="margin-top: 30px;">
                <div class="col-12">
                    <table class="table" id="tableOrder">
                        <thead class="text-center" style="background: #cd9678; color: white !important;">
                            <tr>

                                <th class="text-white">
                                    #
                                </th>
                                <th class="text-white">
                                    Name
                                </th>
                                <th class="text-white">
                                    Email
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
    <!-- Section: Design Block -->
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="editStaffModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-end">

                    </div>

                    <form id="clientForm" class="">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label" disabled><b>Email address</b></label>
                            <input type="email" class="form-control modal-edit" id="staff-email" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label"><b>Name</b></label>
                            <input type="text" class="form-control modal-edit" id="staff-name">
                        </div>
                        <!-- hidden form for setting id -->
                        <input type="hidden" id="staff-modal-id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="edit-staff-submit">Submit</button>
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
    <script>
        function refreshTable() {
            $.ajax({
                url: "http://localhost:8082/staff/list",
                method: "GET",
                success: function(response) {
                    var clientList = response.data;

                    // Clear the existing table body
                    $("#orderListBody").empty();
                    var table = $('#tableOrder').DataTable();
                    table.destroy();


                    // Loop through the clients and add them to the table
                    for (var i = 0; i < clientList.length; i++) {
                        var client = clientList[i];
                        var row = $("<tr></tr>");

                        row.append('<td>' + client.id + '</td>');
                        row.append('<td>' + client.name + '</td>');
                        row.append('<td>' + client.email + '</td>');
                        // row.append(
                        //     '<td><button class="btn btn-primary create-events" data-client-id="' +
                        //     client.id + '">Create Events</button></td>'
                        // );

                        // Add the row to the table body
                        row.append(
                            '<td><button class="btn btn-primary edit-btn edit-staff" staff-id="' +
                            client.id + '">Edit</button></td>'
                        );


                        $("#orderListBody").append(row);
                    }

                    var newTable = $('#tableOrder').DataTable({
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
                        ],
                        pageLength: 10
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        //if session storage is empty, redirect to login page
        if (sessionStorage.getItem("id") == null) {
            window.location.href = "http://localhost:81/index.php";
        }
        $(document).ready(function() {
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
                url: "http://localhost:8082/staff/list",
                method: "GET",
                success: function(response) {
                    var clientList = response.data;

                    // Clear the existing table body
                    $("#orderListBody").empty();

                    // Loop through the clients and add them to the table
                    for (var i = 0; i < clientList.length; i++) {
                        var client = clientList[i];
                        var row = $("<tr></tr>");

                        row.append('<td>' + client.id + '</td>');
                        row.append('<td>' + client.name + '</td>');
                        row.append('<td>' + client.email + '</td>');
                        // row.append(
                        //     '<td><button class="btn btn-primary create-events" data-client-id="' +
                        //     client.id + '">Create Events</button></td>'
                        // );

                        // Add the row to the table body
                        row.append(
                            '<td><button class="btn btn-primary edit-btn edit-staff" staff-id="' +
                            client.id + '">Edit</button></td>'
                        );


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
                        ],
                        pageLength: 10
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });


            //when click create events button in table get the order details from api 
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

            $(document).on('click', '.edit-staff', function() {
                var staffID = $(this).attr("staff-id");

                // AJAX request to retrieve order details
                $.ajax({
                    url: 'http://localhost:8082/staff/' + staffID,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            var staff = response.data;
                            console.log(staff)
                            // Populate the modal with order details
                            var modalBody = $('#editStaffModal').find('.modal-body');
                            // modalBody.empty();

                            $('#staff-email').val(response.data.email);
                            $('#staff-name').val(response.data.name);
                            $('#staff-modal-id').val(staffID)

                            // Show the modal
                            $('#editStaffModal').modal('show');
                        } else {
                            alert('Failed to retrieve order details.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while retrieving order details.');
                    }
                });
            });

            $('#edit-staff-submit').click(function() {
                // Perform the edit action
                // You can add your logic here to handle the edit action, such as making an AJAX request to update the data

                var formData = {
                    name: $('#staff-name').val(),
                    email: $('#staff-email').val(),
                    id: $('#staff-modal-id').val(),
                };
                $.ajax({
                    url: "http://localhost:8082/staff/data",
                    method: "PUT",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data updated successfully'
                        }).then(function() {
                            window.location.href =
                                "http://localhost:81/manage-staff.php";
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
                })
            });

            function addDetailFields() {
                var detailContainer = document.getElementById('detailsContainer');

                var newDetail = document.createElement('div');
                newDetail.className = 'orderDetail mb-3';

                newDetail.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" class="form-control date" name="date[]" required>
                    </div>

                    <div class="col-md-3">
                        <label for="timeStart" class="form-label">Start Time:</label>
                        <input type="time" class="form-control timeStart" name="timeStart[]" required>
                    </div>

                    <div class="col-md-3">
                        <label for="timeEnd" class="form-label">End Time:</label>
                        <input type="time" class="form-control timeEnd" name="timeEnd[]" required>
                    </div>

                    <div class="col-md-3">
                        <label for="location" class="form-label">Location:</label>
                        <input type="text" class="form-control location" name="location[]" required>
                    </div>

                </div>
            `;

                detailContainer.appendChild(newDetail);
            }

            // Add event listener to the "Add More Details" button
            // var addDetailBtn = document.getElementById('addDetailBtn');
            // addDetailBtn.addEventListener('click', addDetailFields);
            $("#submitstaff").click(function(e) {
                event.preventDefault(); // Prevent the default form submission behavior
                // var email = sessionStorage.getItem('id');
                var jsonData = {
                    "name": $("#add-staff-name").val(),
                    "email": $("#add-staff-email").val(),
                    "password": $("#add-staff-password").val(),
                };
                // var detailElements = document.getElementsByClassName('orderDetail');
                // for (var i = 0; i < detailElements.length; i++) {
                //     var detailElement = detailElements[i];
                //     var timeStartValue = detailElement.querySelector('.timeStart').value;
                //     var timeEndValue = detailElement.querySelector('.timeEnd').value;
                //     var orderDetail = {
                //         "location": detailElement.querySelector('.location').value,
                //         "date": detailElement.querySelector('.date').value,
                //         "time_start": formatTime(timeStartValue),
                //         "time_end": formatTime(timeEndValue)

                //     };

                //     jsonData.orderDetails.push(orderDetail);
                // }

                $.ajax({
                    url: "http://localhost:8082/staff/register",
                    method: "POST",
                    data: JSON.stringify(jsonData),
                    contentType: "application/json",
                    success: function(response) {
                        refreshTable();
                        Swal.fire('Success', 'Staff added successfully!', 'success');


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