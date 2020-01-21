# Kerktijden Unofficial API
A unofficial API to retrieve church services from Kerktijden.nl.

I developed this simple API for my own use in HomeAssistant. It uses the data published on Kerktijden.nl using web scraping.

Disclaimer: I take no responsibility whatsoever for incorrectly supplied data and / or the operation of the API itself. The moment the Kerktijden.nl website changes, there is a high chance that the API will no longer work. Creating an issue is always possible, but I don't promise anything.

## Usage:
Examples:
```
https://api.yourdomain.com/kerktijden.php?churchid=1208
```
Or you can modify your .htaccess which will beautify the URL like:
```
https://api.yourdomain.com/kerktijden/1208
```
### Modifying .htaccess
```
RewriteEngine on

RewriteRule ^(.+)\.php$ /$1 [R,L]
RewriteCond %{REQUEST_FILENAME}.php -f
RewriteRule ^(.*?)/?$ /$1.php [NC,END]
```
## Output
The output is in JSON and looks like:
```
[  
   {  
      "date":"26-01-2020",
      "timeAM":"09:30",
      "preacherAM":"ds. A. Voorbeeld",
      "timePM":"18:30",
      "preacherPM":"ds. M. Ander"
   },
   {  
      "date":"02-02-2020",
      "timeAM":"09:30",
      "preacherAM":"prop. N. Voorbeeld",
      "timePM":"14:30",
      "preacherPM":"ds. M.L. Ander"
   }
]
```