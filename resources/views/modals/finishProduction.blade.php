{{--    Modal for finishing an order--}}
<div class="modal fade" id="finishOrder" tabindex="-1" role="dialog"
     aria-labelledby="finishOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
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
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST"
                      action="{{route('orders.stopProduction', ['order'=>$order,'machine'=>Auth::user()->machine])}}">
                    @csrf
                    <button class="btn btn-danger float-right"
                            type="submit"> Finish Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
