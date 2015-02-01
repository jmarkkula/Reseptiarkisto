
-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (nimimerkki, email) VALUES ('niku', 'niku@on.best');
INSERT INTO Kayttaja (nimimerkki, email) VALUES ('juli', 'juli@on.kans');

-- Resepti-taulun testidata
INSERT INTO Resepti (nimi, valmistusohje, lisaaja) VALUES ('Pasta Carbonaran kastike', 'Paista pekoni ja valkosipuli, lisää kerma.', 'niku');

-- Raakaaine-taulun testidata
INSERT INTO Raakaaine (nimi, kuvaus) VALUES ('Pekoni', 'Mmmm.');
INSERT INTO Raakaaine (nimi, kuvaus) VALUES ('Kerma', 'Rasvainen maitotuote.');
INSERT INTO Raakaaine (nimi) VALUES ('Valkosipuli');

-- Ainesosa-taulun testidata
INSERT INTO Ainesosa (raakaaine, maara, reseptitunnus) VALUES ('Pekoni', '500g', 1);
INSERT INTO Ainesosa (raakaaine, maara, reseptitunnus) VALUES ('Kerma', '2 dl', 1);
INSERT INTO Ainesosa (raakaaine, maara, reseptitunnus) VALUES ('Valkosipuli', '4 kynttä', 1);

-- Kategoria-taulun testidata
INSERT INTO Kategoria (nimi, reseptitunnus) VALUES ('herkut', 1);

-- Suosikkiresepti-taulun testidata
INSERT INTO Suosikkiresepti (reseptitunnus, kayttaja) VALUES (1, 'juli');