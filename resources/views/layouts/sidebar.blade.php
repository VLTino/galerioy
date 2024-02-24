<div class="sidebar">
    <a href="/" style="color: red" class="side{{ request()->is('/') ? 'active' : '' }}"><h1>Pinterus</h1></a>
    @if (Auth::user()->level == "admin")
    <a href="/admin" class="side{{ request()->is('admin') ? 'active' : '' }}">Dashboard Admin</a>
    <a href="/userdata" class="side{{ request()->is('userdata') ? 'active' : '' }}">User Data</a>
    <a href="/registeradmin" class="side{{ request()->is('registeradmin') ? 'active' : '' }}">Register Admin</a>
        
    @endif
    <a href="/galeriku" class="side{{ request()->is('galeriku') ? 'active' : '' }}">Galeriku</a>
    <a href="/upload" class="side{{ request()->is('upload') ? 'active' : '' }}">Upload Gambar</a>
</div>
