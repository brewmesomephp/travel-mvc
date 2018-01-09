<?php
namespace TheDistance;

/**
 * Class App
 * @package TheDistance
 * @author Joseph Alai <josephalai@gmail.com>
 *
 * Entry point of the application.
 * Receives the two addresses
 * Calls Google Maps API
 * Returns the distance between them
 */
class App{
    private $address1;
    private $address2;
    private $lat1;
    private $lon1;
    private $lat2;
    private $lon2;
    private $distanceMiles;
    private $distanceKilometers;
    private $distanceOnly;

    public function __construct($address1, $address2)
    {
        if (isset($_GET['distance'])){
            $this->distanceOnly = true;
        }
        $this->setAddress1($address1);
        $this->setAddress2($address2);
        list($this->distanceMiles, $this->distanceKilometers) = $this->getDistance($this->lat1, $this->lon1, $this->lat2, $this->lon2);
        return [$this->distanceMiles, $this->distanceKilometers];


    }

public function __toString()
{
    // TODO: Implement __toString() method.
    $json = '{
   "map": {
      "geo": {
         "lat1": "' . $this->lat1 . '",
         "lon1": "' . $this->lon1 . '",
         "lat2": "' . $this->lat2 . '",
         "lon2": "' . $this->lon2 . '"
      },
      "distance": {
         "miles": "' . $this->distanceMiles . '",
         "kilometers": "' . $this->distanceKilometers . '"
      }
   }
   }



    ';

    if ($this->distanceOnly == true){
        return (string)$this->distanceMiles;
    }
    return $json;
}

public function setAddress1($address){
    $this->address1 = $address;
    list($this->lat1, $this->lon1) = $this->geoify($this->address1);
}
public function setAddress2($address)
{
    $this->address2 = $address;
    list($this->lat2, $this->lon2) = $this->geoify($this->address2);
}

    private function geoify($address)
    {
        $address = urlencode($address);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $address . "&sensor=true";
        $xml = simplexml_load_file($request_url) or die("url not loading");
        $status = $xml->status;
        if ($status == "OK") {
            $Lat = $xml->result->geometry->location->lat;
            $Lon = $xml->result->geometry->location->lng;
            $listLatLong = [$Lat, $Lon];
        } else {
            return [0, 0];
        }
        return $listLatLong;
    }

    private function getDistance($lat1, $lon1, $lat2, $lon2, $unit = "m")
    {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad((double)$lat1)) * (double)sin(deg2rad((double)$lat2)) + (double)cos(deg2rad((double)$lat1)) * (double)cos(deg2rad((double)$lat2)) * (double)cos(deg2rad((double)$theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        $resultsKilometer = $miles * 1.609344;
        $resultsMiles = $miles;

        return [$resultsMiles, $resultsKilometer];
    }
}

print (isset($_GET['address1']) && isset($_GET['address2'])) ? new App($_GET['address1'], $_GET['address2']) : "";
?>