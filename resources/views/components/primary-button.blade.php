<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition-colors duration-300']) }}>
    {{ $slot }}
</button>
