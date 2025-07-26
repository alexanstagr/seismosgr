## Seismosgr

Αυτό το project είναι ένας απλός PHP-based scraper που συλλέγει σε πραγματικό χρόνο δεδομένα σεισμών από δημόσιο website https://seismos.gr και τα επιστρέφει σε μορφή JSON μέσω ενός API endpoint.

O λόγος που το έφτιαξα είναι για να ενισχύσω τις γνώσεις μου στο DOM parsing και την PHP.



### Credits

Χρησιμοποίησα το ChatGPT για να μου δώσει το Regular expression εξαγωγής των elements απο το HTML.

```php
 $regxQry = "'//div[contains(@class,"list-group")]/a[contains(@class,"list-group-item")]'";

```
### Χαρακτηριστικά

- Αντλεί δεδομένα σεισμών από HTML
- Εξάγει:
  - Μέγεθος (ως string, π.χ. "5.3")
  - Ημερομηνία & Τοποθεσία
  - "Πριν από Χ λεπτά/ώρες"
  - Σύνδεσμο προς τη σελίδα λεπτομερειών
- UTF-8 υποστήριξη για σωστή εμφάνιση ελληνικών χαρακτήρων


### Απαιτήσεις

- έκδοση της PHP 7.4 ή νεότερη
- Ενεργοποιημένα `libxml` και `DOMDocument` extension στο php.ini


### Έρχονται Σύντομα

- Αποθήκευση σε SQLite / MongoDB.
- Custom **endpoint** φίλτρου μεγέθους πχ ?min=3.3&max=5.5
- Εξαγωγή σε GeoJSON μορφή.