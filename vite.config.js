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
			'/*.php',
			'./**/*.php',
			'./template-parts/**/*.php',
			'./inc/**/*.php',
		]),
	],
	build: {
		outDir: '.', // Output to project root
		emptyOutDir: false, // Don't delete everything in root!
		rollupOptions: {
			input: {
				main: path.resolve(__dirname, 'assets/js/src/index.jsx'),
				styles: path.resolve(__dirname, 'assets/css/style.css'),
			},
			output: {
				entryFileNames: 'assets/js/[name].js',
				assetFileNames: 'assets/css/build/style.css', // style.css in root
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
