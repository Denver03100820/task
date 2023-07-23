@extends('layout.site')

@section('content')
<form class="py-2" method="POST" action={{ url('login') }}>
    @csrf
    <h3 class="text-uppercase">Log-in</h3>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Type your Email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Type your Password">
    </div>
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary btn-lg mt-3 mr-auto" type="submit">Sign in</button>
        <a href={{ url('registration') }} class="btn btn-warning btn-lg mt-3" type="submit">Sign up</a>
    </div>
</form>
@endsection