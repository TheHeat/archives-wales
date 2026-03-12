import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    rollupOptions: {
      input: 'src/js/index.js',
      output: {
        dir: 'build',
        entryFileNames: 'main.js',
        format: 'esm',
      },
      external: ['react', 'react-dom'],
    },
    sourcemap: true,
    minify: true,
  },
  esbuild: {
    jsxFactory: 'wp.element.createElement',
    jsxFragment: 'wp.element.Fragment',
  },
});