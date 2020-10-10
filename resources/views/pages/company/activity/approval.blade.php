<style type="text/css">
    div.card div.card-body hr {
        width: 7.5%;
        border: 1px solid #000;
        margin-top: 0px;
    }

    div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
<script>
    $(document).ready(function() {
        // even ketika link a href diklik
        $('.detail-mahasiswa').on("click", function(){
        // ambil nilai id dari link detail simpan dalam var DataMahasiswa
        var DataMahasiswa= this.id;
        // Pecah DataMahasiswa dengan tanda | sebagai pemisah data hasilnya
        // disimpan dalam array datanya
        var datanya = DataMahasiswa;
        // Untuk pengujian data
        // if (datanya[4]=='L') { var jk='Laki-laki';} else {var jk='Perempuan';}
        // bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
        $("#IsiModal").html('<span>tesdasd'+datanya[0]+'</span>');
        });

    });
//     $('.detail').on('click', function (event) {
//     event.preventDefault();
//     // tangkap id modal yang ingin dimunculkan
//     var id = $(this).attr('data-modal');

//     // munculkan modal berdasarkan id
//     $('#comment-modal-'+id).modal();
// });
//     $(document).ready(function(){
//     $(document).on("click", "#detail", function () {
//      var userid = $(this).data("userid");
//      var companyid = $(this).data("companyid");
//      $("#stars").text(userid);
//      $("#stars").text(companyid);
//     //  $('#exampleModalCenter').modal('show');
//      // As pointed out in comments,
//      // it is unnecessary to have to manually call the modal.
//      // $('#addBookDialog').modal('show');
// })
//     })

</script>
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
                {{-- <form action="{{route('companyStepApproval')}}" method="POST">
                    @csrf --}}
                        <tr>

                            <td>{{$loop->iteration}}</td>
                            @foreach ($company_profile as $profile)
                            <td>{{$profile->name}}</td>
                            @endforeach
                            <td>{{$data->companyJob->available_positions}}</td>
                            <td>
                                {{-- <input type="title" name="user_id" value="{{$data->user_id_accepted}}">
                                <input type="title" name="company_id" value="{{$data->company_job_id}}"> --}}
                                {{$data->user_id_accepted}}
                            </td>
                            <td>{{$data->inweb_message_to_vendor}}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-md btn-success text-light" data-toggle="modal" data-target="#exampleModalCenter" data-userid="2" data-companyid="3">
                                    <i class="fa fa-check"> End Project</i>
                                    </button> --}}
                                    {{-- <a id="detail" data-toggle="modal" data-target="#exampleModalCenter{{$data->id}}" data-userid="2" data-companyid="3" title="Add this item" class="detail btn btn-md btn-success text-light">Rate</a> --}}
                                <a href="#exampleModalCenter" id="{{$data->id}}"  data-toggle="modal"  class="detail-mahasiswa">Rate</a>

                            </td>
                            </tr>

                            <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-body" id="IsiModal">
                                        <div class="stars form-group">
                                            <form action="{{route('companyStepApproval')}}" method="POST">
                                                @csrf
                                <input type="title" name="user_id" value="" placeholder="user">
                                <input type="title" name="company_id" value="" placeholder="company">
                                            {{-- <span id="user_id"></span>
                                            <span id="company_id"></span> --}}
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
                                              <span class="col-8"><button type="submit" class="btn btn-success w-100">Submit</button></span>
                                            </form>

                                          </div>
                                    </div>
                                    {{-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                    </div> --}}
                                </div>
                                </div>
                            </div>
                @endif
                @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

@endsection

