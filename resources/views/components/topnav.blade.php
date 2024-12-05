<div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
</div>
<ul class="navbar-nav navbar-right">
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                                                 class="nav-link notification-toggle nav-link-lg beep"><i
                class="far fa-bell"></i></a>
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
            <div class="dropdown-header">Notifications
                <div class="float-right">
                    <a href="#">Mark All As Read</a>
                </div>
            </div>
            <div class="dropdown-list-content dropdown-list-icons">
                @if(true)
                    @for($i = 1; $i < 40; $i++)
                        <a href="#" class="dropdown-item dropdown-item-unread">
                            <div class="dropdown-item-icon bg-primary text-white">
                                <i class="fas fa-code"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                Template update is available now!
                                <div class="time text-primary">2 Min Ago</div>
                            </div>
                        </a>
                    @endfor
                @else
                    <p class="text-muted p-2 text-center">No notifications found!</p>
                @endif
            </div>
        </div>
    </li>
    <li class="dropdown">
        <a href="#" class="nav-link nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">SITB FRAMEWORK</div>
        </a>
    </li>
</ul>
