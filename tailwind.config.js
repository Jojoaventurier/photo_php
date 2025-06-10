// tailwind.config.js
module.exports = {
  content: [
      './src/templates/**/*.php',
      './src/Template/**/*.php', // Add uppercase Template folder
      './public/js/**/*.js',     // Fixed JS path
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}