<thead class="table table-bordered">
    {{--     <tr>
        <th scope="col" class="{{ request()->routeIs('home') ? 'activo' : '' }}"><a href="/">Home</a>
        </th>
        <th scope="col" class="{{ request()->routeIs('nosotros') ? 'activo' : '' }}"><a href="nosotros">Nosotros</a>
        </th>
        <th scope="col" class="{{ request()->routeIs('servicios') ? 'activo' : '' }}"><a href="servicios">Servicios</a>
        </th>
        <th scope="col" class="{{ request()->routeIs('contacto') ? 'activo' : '' }}"><a href="contacto">Contacto</a>
        </th>
    </tr> --}}
    <tr>
        <th scope="col" class="{{ setActivo('home') }}"><a href="/">Home</a>
        </th>
        <th scope="col" class="{{ setActivo('nosotros') }}"><a href="nosotros">Nosotros</a>
        </th>
        <th scope="col" class="{{ setActivo('servicios') }}"><a href="servicios">Servicios</a>
        </th>
        <th scope="col" class="{{ setActivo('contacto') }}"><a href="contacto">Contacto</a>
        </th>
        @guest
            <th><a href="{{ route('login') }}">Login</a></th>
        @else
            <th>
                <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar
                    Sesion</a>
            </th>
        @endguest

    </tr>
</thead>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: nome;">
    @csrf
</form>
