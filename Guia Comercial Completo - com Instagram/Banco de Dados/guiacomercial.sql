-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 09-Dez-2019 às 11:14
-- Versão do servidor: 5.6.41-84.1
-- versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guiad946_guiacomercial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anunciantes`
--

CREATE TABLE `anunciantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `imagem_perfil` varchar(255) NOT NULL,
  `capa_perfil` varchar(255) NOT NULL,
  `telefone_ligar` varchar(255) NOT NULL,
  `telefone_whats` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `mapa` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `views` int(11) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `vai_para` varchar(255) NOT NULL,
  `alvo` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome_categoria` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `icone` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome_categoria`, `categoria`, `icone`) VALUES
(1, 'Academias', 'academias', '<i class=\"mdi mdi-arm-flex\"></i>'),
(5, 'Advogados', 'advogados', '<i class=\"mdi mdi-briefcase\"></i>'),
(4, 'Açougues', 'acougues', '<i class=\"mdi mdi-knife\"></i>'),
(6, 'Agências de Turismo', 'agencias-de-turismo', '<i class=\"mdi mdi-airplane-takeoff\"></i>'),
(7, 'Água e Gás', 'agua-e-gas', '<i class=\"mdi mdi-water\"></i>'),
(8, 'Aluguel de Carros', 'aluguel-de-carros', '<i class=\"mdi mdi-car-key\"></i>'),
(9, 'Aluguel de Equipamentos', 'aluguel-de-equipamentos', '<i class=\"mdi mdi-shovel\"></i>'),
(10, 'Arquitetos', 'arquitetos', '<i class=\"mdi mdi-home-edit\"></i>'),
(11, 'Artesanato', 'artesanato', '<i class=\"mdi mdi-scissors-cutting\"></i>'),
(12, 'Artes Marciais', 'artes-marciais', '<i class=\"mdi mdi-mixed-martial-arts\"></i>'),
(13, 'Artigos de Festa', 'artigos-de-festa', '<i class=\"mdi mdi-party-popper\"></i>'),
(14, 'Artigos para Bebê', 'artigos-para-bebe', '<i class=\"mdi mdi-baby-carriage\"></i>'),
(15, 'Auto Elétricas', 'auto-eletricas', '<i class=\"mdi mdi-car-battery\"></i>'),
(16, 'Auto Escolas', 'auto-escolas', '<i class=\"mdi mdi-car-info\"></i>'),
(17, 'Auto Peças', 'auto-pecas', '<i class=\"mdi mdi-tools\"></i>'),
(18, 'Barbearia', 'barbearia', '<i class=\"mdi mdi-face\"></i>'),
(19, 'Bares e Restaurantes', 'bares-e-restaurantes', '<i class=\"mdi mdi-glass-mug-variant\"></i>'),
(20, 'Beleza e Estética', 'beleza-e-estetica', '<i class=\"mdi mdi-hair-dryer\"></i>'),
(21, 'Bolsas e Acessórios', 'bolsas-e-acessorios', '<i class=\"mdi mdi-purse\"></i>'),
(22, 'Buffet', 'buffet', '<i class=\"mdi mdi-room-service\"></i>'),
(23, 'Cabeleireiros', 'cabeleireiros', '<i class=\"mdi mdi-content-cut\"></i>'),
(24, 'Cama Mesa e Banho', 'cama-mesa-e-banho', '<i class=\"mdi mdi-bed-king\"></i>'),
(25, 'Campo de Futebol', 'campo-de-futebol', '<i class=\"mdi mdi-soccer-field\"></i>'),
(31, 'Cartórios', 'cartorios', '<i class=\"mdi mdi-file-edit\"></i>'),
(32, 'Casa e Decoração', 'casa-e-decoracao', '<i class=\"mdi mdi-lamp\"></i>'),
(33, 'Churrascarias', 'churrascarias', '<i class=\"mdi mdi-cow\"></i>'),
(34, 'Clínicas e Laboratórios', 'clinicas-e-laboratorios', '<i class=\"mdi mdi-flask-empty\"></i>'),
(35, 'Colégios e Escolas', 'colegios-e-escolas', '<i class=\"mdi mdi-school\"></i>'),
(36, 'Contabilidade', 'contabilidade', '<i class=\"mdi mdi-counter\"></i>'),
(37, 'Consultorias', 'consultorias', '<i class=\"mdi mdi-account-tie\"></i>'),
(38, 'Dentistas', 'dentistas', '<i class=\"mdi mdi-tooth\"></i>'),
(39, 'Distribuidores', 'distribuidores', '<i class=\"mdi mdi-truck-delivery\"></i>'),
(40, 'Doces e Salgados', 'doces-e-salgados', '<i class=\"mdi mdi-ice-pop\"></i>'),
(41, 'Eletrônicas', 'eletronicas', '<i class=\"mdi mdi-chip\"></i>'),
(42, 'Encanadores', 'encanadores', '<i class=\"mdi mdi-pipe-leak\"></i>'),
(43, 'Escola de Idiomas', 'escola-de-idiomas', '<i class=\"mdi mdi-translate\"></i>'),
(44, 'Faculdades', 'faculdades', '<i class=\"mdi mdi-teach\"></i>'),
(45, 'Farmácias', 'farmacias', '<i class=\"mdi mdi-pill\"></i>'),
(46, 'Fisioterapeutas', 'fisioterapeutas', '<i class=\"mdi mdi-yoga\"></i>'),
(47, 'Floriculturas', 'floriculturas', '<i class=\"mdi mdi-flower-tulip\"></i>'),
(48, 'Foto e Filmagem', 'foto-e-filmagem', '<i class=\"mdi mdi-camera\"></i>'),
(49, 'Fretes e Mudanças', 'fretes-e-mudancas', '<i class=\"mdi mdi-truck-fast\"></i>'),
(50, 'Gráficas', 'graficas', '<i class=\"mdi mdi-printer\"></i>'),
(51, 'Hospitais', 'hospitais', '<i class=\"mdi mdi-hospital-building\"></i>'),
(52, 'Hotéis e Pousadas', 'hoteis-e-pousadas', '<i class=\"mdi mdi-hotel\"></i>'),
(53, 'Igrejas', 'igrejas', '<i class=\"mdi mdi-church\"></i>'),
(54, 'Imobiliárias', 'imobiliarias', '<i class=\"mdi mdi-home-map-marker\"></i>'),
(55, 'Internet e Software', 'internet-e-software', '<i class=\"mdi mdi-internet-explorer\"></i>'),
(56, 'Lanches', 'lanches', '<i class=\"mdi mdi-food\"></i>'),
(57, 'Lava Car', 'lava-car', '<i class=\"mdi mdi-car-wash\"></i>'),
(58, 'Lavanderia', 'lavanderia', '<i class=\"mdi mdi-washing-machine\"></i>'),
(59, 'Livrarias e Papelarias', 'livrarias-e-papelarias', '<i class=\"mdi mdi-book-open-page-variant\"></i>'),
(60, 'Locadora de Veículos', 'locadora-de-veiculos', '<i class=\"mdi mdi-car-key\"></i>'),
(61, 'Loja de Calçados', 'loja-de-calcados', '<i class=\"mdi mdi-shoe-heel\"></i>'),
(62, 'Lojas de Informática', 'lojas-de-informatica', '<i class=\"mdi mdi-mouse\"></i>'),
(63, 'Loja de Presentes', 'loja-de-presentes', '<i class=\"mdi mdi-gift\"></i>'),
(64, 'Lojas de Roupas', 'lojas-de-roupas', '<i class=\"mdi mdi-tshirt-v\"></i>'),
(65, 'Máquinas e Peças', 'maquinas-e-pecas', '<i class=\"mdi mdi-screwdriver\"></i>'),
(66, 'Material de Construção', 'material-de-construcao', '<i class=\"mdi mdi-wall\"></i>'),
(67, 'Marcenarias', 'marcenarias', '<i class=\"mdi mdi-saw-blade\"></i>'),
(68, 'Médicos e Saúde', 'medicos-e-saude', '<i class=\"mdi mdi-hospital-box\"></i>'),
(69, 'Moto Táxi', 'moto-taxi', '<i class=\"mdi mdi-racing-helmet\"></i>'),
(70, 'Móteis', 'moteis', '<i class=\"mdi mdi-account-heart\"></i>'),
(71, 'Noivas e Casamento', 'noivas-e-casamento', '<i class=\"mdi mdi-ring\"></i>'),
(72, 'Oficina de Carro', 'oficina-de-carro', '<i class=\"mdi mdi-engine\"></i>'),
(73, 'Oficinas de Moto', 'oficinas-de-moto', '<i class=\"mdi mdi-motorbike\"></i>'),
(74, 'Oftamologistas', 'oftamologistas', '<i class=\"mdi mdi-eye\"></i>'),
(75, 'Óticas e Relojoaria', 'oticas-e-relojoaria', '<i class=\"mdi mdi-glasses\"></i>'),
(76, 'Padarias', 'padarias', '<i class=\"mdi mdi-bread-slice\"></i>'),
(77, 'Peixarias', 'peixarias', '<i class=\"mdi mdi-fish\"></i>'),
(78, 'Pet Shop', 'pet-shop', '<i class=\"mdi mdi-dog\"></i>'),
(79, 'Perfumes e Cosméticos', 'perfumes-e-cosmeticos', '<i class=\"mdi mdi-ornament\"></i>'),
(80, 'Piscinas e Jardins', 'piscinas-e-jardins', '<i class=\"mdi mdi-pool\"></i>'),
(81, 'Pizzarias', 'pizzarias', '<i class=\"mdi mdi-pizza\"></i>'),
(82, 'Postos de Combustíveis', 'postos-de-combustiveis', '<i class=\"mdi mdi-gas-station\"></i>'),
(83, 'Prestadores de Serviços', 'prestadores-de-servicos', '<i class=\"mdi mdi-worker\"></i>'),
(84, 'Restaurantes', 'restaurantes', '<i class=\"mdi mdi-silverware-fork-knife\"></i>'),
(85, 'Salão de Beleza', 'salao-de-beleza', '<i class=\"mdi mdi-face-woman\"></i>'),
(86, 'Supermercados', 'supermercados', '<i class=\"mdi mdi-cart\"></i>'),
(87, 'Táxi', 'taxi', '<i class=\"mdi mdi-taxi\"></i>'),
(88, 'Transporte', 'transporte', '<i class=\"mdi mdi-bus-side\"></i>'),
(89, 'Vinho e Queijos', 'vinho-e-queijos', '<i class=\"mdi mdi-bottle-wine\"></i>'),
(90, 'Zumba', 'zumba', '<i class=\"mdi mdi-human-handsup\"></i>'),
(92, 'Clínicas Veterinárias', 'clinicas-veterinarias', '<i class=\"mdi mdi-dog-side\"></i>'),
(93, 'Loja de Utilidades', 'loja-de-utilidades', '<i class=\"mdi mdi-storefront\"></i>'),
(94, 'Atacadistas', 'atacadistas', '<i class=\"mdi mdi-shopping-outline\"></i>'),
(95, 'Jardinagem', 'jardinagem', '<i class=\"mdi mdi-palm-tree\"></i>'),
(96, 'Clubes', 'clubes', '<i class=\"mdi mdi-table-tennis\"></i>'),
(97, 'Sex Shop', 'sex-shop', '<i class=\"mdi mdi-tag-heart\"></i>'),
(98, 'Tabacaria', 'tabacaria', '<i class=\"mdi mdi-cigar\"></i>'),
(99, 'Tatuagens', 'tatuagens', '<i class=\"mdi mdi-language-swift\"></i>'),
(100, 'Funerárias', 'funerarias', '<i class=\"mdi mdi-coffin\"></i>'),
(101, 'Chaveiros', 'chaveiros', '<i class=\"mdi mdi-key\"></i>'),
(102, 'Dedetização', 'dedetizacao', '<i class=\"mdi mdi-spider\"></i>'),
(103, 'Borracharias', 'borracharias', '<i class=\"mdi mdi-van-passenger\"></i>'),
(104, 'Despachantes', 'despachantes', '<i class=\"mdi mdi-arrow-top-right-thick\"></i>'),
(105, 'Alarmes e Segurança', 'alarmes-e-seguranca', '<i class=\"mdi mdi-cctv\"></i>'),
(106, 'Creches', 'creches', '<i class=\"mdi mdi-baby-carriage\"></i>'),
(107, 'Rádios', 'radios', '<i class=\"mdi mdi-radio-tower\"></i>'),
(108, 'Funilaria e Pintura', 'funilaria-e-pintura', '<i class=\"mdi mdi-car-door\"></i>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `config_notificacoes`
--

CREATE TABLE `config_notificacoes` (
  `id` int(11) NOT NULL,
  `APP_ID` varchar(255) NOT NULL,
  `API_KEY` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaques`
--

CREATE TABLE `destaques` (
  `id` int(11) NOT NULL,
  `anunciante` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `data_inicio` varchar(255) NOT NULL,
  `data_validade` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocoes`
--

CREATE TABLE `promocoes` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `anunciante` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `desconto` varchar(255) NOT NULL,
  `informacoes` text NOT NULL,
  `data_inicio` varchar(255) NOT NULL,
  `data_vencimento` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_administrativos`
--

CREATE TABLE `usuarios_administrativos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `data_cadastro` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios_administrativos`
--

INSERT INTO `usuarios_administrativos` (`id`, `nome`, `login`, `senha`, `cargo`, `data_cadastro`) VALUES
(1, 'Teste da Silva', 'teste@teste.com', '123', 'Administrativo', '2019-10-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anunciantes`
--
ALTER TABLE `anunciantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config_notificacoes`
--
ALTER TABLE `config_notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocoes`
--
ALTER TABLE `promocoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_administrativos`
--
ALTER TABLE `usuarios_administrativos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anunciantes`
--
ALTER TABLE `anunciantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config_notificacoes`
--
ALTER TABLE `config_notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destaques`
--
ALTER TABLE `destaques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promocoes`
--
ALTER TABLE `promocoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios_administrativos`
--
ALTER TABLE `usuarios_administrativos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
