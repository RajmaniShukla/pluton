# BHISHM - Bharatiya Interface for E-Security & Help Management

🛡️ **E-Security Help Web Portal** - A comprehensive platform for reporting and managing digital security incidents in India.

## Overview

BHISHM (Bharatiya Interface for E-Security & Help Management) is a web-based e-security help portal designed to:

- Report cyber incidents and digital frauds
- Provide incident management guidance
- Share best practices for online safety
- Offer a dashboard for administrators
- Contact and support system

## Features

### Public Portal
- **Home Page** - Landing page with slider and key information
- **About Us** - Organization information and mission
- **Incident Management** - Guide for reporting cyber incidents
- **Best Practices** - Security tips and guidelines
- **Contact** - Support and contact form

### Admin Dashboard (`/dashbord/`)
- Login authentication system
- Dashboard analytics view
- Form management
- User administration
- Encryption utilities

### Interactive Elements
- 3D Gallery showcase
- Image slider (BxSlider)
- Newsletter subscription
- Contact form with email notification

## Tech Stack

| Component | Technology |
|-----------|------------|
| Frontend | HTML5, CSS3, Bootstrap 2.x |
| JavaScript | jQuery, Modernizr, MixItUp |
| Backend | PHP |
| Database | MySQL |
| Animations | Animate.css, CSlider |

## Project Structure

```
pluton/
├── index.html              # Main landing page
├── about_us.html           # About page
├── incident_management.html # Incident reporting guide
├── best_practices.html     # Security tips
├── contact.html            # Contact form
├── login.html/php          # User login
├── connect.inc.php         # Database connection (⚠️ configure this)
│
├── css/                    # Stylesheets
│   ├── bootstrap.css
│   ├── bootstrap-responsive.css
│   ├── pluton.css
│   ├── style.css
│   ├── animate.css
│   └── jquery.*.css
│
├── js/                     # JavaScript files
│   ├── jquery.js
│   ├── bootstrap.js
│   ├── app.js
│   └── jquery.*.js
│
├── php/                    # PHP utilities
│   ├── functions.php       # Helper functions
│   ├── mail.php            # Email handling
│   └── newsletter.php      # Newsletter subscription
│
├── dashbord/               # Admin dashboard
│   ├── login.html/php
│   ├── dashboard.php
│   ├── encryption.php
│   └── demo-*.html
│
├── 3DGallery/              # 3D image gallery component
│   ├── css/
│   └── js/
│
├── images/                 # Image assets
│   ├── logos/
│   └── portfolio/
│
└── fonts/                  # Custom icon fonts
```

## Setup

### Prerequisites
- Web server (Apache/Nginx)
- PHP 5.6+ (see security notes for PHP 7+ compatibility)
- MySQL 5.x+

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/RajmaniShukla/pluton.git
   cd pluton
   ```

2. **Configure database connection**
   ```bash
   cp connect.example.inc.php connect.inc.php
   # Edit connect.inc.php with your database credentials
   ```

3. **Create MySQL database**
   ```sql
   CREATE DATABASE bhishm_db;
   ```

4. **Configure email settings**
   Edit `php/mail.php` and update:
   ```php
   $emailTo = "your-email@domain.com";
   $emailFrom = "contact@your-domain.com";
   ```

5. **Deploy to web server**
   - Copy files to web root (e.g., `/var/www/html/`)
   - Ensure PHP is enabled
   - Configure virtual host if needed

## ⚠️ Security Warnings

### Critical: Database Credentials
- **NEVER commit `connect.inc.php` with real credentials**
- Use `connect.example.inc.php` as a template
- Add `connect.inc.php` to `.gitignore`

### Deprecated PHP Functions
This codebase uses deprecated MySQL functions that were **removed in PHP 7.0+**:

| Deprecated | Modern Replacement |
|------------|-------------------|
| `mysql_connect()` | `mysqli_connect()` or PDO |
| `mysql_select_db()` | `mysqli_select_db()` |
| `mysql_query()` | `mysqli_query()` or prepared statements |
| `get_magic_quotes_gpc()` | Removed in PHP 7.4 |

### Recommended Security Updates

1. **Migrate to MySQLi or PDO** with prepared statements
2. **Use parameterized queries** to prevent SQL injection
3. **Implement HTTPS** for all pages
4. **Update Bootstrap** to version 5.x
5. **Add CSRF protection** to forms
6. **Implement rate limiting** on login attempts

## Configuration

### Database Schema (Expected)
```sql
-- Users table for authentication
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,  -- Use password_hash()
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Newsletter subscribers
CREATE TABLE newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact form submissions
CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    message TEXT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Environment Variables (Recommended)
```env
DB_HOST=localhost
DB_USER=your_username
DB_PASS=your_password
DB_NAME=bhishm_db
MAIL_TO=admin@bhishm.gov.in
```

## Browser Support

| Browser | Support |
|---------|---------|
| Chrome | ✅ Full |
| Firefox | ✅ Full |
| Safari | ✅ Full |
| Edge | ✅ Full |
| IE 9+ | ⚠️ Limited (pluton-ie7.css) |

## Government Context

This portal appears to be designed for:
- Ministry of Skill Development & Entrepreneurship (MSDE)
- Digital India initiatives
- Cyber security awareness programs

Logos present:
- BHISHM official logo
- MSDE (Ministry of Skill Development & Entrepreneurship) logo
- Government of India branding

## License

See `dashbord/LICENSE.md` for dashboard component licensing.

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/improvement`)
3. Never commit credentials or sensitive data
4. Submit a pull request

## Author

**Rajmani Shukla**  
GitHub: [@RajmaniShukla](https://github.com/RajmaniShukla)

---

> ⚡ Part of Digital India's cyber security awareness initiative
