<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn hover:bg-blue-300 bg-blue-500 text-center  w-full py-2 rounded-md font-bold text-white']) }}>
    {{ $slot }}
</button>
