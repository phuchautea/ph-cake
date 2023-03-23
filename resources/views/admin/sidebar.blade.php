    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link text-center">
            <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
        </a>
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/template/admin/images/avatar.png" class="img-circle
                    elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        {{ Auth::user()-> email }}
                    </a>
                    <span class="badge bg-danger">
                        Admin
                    </span>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Nhân viên</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Đăng xuất</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>