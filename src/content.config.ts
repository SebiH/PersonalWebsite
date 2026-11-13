import fs from 'node:fs';
import path from 'node:path';
import { defineCollection } from 'astro:content';
import { glob } from 'astro/loaders';
import { z } from 'astro/zod';
import { parse } from '@retorquere/bibtex-parser/js';

const link = z.strictObject({ name: z.string(), url: z.string() });
const author = z.strictObject({ first: z.string(), last: z.string() });
const award = z.union([z.boolean(), z.string()]).optional();

// Title, authors, year and DOI come from public/bib/<bibtex>.bib; fields in the JSON override them.
function fromBib(key: string) {
  const file = path.join('public', 'bib', `${key}.bib`);
  if (!fs.existsSync(file)) throw new Error(`Missing ${file} (referenced as "bibtex": "${key}")`);
  // 'richtext' mode gives plain text with Unicode accents and no sentence-casing.
  const { fields } = parse(fs.readFileSync(file, 'utf-8'), {
    fieldMode: { title: 'richtext' },
    caseProtection: false,
  }).entries[0];
  const nfc = (text?: string) => text?.normalize('NFC'); // the parser emits decomposed accents
  return {
    title: nfc(fields.title),
    authors: fields.author?.map((a) => ({ first: nfc(a.firstName), last: nfc(a.lastName) })),
    year: Number(fields.year),
    doi: fields.doi,
  };
}

const dir = 'src/data/publications';
const publications = defineCollection({
  loader: {
    name: 'publications',
    load: async ({ store, parseData }) => {
      store.clear();
      for (const file of fs.readdirSync(dir).filter((f) => f.endsWith('.json'))) {
        const json = JSON.parse(fs.readFileSync(path.join(dir, file), 'utf-8'));
        const id = file.replace(/\.json$/, '');
        const data = await parseData({ id, data: { ...(json.bibtex && fromBib(json.bibtex)), ...json } });
        store.set({ id, data });
      }
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
