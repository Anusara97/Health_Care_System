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

    /* Custom styles for toggle buttons */
    .btn-toggle {
        width: 120px;
    }

    .btn-toggle.active-green {
        background-color: #28a745; /* Green */
        color: white;
    }

    .btn-toggle.active-red {
        background-color: #dc3545; /* Red */
        color: white;
    }

    .btn-toggle-group {
        display: flex;
        justify-content: space-around;
    }
</style>

<body style="background-color: #f8f9fa">
    <div class="abc">
        <form action="/prescription/save" method="POST" class="p-4 rounded shadow bg-white" style="width: 100%; max-width: 500px;">
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
                <h2 style="text-align: center">Medical Prescription</h2>
            </div>

            <hr>

            {{-- This is use to catch the previous record --}}
            <input name="appId" type="hidden" class="form-control" id="specificSizeID" value="{{ $appId }}" >

            <!-- Name -->
            <div class="mb-3 row">
                <label for="name" class="col-sm-4 col-form-label">Name</label>
                <div class="col-sm-8">
                    <input name="name" type="text" class="form-control" id="name" value="{{ $name }}" readonly>
                </div>
            </div>

            <!-- Age -->
            <div class="mb-3 row">
                <label for="age" class="col-sm-4 col-form-label">Age</label>
                <div class="col-sm-8">
                    <input name="age" type="text" class="form-control" id="age" value="{{ $age }}" readonly>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-3 row">
                <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8">
                    <input name="gender" type="text" class="form-control" id="gender" value="{{ $gender }}" readonly>
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
                    <input name="appNo" type="text" class="form-control" id="appNo" value="{{ $appNo }}" readonly>
                </div>
            </div>

            <!-- Disease -->
            <div class="mb-3 row">
                <label for="disease" class="col-sm-4 col-form-label">Disease</label>
                <div class="col-sm-8">
                    <input name="disease" type="text" class="form-control" id="disease" value="{{ $disease }}" readonly>
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
            
            <div class="mb-3">
                <h4 style="text-align: center">Treatment Details</h4>
            </div>

            <hr>
            
            <!-- Drug Name -->
            <div class="mb-3 row">
                <label for="specificSizeInputdrugName" class="col-sm-4 col-form-label">Drug Name</label>
                <div class="col-sm-8">
                    <input name="drugName" type="text" class="form-control" id="specificSizeInputdrugName" placeholder="Piriton" value="{{old('name')}}" required>
                    <span class="text-danger">
                        @error('drugName')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Dosage -->
            <div class="mb-3 row">
                <label for="specificSizeInputDosage" class="col-sm-4 col-form-label">Dosage</label>
                <div class="col-sm-8">
                    <input name="dosage" type="text" class="form-control" id="specificSizeInputDosage" placeholder="1/12 bd" value="{{old('name')}}" required>
                    <span class="text-danger">
                        @error('dosage')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Patient Status -->
            <div class="mb-3 row">
                <label for="patientStatus" class="col-sm-4 col-form-label">Patient Status</label>
                <div class="col-sm-8 btn-toggle-group">
                    <button type="button" id="patientStatusNormal" class="btn btn-toggle active-green" onclick="togglePatientStatus('Normal')">Normal</button>
                    <button type="button" id="patientStatusEmergency" class="btn btn-toggle" onclick="togglePatientStatus('Emergency')">Emergency</button>
                    <input type="hidden" name="patientStatus" id="patientStatusInput" value="Normal">
                </div>
            </div>

            <!-- Substitution Status -->
            <div class="mb-3 row">
                <label for="substitutionStatus" class="col-sm-4 col-form-label">Substitution Status</label>
                <div class="col-sm-8 btn-toggle-group">
                    <button type="button" id="substitutionStatusYes" class="btn btn-toggle" onclick="toggleSubstitutionStatus('Yes')">Yes</button>
                    <button type="button" id="substitutionStatusNo" class="btn btn-toggle active-red" onclick="toggleSubstitutionStatus('No')">No</button>
                    <input type="hidden" name="substitutionStatus" id="substitutionStatusInput" value="No">
                </div>
            </div>

            <!-- Doctor Name -->
            <div class="mb-3 row">
                <label for="dName" class="col-sm-4 col-form-label">Doctor Name</label>
                <div class="col-sm-8">
                    <input name="dName" type="text" class="form-control" id="dName" value="{{ "Dr. ".$dName }}" readonly>
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

    <script>
        // Toggle Patient Status
        function togglePatientStatus(status) {
            document.getElementById('patientStatusInput').value = status;
            const normalButton = document.getElementById('patientStatusNormal');
            const emergencyButton = document.getElementById('patientStatusEmergency');

            if (status === 'Normal') {
                normalButton.classList.add('active-green');
                normalButton.classList.remove('active-red');
                emergencyButton.classList.remove('active-green', 'active-red');
            } else {
                emergencyButton.classList.add('active-red');
                emergencyButton.classList.remove('active-green');
                normalButton.classList.remove('active-green', 'active-red');
            }
        }

        // Toggle Substitution Status
        function toggleSubstitutionStatus(status) {
            document.getElementById('substitutionStatusInput').value = status;
            const yesButton = document.getElementById('substitutionStatusYes');
            const noButton = document.getElementById('substitutionStatusNo');

            if (status === 'Yes') {
                yesButton.classList.add('active-green');
                yesButton.classList.remove('active-red');
                noButton.classList.remove('active-green', 'active-red');
            } else {
                noButton.classList.add('active-red');
                noButton.classList.remove('active-green');
                yesButton.classList.remove('active-green', 'active-red');
            }
        }
    </script>
</body>