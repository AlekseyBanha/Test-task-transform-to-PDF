<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Generate PDF </title>

</head>

<style >
    h2 {
        text-align: center;
        font-size: 22px;
        margin-bottom: 50px;
    }
    img {
        margin-left: 540px;

    }
    div {
        margin: 2px;
        padding: 2px;
    }
    body { font-family: DejaVu Sans, sans-serif;
        background: #f2f2f2;
    }

</style>
<body>
<div class="container">
    <div class="panel-heading">
        <h2>Certificate of passing - {{$data['course']}}.</h2>
    </div>
    <div class="panel-body" style="position: absolute;top: 100px">
        <div class="number">
            <label class="form-label"><strong>Certificate number:{{$data['number']}}.</strong></label>
        </div>
        <div class="name">
            <label class="form-label"><strong>Student's name:</strong></label>
            <div class="form-label">{{$data['name']}}</div>
        </div>
        <div class="date" style="margin-top: 100px">
            <label class="form-label"><strong>Date of completion:</strong></label>
            <div class="form-label">{{$data['date']}}</div>

            <img
                src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(100)->generate('https://example.com/certificates/'.$data['id'])) }} ">
        </div>

</body>
</html>
