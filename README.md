Personal Website
================

Source for my personal website, built with [Astro](https://astro.build/) as a static site.

- `npm install` - install dependencies
- `npm run dev` - start the development server
- `npm run build` - build the site into `_site/`

Each publication lives in its own folder, `papers/<year>-<venue>-<name>/`:

- `meta.json` - sort order, venue, links and any fields overriding the BibTeX data
- one `.bib` file - title, authors, year and DOI are read from it
- any other files (PDFs, slides, assets) are published as-is at `/papers/<folder>/...`; link to them in `meta.json` with a folder-relative URL such as `"paper.pdf"`
