<!-- need to remove -->
<li class="nav-item">
    <div class="card bg-gray-dark disabled" style="margin-bottom: .2rem">
        <a href="#" class="nav-link bg-black">
            <i class="nav-icon fas fa-th"></i>
            <p>
                Quick Actions
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a href="#" class="nav-link btn text-left disabled bg-success">
                    <i class="far fas fa-arrow-alt-circle-up nav-icon"></i>
                    <p>Start Production</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link btn text-left disabled bg-orange">
                    <i class="far fa-pause-circle nav-icon"></i>
                    <p>Pause Production</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link btn text-left disabled bg-danger">
                    <i class="far fa-stop-circle nav-icon"></i>
                    <p>Stop Production</p>
                </a>
            </li>
        </ul>
    </div>
    <div class="nav-item">
        <a href="{{ route('orders.show',$order) }}" class="nav-link active btn bg-gray-dark">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>Order Details</p>
        </a>
        <a href="#" class="nav-link active bg-white btn text-left disabled">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>Initial Check</p>
        </a>
        <a href="#" class="nav-link active bg-white btn text-left disabled">
            <i class="nav-icon fas fa-draw-polygon"></i>
            <p>Drawings</p>
        </a>
        <a href="{{route('prodCheck.show')}}" class="nav-link active bg-gray-dark btn text-left">
            <i class="nav-icon fas fa-tools"></i>
            <p>Production Check</p>
        </a>
        <a href="{{route('prodCheck.create')}}" class="nav-link active bg-gray-dark btn text-left">
            <i class="nav-icon fas fa-tools"></i>
            <p>New Production Check</p>
        </a>
        <a href="{{ route('hourlyReports.index') }}" class="nav-link active bg-gray-dark btn text-left">
            <i class="nav-icon fas fa-check"></i>
            <p>Hourly Check</p>
        </a>
    </div>
    <div class="nav-item">

        <a href="#" class="nav-link active bg-white btn text-left disabled">
            <i class="nav-icon fas fa-book"></i>
            <p>Add Notes</p>
        </a>
        <a href="#" class="nav-link active bg-white btn text-left disabled">
            <i class="nav-icon fas fa-warehouse"></i>
            <p>Log Pallets</p>
        </a>
        <a href="#" class="nav-link active bg-white btn text-left disabled">
            <i class="nav-icon fas fa-compass"></i>
            <p>Location</p>
        </a>
    </div>
</li>
