<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>



    <div class="container m-5">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">roll</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                  </tr>
                 
                 
                </tbody>
              </table>
        </div>
        <div class="col-md-6">
         <form action="{{route('student.store')}}" method="POST">
             @csrf
             <div class="card">
                 <div class="card-header">
                     <span class="text-info" id="addID">Add Student</span>
                     <span class="text-success" id="updateID">Update Student</span>
                 </div>
                 <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" name="email">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="phone">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="address">
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Roll</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="roll">
                      </div>
                      <button type="submit" id="submitID" class="btn btn-primary">Submit</button>
                      <button type="submit" id="updatesubmitID" class="btn btn-success">Update</button>
                 </div>
                
             </div>
            
           </form>
        </div>
    </div>
    </div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
   $('#addID').show();
   $('#submitID').show();
   $('#updateID').hide();
   $('#updatesubmitID').hide();

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function allData(){
        $.ajax({
            type:"GET",
            dataType:"json",
            url:"all/student",
            success:function(data){
                $.each(data function(key, value){
                    console.log(value)
                });
               
            }
        });
    }
 allData();

</script>
</body>
</html>