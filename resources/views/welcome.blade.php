<!DOCTYPE html>
<html>
    <head>
        <title>Laravel 8 Ajax File Upload with Progress Bar</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>

            body{
                background: #ccc;
            }

            form{
                background: #fff;
                padding: 20px;
            }

            .progress { 
                position:relative;
                width:100%;
            }
            .bar { 
                background-color: #082708;
                width:0%;
                height:20px;
            }
            .percent {
                position:absolute;
                display:inline-block; 
                left:50%;
                color: #fff;
            }
            .progress {
            background-color: #979ca0;
        }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if (session('success'))
                        <p>{{ session('success')}} </p>
                    @endif

                    <form method="POST" action="{{url('upload')}}" enctype="multipart/form-data">

                        <h4>Laravel 8 Ajax File Upload with Progress Bar</h4>
                        @csrf
                        <div class="form-group">
                            <input name="file" type="file" class="form-control"><br/>
                            <div class="progress">
                                <div class="bar"></div >
                                <div class="percent">0%</div >
                            </div>
                            <br>
                            <input type="submit"  value="Submit" class="btn btn-dark btn-lg col-12">
                        </div>
                    </form>
                </div>
            </div>
        </div>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        <script type="text/javascript">
            var SITEURL = "{{URL('/')}}";
            $(function () {
                $(document).ready(function () {
                    var bar = $('.bar');
                    var percent = $('.percent');
                    $('form').ajaxForm({
                        beforeSend: function () {
                            var percentVal = '0%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        uploadProgress: function (event, position, total, percentComplete) {
                            var percentVal = percentComplete + '%';
                            bar.width(percentVal)
                            percent.html(percentVal);
                        },
                        complete: function (xhr) {
                            alert('File Has Been Uploaded Successfully');
                            // window.location.href = SITEURL + "/" + "upload-form";
                            window.location.href = SITEURL + "/";
                        }
                    });
                });
            });
        </script>
    </body>
</html>