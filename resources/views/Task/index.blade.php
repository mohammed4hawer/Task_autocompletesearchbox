@extends('Task.layout')

@section('content')


<br />
  <div class="container box">
   <h3 align="center" class="text-primary"><b>Autocomplete Textbox using Ajax in Laravel</b></h3><br><br>
   
   <div class="form-group">
    <form id="country_form" method="post">
    <input style="margin-bottom: 3px;" type="text" name="country_name" id="country_name" class="form-control input-lg" placeholder="Enter Country Name" />
    <input type="submit" name="submit" id="action" value="Add to table" class="btn btn-info" />

    <div id="message"></div>
</form>
    <div id="countryList">
    </div>
   </div>
   {{ csrf_field() }}
  </div>
<br>
<div class="row">
    <div class="col-lg-8 col-md-8" style="margin-left: 220px;">
        <div class="table-responsive">
<table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Country Code</th>
        <th>Country Name</th>
      </tr>
    </thead>
    <tbody>
    {{--  
        <tr>
            <td>#</td>
            <td>example</td>
            <td>example</td>
        </tr>
      --}}
    </tbody>
</table>
{{ csrf_field() }}
    </div>
</div>
</div>
@endsection