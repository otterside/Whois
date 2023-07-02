<?php
$domain = $_GET['query'];
$ip_chunks = explode(".", $domain);
         $ip_range = $ip_chunks[0];
         switch ($ip_range) {
             case "10":
                 $whois_server = "whois.arin.net";
                 break;
             case "172":
                 $whois_server = "whois.arin.net";
                 break;
             case "192":
                 if ($ip_chunks[1] == "0" && $ip_chunks[2] == "0") {
                     $whois_server = "whois.arin.net";
                 } else {
                     $whois_server = "whois.ripe.net";
                 }
                 break;
             case "2":
             case "5":
             case "31":
             case "37":
             case "46":
             case "62":
             case "77":
             case "78":
             case "79":
             case "80":
             case "81":
             case "82":
             case "83":
             case "84":
             case "85":
             case "86":
             case "87":
             case "88":
             case "89":
             case "90":
             case "91":
             case "92":
             case "93":
             case "94":
             case "95":
             case "109":
             case "141":
             case "145":
             case "151":
             case "176":
             case "178":
             case "185":
             case "188":
             case "193":
             case "194":
             case "195":
             case "212":
             case "213":
             case "217":
                 $whois_server = "whois.ripe.net";
                 break;
             case "41":
             case "102":
             case "105":
             case "197":
             case "196":
                 $whois_server = "whois.afrinic.net";
                 break;
             case "1":
             case "14":
             case "27":
             case "36":
             case "39":
             case "42":
             case "49":
             case "58":
             case "59":
             case "60":
             case "61":
             case "101":
             case "103":
             case "106":
             case "110":
             case "111":
             case "112":
             case "113":
             case "114":
             case "115":
             case "116":
             case "117":
             case "118":
             case "119":
             case "120":
             case "121":
             case "122":
             case "123":
             case "124":
             case "125":
             case "126":
                 $whois_server = "whois.apnic.net";
                 break;
             case "200":
                 if ($ip_chunks[1] >= 0 && $ip_chunks[1] <= 255) {
                     $whois_server = "whois.lacnic.net";
                 } else {
                     $whois_server = "whois.ripe.net";
                 }
                 break;
             default:
                 if (
                     ip2long($domain) >= ip2long("198.0.0.0") &&
                     ip2long($domain) <= ip2long("198.51.255.255")
                 ) {
                     $whois_server = "whois.arin.net";
                 } elseif (
                     ip2long($domain) >= ip2long("203.0.113.0") &&
                     ip2long($domain) <= ip2long("203.0.113.255")
                 ) {
                     $whois_server = "whois.apnic.net";
                 } elseif (
                     ip2long($domain) >= ip2long("192.0.2.0") &&
                     ip2long($domain) <= ip2long("192.0.2.255")
                 ) {
                     $whois_server = "whois.iana.org";
                 } elseif (
                     ip2long($domain) >= ip2long("198.51.100.0") &&
                     ip2long($domain) <= ip2long("198.51.100.255")
                 ) {
                     $whois_server = "whois.iana.org";
                 } elseif (
                     ip2long($domain) >= ip2long("203.0.113.0") &&
                     ip2long($domain) <= ip2long("203.0.113.255")
                 ) {
                     $whois_server = "whois.apnic.net";
                 } elseif (
                     ip2long($domain) >= ip2long("192.88.99.0") &&
                     ip2long($domain) <= ip2long("192.88.99.255")
                 ) {
                     $whois_server = "whois.ripe.net";
                 } elseif (
                     ip2long($domain) >= ip2long("224.0.0.0") &&
                     ip2long($domain) <= ip2long("239.255.255.255")
                 ) {
                     $whois_server = "whois.iana.org";
                 } else {
                     $whois_server = "whois.arin.net";
                 }
                 break;
         }
         $query_string = $domain;
?>
