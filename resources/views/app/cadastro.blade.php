@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <?php use App\Http\Controllers\ContatoController as Contato ?>
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action="{{ route('cadastro.store') }}" method="post">

                    @csrf

                    <input type="text" name="name" placeholder="Digite seu Nome" class="borda-preta" value="{{ old('name') }}">
                    <div style="color: red;">
                        {{ $errors->has('name') ? $errors->first('name') : '' }}

                    </div>

                    <input type="text" name="email" placeholder="Digite seu E-mail" class="borda-preta">
                    <div style="color: red;">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>

                    <input type="password" name="password" placeholder="Digite sua Senha" class="borda-preta">
                    <div style="color: red;">
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>

                    <input type="password" name="confirmPassword" placeholder="Confirme sua Senha" class="borda-preta">
                    <div style="color: red;">
                        {{ $errors->has('confirmPassword') ? $errors->first('confirmPassword') : '' }}
                    </div>


                    <button type="submit" class="borda-preta"> Cadastrar </button>
                    {{-- FORMA QUE EU IMPLEMENTEI
                    @if(isset($erro) && $erro == 1)

                            <p style="color: red;">Usuário e/ou senha inválido(s)</p>

                    @endif--}}
                    {{-- Forma da aula --}}
                    <div style="color:red;">{{ isset($erro) && $erro != '' ? $erro : '' }}</div>
                    <div style="color:red;">{{ $msg ?? '' }}</div>

                </form>
            </div>

        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{asset('img/facebook.png')}}">
            <img src="{{asset('img/linkedin.png')}}">
            <img src="{{asset('img/youtube.png')}}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{asset('img/mapa.png')}}">
        </div>
    </div>

@endsection
