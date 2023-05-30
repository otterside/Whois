<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Whois Abfrage</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Whois Abfrage</h1>
    <?php if (isset($_GET['query']) && !isset($_GET['submit'])): ?>
      <form method="get" action="index.php">
        <label for="query">Domain oder IP eingeben:</label>
        <input type="text" name="query" id="query" value="<?php echo htmlspecialchars($_GET['query']); ?>" required>
        <label for="IP">Deine IP lautet: <a href="index.php?query=<?php echo $_SERVER["REMOTE_ADDR"]; ?>"><?php echo $_SERVER["REMOTE_ADDR"]; ?></a></label>
        <input type="submit" name="" value="Abfragen">
      </form>
      <?php
      $domain = $_GET['query'];
      if (filter_var($domain, FILTER_VALIDATE_IP)) {
        include('whois_ip.php');
        $query_string = $domain;
      } else {
        include('whois_domain.php');
        $query_string = $domain;
      }
      $socket = fsockopen($whois_server, 43, $errno, $errstr, 10);
      if (!$socket) {
        echo "<p>Fehler beim Verbinden zum Whois-Server: $errno - $errstr</p>";
        exit();
      }
      fwrite($socket, $query_string . "\r\n");
      $response = "";
      while (!feof($socket)) {
        $response .= fgets($socket, 128);
      }
      fclose($socket);
      echo "<div class=\"result\"><pre>" . htmlspecialchars($response) . "</pre></div>";
      ?>
    <?php else: ?>
      <form method="get" action="index.php">
        <label for="query">Domain oder IP eingeben:</label>
        <input type="text" name="query" id="query" required>
        <label for="IP">Deine IP lautet: <a href="index.php?query=<?php echo $_SERVER["REMOTE_ADDR"]; ?>"><?php echo $_SERVER["REMOTE_ADDR"]; ?></a></label>
        <input type="submit" name="" value="Abfragen">
      </form>
      <?php if (isset($_GET['submit'])): ?>
        <?php
        $query_string = '';
        $domain = $_GET['query'];

        if (filter_var($domain, FILTER_VALIDATE_IP)) {
          include('whois_ip.php');
          $query_string = $domain;
        } else {
          include('whois_domain.php');
          $query_string = $domain;
        }
        $socket = fsockopen($whois_server, 43, $errno, $errstr, 10);
        if (!$socket) {
          echo "<p>Fehler beim Verbinden zum Whois-Server: $errno - $errstr</p>";
          exit();
        }
        fwrite($socket, $query_string . "\r\n");
        $response = "";
        while (!feof($socket)) {
          $response .= fgets($socket, 128);
        }
        fclose($socket);
        echo "<div class=\"result\"><pre>" . htmlspecialchars($response) . "</pre></div>";
        ?>
      <?php endif; ?>
    <?php endif; ?>
  </body>
</html>
