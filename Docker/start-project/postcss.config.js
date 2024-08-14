export default {
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
};

module.exports = {
    puglins: [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ],
};