@extends('Adminpanel::layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Приход товара
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
                <li class="active">Приход товара</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                {{Form::open([
                    'route'	=> 'adminpanel.comingproducts.store',
                    'files'	=>	true
                ])}}

                    <select class="form-control" name="groups" id="groups_id" onchange="get_prod_by_id()">
                        <option selected>Выберите категорию</option>
                    </select>

                    <select name="goods" id="goods" class="form-control goods">
                        <option selected>Выберите продукт</option>
                    </select>
                    <button style="margin:2% 0 2% 0;" class="btn btn-success pull-right">Добавить товары</button>
                </div>

            {!! Form::close() !!}

                <button id="addProduct">Add Product</button>

                <div id="someContainer"></div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <script>

        // $('select[id="goods"]').prop("disabled", false);

        getcategories();

        //Get Categories
    function getcategories() {
        let url = ('http://sh.evos.uz/admin/api/groups');
        let $inputProduct = $("select[name='groups']");
        let select_cat = $('select[name="groups"]');
    try{
            $.get(url, function (data, status) {
                if (status != 'success') {
                    alert('Error request:' + status);
                } else {
                    let result = JSON.parse(data);
                    console.log(result);
                    let _id = result.rid;
                    let categories = result.categories;
                    for (let i = 0; i < categories.length; i++) {
                        select_cat.append(`<option value="${_id[i]}" selected>${categories[i]}</option>`)
                    }
                }
            });
    }catch (e) {
            alert(e)
        }
    }

        //Get products by Category id
        function get_prod_by_id() {
            let url = 'http://sh.evos.uz/admin/api/goods';
            let goods_id = $('#groups_id').val();
                try {
            $.ajax({
                type: "POST",
                url: url,
                data: {"id": goods_id},
                cache: false,
                success: function(data)
                {
                    let dataParse  = JSON.parse(data);
                    let list = '';
                    for (let i in dataParse.id) {
                        list += '<option value="i">'+dataParse.name[i] + '</option>';
                        $('.goods').html(list);
                    }

                }
            });
                }catch (e) {
                        alert(e)
                }
        }


        $(function() {
            $("#addProduct").click(function() {
                if($('#someContainer table').length > 0)
                {
                    var row = $('<tr></tr>');
                    for(i=0; i<10; i++){
                        var row1 = $('<td></td>').addClass('bar').text('result ' + i);
                        row.append(row1);
                    }
                    $('#someContainer table').append(row);
                }
                else
                {
                    var table = $('<select></select>').addClass('foo');
                    for(i=0; i<10; i++){
                        var row = $('<tr></tr>');
                        for(i=0; i<10; i++){
                            var row1 = $('<td></td>').addClass('bar').text('result ' + i);
                            table.append(row);
                            row.append(row1);
                        }
                    }
                    $('#someContainer').append(table);
                }
            });
        });

    </script>
    <!-- /.content-wrapper -->
@endsection

