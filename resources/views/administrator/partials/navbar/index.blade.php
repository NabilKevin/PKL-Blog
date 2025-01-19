<nav class="navbar navbar-expand-lg bg-dark px-4 navbar-dark position-fixed start-0 end-0 top-0 z-1">
    <div class="container-fluid">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                </form>
            </li>
        </ul>
      </div>
    </div>
  </nav>
