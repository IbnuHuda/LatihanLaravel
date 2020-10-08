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
                <h4 class="card-title">Assesment</h4>
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
              <div class="float-right mb-3">
                  <button type="submit" class="btn btn-md btn-success"><i class="fa fa-plus"></i> Submit</button>
              </div>
        <table class="table table-hover table-light ">
            <thead>
              <tr class="bg-primary text-light ">
                <th scope="col">#</th>
                <th scope="col" >Name</th>
                <th scope="col">Email</th>
                <th scope="col">Result</th>
                <th scope="col">Salary Range</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>


                    @forelse ($result as $data)
                    {{-- @php
                        // $portofolio = explode("|",$list->portofolio_uploaded);
                        $total_data = count($data);

                    @endphp --}}
                    @if ($data->companyJob->user_company_id == Auth::guard('company')->user()->id)
                        {{-- @if (count($data) <= 3) --}}
                            <tr>
                            <th scope="row"><input type="checkbox" name="accept[]" id="accept[]" value="{{$data->id}}"></th>
                                <td>{{$data->user->name}}</td>
                                <td>{{$data->user->email}}</td>
                                {{-- user_id hidden --}}
                                <input type="hidden" name="user_id_accept[]" value="{{$data->user_id}}">
                                {{-- company_job hidden --}}
                                <input type="hidden" name="company_job_id[]" value="{{$data->company_job_id}}">
                                {{-- step+name hidden --}}
                                <input type="hidden" name="step_name[]" value="step_name">
                                {{-- message hidden --}}
                                <input type="hidden" name="inweb_message_to_vendor[]" value="Alhamdulillah , Congrats">
                                <td>{{$data->score}}</td>
                                {{-- <td>{{$total_portofolio}}</td> --}}
                                <td>IDR 1.500.000</td>
                                <td>
                                    {{-- <button type="button" class="btn btn-md text-light" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #FFC10A">
                                        <i class="fa fa-eye"> Profile</i>
                                      </button> --}}
                                      <a href="{{ route('companyStepDetailAssesment', $data->user_id) }}" class="btn btn-md text-light" style="background-color: #FFC10A">Profile</a>

                                </td>
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

              {{$result->links()}}
          {{-- <p>{{$list_user_jobs->company_jobs->id}}</p> --}}
          </div>
        </form>
        </div>
      </div>
    </div>
</div>
@endsection
