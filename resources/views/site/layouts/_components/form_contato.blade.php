{{ $slot }}

@isset($x)
    {{$x}}
@endisset

<div style="top:0px; left:0px; width:100%; background:red;">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome" class="{{$classe}}" name="nome" value="{{ old('nome') }}">
    <br>
    <input type="text" placeholder="Telefone" class="{{$classe}}" name="telefone" value="{{ old('telefone') }}">
    <br>
    <input type="text" placeholder="E-mail" class="{{$classe}}" name="email" value="{{ old('email') }}">
    <br>
    <select class="{{$classe}}" name="motivo_contato">

        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $key => $motivo)

            <option value="{{ $key }}" {{ old($motivo) == $key ? 'selected' : '' }}> {{ $motivo }} </option>

        @endforeach

    </select>
    <br>
    <textarea class="{{$classe}}" placeholder="" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

{{ print_r($motivo_contatos) }}
