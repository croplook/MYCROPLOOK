<aside class="hit_sidebar open_sidbar sidebar-slide-push">
    <ul>
    <li><a class="navbar-brand nav-icon" href="{{ url('/') }}">
              CROPLOOK
    </a></li>
        <li><a href="/admin/crop-lists">
    <span class="nav-icon"><i class="fa fa-leaf" aria-hidden="true"></i></span>
    <span class="remove_text"> Crop Lists</span></a></li>
        <li><a href="/admin/banners" class="active">
    <span class="nav-icon"><i class="fa fa-picture-o" aria-hidden="true"></i></span>
    <span class="remove_text"> Banners</span></a></li>
        <li><a href="{{route('admin.statistics')}}">
    <span class="nav-icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
    <span class="remove_text"> Statistics</span></a></li>
        <li><a href="{{route('admin.seasonal-crops')}}">
    <span class="nav-icon"><i class="fa fa-list" aria-hidden="true"></i></span>
    <span class="remove_text"> Seasonal Crops</span></a></li>
        <li><a href="{{route('admin.confirm-users')}}">
    <span class="nav-icon"><i class="fa fa-check-circle" aria-hidden="true"></i></span>
    <span class="remove_text"> Confirm Users</span></a></li>
        <li><a href="{{route('admin.admin-users')}}">
    <span class="nav-icon"><i class="fa fa-lock" aria-hidden="true"></i></span>
    <span class="remove_text">Add/Remove Admin</span> </a></li>
        <li>
    <a  href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <span class="nav-icon"><i class="fa fa-power-off" aria-hidden="true"></i></span>
     <span class="remove_text">{{ __('Logout') }}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
    </span>
 </a>

</li>
    </ul>
</aside>

