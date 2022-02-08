@extends('layouts.admin')
@section('table')
    <div class="content-box-large">
        <div class="panel-heading">
            <div class="panel-title">Hover Rows</div>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
            </div>
        </div>
        <div class="panel-body">
            <a href="{{route('admin.product.create')}}"> <h2>YOOO CREATE</h2></a>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Brand Name</th>
                    <th>id</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$loop->iteration + (($products->currentPage() - 1)* $products->perPage())}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->id}}</td>
                        <td><a href="{{ $product->img }}"><img src="{{ $product->img }}" width="100px" height="100px" title="click to see full img"></a></td>
                        <td>
                            <a href="{{route('admin.product.show', ['product' => $product->id])}}">Показать</a>
                            <a href="{{route('admin.product.edit', ['product' => $product])}}">Редактировать</a>
                            <form action="{{route('admin.product.destroy', compact('product'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">DELETE NAX</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $products->links() !!}
        </div>
    </div>
@endsection
