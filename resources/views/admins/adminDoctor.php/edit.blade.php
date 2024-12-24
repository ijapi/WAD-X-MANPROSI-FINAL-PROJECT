@extends('admins.index')

@section('content')

<style>
  body {
    background-color: #f8f9fa;
  }

  .btn-primary, .btn-success, .btn-warning, .btn-danger {
    border: none;
    border-radius: 5px;
    color: white;
    width: 100px;
    height: 40px;
    cursor: pointer;
    text-decoration: none;
    margin-top: 15px;
    margin-bottom: 15px;
  }

  .btn-warning { background-color: #ff9900; }
  .btn-warning:hover { background-color: #e68a00; }

  .btn-danger { background-color: #dc3545; }
  .btn-danger:hover { background-color: #c82333; }

  .btn-success { background-color: #28a745; }
  .btn-success:hover { background-color: #218838; }

  /* Modal Styling */
  .modal-header {
    background-color: #851216;
    color: white;
    border-bottom: none;
  }

  .modal-content {
    border-radius: 15px;
    box-shadow: 0 15px 15px rgba(139, 0, 0, 0.5);
  }

  .modal-body {
    padding: 20px 30px;
  }

  .form-control {
    border-radius: 5px;
  }

  .text-right .btn {
    margin-left: 10px;
  }
</style>

<div class="container mt-4">
    <h1>Edit Doctor - {{ $doctor->name }}</h1>

    <form action="{{ route('admindoctor.update', $doctor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $doctor->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $doctor->email) }}" required>
        </div>

        <div class="form-group">
            <label for="working_hours">Working Hours</label>
            <input type="text" class="form-control" id="working_hours" name="working_hours" value="{{ old('working_hours', $doctor->working_hours) }}" required>
        </div>

        <div class="form-group">
            <label for="password">Password (Leave empty if not changing)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="specialization_id">Specialization</label>
            <select class="form-control" id="specialization_id" name="specialization_id" required>
                @foreach ($specializations as $specialization)
                    <option value="{{ $specialization->id }}" {{ old('specialization_id', $doctor->specialization_id) == $specialization->id ? 'selected' : '' }}>
                        {{ $specialization->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $doctor->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="license_number">Medical License Number</label>
            <input type="text" class="form-control" id="license_number" name="license_number" value="{{ old('license_number', $doctor->license_number) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Doctor</button>
        <a href="{{ route('admindoctor.index') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>

@endsection
