<aside class="hit_sidebar open_sidbar sidebar-slide-push">
    <ul>
    <li><a class="navbar-brand nav-icon" href="{{ url('/') }}">
        CROPLOOK
    </a></li>
        <li><a href="#">
    <span class="nav-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
    <span class="remove_text">Admin</span></a></li>
        <li><a href="#" class="activ">
    <span class="nav-icon"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
    <span class="remove_text">Dashboard</span></a></li>
        <li><a href="#">
    <span class="nav-icon"><i class="fa fa-inbox" aria-hidden="true"></i></span>
    <span class="remove_text"> Inbox</span></a></li>
        <li><a href="#">
    <span class="nav-icon"><i class="fa fa-bell-o" aria-hidden="true"></i></span>
    <span class="remove_text"> Notification</span></a></li>
        <li><a href="#">
    <span class="nav-icon"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
    <span class="remove_text"> Spam</span></a></li>
        <li><a href="#">
    <span class="nav-icon"><i class="fa fa-cogs" aria-hidden="true"></i></span>
    <span class="remove_text">Settings</span> </a></li>
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

