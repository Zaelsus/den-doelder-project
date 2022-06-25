{{--    Modal for logging amount of pallets produced --}}
<div class="modal fade" id="logPallets" tabindex="-1" role="dialog"
     aria-labelledby="logPalletsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="logPalletsTitle">
                    Edit the pallet log {{$order->order_number . ' of customer ' . $order->client_name}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('orders.updatequantity',$order) }}">
                    @csrf
                    @method('PUT')
                        <div class="card-content table table-bordered table-hover table-light ">
                            <div>
                                Quantity produced: {{$order->quantity_produced}}
                            </div>
                            <div>
                                Quantity to be produced: {{$order->toproduce}}
                            </div>
                            <div>
                                Log Quantity: <input class="input" type="number" name="add_quantity" id=" " value="">
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div>
                                <button type="submit" class="btn btn-info btn-lg btn-lg btn-block" id="submitNew">Save</button>
                            </div>
                        </div>
                </form>
                <div class="control">
                    @if($order->quantity_produced >= $order->quantity_production)
                        <form method="POST"
                              action="{{route('orders.stopProduction', ['order'=>$order,'machine'=>Auth::user()->machine])}}">
                            @csrf
                            <button onclick="return confirm('Is this order completed?')"
                                    class="far fa-stop-circle btn btn-danger btn-block "
                                    type="submit"> Stop Production
                            </button>
                        </form>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>





