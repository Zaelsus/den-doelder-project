{{--Modal for disabling order--}}
{{--<div class="modal fade" id="cancelOrder" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="cancelOrderTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header colour-purple">--}}
{{--                <h5 class="modal-title" id="cancelOrderTitle">--}}
{{--                    Disable Order--}}
{{--                </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p> Are you sure you want to cancel order number {{$order->order_number}}?</p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <div>--}}
{{--                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form method="POST" action="{{route('orders.cancelOrder', $order)}}">--}}
{{--                    @csrf--}}
{{--                    <button class="btn btn-danger btn-lg float-right"--}}
{{--                            type="submit"> Disable Order--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--    Modal for pausing Production --}}
{{--<div class="modal fade" id="pauseProd" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="pauseProdTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header colour-purple">--}}
{{--                <h5 class="modal-title" id="pauseProdTitle">--}}
{{--                    Pause Order--}}
{{--                </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p> Are you sure you want to pause the production?</p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <div>--}}
{{--                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form method="POST" action="{{route('orders.pauseProduction', $order)}}">--}}
{{--                    @csrf--}}
{{--                    <a class="btn btn-danger btn-lg float-right" data-dismiss="modal" data-toggle="modal" href="#stoppage">Click</a>--}}
{{--                    <button class="btn btn-danger btn-lg float-right"--}}
{{--                            type="submit"> Pause--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--    Modal for restarting Production --}}
{{--@extends('notes.fixStoppage')--}}
{{--<div class="modal fade" id="restartProd" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="restartProdTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header colour-purple">--}}
{{--                <h5 class="modal-title" id="restartProdTitle">--}}
{{--                    Restart Production--}}
{{--                </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p> Are you sure you want to restart the production?</p>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <div>--}}
{{--                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <form method="POST" action="{{route('orders.startProduction', $order)}}">--}}
{{--                    @csrf--}}
{{--                    <button class="btn btn-danger btn-lg float-right"--}}
{{--                            type="submit"> Restart--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--    Modal for pausing Production --}}
{{--<div class="modal fade" id="stoppage" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="pauseProdTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header colour-purple">--}}
{{--                <h5 class="modal-title" id="stoppageTitle">--}}
{{--                    Add the reason of pausing Order #{{$order->order_number}}--}}
{{--                </h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                    <span aria-hidden="true" class="badge bg-white align-content-lg-stretch justify-content-center">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <form class="was-validated" method="POST" action="{{ route('notes.store') }}">--}}
{{--                    @csrf--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="requirednote" for="title">Title</label>--}}
{{--                        <div>--}}
{{--                            <input class="form-control" name="title"--}}
{{--                                   type="text" placeholder="Title of note" value="{{old('title')}}" required>--}}
{{--                        </div>--}}
{{--                        @error('title')--}}
{{--                        <p>{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label class="requirednote" for="content">Content</label>--}}
{{--                        <div>--}}
{{--                            <textarea type="text" class="form-control @error('content') is-invalid @enderror"--}}
{{--                                      name="content"--}}
{{--                                      placeholder="Please describe the error occurred in more detail." rows="5" required--}}
{{--                            >{{old('content')}}</textarea>--}}
{{--                        </div>--}}
{{--                        @error('content')--}}
{{--                        <p class="help is-danger">{{ $message }}</p>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-3">--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="label" value="Mechanical Issue (Error)"--}}
{{--                                       required>Mechanical Issue--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="label" value="Material Issue (Error)"--}}
{{--                                       required>Material Issue--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="label" value="Technical Issue (Error)"--}}
{{--                                       required>Technical Issue--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="label" value="Lunch Break"--}}
{{--                                       required>Lunch Break--}}
{{--                            </div>--}}
{{--                            <div class="form-check">--}}
{{--                                <input class="form-check-input" type="radio" name="label" value="End of Shift"--}}
{{--                                       required>End of Shift--}}
{{--                            </div>--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="radio" name="label" value="stoppage" style="display:none"--}}
{{--                                   checked>--}}
{{--                        </div>--}}

{{--                        <button type="submit" class="btn btn-lg btn-block bg-gradient-olive">Log reason of stoppage</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <div>--}}
{{--                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cancel--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


