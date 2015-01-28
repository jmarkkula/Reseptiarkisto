CREATE TABLE Kayttaja(
nimimerkki varchar(20) PRIMARY KEY,
email varchar(320)
);

CREATE TABLE Resepti(
tunnus SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL,
valmistusohje varchar NOT NULL,
lisaaja varchar(20) REFERENCES Kayttaja(nimimerkki)
);

CREATE TABLE Raakaaine(
nimi varchar(20) PRIMARY KEY,
kuvaus varchar
);

CREATE TABLE Ainesosa(
raakaaine varchar(20) NOT NULL REFERENCES Raakaaine(nimi),
maara varchar NOT NULL,
reseptitunnus integer NOT NULL REFERENCES Resepti(tunnus),
PRIMARY KEY (raakaaine, maara, reseptitunnus)
);


CREATE TABLE Kategoria(
nimi varchar NOT NULL,
reseptitunnus integer NOT NULL REFERENCES Resepti(tunnus),
PRIMARY KEY (nimi, reseptitunnus)
);

CREATE TABLE Suosikkiresepti(
reseptitunnus integer NOT NULL REFERENCES Resepti(tunnus),
kayttaja varchar(20) NOT NULL REFERENCES Kayttaja(nimimerkki),
PRIMARY KEY (reseptitunnus, kayttaja)

);