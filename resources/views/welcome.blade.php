{{-- Al welcome le hemos pasado dos variables $greeting y $person que viene de la url
Tambien se puede usar {{!!  !!}} para mostrar html sin escapar, pero hay que tener cuidado con esto para evitar ataques XSS
Ej: poner ?person=<script>alert('XSS')</script> en la url, si usamos {{!! $person !!}}
    se ejecutaría el script, pero con {{ $person }} se mostraría como texto sin ejecutar el script
--}}
<x-layout title="Welcome">
    <h1>Hello World!</h1>
    <p>{{ $greeting }}, {{ $person }}!</p>
</x-layout>