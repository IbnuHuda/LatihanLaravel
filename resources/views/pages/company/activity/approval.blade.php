<style type="text/css">
    div.card div.card-body hr {
        width: 7.5%;
        border: 1px solid #000;
        margin-top: 0px;
    }
</style>
@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Approval User</h4>
                <hr class="float-left" />
        <div class="flash-message col-lg-12">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if (Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }} w-100">{{ Session::get('alert-' . $msg) }} <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
        </div>
      <form action="{{route('companyStepAssesment')}}" method="POST">
        @csrf
        <table class="table table-hover table-light ">
            <thead>
              <tr class="bg-primary text-light ">
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Position</th>
                <th scope="col">User Accepted</th>
                <th scope="col">Message</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($result as $data)
                @if ($data->companyJob->user_company_id == Auth::guard('company')->user()->id)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @foreach ($company_profile as $profile)
                            <td>{{$profile->name}}</td>
                            @endforeach
                            <td>{{$data->companyJob->available_positions}}</td>
                            <td>{{$data->user_id_accepted}}</td>
                            <td>{{$data->inweb_message_to_vendor}}</td>
                            <td>
                                <button type="button" class="btn btn-md btn-success text-light" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fa fa-check"> End Project</i>
                                    </button>
                            </td>
                            </tr>
                @endif
                @endforeach
            </tbody>
          </table>
        </form>
        </div>
      </div>
    </div>
</div>
@endsection
