<style type="text/css">
	div.card div.card-body hr {
        width: 10%;
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

	<div class="col-lg-6" id="card-profile">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Company Profile</h4>
				<hr class="float-left" />

				<div style="clear: both;"></div>

				<div class="text-center mb-3">
					<img src="{{ ($data == null || $data->company_logo == null) ? asset('images/websites/def_photo.png') : url('storage/images/company/'. $data->company_logo) }}" class="w-50">
				</div>

				<div class="card-text">
					<ul class="list-group list-group-flush">
	                    <li class="list-group-item">Company Name : {{ ($data == null || $data->name == null) ? '-' : $data->name }}</li>
	                    <li class="list-group-item">Work Field : {{ ($data == null || $data->work_field == null) ? '-' : $data->work_field }}</li>
	                    <li class="list-group-item">Date Built : {{ ($data == null || $data->date_of_built == null) ? '-' : $data->date_of_built	 }}</li>
	                    <li class="list-group-item">Company Address : {{ ($data == null || $data->company_address == null) ? '-' : $data->company_address }}</li>
	                    <li class="list-group-item">Email Address : {{ ($data == null || $data->contact_email == null) ? '-' : $data->contact_email }}</li>
	                    <li class="list-group-item">Call Phone : {{ ($data == null || $data->contact_number == null) ? '-' : $data->contact_number }}</li>
	                    <li class="list-group-item">Company Description : <br />{{ ($data == null || $data->company_description == null) ? '-' : $data->company_description }}</li>
	                </ul>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Edit Company Profile</h4>
				<hr class="float-left" />

				<br />

				<div class="card-text">
					<form action="{{ route('companySelfProfile') }}" method="post" enctype="multipart/form-data">
						@csrf

						<div class="form-row">
	                        <div class="form-group col-md-12">
	                            <label for="inputProfileName">Company Name <span style="color: red;">*</span></label>
	                            <input type="text" name="name" placeholder="Company Name" class="form-control" id="inputProfileName" value="{{ ($data == null || $data->name == null) ? '' : $data->name }}" required>
	                        </div>

	                        <div class="form-group col-md-12">
	                            <label for="inputWorkField">Work Field <span style="color: red;">*</span></label>
	                            <input type="text" name="work_field" placeholder="Work Field" class="form-control" id="inputWorkField" value="{{ ($data == null || $data->work_field == null) ? '' : $data->work_field }}" required>
	                        </div>
	                    </div>

	                    <div class="form-row">
	                        <div class="form-group col-md-6">
	                            <label for="selectDateBuilt">Date Built</label>
	                            <input type="date" name="date_of_built" class="form-control" id="selectDateBuilt" value="{{ ($data == null || $data->date_of_built == null) ? '' : $data->date_of_built }}">
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label for="uploadPhoto">Company Logo</label>
	                            <div class="custom-file">
	                                <input type="file" class="custom-file-input" id="uploadPhoto" name="photo">
	                                <label class="custom-file-label" for="customFile">Choose file</label>
	                            </div>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="inputCompanyAddress">Address <span style="color: red;">*</span></label>
	                        <input type="address" name="address" class="form-control" id="inputCompanyAddress" placeholder="1234 Main St" value="{{ ($data == null || $data->company_address == null) ? '' : $data->company_address }}" required>
	                    </div>

	                    <div class="form-row">
	                        <div class="form-group col-md-6">
	                            <label for="inputProfileContact">Contact Email <span style="color: red;">*</span></label>
                                <div class="input-group">
                                    <input type="contact" name="contact_email" class="form-control" id="inlineFormInputGroupUsername" placeholder="example@example.net" value="{{ ($data == null || $data->contact_email == null) ? '' : $data->contact_email }}" required>
                                </div>
	                        </div>

	                        <div class="form-group col-md-6">
	                            <label for="inputProfileContact">Contact</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">+62</div>
                                    </div>
                          
                                    <input type="text" name="contact_number" class="form-control" id="inlineFormInputGroupUsername" placeholder="123456789" value="{{ ($data == null || $data->contact_number == null) ? '' : explode(' ', $data->contact_number)[1] }}">
                                </div>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="exampleFormControlTextarea1">Company Description</label>
	                        <textarea name="company_description" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Description of company">{{ ($data != null && $data->company_description != null) ? $data->company_description : '' }}</textarea>
	                    </div>

	                    <br />

	                    <div class="row">
	                    	<div class="col-6">
	                    		<button type="reset" class="btn btn-danger w-100">Reset</button>
	                    	</div>
	                    	<div class="col-6">
	                    		<button type="submit" class="btn btn-primary w-100">Save</button>
	                    	</div>
	                    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

    
@endsection
