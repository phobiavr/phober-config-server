## Config-server

The `config-server` service within the <b>Phober</b> project serves as a repository dedicated to storing configuration data crucial for the application's operation.

### Dependencies:
- Relies on the `adminpanel` service for updating and managing configuration data.

### Responsibilities:
- Stores essential configuration data required for various aspects of the application.
- Centralizes configuration management to ensure consistency and accessibility across services.
- Provides an endpoint (`{app}/config-client/update`) and CLI command (`config-client:update`) for updating configuration settings.

### Features:
- **CLI Command (`config-client:update`)**:
    - Executes configuration updates across services.
    - Supports variables such as `--dry-run` (simulate update process) and `--overwrite` (overwrite existing configurations).

- **HTTP Route (`{app}/config-client/update`)**:
    - Allows configuration updates via HTTP requests.
    - Supports query parameters such as `dry-run` (simulate update process if set to `'true'` default: `'false'`) and `overwrite` (overwrite existing configurations if set to `'true'` default: `'false'`).

### Additional Details:
- Utilizes the `laravel-config-server-client` package (available at [GitHub](https://github.com/Abdukhaligov/laravel-config-server-client) and [Packagist](https://packagist.org/packages/abdukhaligov/laravel-config-server-client)) for configuration management commands.
- Configuration values are retrieved from `.env` files, Docker environment variables, or the `phober_config` database managed by the `adminpanel`.
