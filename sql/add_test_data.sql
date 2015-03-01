
-- Kayttaja-taulun testidata
INSERT INTO Kayttaja (nimimerkki, email, salasana) VALUES ('niku', 'niku@on.best', 'marsu');
INSERT INTO Kayttaja (nimimerkki, email, salasana) VALUES ('juli', 'juli@on.kans', 'marus');

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
