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
  @if(!empty($update_data))
    <h3>Your Record Has Been Updated.</h3>
  @endif
  <form method="POST">
    @csrf
    <label for="name">First Name</label>
    <input type="text" id="name" name="fname" value="{{$edit_data->name}}" placeholder="Your name..">
    <label for="email">Your Email</label>
    <input type="text" id="email" value='{{$edit_data->email}}' name="email" placeholder="Your Email..">
    <input type="submit" value="Submit">
  </form>
</body>
</html>