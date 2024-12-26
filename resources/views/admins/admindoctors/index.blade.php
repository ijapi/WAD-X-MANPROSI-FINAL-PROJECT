@extends('admins.index')
@section('content')

<style>
    .container {
        margin-top: 40px; /* Increased margin-top to move content down */
        padding: 20px; /* Added padding for better spacing */
    }
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .header h1 {
        margin: 0;
    }
    .btn-success {
        margin-bottom: 20px;
    }
    .table {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 15px 15px rgba(139, 0, 0, 0.5);
        width: 100%;
        border-collapse: collapse; /* Added border-collapse for better table appearance */
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
        padding: 15px;
        border: 1px solid #ddd; /* Added border for better readability */
    }
    .table th {
        background-color: #851216;
        color: white;
    }
    .btn {
        border: none;
        border-radius: 5px;
        color: white;
        width: 120px; /* Increased width for better button text */
        height: 40px;
        cursor: pointer;
        text-decoration: none;
        margin-bottom: 10px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
    }
    .btn-warning { background-color: #ff9900; }
    .btn-warning:hover { background-color: #e68a00; }
    .btn-danger { background-color: #dc3545; }
    .btn-danger:hover { background-color: #c82333; }
    .btn-info { background-color: #17a2b8; }
    .btn-info:hover { background-color: #138496; }
    .btn-success { background-color: #28a745; }
    .btn-success:hover { background-color: #218838; }
</style>

<!-- Include SweetAlert library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
</script>

<div class="container">
    <div class="header">
        <h1>Doctor Profiles</h1>
        <a href="{{ route('admindoctors.create') }}" class="btn btn-success">Add Doctor</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Working Hours</th>
                <th>Specialization ID</th>
                <th>Phone</th>
                <th>License Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr>
                <td>{{ $doctor->id }}</td>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->working_hours }}</td>
                <td>{{ $doctor->specialization_id }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->license_number }}</td>
                <td>
                    <a href="{{ route('admindoctors.edit', $doctor->id) }}" class="btn btn-warning">Edit Doctor</a>
                    <form action="{{ route('admindoctors.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="confirmDelete(event)">Delete Doctor</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection