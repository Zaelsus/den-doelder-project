<!-- need to remove -->
<li class="nav-item">
    <div class="card bg-gray-dark" style="margin-bottom: .2rem">
        <a href="/docs/3.2/components" class="nav-link  bg-black">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Quick Actions
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a href="/docs/3.2/components/main-header.html" class="nav-link">
                    <i class="far fas fa-arrow-alt-circle-up nav-icon"></i>
                    <p>Start Production</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/docs/3.2/components/main-sidebar.html" class="nav-link">
                    <i class="far fa-pause-circle nav-icon"></i>
                    <p>Pause Production</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/docs/3.2/components/control-sidebar.html" class="nav-link">
                    <i class="far fa-stop-circle nav-icon"></i>
                    <p>Stop Production</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="nav-item">
        <a href="{{ route('orders.index') }}" class="nav-link active bg-gray-dark">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Order Details</p>
        </a>
        <a href="{{ route('home') }}" class="nav-link active bg-gray-dark">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Initial Check</p>
        </a>
        <a href="{{ route('home') }}" class="nav-link active bg-gray-dark">
            <i class="nav-icon fas fa-draw-polygon"></i>
            <p>Drawings</p>
        </a>
        <a href="{{ route('home') }}" class="nav-link active bg-gray-dark">
            <i class="nav-icon fas fa-tools"></i>
            <p>Production Check</p>
        </a>
        <a href="{{ route('hourlyReports.index') }}" class="nav-link active bg-gray-dark">
            <i class="nav-icon fas fa-check"></i>
            <p>Hourly Check</p>
        </a>
    </div>
    <div class="nav-item">
        <a href="{{ route('home') }}" class="nav-link active bg-white">
            <i class="nav-icon fas fa-book"></i>
            <p>Add Notes</p>
        </a>
        <a href="{{ route('home') }}" class="nav-link active bg-white">
            <i class="nav-icon fas fa-warehouse"></i>
            <p>Log Pallets</p>
        </a>
        <a href="{{ route('home') }}" class="nav-link active bg-white">
            <i class="nav-icon fas fa-compass"></i>
            <p>Location</p>
        </a>

    </div>
</li>
{{--<li class="nav-item">--}}
{{--    <a href="/docs/3.2/components" class="nav-link" style="">--}}
{{--        <i class="nav-icon fas fa-th"></i>--}}
{{--        <p>--}}
{{--            Components--}}
{{--            <i class="right fas fa-angle-left"></i>--}}
{{--        </p>--}}
{{--    </a>--}}
{{--    <ul class="nav nav-treeview" style="display: none;">--}}
{{--        <li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/main-header.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Main Header</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/main-sidebar.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Main Sidebar</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/control-sidebar.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Control Sidebar</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/cards.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Card</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/boxes.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Small-/ Info-Box</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/direct-chat.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Direct Chat</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/timeline.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Timeline</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/ribbons.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Ribbons</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/miscellaneous.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Miscellaneous</p>--}}
{{--            </a>--}}
{{--        </li><li class="nav-item">--}}
{{--            <a href="/docs/3.2/components/plugins.html" class="nav-link">--}}
{{--                <i class="far fa-circle nav-icon"></i>--}}
{{--                <p>Plugins</p>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--    </ul>--}}
{{--</li>--}}
