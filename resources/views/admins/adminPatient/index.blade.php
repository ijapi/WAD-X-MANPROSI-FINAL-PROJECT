@extends('admins.index')
@section('content')

<div class="container mt-4">
    <h1 class="mb-4" style="margin-top:50px">{{ $nav }}</h1>

    <div class="mb-3">
        <a href="#" class="btn btn-primary">Add Patient</a>
    </div>

    <div class="card">
        <div class="card-header">
            List of Patients
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Patient Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>ID Card</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $index => $patient)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $patient->patient_name }}</td>
                            <td>{{ $patient->date_of_birth }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->email }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->id_card }}</td>
                            <td>{{ $patient->username }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a> 
                                <form action="#" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Patients found.</td> <!-- Adjust colspan as necessary -->
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
