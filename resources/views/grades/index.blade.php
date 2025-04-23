<x-layout>
    <div class="container">
        <h1>Atzīmju tabula</h1>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    @if(auth()->user()->type === 'teacher')
                        <th>Studenta vārds un uzvārds</th>
                    @endif
                    <th>Mācību priekšmets</th>
                    <th>Atzīme</th>
                    @if(auth()->user()->type === 'teacher')
                        <th>Darbības</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($grades as $grade)
                    <tr>
                        @if(auth()->user()->type === 'teacher')
                            <td class="student-name">{{ $grade->student->first_name . ' ' . $grade->student->last_name }}</td>
                        @endif
                        @if(auth()->user()->first_name === $grade->student->first_name && auth()->user()->last_name === $grade->student->last_name || auth()->user()->type === 'teacher')
                            <td class="subject-name">{{ $grade->subject->name ?? "nav"}}</td>
                            <td class="grade-value">{{ $grade->grade }}</td>
                        @endif
                        @if(auth()->user()->type === 'teacher')
                            <td class="actions">
                                <a href="/grades/{{ $grade->id }}/edit" class="action-btn edit-btn">Rediģēt</a>
                                <form method="POST" action="/grades/{{ $grade->id }}" class="delete-form">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="action-btn delete-btn">Dzēst</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>            
        </table>
    </div>
</x-layout>