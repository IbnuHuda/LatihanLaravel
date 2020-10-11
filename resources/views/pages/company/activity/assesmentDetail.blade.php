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
                <h4 class="card-title">Assesment</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                <div class="mt-2"></div>

                <form action="{{ route('companyAssesment') }}" method="POST">
                    @csrf

                    @if ($result->isEmpty())
                    <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> <a href="{{ route('companyStepSubmission') }}">Please validate vendor submission first!</a></p>
                    @else
                    <table class="table table-hover table-light">
                        <thead>
                            <tr class="bg-primary text-light ">
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Portofolio</th>
                                <th scope="col">Result</th>
                                <th scope="col">Salary Range</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $list)
                            <tr>
                                <td><input type="checkbox" name="approval[]" value="{{ $list->id }}"></td>
                                <td>{{ ($list->user_id == null) ? $list->teamProfile->name : $list->user->name }}</td>
                                <td>{{ ($list->user_id == null) ? "-" : $list->user->email }}</td>
                                <td>{{ ($list->user_id == null) ? "Team" : "Person" }}</td>
                                <td>{{ ($list->portofolio_uploaded == null) ? '0' : count(explode('|', $list->portofolio_uploaded)) }}</td>
                                <td>{{ $list->score }}</td>
                                <td>Rp. {{ $list->salary }}</td>
                                <td>
                                    <a href="{{ ($list->user_id == null) ? route('companyTeamDetail', $list->team_id) : route('companyUserDetail', $list->user_id) }}" class="btn btn-warning"><i class="fa fa-eye"></i> Profile</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="hidden" name="job" value="{{ Request::route('id') }}">

                    <div class="float-right mt-3">
                        <button type="submit" class="btn btn-md btn-success"><i class="fa fa-plus"></i> Submit</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
