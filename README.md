# FAQ Statistiken

Dies ist ein kleines PHP-Skript, mit dessen Hilfe die Nützlichkeit verschiedener Links, die auf das iPad-FAQ verweisen (z. B. Website, IServ etc.) evaluiert werden kann.

## Deployment

Die Applikation kann von GitHub geklont und mittels composer installiert werden. Lediglich der "src"-Ordner muss auf den Webserver geladen werden.

````
git clone https://github.com/modelrailroader/faq-statistics
cd faq-statistics
composer install
````

Zusätzlich ist auch die manuelle Konfiguration der MySQL-Datenbank durchzuführen (s. Abschnitt "Datenbank").

## Verwendung

Mit dem GET-Parameter "source" können beliebig viele Quellen definiert werden, die vorher in der Datenbank hinterlegt werden müssen (s. unten). Mittels dieser Variablen ist eine Unterscheidung zwischen den verschiedenen Links möglich. 

Beispiel: Es sollen zwei Links evaluiert werden, einer auf der Website, einer auf IServ. Auf der Website wird der Link "[URL]?source=website", auf IServ der Link "[URL]?source=iserv" hinterlegt. Beide Links leiten umgehend auf das normale iPad-FAQ; zählen jedoch auch die Aufrufe.

## Datenbank

Es ist eine eigene Tabelle namens "statistics" erforderlich. Diese beinhaltet drei Spalten:

- name (VARCHAR): Dies ist der Name, der als source im GET-Parameter verwendet wird.
- description (VARCHAR): Diese wird als lesbarer Name in den Ergebnissen angezeigt.
- views (INT): Hier werden die Aufrufe gespeichert.

Diese Tabelle muss vorher manuell erstellt werden. Die Datenbank-Zugangsdaten sind in der constants.original.php zu hinterlegen. Außerdem muss diese Datei in constants.php umbenannt werden.

Zum Hinzufügen eines neuen Links muss ein neuer Eintrag in dieser Tabelle mit views=0 hinzugefügt werden.

Copyright by Jan Harms © 2025

Lizenz: Mozilla Public License 2.0 (MPL 2.0) - s. LICENSE-Datei