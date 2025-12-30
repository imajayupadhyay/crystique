# Crystique

A modern e-commerce platform for authentic healing crystals, sacred jaap malas, and timeless antique spiritual items.

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: Vue.js 3 (Composition API)
- **Styling**: Tailwind CSS 4
- **SPA**: Inertia.js
- **Build Tool**: Vite

## Project Structure

```
resources/js/
├── components/           # Global components (Header, Footer)
├── Pages/               # Page components
│   ├── Home/
│   │   ├── index.vue   # Home page
│   │   └── components/ # Home-specific components
│   └── Contact/
│       ├── index.vue   # Contact page
│       └── components/ # Contact-specific components
└── app.js              # Main entry point
```

## Setup

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Build assets
npm run build
```

## Development

```bash
# Start development server (runs Laravel, Vite, Queue, and Logs)
composer dev

# Or run separately:
php artisan serve
npm run dev
```

## Features

- Modern, clean design with animated SVG backgrounds
- Glass morphism effects and smooth animations
- Fully responsive layout
- SPA navigation with Inertia.js
- Component-based architecture

## License

MIT
