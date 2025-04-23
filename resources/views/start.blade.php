<x-layout>
    <div class="auth-container">
        <h1>Laipni lūdzam C-Klasē</h1>
        <p>Šī ir vieta, kur varat atrast visus nepieciešamos resursus un informāciju par C-Klasi.</p>
        <p>Ja jums ir jautājumi vai nepieciešama palīdzība, lūdzu, sazinieties ar mums.</p>
        @guest<a href="/login" class="btn">Pieslēgties</a>@endguest
        @auth<a href="/logout" class="btn">Atslēgties</a>@endauth
    </div>
</x-layout>
