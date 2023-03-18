<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Whois Abfrage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Whois Abfrage</h1>
    <form method="post">
      <label for="domain">Domain oder IP eingeben:</label>
      <input type="text" name="domain" id="domain" required>
      <label for="IP">Deine IP lautet: <?php echo $_SERVER["REMOTE_ADDR"]; ?></label>
      <input type="submit" name="submit" value="Abfragen">
    </form>
    <?php
      // Set the content type to UTF-8
      header('Content-type: text/html; charset=utf-8');
      // Check if form is submitted
      if (isset($_POST["submit"])) {
        $domain = $_POST["domain"];

        // Perform whois query for domains or IP addresses
        if (filter_var($domain, FILTER_VALIDATE_IP)) {
          // Include the whois_ip.php file for performing the whois query
          include('whois_ip.php');
        } else {
          // Perform whois query for domains
          // Include the whois_domain.php file for performing the whois query for domains
          include('whois_domain.php');
        }

        // Connect to whois server
        $socket = fsockopen($whois_server, 43, $errno, $errstr, 10);
        if (!$socket) {
          echo "<p>Fehler beim Verbinden zum Whois-Server: $errno - $errstr</p>";
          exit();
        }

        // Send query string
        fwrite($socket, $query_string . "\r\n");

        // Read response from whois server
        $response = "";
        while (!feof($socket)) {
          $response .= fgets($socket, 128);
        }

        // Close socket connection
        fclose($socket);

        // Display result
        echo "<div class=\"result\"><pre>" .
             htmlspecialchars($response) .
             "</pre></div>";
      }
    ?>
  </body>
</html>
