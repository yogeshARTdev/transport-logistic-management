<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{request()->is('/') ? '' : 'collapsed' }}" href="{{ url('/') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('warehouse*') ? '' : 'collapsed' }}"
                href="{{ route('warehouse.index') }}">
                <i class="bi bi-person"></i><span>Warehouse</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('goods*') ? '' : 'collapsed' }}" href="{{ route('goods.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Goods</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('receivedgoods*') ? '' : 'collapsed' }}"
                href="{{ route('receivedgoods.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Received Goods</span>
            </a>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('supplier*') ? '' : 'collapsed' }}" href="{{ route('supplier.index') }}">
                <i class="bi bi-person"></i><span>Supplier</span>
            </a>
        </li><!-- End Tables Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('client*') ? '' : 'collapsed' }}" href="{{ route('client.index') }}">
                <i class="bi bi-person"></i><span>Client</span>
            </a>
        </li><!-- End Charts Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('category*') ? '' : 'collapsed' }}" href="{{ route('category.index') }}">
                <i class="bi bi-menu-button-wide"></i><span>Category</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{request()->is('driver*') ? '' : 'collapsed' }}" href="{{ route('driver.index') }}">
                <i class="bi bi-person"></i><span>Driver</span>
            </a>
        </li><!-- End Icons Nav -->

        <li class="nav-item">
            <a class="nav-link {{request()->is('trip*') ? '' : 'collapsed' }}" href="{{ route('trip.index') }}">
                <i class="bi bi-person"></i><span>Trips</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('vehicletype*') ? '' : 'collapsed' }}"
                href="{{ route('vehicletype.index') }}">
                <i class="bi bi-circle"></i><span>Vehicle Type</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('vehicle*') ? '' : 'collapsed' }}" href="{{ route('vehicle.index') }}">
                <i class="bi bi-circle"></i><span>Vehicle</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{request()->is('contact*') ? '' : 'collapsed' }}" href="{{ url('/contact') }}">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Select all links with the class "nav-link"
    var links = $('.nav-link');

    // Bind a click event handler to the links
    links.on('click', function() {
        // Remove the "collapsed" class from the clicked link
        $(this).removeClass('collapsed');
    });
});
</script>