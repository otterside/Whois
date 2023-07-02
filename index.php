<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Whois Abfrage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Whois Abfrage</h1>
    <?php 
      // Check if the 'query' parameter is set and the 'submit' parameter is not set
      if (isset($_GET['query']) && !isset($_GET['submit'])) {
        // Retrieve the 'query' value from the GET request and store it in the $query variable
        $query = htmlspecialchars($_GET['query']);
        $server = '';

        // Check if the 'server' parameter is set and not equal to 'auto', then retrieve the value and store it in the $server variable
        if (isset($_GET['server']) && $_GET['server'] !== 'auto') {
          $server = $_GET['server'];
        }

        ?>
        <!-- HTML Form to input query and server selection -->
        <form method="get" action="index.php">
          <label for="query">Domain oder IP eingeben:</label>
          <input type="text" name="query" id="query" value="<?php echo $query; ?>" required>
          <label for="server">Whois Abfrageserver für IP Adressen wählen:</label>
          <select name="server">
            <!-- Option to automatically select server -->
            <option value="auto" <?php if ($server === '') echo 'selected'; ?>>Automatische Auswahl</option>
            <!-- Options for different Whois servers -->
            <option value="whois.ripe.net" <?php if ($server === 'whois.ripe.net') echo 'selected'; ?>>whois.ripe.net (Europa, Naher Osten und Zentralasien)</option>
            <option value="whois.arin.net" <?php if ($server === 'whois.arin.net') echo 'selected'; ?>>whois.arin.net (Nordamerika)</option>
            <option value="whois.apnic.net" <?php if ($server === 'whois.apnic.net') echo 'selected'; ?>>whois.apnic.net (Asien und Pazifikregion)</option>
            <option value="whois.afrinic.net" <?php if ($server === 'whois.afrinic.net') echo 'selected'; ?>>whois.afrinic.net (Afrika)</option>
            <option value="whois.lacnic.net" <?php if ($server === 'whois.lacnic.net') echo 'selected'; ?>>whois.lacnic.net (Lateinamerika und Karibik)</option>
          </select>
          <!-- Display user's IP address and link to query it -->
          <label for="IP">Deine IP lautet: <a href="index.php?query=<?php echo $_SERVER["REMOTE_ADDR"]; ?>"><?php echo $_SERVER["REMOTE_ADDR"]; ?></a></label>
          <input type="submit" name="" value="Abfragen">
        </form>
        <?php

        // Check if the $query value is a valid IP address
        if (filter_var($query, FILTER_VALIDATE_IP)) {
          if ($server !== '') {
            // Use the specified server if it is not empty
            $whois_server = $server;
            if ($whois_server === 'auto') {
              // Set default server to 'whois.ripe.net' if 'auto' is selected
              $whois_server = 'whois.ripe.net';
            }
          } else {
            // Include a PHP file to query the IP address using Whois
            include('whois_ip.php');
          }
          $query_string = $query;
        } else {
          // Include a PHP file to query the domain using Whois
          include('whois_domain.php');
          $query_string = $query;
        }

        // Create a socket connection to the Whois server specified by $whois_server on port 43
        $socket = fsockopen($whois_server, 43, $errno, $errstr, 10);
        if (!$socket) {
          // Output an error message if the socket connection fails
          echo "<p>Fehler beim Verbinden zum Whois-Server: $errno - $errstr</p>";
          exit();
        }

        // Send the $query_string to the Whois server by writing it to the socket
        fwrite($socket, $query_string . "\r\n");
        $response = "";

        // Read the response from the server and store it in the $response variable
        while (!feof($socket)) {
          $response .= fgets($socket, 128);
        }
        fclose($socket);

        // Output the response in a div container with CSS class "result"
        echo "<div class=\"result\"><pre>" . htmlspecialchars($response) . "</pre></div>";
      } else {
        ?>
        <!-- HTML Form to input query and server selection -->
        <form method="get" action="index.php">
          <label for="query">Domain oder IP eingeben:</label>
          <input type="text" name="query" id="query" required>
          <label for="server">Whois Abfrageserver für IP Adressen wählen:</label>
          <select name="server">
            <!-- Option to automatically select server -->
            <option value="auto">Automatische Auswahl</option>
            <!-- Options for different Whois servers -->
            <option value="whois.ripe.net">whois.ripe.net (Europa, Naher Osten und Zentralasien)</option>
            <option value="whois.arin.net">whois.arin.net (Nordamerika)</option>
            <option value="whois.apnic.net">whois.apnic.net (Asien und Pazifikregion)</option>
            <option value="whois.afrinic.net">whois.afrinic.net (Afrika)</option>
            <option value="whois.lacnic.net">whois.lacnic.net (Lateinamerika und Karibik)</option>
          </select>
          <!-- Display user's IP address and link to query it -->
          <label for="IP">Deine IP lautet: <a href="index.php?query=<?php echo $_SERVER["REMOTE_ADDR"]; ?>"><?php echo $_SERVER["REMOTE_ADDR"]; ?></a></label>
          <input type="submit" name="" value="Abfragen">
        </form>
        <?php 

        // Check if the 'submit' parameter is set
        if (isset($_GET['submit'])) {
          $query = $_GET['query'];

          // Check if the $query value is a valid IP address
          if (filter_var($query, FILTER_VALIDATE_IP)) {
            // Set the $whois_server variable to 'whois.ripe.net' for IP address queries
            $whois_server = 'whois.ripe.net';
            $query_string = $query;
          } else {
            // Include a PHP file to query the domain using Whois
            include('whois_domain.php');
            $whois_server = '';
            if(isset($_GET['server']) && $_GET['server'] !== 'auto') {
                // Retrieve the 'server' value if it is not 'auto' and store it in the $whois_server variable
                $whois_server = $_GET['server'];
            }
            $query_string = $query;
          }

          // Create a socket connection to the Whois server specified by $whois_server on port 43
          $socket = fsockopen($whois_server, 43, $errno, $errstr, 10);
          if (!$socket) {
            // Output an error message if the socket connection fails
            echo "<p>Fehler beim Verbinden zum Whois-Server: $errno - $errstr</p>";
            exit();
          }

          // Send the $query_string to the Whois server by writing it to the socket
          fwrite($socket, $query_string . "\r\n");
          $response = "";

          // Read the response from the server and store it in the $response variable
          while (!feof($socket)) {
            $response .= fgets($socket, 128);
          }
          fclose($socket);

          // Output the response in a div container with CSS class "result"
          echo "<div class=\"result\"><pre>" . htmlspecialchars($response) . "</pre></div>";
        } 
      }
    ?>
  </body>
</html>
