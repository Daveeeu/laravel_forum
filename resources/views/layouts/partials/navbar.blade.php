<header class="p-3 mb-5 bg-light text-white" style="box-shadow: 0 8px 8px -4px lightblue;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><h3><a href="/" class="nav-link px-2 text-secondary">Forum</a></h3></li>
      </ul>

      @auth
        <div class="text-end">
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-dark me-2">Kijelentkezés</a>
        </div>
      @endauth

      @guest
        <div class="text-end">
          <a href="{{ route('login.perform') }}" class="btn btn-outline-dark me-2">Bejelentkezés</a>
          <a href="{{ route('register.perform') }}" class="btn btn-warning">Regisztráció</a>
        </div>
      @endguest
    </div>
  </div>
</header>