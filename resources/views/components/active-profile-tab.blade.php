@props(['active' => false])

<a class="{{ $active ? 'tab-link active' : 'tab-link' }}"
    {{ $attributes }}
    aria-current="{{ $active ? 'page': 'false' }}"

>
    {{ $slot }}
</a>
