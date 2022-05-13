{{ $slot }}

@isset($x)
    {{$x}}
@endisset

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome" class="{{$classe}}" name="nome">
    <br>
    <input type="text" placeholder="Telefone" class="{{$classe}}" name="telefone">
    <br>
    <input type="text" placeholder="E-mail" class="{{$classe}}" name="email">
    <br>
    <select class="{{$classe}}" name="motivo">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="{{$classe}}" placeholder="Preencha aqui a sua mensagem" name="mensagem"></textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>