<!doctype html>
<html lang="en">
    <head>
        <title>Student Management System</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <nav
                class="navbar navbar-expand-sm navbar-dark bg-dark"
            >
                <div class="container">
                    @if (session()->has('email'))
                    <a class="navbar-brand" href="{{ url('/dashboard') }}">Navbar</a>
                    <div class="collapse navbar-collapse" id="collapsibleNavId">
                        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/dashboard') }}" aria-current="page"
                                    >Home
                                    <span class="visually-hidden">(current)</span></a
                                >
                            </li>
                                
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('classroom') }}">Classroom Add</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/classroom/view') }}">Classroom View</a>
                            </li> <li class="nav-item">
                                <a class="nav-link" href="{{ url('/student/add') }}">Student Add</a>
                            </li> <li class="nav-item">
                                <a class="nav-link" href="{{ url('/student/view') }}">Student View</a>
                            </li>
                           
                        </ul>
                        
                           <a href="{{ url('/logout') }}">
                            <button class="btn btn-danger">Logout</button>
                           </a>
                    
                    </div>
                    @endif
                </div>
            </nav>
        </header>
        <main>
       @yield('content')
        </main>
    </body>
</html>
