const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: ['./resources/views/inertia/*.blade.php', './resources/js/**/*.vue'],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },
}
