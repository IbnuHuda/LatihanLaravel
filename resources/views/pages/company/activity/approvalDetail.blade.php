<style type="text/css">
    div.card div.card-body hr {
        width: 5%;
        border: 1px solid #000;
        margin-top: 0px;
    }
div.stars {
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: center;
  padding: 3px;
  font-size: 25px;
  color: #444;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { color: #FE7; }

label.star:before {
  content: '\f005';
  font-family: FontAwesome;
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
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLiveLabel">Rating Forms</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <p>Rating gived :</p>
                                        <div style="transform: rotateY(180deg)">
                                              <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
                                              <label class="star star-5" for="star-5"></label>
                                              <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
                                              <label class="star star-4" for="star-4"></label>
                                              <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
                                              <label class="star star-3" for="star-3"></label>
                                              <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
                                              <label class="star star-2" for="star-2"></label>
                                              <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
                                              <label class="star star-1" for="star-1"></label>
                                        </div>
                                    </div>

                                    <input type="hidden" name="job" value="{{ Request::route('id') }}">
                                    <input type="hidden" name="rating" value="0" id="rated">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
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

<script type="text/javascript" src="{{ asset('js/rating.js') }}" defer></script>
@endsection
