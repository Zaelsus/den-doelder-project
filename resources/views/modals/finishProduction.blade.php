{{-- Finish order and log pallets --}}
<div class="modal fade" id="finishOrder" aria-hidden="true" aria-labelledby="finishOrderToggleLabel" tabindex="-1"
     role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="finishOrderTitle">
                    Finish Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to finish order number {{$order->order_number}}?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                        Cancel
                    </button>
                </div>

                <button class="btn btn-danger float-right" data-target="#endOrder" data-toggle="modal"
                        data-dismiss="modal">
                    Log Pallets & Finish Order
                </button>
            </div>
        </div>
    </div>
</div>

{{-- Finish order without logging pallets --}}
<div class="modal fade" id="stopOrder" aria-hidden="true" aria-labelledby="finishOrderToggleLabel" tabindex="-1"
     role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="finishOrderTitle">
                    Finish Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning alert-dismissible fade show">
                    <p><strong>WARNING: This will finish order number {{$order->order_number}} without logging any pallets?</strong></p>
                    <p><strong>Are you sure?</strong></p>
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                        Cancel
                    </button>
                </div>

                <form method="get"
                      action="{{ route('orders.stopProduction', ['order'=>$order,'machine'=>Auth::user()->machine]) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger float-right">
                        Finish Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
