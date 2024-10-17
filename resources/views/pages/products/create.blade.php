@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="card card-dark mb-4"> <!--begin::Header-->
            <div class="card-header">
                <div class="card-title">Produto</div>
            </div> <!--end::Header--> <!--begin::Body-->
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3"><label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                                        <input type="text" name="name" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"></div>
                                    <div class="input-group mb-3"><input type="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <label for="validationCustom04" class="form-label">Categoria</label>
                                    <select class="form-select" id="validationCustom04" required="">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3"><label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text">
                                            We'll never share your email with anyone else.
                                        </div>
                                    </div>
                                    <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1"></div>
                                    <div class="input-group mb-3"><input type="file" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label></div>

                                </div>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-dark">Enviar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
