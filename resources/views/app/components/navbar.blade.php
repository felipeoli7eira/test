<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarApp" aria-controls="navbarApp" aria-expanded="false">
            <img src="{{ asset('icons/bars.svg') }}" alt="Menu" width="20">
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarApp">
            <ul class="navbar-nav mb-2 mb-lg-0 fw-500">
                <li class="nav-item">
                    <a class="nav-link" href="#">app</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.category.list') }}">categoria</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.product.list') }}">produto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('app.product.list') }}">usuários</a>
                </li>
            </ul>
        </div>
    </div>
</nav>