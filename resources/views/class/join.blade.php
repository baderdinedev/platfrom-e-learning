<style>
    /* Set the font family and size */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  background: linear-gradient(to bottom, #4a148c, #880e4f);
  color:white;
  align-items:center;
}

/* Center the form */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.card {
  width: 400px;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

/* Style the form fields */
.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 10px;
  border-radius: 3px;
  border: 1px solid #ccc;
  font-size: 16px;
}

/* Style the submit button */
button[type="submit"] {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 3px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button[type="submit"]:hover {
  background-color: #0069d9;
}
.back-link {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ccc;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}
</style>
<div class="container">
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ url()->previous() }}" class="back-link">Back</a>
            <div class="card">
                <div class="card-header">{{ $classroom->name }}</div>

                <div class="card-body">
                    <p>{{ $classroom->description }}</p>
                    <p>Created by: {{ $classroom->teacher->name }}</p>
                    <form method="POST" action="{{ route('classroom.join', $classroom->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="student_code">Enter Student Code:</label>
                            <input type="text" class="form-control" id="student_code" name="student_code" required>
                            @if ($errors->has('student_code'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('student_code') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Join</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
