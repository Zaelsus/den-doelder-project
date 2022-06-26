{{--    Modal for logging amount of pallets produced --}}
<div class="modal fade" id="endOrder" tabindex="-1" role="dialog"
     aria-labelledby="endOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title" id="endOrderTitle">
                    Log Remaining Pallets for Order: {{$order->order_number}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST"
                      action="{{ route('orders.finishAndLogPallets', ['order'=>$order,'machine'=>Auth::user()->machine]) }}">
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
                            Log Quantity: <input class="input @error('add_quantity') is-invalid @enderror" type="number"
                                                 min="0" name="add_quantity" value="0">
                            @error('add_quantity')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field is-grouped">
                        <div>
                            <button type="submit" class="btn btn-danger btn-lg btn-block" id="submitNew">Save & Finish
                                Order
                            </button>
                        </div>
                    </div>
                </form>
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
