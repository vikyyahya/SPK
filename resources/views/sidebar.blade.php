<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{asset('lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">PT Powertek Indonesia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- Sidebar Menu -->
      <nav class="mt-3">
        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
          @if (Request::is('users'))
          <a href="/users" class="nav-link active">
          @else
          <a href="/users" class="nav-link">
          @endif
              <i class="nav-icon fas fa-users"></i>
              <p>
                MASTER USER
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open mt-2">
          @if (Request::is('tender'))
          <a href="/tender" class="nav-link active">
          @else
          <a href="/tender" class="nav-link">
          @endif
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                TENDER
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open mt-2">
          @if (Request::is('bobot'))
          <a href="/bobot" class="nav-link active">
          @else
          <a href="/bobot" class="nav-link">
          @endif
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                KELOLA BOBOT
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open mt-2">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                MASTER SUPPLIER
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open mt-2">
          @if (Request::is('listpenawaranharga'))
          <a href="/listpenawaranharga" class="nav-link active">
          @else
          <a href="/listpenawaranharga" class="nav-link">
          @endif             
          <i class="nav-icon fas fa-poll-h"></i>
              <p>
                PENAWARAN HARGA
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open mt-2">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                PERANGKINGAN
              </p>
            </a>
          </li>


        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  