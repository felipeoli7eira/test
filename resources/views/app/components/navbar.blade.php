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

                <li class="nav-item dropdown">
                    <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="productDropDown"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false">produtos
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="productDropDown">
                        <li><a class="dropdown-item fw-500" href="#">listagem</a></li>
                        <li><a class="dropdown-item fw-500" href="#">cadastro</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="userDropDown"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false">usuários
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="userDropDown">
                        <li><a class="dropdown-item fw-500" href="#">listagem</a></li>
                        <li><a class="dropdown-item fw-500" href="#">cadastro</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>