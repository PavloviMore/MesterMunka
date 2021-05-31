
#insert

# adatbázis készités

#tábla készités

#adatok 

#tesztadatok

#táblák törlése
delete FROM kosar;
delete FROM vasarlo;
delete FROM termek;
delete from mertekegyseg;
delete FROM markak;
delete FROM harmadlagoskategoria;
delete FROM masodlagoskategoria;
delete FROM fokategoria;

INSERT INTO mertekegyseg VALUES
  (1,'db'),
  (2,'L'),
  (3,'raklap');

INSERT INTO fokategoria VALUES
  (1,'Háztartási gépek'),
  (2,'Számitéstechnika'),
  (3,'játékok');

INSERT INTO masodlagoskategoria VALUES
  (1,1,'Mosogépek'),
  (2,1,'Hûtõk'),
  (3,2,'PC alkatrészek'),
  (4,2,'Perifériák'),
  (5,3,'Kültéri'),
  (6,3,'Szerep');

INSERT INTO harmadlagoskategoria VALUES
(1,1,'Mosogép'),
(2,2,'Borhûtõ'),
(3,3,'SSD'),
(4,3,'Alaplapok'),
(5,4,'Egerek'),
(6,4,'Billenytûzet'),
(7,5,'Csúszdák'),
(8,5,'Hinták'),
(9,6,'Gyerekkonyhák'),
(10,6,'Interaktív és plüss játékok');

INSERT INTO markak VALUES
(1,'Kingstone'),
(2,'Yankee'),
(3,'TM Toys'),
(4,'Whirepool'),
(5,'Silverlit'),
(6,'Navon'),
(7,'MSI'),
(8,'Samsung'),
(9,'Logitech'),
(10,'Hyundai'),
(11,'White Shark'),
(12,'Trust'),
(13,'Dohany'),
(14,'Smoby Tefal'),
(15,'ROG STRIX'),
(16,'Stahlman'),
(17,'Nincs');

INSERT INTO termek VALUES
(1,'Lorem 3 személyses Hinta',15000,'lorem lipsum',8,27,1,1,'foto',17),
(2,'500 GB Kingstone',7000,'lorem lipsum',3,27,1,1,'foto',1),
(3,'Yankee DH-30',4500,'lorem lipsum',5,27,1,1,'foto',2),
(4,'TM Toys - Bianca interaktív plüss cica',3000,'lorem lipsum',10,27,1,1,'foto',3),
(5,'Silverlit Robomancs, Az Okoskutya',5500,'lorem lipsum',10,27,1,1,'foto',5),
(6,'Whirlpool FWSG61283BV EE Elöltöltõs keskeny mosógép, 6 kg, 1200 ford/perc',96990,'lorem lipsum',1,27,1,1,'foto',4),
(7,'Navon WPR 610 AA elöltöltõs mosógép, 6kg, 1000 fordulat/perc, LED kijelzõ',120000,'lorem lipsum',1,27,1,1,'foto',6),
(8,'Hyundai HYUVIN12B',32000,'lorem lipsum',2,27,1,1,'foto',10),
(9,'Stahlman ST-306',37500,'lorem lipsum',2,27,1,1,'foto',16),
(10,'ROG STRIX B450-F GAMING AMD B450',48000,'lorem lipsum',4,27,1,1,'foto',15),
(11,'MSI X470 GAMING PLUS MAX',35000,'lorem lipsum',4,27,1,1,'foto',7),
(12,'Samsung 870 EVO',14000,'lorem lipsum',3,27,1,1,'foto',8),
(13,'Logitech G102 Lightsync',9000,'lorem lipsum',4,27,1,1,'foto',9),
(14,'White Shark SPARTAN',15000,'lorem lipsum',6,27,1,1,'foto',11),
(15,'Trust 23089 GXT 865 Asta',17000,'lorem lipsum',6,27,1,1,'foto',12),
(16,'Dohany Gyerek csúszda, 180 cm',25000,'lorem lipsum',7,27,1,1,'foto',13),
(17,'Kerti mûanyag csúszda - kapaszkodóval',20000,'lorem lipsum',7,27,1,1,'foto',17),  
(18,'Csónak alakú fészekhinta',17000,'lorem lipsum',8,27,1,1,'foto',17),
(19,'Smoby Tefal Mikrohullámú sütõ',6000,'lorem lipsum',8,27,1,1,'foto',14),
(20,'Timeless Tools Függõszék párnával',12000,'lorem lipsum',8,27,1,1,'foto',17);

#vásárlók
INSERT into vasarlo VALUES
  (1,'Nagy','Márton','Kolzsnai út 8.',3360,'fasztudja','nagy.marton@gmail.com','06302155448','facebook123');

#kosár
INSERT into kosar VALUES
  (1,2,1,1,1,1,'2020-3-9');

call adatokGenerate();

#Táblák lekérdezése
select * from termek;
select * from kosar;
select * from mertekegyseg;
select * from vasarlo;
select * from markak;
select * from tulajdonsagok;
select * from fokategoria;
select * from masodlagoskategoria;
select * from harmadlagoskategoria;

#lekérdezések-----------------

#mertekegysegTabla
select * from mertekegyseg;

#markakTabla
select * from markak;

#vasarloTabla
select * from vasarlo;

#harmadlagosKategoriaTabla
select * from harmadlagoskategoria h
inner join masodlagoskategoria m on h.masodlagoskategoriaID = m.id;

#masodlagoskategoriaTabla
select * from masodlagoskategoria m
inner join fokategoria f on m.foKategoriaID = f.id;

#foKategoriaTabla
select * from fokategoria;

#kosarTabla
select k.id,k.termekID,t.termekNev as termekNev,v.id,
v.vasarloNev as vasarloNev,k.mertekEgysegID,k.datum from kosar k 
inner join vasarlo v on k.vasarlasID = v.id
inner join termek t on k.termekID = t.id;

#termekekTabla
select * from termek t
inner join mertekegyseg me on t.mertekegysegID = me.id
inner join harmadlagoskategoria h on t.kategoria = h.id
inner join markak m on t.markaID = m.id;


#mertekegysegABC
select id,egyseg from mertekegyseg ORDER BY egyseg;

#markaABC 
select id,marka from markak ORDER BY marka;

#termekABC termekNev-id
select id,termekNev from termek ORDER BY termekNev;

#harmadlagosKategoriaABC
select id,harmadlagosKategoriaNev from harmadlagoskategoria ORDER BY harmadlagosKategoriaNev;

#masodlagosKategoriaABC
select id,masodlagosKategoriaNev from masodlagoskategoria ORDER BY masodlagosKategoriaNev;

#foKategoriaABC
select id,foKategoriaNev from fokategoria ORDER BY foKategoriaNev;

#statisztika----------------------------------
#arbevetel
#AFABevalas
#legkeresetebbTermekek


#szürés-------------------------------

#termekNevalapuKerese
-- select * from termek t
-- where termekNev like '%%' and
--       egysegArNetto < 10000 and
--       markaID = 1;

#TermekekRecordByFilter
select * from termek t
where termekNev like '%Y%' and
if(0 > 0,egysegArNetto < 0, true) and
if(2 > 0, markaID = 2, TRUE);

select * from termek t
inner join harmadlagoskategoria h on t.kategoria = h.id
inner join masodlagoskategoria m on h.masodlagoskategoriaID = m.id
if(0 > 0,egysegArNetto < 0, true) and
if(2 > 0, markaID = 0, TRUE);

select * from vasarlo;

#markaIDAlapuSzures
select * from markak
  where id = 1;


#törlések ---------------------------------
#mertekegysegDeleteById
delete from mertekegyseg where id = 1;

#markakDeleteByID
delete from markak where id = 1;

#termekekDeletebyID
delete from termek where id = 1;

#harmadlagosKategoriaDeleteByID
delete from harmadlagoskategoria where id = 1;

#masodlagosKategoriaDeleteByID
delete from masodlagoskategoria where id = 1;

#foKategoriaDeleteByID
delete from fokategoria where id = 1;

#vasarloDeleteByID
delete from vasarlo where id = 1;

delete from harmadlagoskategoria where id = 11;


#Módositás

#mertekegysegUpdateByID
update mertekegyseg set egyseg = 'méter' where id = 1;

#termekNevUpdatebyID
update termek set termekNev = 'bármilyen nev' where id = 1;

#TermékUpdate
  UPDATE termek SET
              termekNev = 'TesztTermékUpdate',
              egysegArNetto = 1125,
              leiras = 'leiras_teszt',
              kategoria = 5,
              AFA = 25,
              mertekegysegID = 1,
              raktarKeszlet = 3,
              foto = 'FotoTeszt',
              markaID = 1
              WHERE id = 23;

UPDATE termek SET
                termekNev = 'HatlamasVálstozás',
                egysegArNetto = 1123,
                leiras = 'leiras_teszt',
                kategoria = 5,
                AFA = 26,
                mertekegysegID = 1,
                raktarKeszlet = 3,
                foto = 'foto',
                markaID = 1
                WHERE id = 23;
#
UPDATE fokategoria SET
            foKategoriaNev = 'HatlamasVálstozás'
            WHERE id = 9;

UPDATE masodlagoskategoria SET
            foKategoriaID = 1,
            masodlagosKategoriaNev = 'Masodlagoskategoria_update_teszt'
            WHERE id = 9;

#....

select * from termek;
select * from kosar;
select * from mertekegyseg;
select * from vasarlo;
select * from markak;
select * from tulajdonsagok;
select * from fokategoria;
select * from masodlagoskategoria;
select * from harmadlagoskategoria;


delete from fokategoria where id = 10;


#Hozzáfûzés
#mertekegysegInsert
INSERT mertekegyseg 
  (egyseg)
  VALUES
  ('méter');

INSERT masodlagoskategoria 
  (foKategoriaID,masodlagosKategoriaNev)
  VALUES
  (2,'probaKategoria');


INSERT markak 
  (marka)
  VALUES
  ('tesztMarka');

#termékINSERT
INSERT INTO termek 
  (termekNev,egysegArNetto,leiras,kategoria,AFA,mertekegysegID,raktarKeszlet,foto,markaID)
  VALUES
('ProbaTermék',15000,'lorem lipsum',8,27,1,1,'foto',17);

#tulajdonsagInsert
INSERT INTO tulajdonsagok 
  (szekhely,utca,varos,zip,AFA,telefon,email,facebook,adoszam)
VALUES
  ('2766 Tápiószele, Alkotás út 8.','Alkotás út','Tápiószele','2766',0.27,'06202131880','thoma.krisztian.03@gmail.com','www.facebook.com','0123456789');

#vasárlóInsert
INSERT INTO vasarlo 
  (vezetekNev,keresztNev,utca,zip,varos,email,telefon,jelszo)
  VALUES
('Tatár','Tamás','liliom_ut_1','5584','Veszprém','tatar.tamas@citromail.hu','06202131156','faszbook284');


#....

select * from vasarlo ;
where Concat(vezetekNev,' ',keresztNev)  = 'Nagy Márton'; 
 



