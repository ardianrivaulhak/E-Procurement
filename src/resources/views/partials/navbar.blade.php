<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <!-- Branding -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <strong>VhiWEB</strong>
            </a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/products') }}">Product List</a></li>
            <li><a href="{{ url('/vendors/register') }}">Tambah Vendor</a></li>
            <li><a href="{{ url('/admin/vendors') }}">Pending Vendors</a></li>
            <li><a href="{{ route('actionlogout') }}">Logout</a></li>
        </ul>
    </div>
</nav>