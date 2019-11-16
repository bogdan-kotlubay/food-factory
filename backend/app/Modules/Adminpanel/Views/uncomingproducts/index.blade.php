@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Расход товара
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
                <li class="active">Расход товара</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{ route('adminpanel.uncomingproducts.create') }}" class="btn btn-success">Добавить расход по товару</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Наименование товара</th>
                            <th>Количество</th>
                            <th>Дата расхода</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($uncomingproducts as $uncomingproduct)
                            <tr>
                                <td>{{$uncomingproduct->id}}</td>
                                <td>{{$uncomingproduct->name}}</td>
                                <td>{{$uncomingproduct->count}}</td>
                                <td>{{$uncomingproduct->created_at}}</td>

                                <td><a href="{{ route('adminpanel.uncomingproducts.edit', $uncomingproducts->id) }}" class="fa fa-pencil"></a>
                                {{Form::open(['route'=>['adminpanel.uncomingproducts.destroy', $uncomingproducts->id], 'method'=>'delete'])}}
                                <button onclick="return confirm('Вы уверены?')" type="submit" class="delete">
                                    <i class="fa fa-remove"></i>
                                </button>

                                {{Form::close()}}

                                </td>
                            </tr>
                        @endforeach

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
