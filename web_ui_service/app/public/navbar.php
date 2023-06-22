<style>
    .title {
        /* font-weight:bold; */
        font-family: 'Lobster', cursive;
        color: #f8f9fa;
    }
    .navbar-color {
        background-color:#cd9678;
    }
    a.nav-link.active, .navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link {
        color: #f8f9fa !important;
    }

    .nav-item {
        margin-right:10px;
    }

    .nav-link.active.real:after {
        transition: all ease-in-out .2s;
        background: none repeat scroll 0 0 #ffffff;
        content: "";
        display: block;
        height: 2px;
        width: 0;
    }
    .nav-link.active.real:hover:after {
        width: 100%;
    }

    /* .nav-link.active.real:active, .nav-link.active.real:hover{
        border-bottom: solid 1.5px white;
    } */

    .bg-light{
        /* background-image: linear-gradient(90deg, #deb69e 25%, #dbaa8c 25%, #dbaa8c 50%, #deb69e 50%, #deb69e 75%, #dbaa8c 75%, #dbaa8c 100%); */
        background-image: linear-gradient(90deg, #deb69e 25%, #dbaa8c 25%, #dbaa8c 50%, #deb69e 50%, #deb69e 75%, #dbaa8c 75%, #dbaa8c 100%);
        background-size: 60.00px 60.00px;
    }
</style>

<nav class="navbar navbar-light bg-light">
  <div class="container text-center justify-content-center">
    <a class="navbar-brand" href="#">
        <!-- <img src="images/soa_logo-small.png" alt="" width="30" height="24"> -->
        <h3 class="title"></i> Blissful <br> Organizer </h3>
    </a>
  </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light navbar-color">
    <div class="container-fluid text-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active real" aria-current="page" href="home.php">Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active decor" aria-current="page" href="#">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active real" aria-current="page" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active decor" aria-current="page" href="#">|</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active real" aria-current="page" href="logout.php">Logout</a>
                </li>


            </ul>

        </div>
    </div>
</nav>