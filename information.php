<?php
// Simulate a database of titles (or retrieve from a real database)
$titles = [
    "About us",
    "All services",
    "Apartment cleaning",
    "Book now",
    "Carpet cleaning",
    "Commercial cleaning",
    "Deep cleaning",
    "Founder",
    "Gallery",
    "Home",
    "Information",
    "Location",
    "Mission",
    "Villa cleaning",
    "Window cleaning"
];


// Get the suggest parameter from URL
$request = isset($_GET["suggest"]) ? $_GET["suggest"] : '';

$suggest = "";

// Look up all suggestions from array if $request is different from ""
if ($request !== "") {
    $request = strtolower($request);
    $len = strlen($request);
    foreach ($titles as $title) {
        if (stristr($title, substr($request, 0, $len))) {
            if ($suggest === "") {
                $suggest = "<p>$title</p>";
            } else {
                $suggest .= "<p>$title</p>";
            }
        }
    }
}

// Output "No suggestion" if no hint was found or output correct values
echo $suggest === "" ? "No suggestion" : $suggest;
?>
