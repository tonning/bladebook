module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './src/Views/Components/**/*.php',
        './src/Http/Livewire/**/*.php',
        './src/Http/Slots/**/*.php',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
}
