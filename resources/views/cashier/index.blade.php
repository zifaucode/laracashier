@extends('layouts-cashier.app')
@section('title')
Dashboard
@endsection


@section('head')



@endsection

@section('content')

<div id="app" v-cloak>

    <div class="content-header">
        <div class="container">
            <div class="row mb-2">

            </div>
        </div>
    </div>


    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <div class="card card-primary card-outline">

                        <div class="card-header">
                            <h5 class="card-title m-0">Search Product</h5>
                        </div>

                        <div class="card-body">
                            <br>

                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Bookmarks</span>
                                            <span class="info-box-number">410</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Bookmarks</span>
                                            <span class="info-box-number">410</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Bookmarks</span>
                                            <span class="info-box-number">410</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                <div class="col-lg-4">


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Order Number : #2314412</h5>
                        </div>

                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>

                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

                            <div class="btn-group btn-group-toggle mb-4" data-toggle="buttons">
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                    <span class="text-xl"> <i class="nav-icon fas fa-money-bill"></i></span>
                                    <br>
                                    Cash Method
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                    <span class="text-xl"><i class="nav-icon fas fa-money-check"></i></span>
                                    <br>
                                    Debit Card
                                </label>
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                    <span class="text-xl"><i class="nav-icon fas fa-credit-card"></i></span>
                                    <br>
                                    Credit Card
                                </label>

                            </div>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
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
    let app = new Vue({
        el: '#app',
        data: {

        },
        methods: {

        }
    })
</script>
@endsection