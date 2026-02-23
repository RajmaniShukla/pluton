# Security Guidelines for BHISHM Portal

## ⚠️ Critical Security Issues

### 1. Hardcoded Database Credentials

**Issue:** `connect.inc.php` contains hardcoded database credentials with empty/default passwords.

**Risk Level:** 🔴 CRITICAL

**Fix:**
```bash
# Remove existing file from git tracking (if committed)
git rm --cached connect.inc.php
git rm --cached dashbord/connect.inc.php

# Use the example template
cp connect.example.inc.php connect.inc.php
# Edit with your actual (secure) credentials
```

### 2. Deprecated MySQL Extension

**Issue:** Uses `mysql_*` functions removed in PHP 7.0+

**Risk Level:** 🟠 HIGH (incompatible with modern PHP)

**Current (Vulnerable):**
```php
mysql_connect($server, $dbuser, $dbpswd);
mysql_select_db($db);
```

**Recommended (Secure):**
```php
$mysqli = new mysqli($server, $dbuser, $dbpswd, $db);
// Or use PDO for better security
```

### 3. No SQL Injection Protection

**Issue:** Direct string concatenation in SQL queries

**Risk Level:** 🔴 CRITICAL

**Always use prepared statements:**
```php
// UNSAFE
$result = $mysqli->query("SELECT * FROM users WHERE id = " . $_GET['id']);

// SAFE
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
```

### 4. No CSRF Protection

**Issue:** Forms lack CSRF token validation

**Risk Level:** 🟠 HIGH

**Fix:** Add CSRF tokens to all forms:
```php
// Generate token (in session)
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

// In form
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

// Validate on submit
if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die('CSRF validation failed');
}
```

### 5. Insecure HTTP Resources

**Issue:** Loads fonts over HTTP (not HTTPS)

**File:** `index.html`
```html
<!-- Current (insecure) -->
<link href='http://fonts.googleapis.com/css?...'>

<!-- Fix (secure) -->
<link href='https://fonts.googleapis.com/css?...'>
```

### 6. Password Storage

**Issue:** Passwords may be stored in plain text

**Risk Level:** 🔴 CRITICAL

**Fix:** Always hash passwords:
```php
// Storing password
$hashedPassword = password_hash($plainPassword, PASSWORD_DEFAULT);

// Verifying password
if (password_verify($plainPassword, $hashedPassword)) {
    // Valid
}
```

## Security Checklist

### Before Deployment

- [ ] Remove all hardcoded credentials
- [ ] Update PHP to 7.4+ or 8.x
- [ ] Replace `mysql_*` with `mysqli_*` or PDO
- [ ] Implement prepared statements everywhere
- [ ] Add CSRF protection to all forms
- [ ] Enable HTTPS site-wide
- [ ] Hash all passwords with `password_hash()`
- [ ] Implement rate limiting on login
- [ ] Add input validation/sanitization
- [ ] Configure proper error handling (no stack traces in production)
- [ ] Set secure session cookie flags

### Server Configuration

```apache
# Apache .htaccess security headers
Header always set X-Content-Type-Options "nosniff"
Header always set X-Frame-Options "SAMEORIGIN"
Header always set X-XSS-Protection "1; mode=block"
Header always set Content-Security-Policy "default-src 'self'"
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"

# Disable directory listing
Options -Indexes

# Protect sensitive files
<FilesMatch "\.(inc|log|sh|sql)$">
    Order allow,deny
    Deny from all
</FilesMatch>
```

### PHP Security Configuration

```ini
; php.ini security settings
expose_php = Off
display_errors = Off
log_errors = On
session.cookie_httponly = 1
session.cookie_secure = 1
session.use_strict_mode = 1
```

## Reporting Security Issues

If you discover a security vulnerability, please:

1. **Do NOT** create a public GitHub issue
2. Contact the maintainer directly
3. Allow reasonable time for a fix before disclosure

## Resources

- [OWASP Top 10](https://owasp.org/www-project-top-ten/)
- [PHP Security Best Practices](https://www.php.net/manual/en/security.php)
- [mysqli Prepared Statements](https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php)
- [PDO Tutorial](https://www.php.net/manual/en/pdo.prepared-statements.php)
