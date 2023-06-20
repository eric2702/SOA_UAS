<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Client - Login</title>
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

#radius-shape-1 {
    height: 220px;
    width: 220px;
    top: -60px;
    left: -130px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}

#radius-shape-2 {
    border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
    bottom: -60px;
    right: -110px;
    width: 300px;
    height: 300px;
    background: radial-gradient(#44006b, #ad1fff);
    overflow: hidden;
}

.bg-glass {
    background-color: hsla(0, 0%, 100%, 0.9) !important;
    backdrop-filter: saturate(200%) blur(25px);
}

.title-word {
    animation: color-animation 4s linear infinite;
}

.title-word-1 {
    --color-1: #DF8453;
    --color-2: #3D8DAE;
    --color-3: #E4A9A8;
}

.title-word-2 {
    --color-1: #DBAD4A;
    --color-2: #ACCFCB;
    --color-3: #17494D;
}

.title-word-3 {
    --color-1: #ACCFCB;
    --color-2: #E4A9A8;
    --color-3: #ACCFCB;
}

.title-word-4 {
    --color-1: #3D8DAE;
    --color-2: #DF8453;
    --color-3: #E4A9A8;
}

@keyframes color-animation {
    0% {
        color: var(--color-1)
    }

    32% {
        color: var(--color-1)
    }

    33% {
        color: var(--color-2)
    }

    65% {
        color: var(--color-2)
    }

    66% {
        color: var(--color-3)
    }

    99% {
        color: var(--color-3)
    }

    100% {
        color: var(--color-1)
    }
}
</style>

<body>
    <!-- Section: Design Block -->
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">


        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-3  fw-bold title">
                        <span class="title-word title-word-1">Welcome</span>
                        <span class="title-word title-word-2">at</span>
                        <span class="title-word title-word-3">Event</span>
                        <span class="title-word title-word-4">Genius</span>
                    </h1>
                    <h2 class="my-3  fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Unleash the Power of <br />
                        <span style="color: hsl(218, 81%, 75%)">Memorable Events</span>
                    </h2>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Experience unforgettable events brought to life by our expert team of organizers. From corporate
                        conferences to social gatherings, we handle every detail to deliver seamless and stress-free
                        experiences that exceed your expectations.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">

                        <div class="card-body px-4 py-5 px-md-5">





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
    <script>
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

                    // Create an object with the form data
                    var formData = {
                        name: name,
                        email: email,
                        password: password
                    };

                    // Make a POST request to http://localhost:8080/client/register with the form data
                    $.ajax({
                        url: "http://localhost:8080/client/register",
                        method: "POST",
                        data: JSON.stringify(
                            formData), // Serialize the form data as JSON
                        contentType: "application/json", // Set the content type as JSON
                        success: function(response) {
                            // Handle success response
                            console.log("Registration successful");
                            console.log(response);
                            // Redirect to another page or display a success message
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.log("Registration failed");
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
                url: "http://localhost:8088/client/login",
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