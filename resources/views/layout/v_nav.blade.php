<ul class="sidebar-menu" data-widget="tree">
    <li class="header"></li>
    <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li class="{{ request()->is('barang') ? 'active' : '' }}"><a href="/barang"><i class="fa fa-shopping-cart"></i> <span>Barang</span></a></li>
    <li class="{{ request()->is('pembelian') ? 'active' : '' }}"><a href="/pembelian"><i class="fa fa-money"></i> <span>Pembelian</span></a></li>
    <li class="{{ request()->is('komentar') ? 'active' : '' }}"><a href="/komentar"><i class="fa fa-comment"></i> <span>Komentar User</span></a></li>
</ul>
