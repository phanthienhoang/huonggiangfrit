<div class="sidebar">

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <!-- ========================================================================================================================== -->
<!-- ========================================================================================================================== -->

      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Catalogue
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Sản phẩm
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Tin tức
          </p>
        </a>
      </li>
      <li class="nav-item">
      <a href="{{route('admin.shareholders.index')}}" class="nav-link {{ Request::segment(2) === 'shareholders' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Quan hệ cổ đông
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Thư viện ảnh
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
          <i class="fas fa-circle nav-icon"></i>
          <p>
            Tuyển dụng
          </p>
        </a>
      </li>
      <!-- ========================================================================================================================== -->
<!-- ========================================================================================================================== -->

      <li
        class="nav-item has-treeview {{ Request::segment(2) === '#' || Request::segment(2) === '#' || Request::segment(2) === '#' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-fw fa-cubes"></i>
          <p>
            Tin tức
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>CRUD TIN TỨC</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách Tin Tức</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================================================================================== -->
<!-- ========================================================================================================================== -->

      <li
        class="nav-item has-treeview {{ Request::segment(2) === '#' || Request::segment(2) === '#' || Request::segment(2) === '#' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-fw fa-cubes"></i>
          <p>
            Loại Tin tức
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>CRUD</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Danh sách Thể Loại</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================================================================================== -->
<!-- ========================================================================================================================== -->

      <li
        class="nav-item has-treeview {{ Request::segment(2) === '#' || Request::segment(2) === '#' || Request::segment(2) === '#' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-fw fa-cubes"></i>
          <p>
           Sản Phẩm
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>CRUD</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- ========================================================================================================================== -->

<!-- ========================================================================================================================== -->
      <li
        class="nav-item has-treeview {{ Request::segment(2) === '#' || Request::segment(2) === '#' || Request::segment(2) === '#' ? 'menu-open' : null }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-fw fa-cubes"></i>
          <p>
           Loại Sản Phẩm
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>CRUD</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link {{ Request::segment(2) === '#' ? 'active' : null }}">
              <i class="far fa-circle nav-icon"></i>
              <p>List</p>
            </a>
          </li>
        </ul>
      </li>
      
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>