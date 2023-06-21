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
    <title>Client - Profile</title>
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

        <div class="container bg-white p-5" style="margin-top:40px;">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-secondary ms-auto" data-bs-toggle="modal"
                    data-bs-target="#change-passwd-modal">
                    Change Password</button>
            </div>

            <form id="clientForm" class="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" disabled>Email address</label>
                    <input type="email" class="form-control" id="client-email" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Name</label>
                    <input type="text" class="form-control" id="client-name">
                </div>
                <button type="button" class="btn btn-primary" id="editButton">Save</button>
            </form>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        //if session storage is empty, redirect to login page
        if (sessionStorage.getItem("id") == null) {
            window.location.href = "http://localhost/index.php";
        }
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
                    email: $('#client-email').val(),
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
                        var err = JSON.parse(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.message
                        });
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