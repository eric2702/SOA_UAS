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
    
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    
    <title>Client - Profile</title>
</head>
<style>
    .background {
        background-color:#f9e7dd;        
        font-family: 'Nunito', sans-serif;
    }

    i{
        background-color: #e3dbdb;
        border-radius: 413px;
        border: solid 43px #e3dbdb;
        color: #736a6a;

    }

    .bg{
        background-image: linear-gradient(90deg, #f8f9fa 25%, #f5f5f5 25%, #f5f5f5 50%, #f8f9fa 50%, #f8f9fa 75%, #f5f5f5 75%, #f5f5f5 100%);
        border: solid 2.5px #cd9678;
    }

    h4{
        font-family: 'Raleway', sans-serif;
        color: #6f4933;
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

    .form-control {
        border: solid 1.3px #6f4933;
        color: #6f4933;
    }

    .form-control:focus {
        color: #6f4933;
        background-color: #fff;
        border: solid 1.4px #6f4933;
        outline: 0;
        box-shadow: none;
    }

    :focus-visible {
        outline: -webkit-focus-ring-color auto 0px;
    }

    .btn-check:active+.btn-primary:focus, .btn-check:checked+.btn-primary:focus, .btn-primary.active:focus, .btn-primary:active:focus, .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: none;
    }

    .form-label{
        color: #6f4933;
    }

    .btn-pass{
        background-color:#6f4933;
        color:#f8f9fa;
        transition: ease-in-out 0.5s; 
        border-radius:0px;
    }

    .btn-primary {
        border-radius: 0px;
        color:#f8f9fa;
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
        transition: ease-in-out 0.5s; 
    }

    .btn-cancel{
        background-color:#b1a9a4;
        color:#f8f9fa;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
        border-radius: 0px;
        transition: ease-in-out 0.5s; 
    }

    .btn:hover{
        transform: scale(1.05);
        color:#f8f9fa;
    }

    .btn-pass:hover. , .btn-cancel:hover{
        color:#f8f9fa;
    }

    .btn-check:focus+.btn, .btn:focus {
        outline: 0;
        box-shadow: none;
    }


    .btn-primary:hover {
        color: #f8f9fa;
        border-color: transparent;
        background-color:#877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section style="min-height: 100vh;" class="background">
        <?php include 'navbar.php'; ?>

        <div class="container bg p-5" style="margin-top:25px;">
            <div class="row">
                <div class="col-md-4 col-xs-12 m-auto text-center">
                    <i class="fas fa-user fa-9x"></i>
                    <h4 class="mt-3">Customer 👑</h4>
                </div>

                <div class="col-md-8 col-xs-12 ">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-pass ms-auto" data-bs-toggle="modal" data-bs-target="#change-passwd-modal">Change Password</button>
                    </div>

                    <form id="clientForm" class="">
                        <fieldset disabled>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label" disabled>Email address</label>
                                <input type="email" class="form-control" id="client-email" aria-describedby="emailHelp">
                            </div>
                        </fieldset>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="client-name">
                        </div>
                        <button type="button" class="btn btn-primary" id="editButton">Save</button>
                    </form>

                </div>

            </div>
            
           

           
        </div>

        <!-- create modal for changing password -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="change-passwd-modal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                <input type="password" class="form-control" id="old-passwd"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new-passwd">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-passwd">
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="change-passwd-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Optional: jQuery and Bootstrap JS -->
        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function() {
            // Fetch data from localhost:8080/client/{id}
            //get the id from the session
            var id_client = sessionStorage.getItem('id');
            $.ajax({
                url: 'http://localhost:8080/client/' + id_client,
                method: 'GET',
                success: function(response) {
                    // Populate form fields with the fetched data
                    $('#client-email').val(response.data.email);
                    $('#client-name').val(response.data.name);
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            // Handle edit button click
            $('#editButton').click(function() {
                // Perform the edit action
                // You can add your logic here to handle the edit action, such as making an AJAX request to update the data

                var formData = {
                    name: $('#client-name').val(),
                    id: id_client,
                };
                $.ajax({
                    url: "http://localhost:8080/client/data",
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
                                "http://localhost/profile.php";
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            });

            // Handle change password button click
            $('#change-passwd-submit').click(function() {
                // Perform the edit action
                // You can add your logic here to handle the edit action, such as making an AJAX request to update the data

                //check if the password is the same
                if ($('#new-passwd').val() != $('#confirm-passwd').val()) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Password does not match'
                    });
                    return;
                }

                var formData = {
                    oldPassword: $('#old-passwd').val(),
                    newPassword: $('#new-passwd').val(),
                    id: id_client,
                };
                $.ajax({
                    url: "http://localhost:8080/client/password",
                    method: "PUT",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Password updated successfully'
                        }).then(function() {
                            window.location.href =
                                "http://localhost/profile.php";
                        });
                    },
                    error: function(xhr, status, error) {
                        //get the error message
                        var err = JSON.parse(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.message
                        });
                    }
                })
            });
        });
        </script>
    </section>
</body>

</html>