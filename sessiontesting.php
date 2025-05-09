<?php
// Start the session
session_start();

// Check if the session variable exists
if (!isset($_SESSION['counter'])) {
    // If not, set it to 1
    $_SESSION['counter'] = 1;
    $message = "Session started, counter initialized to 1.";
} else {
    // Increment the counter
    $_SESSION['counter']++;
    $message = "Session is working. Counter: " . $_SESSION['counter'];
}

// Display the session status and counter
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Session Test</title>
</head>

<body>
    <h1>PHP Session Test</h1>
    <p><?php echo $message; ?></p>
    <p>Reload this page to test if the session persists.</p>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enable Cookies</title>

    </head>

    <body>
        <h1>Check and Enable Cookies</h1>
        <p id="status">Checking cookies...</p>

        <div id="cookieBanner">
            <p>Cookies are disabled or restricted. Please enable cookies for the best experience.</p>
            <button onclick="acceptCookies()">Enable Cookies</button>
        </div>

        <script>
            // Function to check if cookies are enabled
            function checkCookiesEnabled() {
                // Set a test cookie
                document.cookie = "test_cookie=enabled; path=/; samesite=strict";

                // Check if the cookie was set successfully
                if (document.cookie.includes("test_cookie=enabled")) {
                    document.getElementById("status").innerText = "✅ Cookies are enabled!";
                    // Optionally delete the test cookie after checking
                    document.cookie = "test_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/; samesite=strict";
                } else {
                    document.getElementById("status").innerText = "❌ Cookies are disabled!";
                    document.getElementById("cookieBanner").style.display = "block";
                }
            }

            // Function to handle user acceptance of cookies
            function acceptCookies() {
                alert(
                    "Please enable cookies in your browser settings:\n\n1. Go to your browser's settings.\n2. Look for Privacy or Site Settings.\n3. Enable cookies.\n\nAfter enabling cookies, refresh this page."
                );
            }

            // Run the cookie check
            checkCookiesEnabled();
        </script>
    </body>

    </html>
</body>

</html>