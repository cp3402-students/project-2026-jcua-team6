# Site Maintenance Guide (WordPress)

## How to add and edit content
- Go to Dashboard -> Pages to edit main site content (Home, Coaches, Classes, etc.)
- Click a page -> Edit (Block Editor)
- Update text, images, videos using blocks
- Use reusable blocks/templates for consistent layouts (e.g. class sections, coach profiles)
- Click Update to publish changes

Adding videos:
- Use the YouTube embed block (paste link)

---

## Pages vs posts
Pages (static content):
- Home
- Social Tennis
- Venue Hire
- Classes (Hot Shots, Squad, Private, etc.)
- Used for permanent content

Posts (dynamic/news content):
- News
- Coaches
- Used for content which is updated more regularly

---

## Categories or content structure
Posts should use categories:
- News
- Coaches

Coaches page:
- Simple layout: image + short bio + expertise text

---

## Plugin-specific processes
### Booking System
Booking System (3rd party – DO NOT CHANGE SYSTEM):
- Only update links/buttons on site if needed
- All bookings (classes, hire, free trial) should link out to this system

### Migration
Migration is handled through Wordpress Importer and Exporter.

#### Exporting Site
- Run Wordpress site exporter `Tools -> Export` which will give you a .xml File. 
  - **Note** - Will not export Plugin Specific Settings or Plugins themselves, those will have to be downloaded and installed on host and target sites.

#### Importing Site
- Install and Run Wordpress Installer `Tools -> Import`, this will pull site content and structure. 

- During import:
   - Assign content to an existing or new user (permissions)
   - Enable **"Download and import file attachments"** (important for images)

5. Run the importer and wait for completion


