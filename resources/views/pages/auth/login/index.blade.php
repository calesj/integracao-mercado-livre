@extends('pages.auth.layout.master')

@section('content')
<div class="login-box">
    @if($errors->count() > 0)
        <div class="alert alert-danger" role="alert">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card card-outline card-primary">
        <div class="card-header"> <a href="../index2.html" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                <h1 class="mb-0"> <b>Mercado Livre</b> Integração
                </h1>
            </a> </div>
        <div class="card-body login-card-body">
            <p class="login-box-msg">Entre para começar sua sessão</p>
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="loginEmail" type="email" name="email" class="form-control" value="admin@admin.com" placeholder="">
                        <label for="loginEmail">Email</label>
                    </div>
                    <div class="input-group-text">
                        <span class="bi bi-envelope"></span>
                    </div>
                </div>
                <div class="input-group mb-1">
                    <div class="form-floating">
                        <input id="loginPassword" type="password" class="form-control" placeholder="" name="password" value="123456">
                        <label for="loginPassword">Senha</label>
                    </div>
                    <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                </div> <!--begin::Row-->
                <div class="row">
                    <div class="col-8 d-inline-flex align-items-center">
                        <div class="form-check">
                            <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Manter Conectado
                            </label>
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-4">
                        <div class="d-grid gap-2"> <button type="submit" class="btn btn-primary">Entrar</button> </div>
                    </div>
                </div>
            </form>
            <br>
            <p class="mb-0"> <a href="{{ route('register') }}" class="text-center">Criar conta</a>
            </p>
        </div>
    </div>
</div>
@endsection
