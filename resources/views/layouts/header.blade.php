<style>
    .menu  {
  list-style-type: none;
  margin: 0;
  padding: 12px;
  overflow: hidden;
  background-color: lightgrey;
}

.menu li {
    float: left;
    padding: 4px;
    border-right: 1px solid;
}

.menu li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.menu li a:hover:not(.active) {
  background-color: #111;
}

.menu li a.active {
  float: right;
}

.active {
  background-color: #4CAF50;
}
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Custom Dashboard - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  </head>
<header class="pb-3 mb-4 border-bottom" style="
    margin-left: 112px; margin-right:112px;
">
        <div class="row">
            <div class="col-md-11">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="/images/email-logo.png" alt="BootstrapBrain Logo" width="100">
                </a>          
            </div>
            <div class="col-md-1">
                <a class="dropdown-item" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <a class="dropdown-item" href="/profile">profile
                </a>

                <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST" class="d-none">
                    <input type="hidden" name="_token" value="CGSg8DIdbZAxIaCX4Ii7IwV1Q3qp2ImdgA2fFpQf" autocomplete="off">                </form>
            </div>
        </div>
        <div class="menu-items">
            <ul class ="menu">
                <li><a href="{{ route('url.create') }}">Create URL</a></li>
                <li><a href= "{{ route('url-index') }}">My url</a></li>
                <li>PFI wiki</li>
            </ul>
        </div>
      
    </header>
        