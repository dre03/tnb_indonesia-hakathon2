    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Pages</li>
            <li class="nav-item {{ Request::is('event*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/event">
                    <i class="bi bi-calendar2-event-fill"></i>
                    <span>Event</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('narasumber') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/narasumber">
                    <i class="bi bi-person-workspace"></i>
                    <span>Narasumber</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('participant') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/participant">
                    <i class="bi bi-person-fill-up"></i>
                    <span>Peserta</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('payment') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/payment">
                    <i class="bi bi-credit-card-2-back"></i>
                    <span>Payment</span>
                </a>
            </li>
            <li class="nav-item {{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="/user">
                    <i class="bi bi-person-square"></i>
                    <span>User</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->

    @push('extra-js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var path = window.location.pathname;
                $('.menu li a').each(function() {
                    if ($(this).attr('href') === path) {
                        $(this).addClass('active');
                    }
                });
            });
        </script>
    @endpush
