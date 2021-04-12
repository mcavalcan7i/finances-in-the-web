<form action="{{ route('index.create') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Digite seu nome" class="form-control">
    {{ $errors->has('name') ? $errors->first() : '' }}
    <input type="text" name="usuario" placeholder="Digite um usuário" class="form-control">
    {{ $errors->has('usuario') ? $errors->first() : '' }}
    <input type="email" name="email" placeholder="Digite seu email" class="form-control">
    {{ $errors->has('email') ? $errors->first() : '' }}
    <input type="password" name="password" placeholder="Digite sua senha" class="form-control">
    {{ $errors->has('password') ? $errors->first() : '' }}
    <input type="number" name="capital_total" placeholder="Digite sua renda" class="form-control">
    {{ $errors->has('capital_total') ? $errors->first() : '' }}
    <button class="btn btn-light"> Cadastrar </button>
</form>