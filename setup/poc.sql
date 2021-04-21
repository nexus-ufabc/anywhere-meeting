INSERT INTO Usuarios(Email, Senha, CPF, DataCadastro, Logado) VALUES ("professorpaulo@email.com", "1234", "999.99.999-99", NOW(), 0);
INSERT INTO Usuarios(Email, Senha, CPF, DataCadastro, Logado) VALUES ("alunopedro@email.com", "5678", "999.99.999-99", NOW(), 0);

INSERT INTO Professores(IdUsuario, Instituicao, Url, AreaAtuacao) VALUES (1, "UFABC", "https://github.com/professorpaulo", "Ciencia da Computacao");

INSERT INTO Alunos(IdUsuario, NumeroRegistro, NivelEscolaridade) VALUES (2, "RA 999999", "Superior completo");