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
            <a href="{{route('admin.brand.create')}}"> <h2>YOOO CREATE</h2></a>
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
                @foreach($brands as $brand)
                <tr>
                    <td>{{$loop->iteration + (($brands->currentPage() - 1)* $brands->perPage())}}</td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->id}}</td>
                    <td>
                        <a href="{{route('admin.brand.show', ['brand' => $brand->id])}}">Показать</a>
                        <a href="{{route('admin.brand.edit', ['brand' => $brand])}}">Редактировать</a>
                        <form action="{{route('admin.brand.destroy', compact('brand'))}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">DELETE NAX</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {!! $brands->links() !!}
        </div>
    </div>
@endsection
