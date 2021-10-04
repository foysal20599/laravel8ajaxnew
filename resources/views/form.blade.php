<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('form.store')}}" method="POST">
        @csrf
       <div>
        <input type="text" name="name" placeholder="Name">
        @error('name')
           <span style="color: red;"> {{ $message }} </span>
        @enderror
       </div>

        <div>
            <input type="text" name="email"  placeholder="Email">
            @error('email')
            <span style="color: red;"> {{ $message }} </span>
            @enderror
        </div>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>