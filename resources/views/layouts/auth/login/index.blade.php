@extends("index")

@section("container")
<div class="card mt-4 w-50 mx-auto">
    <div class="card-header d-flex align-items-center justify-content-between bg-transparent py-3">
        <h5 class="mb-0">Login</h5>
    </div>
    <div class="card-body">
        <form action="" method="post">
            @csrf
            @if (session('error') && session('error')->has('message'))
                <div class="alert alert-danger">
                    {{ session('error.message') }}
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="text" class="form-control {{ (session('error') && session('error')->has('username')) ? 'is-invalid' : '' }}" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
                @if (session('error') && session('error')->has('username'))
                    <div class="invalid-feedback">
                        {{ session('error')->first('username') }}
                    </div>
                @endif
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control {{ (session('error') && session('error')->has('password')) ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
                @if (session('error') && session('error')->has('password'))
                    <div class="invalid-feedback">
                        {{ session('error')->first('password') }}
                    </div>
                @endif
              </div>
            <button type="submit" class="btn btn-outline-dark">Login</button>
        </form>
    </div>
</div>
@endsection
