import { defineCollection } from 'astro:content';
import { glob } from 'astro/loaders';
import { z } from 'astro/zod';

const link = z.strictObject({ name: z.string(), url: z.string() });
const award = z.union([z.boolean(), z.string()]).optional();

const publications = defineCollection({
  loader: glob({ pattern: '*.json', base: 'src/data/publications' }),
  schema: z.strictObject({
    title: z.string(),
    authors: z.array(z.strictObject({ first: z.string(), last: z.string(), equal: z.boolean().optional() })),
    year: z.number(),
    sort: z.number(),
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
    authors: z.array(z.strictObject({ first: z.string(), last: z.string(), equal: z.boolean().optional() })),
    year: z.number(),
    sort: z.number(),
    conference: z.string().optional(),
    location: z.string().optional(),
    doi: z.string().optional(),
    links: z.array(link).optional(),
  }),
});

export const collections = { publications, workshops };
