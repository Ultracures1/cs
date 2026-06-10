
module.exports = {
  content: ["./app/**/*.{js,ts,jsx,tsx}","./components/**/*.{js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        // Semantic tokens (ui-ux-pro-max design system: premium heritage + gold)
        primary: { DEFAULT: '#7A1F2B', dark: '#5E1721', foreground: '#FFFFFF' },
        accent: { DEFAULT: '#A16207', soft: '#C9A86A' },
        surface: { DEFAULT: '#FAFAF9', raised: '#FFFFFF' },
        ink: { DEFAULT: '#0C0A09', soft: '#57534E' },
        line: '#E7E5E4',
        // Back-compat brand aliases
        suta: { maroon: '#7A1F2B', gold: '#C9A86A' },
      },
      fontFamily: {
        display: ['Cormorant', 'Georgia', 'serif'],
        sans: ['Montserrat', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
