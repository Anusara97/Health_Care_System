@include('cdn')

{{-- Scripts related to the deletion --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- end scripts --}}

{{-- <x-def-Header/> --}}

<body style="background-color: #f8f9fa">
    <div class="container mt-5">
        <h2 class="text-center mb-4">User Informations</h2>
        <div class="table-responsive mx-auto" style="max-width: 90%; padding: 15px; background: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            
            {{-- Confirmation Notification --}}
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

            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>SLMC No.</th>
                        <th>Role</th>                        
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add your dynamic content here -->
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user['name']}}</td>
                            <td>{{$user['age']}}</td>
                            <td>{{$user['telNo']}}</td>
                            <td>{{$user['email']}}</td>
                            <td>{{$user['gender']}}</td>
                            <td>{{$user['slmcNo']}}</td>
                            <td>{{$user['role']}}</td>                        
                            <td>
                                <a href="{{"edit/".$user['id']}}" class="btn btn-success">Edit</a> 
                                <button class="btn btn-danger" onclick="showRejectAlert('{{url('remove/'.$user['id'])}}')">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <script>
                    function showRejectAlert(url) {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to undo this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Yes, Remove the User!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to the URL to delete the user
                                window.location.href = url;
                            }
                        });
                    }
                </script>
            </table>
        </div>
    </div>
</body>