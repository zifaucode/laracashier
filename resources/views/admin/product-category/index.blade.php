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
                    <h1 class="m-0">Product Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Product Category</li>
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
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">Tambah Category Product</a>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Nama </th>
                                            <th>Total items </th>
                                            <th style="width: 100px; text-align:center;">Action </th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr v-for="(categories, index) in category">
                                            <td>@{{ index+1 }}</td>
                                            <td>@{{ categories.name }}</td>
                                            <td>0</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-warning" @click="onSelcected(categories.id)" data-toggle="modal" data-target="#modal-lg-edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg>
                                                </a>

                                                <a href="#" @click.prevent="deleteRecord(categories.id)" class="btn btn-danger" title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- =========================== MODAL CREATE CATEGORY ================================= -->
                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-lg">
                        <form class="form" @submit.prevent="submitForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Create Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="categoryNameInput">Category Name :</label>
                                        <input type="text" class="form-control" id="categoryNameInput" v-model="category_name" placeholder="Enter Category Name">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" :class="loading && 'spinner spinner-white spinner-right'" :disabled="loading">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- =========================== MODAL CREATE CATEGORY ================================= -->



                <!-- =========================== MODAL EDIT CATEGORY ================================= -->
                <div class="modal fade" id="modal-lg-edit">
                    <div class="modal-dialog modal-lg">
                        <form class="form" @submit.prevent="submitFormEdit">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Category</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="categoryNameInput">Category Name :</label>
                                        <input type="text" class="form-control" id="categoryNameInput" v-model="categoryDetail.name" placeholder="Enter Category Name">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" :class="loading && 'spinner spinner-white spinner-right'" :disabled="loading">Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- =========================== MODAL EDIT CATEGORY ================================= -->

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
            category_name: '',
            categoryDetail: [],
            loading: false,

        },
        methods: {
            onSelcected: function(id) {
                this.categoryDetail = this.category.filter((item) => {
                    return item.id == id;
                })[0]

            },
            submitForm: function() {
                this.sendData();
                vm.loading = true;
            },
            submitFormEdit: function() {
                this.sendDataEdit();
            },
            sendData: function() {
                let vm = this;
                vm.loading = true;

                const data = {
                    category_name: vm.category_name,
                }

                axios.post('/admin/product-category', data)
                    .then(function(response) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Data has been saved',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/product-category/';
                            }
                            vm.loading = false;
                        })
                        // console.log(response);
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire(
                            'Oops!',
                            'Something wrong',
                            'error'
                        )
                        vm.loading = false;
                    });
            },
            sendDataEdit: function() {
                let vm = this;
                vm.loading = true;

                const data = {
                    category_name: this.categoryDetail['name'],
                }
                axios.post('/admin/product-category/edit/' + this.categoryDetail['id'], data)
                    .then(function(response) {

                        Swal.fire({
                            title: 'Success',
                            text: 'Data has been saved',
                            icon: 'success',
                            allowOutsideClick: false,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/admin/product-category/';
                            }
                            vm.loading = false;
                        })
                        // console.log(response);
                    })
                    .catch(function(error) {
                        vm.loading = false;
                        console.log(error);
                        Swal.fire(
                            'Oops!',
                            'Something wrong',
                            'error'
                        )
                        vm.loading = false;
                    });
            },
            deleteRecord: function(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "The data will be deleted",
                    icon: 'warning',
                    reverseButtons: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return axios.delete('/admin/product-category/' + id)
                            .then(function(response) {
                                console.log(response.data);
                            })
                            .catch(function(error) {
                                console.log(error.data);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops',
                                    text: 'Something wrong',
                                })
                            });
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Data has been deleted',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.reload();
                            }
                        })
                    }
                })
            }
        }
    })
</script>
@endsection