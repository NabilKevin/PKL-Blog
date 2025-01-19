<nav class="navbar navbar-expand-lg bg-dark px-4 navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">PKL Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Home' ? 'active' : '' }}" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === 'About' ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ $title === 'Blog' ? 'active' : '' }}" href="/posts">Blog</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="/login" class="nav-link {{ $title === 'Login' ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
