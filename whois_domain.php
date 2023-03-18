<?php
  
if (substr($domain, -4) === ".com") {
    $whois_server = "whois.verisign-grs.com";
    $query_string = "domain " . $domain;
} 
elseif (substr($domain, -3) === ".tk") {
    $whois_server = "whois.dot.tk";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".cn") {
    $whois_server = "whois.cnnic.cn";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".de") {
    $whois_server = "whois.denic.de";
    $query_string = $domain;
} 
elseif (substr($domain, -4) === ".net") {
    $whois_server = "whois.verisign-grs.com";
    $query_string = "domain " . $domain;
} 
elseif (substr($domain, -4) === ".org") {
    $whois_server = "whois.pir.org";
    $query_string = $domain;
} 
elseif (substr($domain, -5) === ".info") {
    $whois_server = "whois.afilias.net";
    $query_string = "domain " . $domain;
} 
elseif (substr($domain, -3) === ".ru") {
    $whois_server = "whois.tcinet.ru";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".co") {
    $whois_server = "whois.nic.co";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".nl") {
    $whois_server = "whois.domain-registry.nl";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".uk") {
    $whois_server = "whois.nic.uk";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".ga") {
    $whois_server = "whois.gab.com";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".au") {
    $whois_server = "whois.auda.org.au";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".br") {
    $whois_server = "whois.registro.br";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".it") {
    $whois_server = "whois.nic.it";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".pl") {
    $whois_server = "whois.dns.pl";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".fr") {
    $whois_server = "whois.nic.fr";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".in") {
    $whois_server = "whois.registry.in";
    $query_string = $domain;
} 
elseif (substr($domain, -3) === ".eu") {
    $whois_server = "whois.eu";
    $query_string = $domain;
}     // Show error message for unsupported domain extensions
else {
    echo "<p>Die eingegebene Domain-Endung wird nicht unterst\xC3\xBCtzt.</p>";
      exit();
}
?>