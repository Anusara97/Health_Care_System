@include('cdn')

{{-- Scripts related to the deletion --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- end scripts --}}

{{-- <x-def-Header/> --}}

<body style="background-color: #f8f9fa">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Job List - Junior Pharmacists</h2>
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
                        <th>Date</th>
                        <th>Appointment Number</th>
                        <th>Patient Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Prescribed by</th>                                                
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Add your dynamic content here -->
                    @foreach ($data as $job)
                        <tr>
                            <td>{{$job['date']}}</td>
                            <td>{{$job['appNo']}}</td>
                            <td>{{$job['name']}}</td>
                            <td>{{$job['age']}}</td>
                            <td>{{$job['gender']}}</td>
                            <td>{{$job['dName']}}</td>                                                   
                            <td>
                                <a href="" class="btn btn-success">Process</a>                                
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