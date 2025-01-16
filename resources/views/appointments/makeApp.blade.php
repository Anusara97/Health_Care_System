@include('cdn')

<style>
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
        <form action="/setAppointment" method="POST" class="p-4 rounded shadow bg-white" style="width: 100%; max-width: 500px;">
            @csrf
            
            {{-- Notification --}}
            @if(Session::has('success'))
                <div class="alert alert-success" style="text-align:center">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger" style="text-align:center">
                    {{ Session::get('fail') }}
                </div>
            @endif
            {{-- End Notification --}}

            <div class="mb-3">
                <h2 style="text-align: center">Make Appointment</h2>
            </div>

            <hr>

            <!-- Name -->
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $patient->name }}" readonly>
                </div>
            </div>

            <!-- Age -->
            <div class="mb-3 row">
                <label for="age" class="col-sm-4 col-form-label">Age</label>
                <div class="col-sm-8">
                    <input name="age" type="text" class="form-control" id="age" value="{{ $patient->age }}" readonly>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-3 row">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <input name="gender" type="text" class="form-control" id="gender" value="{{ $patient->gender }}" readonly>
                </div>
            </div>

            <!-- Date -->
            <div class="mb-3 row">
                <label for="date" class="col-sm-4 col-form-label">Date</label>
                <div class="col-sm-8">
                    <input name="date" type="date" class="form-control" id="date" value="{{ $date }}" readonly>
                </div>
            </div>

            <!-- Appointment No -->
            <div class="mb-3 row">
                <label for="appNo" class="col-sm-4 col-form-label">Appointment No</label>
                <div class="col-sm-8">
                    <input name="appNo" type="text" class="form-control" id="appNo" value="{{ $appointmentNo }}" readonly>
                </div>
            </div>

            <!-- Disease -->
            <div class="mb-3 row">
                <label for="disease" class="col-sm-4 col-form-label">Disease</label>
                <div class="col-sm-8">
                    <input name="disease" type="text" class="form-control" id="disease" placeholder="Enter Disease">
                    <span class="text-danger">
                        @error('disease')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>                
            </div>

            <hr>

            <div class="d-flex justify">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-danger me-2">Reset</button>
                <a href="/" class="btn btn-warning">Home</a>
            </div>
        </form>
    </div>
</body>