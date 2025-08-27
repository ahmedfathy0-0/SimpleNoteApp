# PHP Notes Demo

A simple PHP notes application with CRUD functionality, user authorization, and a modern UI using Tailwind CSS.

## Features

- List all notes
- View a single note
- Create a new note
- Edit and update notes (with authorization)
- Delete notes (with authorization)
- Responsive navigation bar

## Project Structure

```
core/           # Core framework files (router, database, etc.)
controllers/    # Controllers for notes, dashboard, etc.
views/          # Views for notes, dashboard, partials, etc.
functions/      # Helper functions
public/         # Public entry point (index.php)
```

## Setup

1. **Clone the repository**  
   Place the files in your PHP server directory.

2. **Configure the database**  
   Edit `core/database.php` to set your database connection details.

3. **Import the SQL schema**  
   Create a `notes` table with columns:

   - `note_id` (primary key, int, auto-increment)
   - `user_id` (int)
   - `title` (varchar)
   - `content` (text)
   - `created_at` (timestamp, optional)

4. **Run the app**  
   Point your web server to the `public/index.php` file.

## Usage

- Access `/notes` to view all notes.
- Use `/note/create` to add a new note.
- Click "Edit" or "Delete" on a note to update or remove it.
- All note actions are authorized for user_id = 1 (replace with your own logic as needed).

## Customization

- Update user authentication logic in controllers and database methods.
- Style views using Tailwind CSS classes.

## License

MIT
