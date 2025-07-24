
## Admin View – WordPress Plugin

This is a simple WordPress plugin I created to learn how custom admin pages work in plugin development

The plugin adds a new menu item in the WordPress admin sidebar called **Form Data** When clicked, it opens a page where you can see the data stored in a custom table in the WordPress database

### Features:

* Adds a new admin menu page.
* Displays stored values from a custom table
* Only admin users can access the page
* Data is shown in a simple HTML table format

### Why I made this:

* Creating custom admin pages using `add_menu_page`
* Fetching data using the `$wpdb` object
* Sanitizing and escaping output before displaying it
* Understanding how admin pages work in WordPress
* Using multiple helper functions

### How to use

1. Activate the plugin from the Plugins section
2. A new menu item will appear called **Form Data**
3. Open that page to view the stored data

### Errors i faced

1. Firstly using same form names and same name attributes in different plugins causes database errors
2. And also some confusion while using multiple helper functions