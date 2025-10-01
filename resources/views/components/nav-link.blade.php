@php
  $current = 'bg-gray-900 text-white';
  $default = 'text-gray-300 hover:bg-white/5 hover:text-white';
@endphp

<a class="block rounded-md px-3 py-2 text-sm font-medium x {{ $active ? $current : $default }}" {{ $attributes }}>
  {{ $slot }}
</a>
