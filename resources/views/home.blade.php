<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awessome -->
    <script src="https://use.fontawesome.com/7789e18bf6.js"></script>

    
</head>

<body>

    <!-- Header-->
    <header>
        <nav class="navbar navbar-expand navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid font-weight-bold">
                <a href="/login" class="navbar-brand d-lg-block ml-5">
                <span class="h5 font-weight-bold"><span class="text-primary text-uppercase">MPS</span><br>
                </a>

                <div>
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a href="{{ url('login') }}" class="nav-link">LOGIN</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{ url('register') }}"
                                class="nav-link @if (Session::has('Class')) {{ Session::get('Class') }} @endif">REGISTER</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->



@yield('content')




</body>
    
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
</body>

</html>