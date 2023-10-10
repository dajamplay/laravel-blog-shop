<div class="sidebar">
    <a href="{{ route('dashboard.users.index')}}" class="brand-link">
        <i class="fas fa-wifi text-success"></i>
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>
    <nav class="mt-2 pb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('dashboard.users.index')}}" class="nav-link @linkactive('dashboard.users.*')">
                    <i class="nav-icon fa fa-users"></i><p>{{__('Пользователи')}}</p>
                </a>
            </li>
        </ul>
    </nav>
</div>

