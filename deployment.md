# Local deployment guide

This project runs a local WordPress development environment from `docker-compose.local.yml`.

## Step 1 — Install required tools

Make sure the following are installed on your machine:

- [Docker Desktop](https://docs.docker.com/desktop/) 
- [Git](https://git-scm.com/install/windows)

Start Docker Desktop before continuing.

## Step 2 — Clone the repository

First make a folder which will contain the Docker container e.g. **project-2026-jcua-team6**

Open up a terminal or use the inbuilt one on Docker Desktop and run:

```sh
cd <filepath-to-your-folder>
git clone https://github.com/cp3402-students/project-2026-jcua-team6.git
```

## Step 3 — Configure environment variables

Create a ```.env.local``` file in the root directory, it will contain:

```sh
# =========================
# DATABASE (DOCKER)
# =========================
DB_NAME=wordpress
DB_USER=wpuser
DB_PASSWORD=wppassword
DB_ROOT_PASSWORD=rootpassword

# =========================
# WORDPRESS (LOCAL)
# =========================
WP_PORT=8000
LOCAL_URL=http://localhost:8000
```

You may change these varables to suit your needs, it is recommended to change the `WP_PORT` to another value if you encounter issues with port being already used.

## Step 4 - Configure `docker-compose.local.yml`

Create `docker-compose.local.yml` in root directory if not already there. 

```yml
version: '3.8'

services:

  db:
    image: mariadb:11
    restart: unless-stopped
    environment:
      MARIADB_DATABASE: ${DB_NAME}
      MARIADB_USER: ${DB_USER}
      MARIADB_PASSWORD: ${DB_PASSWORD}
      MARIADB_ROOT_PASSWORD: ${DB_ROOT_PASSWORD}
    volumes:
      - db_data:/var/lib/mysql

  wordpress:
    image: wordpress:php8.2-apache
    depends_on:
      - db
    restart: unless-stopped
    ports:
      - "${WP_PORT}:80"
    environment:
      WORDPRESS_DB_HOST: db:3306
      WORDPRESS_DB_USER: ${DB_USER}
      WORDPRESS_DB_PASSWORD: ${DB_PASSWORD}
      WORDPRESS_DB_NAME: ${DB_NAME}
    volumes:
      - ./wp-content:/var/www/html/wp-content

volumes:
  db_data:
```

## Step 5 — Start the local environment

First ensure that no instances of the container are running and remove existing volumes: 

```sh
docker compose --env-file .env.local -f docker-compose.local.yml down -v
```
 
Next, from the repository root, run:

```sh
docker compose --env-file .env.local -f docker-compose.local.yml up -d
```


This will start two services:

- `wordpress` using `wordpress:php8.2-apache`
- `db` using `mariadb:11`

## Step 6 — Verify the stack

Check the containers and make sure they are running:

```sh
docker compose -f docker-compose.local.yml ps
```

## Step 7 — Open the site

Open the site in your browser at:

```text
http://localhost:8000
```

If you chose a different `WP_PORT`, replace `8000` with that value.

## Step 8 — Log into WordPress

Open the WordPress admin panel at:

```text
http://localhost:8000/wp-admin
```

If this is a fresh install, complete the WordPress setup wizard and create an admin account.

## Step 9 — Activate the project theme

In WordPress admin, go to:

- `Appearance` → `Themes`

Activate the theme located in `wp-content/themes/kctennisblastteam6`.

# How changes are made and committed

1. **Make changes locally**: Edit files in your local repository, such as theme files in `wp-content/themes/kctennisblastteam6/`. 

> ***Note:*** Changes such as posts, pages, content should be made on the live staging site and not in local development as these changes will not be pushed to the staging site via `StagingDeployment.yml` 

2. **Test changes**: Run the local environment and verify functionality (see "How changes are tested" below).

3. **Stage changes**: Use Git to stage your modifications:

   ```sh
   git add .
   ```

4. **Commit changes**: Create a commit with a descriptive message:

   ```sh
   git commit -m "Describe your changes here"
   ```

5. **Push to remote**: Push your commits to the GitHub repository:

   ```sh
   git push origin <branch-name>
   ```

   For feature branches, create a pull request (PR) on GitHub for review before merging to `staging`.

## How changes are tested

1. **Local testing**: After making changes, restart or rebuild the local Docker environment if needed:

   ```sh
   docker compose -f docker-compose.local.yml down
   docker compose -f docker-compose.local.yml up -d
   ```

2. **Theme-specific testing**: For theme changes, navigate to the theme directory and run build/lint commands:

   ```sh
   cd wp-content/themes/kctennisblastteam6
   npm run compile:css
   npm run lint:scss
   composer lint:php
   ```

3. **Functional testing**: Access the site at `http://localhost:8000` and test features manually. Check WordPress admin for theme activation and content display.

4. **CI testing**: Push changes to trigger the staging workflow in `.github/workflows/StagingDeployment.yml`, which deploys to staging for further testing.

# Deployment to staging

Staging deployment is automated via GitHub Actions:

1. **Trigger deployment**: Push commits or merge a PR to the `staging` branch.

2. **Workflow details**: The `.github/workflows/StagingDeployment.yml` workflow:
   - Uses SSH to connect to the staging server (Lightsail instance).
   - Syncs the theme directory (`wp-content/themes/kctennisblastteam6/`) to the remote path.
   - Verifies deployment by checking for `style.css`.

3. **Required secrets**: Ensure these are set in the GitHub repository's "Staging" environment:
   - `LIGHTSAIL_HOST`
   - `LIGHTSAIL_USER`
   - `LIGHTSAIL_PORT` (optional, defaults to 22)
   - `LIGHTSAIL_SSH_KEY`
   - `STAGING_THEME_PATH` (optional override for theme directory)

> For this project these values are already preconfigured as such simple pull request / commit will trigger workflow automatically.

4. **Access staging**: Once deployed, access the staging site via the configured [URL](http://3.107.50.163/wp-admin).

## Deployment to production

Production deployment involves creating a pull request from the `staging` branch to the `main` branch, which triggers automated deployment of the theme to the production site.

1. **Create PR**: After thorough testing on staging, create a pull request from `staging` to `main` for final review.
2. **Merge PR**: Upon merging the PR, the GitHub Actions workflow (similar to staging) deploys the theme directory (`wp-content/themes/kctennisblastteam6/`) to the production server.
3. **Manual migration**: Database, content, plugins, and other site data are migrated manually or using plugins/tools like WP Migrate DB. This ensures data integrity and allows for selective updates.

> **Note**: Ensure production secrets (e.g., `PROD_HOST`, `PROD_USER`, etc.) are configured in the GitHub repository's "Production" environment. The workflow for `main` branch should mirror the staging deployment but target the production server.

# Integration of project management and communication tools

- **GitHub**: Use Github pull requests for code reviews and merges.
    - **Pull Requests**: All changes should go through PRs for review. Use labels and assignees for organization.
- **Communication**: Use Discord (etc.) for team communication. Reference issues in commits/PRs with `#issue-number`.
- **Notifications**: Enable GitHub notifications / Trello for PR reviews and issue updates to stay informed.

