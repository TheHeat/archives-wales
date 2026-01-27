import { defineConfig } from 'vite';
import { resolve } from 'path';

// Get the main.js where all your JavaScript files are imported
const JS_FILE = resolve('src/js/index.jsx');

// Define where the compiled and minified JavaScript files will be saved
const BUILD_DIR = resolve(__dirname, 'dist');

export default defineConfig({
  build: {
    assetsDir: '', // Will save the compiled JavaScript files in the root of the dist folder
    manifest: true, // Generate manifest.json file (for caching)
    emptyOutDir: true, // Empty the dist folder before building
    outDir: BUILD_DIR,
    rollupOptions: {
      input: JS_FILE,
    },
  },
  server: {
    host: 'archives-wales.local',
    https: true,
    hmr: {
      host: 'archives-wales.local',
      protocol: 'ws',
      port: 5173, // default Vite port, change if needed
    },
  },
});