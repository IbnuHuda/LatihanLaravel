<style type="text/css">
    div.card div.card-body hr {
        width: 5%;
        border: 1px solid #000;
        margin-top: 0px;
    }
</style>
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="flash-message col-lg-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Approval User</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                <div class="mt-2"></div>

                @if ($data->isEmpty())
                <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> <a href="{{ route('companyStepAssesment') }}">Please approve vendor first!</a></p>
                @else
                <table class="table table-hover table-light ">
                    <thead>
                        <tr class="bg-primary text-light ">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Position</th>
                            <th scope="col">Message</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->user->name }}</td>
                            <td>{{ $data_job }}</td>
                            <td>{{ ($list->inweb_message_to_vendor == null) ? '-' : $list->inweb_message_to_vendor == null }}</td>
                            <td>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#rating">End Projects</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <div id="rating" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form method="post" action="{{ route('companyApprove') }}">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Rating Forms</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Rating gived :</p>
                                        <i class="fa fa-star fa-2x" id="star-one"></i>
                                        <i class="fa fa-star fa-2x" id="star-two"></i>
                                        <i class="fa fa-star fa-2x" id="star-three"></i>
                                        <i class="fa fa-star fa-2x" id="star-four"></i>
                                        <i class="fa fa-star fa-2x" id="star-five"></i>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection