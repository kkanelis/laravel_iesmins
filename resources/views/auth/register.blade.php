<x-layout>
   

    <div class="auth-container">
        <h1>Pievienot Studentu</h1>
        <form action="/register" method="POST">
            @csrf
            <input placeholder="Vārds" name="first_name" required><br>
            <input placeholder="Uzvārds" name="last_name" required><br>
            <input placeholder="E-pasts" name="email" type="email" required><br>
            <input name="type" type="hidden" value="student">
            <input placeholder="Parole" name="password" type="password" required><br>
            <input placeholder="Parole Apstiprināšana" name="password_confirmation" type="password" required><br>
            <button type="submit">Pievienot</button>
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