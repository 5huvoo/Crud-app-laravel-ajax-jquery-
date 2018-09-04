

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.jqueryui.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> </script>
        <script src=" //cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>

      </head>

<body>
<div class="container">
  <div class="content">
    <div  class= "title"> <h1>Laravel 5.6 Php Project</h1> </div>
</div>

  			<!-- data showing -->

      	<table border="1" id="dt" bgcolor="#00FF00">
<thead>
          <th colspan="5">Users</th>
  				<tr>
  					<td>Id</td>
  					<td>Name</td>
  					<td>Email</td>
  					<td>Phone</td>
  				</tr>
</thead>
   <tbody>
  				@foreach($user as $value)
  				<tr>
  					<td>{{$value->id}}</td>
  					<td>{{$value->name}}</td>
  					<td>{{$value->email}}</td>
  					<td>{{$value->phone}}</td>
  				</tr>
  				@endforeach
           </tbody>
  			</table>
<script>
          $(document).ready(function() {

            $('#dt').DataTable();
        } );
         </script>

         <!-- insertdata -->

           			<table border="1" width:400px bgcolor="#00FF00">
           				<th colspan="2"> Insert </th>
           				<tr>
           					<td>Name :</td>
           					<td><input type="text" name="name" /></td>
           				</tr>
           				<tr>

           					<td>Email</td>
           					<td><input type="email" name="email"  onblur="checkmain(this.value)" /></td>


           				</tr>
           				<tr>
           					<td>Phone</td>
           					<td><input type="text" name="phone" /></td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="insert"> Insert </button> </td>
           				</tr>


   </table>
{{ csrf_field() }}

<!-- Validation--->
<!-- <script>

                  $(document).ready(function(){

                    var email = $('#email').val();
                    var _token = $('input[name="_token"]').val();

                     $.ajax({
                       type:'post';
                      url:'check',

                      data:{email:email, _token:_token},

                      success:function(result)
                      {
                       if(result == 'unique')
                       {

                            alert("Email Id is available");

                        $('#insertdata').attr('disabled', false);
                       }
                       else
                       {

                            alert("Email Id is NOT available");
                         $('#email').addClass('has-error');
                         $('#register').attr('disabled', 'disabled');
                       }
                      }
                     })
                    }
                   };
                 </script>

-->

           			<!-- Updatedata-->

           			<table border="1" bgcolor="#00FFFF">
           				<th colspan="2">Update</th>
           				<tr>
           					<td>Select Id:</td>
           					<td>
           						<select name="upid" id="upid">
           							@foreach($user as $value)
           								<option value="{{ $value->id}}"> {{ $value->id }} </option>
           							@endforeach
           						</select>
           					</td>
           				</tr>
           				<tr>
           					<td>Name :</td>
           					<td><input type="text" name="upname" /></td>
           				</tr>
           				<tr>
           					<td>Email</td>
           					<td><input type="email" name="upemail" /></td>
           				</tr>
           				<tr>
           					<td>Phone</td>
           					<td><input type="text" name="upphone" /></td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="update"> Update </button> </td>
           				</tr>
           			</table>

           			<!-- Delete Data -->

           			<table border="1" bgcolor="#FFFF00" >
           				<th colspan="2"> Delete </th>
           				<tr>
           					<td>Select Id:</td>
           					<td>
           						<select name="upid" id="delid">
           							@foreach($user as $value)
           								<option value="{{ $value->id}}"> {{ $value->id }} </option>
           							@endforeach
           						</select>
           					</td>
           				</tr>
           				<tr>
           					<td colspan="2"><button type="submit" id="delete"> Delete </button> </td>
           				</tr>
           			</table>

  			<!-- AJAX SECTION -->
        <script type="text/javascript">

                 // for Insert Ajax
                 $('#insert').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'insertdata',
                     data:{
                        '_token':$('input[name=_token').val(),
                        'name':$('input[name=name').val(),
                        'email':$('input[name=email').val(),
                        'phone':$('input[name=phone').val()
                     },
                     success:function(data){
                       if (data.errors){

                             if(data.errors.name) {
                               $('.name_error').removeClass('hidden');
                                 $('.name_error').text(" name can't be empty !");
                             }

                             if(data.errors.email) {
                               $('.email_error').removeClass('hidden');
                                 $('.email_error').text("Email must be a valid one !");
                             }
                       window.location.reload();
                     },
                   });
                 });
                 // for Update Ajax
                 $('#update').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'updatedata',
                     data:{
                       '_token':$('input[name=_token').val(),
                        'id':$('#upid').val(),
                       'name':$('input[name=upname').val(),
                       'email':$('input[name=upemail').val(),
                       'phone':$('input[name=upphone').val(),
                     },
                     success:function(data){
                       alert("Data will be updated now");
                       window.location.reload();
                     },
                   });
                 });
                 // for Delete Ajax
                 $('#delete').click(function(){
                   $.ajax({
                     type:'post',
                     url: 'deletedata',
                     data:{
                       '_token':$('input[name=_token').val(),
                       'id':$('#delid').val(),
                     },
                     success:function(data){
                       alert("Data will be deleted now");
                       window.location.reload();
                     },
                   });
                 });
         			</script>


</div>
</body>
</html>
