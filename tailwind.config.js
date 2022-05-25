module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './src/Views/Components/**/*.php',
        './src/Http/Livewire/**/*.php',
        './src/Http/Slots/**/*.php',
    ],
    darkMode: 'class',
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
    ],
}
