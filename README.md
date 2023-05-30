# Whois Abfrage

Dies ist ein einfaches PHP-Skript, das es ermöglicht, WHOIS-Abfragen für Domains oder IP-Adressen durchzuführen. Das Skript stellt eine einfache Benutzeroberfläche zur Verfügung, in der der Benutzer eine Domain oder eine IP-Adresse eingeben kann, um eine WHOIS-Abfrage durchzuführen.
## Voraussetzungen

Das Skript benötigt eine funktionierende PHP-Installation auf dem Server. Es werden keine weiteren Abhängigkeiten benötigt. Die Standard-Ports für HTTP (80) und WHOIS (43) müssen auf dem Server geöffnet sein.
## Installation

1. Laden Sie die Dateien des Skripts herunter und laden Sie sie auf Ihren Server hoch.
2. Stellen Sie sicher, dass die Dateien in einem für Ihren Webserver zugänglichen Verzeichnis abgelegt wurden.
3. Stellen Sie sicher, dass der Webserver Schreibrechte für das Verzeichnis hat, in dem das Skript gespeichert ist.
4. Stellen Sie sicher, dass PHP auf Ihrem Webserver installiert ist.

## Verwendung

1. Rufen Sie das Skript in Ihrem Webbrowser auf, indem Sie die URL zur Seite aufrufen, auf der das Skript installiert wurde.
2. Geben Sie die Domain oder die IP-Adresse in das Eingabefeld ein.
3. Klicken Sie auf die Schaltfläche "Abfragen".
4. Das Skript führt eine WHOIS-Abfrage für die eingegebene Domain oder IP-Adresse durch und zeigt die Ergebnisse auf der Seite an.

Es ist möglich, Query-Strings auch für Domains und IP-Adressen zu nutzen, indem sie einfach der URL angehängt werden, zum Beispiel:

```
http://example.com/index.php?query=google.com
http://example.com/index.php?query=8.8.8.8
```

Wenn Sie weitere Whois-Server hinzufügen wollen, können Sie dies in der whois_domain.php tun, indem Sie einen Codeblock im folgenden Schema einfügen. Sie müssen jedoch die angegebene Zahl je nach Länge der Domain (drei- oder vierstellig mit Punkt) anpassen.

```php
elseif (substr($domain, -4) === ".net") {
    $whois_server = "whois.verisign-grs.com";
    $query_string = "domain " . $domain;
} 
```
## Anpassung (style.css)

Das Skript verwendet eine separate CSS-Datei, um das Aussehen der Benutzeroberfläche zu steuern. Sie können diese Datei bearbeiten, um das Aussehen der Benutzeroberfläche an Ihre Bedürfnisse anzupassen.
## Hinweise

Das Skript verwendet die Standard-Ports für HTTP (80) und WHOIS (43). Stellen Sie sicher, dass diese Ports auf Ihrem Server geöffnet sind, damit das Skript ordnungsgemäß funktioniert.

Das Skript ist nur für den privaten Gebrauch bestimmt. Verwenden Sie es nicht für illegale oder unethische Zwecke.
## Autor

Dieses Skript wurde von ChatGPT erstellt, einem großen Sprachmodell, das auf der GPT-3.5-Architektur von OpenAI basiert.
## Lizenz

Dieses Skript ist unter der MIT-Lizenz veröffentlicht. Eine Kopie der Lizenz finden Sie in der Datei LICENSE.
