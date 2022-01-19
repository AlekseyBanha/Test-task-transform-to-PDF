<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Generate PDF</title>
</head>
<style type="text/css">
    h2 {
        text-align: center;
        font-size: 22px;
        margin-bottom: 50px;
        font-family: times;
    }

    body {
        background: #f2f2f2;
    }

    .section {
        margin-top: 30px;
        padding: 50px;
        background: #fff;
    }

    .pdf-btn {
        margin-top: 30px;
    }
</style>
<body>
<div class="container">
    <div class="col-md-8 section offset-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2>Certificate </h2>
            </div>
            <div class="panel-body">
                <div class="number">
                    <label class="form-label">Certificate number:</label>
                    <div class="form-label">{{$data['number']}}</div>
                </div>
                <div class="course">
                    <label class="form-label">Course name</label>
                    <div class="form-label">{{$data['course']}}</div>
                </div>
                <div class="name">
                    <label class="form-label">Student's name:</label>
                    <div class="form-label">{{$data['name']}}</div>
                </div>
                <div class="date">
                    <label class="form-label">Date of completion:</label>
                    <div class="form-label">{{$data['date']}}</div>
                </div>
                <div class="text-center pdf-btn">
                    <a href="{{ route('pdf.generate') }}" class="btn btn-primary">Generate PDF</a>
                </div>
                <div class="text-center pdf-btn">
                    <a href="{{ route('all') }}" class="btn btn-primary">Go to all</a>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
