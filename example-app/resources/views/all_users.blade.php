<!DOCTYPE html>
<html>
<head>
  <title>Update User Data</title>
  <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
  <div style='text-align:center;' class="container">
    <a href="{{ url('/') }}"><h1>High Budget</h1></a>
  </div>
  <table>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Action</th>
    </tr>
    @foreach($user_data as $varaible) 
      <tr>
        <td>{{$varaible->name}}</td>
        <td>{{$varaible->email}}</td>
        <td class="edit_user"><a href="edit-user?edit_id={{$varaible->id}}">Edit</a></td>
      </tr>
    @endforeach
  </table>
</body>
</html>
