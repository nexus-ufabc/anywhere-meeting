CREATE TABLE IF NOT EXISTS Usuarios
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 Email varchar(255) NOT NULL,
 Senha varchar(255) NOT NULL,
 CPF varchar(255) NOT NULL,
 DataCadastro DATETIME NOT NULL,
 Logado int NOT NULL
 );

CREATE TABLE IF NOT EXISTS Professores
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 IdUsuario int NOT NULL, 
 Instituicao varchar(255) NOT NULL,
 Url varchar(255) NOT NULL,
 AreaAtuacao varchar(255) NOT NULL,
 FOREIGN KEY (IdUsuario) REFERENCES Usuarios (Id) ON DELETE CASCADE
 );

CREATE TABLE IF NOT EXISTS Alunos
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 IdUsuario int NOT NULL, 
 NumeroRegistro varchar(255) NOT NULL,
 NivelEscolaridade varchar(255) NOT NULL,
 FOREIGN KEY (IdUsuario) REFERENCES Usuarios (Id) ON DELETE CASCADE
 );

CREATE TABLE IF NOT EXISTS Aulas
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 IdProfessor int NOT NULL,
 Codigo varchar(255) NOT NULL UNIQUE,
 Data DATETIME NOT NULL,
 Descricao varchar(255) NOT NULL,
 Transcript text NULL,
 FOREIGN KEY (IdProfessor) REFERENCES Professores (Id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS AlunosAulas
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 IdAluno int NOT NULL,
 IdAula int NOT NULL,
 Ativo int NOT NULL,
 FOREIGN KEY (IdAluno) REFERENCES Alunos (Id) ON DELETE CASCADE,
 FOREIGN KEY (IdAula) REFERENCES Aulas (Id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Arquivos
(
 Id int PRIMARY KEY AUTO_INCREMENT,
 IdUsuario int NOT NULL,
 IdAula int NOT NULL,
 Descricao varchar(255) NOT NULL,
 DataCadastro DATETIME NOT NULL,
 Ativo int NOT NULL,
 FOREIGN KEY (IdUsuario) REFERENCES Usuarios (Id) ON DELETE CASCADE,
 FOREIGN KEY (IdAula) REFERENCES Aulas (Id) ON DELETE CASCADE
);

