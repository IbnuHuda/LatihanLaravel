@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
        <table class="table table-hover">
            <thead>
              <tr class="bg-primary text-light">
                <th scope="col">#</th>
                <th scope="col">Company Name</th>
                <th scope="col">Jobs Name</th>
                <th scope="col">Jobs Description</th>
                <th scope="col">Publisher</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @php
                $number = 1;    
                @endphp
                @foreach ($company_jobs as $list_jobs)
                <tr>
                <th scope="row">{{$number++}}</th>
                    <td>{{$list_jobs->company_id}}</td>
                    <td>{{$list_jobs->jobs_name}}</td>
                    <td>{{ (str_word_count($list_jobs->jobs_description) > 2 ? substr($list_jobs->jobs_description,0,15)."[..]" : $list_jobs->jobs_description)
                    }}</td>
                    <td>Falah</td>
                <td><a href="/company/jobs/detail/{{$list_jobs->id}}" class="btn btn-md btn-info text-light"><i class="fa fa-eye"> Details</i></a></td>
                  </tr>
                @endforeach
            </tbody>
          </table>
          <div>
              {{$company_jobs->links()}}
          </div>
        </div>
    </div>
@endsection