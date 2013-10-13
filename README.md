Soccer
======
Megvalósítás:</h2>

Az alkalmazást admin/admin felhasználó/jelszó párral használhatjuk.</p>

A 'Futball játokosok' fül alatt megtekinthetjük a játékosok listáját, nemzetiségüket, aktuális klubjukat, korukat, illetve bejegyzéseik dátumait.

Új játékosokat tudunk hozzáadni a rendszerhez, szerkezthetjük az adataikat, illetve törölhetjük őket.

A 'Klubok' fül alatt megtekinthetjük a klubok litáját, alapítási dátumaikat, illetve bejegyzéseik dátumait.

Létezik egy 'Szabadúszó' alapértelmezett klub, amit hozzárendelhetünk egy játékoshoz, ha nincsen klubja.

Egy kiválasztott klub megtekintésére kattintva kezelhetjük a klub adatait illetve játékos listáját.

Törölhetünk játékosokat klubból, illetve adhatunk újakat hozzá. Ilyenkor új átigazolások kerülnek bejegyzésre

Átigazolásokat nem hozhatunk létre illetve szerkeszthetünk, mivel erre megvan az átigazolási módszer a kluboknál.

A játékosok, klubok, átigazolások listái szűrhetőek a megfelelő oszlopoknál beírva a szűrési feltételeket.

Adatbázis elérhetőségét a config file-ban módosíthatjuk. Adatsémák feltöltése migráló fájlokban található.

Adatbázis feltöltése fixture-ök segítségével történhet, illetve manuális felvétellel.

Unit tesztek elérhetőek a modellekhez. A teszteket érdemes a program használata előtt futtatni, mivel a fixture-ök a tesztek folyamán töltik fel az éles adatbázist.
Ilyenkor az adatbázist üríti, mielőtt a fixture-ök lefutnak.

Fontos validációk testreszabva, csak magyarítva nincs (de szerintem most ez nem lényeges).
