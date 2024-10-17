<h1>Dashboard</h1>

@if(!$user->ml_user_id)
    <form action="{{ route('oauth') }}" method="POST">
        @csrf
        <h2>Conectar No Mercado Livre</h2>
        <input type="submit" value="Conectar">
    </form>
@endif
