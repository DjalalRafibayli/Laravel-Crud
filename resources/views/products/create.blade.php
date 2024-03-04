<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product Create</h1>
    <form method="post" action="{{route('products.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name"/>
        </div>
        <div>
            <label>Qunatity</label>
            <input type="number" name="quantity" placeholder="Qunatity"/>
        </div>
        <div>
            <input type="submit" value="Submit"/>
        </div>
    </form>
</body>
</html>