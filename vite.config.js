import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import FullReload from 'vite-plugin-full-reload';
import path from 'path';

export default defineConfig({
	root: '.',
	base: '/',
	plugins: [
		react(),
		FullReload([
			'./build/*.css',
			'./build/*.js',
			'/*.php',
			'./**/*.php',
			'./template-parts/**/*.php',
			'./inc/**/*.php',
		]),
	],
	build: {
		root: '.',
		outDir: 'build', // Output to project root
		emptyOutDir: false, // Don't delete everything in root!
		rollupOptions: {
			input: {
				main: path.resolve(__dirname, 'src/js/index.jsx'),
				styles: path.resolve(__dirname, 'src/css/index.css'),
			},
			output: {
				entryFileNames: 'scripts.js',
				assetFileNames: 'style.css',
			},
		},
	},
	server: {
		host: 'archives-wales.wp.local',
		// https: true, // Disabled for HTTP
		origin: 'http://archives-wales.wp.local',
		watch: {
			usePolling: true,
		},
		hmr: {
			host: 'archives-wales.wp.local',
			protocol: 'ws',
		},
	},
});
