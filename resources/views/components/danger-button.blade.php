<button {{ $attributes->merge(['type' => 'submit', 'class' => ' text-white hover:text-black rounded-full text-[10px]']) }}>
    {{ $slot }}
</button>
