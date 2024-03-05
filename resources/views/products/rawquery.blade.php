<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    <div>Index</div>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Quantity</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->Quantity}}</td>
                    <td>
                        <a href="{{route('products.raw_edit', ['product' =>$product->id])}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('products.raw_delete', ['product' => $product->id])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>    
            @endforeach
        </tbody>
    </table>
</body>
</html>