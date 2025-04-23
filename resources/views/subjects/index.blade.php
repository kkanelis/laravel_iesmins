<x-layout>

    <div class="container">
        <h1>Mācību priekšmeti</h1>
        <table border="1" cellspacing="0">
            <thead>
                <tr>
                    <th>Nosaukums</th>
                    @if(auth()->user()->type === 'teacher')
                        <th>Darbības</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td class="subject-name">{{ $subject->name }}</td>
                        @if(auth()->user()->type === 'teacher')
                            <td class="actions">
                                <a href="/subjects/{{ $subject->id }}/edit" class="action-btn edit-btn">Rediģēt</a>
                                <form method="POST" action="/subjects/{{ $subject->id }}" class="delete-form">
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

        @if(auth()->user()->type === 'teacher')
            <a href="/subjects/create" class="action-btn add-btn">Pievienot mācību priekšmetu</a>
        @endif
    </div>

</x-layout>