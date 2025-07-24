## Simple Input Form – WordPress Plugin

This is a basic WordPress plugin I created as part of my learning journey. The plugin adds a form with one input field and saves the submitted value to a custom database table.

### What I Learned

* How to create a WordPress plugin with the required header and a security check.
* How and when to use WordPress hooks like `register_activation_hook`.
* How to create a new database table using `$wpdb` and `dbDelta()`.
* How to use shortcodes to display custom content in posts or pages.
* How to handle form submissions:

### Languages Used

* PHP (for plugin logic)
* HTML (for the form)
* CSS (optional styling)

### How to Use

1. Install and activate the plugin in WordPress.
2. Use the shortcode `[simple_input_form]` on any page or post.
3. It will show a form with a single input box.
4. When someone submits the form, the value is saved into the database.

### Features

* A simple input form
* Clean and easy to use
* Data is stored securely in the WordPress database
