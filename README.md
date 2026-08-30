# NSBM Event Hub

Home /
Login /
Sign Up

Event /
Profile /
Notification 

#### Admin Features

- Login
- Create, edit, and delete events
- Manage event categories
- View event registrations
- Manage announcements
- Generate participant lists

#### Student Features

- Register and login
- Browse upcoming events
- Search events by category
- Register for events
- View personal event schedule
- View event announcements



## How to Run the Project in MAMP or XAMPP

1. Place the project folder inside the web server root:
   - MAMP: `/Applications/MAMP/htdocs/`
   - XAMPP: `C:/xampp/htdocs/`

2. Copy the entire project folder named `GROUP-AA-NSBM` into that `htdocs` folder.

3. Start the Apache and MySQL servers from MAMP or XAMPP.

4. Import the database file `database/eventhub.sql` into phpMyAdmin.

5. Open the project in a browser using the folder name as the URL path.

### Main Pages

- Home page: `http://localhost/GROUP-AA-NSBM/index.php`
- Student login: `http://localhost/GROUP-AA-NSBM/student/login.php`
- Student register: `http://localhost/GROUP-AA-NSBM/student/register.php`
- Student dashboard: `http://localhost/GROUP-AA-NSBM/student/dashboard.php`
- Admin login: `http://localhost/GROUP-AA-NSBM/admin/login.php`
- Admin dashboard: `http://localhost/GROUP-AA-NSBM/admin/dashboard.php`
- Manage events: `http://localhost/GROUP-AA-NSBM/admin/manage-events.php`
- View registrations: `http://localhost/GROUP-AA-NSBM/admin/registrations.php`
