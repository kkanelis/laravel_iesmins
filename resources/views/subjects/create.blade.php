<x-layout>

    <div class="auth-container">
        <h1>Pievienot mācību priekšmetu</h1>
        <form method="POST" action="/subjects">
            @csrf

            <input type="text" name="name" required><br>

            <button type="submit">Pievienot mācību priekšmetu</button> 
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