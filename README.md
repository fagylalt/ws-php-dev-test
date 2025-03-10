# ws-php-dev-test  

## Feladatkiírás

Az inicializálás után a 3db adatbázis tábla tartalmazza egy [WHMCS](https://www.whmcs.com/) rendszer ügyfél és a hozzátartozó felhasználói fiók adatait. Ezek az adatok migrálásra kerülnek egy másik, ugyanúgy már éles, jelenleg is aktív WHMCS rendszerbe. A feladat egy olyan megoldás implementálása, mely előkészíti a `schemaA` adatokat a `schemaB` struktúrába való migráláshoz, adatütközés és adatvesztés nélkül. A migrációs folyamat implementálása most nem cél.

## Init

- `data/schemaA.sql` és `data/schemaB.sql` file-ok tartalmazzák az adatstruktúrákat
- faker használata nem kötelező, a feladat megoldható a struktúra adatokkal való feltöltése nélkül is
- package manager használata javasolt
- [WHMCS 8](https://www.whmcs.com/) kompatibils env és ORM használata (mivel a WHMCS license köteles, ezért csak az ORM használatára van szükség)

## Követelmények

- [ ] a későbbi migrációs táblákra való kibővíthetőség miatt szempont a rekurzív feladatok külön file-ba kiszervezése, de az egyes táblákhoz a WHMCS-ben már létrehoztak [Internal Class](https://classdocs.whmcs.com/8.12/index.html)-okat melyekből származtatnánk a migrálandó táblákoz kapcsolodó osztályokat, ezért kerülni kell az absztrakt és/vagy leszármaztott osztályokat
- [ ] mivel a migrálandó táblákoz tartozó class-ok esetén ragaszkodni kell az elfogadott desing pattern betartásához, ezért a class iránti elvárásokat külön file-ban kell definiálni

## Benyújtás

- [ ] `src/` mappába kerüljenek a source file-ok
- [ ] a `php migration_prepare.php` file hívásával legyen futtatható az implementáció
- [ ] külön dokumentáció készítésére nincs szükség, az elkészült kódot elég annotáció szintjén dokumentálni

## Q & A  

- Milyen IDE-t, tool-t használtál a megoldáshoz?
- Honnan szerezted be az esetleges hiányzó infót?
- Körülbelül mennyi időre volt szükség a megoldáshoz?
- Találkoztál olyan fogalommal, megoldással a feladat implementálása közben, ami eddigi karriered során nem jelent meg? Mi volt az?
- Volt olyan rész, ami nehézséget okozott? Miért?
