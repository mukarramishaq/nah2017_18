@extends('layouts.app')

@section('content')
<div class="row">
  	<div class="col-md-6">
          <!-- general form elements -->
      	<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title">Professional information</h3>
            </div>

			<form role="form">
				<div class="box-body">
					<div class="form-group">
						<div class="row">
				    		<div class="col-xs-8">
				                <label>Industry</label>
				                
				                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
				                  <option selected="selected">Select---</option>
				                  <option>option-1</option>
				                  <option>option-2</option>
				                  <option>option-3</option>
				                </select>
				            </div>
				        </div>

				        <div class="row">
				    		<div class="col-xs-8">
			                  <label for="current-company">Current Company</label>
			                  <input class="form-control" id="current-company" placeholder="Enter Company Name" type="text">
			                </div>
			            </div>

			            <div class="row">
				    		<div class="col-xs-8">
			                  <label for="Current-designation">Designation</label>
			                  <input class="form-control" id="discipline" placeholder="Enter your designation" type="text">
			                </div>
			            </div>

			            <div class="row">
			            	<div class="col-xs-8">
			            		<button type="submit" class="btn btn-primary">Submit</button>
			            	</div>
			            </div>

			        </div>
				</div>
			</form>
        </div>
          <!-- /.box -->
    </div>
</div>
@endsection

