<div class="sidebar-left">
    <div class="sidebar-left-info">

        <div class="user-box">
            <div class="d-flex justify-content-center">
                <img src="{{asset('assets/admin/template1/images/face2.jpg')}}" alt="" class="img-fluid rounded-circle"> 
            </div>
            <div class="text-center text-white mt-2">
                <h6>Trương Uyên</h6>
                <p class="text-muted m-0">Admin</p>
            </div>
        </div>   
                            
        <!--sidebar nav start-->
        <ul class="side-navigation">
          <li class="nav-item nav-category">
            <span class="nav-link">Menu</span>
          </li>
          {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{asset('admin/pages/admin-layout')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Thống kê</span>
            </a>
          </li> --}}
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Quản lý hóa đơn</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/admin/import">Quản lý hóa đơn nhập</a></li>
                <li class="nav-item"> <a class="nav-link" href="/admin/invoice">Quản lý hóa đơn bán</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/category">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Quản lý loại sản phẩm</span>
            </a>    
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/product">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Quản lý sản phẩm</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/providers">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Quản lý nhà cung cấp</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/customer">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">Quản lý khách hàng</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="/admin/employee">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Quản lý nhân viên</span>
            </a>
          </li>
        </ul><!--sidebar nav end-->
    </div>
</div>