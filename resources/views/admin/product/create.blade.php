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
                    <h1 class="m-0">Create Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Create Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">

                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>

                        <form class="form" @submit.prevent="submitForm">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="productNameInput">Name</label>
                                    <input type="text" class="form-control" v-model="name" id="productNameInput" placeholder="Product Name">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="" id="" class="form-control" v-model="categoryId">
                                        <option value="">- CATEGORY</option>
                                        <option v-for="categories in category" :value="categories.id">@{{ categories.name }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="stockInput">Stock</label>
                                    <input type="text" class="form-control" v-model="stock" id="stockInput" placeholder="Stock">
                                </div>

                                <div class="form-group">
                                    <label for="unitPriceInput">Unit Price</label>
                                    <input type="text" class="form-control" v-model="unitPrice" id="unitPriceInput" placeholder="Unit Price">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">Product Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" ref="product_image" class="custom-file-input" accept=".jpeg, .png, .jpg" v-on:change="handleFileUpload" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>

                                    </div>
                                    <br>
                                    <div v-if="product_image">
                                        Product Image selected : <span class="badge badge-success">@{{ product_image.name }}</span>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </div>
    </div>

</div>

@endsection

@section('pagescript')

@section('pagescript')
<script>
    const category = <?php echo Illuminate\Support\Js::from($category) ?>;
    let app = new Vue({
        el: '#app',
        data: {
            category,
            name: '',
            stock: '',
            categoryId: '',
            unitPrice: '',
            product_image: '',

            loading: false,
        },
        methods: {
            handleFileUpload() {
                this.product_image = this.$refs.product_image.files[0];
                if (!this.product_image) {
                    return;
                }
                if (!this.isValidFileType(this.product_image)) {
                    return;
                }
            },
            isValidFileType(product_image) {
                const allowedExtensions = ['.jpeg', '.png', '.jpg'];
                return allowedExtensions.includes(product_image.name.split('.').pop().toLowerCase());
            },
            submitForm: function() {
                this.sendData();
            },
            sendData: function() {
                let vm = this;
                let data = {
                    image: vm.product_image,
                    image_name: vm.product_image['name'],

                    name: vm.name,
                    stock: vm.stock,
                    category_id: vm.categoryId,
                    unit_price: vm.unitPrice,
                }
                let formData = new FormData();
                for (var key in data) {
                    formData.append(key, data[key]);
                }
                axios.post('/admin/product', formData)
                    .then(function(response) {
                        vm.loading = false;
                        Swal.fire({
                            title: 'Success',
                            text: 'Data Has Been Save.',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/product';
                            }
                        })
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire({
                            title: 'Internal Error',
                            error: true,
                            icon: 'error',
                            text: error.response.data.message,
                        })
                    });
            },
        }
    })
</script>
@endsection