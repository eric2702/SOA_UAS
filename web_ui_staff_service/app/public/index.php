<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;400&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <title>Staff - Login</title>
</head>
<style>
    body{
        font-family: 'Nunito', sans-serif;
        /* background-color:#f9e7dd; */
        background-image: linear-gradient(90deg, #deb69e 25%, #dbaa8c 25%, #dbaa8c 50%, #deb69e 50%, #deb69e 75%, #dbaa8c 75%, #dbaa8c 100%);
        background-size: 60.00px 60.00px;
    }

    .btn-close:focus {
        outline: 0;
        box-shadow: none;
        opacity: 0;
    }

    h1 {
        font-family: 'Raleway', sans-serif;
        font-weight: 500;
        letter-spacing: 20px;
        text-transform: uppercase;
        color: #6f4933;
    }

    h6 {
        font-weight: bold;
        letter-spacing: 16px;
        color: #fef0e7;
        font-family: 'Nunito', sans-serif;
        font-size:20px;
    }

    span.title {
        position: relative;
        display: inline-block;
        /* animation-delay: calc(.1s * var(--i)); */
        animation: bounce 2s infinite;
        font-family: 'Lobster', cursive;
        font-size: 90px;
        transform:translateY(0);
        transform:translateX(-10px);
        color:#f8f9fa;
        letter-spacing: 9px;

    }

    @keyframes bounce{
        0%, 40%, 100% {
            transform:translateY(0);
        }
        20%{
            transform:translateY(-30px);
        }
    }

    span.title:nth-child(1){
      animation-delay:0.1s;
    }
    span.title:nth-child(2){
      animation-delay:0.2s;
    }
    span.title:nth-child(3){
      animation-delay:0.3s;
    }
    span.title:nth-child(4){
      animation-delay:0.4s;
    }
    span.title:nth-child(5){
      animation-delay:0.5s;
    }
    span.title:nth-child(6){
      animation-delay:0.6s;
    }
    span.title:nth-child(7){
      animation-delay:0.7s;
    }
    span.title:nth-child(8){
      animation-delay:0.8s;
    }

    .card{
        background-color: #f9e7dd;
        font-family: 'Raleway', sans-serif;
    }

    h3{
        font-family: 'Lobster', cursive;
        font-size: 40px;
        color: #6f4933;
    }

    label,p{
        color: #6f4933;
    }

    .form-label{
        font-weight:bold;
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

    .btn:hover{
        transform: scale(1.05);
    }

    .btn-primary:hover {
        color: #f8f9fa;
        border-color: transparent;
        background-color:#877971;
        background-color: #877971;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }

    .btn-check:focus+.btn-primary, .btn-primary:focus {
        color: #f8f9fa;
        background-color:#877971;
        border-color: transparent;
        box-shadow: none;
    }

    .btn-check:active+.btn-primary:focus, .btn-check:checked+.btn-primary:focus, .btn-primary.active:focus, .btn-primary:active:focus, .show>.btn-primary.dropdown-toggle:focus {
        box-shadow: none;
    }

    .btn-check:active+.btn-primary, .btn-check:checked+.btn-primary, .btn-primary.active, .btn-primary:active, .show>.btn-primary.dropdown-toggle {
       color: #f8f9fa;
        background-color:#877971;
        border-color: transparent;
        border-right: solid 1.5px #201e1c;
        border-bottom: solid 1.5px #201e1c;
        border-left: solid 1px #201e1c;
        border-top: solid 1px #201e1c;
    }
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section class="background overflow-hidden">
        <div class="container mt-5">
            <div class="row gx-lg-5 align-items-center mb-4">
                <div class="col-lg-6 mb-5 mb-lg-0 text-center" style="z-index: 10">
                    <span class="title">B</span>
                    <span class="title">l</span>
                    <span class="title">i</span>
                    <span class="title">s</span>
                    <span class="title">s</span>
                    <span class="title">f</span>
                    <span class="title">u</span>
                    <span class="title">l</span>
                    <h1>Organizer</h1>
                    <h6>Staff Side<h6>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div class="card">
                        <div class="card-body px-4 py-4 px-md-5">
                            <div id="registerform" style="display: none;">
                                <h3 class="mb-3" style="text-align: center;">Register</h3>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example2">Name</label>
                                    <input type="text" id="form3Example2" class="form-control" />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Email address</label>
                                    <input type="email" id="form3Example3" class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" id="form3Example4" class="form-control" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Confirm Password</label>
                                    <input type="password" id="confirm_password" class="form-control" />
                                </div>

                                <div align="center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4" id="submitregister">
                                        Register
                                    </button>
                                </div>
                                <!-- Submit button -->


                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Already have an account? <span
                                            style="text-decoration: underline; cursor:pointer;" id="signin-link">Sign in
                                            here</span></p>
                                    <br>
                                </div>
                            </div>

                            <div id="loginform">
                                <br><br>
                                <h3 class="mb-3" style="text-align: center;">Sign in</h3>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <br>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example6">Email address</label>
                                    <input type="email" id="form3Example6" class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example7">Password</label>
                                    <input type="password" id="form3Example7" class="form-control" />
                                </div>

                                <div align="center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4" id="submitsignin">
                                        Sign In
                                    </button>
                                </div>
                                <!-- Submit button -->


                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>Don't have an account? <span style="text-decoration: underline; cursor:pointer;"
                                            id="register-link">Register here</span></p>
                                    <br>
                                </div>
                                <br>
                            </div>

                        </div>
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
    if (sessionStorage.getItem("id") != null) {
        window.location.href = "http://localhost:81/home.php";
    }
    $(document).ready(function() {
        // Register link click event handler
        $("#register-link").click(function(e) {
            e.preventDefault(); // Prevent default link behavior
            $("#registerform").show(); // Display the register form
            $("#loginform").hide();

        });
        $("#signin-link").click(function(e) {
            e.preventDefault(); // Prevent default link behavior

            $("#registerform").hide(); // Display the register form
            $("#loginform").show();
        });

        $("#submitregister").click(function(e) {
            e.preventDefault(); // Prevent default form submission
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to register with these data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var name = $("#form3Example2").val();
                    var email = $("#form3Example3").val();
                    var password = $("#form3Example4").val();
                    var confirm_password = $("#confirm_password").val();

                    // Create an object with the form data
                    var formData = {
                        name: name,
                        email: email,
                        password: password,
                    };

                    //if password and confirm password are not the same
                    if (password != confirm_password) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Password and Confirm Password are not the same!',
                        });
                        return;
                    }

                    // Make a POST request to http://localhost:8080/client/register with the form data
                    $.ajax({
                        url: "http://localhost:8082/staff/register",
                        method: "POST",
                        data: JSON.stringify(
                            formData), // Serialize the form data as JSON
                        contentType: "application/json", // Set the content type as JSON
                        success: function(response) {
                            // Handle success response
                            console.log("Registration successful");
                            console.log(response);
                            // Redirect to another page or display a success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message
                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.log("Registration failed");
                            console.log(error);
                            //get the error message
                            var err = JSON.parse(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: err.message
                            });
                            // Display an error message
                        }
                    });
                }
            });
        });

        $("#submitsignin").click(function(e) {
            e.preventDefault(); // Prevent default form submission



            var email = $("#form3Example6").val();
            var password = $("#form3Example7").val();

            // Create an object with the form data
            var formData = {
                email: email,
                password: password
            };


            $.ajax({
                url: "http://localhost:8088/staff/login",
                method: "POST",
                data: JSON.stringify(formData), // Serialize the form data as JSON
                contentType: "application/json", // Set the content type as JSON
                success: function(response) {
                    // Handle success response
                    console.log("Login successful");
                    console.log(response);
                    sessionStorage.setItem('id', response.data.id);

                    window.location.href = "home.php";
                    // Redirect to another page or display a success message
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.log("Login failed");
                    console.log(error);
                    // Display an error message
                    //get the error message
                    var err = JSON.parse(xhr.responseText);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: err.message
                    });
                }
            });


        });


    });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>