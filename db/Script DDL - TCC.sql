CREATE DATABASE tcc;
USE tcc;

CREATE TABLE tbProduto(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Imagem VARCHAR(100),
    Modelo VARCHAR(100) NOT NULL,
    Descricao VARCHAR(350),
    Valor DOUBLE NOT NULL,
    Qntd_Estoque INT NOT NULL,
    Status VARCHAR(20),
);

CREATE TABLE tbCliente(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    CPF VARCHAR(14) UNIQUE,
    Telefone VARCHAR(15),
    Email VARCHAR(100),
    Senha VARCHAR(255),
    Logradouro VARCHAR(45),
    Numero VARCHAR(10),
    Bairro VARCHAR(100),
    Cidade VARCHAR(100),
    Complemento VARCHAR(100),
    CEP VARCHAR(10),
    Estado VARCHAR(2),
    Status VARCHAR(20)
);

CREATE TABLE tbFuncionario(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Nome VARCHAR(100) NOT NULL,
    CPF VARCHAR(14) UNIQUE,
    Telefone VARCHAR(15),
    Email VARCHAR(100),
    Senha VARCHAR(255),
    Logradouro VARCHAR(45),
    Numero VARCHAR(10),
    Bairro VARCHAR(100),
    Cidade VARCHAR(100),
    Complemento VARCHAR(100),
    CEP VARCHAR(10),
    Estado VARCHAR(2),
    Status VARCHAR(20)
);

CREATE TABLE tbVenda(
    Codigo INT AUTO_INCREMENT PRIMARY KEY,
    Data DATE,
    Valor_Total DOUBLE,
    Status VARCHAR(20),
    tbCliente_Codigo INT NOT NULL,
    FormaRecebimento VARCHAR(50) NOT NULL,

    FOREIGN KEY(tbCliente_Codigo) REFERENCES tbCliente(Codigo),
);

CREATE TABLE tbVenda_Produto(
    tbProduto_Codigo INT,
    tbVenda_Codigo INT,
    Qtd_Produto INT,
    Valor_Unitario DOUBLE,
    Valor_Total DOUBLE,

    PRIMARY KEY(tbProduto_Codigo, tbVenda_Codigo),

    FOREIGN KEY(tbProduto_Codigo) REFERENCES tbProduto(Codigo),
    FOREIGN KEY(tbVenda_Codigo) REFERENCES tbVenda(Codigo)
);
