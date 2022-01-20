<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificates</title>
</head>
<link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.css") }}">
<style>
    body {
        padding: 20px;
    }
</style>
<body>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Course</th>
        <th scope="col">Student</th>
        <th scope="col">Certificate number</th>
        <th scope="col">Created at</th>
    </tr>
    </thead>
    <tbody>
    @foreach($certificates as $certificate)
        <tr>
            <th scope="row">{{$certificate->id}}</th>
            <td>{{$certificate->course}}</td>
            <td>{{$certificate->name}}</td>
            <td>{{$certificate->number}}</td>
            <td>{{substr($certificate->created_at,0,11)}}</td>
            <td><a href="{{ route('download',$certificate->id) }}" class="btn btn-primary">Download PDF </a></td>
        </tr>
    @endforeach
    </tbody>
    <div class="col-md-12">
        {{ $certificates->links("pagination::bootstrap-4") }}
    </div>
    {{--    <a href="#" class="btn btn-primary">Download All</a>--}}
    <a href="{{ route('pdf.create') }}" class="btn btn-primary">Greate new certificate </a>
    <a href="{{ route('download.Last') }}" class="btn btn-success m-5">Download last certificate </a>
</table>
</body>
</html>
