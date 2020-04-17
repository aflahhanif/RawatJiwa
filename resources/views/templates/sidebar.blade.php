<!-- start of sidebar -->
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('blog') }}">Rawat Jiwa</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">RJ</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
        <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
      <li class="menu-header">Starter</li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>User</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('users.index')}}">Daftar User</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('posts.index')}}">Daftar Post</a></li>
          <li><a class="nav-link" href="{{route('posts.tampil_hapus')}}">Trash</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-list"></i> <span>Kategori</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('kategoris.index')}}">Daftar Kategori</a></li>
        </ul>
      </li>
      <!--
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Tag</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="{{route('tags.index')}}">Daftar Tag</a></li>
        </ul>
      </li>
    -->
    </aside>
</div>
<!-- end of sidebar -->