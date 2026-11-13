import fs from 'node:fs';
import path from 'node:path';
import type { APIRoute, GetStaticPaths } from 'astro';

// Publishes every file in papers/<folder>/ (except meta.json and dotfiles) at /papers/<folder>/<file>.
const dir = 'papers';

const types: Record<string, string> = {
  '.pdf': 'application/pdf',
  '.html': 'text/html; charset=utf-8',
  '.bib': 'text/plain; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.svg': 'image/svg+xml',
  '.js': 'text/javascript; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.json': 'application/json',
};

export const getStaticPaths = (() =>
  fs
    .readdirSync(dir, { withFileTypes: true })
    .filter((e) => e.isDirectory())
    .flatMap(({ name: folder }) =>
      fs
        .readdirSync(path.join(dir, folder), { recursive: true, withFileTypes: true })
        .filter((e) => e.isFile())
        .map((e) => path.relative(path.join(dir, folder), path.join(e.parentPath, e.name)))
        .filter((file) => file !== 'meta.json' && !file.split(path.sep).some((s) => s.startsWith('.')))
        .map((file) => ({ params: { folder, file: file.split(path.sep).join('/') } })),
    )) satisfies GetStaticPaths;

// Only used by the dev server; the build writes the files as-is.
export const GET: APIRoute = ({ params }) =>
  new Response(fs.readFileSync(path.join(dir, params.folder!, params.file!)), {
    headers: { 'Content-Type': types[path.extname(params.file!).toLowerCase()] ?? 'application/octet-stream' },
  });
