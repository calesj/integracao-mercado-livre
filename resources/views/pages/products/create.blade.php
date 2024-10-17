@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-3">
        @if($errors->count() > 0)
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

            @if(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif
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
                                    <div class="mb-3">
                                        <label class="form-label">Nome do produto</label>
                                        <input type="text" name="title" value="Relógio teste - não ofertar" required class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Tipo de anúncio</label>
                                        <select class="form-select" name="listing_type_id" required>
                                            @foreach($listingTypes as $type)
                                                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>
                                            @endforeach
                                        </select>
                                        <label class="form-label">Consulte todos em: <a href="https://api.mercadolibre.com/sites/MLB/listing_types" target="_blank">https://api.mercadolibre.com/sites/MLB/listing_types</a></label>
                                    </div>
                                    <label class="form-label">Preço</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">R$</span>
                                        <input type="number" name="price" value="10" required class="form-control" aria-label="Amount (to the nearest BRL)">
                                        <span class="input-group-text">.00</span>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Quantidade Disponiveis</label>
                                        <input type="number" required name="available_quantity" value="1" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="mb-3"><label for="exampleInputEmail1" class="form-label">Categoria</label>
                                        <input type="text" class="form-control" value="MLB260864" name="category_id">
                                        <label class="form-label">Consulte todas categorias em: <a href="https://api.mercadolibre.com/sites/MLB/categories" target="_blank">https://api.mercadolibre.com/sites/MLB/categories</a></label>
                                    </div>
                                    <div class="mb-3"><label for="exampleInputEmail1" class="form-label">Descrição</label>
                                        <textarea class="form-control" name="description">Descrição do anúncio - Teste</textarea>
                                    </div>
                                    <div class="mb-3"><label for="exampleInputPassword1" class="form-label">Imagem</label>
                                        <input type="text" required name="pictures[]" value="https://cdn.shoppub.io/cdn-cgi/image/w=1000,h=1000,q=80,f=auto/oficinadosbits/media/uploads/produtos/foto/idmozetz/file.png" class="form-control">
                                    </div>
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
