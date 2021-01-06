@extends('template')

@section('title', 'Laravel | Login')

@section('css')
@endsection

@section('content')

    <div class="container mt-5 pt-5">
        <form action="{{ route('auth.login') }}" method="post" class="col col-12 mx-auto col-sm-6">
            @csrf
            <div class="form-outline mb-4">
              <input type="email" class="form-control" name="email" />
              <label class="form-label">Email address</label>
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control" />
              <label class="form-label">Password</label>
            </div>
          
          
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Sign in</button>
          </form>
    </div>

@endsection

@section('js')
@endsection