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
                <h4 class="card-title">Submission Jobs Detail</h4>
                <hr class="float-left" />

                <div style="clear: both;"></div>
                <div class="mt-2"></div>

                @if ($list_user_jobs->isEmpty())
                    <p class="alert alert-danger w-100"><i class="fa fa-times-circle"></i> Wait for vendor to apply your job!</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-light">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Apply Time</th>
                                    <th scope="col">Portofolio</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach ($list_user_jobs as $list)
                                @php
                                    $date = new DateTime($list->created_at);
                                        $result = $date->format('j F Y');
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ($list->user_id == null) ? $list->teamProfile->name : $list->user->name }}</td>
                                    <td>{{ ($list->user_id == null) ? "-" : $list->user->email }}</td>
                                    <td>{{ ($list->user_id == null) ? "Team" : "Person" }}</td>
                                    <td>{{ $result }}</td>
                                    <td>{{ count(explode('|', $list->portofolio_uploaded)) }}</td>
                                    <td>
                                        @if ($list->score == null)
                                            <button class="btn btn-sm btn-danger rounded-pill"><i class="fa fa-times-circle"></i> Not Validated</button>
                                        @else
                                            <button class="btn btn-sm btn-success rounded-pill"><i class="fa fa-times"></i> Validated</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('companySubmissionScoreForm', $list->id) }}" class="btn btn-success"><i class="fa fa-eye"></i> View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <div class="float-right mt-2">
                    <button onclick="window.history.back();" class="btn btn-md btn-danger"><i class="fa fa-arrow-left"></i> Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/submission.js') }}" defer></script>
@endsection