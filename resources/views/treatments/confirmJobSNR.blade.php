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

    /* Toggle button styles */
    .btn-toggle {
        width: 120px;
        padding: 5px 10px;
        border: none;
        font-size: 14px;
        border-radius: 5px;
        font-weight: 500;
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
        gap: 10px; /* Add spacing between buttons */
    }

    /* Align and adjust input and label fields */
    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 15px;
    }

    .form-label {
        font-weight: bold;
    }

    /* Description field alignment and visibility */
    .description-container {
        display: flex;
        align-items: center;
    }

    .description-container input {
        width: 100%;
    }
</style>

<body style="background-color: #f8f9fa">
    <div class="abc">
        <form action="/saveReport" method="POST" class="p-4 rounded shadow bg-white" style="width: 100%; max-width: 520px;">
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

            {{-- Auto-fill Fields --}}
            <input name="appId" type="hidden" id="specificSizeID" value="{{ $job->id }}"> <!-- Hidden appointment ID -->

            <!-- Patient Information Fields -->
            @foreach (['name', 'age', 'gender', 'date', 'appNo', 'disease', 'drugName', 'dosage'] as $field)
            <div class="mb-3 row">
                <label for="{{ $field }}" class="col-sm-4 col-form-label">{{ ucfirst($field) }}</label>
                <div class="col-sm-8">
                    <input type="text" class="col-sm-8 form-control" id="{{ $field }}" value="{{ $job->$field }}" readonly>
                </div>
            </div>
            @endforeach

            <!-- Patient Status -->
            <div class="mb-3 row">
                <label for="patientStatus" class="col-sm-4 col-form-label">Patient Status</label>
                <div class="col-sm-8 btn-toggle-group">
                    <button type="button" class="btn btn-toggle {{ $job->patientStatus === 'Normal' ? 'active-green' : 'active-red' }}" disabled>
                        {{ ucfirst($job->patientStatus) }}
                    </button>
                </div>
            </div>

            <!-- Substitution Status -->
            <div class="mb-3 row">
                <label for="substitutionStatus" class="col-sm-4 col-form-label">Substitution Status</label>
                <div class="col-sm-8 btn-toggle-group">
                    <button type="button" class="btn btn-toggle {{ $job->substitutionStatus === 'Yes' ? 'active-green' : 'active-red' }}" disabled>
                        {{ ucfirst($job->substitutionStatus) }}
                    </button>
                </div>
            </div>

            <!-- Doctor Name -->
            <div class="mb-3 row">
                <label for="dName" class="col-sm-4 col-form-label">Doctor Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="dName" value="{{ $job->dName }}" readonly>
                </div>
            </div>

            <hr>
                <div class="mb-3">
                    <h4 style="text-align: center">Processing Details</h4>
                </div>
            <hr>

            <!-- Prepared By -->
            <div class="mb-3 row">
                <label for="preparedBy" class="col-sm-4 col-form-label">Prepared By</label>
                <div class="col-sm-8">
                    <input type="text" name="preparedBy" class="form-control" id="preparedBy" value="{{ $job->preparedBy }}" readonly>
                </div>
            </div>

            <!-- Role -->
            <div class="mb-3 row">
                <label for="pRole" class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8">
                    <input type="text" name="pRole" class="form-control" id="pRole" value="{{ $job->pRole }}" readonly>
                </div>
            </div>

            <!-- Doctor Consultancy -->
            <div class="mb-3 row">
                <label for="doctorConsultancy" class="col-sm-4 col-form-label">Doctor Consultancy</label>
                <div class="col-sm-8 btn-toggle-group">
                    <button type="button" class="btn btn-toggle {{ $job->dConsultancy === 'Yes' ? 'active-green' : 'active-red' }}" disabled>
                        {{ ucfirst($job->dConsultancy) }}
                    </button>
                </div>
            </div>

            <!-- Description Field -->
            @if(!empty($job->description))
                <div class="mb-3 row">
                    <label for="description" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="description" value="{{ $job->description }}" readonly>
                    </div>
                </div>
            @endif


            <!-- Checked By -->
            <div class="mb-3 row">
                <label for="checkedBy" class="col-sm-4 col-form-label">Checked By</label>
                <div class="col-sm-8">
                    <input type="text" name="checkedBy" class="form-control" id="checkedBy" value="{{ $currentUser->name }}" readonly>
                </div>
            </div>

            <!-- Role -->
            <div class="mb-3 row">
                <label for="cRole" class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8">
                    <input type="text" name="cRole" class="form-control" id="cRole" value="{{ $currentUser->role }}" readonly>
                </div>
            </div>

            <hr>

            <!-- Buttons -->
            <div class="d-flex justify">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-danger me-2">Reset</button>
                <a href="/dashboard" class="btn btn-warning">Dashboard</a>
            </div>
        </form>
    </div>    
</body>