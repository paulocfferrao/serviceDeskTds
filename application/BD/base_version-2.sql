
CREATE TABLE tipo_objeto (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE objeto (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                descricao VARCHAR(300) NOT NULL,
                idTipoObjeto INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE usuario (
                id INT AUTO_INCREMENT NOT NULL,
                email VARCHAR(100) NOT NULL,
                senha VARCHAR(32) NOT NULL,
                permissao VARCHAR(1) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE estado (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                uf VARCHAR(2) NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE cidade (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(150) NOT NULL,
                idestado INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE INDEX estado_cidade_fk USING BTREE
 ON cidade
 ( idestado ASC );

CREATE TABLE pessoa (
                id INT AUTO_INCREMENT NOT NULL,
                nome VARCHAR(100) NOT NULL,
                idade INT NOT NULL,
                endereco VARCHAR(250) NOT NULL,
                idcidade INT NOT NULL,
                PRIMARY KEY (id)
);


CREATE TABLE emprestimo (
                id INT AUTO_INCREMENT NOT NULL,
                data_emprestimo DATE NOT NULL,
                data_devolucao DATE,
                status BOOLEAN NOT NULL,
                idpessoa INT NOT NULL,
                idobjeto INT NOT NULL,
                PRIMARY KEY (id)
);


ALTER TABLE objeto ADD CONSTRAINT tipo_objeto_objeto_fk
FOREIGN KEY (idTipoObjeto)
REFERENCES tipo_objeto (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE emprestimo ADD CONSTRAINT objeto_emprestimo_fk
FOREIGN KEY (idobjeto)
REFERENCES objeto (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE cidade ADD CONSTRAINT estado_cidade_fk
FOREIGN KEY (idestado)
REFERENCES estado (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE pessoa ADD CONSTRAINT cidade_pessoa_fk
FOREIGN KEY (idcidade)
REFERENCES cidade (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

ALTER TABLE emprestimo ADD CONSTRAINT pessoa_emprestimo_fk
FOREIGN KEY (idpessoa)
REFERENCES pessoa (id)
ON DELETE NO ACTION
ON UPDATE NO ACTION;

INSERT INTO `usuario` (`id`, `email`, `senha`, `permissao`) VALUES
(2, 'teste@teste.com.br', '698dc19d489c4e4db73e28a713eab07b', 'P');
INSERT INTO `tipo_objeto` (`id`, `nome`) VALUES (NULL, 'Livro'), (NULL, 'Disco Vinil');


ALTER TABLE emprestimo MODIFY COLUMN status BOOLEAN NOT NULL;
ALTER TABLE objeto ADD COLUMN emprestado BOOLEAN DEFAULT false NOT NULL AFTER idTipoObjeto;
