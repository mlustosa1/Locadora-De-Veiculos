-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jun-2020 às 22:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `locadora_veiculos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `cli_id` int(9) NOT NULL,
  `cli_nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cli_cpf` int(15) DEFAULT NULL,
  `cli_endereco` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cli_id`, `cli_nome`, `cli_cpf`, `cli_endereco`) VALUES
(2, 'Geraldo Jose Alterado', 7185888, 'Rua David Jarawan, 31, Bussocaba City, Osasco, SP  ALTERADO'),
(5, 'Raimunda Ferreira Lustosa Rodrigues', 88899990, 'Av. João Paulo II, 180 BL 7 Apto 2, São Pedro, Osasco, SP'),
(7, 'Raimunda Ferreira Lustosa Rodrigues', 88899990, 'Av. João Paulo II, 180 BL 7 Apto 2, São Pedro, Osasco, SP'),
(9, 'Jeovandro da Silva moraes', 776776888, 'Carapicuiba'),
(10, 'Maria da silva moraes', 999999999, 'Barueri');

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `loc_codigo` int(11) NOT NULL,
  `loc_cpf_cli` int(11) NOT NULL,
  `loc_placa_veiculo` varchar(7) NOT NULL,
  `loc_data_inicio` datetime NOT NULL,
  `loc_data_termino` datetime NOT NULL,
  `loc_status_locacao` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `locacao`
--

INSERT INTO `locacao` (`loc_codigo`, `loc_cpf_cli`, `loc_placa_veiculo`, `loc_data_inicio`, `loc_data_termino`, `loc_status_locacao`) VALUES
(1, 7185888, 'AAA9999', '2020-06-10 17:10:18', '2020-06-10 17:13:36', 'alugado'),
(2, 88899990, 'ZZZ8888', '2020-06-10 17:10:18', '2020-06-18 17:15:20', 'alugado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `veic_placa` varchar(7) NOT NULL,
  `veic_modelo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `veic_ano` int(4) NOT NULL,
  `veic_cor` varchar(30) CHARACTER SET utf8 NOT NULL,
  `veic_preco_diaria` decimal(5,2) NOT NULL,
  `veic_status_aluguel` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`veic_placa`, `veic_modelo`, `veic_ano`, `veic_cor`, `veic_preco_diaria`, `veic_status_aluguel`) VALUES
('AAA9999', 'HB20', 2015, 'AZUL', '200.00', 'D'),
('ZZZ8888', 'HB20', 2015, 'AZUL', '200.00', 'D');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `cli_cpf` (`cli_cpf`);

--
-- Índices para tabela `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`loc_codigo`),
  ADD KEY `fk_cpf_cli` (`loc_cpf_cli`),
  ADD KEY `fk_placa_veiculo` (`loc_placa_veiculo`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`veic_placa`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `locacao`
--
ALTER TABLE `locacao`
  ADD CONSTRAINT `fk_cpf_cli` FOREIGN KEY (`loc_cpf_cli`) REFERENCES `clientes` (`cli_cpf`),
  ADD CONSTRAINT `fk_placa_veiculo` FOREIGN KEY (`loc_placa_veiculo`) REFERENCES `veiculos` (`veic_placa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
