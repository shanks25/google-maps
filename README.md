# Google-maps
#Get Time Travel Data From Google Maps API 

- Namespaced under EvenGenius
- API throws exceptions instead of returning errors
- All requests and responses are communicated over JSON
- A minimum of PHP 5.3 is required

# Installation

` composer require evilgenius/google-maps`

- If you are not using composer, download the latest release from the releases section. You should download the evilgenius-maps.zip file. After that, include map.php in your application and you can use the API as usual.

# Usage

``` 
  use EvilGenius\Map; 

  $map = new Map('your-google-maps-key');  
  
  $map->getTwoPointDistance($firstLat, $firstLong, $secLat, $secLong); // returns distance in km
  
  $map->getTwoPointTimeInSeconds($firstLat, $firstLong, $secLat, $secLong); // returns time travel in seconds
  
  ```
 # License

You are Free to use any way you like

# Release

1. v1.0.1 Contains two methods 
