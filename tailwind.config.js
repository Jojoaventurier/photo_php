// tailwind.config.js
module.exports = {
  content: [
    './src/templates/*.php',   // Your PHP templates
    './public/js/*.js',        // JS files where you might use Tailwind classes
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}