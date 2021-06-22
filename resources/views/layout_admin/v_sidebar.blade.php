 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="font-family: Poppins, Arial, sans-serif;">
     <!-- Brand Logo -->
     <span class="brand-link">
         <span class="font-weight-bold">
             <font style="color: white;">PT. AGRI SERVIS SAKTI</font>
         </span>
     </span>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('template_admin') }}/dist/img/delaval.png" class="img-circle elevation-2" alt="delaval">
             </div>
             <div class="info">
                 <a href="/" class="d-block">
                     <font style="color: white;">{{ Auth::user()->name }}</font>
                 </a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item">
                     <a href="{{ route('/') }}" class="nav-link {{ Route::currentRouteName() === '/' ? 'active' : '' }}">
                         <font style="color: white;"><i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>Dashboard</p>
                         </font>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('barang') }}" class="nav-link {{ Route::currentRouteName() === 'barang' ? 'active' : '' }}">
                         <font style="color: white;"><i class="nav-icon fa fa-shopping-cart"></i>
                             <p>Barang</p>
                         </font>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('pesanan') }}" class="nav-link {{ Route::currentRouteName() === 'pesanan' ? 'active' : '' }}">
                         <font style="color: white;"><i class="nav-icon fa fa-money-bill"></i>
                             <p>Pesanan</p>
                         </font>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('komentar') }}" class="nav-link {{ Route::currentRouteName() === 'komentar' ? 'active' : '' }}">
                         <font style="color: white;"><i class="nav-icon fa fa-comment"></i>
                             <p>Komentar</p>
                         </font>
                     </a>
                 </li>
             </ul>

         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

<style>
    .icon {
        font-style: normal;
    }
    .r{
        font-size: 20px;

    }
</style>
