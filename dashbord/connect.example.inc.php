<?php
/**
 * Database Connection Configuration
 * 
 * SETUP INSTRUCTIONS:
 * 1. Copy this file: cp connect.example.inc.php connect.inc.php
 * 2. Update credentials below with your actual database details
 * 3. NEVER commit connect.inc.php to version control!
 * 
 * SECURITY NOTES:
 * - Use environment variables in production
 * - Enable SSL for database connections
 * - Use a dedicated database user with minimal privileges
 */

// Database credentials
$server = "localhost";
$dbuser = "your_username";        // Change this!
$dbpswd = "your_secure_password"; // Change this! Use a strong password
$db     = "bhishm_db";            // Change this if different

// ============================================================
// OPTION 1: MySQLi (Recommended for simple projects)
// ============================================================

$mysqli = new mysqli($server, $dbuser, $dbpswd, $db);

if ($mysqli->connect_error) {
    // In production, log this instead of displaying
    error_log("Database connection failed: " . $mysqli->connect_error);
    die("Connection failed. Please try again later.");
}

// Set charset for security (prevents certain SQL injection attacks)
$mysqli->set_charset("utf8mb4");

// ============================================================
// OPTION 2: PDO (Recommended for larger projects)
// ============================================================

/*
try {
    $dsn = "mysql:host={$server};dbname={$db};charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $dbuser, $dbpswd, $options);
} catch (PDOException $e) {
    error_log("Database connection failed: " . $e->getMessage());
    die("Connection failed. Please try again later.");
}
*/

// ============================================================
// EXAMPLE: Secure Query with Prepared Statements (MySQLi)
// ============================================================

/*
// UNSAFE (vulnerable to SQL injection):
// $result = $mysqli->query("SELECT * FROM users WHERE id = " . $_GET['id']);

// SAFE (use prepared statements):
$stmt = $mysqli->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $_GET['id']);  // "i" for integer, "s" for string
$stmt->execute();
$result = $stmt->get_result();
*/

// ============================================================
// EXAMPLE: Secure Query with Prepared Statements (PDO)
// ============================================================

/*
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);
$result = $stmt->fetchAll();
*/

// ============================================================
// ENVIRONMENT VARIABLE APPROACH (Best for production)
// ============================================================

/*
// Load from environment variables
$server = getenv('DB_HOST') ?: 'localhost';
$dbuser = getenv('DB_USER') ?: 'root';
$dbpswd = getenv('DB_PASS') ?: '';
$db     = getenv('DB_NAME') ?: 'bhishm_db';
*/

?>
