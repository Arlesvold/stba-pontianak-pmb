# GitHub Copilot Project Instructions

These are **instructions for GitHub Copilot** when generating code in this repository.

## 1. Understand the existing code first

-   Before generating code, analyze:
    -   Routes in `routes/web.php`.
    -   Models in `app/Models/*` (Berita, Agenda, Setting, etc.).
    -   Controllers in `app/Http/Controllers/*`.
    -   Blade views in `resources/views/*`.
    -   Filament resources in `app/Filament/Resources/*`.
-   Follow the existing patterns:
    -   Use the same model names, table names, and column names.
    -   Use the same layouts: `layouts.pmb` for public PMB pages, `layouts.app` for Breeze/admin pages.
    -   Respect the current UI style (Bootstrap cards, maroon theme for STBA).

## 2. Follow the prompt and requirements exactly

When the user gives an instruction or prompt:

-   Treat it as a **strict requirement**, not a suggestion.
-   Do not create new routes, models, or tables unless explicitly asked.
-   Do not rename existing classes, methods, or variables.
-   Always align with:
    -   Current route names.
    -   Current database schema.
    -   Current file structure.

If information is missing (e.g. table structure), prefer **short, clearly marked TODOs** rather than guessing.

## 3. Use best effort and high quality output

For every completion:

-   Strive for clean, readable, and idiomatic Laravel and Filament code.
-   Avoid unnecessary complexity.
-   Prefer:
    -   Proper validation in controllers and Filament forms.
    -   Clear naming consistent with the project.
    -   Code that will compile and run with minimal adjustments.

If multiple solutions exist, choose the one that:

-   Fits best with the existing project style.
-   Is easiest to understand and maintain.

## 4. Keep consistency with this STBA project

-   Use the existing models:
    -   `App\Models\Berita` with table `beritas`.
    -   `App\Models\Agenda` with table `agendas`.
    -   `App\Models\Setting` with `key` and `value` (e.g. `marquee_text`).
-   For Filament:
    -   Place resources in `app/Filament/Resources`.
    -   Use `form()` and `table()` patterns already present.
-   For UI:
    -   Use Bootstrap components and the maroon color scheme already defined.
    -   Do not introduce Tailwind or other CSS frameworks on public PMB pages.

## 5. Respect existing files and avoid breaking changes

-   Do not remove or rewrite large parts of existing files unless the prompt explicitly asks to.
-   When modifying existing files:
    -   Keep the public behavior the same, unless a change is requested.
    -   Avoid breaking routes, views, or models that are already in use.
-   When in doubt, prefer:
    -   Adding small, clear changes.
    -   Leaving TODO comments where human decisions are needed.
