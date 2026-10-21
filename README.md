# Archives Wales WordPress Theme

Living manual and todo list for the Archives Wales / Archifau Cymru (ARCW) theme. Keep it in step with the code: when you add a template, post type or field group, add it here.

## 1. Introduction

A classic (PHP template) WordPress theme for Archives Wales. The site is bilingual (English / Welsh) via Polylang, lists member archive services on a map, and publishes news posts and collaborative projects.

- Text domain: `acaw` (translations in [languages/](languages/))
- Custom fields: Advanced Custom Fields (ACF), field groups synced to [src/acf-json/](src/acf-json/)
- Required plugins: ACF (Pro, for repeaters/options page), Polylang

### Development

Node version is set in [.nvmrc](.nvmrc) (25.1.0).

```sh
npm install
npm run dev     # watch: Sass -> style.css, esbuild -> build/main.js
npm run build   # compressed/minified production build
```

- Styles: [src/css/index.scss](src/css/index.scss) compiles to the theme's root `style.css` (also loaded as the editor stylesheet).
- Scripts: [src/js/index.js](src/js/index.js) bundles to `build/main.js`. React comes from WordPress (`wp-element`), so JSX uses `wp.element.createElement`.
- PHP: every file in [inc/](inc/) is auto-required by [functions.php](functions.php). Coding standards via `composer install` (PHPCS + WPCS).

### Deployment

Pushing to `main` deploys to staging over SSH ([.github/workflows/staging.yml](.github/workflows/staging.yml)). The workflow does **not** run the build, so run `npm run build` and commit `style.css` and `build/main.js` before pushing.

### CSS structure

ITCSS-style layers in [src/css/](src/css/):

1. `1-thirdparty` – Leaflet, WordPress block styles
2. `2-global` – variables, accessibility helpers
3. `3-base` – body, forms, media, blocks, typography
4. `4-modules` – components (siteHeader, siteNav, map, members, projects, posts, pageTeaser, resources, etc.)
5. `5-templates` – layout and per-template styles

## 2. Types & Taxes

Post types are registered in [inc/acaw-types.php](inc/acaw-types.php). No custom taxonomies.

### Page (type)

General page content. Excerpt support enabled.

- ACF: **Downloads** (`downloads`), **Video** (`video`)
- Front page only, ACF **Home Page**: `guides_page`

### Post (type)

News / blog posts.

- ACF **Post Fields**: `byline`, `related_projects`, `related_orgs`
- ACF **Downloads**: `downloads`

### Organisation (`organisation`)

Archive services. Members appear on the members archive and map.

- Public, has archive, excluded from search
- Main query on the archive is filtered to `member = true`, ordered by name, unpaginated ([inc/acaw-members.php](inc/acaw-members.php))
- "Member" checkbox available in the admin list Quick Edit
- ACF **Org Fields**: `logo`, `website_url`, `member`, `member_fields` (includes the `map` field used for markers)

### Project (`project`)

Collaborative ARCW projects.

- Public, has archive, rewrite slug `projects`
- Archive main query shows current projects only (no `end_date`), newest `start_date` first ([inc/acaw-projects.php](inc/acaw-projects.php))
- ACF **Project Fields**: `start_date`, `end_date`, `partners`, `funders`, `get_involved`
- ACF **Downloads**: `downloads`

### Archive Item (`archiveitem`)

Individual collection items linked to an organisation. Not publicly queryable; shown only as related items on organisation pages.

- ACF **Item Fields**: `related_repository`, `catalogue_url`, `historical_year`, `otd_content`, `otd_date` ("on this day")

### Theme Settings (ACF options page)

Site-wide settings, defined in `ui_options_page_*.json`.

## 3. Site Map

- Home (front-page.php)
  - Section parent pages (page-parent.php)
    - Pages (page.php)
  - News (home.php)
    - Post (single.php)
  - Members (archive-organisation.php)
    - Organisation (single-organisation.php)
  - Projects (archive-project.php)
    - Project (single-project.php)
  - Search (search.php)
  - 404 (404.php)

Menus: `primary` (header), `secondary` (footer), `tertiary` (policies).

## 4. Templates

### header.php / footer.php

- header: header-scripts, cookies-notice, logo, header-nav, header-switcher (Polylang language switcher)
- footer: logo, footer-nav, footer-nav-2, footer-socials, wg-logo (Welsh Government)

### front-page.php

Front page of the site.

- searchbar
- front-page-guides (pages chosen via `guides_page`)
- map-teaser
- related-posts

### page.php

Standard page.

- title, content
- featured-image
- video (ACF `video`)
- resources (downloads)
- page-sidebar

### page-parent.php — "Section Parent Page"

Landing page for a section.

- title, content
- page-children (teasers for child pages)

### home.php

News listing.

- searchbar
- post-teaser
- pagination

### single.php

News post.

- title, byline (ACF), content
- resources (downloads)
- post-project-funders
- post-sidebar

### archive-organisation.php

Members listing.

- map (all member markers)
- member-teaser

### single-organisation.php

Organisation profile.

- organisation-logo, featured-image
- member-meta, member-sidebar
- related-items (Archive Items)
- related-posts

### archive-project.php

Projects listing.

- current projects (main query, no `end_date`)
- finished projects (secondary `WP_Query`, by `end_date`)
- project-teaser

### single-project.php

Project page.

- featured-image, project-dates
- resources (downloads)
- project-sidebar (partners, funders, get involved)
- related-posts

### search.php / 404.php / index.php

- search: searchbar + results
- 404: search-form
- index: fallback post-teaser loop

## 5. Additional requirements & functionality

- **Map** – Leaflet map ([src/js/map/](src/js/map/)). PHP prints `window.mapData` (`markers`, `options`); [inc/acaw-organisation-map.php](inc/acaw-organisation-map.php) builds markers with title and URL from the organisation `map` field.
- **Navigation** – mobile menu via `squishMenu`.
- **Bilingual** – Polylang; strings use the `acaw` text domain. Update `languages/messages.pot` and `cy.po`/`cy.mo` when strings change.
- **Image sizes** – `hero-large` (1920×1080), `hero` (1280×720), `hero-small` (800×450), `thumbnail-large` (800×800). `sizes="auto"` is stripped from image tags.
- **Helpers** – `inc/proper-*.php`: ACF tweaks, SVG uploads, file sizes, icons, image/video helpers, excerpts, dates, post navigation, mail.
- **ACF JSON** – ACF saves field groups to `src/acf-json/`. Before editing fields in the dashboard, sync/import the JSON first so changes aren't lost.

## Todo

- [ ] Unused helpers kept in `inc/`: `proper-icons.php` (points at a missing `assets/svg/sprite.symbol.svg`), `proper-fotorama.php`, `proper-get-env.php`, `proper-make-excerpt.php`, `proper-send-mail.php` (AJAX handler with no form using it).
- [ ] Regenerate `languages/messages.pot` and `cy.po`: they still list strings from removed template parts.
- [ ] Consider running `npm run build` in the staging workflow instead of committing build output.

Y diwedd. Bye. Au revoir.
