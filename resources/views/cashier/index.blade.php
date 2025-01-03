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

                    <div class="card card-success card-outline">

                        <div class="card-header">
                            <h5 class="card-title m-0">Search Product</h5>
                        </div>

                        <div class="card-body">
                            <br>

                            <div class="row">
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><img src="{{ asset('assets/img/ex-product/burger.png') }}"> </span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Burger Bandel</span>
                                            <span class="info-box-number">Rp. 40.000</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><img src="{{ asset('assets/img/ex-product/french-fries.png') }}"></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Kentang Kentunk</span>
                                            <span class="info-box-number">Rp. 15.000</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-4 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><img src="{{ asset('assets/img/ex-product/ramen.png') }}"></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Ramen Mereun</span>
                                            <span class="info-box-number">Rp. 28.000</span>
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


                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Order Number : #2314412</h5>
                        </div>

                        <div class="card-body">
                            <!-- ============================ START LIST PRODUCT ==================================== -->
                            <div class="alert alert-secondary mb-2" role="alert">
                                <div class="row col-12">
                                    <div class="col-8">
                                        <span><img src="{{ asset('assets/img/ex-product/burger.png') }}" width="35px"></span>
                                        Burger Bandel
                                    </div>

                                    <div class="col-4">
                                        <div class="row">
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-success" id="btn-minus">-</button>
                                                <span id="counter">1</span>
                                                <button class="btn btn-sm btn-success" id="btn-plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="alert alert-secondary mb-2" role="alert">
                                <div class="row col-12">
                                    <div class="col-8">
                                        <span><img src="{{ asset('assets/img/ex-product/french-fries.png') }}" width="35px"></span>
                                        Kentang Kentunk
                                    </div>

                                    <div class="col-4">
                                        <div class="row">
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-success" id="btn-minus">-</button>
                                                <span id="counter">1</span>
                                                <button class="btn btn-sm btn-success" id="btn-plus">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================ END LIST PRODUCT ==================================== -->


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
                            <a href="#" class="btn btn-success"><i class="nav-icon fas fa-shopping-basket"></i> ADD TO CHART</a>
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

<script>
    const min = 1;
    const max = 10;
    const counter = document.getElementById('counter');
    const btnMinus = document.getElementById('btn-minus');
    const btnPlus = document.getElementById('btn-plus');

    btnMinus.addEventListener('click', () => {
        let count = parseInt(counter.textContent);
        if (count > min) {
            count--;
        }
        counter.textContent = count;
    });

    btnPlus.addEventListener('click', () => {
        let count = parseInt(counter.textContent);
        if (count < max) {
            count++;
        }
        counter.textContent = count;
    });
</script>
@endsection