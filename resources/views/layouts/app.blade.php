<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>@yield('title') - Todo List</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand">Todo List</a>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <div class="bg-white mx-2 d-none d-lg-block">
                        @auth
                            <form id="logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a role="button" class="nav-link active bg-dark"
                                    onclick="document.getElementById('logout').submit()">Logout</a>
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar -->
    <!-- main content -->
    <div class="container my-4 pb-5">
        @yield('content')
    </div>
    <!-- main content -->
    <!-- footer -->
    <div class="copyright py-4 text-center text-white navbar fixed-bottom navbar-dark bg-dark">
        <div class="container">
            <small>
                Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank"
                    href="https://www.emilbabazade.com">
                    Emil Babazade
                </a>
            </small>
        </div>
    </div>
    <!-- footer -->
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
