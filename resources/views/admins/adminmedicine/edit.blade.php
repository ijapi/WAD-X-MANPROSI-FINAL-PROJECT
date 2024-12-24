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
</head>
<body>
  <div class="container mt-4">
      <h1>Edit Medicine - {{ $medicine->name }}</h1>

      <form action="{{ route('adminmedicine.update', $medicine->id) }}" method="POST">
        @csrf
        @method('PUT')
      </form>
          
          <div class="form-group">
              <label for="medicine_name">Name</label>
              <input type="text" class="form-control" id="medicine_name" name="name" value="{{ $medicine->name }}" required>
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" name="description" value="{{ $medicine->description }}" required>
          </div>
          <div class="form-group">
              <label for="price">Price</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ $medicine->price }}" required>
          </div>
          <div class="form-group">
              <label for="stock">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" value="{{ $medicine->stock }}" required>
          </div>

          <button type="submit" class="btn btn-success">Update Medicine</button>
          <a href="{{ route('adminmedicine.index') }}" class="btn btn-danger">Cancel</a>
      </form>
  </div>
</body>
@endsection