@props(['active' => false])

<a {{ $attributes->merge(['class' => 'bg-[#385327] py-2 px-4 font-medium hover:bg-[#4A6936] focus:outline-none cursor-pointer' . ($active ? ' bg-green-900' : '')]) }} onclick="showTab('{{ str_replace('Btn', '', $attributes['id']) }}')">
    {{ $slot }}
</a>