# upl
Simple uploader &amp; mysql editor for personal page

Features:
- upload file (the main objective - images) to server folder and generate permanent link.
- create new, delete, update entries in mysql db

# Requirements

PHP5 & MySQL db.

# Install

Just copy all files in server subdirectory (e.g. /upl/) and edit settings in "include/config.php".

No templates avalable in this version. If you want redesign HTML and CSS code, just try it in this files:
- style.css
- include/_editor.php (mysql editor interface)
- include/_upload.php (file upload interface)
- include/_result.php (result interface)
- include/_edit_ext_form.php (edit ext row form)

# DB Structure
The script provides for the following columns in the table:
1. ID (int, auto increment)
2. link (text) - note name field
3. caption (text) - not used in this release, script add "via_form" text by default
4. content (longtext) - main entry content
5. notes (text, NULL by default)
