import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { createHtmlPlugin } from 'vite-plugin-html';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
      ],
      refresh: true,
    }),
    createHtmlPlugin({
      minify: true, // opsi untuk meminify HTML
    }),
  ],
  build: {
    outDir: 'dist', // Output directory
  },
});
