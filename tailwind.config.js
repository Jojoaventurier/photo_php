module.exports = {
  content: [
    "./templates/**/*.php",   //  ← toutes tes vues
    "./*.php",                //  ← index.php ou front‑controller à la racine
    "./src/**/*.php",         //  ← éventuels composants PHP
    "./public/**/*.js"        //  ← tes scripts
  ],
  theme: {
    extend: {                 //  ← utilise extend pour ne PAS écraser la palette
      colors: {
        red: { 600: "#dc2626" }
      }
    }
  },
  plugins: []
}