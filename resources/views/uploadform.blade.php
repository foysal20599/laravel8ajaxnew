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
                    <form  action="{{ route('upload.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4>Laravel 8 Ajax File Upload with Progress Bar</h4>
                        
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
      
    </body>
</html>