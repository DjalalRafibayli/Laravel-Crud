<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Product Edit</h1>
    @if (session()->has('success'))
    <div>
        {{session('success')}}
    </div>
    @else
    <div>
        An Error Ocured
    </div>
    @endif
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{route('products.update',['product' => $product])}}">
        @csrf
        @method('put')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product->name}}"/>
        </div>
        <div>
            <label>Qunatity</label>
            <input type="number" name="Quantity" placeholder="Quantity" value="{{$product->Quantity}}"/>
        </div>
        <div>
            <input type="submit" value="Submit"/>
        </div>
    </form>
</body>
</html>