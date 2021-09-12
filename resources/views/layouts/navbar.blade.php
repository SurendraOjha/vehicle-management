<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">




        {{-- home --}}
        <li class="">
            <a href="{{route('home.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->home }}</span></a>
        </li>

        {{-- who are we --}}

        <li class="">
            <a href="{{route('who-are-we.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->who_are_we }}</span></a>
        </li>


        {{-- personal consultancy --}}
        <li class="">
            <a href="{{route('personal-consultancy.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->personal_consultancy }}</span></a>
        </li>


        {{-- courses --}}
        <li class="">
            <a href="{{route('course.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->courses }}</span></a>
        </li>
        {{-- stock analysis --}}
        <li class="">
            <a href="{{route('stock-analysis.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->stock_analysis }}</span></a>
        </li>
        {{-- contact us --}}
        <li class="">
            <a href="{{route('contact-us.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->contact_us }}</span></a>
        </li>
        {{-- terms and conditions --}}

        <li class="">
            <a href="{{route('terms-and-conditions.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>{{ $setting->terms_and_conditions }}</span></a>
        </li>

        {{-- settings --}}

        <li class="">
            <a href="{{route('setting.index')}}">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Settings</span></a>
        </li>




    </ul>
</nav>
