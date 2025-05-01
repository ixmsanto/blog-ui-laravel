# Laravel Blog Application

This is a simple Laravel blog application with a responsive design, featuring blog posts and a comment section with AJAX functionality. Posts include titles, content, and images sourced from Picsum Photos. The application uses MySQL for data storage, Tailwind CSS for styling, and includes a dark mode toggle for enhanced user experience.

## Features
- **Responsive Design**: Built with Tailwind CSS for mobile-friendly layouts.
- **Blog Posts**: Display posts with titles, content, and images from `https://picsum.photos/200/300?random={id}`.
- **Comment Section**: Add and view comments on posts without page reload using AJAX.
- **Dark Mode**: Toggle between light and dark themes, with preferences saved in local storage.
- **Database**: MySQL backend with seeded data for posts and comments.
- **Eloquent ORM**: Leverages Laravel's Eloquent for managing posts and comments with relationships.

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js (for Tailwind CSS, optional if using CDN)
- Laravel CLI (optional)

## Installation

1. **Clone the Repository**
   ```bash
   git clone https://github.com/ixmsanto/blog-ui-laravel.git
   cd blog-ui-laravel
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Configure Environment**
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your MySQL database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=blog_db
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders**
   - Create the database (`blog_db`) in MySQL.
   - Run migrations to create tables:
     ```bash
     php artisan migrate
     ```
   - Seed the database with sample posts and comments:
     ```bash
     php artisan db:seed
     ```

6. **Serve the Application**
   ```bash
   php artisan serve
   ```
   - Access the application at `http://localhost:8000/posts`.

## Project Structure
- `app/Models/`: Contains `Post` and `Comment` models with Eloquent relationships.
- `database/migrations/`: Defines `posts` and `comments` table schemas.
- `database/factories/`: Factories for generating fake posts and comments.
- `database/seeders/`: Seeders to populate the database with sample data.
- `app/Http/Controllers/`: Controllers for handling post display and comment submission.
- `resources/views/posts/`: Blade template for rendering the blog page.
- `routes/web.php`: Defines routes for posts and comments.

## Usage
- **View Posts**: Navigate to `/posts` to see all blog posts with their titles, images, and content excerpts.
- **Add Comments**: Use the comment form below each post to submit a comment. Comments are added via AJAX and appear instantly.
- **Dark Mode**: Click the toggle button in the header to switch between light and dark themes.

## Database Details
- **Posts Table**:
  - `id`: Primary key.
  - `title`: Post title.
  - `content`: Post content.
  - `image`: Image URL (e.g., `https://picsum.photos/200/300?random=1`).
  - `created_at`, `updated_at`: Timestamps.
- **Comments Table**:
  - `id`: Primary key.
  - `post_id`: Foreign key referencing `posts(id)`.
  - `content`: Comment text.
  - `created_at`, `updated_at`: Timestamps.

## Notes
- The application uses a CDN for Tailwind CSS. For production, consider compiling Tailwind locally using Node.js.
- Comments are not tied to authenticated users in this version. To add user authentication, integrate Laravel’s authentication system.
- Ensure your server has internet access to load Picsum Photos images.

## Contributing
1. Fork the repository.
2. Create a feature branch (`git checkout -b feature/YourFeature`).
3. Commit your changes (`git commit -m 'Add YourFeature'`).
4. Push to the branch (`git push origin feature/YourFeature`).
5. Open a pull request.

## License
This project is licensed under the MIT License.

## Contact
For questions or feedback, open an issue on GitHub or contact [contact@ixmsanto.me](mailto:contact@ixmsanto.me).
