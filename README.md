# Laravel Blog Application

A simple blog application built with the Laravel framework. Users can view posts and create new ones.

## Features

*   View a list of all blog posts.
*   View a single blog post.
*   Create new blog posts.

## Technologies Used

*   [Laravel](https://laravel.com/) (v12)
*   PHP (v8.2+)
*   [Tailwind CSS](https://tailwindcss.com/) (v4)
*   [Vite](https://vitejs.dev/) (v6)
*   SQLite (default database)
*   Composer
*   NPM

## Prerequisites

Before you begin, ensure you have the following installed:

*   PHP >= 8.2
*   [Composer](https://getcomposer.org/)
*   [Node.js](https://nodejs.org/) (which includes NPM)

## Installation and Setup

1.  **Clone the repository:**
    ```bash
    git clone <your-repository-url>
    cd <repository-name>
    ```

2.  **Install Composer dependencies:**
    ```bash
    composer install
    ```

3.  **Create your environment file:**
    Copy the example environment file and update it with your specific configuration if needed.
    ```bash
    cp .env.example .env
    ```

4.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Create the database file:**
    This project is configured to use SQLite by default.
    ```bash
    touch database/database.sqlite
    ```

6.  **Run database migrations:**
    This will create the necessary tables, including the `posts` table.
    ```bash
    php artisan migrate
    ```

7.  **Install NPM dependencies:**
    ```bash
    npm install
    ```

8.  **Build frontend assets:**
    For development:
    ```bash
    npm run dev
    ```
    For production:
    ```bash
    npm run build
    ```

9.  **Serve the application:**
    ```bash
    php artisan serve
    ```
    The application will typically be available at `http://127.0.0.1:8000`.

## Usage

*   **View posts:** Navigate to the application's root URL (`/`) in your web browser.
*   **Create a post:**
    1.  Navigate to `/post/create`.
    2.  Fill in the title and body for your post.
    3.  Click "Submit" or "Create Post".

## Contributing

Contributions are welcome! If you'd like to contribute, please follow these general steps:

1.  Fork the repository.
2.  Create a new branch for your feature or bug fix (`git checkout -b feature/your-feature-name` or `git checkout -b bugfix/issue-description`).
3.  Make your changes.
4.  Commit your changes (`git commit -m 'Add some feature'`).
5.  Push to your branch (`git push origin feature/your-feature-name`).
6.  Open a Pull Request to the main repository.

Please ensure your code follows the project's coding standards (if any are defined).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT), inherited from the Laravel framework.
