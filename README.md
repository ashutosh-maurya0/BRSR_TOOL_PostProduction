**Project Directory Structure**

1. **Directory Info**
   - **database:** Contains the "crus.sql" file, which can be imported into any server (e.g., xampp or wampp) to set up the database.
   - **images:** Includes all the images and logos used in the project.
   - **sec_A:** Contains the frontend and backend code for Section A of the form.
   - **sec_B:** Contains the frontend and backend code for Section B of the form.
   - **sec_C:** Contains the frontend and backend code for Section C of the form.
   - **print:** Contains the php and js code for fetching the data from database and printing it using pdfMake js plugin.
   - **uploads:** All PDF files uploaded through any form will be stored in this directory.
   - **xbrl-generator:** Code for generating xbrl.

2. **File Info**
   - **connection.php:** This file is used to establish a connection with the database. If hosting locally (xampp or wampp), no changes are needed.
   - If hosting on a remote server, you can modify the connection parameters:
     ```php
     $host = 'host_name'; // replace host_name with actual host name
     $db   = 'crus'; // Don't change the database name if you are using the database/crus.sql
     $user = 'user_name'; // replace user_name with actual user name
     $pass = 'your_password(you can leave this empty also)';
     ```

   - **index.php:** The landing page that redirects users to sec_A.php.

**NOTE:**
- Each section (A, B, C) has its own directory for frontend and backend code, allowing you to make changes independently.
- When hosting locally (xampp or wampp server), avoid making changes to the `connection.php` and `index.php` files.
- If you are hosting the project on a remote server, you can modify the database connection parameters in `connection.php`. Make sure to use the correct hostname, database name, username, and password for your server.
