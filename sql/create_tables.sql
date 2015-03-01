CREATE TABLE Kayttaja(
nimimerkki varchar(20) PRIMARY KEY,
email varchar(320),
salasana varchar(20)
);

CREATE TABLE Resepti(
tunnus SERIAL PRIMARY KEY,
nimi varchar(50) NOT NULL,
valmistusohje varchar,
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