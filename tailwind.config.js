/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./static-site/*.html",
    "./static-site/js/**/*.js",
    "./wp-theme/coach-loan-vu/**/*.php",
    "./wp-theme/coach-loan-vu/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          bg: {
            primary: '#FBF8F0',     // Pearl Ivory
            secondary: '#EAF2EC',   // Soft Emerald Mist (Brand)
            secondaryWeb: '#ECF5F0',// Soft Emerald Mist (Web)
          },
          emerald: {
            DEFAULT: '#005B45',     // Royal Emerald (Brand)
            light: '#0B8A66',       // Fresh Emerald (Web)
            dark: '#012E24',        // Emerald Noir (Brand)
            depth: '#014F3D',       // Emerald Depth (Web)
          },
          gold: {
            DEFAULT: '#C8A244',     // Royal Gold
            light: '#F1D89A',       // Champagne Glow (Hover/Accent)
            sand: '#DED3B8',        // Pale Gold Sand (Border/Divider)
          },
          text: {
            primary: '#071A15',     // Deep Forest Ink (Brand)
            primaryWeb: '#0B1F19',  // Deep Forest Ink (Web)
          }
        }
      },
      fontFamily: {
        heading: ['"Cormorant Garamond"', 'serif'],
        body: ['"Be Vietnam Pro"', 'sans-serif'],
      },
      fontSize: {
        'brand-h1': ['64px', { lineHeight: '1.2' }],
        'brand-h2': ['40px', { lineHeight: '1.3' }],
        'brand-h3': ['28px', { lineHeight: '1.4' }],
        'brand-sub': ['18px', { lineHeight: '1.5' }],
        'brand-body': ['16px', { lineHeight: '1.6' }],
        'brand-caption': ['12px', { lineHeight: '1.4' }],
      }
    },
  },
  plugins: [],
}
