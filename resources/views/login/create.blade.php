<x-layout>
    <div class="container my-3">
        <h1>Login Form</h1>
    <form action="/login"method="POST">
      @csrf
         <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
          <p class="text-danger">{{ $message }}</p>
        @enderror
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>


        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          @error('password')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="form-check">
          <input type="checkbox" name="password" class="form-check-input" id="exampleCheck1">
         
          <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>

</x-layout>