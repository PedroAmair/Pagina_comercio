import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js',
                    'resources/js/sliderProducts.js', 
                    'resources/js/personalButtons.js',
                    'resources/js/flowbiteFuncionalities',
                    'resources/js/confirmationAlert.js',
                    'resources/js/publicationOptions.js',
                    'resources/js/imagesSelector.js',
                    'resources/js/confirmationDeleteAlert.js',
                    'resources/js/deleteDone.js'],
            refresh: true,
        }),
    ],
});
