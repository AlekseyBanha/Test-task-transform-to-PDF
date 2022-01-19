<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<link rel="stylesheet" href="{{ asset("css/style.css") }}">
<body>
<div class="container">
    <div class="col-md-8 section offset-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Generate certificate </h2>
            </div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel-body">
                <form action="{{ route('pdf.preview',) }}" method="post">
                    @csrf
                    <div class="number">
                        <label class="form-label">Certificate number:</label>
                        <input name="number" type="text"  class="form-control">
                    </div>
                    <div class="course">
                        <label class="form-label">Course name</label>
                        <input name="course" type="text" class="form-control">
                    </div>
                    <div class="name">
                        <label class="form-label">Student's name:</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="date">
                        <label class="form-label">Date of completion:</label>
                        <input name="date" type="text" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-2">Generate PDF</button>
                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>
