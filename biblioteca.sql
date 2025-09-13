-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12-Set-2025 às 23:36
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `endereco`, `cidade`, `estado`, `telefone`, `status`) VALUES
(2, 'hiago', 'teste', 'teste', 'teste', 47984750013, 's'),
(3, 'hiago', 'hiago', 'hiago', 'hiago', 544665546, 's'),
(4, 'Gabrieli', 'Rua teste', 'Penha', 'Santa Catarina', 654654645, 's');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `dataAdmissao` date NOT NULL,
  `dataDemissao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nome`, `endereco`, `cidade`, `estado`, `telefone`, `cargo`, `dataAdmissao`, `dataDemissao`) VALUES
(1, 'Funcionario1', 'Rua teste', 'Itajai', 'Santa Catarina', 47999999999, 'Atendente', '2020-08-01', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `idLivro` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `ano` int(4) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `editora` varchar(45) NOT NULL,
  `paginas` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `nomeFuncionario` varchar(45) NOT NULL,
  `idFuncionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`idLivro`, `nome`, `autor`, `ano`, `genero`, `editora`, `paginas`, `status`, `nomeFuncionario`, `idFuncionario`) VALUES
(1, 'livroTeste', 'autorTeste', 2015, 'Romance', 'editoraTeste', 311, 's', 'Funcionario1', 1),
(2, 'livroTeste2', 'autorTeste2', 1988, 'SCI-Fi', 'editoraTeste2', 3110, 's', 'Funcionario1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `retirada`
--

CREATE TABLE `retirada` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(45) NOT NULL,
  `idLivro` int(11) NOT NULL,
  `nomeLivro` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `retirada`
--

INSERT INTO `retirada` (`idCliente`, `nomeCliente`, `idLivro`, `nomeLivro`) VALUES
(2, 'hiago', 1, 'livroTeste'),
(4, 'Gabrieli', 1, 'livroTeste'),
(4, 'Gabrieli', 2, 'livroTeste2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`idLivro`),
  ADD KEY `fk_idFuncionario` (`idFuncionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `livro`
--
ALTER TABLE `livro`
  MODIFY `idLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `livro`
--
ALTER TABLE `livro`
  ADD CONSTRAINT `fk_idFuncionario` FOREIGN KEY (`idFuncionario`) REFERENCES `funcionario` (`idFuncionario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
