{{--    Modal for disabling an order--}}
<div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog"
     aria-labelledby="cancelOrderTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="cancelOrderTitle">
                    Disable Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to cancel order number {{$order->order_number}}?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST" action="{{route('orders.cancelOrder', $order)}}">
                    @csrf
                    <button class="btn btn-danger float-right"
                            type="submit"> Disable Order
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{--Modal to start production of an order--}}
<div class="modal fade" id="startProduction" tabindex="-1" role="dialog"
     aria-labelledby="startProductionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="startProductionTitle">
                    Start Production
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to start production for order number {{$order->order_number}}?</p>

            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST" action="{{route('orders.startProduction', $order)}}">
                    @csrf
                    <div class="btn-group">
                        <div>
                            <button
                                class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                                type="submit"> Start
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--Modal to start driving an order--}}
<div class="modal fade" id="startDriving" tabindex="-1" role="dialog"
     aria-labelledby="startDrivingTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="startDrivingTitle">
                    Start Driving
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to start driving the order number {{$order->order_number}}?</p>

            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <form method="POST" action="{{route('orders.startDriving', $order)}}">
                    @csrf
                    <button class="far fas fa-arrow-alt-circle-up btn btn-success btn-block small-box-footer"
                            type="submit"> Start Driving
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

{{--    Modal for pausing Production Confirmation --}}
<div class="modal fade" id="pauseProd" tabindex="-1" role="dialog"
     aria-labelledby="pauseProdTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="pauseProdTitle">
                    Pause Order
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to pause the production?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                    <a class="btn btn-danger btn-lg float-right" data-dismiss="modal"
                       data-toggle="modal" href="#stoppage">
                        Pause
                    </a>
            </div>
        </div>
    </div>
</div>


@extends(isset($note) ? 'modals.logFix' : 'blank')
{{--    Modal for restarting Production Confirmation--}}
<div class="modal fade" id="restartProd" tabindex="-1" role="dialog"
     aria-labelledby="restartProdTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="restartProdTitle">
                    Restart Production
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p> Are you sure you want to restart the production?</p>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel
                    </button>
                </div>
                <?php use App\Models\Note;$note = Note::where('order_id', $order->id)->where('priority', 'high')->first();?>
                                @if($note === null)
                    <form method="POST" action="{{route('orders.startProduction', $order)}}">
                        @csrf
                        <div class="btn-group">
                            <div>
                                <button
                                    class="far fas btn btn-success btn-block small-box-footer"
                                    type="submit"> Restart
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <a class="btn btn-danger btn-lg float-right" data-dismiss="modal"
                       data-toggle="modal" href="#logFix">
                        Restart
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

{{--    Modal for creating Error Note when Pausing Production --}}
<div class="modal fade" id="stoppage" tabindex="-1" role="dialog"
     aria-labelledby="stoppageTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header colour-purple">
                <h5 class="modal-title" id="stoppageTitle">
                    Add the reason of pausing Order #{{$order->order_number}}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="requirednote" for="title">Title</label>
                        <div>
                            <input class="form-control" name="title"
                                   type="text" placeholder="Title of note" value="{{old('title')}}" required>
                        </div>
                        @error('title')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="requirednote" for="content">Content</label>
                        <div>
                            <textarea type="text" class="form-control @error('content') is-invalid @enderror"
                                      name="content"
                                      placeholder="Please describe the error occurred in more detail." rows="5" required
                            >{{old('content')}}</textarea>
                        </div>
                        @error('content')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Mechanical Issue (Error)"
                                       required>Mechanical Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Material Issue (Error)"
                                       required>Material Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Technical Issue (Error)"
                                       required>Technical Issue
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="Lunch Break"
                                       required>Lunch Break
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="label" value="End of Shift"
                                       required>End of Shift
                            </div>
                            <br>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="label" value="stoppage" style="display:none"
                                   checked>
                        </div>

                        <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Log reason of stoppage</button>
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
