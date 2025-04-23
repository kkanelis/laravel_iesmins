<x-layout>

    <div class="auth-container">
        <h1>Rediģēt atzīmi</h1>
        <form method="POST" action="/grades/{{ $grade->id }}">
            @csrf
            @method('PUT')

            <select name="student_id" required>
                <option value="">Izvēlieties studentu</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $grade->student_id == $student->id ? 'selected' : '' }}>
                        {{ $student->first_name . ' ' . $student->last_name }}
                    </option>
                @endforeach
            </select><br>

            <select name="subject_id" required>
                <option value="">Izvēlieties priekšmetu</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $grade->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select><br>

            <input type="grade" name="grade" value="{{ $grade->grade }}" min="1" max="10" placeholder="Atzīme" required><br>
                
            <button type="submit">Saglabāt atzīmi</button> 
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