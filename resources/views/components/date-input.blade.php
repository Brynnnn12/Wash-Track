@props(['disabled' => false])

<input type="date" @disabled($disabled)
    {{ $attributes->merge([
        'class' =>
            'w-full bg-white text-black border border-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-300 rounded-md shadow-sm p-2',
    ]) }}>
