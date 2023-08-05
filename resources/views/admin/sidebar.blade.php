  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/temp/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/temp/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>
      <form action="{{route('logout')}}" method="post" class="logout">
            @csrf
            <button type="submit">Đăng xuất</button>
      </form>
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{route('MenuAdmin')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý menu
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('ProductAdmin')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý sản phẩm
              </p>
            </a>
          </li>
            <li class="nav-item">
                <a href="{{route('cateAdmin')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý danh mục sản phẩm
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('addressAdmin')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý địa chỉ
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('countryAdmin')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý đất nước
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('vouchers.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý vouchers
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('orders.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Quản lý orders
                    </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
