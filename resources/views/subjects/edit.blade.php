<x-layout>

    <div class="auth-container">
        <h1>Rediģēt mācību priekšmetu</h1>
        <form method="POST" action="/subjects/{{ $subject->id }}">
            @csrf
            @method('PUT')

            <input type="text" name="name" value="{{ $subject->name }}" required><br>

            <button type="submit">Saglabāt mācību priekšmetu</button> 
        </form>       

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        @endif

    </div>

</x-layout>