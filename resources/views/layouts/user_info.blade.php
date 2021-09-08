
<div class="user-account" style="display: inline;">
                <div class="user_div">

                        {{-- <img src="{{asset('public/uploads/'.$setting->favicon)}}"  class="user-photo" style="object-fit: contain" alt="Display Picture"> --}}

                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <strong>Admin</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">


                        {{-- <li><a href="{{url('user/view-profile')}}"><i class="icon-user"></i>My Profile</a></li> --}}


                       <!--  <li><a href="#"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li> -->

                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                             class="icon-menu"> <i class="icon-power"></i>Logout</a> </li>
                        {{-- <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form> --}}
                        <li class="divider"></li>

                    </ul>
                </div>
            </div>
