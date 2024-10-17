@extends('pages.auth.login.index')

@section('content')
    <div class="login-box">
        @if($errors->count() > 0)
            <div class="alert alert-danger" role="alert">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="card card-outline card-primary">
            <div class="card-header"><a href="../index2.html"
                                        class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                    <h1 class="mb-0"><b>Mercado Livre</b> Integração
                    </h1>
                </a></div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Cadastre-se para começar sua sessão</p>
                <form action="{{ route('register.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input type="text" name="name" class="form-control">
                            <label>Nome</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginEmail" type="email" name="email" class="form-control">
                            <label for="loginEmail">Email</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" type="password" class="form-control"
                                   name="password">
                            <label for="loginPassword">Senha</label>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="form-floating">
                            <input id="loginPassword" type="password" class="form-control"
                                   name="password_confirmation">
                            <label for="loginPassword">Confirmar Senha</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
                <br>
                <p class="mb-0"> <a href="{{ route('login') }}" class="text-center">Já tem uma conta? entrar</a>
                </p>
            </div>
        </div>
    </div>
@endsection
