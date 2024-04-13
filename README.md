# FAQ Statistiken

Dies ist ein kleines PHP-Skript, mit dessen Hilfe die Nützlichkeit verschiedener Links, die auf das iPad-FAQ verweisen (z. B. Website, IServ etc.) evaluiert werden kann.

## Deployment

Die Applikation kann mittels composer installiert werden. Lediglich der "src"-Ordner muss auf den Webserver geladen werden.

````
composer install
````

## Verwendung

Mit dem GET-Parameter "source" können beliebig viele Quellen definiert werden, die vorher in der Datenbank hinterlegt werden müssen. Mittels dieser Variablen ist eine Unterscheidung zwischen den verschiedenen Links möglich. 

Beispiel: Es sollen zwei Links evaluiert werden, einer auf der Website, einer auf IServ. Auf der Website wird der Link "[URL]?source=website", auf IServ der Link "[URL]?source=iserv" hinterlegt. Beide Links leiten umgehend auf das normale iPad-FAQ; zählen jedoch auch die Aufrufe.

Die Ergebnisse können nach Eingabe eines Passwords, das in der .htpasswd-Datei in Hash-Form (Erstellung mit geeignetem Generator, [Beispiel](https://www.entwicklertools.de/tools/htaccess/htpasswd-generator/?tx_naderiostools_htpasswdgen%5Baction%5D=generator&tx_naderiostools_htpasswdgen%5Bcontroller%5D=Htpasswd&cHash=5f8e55738ba53e0fefa5d7455848b01a)) hinterlegt ist, unter dem Link "[URL]/config" abgerufen werden.

## Datenbank

Es ist eine eigene Tabelle namens "statistics" erforderlich. Diese beinhaltet drei Spalten:

- name (VARCHAR): Dies ist der Name, der als source im GET-Parameter verwendet wird.
- description (VARCHAR): Diese wird als lesbarer Name in den Ergebnissen angezeigt.
- views (INT): Hier werden die Aufrufe gespeichert.

Diese Tabelle muss vorher manuell erstellt werden. Die Datenbank-Zugangsdaten sind in der constants.php zu hinterlegen.

Zum Hinzufügen eines neuen Links muss ein neuer Eintrag in dieser Tabelle mit views=0 hinzugefügt werden.

Copyright by Jan Harms © 2024

Lizenz: Mozilla Public License 2.0 (MPL 2.0) - s. LICENSE-Datei