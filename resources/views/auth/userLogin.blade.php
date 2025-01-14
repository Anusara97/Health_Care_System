@include('cdn')

{{-- <x-log-Reg_-Header/> --}}

<style>
    /* Center the form in the middle of the screen */
    .abc {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background-color: #f8f9fa;
    }
</style>

<body style="background-color: #f8f9fa">
    <div class="abc">
        <form action="/login" method="POST" class="p-4 rounded shadow bg-white" style="width: 100%; max-width: 400px;">
            @csrf
            <div class="mb-3">
                <h2 style="text-align: center">Sign in User</h2>
            </div>

            <hr>

            {{-- notification details --}}
            @if(Session::has('success'))
                <div class="alert alert-success" style="text-align:center">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger" style="text-align:center">
                    {{Session::get('fail')}}
                </div>
            @endif
            {{-- end notification --}}
            
            {{-- username --}}
            <div class="mb-3">
              <label for="specificSizeInputName" class="form-label">Username</label>
              <input name="username" type="text" class="form-control" id="specificSizeInputName" placeholder="Username" value="{{old('username')}}">              
                <span class="text-danger">
                  @error('username')
                    <br>
                    <div class="alert alert-danger" style="text-align:center;" >
                      {{$message}}
                    </div>
                  @enderror
                </span>              
            </div>
            
            {{-- password --}}
            <div class="mb-3">
              <label for="specificSizeInputPassword" class="form-label">Password</label>
              <input name="password" type="password" class="form-control" id="specificSizeInputPassword" placeholder="Password">
              <span class="text-danger">
                @error('password')
                  <br>
                  <div class="alert alert-danger" style="text-align:center;" >
                    {{$message}}
                  </div>
                @enderror
              </span>
            </div>
        
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" id="autoSizingCheck2">
              <label class="form-check-label" for="autoSizingCheck2">Remember me</label>
            </div>
        
            <div class="d-flex justify">
                <button type="submit" class="btn btn-primary me-2">Login</button>
                <button type="reset" class="btn btn-danger me-2">Clear</button>
                <a href="/register" class="btn btn-success me-2">Sign up</a>
                <a href="/" class="btn btn-warning">Home</a>
            </div>
          </form>
    </div>
</body>