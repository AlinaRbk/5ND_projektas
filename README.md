# 5ND_projektas

1. Sukurti naują Laravel projektą.
2. Įtraukti autentifikacijos modulį.
3. Sukurti modelį TaskStatus:
   id
   title(string)
4. Sukurti modelį Task:
   id
   title(string)
   description(longText)
   status_id(unsignedBigInteger)
5. Sukurtį modelį PaginationSetting:
   id
   title(string)
   value(bigInteger)
   visible(tinyInteger)
6. Sudaryti ryšį Task.status_id -> TaskStatus.id
7. Sukurti 3 TaskStatus seeder dokumente:
   id    title    
   1     Completed
   2     On Hold
   3     Started
8. Sukurti 200 netikrų Task
9. PaginationSetting užpildyti tokiais duomenimis:
   id     title    value    visible
   1       15        15        1
   2       20        20        0
   3       30        30        1
   4       All       1         1

10. Sukurti tik Task index.blade.php. Jame sukurti formą, kurioje galima pasirinkti rikiavimo stulpelį, rikiavimo tvarką,
filtruoti pagal užduoties statusą ir pasirinkti, kiek įrašų rodyti per puslapį.(Tokia pati forma, kokią sukūrėme paskaitų metu)

P.S Visų CRUD operacijų kurti nereikia, reikalingas tik Task index.blade.php dokumentas    
