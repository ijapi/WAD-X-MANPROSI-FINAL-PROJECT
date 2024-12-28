@extends('admins.index')
@section('content')

<style>
    .table th {
        background-color: #851216;
        color: white;
        font-weight: 500;
    }

    .mb-3 {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }

    .mb-3 a{
        margin-bottom: 40px;
    }
</style>

<div class="container mt-4">

    <div class="mb-3">
        <h1 class="mb-4" style="margin-top:50px">{{ $nav }}</h1>
        <div>
            <a href="{{ route('adminPatient.create') }}" class="btn btn-primary">Add Patient</a>
        </div>
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
                            <td>
                                <a href="{{ route('adminPatient.edit', $patient->id) }}" class="btn btn-sm btn-warning" style="color:white; background-color: #ff9900;">Edit</a>
                                <form action="{{ route('adminPatient.destroy', $patient->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this patient?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Patients found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

