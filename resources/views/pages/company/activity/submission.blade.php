@extends('layouts.dashboard')

@section('content')
    {{-- <div class="container"> --}}
      <div class="card-deck">
      <div class="card mt-5 ml-5" style="border: 0px; background-color:rgba(255, 0, 0, 0);">
          <form action="">
              <div class="float-right mb-3">
                  <button class="btn btn-md btn-success"><i class="fa fa-plus"></i> Submit</button>
              </div>
        <table class="table table-hover table-light">
            <thead>
              <tr class="bg-primary text-light">
                <th scope="col">#</th>
                <th scope="col" >Name</th>
                <th scope="col">Email</th>
                <th scope="col">Portofolio</th>
                <th scope="col" style="text-align: center">Status</th>
                <th scope="col" colspan="2"  style="text-align: center">Action</th>
              </tr>
            </thead>
            <tbody>


                <tr>
                    @forelse ($list_user_jobs as $list)
                    @if ($list->companyJob->company_id == Auth::guard('company')->user()->id)


                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$list->user->name}}</td>
                    <td>{{$list->user->email}}</td>
                    <td>{{$list->portofolio_uploaded}}</td>
                    <td><button class="btn btn-sm btn-danger rounded-pill">Not Validated</button></td>
                    <td><a href="/company/jobs/detail/{{$list->id}}" class="btn btn-sm text-light" style="background-color: #FFC10A"><i class="fa fa-eye"> View</i></a></td>
                    <td><a href="/company/jobs/detail/{{$list->id}}" class="btn btn-sm text-light" style="background-color: #3ABAF4"><i class="fa fa-edit"> Edit</i></a></td>
                  </tr>


                @else
                {{-- <tr>
                    <td>tidak ada</td>
                </tr> --}}
                @endif

                @empty
                    {{-- @empty --}}

                    @endforelse


            </tbody>
          </table>
          <div>
              @php
                //   dd($list_user_jobs);
              @endphp
              {{$list_user_jobs->links()}}
          {{-- <p>{{$list_user_jobs->company_jobs->id}}</p> --}}
          </div>
        </form>
        </div>
      </div>
    {{-- </div> --}}
@endsection
