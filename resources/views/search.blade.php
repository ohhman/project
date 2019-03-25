<!DOCTYPE html>
<html>
 <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center"></h3><br />
   <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
      <select id="options" name="options">
        <option name="Shop" value="Shop">Shop</option>
         <option value="Category">Category</option>
         <option value="Product">Product</option>
      </select>
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Name</th>
         <th>Price</th>
         <th>Spec_Price</th>
         <th>Description</th>
         
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>

<script>
$(document).ready(function(){
 var option=document.getElementById('options').value;
 fetch_customer_data();

 function fetch_customer_data(query = '',option)
 {
  $.ajax({
   url:"{{ route('search.action') }}",
   method:'GET',
   data:{query:query,option:option},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  var option = document.getElementById('options').value;
  console.log(options);
  console.log(query);
  fetch_customer_data(query, option); //pataisyt
 });
});
</script>
