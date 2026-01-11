@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge([
        'class' => 'border-2 border-gray-400 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
    ]) }}>
</input>