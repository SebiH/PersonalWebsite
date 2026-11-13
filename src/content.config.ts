import fs from 'node:fs';
import path from 'node:path';
import { defineCollection } from 'astro:content';
import { glob } from 'astro/loaders';
import { z } from 'astro/zod';
import { parse } from '@retorquere/bibtex-parser/js';

const link = z.strictObject({ name: z.string(), url: z.string() });
const author = z.strictObject({ first: z.string(), last: z.string() });
const award = z.union([z.boolean(), z.string()]).optional();

// Title, authors, year and DOI come from the folder's .bib file; fields in meta.json override them.
function fromBib(file: string) {
  const bibtex = fs.readFileSync(file, 'utf-8').trim();
  // 'richtext' mode gives plain text with Unicode accents and no sentence-casing.
  const { fields } = parse(bibtex, {
    fieldMode: { title: 'richtext' },
    caseProtection: false,
  }).entries[0];
  const nfc = (text?: string) => text?.normalize('NFC'); // the parser emits decomposed accents
  return {
    title: nfc(fields.title),
    authors: fields.author?.map((a) => ({ first: nfc(a.firstName), last: nfc(a.lastName) })),
    year: Number(fields.year),
    doi: fields.doi,
    bibtex,
    bibFile: path.basename(file),
  };
}

// Each paper lives in papers/<folder>/ with a meta.json and (optionally) one .bib file.
// Other files are published at /papers/<folder>/ by src/pages/papers/[folder]/[...file].ts.
const dir = 'papers';
const publications = defineCollection({
  loader: {
    name: 'publications',
    load: async ({ store, parseData, watcher }) => {
      const loadAll = async () => {
        store.clear();
        for (const folder of fs.readdirSync(dir, { withFileTypes: true }).filter((e) => e.isDirectory())) {
          const id = folder.name;
          const base = path.join(dir, id);
          const json = JSON.parse(fs.readFileSync(path.join(base, 'meta.json'), 'utf-8'));
          const bibs = fs.readdirSync(base).filter((f) => f.endsWith('.bib'));
          if (bibs.length > 1) throw new Error(`papers/${id}: more than one .bib file`);
          const links = json.links?.map((l: { url: string }) => {
            if (/^[a-z]+:/i.test(l.url) || l.url.startsWith('/')) return l;
            if (!fs.existsSync(path.join(base, l.url))) throw new Error(`papers/${id}: link target "${l.url}" not found`);
            return { ...l, url: `/papers/${id}/${l.url}` };
          });
          const data = await parseData({
            id,
            data: { ...(bibs[0] && fromBib(path.join(base, bibs[0]))), ...json, ...(links && { links }) },
          });
          store.set({ id, data });
        }
      };
      await loadAll();

      // In dev, reload when a meta.json or .bib file changes.
      watcher?.add(dir);
      const reload = (file: string) => {
        if (/\.(json|bib)$/.test(file) && /(^|[\\/])papers[\\/]/.test(file)) {
          loadAll().catch(console.error);
        }
      };
      watcher?.on('add', reload).on('change', reload).on('unlink', reload);
    },
  },
  schema: z.strictObject({
    title: z.string(),
    authors: z.array(author),
    year: z.number(),
    sort: z.number(),
    equalContribution: z.number().optional(),
    conference: z.string().optional(),
    doi: z.string().optional(),
    bibtex: z.string().optional(),
    bibFile: z.string().optional(),
    highlighted: z.boolean().optional(),
    best_paper: award,
    honorable_mention: award,
    links: z.array(link).optional(),
  }),
});

const workshops = defineCollection({
  loader: glob({ pattern: '*.json', base: 'src/data/workshops' }),
  schema: z.strictObject({
    title: z.string(),
    authors: z.array(author),
    year: z.number(),
    sort: z.number(),
    conference: z.string().optional(),
    location: z.string().optional(),
    doi: z.string().optional(),
    links: z.array(link).optional(),
  }),
});

export const collections = { publications, workshops };
