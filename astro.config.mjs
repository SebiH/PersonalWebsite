import { defineConfig } from 'astro/config';

export default defineConfig({
  site: 'https://sebi.sh',
  outDir: './_site',
  compressHTML: true,
  build: {
    inlineStylesheets: 'always',
  },
  vite: {
    build: {
      // Sass already emits compressed CSS; skip the second minifier, which
      // would rewrite media queries and expand system-ui.
      cssMinify: false,
    },
    css: {
      preprocessorOptions: {
        scss: {
          style: 'compressed',
          // The stylesheets still use @import (variables are shared without namespaces).
          silenceDeprecations: ['import'],
        },
      },
    },
  },
});
