<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">Library</a>
<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="navbar-nav">
    <div class="nav-item d-flex">
        <a class="nav-link px-3" href="#">{{ auth()->user()->name }}</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" class="nav-link px-3" value="Sign out">
        </form>
    </div>
</div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('books.index') }}">
              <span data-feather="books" class="align-text-bottom"></span>
              Books
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('categories.index') }}">
              <span data-feather="categories" class="align-text-bottom"></span>
              Categories
            </a>
          </li>
        </ul>
        @admin
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>_________</span>
            <a class="link-secondary">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.librarians') }}">
              <span data-feather="librarians" class="align-text-bottom"></span>
              Librarians
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.readers') }}">
              <span data-feather="readers" class="align-text-bottom"></span>
              Readers
            </a>
          </li>
        </ul>
        @endadmin
      </div>
    </nav>

    @yield('content')

  </div>
</div>

</body>
</html>
