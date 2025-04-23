<x-layout>


    <div class="auth-container">
        <h1>Pievienot atzīmi</h1>
        <form method="POST" action="/grades">
            @csrf
        
            <select name="student_id" required>
                <option value="">Izvēlieties studentu</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->first_name . ' ' . $student->last_name }}</option>
                @endforeach
            </select><br>
        
            <select name="subject_id" required>
                <option value="">Izvēlieties priekšmetu</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select><br>
        
            <input type="number" name="grade" min="1" max="10" placeholder="Atzīme" required><br>
        
            <button>Pievienot atzīmi</button>
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