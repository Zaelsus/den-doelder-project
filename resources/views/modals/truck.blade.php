{{--    Modal for finishing driving an order--}}
<div class="modal fade" id="finishDriving" tabindex="-1" role="dialog"
     aria-labelledby="cancelOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="cancelOrderTitle">
                    Finish Driving
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to finish driving this order?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST" action="{{route('orders.stopDriving', $order)}}">
                    @csrf
                    <button class="btn btn-danger float-right"
                            type="submit"> Finish Driving
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{--    Modal for pausing driving an order--}}
<div class="modal fade" id="pauseDriving" tabindex="-1" role="dialog"
     aria-labelledby="cancelOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="cancelOrderTitle">
                    Finish Driving
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to finish driving this order?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST" action="{{route('orders.pauseDriving', $order)}}">
                    @csrf
                    <button class="btn btn-warning float-right"
                            type="submit"> Pause Driving
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
