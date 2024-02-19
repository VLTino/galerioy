<div class="sidebar">
    <a href="/" style="color: red" class="side{{ request()->is('/') ? 'active' : '' }}"><h1>Pinterus</h1></a>
    <a href="/galeriku" class="side{{ request()->is('galeriku') ? 'active' : '' }}">Galeriku</a>
    <a href="/upload" class="side{{ request()->is('upload') ? 'active' : '' }}">Upload Gambar</a>
    <a href="/favorit" class="side{{ request()->is('contact') ? 'active' : '' }}">Favorit</a>
</div>
