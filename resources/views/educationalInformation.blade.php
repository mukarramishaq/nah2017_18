@extends('layouts.app')

@section('content')

<form role="form">
	<div class="box-body">
		<div class="form-group">
			<div class="row">
	    		<div class="col-xs-8">
	                <label>Schools</label>
	                
	                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option selected="selected">Select---</option>
	                  <option>NBS</option>
	                  <option>ASAB</option>
	                  <option>SADA</option>
	                  <option>SCEE</option>
	                  <option>SCME</option>
	                  <option>SEECS</option>
	                  <option>SMME</option>
	                  <option>NIPCONS</option>
	                  <option>S3H</option>
	                  <option>SNS</option>
	                </select>
	            </div>
	        </div>

	        <div class="row">
	    		<div class="col-xs-8">
	                <label>Degree Type</label>
	                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
	                  <option selected="selected">Select---</option>
	                  <option>Bachelors</option>
	                  <option>Masters</option>
	                  </select>
	                </div>
	            </div>

	        <div class="row">
	    		<div class="col-xs-8">
                  <label for="discipline">Discipline</label>
                  <input class="form-control" id="discipline" placeholder="Enter Discipline" type="text">
                </div>
            </div>

            <div class="row">
	    		<div class="col-xs-8">
                  <label for="enroll-year">Enroll Year</label>
                  <input class="form-control" id="enroll-year" placeholder="Enter your enrolled year" type="text">
                </div>
            </div>

            <div class="row">
	    		<div class="col-xs-8">
                  <label for="graduation-year">Graduation Year</label>
                  <input class="form-control" id="graduation-year" placeholder="Enter graduation Year" type="text">
            	</div>
           	</div>

           	<div class="row">
	    		<div class="col-xs-8">
                  <label for="registration-number">Registration Number</label>
                  <input class="form-control" id="registration Number" placeholder="Registration Number" type="text">
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
              
                

	              
			</div>
		</div>
	</div>
</form>
@endsection
