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
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        @guest
        <a href="\" class="d-block"> </a>

        @else
        <a href="#" class="d-block"> {{ Auth::user()->name }}</a>

        @endguest

        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview menu-open">
            <a href="/users" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                MASTER USER
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="/tender" class="nav-link active">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                TENDER
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="/bobot" class="nav-link active">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                KELOLA BOBOT
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                MASTER SUPPLIER
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="/penawaranharga" class="nav-link active">
              <i class="nav-icon fas fa-poll-h"></i>
              <p>
                PENAWARAN HARGA
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
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


  