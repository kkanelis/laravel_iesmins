<x-layout>
  

    <div class="auth-container">
        <h1>Pieslēgties</h1>
        <form method="POST" action="/login">
            @csrf
            <input placeholder="E-Pasts" name="email" type="email" required><br>
            <input placeholder="Parole" name="password" type="password" required><br>
            <button>Pieslēgties</button>
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
