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
            <a href="{{route('admin.category.create')}}"> <h2>YOOO CREATE</h2></a>
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
                @foreach($categories as $category)
                    <tr>
                        <td>{{$loop->iteration + (($categories->currentPage() - 1)* $categories->perPage())}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->id}}</td>
                        <td>
                            <a href="{{route('admin.category.show', ['category' => $category->id])}}">Показать</a>
                            <a href="{{route('admin.category.edit', ['category' => $category])}}">Редактировать</a>
                            <form action="{{route('admin.category.destroy', compact('category'))}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">DELETE NAX</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $categories->links() !!}
        </div>
    </div>
@endsection
