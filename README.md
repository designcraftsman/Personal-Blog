# Personal Blog

This is a dynamic personal blog website designed for sharing posts, engaging with readers, and showcasing trending content. The project features responsive design, category-based filtering, and interactive elements.

## Features

- **Home Page**: Displays trending posts and recent articles.
- **Blog Page**: Lists posts by category with pagination.
- **Post Page**: Shows detailed content of a single post with comments.
- **About Page**: Provides information about the blog and its creator.
- **Contact Page**: Allows users to send messages via a contact form.
- **Newsletter Subscription**: Users can subscribe to receive updates.
- **Responsive Design**: Optimized for various screen sizes.

## Technologies Used

- **PHP**: Backend logic and database interaction.
- **MySQL**: Database for storing posts, comments, and user data.
- **SCSS**: Styling with variables and nested rules.
- **JavaScript**: Frontend interactivity.
- **Font Awesome**: Icons for UI elements.

## Project Structure

```
Personal-Blog/
├── about.php
├── addPost.php
├── aside.php
├── blog.php
├── blog.sql
├── connection.php
├── contact.php
├── footer.php
├── head.php
├── index.php
├── navbar.php
├── package.json
├── post.php
├── README.md
├── css/
│   ├── style.css
│   ├── style.css.map
├── js/
│   └── script.js
├── sass/
│   ├── main.scss
│   ├── layout/
│   ├── mobile/
│   ├── pages/
│   ├── themes/
│   └── vendors/
├── uploads/
│   ├── Black And White Aesthetic Minimalist Modern Simple Typography Coconut Cosmetics Logo.png
│   ├── pexels-alex-andrews-2295744.jpg
│   ├── pexels-andrea-piacquadio-863926.jpg
│   ├── pexels-anna-shvets-4167544.jpg
│   ├── pexels-beladiya-nikunj-18636914.jpg
│   └── ...
```

## How to Run

1. Clone the repository:
   ```bash
   git clone <repository-url>
   ```
2. Set up a MySQL database using the `blog.sql` file.
3. Update database credentials in `connection.php`.
4. Compile SCSS to CSS using the script defined in `package.json`:
   ```bash
   npm run sass
   ```
5. Start a local server (e.g., XAMPP or WAMP) and place the project in the server's root directory.
6. Open `index.php` in your browser.



## External Libraries

- [Font Awesome](https://fontawesome.com/)
- [Google Fonts](https://fonts.google.com/)

