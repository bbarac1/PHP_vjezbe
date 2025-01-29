<?php

$date = new DateTime();
$holidays = [
    "01-01", // Nova godina
    "01-06", // Bogojavljenje
    // Uskrs (pokretni)
    "05-01", // Praznik rada
    "05-30", // Dan državnosti
    "06-22", // Dan antifašističke borbe
    "08-05", // Dan pobjede i domovinske zahvalnosti i Dan hrvatskih branitelja
    "08-15", // Velika Gospa
    "11-01", // Svi sveti
    "11-18", // Dan sjećanja na žrtve Domovinskog rata i žrtvu Vukovara i Škabrnje
    "12-25", // Božić
    "12-26"  // Sveti Stjepan
];

function ducan($date, $holidays) {
    $day = $date->format('l');
    $hour = $date->format('H');
    $monthDay = $date->format('m-d');

    if (in_array($monthDay, $holidays)) {
        return "Danas je praznik, dućan je zatvoren";
    }
    else if ($day != "Saturday" && $day != "Sunday") {
        if ($hour >= 8 && $hour < 20) {
            return "Ducan je otvoren";
        } else { 
            return "Ducan je zatvoren";
        }
    }
    elseif ($day == "Saturday" ) {
        if ($hour >= 9 && $hour < 14) {
            return "Ducan je otvoren";
        } else { 
            return "Ducan je zatvoren";
        }
    } else {
        return "Ducan je zatvoren";
    }
}

echo ducan($date, $holidays) . "<br>";


?>
