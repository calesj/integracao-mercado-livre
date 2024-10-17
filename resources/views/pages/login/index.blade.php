
<h1>Login</h1>
<pre>
    {{ $errors->first() }}
</pre>
<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <input type="text" name="email" id="email">
    <input type="password" name="password" id="password">
    <input type="submit" value="Enviar">
</form>
