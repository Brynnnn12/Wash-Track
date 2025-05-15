{{-- filepath: d:\Latihan\leave-management\resources\views\components\dashboard\message.blade.php --}}
@php
    $alertType = session('success') ? 'success' : (session('error') ? 'error' : null);
    $alertMessage = session('success') ?? session('error');
@endphp

@if ($alertType && $alertMessage)
    <div x-data="{ open: true, type: '{{ $alertType }}', message: @js($alertMessage) }" x-init="setTimeout(() => open = false, 5000)" x-show="open"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="translate-y-4 opacity-0 scale-95"
        x-transition:enter-end="translate-y-0 opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300 transform"
        x-transition:leave-start="translate-y-0 opacity-100 scale-100"
        x-transition:leave-end="translate-y-4 opacity-0 scale-95" x-cloak
        class="fixed top-5 right-5 z-50 flex items-center gap-4 p-4 rounded-lg shadow-lg text-white"
        :class="{
            'bg-green-500': type === 'success',
            'bg-red-500': type === 'error'
        }">
        <i class="fas text-xl"
            :class="{
                'fa-check-circle': type === 'success',
                'fa-times-circle': type === 'error'
            }"></i>

        <span x-text="message" class="text-sm font-medium"></span>

        <button @click="open = false" class="text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
        </button>
    </div>
@endif
