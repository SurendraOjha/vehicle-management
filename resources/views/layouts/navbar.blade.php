<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">

      


        {{-- brand --}}
        <li class="@if( (request()->is('/')) ||
            (request()->is('home'))
        )
        active
        @endif">
        <a href="{{route('brand.index')}}">
            &nbsp;&nbsp;&nbsp;&nbsp;

            <span>Brand</span></a>
        </li>

        {{-- category --}}

        <li class="@if( (request()->is('/')) ||
            (request()->is('home'))
        )
        active
        @endif">
        <a href="{{route('category.index')}}">
            &nbsp;&nbsp;&nbsp;&nbsp;

            <span>Category</span></a>
        </li>


        {{-- subcategory --}}
        <li class="@if( (request()->is('/')) ||
            (request()->is('home'))
        )
        active
        @endif">
        <a href="{{route('sub-category.index')}}">
            &nbsp;&nbsp;&nbsp;&nbsp;

            <span>Sub Category</span></a>
        </li>

        {{-- vehicle --}}

        <li class="@if( (request()->is('/')) ||
            (request()->is('home'))
        )
        active
        @endif">
        <a href="{{route('vehicle.index')}}">
            &nbsp;&nbsp;&nbsp;&nbsp;

            <span>Vehicle</span></a>
        </li>




    </ul>
</nav>
