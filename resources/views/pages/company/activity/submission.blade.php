@extends('layouts.dashboard')

@section('content')
    {{-- <div class="container"> --}}
      <div class="card-deck">
      <div class="card mt-5 ml-5" style="border: 0px; background-color:rgba(255, 0, 0, 0);">
      <form action="{{route('companyStepSubmission')}}">
              <div class="float-right mb-3">
                  <button class="btn btn-md btn-success"><i class="fa fa-plus"></i> Submit</button>
              </div>
        <table class="table table-hover table-light ">
            <thead>
              <tr class="bg-primary text-light ">
                <th scope="col">#</th>
                <th scope="col" >Name</th>
                <th scope="col">Email</th>
                <th scope="col">Portofolio</th>
                <th scope="col">Status</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>


                <tr>
                    @forelse ($list_user_jobs as $list)
                    @php
                        $portofolio = explode("|",$list->portofolio_uploaded);
                        $total_portofolio = count($portofolio);

                            // $name = $_POST['name'];
                            // $email = $_POST['email'];
                            // $mobile = $_POST['mobile'];
                            // }
                    @endphp
                    @if ($list->companyJob->user_company_id == Auth::guard('company')->user()->id)


                <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$list->user->name}}</td>
                    <td>{{$list->user->email}}</td>
                    <td>{{$total_portofolio}}</td>
                    {{-- <td>{{$total_portofolio}}</td> --}}
                    <td><button class="btn btn-sm btn-danger rounded-pill">Not Validated</button></td>
                    <td>
                        <button type="button" class="btn btn-md text-light" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #FFC10A">
                            <i class="fa fa-eye"> View</i>
                          </button>
                    </td>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="" method="POST">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    @foreach ($portofolio as $portofolio_list)
                                    {{-- <form action=""> --}}
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                {{$portofolio_list}}
                                            </div>
                                            <div class="col-6">
                                                <div class="row">
                                                <span class="col-6 form-check">
                                                <input class="form-check-input" type="radio" name="{{$portofolio_list}}" id="{{$portofolio_list}}" value="1"  required>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                      Yes
                                                    </label>
                                                </span>
                                                @error('{{$portofolio_list}}')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                  <span class="col-6 form-check">
                                                    <input class="form-check-input" type="radio" name="{{$portofolio_list}}" id="{{$portofolio_list}}" value="0" required>
                                                    <label class="form-check-label" for="exampleRadios2">
                                                      No
                                                    </label>
                                                </span>
                                                @error('{{$portofolio_list}}')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            </div>
                                        </div>
                                    {{-- </form> --}}

                                    @endforeach

                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="submit" class="btn btn-primary"></button>
                                </div>
                            </form>
                            {{-- @php

                        @endphp --}}
                            </div>
                            </div>
                        </div>
                    <td><a href="/company/jobs/detail/{{$list->id}}" class="btn btn-md text-light" style="background-color: #3ABAF4"><i class="fa fa-edit"> Edit</i></a></td>
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
          {{-- @php
               if(isset($_POST['submit'])) {
                        $value = 0;
                        $text = ''; // added
                        for ($i=1; $i <=3; $i++) {

                            $gambar = $_POST['num'.$i];
                            $text .= $i==1 ? $i : '+' . $i;  // added
                            $value+= $_POST['num'.$i];

                        }
                        echo $value;

                        }
          @endphp --}}
          <div>

              {{$list_user_jobs->links()}}
          {{-- <p>{{$list_user_jobs->company_jobs->id}}</p> --}}
          </div>
        </form>
        </div>
      </div>
    {{-- </div> --}}
@endsection
