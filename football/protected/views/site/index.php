<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Üdvözöljük a <i><?php echo CHtml::encode(Yii::app()->name); ?></i> applikációban!</h1>

<h2>Applikáció elvárások:</h2>

<p>Készíts egy egyszerű webes alkalmazást, mely képes futball játékosokat, klubokat és az átigazolások történetét tárolni. </p>

<p>A futball játékosokról tudni kell nevét, korát, nemzetiségét, aktuális klubját. A kluboknak ismerni kell a nevét, alapítási évét, és a hozzá tartozó játékosokat. Az átigazolási történet tartalmazza, hogy mely játékos, mikor, melyik klubból, melyik klubba igazol és mekkora összegért. (Mindezeket fiktív adatokkal feltöltve)</p>

<p>Az alkalmazásnak képesnek kell megjeleníteni, módosítani, és törölni a fenti adatokat, ügyelve arra, hogy az adatbázis konzisztenciája megmaradjon, és bevitelkor a mezők validálása megtörténjen!</p>

<p>A kritikusabb műveletek (modellek) legyenek egységtesztekkel lefedve! (Yii esetén + fixture-ök)</p>

<p>Az alkalmazást és a hozzá tartozó adatbázis sémát (adatokkal feltöltve, vagy fixture-ökkel) töltsd fel egy GitHub repository-ba és küld át a repository elérhetőségét!</p>

<p>Yii használat esetén, az adatbázis séma migrációs scriptekkel fel-, és leépíthető legyen!</p>

<h2>Megvalósítás:</h2>

<p>Az alkalmazást admin/admin felhasználó/jelszó párral használhatjuk.</p>

<p>A 'Futball játokosok' fül alatt megtekinthetjük a játékosok listáját, nemzetiségüket, aktuális klubjukat, korukat, illetve bejegyzéseik dátumait.</p>

<p>Új játékosokat tudunk hozzáadni a rendszerhez, szerkezthetjük az adataikat, illetve törölhetjük őket.</p>

<p>A 'Klubok' fül alatt megtekinthetjük a klubok litáját, alapítási dátumaikat, illetve bejegyzéseik dátumait.</p>

<p>Létezik egy 'Szabadúszó' alapértelmezett klub, amit hozzárendelhetünk egy játékoshoz, ha nincsen klubja.</p>

<p>Egy kiválasztott klub megtekintésére kattintva kezelhetjük a klub adatait illetve játékos listáját.</p>

<p>Törölhetünk játékosokat klubból, illetve adhatunk újakat hozzá. Ilyenkor új átigazolások kerülnek bejegyzésre</p>

<p>Átigazolásokat nem hozhatunk létre illetve szerkeszthetünk, mivel erre megvan az átigazolási módszer a kluboknál.</p>

<p>A játékosok, klubok, átigazolások listái szűrhetőek a megfelelő oszlopoknál beírva a szűrési feltételeket.</p>

<p>Adatbázis elérhetőségét a config file-ban módosíthatjuk. Adatsémák feltöltése migráló fájlokban található.</p>

<p>Adatbázis feltöltése fixture-ök segítségével történhet, illetve manuális felvétellel.</p>

<p>Unit tesztek elérhetőek a modellekhez. A teszteket érdemes a program használata előtt futtatni, mivel a fixture-ök a tesztek folyamán töltik fel az éles adatbázist.
Ilyenkor az adatbázist üríti, mielőtt a fixture-ök lefutnak.</p>

<p>Fontos validációk testreszabva, csak magyarítva nincs (de szerintem most ez nem lényeges).</p>