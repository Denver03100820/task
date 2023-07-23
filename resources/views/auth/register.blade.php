@extends('layout.site')

@section('content')
<form class="py-2" method="POST" action={{ url('register') }}>
    @csrf
    <h3 class="text-uppercase">Register</h3>
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Type your Name" value={{ old('name') }}>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Type your Email" value={{ old('email') }} >
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Type your Password"  >
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Passwword:</label>
        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password"  >
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary btn-lg mt-3 mr-auto" type="submit">Register</button>
    </div>
</form>
@endsection