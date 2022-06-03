{{ $slot }}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input type="text" placeholder="Nome" class="{{$classe}}" name="nome" value="{{ old('nome') }}">
    <br>
    <input type="text" placeholder="Telefone" class="{{$classe}}" name="telefone" value="{{ old('telefone') }}">
    <br>
    <input type="text" placeholder="E-mail" class="{{$classe}}" name="email" value="{{ old('email') }}">
    <br>
    <select class="{{$classe}}" name="motivo_contatos_id">

        <option value="">Qual o motivo do contato?</option>

        @foreach($motivo_contatos as $motivo_contato)

            <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}> {{ $motivo_contato->motivo_contato }} </option>

        @endforeach

    </select>
    <br>
    <textarea class="{{$classe}}" placeholder="" name="mensagem">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>