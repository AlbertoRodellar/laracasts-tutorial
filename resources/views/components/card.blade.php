{{-- En este caso el componente card ya tiene estilo definido, pero le pasamos una clase adicional para limitar su ancho.
Con $attributes->merge() podemos combinar las clases del componente con las que le pasamos al usarlo, el max-w-400 que le pasamos en contact.blade.php
--}}
<div {{ $attributes->merge(['class' => 'card']) }}>
    {{ $slot }}
</div>