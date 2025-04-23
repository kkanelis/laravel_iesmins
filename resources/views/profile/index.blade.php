<x-layout>

    <div class="auth-container">
        <h1>Profila informācija</h1>
        <form method="POST" action="/profile" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name="first_name" value="{{ $user->first_name }}" readonly><br>
            <input type="text" name="last_name" value="{{ $user->last_name }}" readonly><br>
            <input type="email" name="email" value="{{ $user->email }}" readonly><br>
            
            @if ($user->photo)
                <label for="photo">Esošā profila bilde:</label><br>
                <img src="{{ asset('public/' . $user->photo) }}" alt="Profila bilde" style="max-width: 150px; max-height: 150px;"><br>
            @endif

            <label for="photo">Jauna profila bilde:</label>
            <input type="file" name="photo" id="photo" accept="image/*"><br>

            <button type="submit">Saglabāt izmaiņas</button> 
        </form>       

        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

    </div>

</x-layout>