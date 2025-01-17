@extends('layouts-admin.app')
@section('title')
Dashboard
@endsection


@section('head')
<style>
    /* / */
</style>


@endsection

@section('content')

<div id="app" v-cloak>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header" style="text-align: right;">
                            <a href="/admin/product/create" class="btn btn-success">Tambah Product</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Image </th>
                                            <th>Nama </th>
                                            <th>Category </th>
                                            <th>Stock </th>
                                            <th>unit price </th>
                                            <th>Total </th>
                                            <th>Barcode </th>
                                            <th style="width: 50px; text-align:center;">Action </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <!-- <tr v-for="(product ,index) in products"> -->
                                        @foreach($product as $products)
                                        <tr>
                                            <td>1</td>
                                            <td><img src="/file/product-image/{{ $products->product_image }}" alt="" width="60px"></td>
                                            <td>{{ $products->name ?? 'PRODUCT NAME' }}</td>
                                            <td>{{ $products->category->name ?? 'CATEGORY NAME' }}</td>
                                            <td>{{ $products->stock ?? 0 }}</td>
                                            <td>{{ $products->unit_price ?? 0 }}</td>
                                            <td>0</td>
                                            <td>{!! DNS1D::getBarcodeSVG("-131452535", 'PHARMA',2,50) !!}</td>
                                            <td>
                                                <a href="#" class="btn btn-danger" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection

@section('pagescript')

@section('pagescript')
<script>
    const products = <?php echo Illuminate\Support\Js::from($product) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            products,

        },
        methods: {

        }
    })
</script>
@endsection