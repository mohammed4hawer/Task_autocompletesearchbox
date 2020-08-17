<!DOCTYPE html>
<html>
 <head>
  <title>Ajax Autocomplete Textbox in Laravel using JQuery</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:700px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  @yield('content')
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){

 $('#country_name').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.catch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#countryList').fadeIn();  
            $('#countryList').html(data);
          }
         });
        }
    });
    $(document).on('click', 'li', function(){  
        $('#country_name').val($(this).text());  
        $('#countryList').fadeOut();  
    });  
// =========================================================
fetch_data();

function fetch_data()
{
 $.ajax({
  url:"/autocomplete/fetch_data",
  dataType:"json",
  success:function(data)
  {
    var html = '';
    html += '<tr>';
    html += '<td contenteditable id="country_name"></td>';
    
    for(var count=0; count < data.length; count++)
    {
     html +='<tr>';
     html +='<td contenteditable class="column_name" data-column_name="country_name" data-id="'+data[count].id+'">'+data[count].country_name+'</td>';
    }
    $('tbody').html(html);
   }
  });
 }
 var _token = $('input[name="_token"]').val();

 $(document).on('click', '#action', function(){
  var country_name = $('#country_name').text();
  if(country_name != '')
  {
   $.ajax({
    url:"{{ route('autocomplete.add_data') }}",
    method:"POST",
    data:{country_name:country_name, _token:_token},
    success:function(data)
    {
     $('#message').html(data);
     fetch_data();
    }
   });
  }
  else
  {
   $('#message').html("<div class='alert alert-danger'>Both Fields are required</div>");
  }
 });

});
</script>