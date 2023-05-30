# WHOIS Query

This is a simple PHP script that allows WHOIS queries for domains or IP addresses to be performed. The script provides a simple user interface where the user can enter a domain or IP address to perform a WHOIS query.
## Requirements

The script requires a working PHP installation on the server. There are no additional dependencies required. The default ports for HTTP (80) and WHOIS (43) must be open on the server.
## Installation

1. Download the script files and upload them to your server.
2. Make sure the files are stored in a directory accessible to your web server.
3. Ensure that the web server has write access to the directory where the script is stored.
4. Ensure that PHP is installed on your web server.

## Usage

1. Call up the script in your web browser by accessing the URL of the page where the script is installed.
2. Enter the domain or IP address in the input field.
3. Click the "Query" button.
4. The script performs a WHOIS query for the entered domain or IP address and displays the results on the page.

It is possible to use query strings for domains and IP addresses by simply appending them to the URL, for example:

```
http://example.com/index.php?query=google.com
http://example.com/index.php?query=8.8.8.8
```

If you want to add more WHOIS servers, you can do so in the whois_domain.php file by adding a code block in the following pattern. However, you need to adjust the specified number according to the length of the domain (three or four digits with a dot).

```php
elseif (substr($domain, -4) === ".net") {
    $whois_server = "whois.verisign-grs.com";
    $query_string = "domain " . $domain;
} 
```
## Customization (style.css)

The script uses a separate CSS file to control the appearance of the user interface. You can edit this file to customize the look and feel of the user interface to your needs.
## Notes

The script uses the default ports for HTTP (80) and WHOIS (43). Make sure these ports are open on your server for the script to work correctly.

The script is intended for private use only. Do not use it for illegal or unethical purposes.
## Author

This script was created by ChatGPT, a large language model based on the GPT-3.5 architecture by OpenAI.
## License

This script is released under the MIT license. A copy of the license can be found in the LICENSE file.
