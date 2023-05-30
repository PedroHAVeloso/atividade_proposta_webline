CREATE DATABASE if NOT EXISTS webline;

USE webline;

CREATE TABLE if NOT EXISTS automoveis(
	codigo INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(155),
	placa CHAR(7) UNIQUE,
	chassi CHAR(17) UNIQUE,
	
	montadora INT
);

CREATE TABLE if NOT EXISTS montadora(
	codigo INT PRIMARY KEY AUTO_INCREMENT,
	nome VARCHAR(155)
);

ALTER TABLE automoveis 
	ADD CONSTRAINT fk_automoveis_montadora
	FOREIGN KEY (montadora) 
	REFERENCES montadora (codigo);

INSERT INTO montadora(
	nome
) VALUES 
	('BMW'),
	('Audi'),
	('Nissan'),
	('Chevrolet'),
	('Hyundai'),
	('Mercedes-Benz'),
	('Toyota'),
	('Valtra'),
	('Caterpillar'),
	('Honda'),
	('Suzuki'),
	('Iveco'),
	('Yamaha'),
	('Scania'),
	('Renault'),
	('DAF'),
	('Kawasaki');

INSERT INTO automoveis(
  nome, placa, chassi, montadora
) VALUES 
(
	'Classe G', 'ABC4567', '1234567890ABCDEF9',
	(
		SELECT codigo FROM montadora WHERE nome = 'Mercedes-Benz'
	)
),
(
	'Classe A', 'BCD1234', 'ABC4567890ABCDEF9',
	(
		SELECT codigo FROM montadora WHERE nome = 'Mercedes-Benz'
	)
),
(
	'Yaris', 'KKK1234', 'ABD4561890ABCDEF9',
	(
		SELECT codigo FROM montadora WHERE nome = 'Toyota'
	)
),
(
	'Corolla', 'XXX1234', 'ABD4561890ABCDE00',
	(
		SELECT codigo FROM montadora WHERE nome = 'Toyota'
	)
),
(	
	'X5', 'XKJ1234', 'ABD4561890ABCD111',
	(
		SELECT codigo FROM montadora WHERE nome = 'BMW'
	)
);