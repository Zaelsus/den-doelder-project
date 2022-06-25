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
