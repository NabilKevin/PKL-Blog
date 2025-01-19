<div class="z-2 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-fixed top-0 bottom-0" style="width: 280px;" bis_skin_checked="1">
    <a href="/admin" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Administrator</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/admin/" class="nav-link {{ $title === 'Home' ? 'active' : 'text-white' }}" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
          Home
        </a>
      </li>
      <li>
        <a href="/admin/posts" class="nav-link {{ $title === 'Blog' ? 'active' : 'text-white' }}">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
          Blog
        </a>
      </li>
    </ul>
    <hr>
  </div>
