@include('cdn')

{{-- <x-log-Reg_-Header/> --}}

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
        <form action="/register" method="POST" class="p-4 rounded shadow bg-white" style="width: 100%; max-width: 500px;">
            @csrf
            
            {{-- Registration Confirmation Notification --}}
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

            <!-- Placeholder for alert -->
            <div id="formAlertContainer"></div>           
            
            <div class="mb-3">
                <h2 style="text-align: center">User Registration</h2>
            </div>

            <hr>

            <!-- Name -->
            <div class="mb-3 row">
                <label for="specificSizeInputName" class="col-sm-4 col-form-label">Name with initials</label>
                <div class="col-sm-8">
                    <input name="name" type="text" class="form-control" id="specificSizeInputName" placeholder="A.B.C.Perera" required>
                    <span class="text-danger">
                        @error('name')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Age -->
            <div class="mb-3 row">
                <label for="specificSizeInputAge" class="col-sm-4 col-form-label">Age</label>
                <div class="col-sm-8">
                    <input name="age" type="text" class="form-control" id="specificSizeInputName" placeholder="E.g:35" required>
                </div>
            </div>

            <!-- Contact Number -->
            <div class="mb-3 row">
                <label for="specificSizeInputTelNo" class="col-sm-4 col-form-label">Contact Number</label>
                <div class="col-sm-8">
                    <input name="telNo" type="text" class="form-control" id="specificSizeInputTelNo" placeholder="07x1234567" required>
                    <span class="text-danger">
                        @error('telNo')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3 row">
                <label for="specificSizeInputEmail" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input name="email" type="email" class="form-control" id="specificSizeInputEmail" placeholder="perera@ruh.ac.lk" required>
                    <span class="text-danger">
                        @error('email')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Gender -->
            <div class="mb-3 row align-items-center">
                <label for="specificSizeInputName" class="col-sm-4 col-form-label">Gender</label>
                <div class="col-sm-8 d-flex">
                    {{-- Male --}}
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="gender" value="Male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    {{-- Female --}}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>

            <!-- NIC -->
            <div class="mb-3 row">
                <label for="specificSizeInputNic" class="col-sm-4 col-form-label">NIC</label>
                <div class="col-sm-8">
                    <input name="nic" type="text" class="form-control" id="specificSizeInputNic" placeholder="909090909V" required>
                    <span class="text-danger">
                        @error('nic')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            {{-- Role --}}
            <div class="mb-3 row">
                <label for="Role" class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8">
                    <select name="role" class="form-control" id="Role" placeholder="-Select One-">
                        <option value="Doctor">Doctor</option>
                        <option value="Senior Pharmacists">Senior Pharmacists</option>
                        <option value="Junior Pharmacists">Junior Pharmacists</option>
                        <option value="Patient" selected>Patient</option>        
                    </select>
                </div>
            </div>

            <!-- SLMC Registration Number -->
            <div class="mb-3 row d-none" id="SLMCField">
                <label for="specificSizeInputSLMC" class="col-sm-4 col-form-label">SLMC Registration Number</label>
                <div class="col-sm-8">
                    <input name="slmcNo" type="text" class="form-control" id="specificSizeInputSLMC">
                </div>
            </div>

            <script>
                document.getElementById('Role').addEventListener('change', function () {
                    const SLMCField = document.getElementById('SLMCField');
                    const SLMCInput = document.getElementById('specificSizeInputSLMC');
                    const selectedRole = this.value;

                    if (selectedRole === 'Doctor' || selectedRole === 'Senior Pharmacists' || selectedRole === 'Junior Pharmacists') {
                        SLMCField.classList.remove('d-none'); // Show SLMC field
                        SLMCInput.setAttribute('required', 'required'); // Make required
                    } else {
                        SLMCField.classList.add('d-none'); // Hide SLMC field
                        SLMCInput.removeAttribute('required'); // Remove required
                    }
                });
            </script>
            

            <!-- Password -->
            <div class="mb-3 row">
                <label for="specificSizeInputPassword" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input name="password" type="password" class="form-control" id="specificSizeInputPassword" placeholder="Password" required>
                    <span class="text-danger">
                        @error('password')
                            <br>                          
                            <div class="alert alert-danger" style="text-align:center;" >
                                {{$message}}
                            </div>
                        @enderror
                    </span>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3 row">
                <label for="specificSizeInputConfirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input name="confPassword" type="password" class="form-control" id="specificSizeInputConfirmPassword" placeholder="Confirm Password" required>
                </div>
            </div>

            <hr>

            <div class="d-flex justify">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            const password = document.getElementById('specificSizeInputPassword').value;
            const confPassword = document.getElementById('specificSizeInputConfirmPassword').value;

            // Get alert container and remove any existing alerts
            const alertContainer = document.getElementById('formAlertContainer');
            alertContainer.innerHTML = '';

            if (password !== confPassword) {
                event.preventDefault(); // Prevent form submission

                // Create a new Bootstrap-styled alert
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-danger';
                alertDiv.role = 'alert';
                alertDiv.innerHTML = `
                    <strong>Error!</strong> Passwords do not match. Please re-enter the same password.
                `;

                // Add alert to the container
                alertContainer.appendChild(alertDiv);
            }
        });
    </script>
</body>