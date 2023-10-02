<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/7789e18bf6.js"></script>

    <link rel="stylesheet" href="../css/user-home.css">
</head>

<body>

    <!-- Header-->
    <header class="sticky-top">
        <nav class="navbar navbar-expand navbar-light " style="background-color: #e3f2fd;">
            <div class="container-fluid font-weight-bold">
                <a href="#" class="navbar-brand d-lg-block ml-lg-5">
                    <span class="text-primary">MRP</span>
                </a>

                <div>
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <div class="container-fluid">
        <div class="row">
            <!-- Left Site -->
            <div class="col-12 col-lg-2 bg-light border-right d-none d-lg-block" style="height: 100vh">
                <!-- logo -->
                <div class="row border-bottom mb-2 mt-4 bg-white">
                    <div class="col-12">
                        <div class="text-center mt-2 mb-3">
                            <span class="h5 font-weight-bold"><span class="text-primary text-uppercase">User</span><br>
                                <span class="text-danger">{{ session()->get('user.name')}}</span></span>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row bg-white mt-4">
                        <a href=" /prescriptionlist "
                            class="btn border-bottom col-12 text-left font-weight-bold"> My Prescription</a>

                        <a href="/upload" class="btn border-bottom col-12 text-left font-weight-bold"></i>New Prescription</a>

                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col text-center mt-5 ">
                        <a href="{{ url('logout') }}" class="btn btn-danger w-100 mt-5 font-weight-bold">Logout</a>
                    </div>
                </div>


            </div>
            <!-- End Left -->

            <!-- Right Site -->
            <div class="col-12 col-lg-10">
                <div class="row mt-3 px-3 mb-3">
                   
                </div>
                @yield('dashapace')

                
            </div>
            <!-- End Right -->
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        @yield('alertHide')
    </script>

    <div>
        @yield('ajax')
    </div>
</body>

</html>