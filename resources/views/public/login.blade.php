@extends('template')

@section('title', 'Laravel | Login')

@section('css')
@endsection

@section('content')

    <div class="container mt-5 pt-5">
        <form class="col col-12 mx-auto col-sm-6">
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form1Example1" class="form-control" />
              <label class="form-label" for="form1Example1">Email address</label>
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form1Example2" class="form-control" />
              <label class="form-label" for="form1Example2">Password</label>
            </div>
          
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </form>
    </div>

@endsection

@section('js')
@endsection