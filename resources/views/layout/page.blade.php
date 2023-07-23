<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
</head>

<body class="position-absolute d-flex flex-column vw-100 vh-100 overflow-hidden">
    <header class="d-flex w-100 border-bottom py-1">
        <a href="/"
            class="nav-brand d-none flex-shrink-0 text-decoration-none d-flex ms-3 d-md-flex flex-column flex-md-row align-items-center"
            style="width: 280px;">
            <img src={{ url('img/tasklogo.png') }} width="70" alt="logo" />
            <span class="display-6 ps-4 text-uppercase" style="margin-top: -5px;">TASK</span>
        </a>
        <a href="/"
            class="nav-brand d-md-none flex-shrink-0 text-decoration-none d-flex flex-column flex-md-row align-items-center justify-content-center"
            style="width: 100px;">
            <img src="https://bams.ortadeltech.com/assets/images/pdp_logo.png" width="75" alt="logo" />
        </a>
        <nav class="navbar flex-grow-1">
            <ul class="nav w-100 align-items-center">
                <li class="nav-item">
                    <a class="btn btn-link btn-lg" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar"
                        aria-expanded="true" aria-controls="sidebar">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <h1 class="h3">List</h1>
                </li>
                <li class="ms-auto nav-item">
                    <a class="nav-link border m-2 text-danger" href={{ url('logout') }}>
                        LOGOUT
                    </a>
                </li>
                <li class="nav-item">
                </li>
            </ul>
        </nav>
    </header>
    <main class="d-flex flex-grow-1 overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="collapse collapse-horizontal show border-end h-100">
            <div class="content" style="width: 300px;">
                <!-- Profile -->
                <div class="profile d-flex align-items-center border-bottom">
                    <img class="rounded-3 m-3 shadow-sm" src="https://bams.ortadeltech.com/assets/images/profile.png"
                        width="80" alt="profile image">
                    <span class="ms-2">
                        <b class="name lead lh-sm">{{ Auth::user()->name }}</b>
                    </span>
                </div>
                <nav class="list-group">
                    <ul class="nav">
                        <li class="nav-item w-100">
                            <a href={{ url('task') }} class="nav-link active p-3 border-bottom" aria-current="true">
                                <i class="fa fa-users px-2"></i> &nbsp; Task List
                            </a>
                            <a href={{ url('trash') }} class="nav-link active p-3 border-bottom" aria-current="true">
                                <i class="fa fa-trash px-2"></i> &nbsp; Trash
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content flex-grow-1 overflow-y-auto p-3 p-md-4 px-lg-5 mx-lg-5">
            @yield('content')
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
   
</body>

</html>