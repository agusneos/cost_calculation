-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2015 at 10:41 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cost_calculation`
--
CREATE DATABASE `cost_calculation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cost_calculation`;

-- --------------------------------------------------------

--
-- Table structure for table `assembly`
--

CREATE TABLE IF NOT EXISTS `assembly` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assembly`
--

INSERT INTO `assembly` (`Id`, `Kode_Supp`, `Name`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'HJP-CBT', 'Pemasangan Gasket', 21, 'IDR', '2014-09-09', 'YES'),
(2, 'HJP-CBT', 'Pemasangan Rubber', 100, 'IDR', '2014-09-09', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE IF NOT EXISTS `calculation` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Tanggal` date NOT NULL,
  `Customer` varchar(10) NOT NULL,
  `Customer_code` varchar(30) NOT NULL,
  `Dia_nominal` double NOT NULL,
  `Length_nominal` double NOT NULL,
  `Quantity` double NOT NULL,
  `Saga_code` varchar(40) NOT NULL,
  `Type_screwOri` varchar(20) NOT NULL,
  `Dia_wire` double NOT NULL,
  `Kode_wire` varchar(20) NOT NULL,
  `Net_weight` double NOT NULL,
  `Scrap` double NOT NULL,
  `Gross_weight` double NOT NULL,
  `Price` double NOT NULL,
  `Currency` varchar(10) NOT NULL,
  `Exch_rate` double NOT NULL,
  `Material_cost` double NOT NULL,
  `Washer1` varchar(30) NOT NULL,
  `Washer1_weight` double NOT NULL,
  `Washer1_currency` varchar(10) NOT NULL,
  `Washer1_price` double NOT NULL,
  `Washer1_cost` double NOT NULL,
  `Washer2` varchar(30) NOT NULL,
  `Washer2_weight` double NOT NULL,
  `Washer2_currency` varchar(10) NOT NULL,
  `Washer2_price` double NOT NULL,
  `Washer2_cost` double NOT NULL,
  `Finish_weight` double NOT NULL,
  `Washer_total_cost` double NOT NULL,
  `Gol_mchn_head` varchar(20) NOT NULL,
  `Kode_mchnhead` varchar(10) NOT NULL,
  `Heading_depr_cost` double NOT NULL,
  `Gol_mchn_roll` varchar(20) NOT NULL,
  `Kode_mchnroll` varchar(10) NOT NULL,
  `Rolling_depr_cost` double NOT NULL,
  `Freq_mchnroll` double NOT NULL,
  `Rolling_depr_cost2` double NOT NULL,
  `Mchn_cutting` varchar(10) NOT NULL,
  `Kode_mchncutt` varchar(10) NOT NULL,
  `Cutting_depr_cost` double NOT NULL,
  `Mchn_slotting` varchar(10) NOT NULL,
  `Kode_mchnslott` varchar(10) NOT NULL,
  `Slotting_depr_cost` double NOT NULL,
  `Mchn_trimming` varchar(10) NOT NULL,
  `Kode_mchntrimm` varchar(10) NOT NULL,
  `Trimming_depr_cost` double NOT NULL,
  `Mchn_straightening` varchar(10) NOT NULL,
  `Kode_mchnstraighten` varchar(10) NOT NULL,
  `Straightening_depr_cost` double NOT NULL,
  `Mchn_pressing` varchar(10) NOT NULL,
  `Kode_mchnpress` varchar(10) NOT NULL,
  `Pressing_depr_cost` double NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Heading_tool_cost` double NOT NULL,
  `Heading_currency` varchar(10) NOT NULL,
  `Heading_tool_cost2` double NOT NULL,
  `Category2` varchar(30) NOT NULL,
  `Rolling_tool_cost` double NOT NULL,
  `Cutting_tool_cost` double NOT NULL,
  `Slotting_tool_cost` double NOT NULL,
  `Trimming_tool_cost` double NOT NULL,
  `Gaji_per_sec` double NOT NULL,
  `Labor_cost_heading` double NOT NULL,
  `Gaji_per_sec2` double NOT NULL,
  `Labor_cost_rolling` double NOT NULL,
  `Gaji_per_sec3` double NOT NULL,
  `Labor_cost_cutting` double NOT NULL,
  `Gaji_per_sec4` double NOT NULL,
  `Labor_cost_slotting` double NOT NULL,
  `Gaji_per_sec5` double NOT NULL,
  `Labor_cost_trimming` double NOT NULL,
  `Labor_cost_straightening` double NOT NULL,
  `Proses1` varchar(20) NOT NULL,
  `Jumlah_shot1` double NOT NULL,
  `Biaya_labor1` double NOT NULL,
  `Proses2` varchar(20) NOT NULL,
  `Jumlah_shot2` double NOT NULL,
  `Biaya_labor2` double NOT NULL,
  `Proses3` varchar(20) NOT NULL,
  `Jumlah_shot3` double NOT NULL,
  `Biaya_labor3` double NOT NULL,
  `Proses4` varchar(20) NOT NULL,
  `Jumlah_shot4` double NOT NULL,
  `Biaya_labor4` double NOT NULL,
  `Proses5` varchar(20) NOT NULL,
  `Jumlah_shot5` double NOT NULL,
  `Biaya_labor5` double NOT NULL,
  `Kode_turret2` varchar(10) NOT NULL,
  `Price_turret2` double NOT NULL,
  `Currency_turret2` varchar(10) NOT NULL,
  `Turret2_cost` double NOT NULL,
  `Gaji_per_gram_fq` double NOT NULL,
  `Labor_cost_fq` double NOT NULL,
  `Gaji_per_gram_packing` double NOT NULL,
  `Labor_cost_packing` double NOT NULL,
  `Biaya_per_gram_elc` double NOT NULL,
  `Electricity_cost` double NOT NULL,
  `Biaya_per_gram_fexp` double NOT NULL,
  `Factory_cost` double NOT NULL,
  `Kode_furnace` varchar(10) NOT NULL,
  `Price_furnace` double NOT NULL,
  `Currency_furnace` varchar(10) NOT NULL,
  `Furnace_cost` double NOT NULL,
  `Kode_furnace2` varchar(10) NOT NULL,
  `Price_furnace2` double NOT NULL,
  `Currency_furnace2` varchar(10) NOT NULL,
  `Furnace2_cost` double NOT NULL,
  `Kode_plating` varchar(10) NOT NULL,
  `Price_plating` double NOT NULL,
  `Currency_plating` varchar(10) NOT NULL,
  `Plating_cost` double NOT NULL,
  `Baking` varchar(10) NOT NULL,
  `Baking_cost` double NOT NULL,
  `Cuci` varchar(10) NOT NULL,
  `Cuci_cost` double NOT NULL,
  `Assembly` varchar(10) NOT NULL,
  `Kode_assembly` varchar(10) NOT NULL,
  `Assembly_cost` double NOT NULL,
  `Kode_plating2` varchar(10) NOT NULL,
  `Price_plating2` double NOT NULL,
  `Currency_plating2` double NOT NULL,
  `Plating2_cost` double NOT NULL,
  `Kode_coating` varchar(10) NOT NULL,
  `Price_coating` double NOT NULL,
  `Currency_coating` varchar(10) NOT NULL,
  `Coating_cost` double NOT NULL,
  `Processing_cost_summary` double NOT NULL,
  `Tooling_cost_summary` double NOT NULL,
  `Depreciation_cost_summary` double NOT NULL,
  `Profit_rate_summary` double NOT NULL,
  `Profit_cost_summary` double NOT NULL,
  `Total_cost_summary` double NOT NULL,
  `Price_per_kg` double NOT NULL,
  `Note_Acc_Staff` text NOT NULL,
  `Approval_Acc_Mgr` enum('OK','NG') NOT NULL,
  `Note_Acc_Mgr` text NOT NULL,
  `Approval_Mkt_Staff` enum('OK','NG') NOT NULL,
  `Note_Mkt_Staff` text NOT NULL,
  `Id_Mkt_Staff` varchar(100) NOT NULL,
  `Approval_Mkt_Mgr` enum('OK','NG') NOT NULL,
  `Note_Mkt_Mgr` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`Id`, `Tanggal`, `Customer`, `Customer_code`, `Dia_nominal`, `Length_nominal`, `Quantity`, `Saga_code`, `Type_screwOri`, `Dia_wire`, `Kode_wire`, `Net_weight`, `Scrap`, `Gross_weight`, `Price`, `Currency`, `Exch_rate`, `Material_cost`, `Washer1`, `Washer1_weight`, `Washer1_currency`, `Washer1_price`, `Washer1_cost`, `Washer2`, `Washer2_weight`, `Washer2_currency`, `Washer2_price`, `Washer2_cost`, `Finish_weight`, `Washer_total_cost`, `Gol_mchn_head`, `Kode_mchnhead`, `Heading_depr_cost`, `Gol_mchn_roll`, `Kode_mchnroll`, `Rolling_depr_cost`, `Freq_mchnroll`, `Rolling_depr_cost2`, `Mchn_cutting`, `Kode_mchncutt`, `Cutting_depr_cost`, `Mchn_slotting`, `Kode_mchnslott`, `Slotting_depr_cost`, `Mchn_trimming`, `Kode_mchntrimm`, `Trimming_depr_cost`, `Mchn_straightening`, `Kode_mchnstraighten`, `Straightening_depr_cost`, `Mchn_pressing`, `Kode_mchnpress`, `Pressing_depr_cost`, `Category`, `Heading_tool_cost`, `Heading_currency`, `Heading_tool_cost2`, `Category2`, `Rolling_tool_cost`, `Cutting_tool_cost`, `Slotting_tool_cost`, `Trimming_tool_cost`, `Gaji_per_sec`, `Labor_cost_heading`, `Gaji_per_sec2`, `Labor_cost_rolling`, `Gaji_per_sec3`, `Labor_cost_cutting`, `Gaji_per_sec4`, `Labor_cost_slotting`, `Gaji_per_sec5`, `Labor_cost_trimming`, `Labor_cost_straightening`, `Proses1`, `Jumlah_shot1`, `Biaya_labor1`, `Proses2`, `Jumlah_shot2`, `Biaya_labor2`, `Proses3`, `Jumlah_shot3`, `Biaya_labor3`, `Proses4`, `Jumlah_shot4`, `Biaya_labor4`, `Proses5`, `Jumlah_shot5`, `Biaya_labor5`, `Kode_turret2`, `Price_turret2`, `Currency_turret2`, `Turret2_cost`, `Gaji_per_gram_fq`, `Labor_cost_fq`, `Gaji_per_gram_packing`, `Labor_cost_packing`, `Biaya_per_gram_elc`, `Electricity_cost`, `Biaya_per_gram_fexp`, `Factory_cost`, `Kode_furnace`, `Price_furnace`, `Currency_furnace`, `Furnace_cost`, `Kode_furnace2`, `Price_furnace2`, `Currency_furnace2`, `Furnace2_cost`, `Kode_plating`, `Price_plating`, `Currency_plating`, `Plating_cost`, `Baking`, `Baking_cost`, `Cuci`, `Cuci_cost`, `Assembly`, `Kode_assembly`, `Assembly_cost`, `Kode_plating2`, `Price_plating2`, `Currency_plating2`, `Plating2_cost`, `Kode_coating`, `Price_coating`, `Currency_coating`, `Coating_cost`, `Processing_cost_summary`, `Tooling_cost_summary`, `Depreciation_cost_summary`, `Profit_rate_summary`, `Profit_cost_summary`, `Total_cost_summary`, `Price_per_kg`, `Note_Acc_Staff`, `Approval_Acc_Mgr`, `Note_Acc_Mgr`, `Approval_Mkt_Staff`, `Note_Mkt_Staff`, `Id_Mkt_Staff`, `Approval_Mkt_Mgr`, `Note_Mkt_Mgr`) VALUES
(1, '2014-12-19', '123', 'GE90110100', 8, 20, 0, '(A)HSMH 8X20 MC3', '', 7.85, '109', 10, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(2, '2014-12-19', '101', 'jasdlfli', 5, 6, 20000, 'SMP 5 X 6 GR', 'smp', 3.6, '109', 10, 0, 10, 1.125, 'USD', 13450, 151.31, '', 0, '', 0, 0, '', 0, '0', 0, 0, 10, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', 'Janki', 'OK', ''),
(3, '2014-12-26', '100', '1232', 0, 0, 0, 'SNP 5X8 KZ', 'snp', 0, '0', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', 'Janki', '', ''),
(4, '2015-01-05', '102', '1234454', 0, 0, 0, 'smp 5 x 7 zk', '', 0, '0', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(5, '2015-01-05', '1', 'sdsd', 0, 0, 0, 'sdfds', '', 2, '', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(6, '2015-01-20', '100', 'safs', 0, 0, 30000, 'sdfsd', '', 0, '62', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(7, '2015-01-09', '100', '12312', 0, 0, 25000, '12321', '', 3.48, '57', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(8, '2015-01-09', '121', '323323', 0, 0, 50000, '1231', 'smp', 3.5, '58', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(9, '2015-01-20', '121', '12312', 0, 0, 60000, '443t', '', 5.7, '60', 0, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(10, '2015-01-25', '122', '5545reg', 0, 0, 5000, 'eratet2', '', 9, '60', 8.4, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(11, '2015-01-15', '102', '12212', 5, 12, 100000, 'HSMH 5 X 12 CF', '', 4.89, '57', 3.65, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(12, '2015-05-26', '101', 'safjklasfd', 10, 30, 30000, 'smo 5 x 30 eb', 'smo', 4.8, '107', 20, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(13, '2015-05-13', '103', 'afskldf', 5, 30, 30000, '(a)bmp 5 x 30 MC3', 'bmp', 4.9, '104', 10, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(14, '2015-06-10', '101', 'DGH', 6, 16, 1200, 'HSMS 6 X 16 MC3', 'HSMS', 5.26, '105', 5.45, 0, 5.45, 1.125, 'USD', 13000, 79.71, '', 0, '', 0, 0, '', 0, '0', 0, 0, 5.45, 0, 'Heading 4 dies', '28', 12, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0.007491, 'USD', 97.38, '', 0, 0, 0, 0, 5.15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(15, '2015-06-10', '100', 'SDFSD', 5, 22, 130000, 'UMS 5 X 22 SUS', 'UMS', 4.37, '66', 4.3, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(16, '2015-06-19', '89', '90041-59308-00', 6, 16, 35764, '(F)TSAH 6X16 EB+ D18T1', 'TSAH', 4.85, '106', 5.3, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(17, '2015-06-19', '89', '9004A-15056-00', 6, 25, 235928, '(P)SMP 6X25 MC3', 'SMP', 5.24, '110', 6.5, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(18, '2015-06-19', '11', 'EG-030129-TFA', 3, 12, 50000, 'BTF 3 X 12 UC', 'BTF', 2.51, '105', 0.54, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', '0', 'OK', ''),
(19, '2015-06-19', '100', '-', 4, 10, 30000, '(W)SMP 4X10 EB D8T0.8', 'SMP', 3.45, '110', 1.21, 0, 0, 0, '', 0, 0, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', 'Janki', 'NG', ''),
(20, '2015-06-30', 'ADDD', 'ajfkslfa', 5, 30, 30000, 'SMP 5 x 30 EB', 'SMP', 4.89, '109', 12, 5, 0, 0, 'USD', 12820, 181.72, '', 0, '', 0, 0, '', 0, '0', 0, 0, 0, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 'OK', '', 'OK', '', 'Janki', 'NG', 'Untung kebanyakan adjust jadi 12%.'),
(21, '2015-06-17', 'ADIKU', 'afsdflaskfa', 10, 25, 30000, 'SMH 5 X 25 MC3', 'SMP', 5.8, '37', 16, 5, 16.8, 1.798, 'USD', 13073, 387.25, '14', 0, 'USD', 0.00624, 80, '92', 1.63, 'IDR', 61, 61, 17.63, 141, 'Heading 1 die', '11', 2.66, 'Ordinary', '9', 0.64, 2, 1.34, '1', '5', 0.43, '1', '5', 0.36, '1', '11', 3.08, '1', '1', 121.34, '', '', 0, 'MACHINE SCREW & TAPPING SCREW ', 5.38, 'IDR', 5.38, 'MACHINE SCREW', 2.14, 2.24, 5.8, 12.67, 5.15, 5.72, 6.27, 10.41, 5.84, 4.44, 5.84, 5.61, 5.84, 7.12, 397.67, 'Turret 1', 3, 225.35, 'Turret 2', 5, 135.21, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 12.43, 0.44, 7.3, 1.12, 18.57, 0.99, 16.41, '2', 5000, 'IDR', 82.9, '7', 2550, 'IDR', 2550, '3', 10500, 'IDR', 174.09, '1', 10.78, '1', 30.67, '1', '2', 100, '', 0, 0, 0, '6', 0.01275, 'USD', 166.68, 3961.36, 28.23, 129.21, 19, 858.39, 5505, 344090, '', 'OK', '', 'NG', '', 'Janki', '', ''),
(22, '2015-07-16', 'ADDD', 'adfsaksdf', 5, 20, 30000, 'asdfsdfa', 'smp', 4.87, '104', 10, 5, 10.5, 1.125, 'USD', 13073, 154.42, '', 0, '', 0, 0, '', 0, '', 0, 0, 10, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 19, 0, 0, 0, '', 'OK', '', '', '', '0', 'OK', ''),
(23, '2015-07-24', 'ADIKU', 'afdfasllsfd', 6, 30, 40000, 'dfsadfads', 'smp', 5.8, '109', 15, 5, 15.75, 1.125, 'USD', 13073, 231.64, '', 0, '', 0, 0, '', 0, '', 0, 0, 15, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 19, 0, 0, 0, '', '', '', '', '', '0', 'OK', ''),
(24, '2015-07-16', 'AAI', 'safsdfd', 5, 20, 30000, 'asdfsf', 'smp', 4.5, '108', 10, 5, 10.5, 1.125, 'USD', 13450, 158.88, '', 0, '', 0, 0, '', 0, '', 0, 0, 10, 0, '', '', 0, '', '', 0, 0, 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', 0, '', 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 0, 0.44, 0, 1.12, 0, 0.99, 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 0, 0, 0, 19, 0, 0, 0, '', 'NG', 'Ganti rate', '', '', 'Janki', 'OK', ''),
(25, '2015-07-24', 'AAI', '12121', 3, 10, 10000, 'smp 3x10 mc3', 'smp', 2.54, '110', 2.4, 5, 2.52, 1.125, 'USD', 13450, 38.13, '', 0, '', 0, 0, '', 0, '', 0, 0, 2.4, 0, 'Heading 1 die', '3', 0.66, 'Ordinary', '3', 0.18, 1, 0.18, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, 'MACHINE SCREW & TAPPING SCREW ', 3.35, 'IDR', 3.35, 'MACHINE SCREW', 0.84, 0, 0, 0, 5.15, 7.78, 6.27, 6.14, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 1.8, 0.44, 1.06, 1.12, 2.69, 0.99, 2.38, '', 0, '', 0, '', 0, '', 0, '4', 4000, 'IDR', 9.6, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 31.45, 4.19, 0.84, 19, 14.02, 89, 36928, '', 'OK', '', '', '', 'Janki', '', ''),
(26, '2015-07-08', 'ABAI', 'chnc', 5, 40, 30000, 'smt 5 x 40 eb', 'smt', 3.5, '110', 5.6, 5, 5.88, 1.125, 'USD', 13450, 88.97, '', 0, '', 0, 0, '', 0, '', 0, 0, 5.6, 0, 'Heading 1 die', '10', 1.16, 'Ordinary', '8', 0.32, 1, 0.32, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, 'MACHINE SCREW & TAPPING SCREW ', 5.38, 'IDR', 5.38, 'MACHINE SCREW', 1.07, 0, 0, 0, 5.15, 4.79, 6.27, 3.01, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 4.2, 0.44, 2.46, 1.12, 6.27, 0.99, 5.54, '', 0, '', 0, '', 0, '', 0, '21', 8600, 'IDR', 48.16, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 74.43, 6.45, 1.48, 19, 32.27, 204, 36357, 'Ganti rate Rp 13.450,-', 'OK', '', '', '', 'Janki', '', ''),
(27, '2015-07-31', 'ADI', 'asfksdfsld;', 6, 12, 30000, 'smp 6 x 12 mc3', 'smp', 5.8, '107', 10, 5, 10.5, 1.125, 'USD', 13073, 154.42, '', 0, '', 0, 0, '', 0, '', 0, 0, 10, 0, 'Heading 1 die', '12', 2.66, 'Ordinary', '12', 1.12, 1, 1.12, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, 'MACHINE SCREW & TAPPING SCREW ', 7.18, 'IDR', 7.18, 'MACHINE SCREW', 1.68, 0, 0, 0, 5.15, 5.72, 6.27, 4.01, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 7.5, 0.44, 4.4, 1.12, 11.2, 0.99, 9.9, '', 0, '', 0, '', 0, '', 0, '4', 4000, 'IDR', 40, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 82.73, 8.86, 3.78, 19, 46.74, 297, 29653, '', 'OK', '', 'OK', '', 'Janki', 'OK', ''),
(28, '2015-08-11', 'ADIKU', 'dafsdkfaksdj', 5, 12, 30000, 'smp 5 x 12 mc3', 'smp', 4.8, '105', 10, 5, 10.5, 1.125, 'USD', 13500, 159.47, '', 0, '', 0, 0, '', 0, '', 0, 0, 10, 0, 'Heading 1 die', '11', 2.66, 'Ordinary', '9', 0.64, 1, 0.64, '', '', 0, '', '', 0, '', '', 0, '', '', 0, '', '', 0, 'MACHINE SCREW & TAPPING SCREW ', 5.27, 'IDR', 5.27, 'MACHINE SCREW', 0.79, 0, 0, 0, 5.15, 5.72, 6.27, 5.2, 0, 0, 0, 0, 0, 0, 0, ' ', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, 0, '', 0, '', 0, 0.75, 7.5, 0.44, 4.4, 1.12, 11.2, 0.99, 9.9, '', 0, '', 0, '', 0, '', 0, '4', 4000, 'IDR', 40, '', 0, '', 0, '', '', 0, '', 0, 0, 0, '', 0, '', 0, 83.92, 6.06, 3.3, 19, 47.4, 300, 30015, 'Ganti rate jadi 13.500', 'OK', '', 'OK', '', 'Janki', 'OK', '');

-- --------------------------------------------------------

--
-- Table structure for table `coating`
--

CREATE TABLE IF NOT EXISTS `coating` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `coating`
--

INSERT INTO `coating` (`Id`, `Kode_Supp`, `Name`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'TBM', '(F)SMP 6 X 35 - 30 EB D11.5 T0.8 / TB 2468', 0.0254, 'USD', '2014-10-29', 'YES'),
(2, 'TBM', 'PIN BOLT M5 X 16 NI-C SOCK UT 10.9 / TB 2448B', 0.0198, 'USD', '2014-10-20', 'YES'),
(3, 'TBM', 'SMK 3 X 3.2 MC3 / TB2365 (GREEN)', 0.008008, 'USD', '2014-10-03', 'YES'),
(4, 'TBM', 'HSMK 10 X M6 X 16.8 - 9 NI UT 7T TORX T40 / TB2430', 0.02813, 'USD', '2014-08-20', 'YES'),
(5, 'TBM', 'HSMK 8 X M8 X 25 - 20 CF 9.8T UT SOCK / TB2471', 520, 'IDR', '2014-08-11', 'YES'),
(6, 'TBM', '(W)SMP X 18 MC3', 0.01275, 'USD', '2014-07-03', 'YES'),
(7, 'TBM', 'SMP M4 X 14 EB / TB 2361 (BLUE)', 0.0168, 'USD', '2014-06-19', 'YES'),
(8, 'TBM', 'HSMH 4 X 3 X 35 MC3 7T UT / TB 2430', 0.01425, 'USD', '2014-06-19', 'YES'),
(9, 'TBM', 'FB M6 X 12 CF 6.8T K8 / TB2446B', 0.0286, 'USD', '2014-06-18', 'YES'),
(10, 'TBM', 'HSMS 6 X 25 CF 11.9 UT / TB 2415', 0.025, 'USD', '2014-06-03', 'YES'),
(11, 'TBM', 'HSMH 4 X 3 X 35 MC3 7T UT / TB 2471', 0.0154, 'USD', '2014-05-13', 'YES'),
(12, 'TBM', 'HSMW 10 X M8 X 191 - 15 MC3 G7S UT K14 / TB 2471', 500, 'IDR', '2014-04-10', 'YES'),
(13, 'TBM', 'HSMR 5 X 10 CF UT T01 / TB2440B', 0.0186, 'USD', '2014-03-21', 'YES'),
(14, 'TBM', 'SMF 3 X 20 CF 20K / TB 2415 (YELLOW), TB 2418', 0.0135, 'USD', '2014-01-09', 'YES'),
(15, 'TBM', 'HSMS 6 X 25 CF 11.9 / TB 2415 (YELLOW)', 0.021, 'USD', '2014-01-03', 'YES'),
(16, 'STEP', 'FB 8 X M8 X 20-16.25 GM K12 UT G8', 572, 'IDR', '2014-11-24', 'YES'),
(17, 'STEP', '(F)TSAH 6 X 25 GM + D16T1', 385, 'IDR', '2014-11-04', 'YES'),
(18, 'STEP', 'FLANGE NUT M16 X 34.5 GM 12N', 600, 'IDR', '2014-10-15', 'YES'),
(19, 'STEP', 'TSBIP 5 X 12 GM', 321, 'IDR', '2014-09-30', 'YES'),
(20, 'STEP', 'SMK SQ 5 X M5 X 18.5-11.45 GM 12A UT TR DP', 281, 'IDR', '2014-08-13', 'YES'),
(21, 'STEP', '(D)SMH 5 X M5 X 52-34 GM G4 12A UT DT D24T5.5', 743, 'IDR', '2014-08-11', 'YES'),
(22, 'STEP', '(D)SMH 5 X M5 X 60-30 GM  12A UT DT D24T5.5', 746, 'IDR', '2014-07-21', 'YES'),
(23, 'STEP', 'TSB1N 4 X 14 GM D11T0.8', 288, 'IDR', '2014-07-03', 'YES'),
(24, 'STEP', 'TSB1P 4 X 12 GM', 231, 'IDR', '2014-07-03', 'YES'),
(25, 'STEP', 'TSAT 4 X 10 GM', 230, 'IDR', '2014-07-03', 'YES'),
(26, 'STEP', 'PW 6 X 13 X 1 GM', 262, 'IDR', '2014-07-03', 'YES'),
(27, 'STEP', 'FB 8 X 110-18 GM G7', 1748, 'IDR', '2014-07-03', 'YES'),
(28, 'STEP', 'FB 8 X 25-18 GM G7', 695, 'IDR', '2014-12-03', 'YES'),
(29, 'STEP', 'FB 8 X 16 - 18 GM G7', 572, 'IDR', '2014-07-03', 'YES'),
(30, 'STEP', '(F)SMK SQ 5 X M5 X18.5-11.45A GM DP 12A D14T1.6', 284, 'IDR', '2014-06-17', 'YES'),
(31, 'STEP', '(D)SMW 8 X M5 X 62-41.8 GM 10A DT ROUND G65 D27T5.', 961, 'IDR', '2014-05-22', 'YES'),
(32, 'STEP', '(D)SMW 6 X M5 X 65-40 GM 12A DT ROUND G65 D24T5.5', 803, 'IDR', '2014-05-22', 'YES'),
(33, 'STEP', '(F)SMK SQ 5 X M5 X 18.5-11.45A GM DP D16T1.6', 256, 'IDR', '2014-04-07', 'YES'),
(34, 'STEP', 'FB 14 X M14 X 50-34 GM UT K19 P1.5 G11', 2174, 'IDR', '2014-03-17', 'YES'),
(35, 'STEP', 'SQ 8.5 X M8 X 16-13 GM 8 SPOT', 503, 'IDR', '2014-03-14', 'YES'),
(36, 'STEP', 'TSBN 3 X 14-11.1 GM D11T0.8', 294, 'IDR', '2014-03-11', 'YES'),
(37, 'STEP', 'TSBN 4 X 14 GM D12T0.8', 309, 'IDR', '2014-01-06', 'YES'),
(38, 'STEP', 'TSBN 4 X 20-7 GM D12T0.8', 358, 'IDR', '2014-01-06', 'YES'),
(39, 'STEP', 'FB 14 X M14 X 45-34 GM UT K19 P1.5 G11', 1911, 'IDR', '2014-01-06', 'YES'),
(40, 'STEP', 'FB 14 X M14 X 60-34 GM UT K19 P1.5 G11', 2217, 'IDR', '2014-01-06', 'YES'),
(41, 'STEP', 'FB 14 X M14 X 55-34 GM UT K19 P1.5 G11', 2196, 'IDR', '2014-01-06', 'YES'),
(42, 'NIC', 'TSBP 4 X 8 NI-C', 403, 'IDR', '2014-11-07', 'YES'),
(43, 'NIC', 'PIN BOLT 5 X 16 NI-C UTR SOCK 10.9 TB2440B', 480, 'IDR', '2014-10-14', 'YES'),
(44, 'STEP', 'HSMK 10 X M6 X 16.8-9 NI-C UT 7T TORX 40', 460, 'IDR', '2014-09-03', 'YES'),
(45, 'NIC', '(F)SMP 4 X 12 NI-C TORX-S T20 D8T0.8', 205, 'IDR', '2014-06-26', 'YES'),
(46, 'BIMA', 'TSAP 4 X 20 CR', 188, 'IDR', '2014-10-31', 'YES'),
(47, 'BIMA', 'BOLT KNURLING 8 X M5 X 28.5 NC', 219, 'IDR', '2014-02-26', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Id` varchar(20) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `PayTerm` int(1) NOT NULL,
  `CustGroup` enum('LOKAL','IMPORT') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `Name`, `PayTerm`, `CustGroup`) VALUES
('AAI', 'PT. ASIA AUTOKOM INDUSTRI', 0, ''),
('AB', 'PT. ANUGERAH BIMETALINDO', 0, ''),
('ABAI', 'PT. AKEBONO BRAKE ASTRA INDONESIA', 0, ''),
('ABL', 'PT. AMANAH BUDI LAKSANA', 0, ''),
('ABM', 'CV. ALAM BUMI MANUNGGAL', 0, ''),
('ADDD', 'PT. ASTRA DAIHATSU MOTOR', 0, ''),
('ADI', 'PT. ASAHI DENSO INDONESIA', 0, ''),
('ADIKU', 'PT. ANUGERAH DAYA INDUSTRI KOMPONEN UTAMA', 0, ''),
('ADIWIRA', 'PT. ASTRA OTOPART Tbk (ADIWIRA PLASTIK)', 0, ''),
('ADK', 'PT. ADYAWINSA DINAMIKA KARAWANG', 0, ''),
('ADM', 'PT. ASTRA DAIHATSU MOTOR', 30, 'LOKAL'),
('ADM KAP', 'PT. ASTRA DAIHATSU MOTOR - KAP', 0, ''),
('AFTECH', 'PT. AFTECH MULTINDO PERKASA (STAMPING PLANT)', 0, ''),
('AHI', 'PT. ALDA HENKO INTERNUSA', 0, ''),
('AI', 'PT. AISIN INDONESIA', 0, ''),
('AII', 'PT. ALPHA INDUSTRIES INDONESIA', 0, ''),
('AJC', 'PT. ARMADA JOHNSON CONTROL', 0, ''),
('AJI', 'PT. ASTRA JUOKU INDONESIA', 0, ''),
('AKI', 'PT. ASTRA KOMPONEN INDONESIA', 0, ''),
('AKU', 'PT. ANEKA KOMKAR UTAMA', 0, ''),
('AMA', 'PT. ASALTA MANDIRI AGUNG', 0, ''),
('AMB', 'PT. ALPINDO MITRA BAJA', 0, ''),
('AMP', 'PT. ARISA MANDIRI PRATAMA', 0, ''),
('AOP', 'PT. ASTRA OTOPARTS TBK', 0, ''),
('API KRWG', 'PT. ADYAWINSA PLASTICS INDUSTRIES KARAWANG', 0, ''),
('APM', 'PT. APM ARMADA AUTOPARTS', 0, ''),
('ARGA', 'PT. ARGATAMA MULTI AGUNG', 0, ''),
('ARMSTRONG', 'PT. ARMSTRONG INDUSTRI INDONESIA', 0, ''),
('ASI', 'PT. ADYAWINSA STAMPING INDUSTRIES', 0, ''),
('ASM', 'PT. ASALTA SURYA MANDIRI', 0, ''),
('ASSS', 'PT. AGUNG SAMPURNA SUKSES SEJAHTERA', 0, ''),
('AST', 'PT. AST INDONESIA', 0, ''),
('ASTM', 'PT. ADYAWINSA SEKISUI TECHNO MOLDING', 0, ''),
('AUP', 'PT. ARTHA UTAMA PLASINDO', 0, ''),
('AWC', 'PT. ADHI WIJAYA CITRA', 0, ''),
('BAI', 'PT. BAJAJ AUTO INDONESIA', 0, ''),
('BDP', 'PT. BANDATAMA DWIJAYA PUTRA', 0, ''),
('BES', 'PT. BANDRO ENGINEERING SEMESTA', 0, ''),
('BI', 'PT. BATARA INDAH', 0, ''),
('BJR', 'PT. BERTINDO JAYA RAYA', 0, ''),
('BMA', 'PT. BANGUN MULYA ABADI', 0, ''),
('BME', 'PT. BERDIKARI METAL ENGINEERING', 0, ''),
('BPADI', 'BPK. ADI', 0, ''),
('BPWT', 'PT. BINTANG PRATAMA WIJAYA TEKNIK', 0, ''),
('BSI', 'PT. B.S. INDONESIA', 0, ''),
('BSM', 'PT. BAHAGIA SEJAHTERA METALINDO', 0, ''),
('BT', 'PT. BONECOM TRICOM', 0, ''),
('CAC', 'CONTINENTAL AUTOMOTIVE COMPONENTS MALAYSIA SDN. BHD.', 0, ''),
('CAJR', 'PT. CATURINDO AGUNG JAYA RUBBER', 0, ''),
('CBL', 'PT. CITRA BANDUNG LAKSANA', 0, ''),
('CHN', 'PT. CHEMCO HARAPAN NUSANTARA', 0, ''),
('CI', 'PT. CHITOSE INTERNASIONAL Tbk', 0, ''),
('CIM', 'PT. CONEX INTI MAKMUR', 0, ''),
('CKU', 'PT. CIPTAJAYA KREASINDO UTAMA', 0, ''),
('CM', 'PT. CAHAYA MANDALA', 0, ''),
('CNC', 'PT. CHANDRA NUGERAH CIPTA', 0, ''),
('CNK', 'PT. CITRA NUGERAH KARYA', 0, ''),
('CP', 'PT. CIKARANG PRESISI', 0, ''),
('CPI', 'PT. CENTRADO PRIMA INTERNATIONAL', 0, ''),
('CPL', 'PT. CIPTA PERDANA LANCAR', 0, ''),
('CPM', 'PT. CITRA PLASTIK MAKMUR', 0, ''),
('CSI', 'PT. CIPTA SAKSAMA INDONESIA', 0, ''),
('DCI', 'PT. DELA CEMARA INDAH', 0, ''),
('DDD', 'PT. DELTASINDO DWI DAYA', 0, ''),
('DELLOYD', 'PT. DELLOYD', 0, ''),
('DI', 'PT. DAIJO INDUSTRIAL', 0, ''),
('DKW', 'PT. DAYA KARSA WIGUNA', 0, ''),
('DONI', 'BPK. DONI', 0, ''),
('DP', 'PT. DJAYINDO PERKASA', 0, ''),
('DPM', 'PT. DHARMA POLIMETAL', 0, ''),
('DSEC', 'PT. DAE SOUNG ELECTRIC COMPONENTS', 0, ''),
('ECB', 'PT. ESKA CAHYADI BERSAUDARA', 0, ''),
('EI', 'PT. EXEDY INDONESIA', 0, ''),
('EII', 'PT. EAGLE INDUSTRI INDONESIA', 0, ''),
('ELI', 'IBU ELI', 0, ''),
('EPS', 'PT. EPS INDONESIA', 0, ''),
('EPSON', 'PT. INDONESIA EPSON INDUSTRY', 0, ''),
('EPTI', 'PT. ELECTRON  PARTS TECHNOLOGY INDONESIA', 0, ''),
('ETI', 'PT. ELECTRONIC TECHNOLOGY INDOPLAST', 0, ''),
('EWINDO', 'PT. EWINDO', 0, ''),
('EXEDY', 'PT. EXEDY MANUFACTURING INDONESIA', 0, ''),
('EXEDY THAI', 'EXEDY THAILAND CO,LTD', 0, ''),
('EXEDY VTNM', 'EXEDY VIETNAM CO, LTD', 0, ''),
('FCC', 'PT. FAJAR CAHAYA CEMERLANG', 0, ''),
('FCCI', 'PT. FCC INDONESIA', 0, ''),
('FGS', 'PT. FAJAR GEMILANG SENTOSA', 0, ''),
('FLN', 'PT. FRINA LESTARI NUSANTARA', 0, ''),
('FM', 'PT. FUJI MEIWA', 0, ''),
('FMT', 'PT. FARIQINDO MULIA TEKNIK', 0, ''),
('FSI', 'PT. FUJI SEAT INDONESIA', 0, ''),
('FSL', 'PT. FAJAR SURYA LESTARI', 0, ''),
('FTI', 'PT. FUJI TECHNICA INDONESIA', 0, ''),
('FTRI', 'PT. FUKOKU TOKAI RUBBER INDONESIA', 0, ''),
('GA', 'PT. GEMASUARA ADHITAMA', 0, ''),
('GAI', 'PT. GLOBAL AUTO INTERNATIONAL', 0, ''),
('GCI', 'PT. GEUM CHEON INDO', 0, ''),
('GDM', 'PT. GLOBAL DIMENSI METALINDO', 0, ''),
('GEMA', 'PT. GEMAPLAST', 0, ''),
('GHJ', 'PT. GLOBAL HANSTAMA JAYA', 0, ''),
('GIP', 'PT. GALUNGGUNG INDOSTEEL PERKASA', 0, ''),
('GKD', 'PT. GEMALA KEMPA DAYA', 0, ''),
('GMC', 'PT. GALINDRA MULTI CIPTA', 0, ''),
('GP', 'CV. GADING PRATAMA', 0, ''),
('GQI', 'PT. GLOBAL QUALITY INDONESIA', 30, 'LOKAL'),
('GSS', 'PT. GUNA SENAPUTRA SEJAHTERA', 0, ''),
('GTA', 'PT. GARPAN TRI ASKINDO', 0, ''),
('HAIER', 'PT. HAIER ELECTRICAL APPLIANCES INDONESIA', 0, ''),
('HANSHIN', 'PT. INDONESIA HANSHIN ELECTRIC WIRE & CABLE', 0, ''),
('HEI', 'PT. HANSUNG ELECTRONICS INDONESIA', 0, ''),
('HENDRA', 'BPK. HENDRA SUHARLI', 0, ''),
('HF', 'PT. HANYUNG FUJISEI', 0, ''),
('HIM', 'PT. HAMADEN INDONESIA MANUFACTURING', 0, ''),
('HIS', 'PT. HONTO INTI SUKSES', 0, ''),
('HIT Kudus', 'PT. HARTONO ISTANA TEKNOLOGI (KUDUS)', 0, ''),
('HIT Sayung', 'PT. HARTONO ISTANA TEKNOLOGI (SAYUNG)', 0, ''),
('HLI', 'PT. HONDA LOCK INDONESIA', 0, ''),
('HMG', 'PT. HASURA MITRA GEMILANG', 0, ''),
('HMMI', 'PT. HINO MOTOR MANUFACTURING INDONESIA', 0, ''),
('HMP', 'PT. HIKARI METALINDO PRATAMA', 0, ''),
('HP', 'PT. HANS PLATINDO', 0, ''),
('IAMI SUNTER', 'PT. ISUZU ASTRA MOTOR INDONESIA (SUNTER)', 0, ''),
('ICHIKOH', 'PT. ICHIKOH (MALAYSIA) SBN.BHD', 0, ''),
('ICN', 'PT. INTER CITRA NUSANTARA', 0, ''),
('IE', 'PT. INDAHVARIA EKASELARAS', 0, ''),
('IEJ', 'PT. ISAK ELECTRO JAYA', 0, ''),
('II', 'PT. INDURO INTERNASIONAL', 0, ''),
('IM', 'PT. INDONESIA MATSUYA', 0, ''),
('IMI', 'PT. IHARA MANUFACTURING INDONESIA', 0, ''),
('IMN', 'PT. INDOTECH METAL NUSANTARA', 0, ''),
('INDOWOODS', 'PT. INDOWOODS', 0, ''),
('INS', 'PT. INDONESIA NIPPON SEIKI', 0, ''),
('INTRA', 'PT. INTRA PRESISI INDONESIA', 0, ''),
('IP', 'PT. INTI POLYMETAL', 0, ''),
('IPAK', 'PT. INTI PLASTIK ANEKA KARET', 0, ''),
('IPI', 'PT. INOAC POLYTECHNO INDONESIA', 0, ''),
('IPPI', 'PT. INTI PANTJA PRESS INDUSTRI', 0, ''),
('IRWAN', 'BPK. IRWAN', 0, ''),
('ISI', 'PT. INDOSAFETY SENTOSA INDUSTRY', 0, ''),
('ISKW', 'PT. ISKW JAVA INDONESIA', 0, ''),
('ISUSU PU', 'PT. ISUZU ASTRA MOTOR INDONESIA (P. UNGU)', 0, ''),
('ITS', 'CV. INTI TEKNIK SEJAHTERA', 0, ''),
('ITSA', 'PT. INDONESIA THAI SUMMIT AUTO', 0, ''),
('IVI', 'PT. INDO VDO INSTRUMENTS', 0, ''),
('JCI', 'PT. JATI CIPTA INOVASI', 0, ''),
('JI', 'PT. JUAHN INDONESIA', 0, ''),
('JIDECO', 'PT. JIDECO INDONESIA', 0, ''),
('JKS', 'PT. JERLIN KENCANA SAKTI', 0, ''),
('JONAN', 'PT. JONAN INDONESIA', 0, ''),
('JPN', 'PT. JAYA PANDU NUSANTARA', 0, ''),
('JRM', 'PT. JAYA RAYA MANDIRI', 0, ''),
('JTEKT', 'PT. JTEKT INDONESIA', 0, ''),
('JTI', 'PT. JUKEN TECHNOLOGY INDONESIA', 0, ''),
('JVC', 'PT. JAYA VICTORI CEMERLANG', 0, ''),
('KATOLEC', 'PT. KATOLEC INDONESIA', 0, ''),
('KAYABA', 'PT. KAYABA INDONESIA', 0, ''),
('KBI', 'PT. KYORAKU BLOWMOLDING INDONESIA', 0, ''),
('KBU', 'PT. KARYA BAHANA UNIGAM', 0, ''),
('KEIHIN', 'PT. KEIHIN INDONESIA (PLANT 2)', 0, ''),
('KHS', 'CV. KARYA HIDUP SENTOSA', 0, ''),
('KI', 'PT. KEPSONIC INDONESIA', 0, ''),
('KIPI', 'PT. KENCANA INDUSTRI PLASTIK INDONESIA', 0, ''),
('KIYOKUNI', 'PT. KIYOKUNI INDONESIA', 0, ''),
('KMI', 'PT. KAWASAKI MOTOR INDONESIA', 0, ''),
('KMI AE', 'PT. KAWASAKI MOTOR INDONESIA (AE)', 0, ''),
('KMI CA', 'PT. KAWASAKI MOTOR INDONESIA (CA)', 0, ''),
('KMI EA', 'PT. KAWASAKI MOTOR INDONESIA (EA)', 0, ''),
('KMI LA', 'PT. KAWASAKI MOTOR INDONESIA (LA)', 0, ''),
('KMI PA', 'PT. KAWASAKI MOTOR INDONESIA (PA)', 0, ''),
('KMI RA', 'PT. KAWASAKI MOTOR INDONESIA (RA)', 0, ''),
('KMI TA', 'PT. KAWASAKI MOTOR INDONESIA (TA)', 0, ''),
('KMK', 'PT. K.M.K PLASTICS INDONESIA', 0, ''),
('KMM', 'PT. KYODA MAS MULIA', 0, ''),
('KMU', 'PT. KARYA MEKAR UTAMA', 0, ''),
('KOITO', 'PT. INDONESIA KOITO', 0, ''),
('KOSTEC', 'PT. KOSTEC INDONESIA', 0, ''),
('KPM', 'PT. KREASI PRESISI METALINDO', 0, ''),
('KTB', 'PT. KRAMA YUDHA TIGA BERLIAN MOTORS', 0, ''),
('KTB SPC', 'PT. KTB Spare Part Center', 0, ''),
('KTC', 'PT. KARYANUSA TECHNINDO CEMERLANG', 0, ''),
('KTSI', 'PT. KASAI TECK SEE INDONESIA', 0, ''),
('KUBOTA', 'PT. KUBOTA INDONESIA', 0, ''),
('LFP', 'PT. LIKINDO FURASTRACO PERKASA', 0, ''),
('LG DISP', 'PT. LG ELECTRONICS IND (DISPLAY)', 0, ''),
('LG REF', 'PT. LG ELECTRONIC IND (REF)', 0, ''),
('LI', 'PT. LEOCO INDONESIA', 0, ''),
('LTP', 'PT. LESTARI TEKNIK PLASTIKATAMA', 0, ''),
('MAA', 'PT. MINDA ASEAN AUTOMOTIVE', 0, ''),
('MAJ', 'PT. MEKAR ARMADA JAYA (MGL)', 0, ''),
('MAMI', 'PT. MEGA ANDALAN MOTOR INDUSTRI', 0, ''),
('MAPI', 'PT. MUSASHI AUTO PARTS INDONESIA', 0, ''),
('MARGA', 'PT. MARGAJAYA', 0, ''),
('MARUHACHI', 'PT. MARUHACHI  INDONESIA', 0, ''),
('MBS', 'PT. MORADON BERLIAN SAKTI', 0, ''),
('MCM', 'PT. MENARA CIPTA METALINDO', 0, ''),
('MECOINDO', 'PT. MECOINDO', 0, ''),
('MEI', 'PT. MURAMOTO ELEKTRONIKA INDONESIA', 0, ''),
('MEIWA', 'PT. MEIWA INDONESIA', 0, ''),
('MEIWA III', 'PT. MEIWA INDONESIA (III)', 0, ''),
('MELCO', 'PT. MELCOINDA', 0, ''),
('MES', 'PT. METINDO ERA SAKTI', 0, ''),
('METBELOSA', 'PT. METBELOSA', 0, ''),
('METRO', 'PT. METRO KINKI METALS', 0, ''),
('MHI', 'PT. MING HORNG INDUSTRY', 0, ''),
('MI', 'PT. MIKUNI INDONESIA', 0, ''),
('MI P2', 'PT. MITSUBA INDONESIA (PLANT 2)', 0, ''),
('MIGOTO', 'PT. MIGOTO INDONESIA', 0, ''),
('MINDA', 'PT. MINDA TRADING', 0, ''),
('MINDA - BGLR', 'MINDA KYORAKU LTD - BANGALORE', 0, ''),
('MIPP', 'PT. MITSUBA INDONESIA PIPE PARTS', 0, ''),
('MITSUBA', 'PT. MITSUBA INDONESIA', 0, ''),
('MIYUKL', 'PT. MIYUKI INDONESIA', 0, ''),
('MJA', 'PT. MAKOTO JAYA ABADI', 0, ''),
('MKI', 'PT. MARUFUJI KENZAI INDONESIA', 0, ''),
('MKM I', 'PT. MITSUBISHI KRAMAYUDHA MOTORS I', 0, ''),
('MKM II', 'PT. MITSUBISHI KRAMAYUDHA MOTORS II', 0, ''),
('MMM', 'PT. METALINDO MULTIDINAMIKA MANDIRI', 0, ''),
('MNK', 'PT. MULTINUGRAHA KENCANA', 0, ''),
('MOREEN', 'PT. MOREEN INDONESIA', 0, ''),
('MPII', 'PT. MULTI PRATAMA INTERBUANA INDONESIA', 0, ''),
('MPP', 'PT. MESINDO PUTRA PERKASA', 0, ''),
('MPT', 'PT. MEGA PRATAMA TEKNINDO', 0, ''),
('MR', 'PT. MULTI RETAILINDO', 0, ''),
('MS', 'PT. MULTIKARYA SINARDINAMIKA', 0, ''),
('MSI', 'PT. MAH SING INDONESIA', 0, ''),
('MT', 'PT. MOVING TECH', 0, ''),
('MTG', 'PT. MORITA TJOKRO GEARINDO', 0, ''),
('MULTI', 'CV. MULTI BAJA', 0, ''),
('NBS', 'PT. NUSANTARA BUANA SAKTI', 0, ''),
('NCI', 'PT. NISSEN CHEMITEC INDONESIA', 0, ''),
('NIJU', 'PT. NUSA INDAH JAYA UTAMA', 0, ''),
('NISSIN', 'NISSIN MANUFACTURING (THAILAND)CO.,LTD', 0, ''),
('NKP', 'PT. NANDYA KARYA PERKASA', 0, ''),
('NPI', 'PT. NEOHYOLIM PLATECH INDONESIA', 0, ''),
('NSPI', 'PT. NIDEC SANKYO PRECISION INDONESIA', 0, ''),
('NTP', 'PT. NIRMALA TIRTA PUTRA', 0, ''),
('OI', 'PT. ONAMBA INDONESIA', 0, ''),
('OKI', 'PT. ORIENTAL KYOWA INDUSTRIES', 0, ''),
('OMI', 'PT. OCHIAI MENARA INDONESIA', 0, ''),
('OSP', 'PT. OLGASARANA PEKAYON', 0, ''),
('PADMA', 'PT. PADMA SOODE INDONESIA', 0, ''),
('PATCO', 'PT. PATCO ELEKTRONIK TEKNOLOGI', 0, ''),
('PB', 'PT. PARAMOUNT BED', 0, ''),
('PCA', 'PT. PRIMAREJEKI CIKUPA ABADI', 0, ''),
('PEC', 'PT. PANGGUNG ELECTRIC CITRABUANA', 0, ''),
('PEC AUDIO', 'PT. PANGGUNG ELECTRIC CITRABUANA (AUDIO)', 0, ''),
('PEC D', 'PT. PANGGUNG ELECTRIC CITRABUANA. (D)', 0, ''),
('PGE', 'PT. PEMBINA GALINDRA ELECTRIC', 0, ''),
('PGESE', 'PT. PANASONIC GOBEL ECO SOLUTIONS MFG INDONESIA (EB)', 0, ''),
('PGESP', 'PT. PANASONIC GOBEL ECO SOLUTIONS MFG INDONESIA (PESGMFID)', 0, ''),
('PGESW', 'PT. PANASONIC GOBEL ECO SOLUTIONS MFG INDONESIA (WD)', 0, ''),
('PGSCL', 'PT. PANASONIC GOBEL ECO SOLUTIONS MFG INDONESIA (LF)', 0, ''),
('PHI', 'PT. PANASONIC HEALTHCARE INDONESIA', 0, ''),
('PJI', 'PT. PROFESSINDO JAYA INTI', 0, ''),
('PKI', 'PT. PRIMA KOMPONEN INDONESIA', 0, ''),
('PMI AC', 'PT. PANASONIC MANUFACTURING INDONESIA (AC)', 0, ''),
('PMI FAN', 'PT. PANASONIC MANUFACTURING INDONESIA (FAN)', 0, ''),
('PMI PC', 'PT. PANASONIC MANUFACTURING INDONESIA (PC)', 0, ''),
('PMI REF', 'PT. PANASONIC MANUFACTURING INDONESIA (REF)', 0, ''),
('PMI TV', 'PT. PANASONIC MANUFACTURING INDONESIA (TV)', 0, ''),
('PMI WM', 'PT. PANASONIC MANUFACTURING INDONESIA (WM)', 0, ''),
('PMI WP', 'PT. PANASONIC MANUFACTURING INDONESIA (WP)', 0, ''),
('PML', 'PT. PANCAMEKAR LESTARI', 0, ''),
('PP', 'PT. PERMA PLASINDO', 0, ''),
('PRIMA', 'PT. PRIMA KOMPONINDO', 0, ''),
('PS', 'PT. PRICOL SURYA', 0, ''),
('PSC', 'PT. PANACIPTA SEINAN COMPONENTS', 0, ''),
('PSI', 'PT. POSMI STEEL INDONESIA', 0, ''),
('PT', 'PT. PROGRESS TOYO (INDONESIA)', 0, ''),
('PTI', 'PT. PRO TEC INDONESIA', 0, ''),
('PTT', 'PT. PAMINDO TIGA T (TGR)', 0, ''),
('RAB', 'PT. RIZKI ASA BUANA', 0, ''),
('RNK', 'PT. RODA NADA KARYA', 0, ''),
('ROKI', 'PT. ROKI INDONESIA', 0, ''),
('RPA', 'PT. RACHMAT PERDANA ADHIMETAL', 0, ''),
('SA', 'PT. SINARSAKTI ANEKASARANA', 0, ''),
('SANDEN', 'PT. SANDEN INDONESIA', 0, ''),
('SANGIL', 'PT. SANGIL INDONESIA', 0, ''),
('SANLY', 'PT. SANLY INDUSTRIES', 0, ''),
('SANOH', 'PT. SANOH INDONESIA', 0, ''),
('SANYO', 'PT. SANYO ELECTRONICS INDONESIA', 0, ''),
('SANYO COMP', 'PT. SANYO INDONESIA (COMP)', 0, ''),
('SANYO WM', 'PT. SANYO INDUSTRI INDONESIA (WM)', 0, ''),
('SANYO WP', 'PT. SANYO INDUSTRI INDONESIA (WP)', 0, ''),
('SAP', 'PT. SINAR AGUNG PEMUDA', 0, ''),
('SAS', 'CV. SURYA ABADI SEJAHTERA', 0, ''),
('SB', 'TOKO SINAR BAUT', 0, ''),
('SC', 'PT. SINARBERLIAN CHEMINDO', 0, ''),
('SCMM', 'PT. SURYA CIPTA METAL MANDIRI', 0, ''),
('SCTI', 'PT. SAMWON COPPER TUBE INDONESIA', 0, ''),
('SD', 'PT. SANGWAN DINASINDO', 0, ''),
('SDT', 'PT. SUBUR DJAJA TEGUH', 0, ''),
('SEC', 'PT. SEC INDONESIA', 0, ''),
('SEJIN', 'PT. SEJIN', 0, ''),
('SEOUL', 'PT. SEOUL PRESS INDONESIA', 0, ''),
('SGI', 'CV. SAGA MULTI INDUSTRI', 0, ''),
('SGP', 'PT. SURYA GEMILANG PERKASA', 0, ''),
('SGS', 'PT. SETIA GUNA SELARAS', 0, ''),
('SHARP HA', 'PT. SHARP ELECTRONICS INDONESIA (HA)', 0, ''),
('SHARP TV', 'PT. SHARP ELECTRONICS INDONESIA (TV)', 0, ''),
('SHARP WM', 'PT. SHARP ELECTRONICS INDONESIA (WM)', 0, ''),
('SHI', 'PT. SHIN HEUNG INDONESIA', 0, ''),
('SI', 'PT. SHINDENGEN INDONESIA', 0, ''),
('SIM', 'PT. SUZUKI INDOMOBIL MOTOR', 0, ''),
('SIM 2W ASCP', 'PT. SUZUKI INDOMOBIL MOTOR (2W CKG) ASCP', 0, ''),
('SIM 2W CKG', 'PT. SUZUKI INDOMOBIL MOTOR  (2W) CAKUNG', 0, ''),
('SIM 2W CKG EXPORT', 'PT. SUZUKI INDOMOBIL MOTOR (2W CKG) EXPORT', 0, ''),
('SIM 2W CKG MANUAL', 'PT. SUZUKI INDOMOBIL MOTOR (2W CKG) MANUAL', 0, ''),
('SIM 2W CKG PPK', 'PT. SUZUKI INDOMOBIL MOTOR (2W CKG) PPK', 0, ''),
('SIM 2W CKG TRIAL', 'PT. SUZUKI INDOMOBIL MOTOR (2W CKG) TRIAL', 0, ''),
('SIM 2W TBN ASCP', 'PT. SUZUKI INDOMOBIL MOTOR (2W TBN) ASCP', 0, ''),
('SIM 2W TBN EXPORT', 'PT. SUZUKI INDOMOBIL MOTOR (2W TBN) EXPORT', 0, ''),
('SIM 2W TBN PPK', 'PT. SUZUKI INDOMOBIL MOTOR (2W TBN) PPK', 0, ''),
('SIM 4W', 'PT. SUZUKI INDOMOBIL MOTOR (4W)', 0, ''),
('SIM 4W TBN EXPORT', 'PT. SUZUKI INDOMOBIL MOTOR (4W TBN) EXPORT', 0, ''),
('SIM 4W TBN PG', 'PT. SUZUKI INDOMOBIL MOTOR (4W TBN) PULOGADUNG', 0, ''),
('SIM R4', 'PT. SUZUKI INDOMOBIL MOTOR R4 - CIKARANG', 0, ''),
('SJM', 'PT. SEBASTIAN JAYA METAL', 0, ''),
('SKI', 'PT. SHINTO KOGYO INDONESIA', 0, ''),
('SKM', 'PT. SARANA KENCANA MULYA', 0, ''),
('SLA', 'PT. SINARLAUT ABADI', 0, ''),
('SLUMBER', 'PT. SLUMBERLAND INDONESIA', 0, ''),
('SM', 'CV. SEMESTA MANDIRI', 0, ''),
('SMI', 'PT. SANKEIKID MANUTEC INDONESIA', 0, ''),
('SMP', 'PT. STAR MUSTIKA PLASTMETAL', 0, ''),
('SMT', 'PT. SMT INDONESIA', 0, ''),
('SNI', 'PT. SIERA NUT INDONESIA', 0, ''),
('SORAYA', 'PT. SORAYA INTERINDO', 0, ''),
('SPI', 'PT. SANWA PRESSWORK INDONESIA', 0, ''),
('SPN', 'PT. SARI PEKAYON NUSANTARA', 0, ''),
('SPP', 'PT. SINAR PRIMA PLASTISINDO', 0, ''),
('SPPC', 'PT. SUZUKI SPARE PART CENTER', 0, ''),
('SPS', 'PT. SPARTA GUNA SENTOSA', 0, ''),
('SS', 'PT. SELAMAT SEMPURNA Tbk', 0, ''),
('SSA', 'PT. SUPER SINAR ABADI', 0, ''),
('SSDTI', 'PT. SHIN SEONG DELTA TECH INDONESIA', 0, ''),
('SSI', 'PT. SHARP SEMICONDUCTOR INDONESIA', 0, ''),
('ST', 'PT. SUJI TECHNO', 0, ''),
('STC', 'PT. SURYA TEKNIKA CEMERLANG', 0, ''),
('STEP', 'PT. SARI TAKAGI ELOK PRODUK', 0, ''),
('SUGITY', 'PT. SUGITY CREATIVES', 0, ''),
('SUP', 'PT. SARANA UNGGUL PRATAMA', 0, ''),
('TBE', 'PT. TIGA BERLIAN ELECTRIC', 0, ''),
('TBI', 'PT. TOYOTA BOSHOKU INDONESIA', 0, ''),
('TC', 'PT. TRIMITRA CHITRAHASTA', 0, ''),
('TCI', 'PT. TENMA CIKARANG INDONESIA', 0, ''),
('TDI', 'PT. TOYO DENSO INDONESIA', 0, ''),
('TDS', 'PT. THASIMA DAYA SENTOSA', 0, ''),
('TENMA', 'PT. TENMA INDONESIA', 0, ''),
('TGSS', 'PT. TOYODA GOSEI SAFETY SYSTEM', 0, ''),
('THI', 'PT. TSUANG HINE INDUSTRIAL', 0, ''),
('TI', 'PT. TECHNO INDONESIA', 0, ''),
('TJS', 'PT. TOMADA JAYA SEMPURNA', 0, ''),
('TMI', 'PT. TRADISI MANUFACTURING INDUSTRI', 0, ''),
('TMK', 'PT. TASSHA MULTINDO KARSA', 0, ''),
('TMN', 'PT. TRI MENTARI NIAGA', 0, ''),
('TNP', 'PT. TANINDO NOBEL PLAST', 0, ''),
('TOA', 'PT. TOA GALVA INDUSTRIES', 0, ''),
('TOA AMP', 'PT. TOA GALVA INDUSTRIES AMP', 0, ''),
('TOA COMP', 'PT. TOA GALVA INDUSTRIES (COMPRT)', 0, ''),
('TOA GD-AS1', 'PT. TOA GALVA INDUSTRIES GD-AS1', 0, ''),
('TOA PR-CAT', 'PT. TOA GALVA INDUSTRIES PR-CAT', 0, ''),
('TOA PR-INJ', 'PT. TOA GALVA INDUSTRIES PR-INJ', 0, ''),
('TOA SP1', 'PT. TOA GALVA INDUSTRIES SP 1', 0, ''),
('TOA SP2', 'PT. TOA GALVA INDUSTRIES SP 2', 0, ''),
('TOPLA', 'PT. TOPLA HYMOLD INDONESIA', 0, ''),
('TOYO', 'PT. TOYOPLAS MANUFACTURING INDONESIA', 0, ''),
('TOZA GDLC', 'PT. TOA GALVA INDUSTRIES (GDLC)', 0, ''),
('TP', 'PT. TEKNOPLAST', 0, ''),
('TPI', 'PT. TERANG PARTS INDONESIA', 0, ''),
('TS', 'PT. TS. TECH INDONESIA', 0, ''),
('TSI', 'PT. TRI SAUDARA SENTOSA INDUSTRI', 0, ''),
('TSMU', 'PT. TAKAGI SARI MULTI UTAMA', 0, ''),
('TTI', 'PT. TAIYO TOSHIN INDONESIA', 0, ''),
('TU', 'PT. TRIJAYA UNION', 0, ''),
('TYAS', 'Ibu TYAS', 0, ''),
('UK', 'PT. UTAMA KREASI', 0, ''),
('UMP', 'PT. UNGGULKREASI MANUNGGAL PERKASA', 0, ''),
('URM', 'PT. UTAMA RAYA MOTOR', 0, ''),
('USEP', 'BPK. USEP', 0, ''),
('USI', 'PT. USRA TAMPI INDONESIA', 0, ''),
('VD', 'PT. VARIA DIMENSI', 0, ''),
('VM', 'PT. VEGA MANDIRI', 0, ''),
('VSC', 'VIETNAM SUZUKI CORP', 0, ''),
('WIRA', 'CV. WIRACANA', 0, ''),
('WKIK', 'PT. WIJAYA KARYA INDUSTRI & KONSTRUKSI', 0, ''),
('WMP', 'PT. WIJAYA METALINDO PRIMA', 0, ''),
('WTM', 'PT. WIRA TEHNIK METALINDO', 0, ''),
('YAM', 'PT. YANMAR AGRICULTURAL MFG', 0, ''),
('YAMAHA', 'PT. YAMAHA INDONESIA', 0, ''),
('YDI', 'PT. YANMAR DIESEL INDONESIA', 0, ''),
('YDK', 'PT. YUDISTIRA KOMPONEN', 0, ''),
('YEMI', 'PT. YEMI', 30, 'LOKAL'),
('YEMI2', 'PT. YAMAHA MOTOR ELECTRONICS INDONESIA', 0, ''),
('YI', 'PT. YASUFUKU INDONESIA', 0, ''),
('YIMM', 'PT. YAMAHA INDONESIA MOTOR MFG', 0, ''),
('YIMM 5201', 'PT. YAMAHA INDONESIA MOTOR MFG 5201', 0, ''),
('YIMM 5202', 'PT. YAMAHA INDONESIA MOTOR MFG 5202', 0, ''),
('YIMM 5203', 'PT. YAMAHA INDONESIA MOTOR MFG 5203', 0, ''),
('YIMM 5205', 'PT. YAMAHA INDONESIA MOTOR MFG 5205', 0, ''),
('YIMM 5309', 'PT. YAMAHA INDONESIA MOTOR MFG 5909', 0, ''),
('YIMM 5902', 'PT. YAMAHA INDONESIA MOTOR MFG 5902', 0, ''),
('YIMM 5903', 'PT. YAMAHA INDONESIA MOTOR MFG 5903', 0, ''),
('YIMM 5904', 'PT. YAMAHA INDONESIA MOTOR MFG 5904', 0, ''),
('YIMM 5907', 'PT. YAMAHA INDONESIA MOTOR MFG 5907', 0, ''),
('YIMM 590A', 'PT. YAMAHA INDONESIA MOTOR MFG 590A', 0, ''),
('YIMM 590B', 'PT. YAMAHA INDONESIA MOTOR MFG 590B', 0, ''),
('YIMM 590C', 'PT. YAMAHA INDONESIA MOTOR MFG 590C', 0, ''),
('YIMM 590D', 'PT. YAMAHA INDONESIA MOTOR MFG 590D', 0, ''),
('YIMM 590E', 'PT. YAMAHA INDONESIA MOTOR MFG 590E', 0, ''),
('YIMM 5911', 'PT. YAMAHA INDONESIA MOTOR MFG 5911', 0, ''),
('YIMM 6101', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6101', 0, ''),
('YIMM 6102', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6102', 0, ''),
('YIMM 6111', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6111', 0, ''),
('YIMM 6112', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6112', 0, ''),
('YIMM 6301', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6301', 0, ''),
('YIMM 6302', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6302', 0, ''),
('YIMM 6311', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6311', 0, ''),
('YIMM 6312', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6312', 0, ''),
('YIMM 6502', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6502', 0, ''),
('YIMM 6512', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6512', 0, ''),
('YIMM KRWG', 'PT. YAMAHA INDONESIA MOTOR MFG KARAWANG 6902', 0, ''),
('YIMM MANUAL', 'PT. YAMAHA INDONESIA MOTOR MFG MANUAL', 0, ''),
('YIMM POD', 'PT. YAMAHA INDONESIA MOTOR MFG (POD)', 0, ''),
('YK', 'PT. YASONTA KABIN', 0, ''),
('YKK', 'PT. YKK AP INDONESIA', 0, ''),
('YKT', 'PT. YKT GEAR INDONESIA', 0, ''),
('YMI', 'CV. YOUNG METAL INDONESIA', 0, ''),
('YMMA', 'PT. YAMAHA MUSIC MFG. ASIA', 0, ''),
('YMNI', 'PT. YAMAHA MOTOR NUANSA INDONESIA', 0, ''),
('YPI', 'PT. YOSKA PRIMA INTI', 0, ''),
('YQ', 'PT. YQ TEK INDONESIA', 0, ''),
('YSI', 'PT. YI SHEN INDUSTRIAL', 0, ''),
('YSL', 'PT. YASUNLI ABADI UTAMA PLASTIK (MM)', 0, ''),
('YSL LEGOK', 'PT. YASUNLI ABADI UTAMA PLASTIK (LEGOK)', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `furnace`
--

CREATE TABLE IF NOT EXISTS `furnace` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `furnace`
--

INSERT INTO `furnace` (`Id`, `Kode_Supp`, `Name`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'TMI', 'Annealing', 8000, 'IDR', '2013-12-11', 'NO'),
(2, 'JML', 'Screw', 5000, 'IDR', '2014-08-28', 'YES'),
(3, 'JML', 'FB', 4500, 'IDR', '2014-08-28', 'YES'),
(4, 'JML', 'HTB', 4500, 'IDR', '2014-08-28', 'YES'),
(5, 'TMI', 'Annealing', 5000, 'IDR', '2015-06-10', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `furnace2`
--

CREATE TABLE IF NOT EXISTS `furnace2` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `furnace2`
--

INSERT INTO `furnace2` (`Id`, `Kode_Supp`, `Name`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'PARKER', 'FB 7.9 X M8 X 140', 650, 'IDR', '2014-11-13', 'YES'),
(2, 'PARKER', 'FB 10 X M10 X 185-20 CF K14 UT P1.25 9.8', 1020, 'IDR', '2015-06-10', 'YES'),
(3, 'PARKER', 'FB 10 X M10 X 218-20 CF K14 UT P1.25 6.8', 1020, 'IDR', '2015-06-10', 'YES'),
(4, 'PARKER', 'FB  8 X M8 X 175-22 CF K12 UT P1.25 10.9', 950, 'IDR', '2015-06-10', 'YES'),
(5, 'PARKER', 'FB 10 X M10 X 205-22 CF K14 UT P1.25 6.8', 1020, 'IDR', '2015-06-10', 'YES'),
(6, 'PARKER', 'FB 15 X M14 X 250-23 CFK17 KT P1.5 9.8', 3160, 'IDR', '2015-06-10', 'YES'),
(7, 'PARKER', 'HSMW 15 X M14 X 227-15 MC3 UT K19 P1.5 G10', 2550, 'IDR', '2015-06-10', 'YES'),
(8, 'PARKER', 'HSMK 16 X M16 X 210-30 KZ K19 UT P1.5', 3000, 'IDR', '2015-06-10', 'YES'),
(9, 'PARKER', 'HSMK 16 X M16 X 180-30 KZ K19 H12 UT P1.5 7T', 3000, 'IDR', '2015-06-10', 'YES'),
(10, 'PARKER', 'HSMMK 16 X M16 X 235-30 KZ K19 UT P1.5 7T', 3000, 'IDR', '2015-06-10', 'YES'),
(11, 'PARKER', 'HSMW 10 X M10 X 120-20 MC3 K14 P1.25 6T', 900, 'IDR', '2015-06-10', 'YES'),
(12, 'PARKER', 'HSMK 14 X M14 X 130-50 KZ K17 UT P1.5', 1500, 'IDR', '2015-06-10', 'YES'),
(13, 'PARKER', 'HSMK 14 X M14 X 130-30 KZ K17 UT P1.5', 1350, 'IDR', '2015-06-10', 'YES'),
(14, 'PARKER', 'HSMK 14 X M14 X 210-30 KZ K17 UT P1.5', 1860, 'IDR', '2015-06-10', 'YES'),
(15, 'PARKER', 'HSMK 16 X M16 X 180-30 KZ K19 H10 UT P1.5 7T', 3000, 'IDR', '2015-06-10', 'YES'),
(16, 'PARKER', 'HSMK SQ 16 X M16 X 250-40 KZ TR UT P1.5 6T', 4950, 'IDR', '2015-06-10', 'YES'),
(17, 'PARKER', 'HSMK SQ 16 X M16 X 295-40 KZ TR UT P1.5 6T', 9800, 'IDR', '2015-06-10', 'YES'),
(18, 'PARKER', 'HSMK SQ 12 X M12 X 140-30 MC3 TR UT P1.25', 1250, 'IDR', '2015-06-10', 'YES'),
(19, 'PARKER', 'HSMK SQ 12 X M12 X 150-30 MC3 TR UT P1.25 6T', 1250, 'IDR', '2015-06-10', 'YES'),
(20, 'PARKER', 'FB 10 X M10 X 230-15 C K14 P1.25 9.8', 1860, 'IDR', '2015-06-10', 'YES'),
(21, 'PARKER', 'FB 10 X M10 X 140-26 MC3 K14 P1.25 10.9', 1250, 'IDR', '2015-06-10', 'YES'),
(22, 'PARKER', 'HSMH 12 X M12 X 160-20 MC TR UT P1.25 7T', 1780, 'IDR', '2015-06-10', 'YES'),
(23, 'PARKER', 'HSMH 12 X M12 X 185-30 MC TR UT P1.25 G7', 2860, 'IDR', '2015-06-10', 'YES'),
(24, 'PARKER', 'HSMH 12 XM12 X 175-35 MC TR UT K17 P1.25 G7', 1475, 'IDR', '2015-06-10', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE IF NOT EXISTS `labor` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Process` varchar(20) NOT NULL,
  `Gaji_per_year` double NOT NULL,
  `Hasilprod_per_tahun` double NOT NULL,
  `Jumlah_labor` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`Id`, `Process`, `Gaji_per_year`, `Hasilprod_per_tahun`, `Jumlah_labor`) VALUES
(1, 'Heading', 6089277600, 3916429, 85),
(2, 'Rolling', 4622565024, 3676626, 53),
(3, 'Trimming', 324946944, 258582, 4),
(4, 'Cutting', 324946944, 258582, 4),
(5, 'Slotting', 324946944, 258582, 4),
(6, 'FQ', 3055710540, 4089370, 72),
(7, 'Packing', 1755718962, 4035107, 37),
(8, 'Straightening', 225936794, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `machine_cutting`
--

CREATE TABLE IF NOT EXISTS `machine_cutting` (
  `Kode_mchncutt` int(1) NOT NULL AUTO_INCREMENT,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_cutting` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Cutting_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchncutt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `machine_cutting`
--

INSERT INTO `machine_cutting` (`Kode_mchncutt`, `Dia_nominal`, `Length_range`, `Mchn_cutting`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Cutting_depr_cost`) VALUES
(1, 3, '8 - 35', 'CT-2B', 39704522, 413589, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.23),
(2, 4, '8 - 35', 'CT-2B', 39704522, 413589, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.23),
(3, 4, '16 - 150', 'CT- SF-100', 75000000, 781250, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.43),
(4, 5, '8 - 35', 'CT-2B', 39704522, 413589, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.23),
(5, 5, '16 - 150', 'CT-SF-100', 75000000, 781250, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.43),
(6, 6, '16 - 150', 'CT-SF-100', 75000000, 781250, 150, 23, 13910400, 126000, 2898000, 62, 1796760, 0.4, 10800, 0.43);

-- --------------------------------------------------------

--
-- Table structure for table `machine_heading`
--

CREATE TABLE IF NOT EXISTS `machine_heading` (
  `Kode_mchnhead` int(1) NOT NULL AUTO_INCREMENT,
  `Gol_mchn_head` enum('Heading 1 die','Heading 2 dies','Heading 4 dies') NOT NULL,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_heading` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Heading_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchnhead`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `machine_heading`
--

INSERT INTO `machine_heading` (`Kode_mchnhead`, `Gol_mchn_head`, `Dia_nominal`, `Length_range`, `Mchn_heading`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Heading_depr_cost`) VALUES
(1, 'Heading 1 die', 2, '4 - 20', 'YH 1030', 107072630, 1115340, 138, 23, 13910400, 115920, 2666160, 63, 1679681, 0.43, 10800, 0.66),
(2, 'Heading 1 die', 2.6, '4 - 25', 'YH 1030', 107072630, 1115340, 138, 23, 13910400, 115920, 2666160, 63, 1679681, 0.43, 10800, 0.66),
(3, 'Heading 1 die', 3, '4 - 25', 'YH 1030', 107072630, 1115340, 138, 23, 13910400, 115920, 2666160, 63, 1679681, 0.43, 10800, 0.66),
(4, 'Heading 1 die', 3, '10 - 50', 'YH 1552', 113554375, 1182858, 106, 23, 13910400, 89040, 2047920, 50, 1023960, 0.57, 10800, 1.16),
(5, 'Heading 1 die', 3.5, '4 - 25', 'YH 1030', 107072630, 1115340, 138, 23, 13910400, 115920, 2666160, 63, 1679681, 0.43, 10800, 0.66),
(6, 'Heading 1 die', 3.5, '10 - 50', 'YH 1552', 113554375, 1182858, 106, 23, 13910400, 89040, 2047920, 50, 1023960, 0.57, 10800, 1.16),
(7, 'Heading 1 die', 4, '10 - 30', 'YH 1552', 113554375, 1182858, 106, 23, 13910400, 89040, 2047920, 50, 1023960, 0.57, 10800, 1.16),
(8, 'Heading 1 die', 4, '10 - 50', 'YH 1552', 113554375, 1182858, 106, 23, 13910400, 89040, 2047920, 50, 1023960, 0.57, 10800, 1.16),
(9, 'Heading 1 die', 4, '10 - 100', 'YH 20102', 247406250, 2577148, 73, 23, 13910400, 61320, 1410360, 50, 705180, 0.82, 10800, 3.65),
(10, 'Heading 1 die', 5, '10 - 50', 'YH 1552', 113554375, 1182858, 106, 23, 13910400, 89040, 2047920, 50, 1023960, 0.57, 10800, 1.16),
(11, 'Heading 1 die', 5, '10 - 60', 'YH 2076', 197436250, 2056628, 80, 23, 13910400, 67200, 1545600, 50, 772800, 0.75, 10800, 2.66),
(12, 'Heading 1 die', 6, '6 - 56', 'YH 2076', 197436250, 2056628, 80, 23, 13910400, 67200, 1545600, 50, 772800, 0.75, 10800, 2.66),
(13, 'Heading 1 die', 8, '10 - 150', 'ZH 30152', 524062940, 5458989, 58, 23, 13910400, 48720, 1120560, 50, 560280, 1.03, 10800, 9.74),
(14, 'Heading 1 die', 8, '10 - 150', 'ZH 25152', 403981727, 4208143, 60, 23, 13910400, 50400, 1159200, 50, 579600, 1, 10800, 7.26),
(15, 'Heading 1 die', 10, '20 - 150', 'ZH 30152', 524062940, 5458989, 58, 23, 13910400, 48720, 1120560, 58, 649925, 1.03, 10800, 8.4),
(16, 'Heading 1 die', 10, '25 - 300', 'ZH 40305', 1743099601, 18157288, 60, 23, 13910400, 50400, 1159200, 50, 579600, 1, 10800, 31.33),
(17, 'Heading 1 die', 12, '25 - 300', 'ZH 40305', 1743099601, 18157288, 60, 23, 13910400, 50400, 1159200, 50, 579600, 1, 10800, 31.33),
(18, 'Heading 2 dies', 3, '4 - 20', 'MT 1115', 302459057, 3150615, 50, 23, 1159200, 42000, 966000, 45, 434700, 1.2, 10800, 7.25),
(19, 'Heading 2 dies', 4, '4 - 20', 'MT 1115', 302459057, 3150615, 50, 23, 13910400, 42000, 966000, 45, 434700, 1.2, 10800, 7.25),
(20, 'Heading 2 dies', 5, '4 - 20', 'MT 1115', 302459057, 3150615, 50, 23, 13910400, 42000, 966000, 45, 434700, 1.2, 10800, 7.25),
(21, 'Heading 2 dies', 6, '10 - 60', 'MT 1125', 491323192, 5117950, 60, 23, 13910400, 50400, 1159200, 60, 695520, 1, 10800, 7.36),
(22, 'Heading 2 dies', 8, '10 - 60', 'MT 1125', 491323192, 5117950, 60, 23, 13910400, 50400, 1159200, 60, 695520, 1, 10800, 7.36),
(23, 'Heading 4 dies', 3, '10 - 50', 'CBF 64 S', 893200000, 9304167, 240, 23, 13910400, 201600, 4636800, 50, 2318400, 0.25, 10800, 4.01),
(24, 'Heading 4 dies', 4, '10 - 50', 'CBF 64 S', 893200000, 9304167, 240, 23, 13910400, 201600, 4636800, 50, 2318400, 0.25, 10800, 4.01),
(25, 'Heading 4 dies', 5, '10 - 70', 'CBF 64 S', 893200000, 9304167, 240, 23, 13910400, 201600, 4636800, 50, 2318400, 0.25, 10800, 4.01),
(26, 'Heading 4 dies', 5, '15 - 75', 'CBF 84 S', 1335710000, 13913646, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 12),
(27, 'Heading 4 dies', 6, '10 - 70', 'CBF 64 S', 893200000, 9304167, 240, 23, 13910400, 201600, 4636800, 50, 2318400, 0.25, 10800, 4.01),
(28, 'Heading 4 dies', 6, '15 - 75', 'CBF 84 S', 1335710000, 13913646, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 12),
(29, 'Heading 4 dies', 6, '15 - 100', 'CBF 104L', 2082142600, 21688985, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 18.71),
(30, 'Heading 4 dies', 8, '25 - 100', 'CBF 134L', 2043840000, 21290000, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 18.37),
(31, 'Heading 4 dies', 10, '15 - 100', 'CBF 104L', 2082142600, 21688985, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 18.71),
(32, 'Heading 4 dies', 14, '60 - 200', 'CBF 164L', 5273400000, 54931250, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 47.39),
(33, 'Heading 2 dies', 2.6, '4 - 20', 'MT 1115', 302459057, 3150615, 50, 23, 13910400, 42000, 966000, 61, 589260, 1.2, 10800, 5.35),
(36, 'Heading 4 dies', 12, '25 - 150', 'CBF 134L', 2043840000, 21290000, 120, 23, 13910400, 100800, 2318400, 50, 1159200, 0.5, 10800, 18.37);

-- --------------------------------------------------------

--
-- Table structure for table `machine_pressing`
--

CREATE TABLE IF NOT EXISTS `machine_pressing` (
  `Kode_mchnpress` int(1) NOT NULL AUTO_INCREMENT,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_pressing` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Pressing_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchnpress`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `machine_rolling`
--

CREATE TABLE IF NOT EXISTS `machine_rolling` (
  `Kode_mchnroll` int(1) NOT NULL AUTO_INCREMENT,
  `Gol_mchn_roll` enum('Ordinary','ASFA','Stud Bolt') NOT NULL,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_rolling` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Rolling_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchnroll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `machine_rolling`
--

INSERT INTO `machine_rolling` (`Kode_mchnroll`, `Gol_mchn_roll`, `Dia_nominal`, `Length_range`, `Mchn_rolling`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Rolling_depr_cost`) VALUES
(1, 'Ordinary', 2, '4 - 20', 'CTR 2', 53900000, 561458, 230, 23, 13910400, 193200, 4443600, 58, 2577288, 0.26, 7200, 0.22),
(2, 'Ordinary', 2.6, '4 - 20', 'CTR 2', 53900000, 561458, 230, 23, 13910400, 193200, 4443600, 58, 2577288, 0.26, 7200, 0.22),
(3, 'Ordinary', 3, '4 - 20', 'CTR 2', 53900000, 561458, 230, 23, 13910400, 193200, 4443600, 70, 3110520, 0.26, 7200, 0.18),
(4, 'Ordinary', 3.5, '6 - 35', 'CTR 4', 87400000, 910417, 248, 23, 13910400, 208320, 4791360, 59, 2826902, 0.24, 7200, 0.32),
(5, 'Ordinary', 4, '6 - 35', 'CTR 4', 87400000, 910417, 248, 23, 13910400, 208320, 4791360, 59, 2826902, 0.24, 7200, 0.32),
(6, 'Ordinary', 4, '6 - 35', 'CTR 5', 79657600, 829767, 102, 23, 13910400, 85680, 1970640, 66, 1300622, 0.59, 7200, 0.64),
(7, 'Ordinary', 4.5, '6 - 35', 'CTR 4', 87400000, 910417, 248, 23, 13910400, 208320, 4791360, 59, 2826902, 0.24, 7200, 0.32),
(8, 'Ordinary', 5, '6 - 35', 'CTR 4', 87400000, 910417, 248, 23, 13910400, 208320, 4791360, 59, 2826902, 0.24, 7200, 0.32),
(9, 'Ordinary', 5, '6 - 35', 'CTR 5', 79657600, 829767, 102, 23, 13910400, 85680, 1970640, 66, 1300622, 0.59, 7200, 0.64),
(10, 'Ordinary', 5, '8 - 50', 'CTR 6', 132932800, 1384717, 213, 23, 13910400, 178920, 4115160, 50, 2057580, 0.28, 7200, 0.67),
(11, 'Ordinary', 6, '8 - 50', 'CTR 6', 132932800, 1384717, 218, 23, 13910400, 183120, 4211760, 50, 2105880, 0.28, 7200, 0.66),
(12, 'Ordinary', 6, '10 - 65', 'CTR 8', 156369240, 1628846, 150, 23, 13910400, 126000, 2898000, 50, 1449000, 0.4, 7200, 1.12),
(13, 'Ordinary', 6, '16 - 130', 'ZR 30', 300000000, 3125000, 100, 23, 13910400, 84000, 1932000, 50, 966000, 0.6, 7200, 3.23),
(14, 'Ordinary', 8, '10 - 65', 'CTR 8', 156396240, 1629128, 150, 23, 13910400, 126000, 2898000, 50, 1449000, 0.4, 7200, 1.12),
(15, 'Ordinary', 8, '16 - 130', 'ZR 30', 300000000, 3125000, 100, 23, 13910400, 84000, 1932000, 50, 966000, 0.6, 7200, 3.23),
(16, 'Ordinary', 10, '16 - 130', 'ZR 30', 300000000, 3125000, 100, 23, 13910400, 84000, 1932000, 50, 966000, 0.6, 7200, 3.23),
(17, 'Ordinary', 10, '30 - 300', 'ZR 40', 384840456, 4008755, 60, 23, 13910400, 50400, 1159200, 50, 579600, 1, 7200, 6.92),
(18, 'Ordinary', 12, '30 - 300', 'ZR 40', 384840456, 4008755, 60, 23, 13910400, 50400, 1159200, 50, 579600, 1, 7200, 6.92),
(19, 'Ordinary', 12, '30 - 300', 'ZR 70', 686802424, 7154192, 30, 23, 13910400, 25200, 579600, 50, 289800, 2, 7200, 24.69),
(20, 'Ordinary', 14, '30 - 300', 'ZR 70', 686802424, 7154192, 30, 23, 13910400, 25200, 579600, 50, 289800, 2, 7200, 24.69),
(21, 'ASFA', 2.6, '6 - 28', 'MT 1203', 266675640, 2777871, 120, 23, 13910400, 100800, 2318400, 61, 1414224, 0.5, 7200, 1.96),
(22, 'ASFA', 3, '6 - 28', 'MT 1203', 266675640, 2777871, 120, 23, 13910400, 100800, 2318400, 61, 1414224, 0.5, 7200, 1.96),
(23, 'ASFA', 3.5, '6 - 28', 'MT 1203', 266675640, 2777871, 120, 23, 13910400, 100800, 2318400, 61, 1414224, 0.5, 7200, 1.96),
(24, 'ASFA', 4, '8 - 50', 'MT 1206', 297728800, 3101342, 150, 23, 13910400, 126000, 2898000, 50, 1449000, 0.4, 7200, 2.14),
(25, 'ASFA', 5, '8 - 50', 'MT 1206', 297728200, 3101335, 150, 23, 13910400, 126000, 2898000, 50, 1449000, 0.4, 7200, 2.14),
(26, 'ASFA', 6, '8 - 50', 'MT 1206', 297728800, 3101342, 150, 23, 13910400, 126000, 2898000, 50, 1449000, 0.4, 7200, 2.14),
(27, 'ASFA', 6, '10 - 70', 'MT 1208', 332323200, 3461700, 130, 23, 13910400, 109200, 2511600, 50, 1255800, 0.46, 7200, 2.76),
(28, 'ASFA', 8, '10 - 70', 'MT 1208', 332323200, 3461700, 130, 23, 13910400, 109200, 2511600, 50, 1255800, 0.46, 7200, 2.76),
(29, 'ASFA', 10, '10 - 70', 'MT 1208', 332323200, 3461700, 130, 23, 13910400, 109200, 2511600, 50, 1255800, 0.46, 7200, 2.76),
(30, 'Stud Bolt', 6, '20 - 70', 'CTR 08N', 156396240, 1629128, 100, 23, 13910400, 84000, 1932000, 30, 579600, 0.6, 7200, 2.81),
(31, 'Stud Bolt', 8, '20 - 70', 'CTR 08N', 156396240, 1629128, 100, 23, 13910400, 84000, 1932000, 30, 579600, 0.6, 7200, 2.81),
(32, 'Stud Bolt', 10, '20 - 70', 'CTR 08N', 156396240, 1629128, 100, 23, 13910400, 84000, 1932000, 50, 966000, 0.6, 7200, 1.69);

-- --------------------------------------------------------

--
-- Table structure for table `machine_slotting`
--

CREATE TABLE IF NOT EXISTS `machine_slotting` (
  `Kode_mchnslott` int(1) NOT NULL AUTO_INCREMENT,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_slotting` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Slotting_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchnslott`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `machine_slotting`
--

INSERT INTO `machine_slotting` (`Kode_mchnslott`, `Dia_nominal`, `Length_range`, `Mchn_slotting`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Slotting_depr_cost`) VALUES
(1, 3, '6 - 25', 'SLT 15A', 28491749, 296789, 100, 23, 13910400, 84000, 1932000, 23, 444360, 0.6, 10800, 0.67),
(2, 4, '6 - 25', 'SLT 15A', 28491749, 296789, 100, 23, 13910400, 84000, 1932000, 23, 444360, 0.6, 10800, 0.67),
(3, 4, '6 - 25', 'SLT 10A', 28491749, 296789, 100, 23, 13910400, 84000, 1932000, 43, 830760, 0.6, 10800, 0.36),
(4, 5, '6 - 25', 'SLT 15A', 28491749, 296789, 100, 23, 13910400, 84000, 1932000, 23, 444360, 0.6, 10800, 0.67),
(5, 5, '6 - 25', 'SLT 10A', 28491749, 296789, 100, 23, 13910400, 84000, 1932000, 43, 830760, 0.6, 10800, 0.36);

-- --------------------------------------------------------

--
-- Table structure for table `machine_straightening`
--

CREATE TABLE IF NOT EXISTS `machine_straightening` (
  `Kode_mchnstraighten` int(1) NOT NULL AUTO_INCREMENT,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_straightening` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Straightening_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchnstraighten`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `machine_straightening`
--

INSERT INTO `machine_straightening` (`Kode_mchnstraighten`, `Dia_nominal`, `Length_range`, `Mchn_straightening`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Straightening_depr_cost`) VALUES
(1, 10, '10 - 290', 'CK-500', 382600000, 3985417, 2, 23, 1159200, 1680, 38640, 43, 16615, 30, 3600, 121.34),
(2, 12, '10 - 290', 'CK-500', 382600000, 3985417, 1, 23, 1159200, 840, 19320, 85, 16422, 60, 3600, 242.69),
(3, 14, '10 - 290', 'CK-500', 382600000, 3985417, 1, 23, 1159200, 840, 19320, 85, 16422, 60, 3600, 242.69);

-- --------------------------------------------------------

--
-- Table structure for table `machine_trimming`
--

CREATE TABLE IF NOT EXISTS `machine_trimming` (
  `Kode_mchntrimm` int(1) NOT NULL AUTO_INCREMENT,
  `Dia_nominal` double NOT NULL,
  `Length_range` varchar(20) NOT NULL,
  `Mchn_trimming` varchar(20) NOT NULL,
  `Mchn_price` double NOT NULL,
  `Depr_per_month` double NOT NULL,
  `Output_per_min` double NOT NULL,
  `Working_time` double NOT NULL,
  `Working_time_sec` double NOT NULL,
  `Output_per_day` double NOT NULL,
  `Output_per_month` double NOT NULL,
  `Productivity_ratio` double NOT NULL,
  `Prod_plan_month` double NOT NULL,
  `Cycle_time` double NOT NULL,
  `Dandori_time` double NOT NULL,
  `Trimming_depr_cost` double NOT NULL,
  PRIMARY KEY (`Kode_mchntrimm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `machine_trimming`
--

INSERT INTO `machine_trimming` (`Kode_mchntrimm`, `Dia_nominal`, `Length_range`, `Mchn_trimming`, `Mchn_price`, `Depr_per_month`, `Output_per_min`, `Working_time`, `Working_time_sec`, `Output_per_day`, `Output_per_month`, `Productivity_ratio`, `Prod_plan_month`, `Cycle_time`, `Dandori_time`, `Trimming_depr_cost`) VALUES
(1, 3, '10 - 35', 'TR 5A', 102863376, 1071494, 70, 23, 13910400, 58800, 1352400, 40, 540960, 0.86, 10800, 1.98),
(2, 4, '10 - 35', 'TR 6A', 152140800, 1584800, 70, 23, 13910400, 58800, 1352400, 60, 811440, 0.86, 10800, 1.95),
(3, 4, '10 - 35', 'TR 5A', 102863376, 1071494, 70, 23, 13910400, 58800, 1352400, 40, 540960, 0.86, 10800, 1.98),
(4, 5, '10 - 35', 'TR 6A', 152140800, 1584800, 70, 23, 13910400, 58800, 1352400, 60, 811440, 0.86, 10800, 1.95),
(5, 5, '10 - 35', 'TR 5A', 102863376, 1071494, 70, 23, 13910400, 58800, 1352400, 40, 540960, 0.86, 10800, 1.98),
(6, 6, '1O - 35', 'TR 6A', 152140800, 1584800, 70, 23, 13910400, 58800, 1352400, 60, 811440, 0.86, 10800, 1.95),
(7, 6, '10 - 35', 'TR 5A', 102863376, 1071494, 70, 23, 13910400, 58800, 1352400, 40, 540960, 0.86, 10800, 1.98),
(8, 6, '15 - 100', 'TR 8A', 99927050, 1040907, 70, 23, 13910400, 58800, 1352400, 25, 338100, 0.86, 10800, 3.08),
(9, 8, '10 - 35', 'TR 6A', 152140800, 1584800, 70, 23, 13910400, 58800, 1352400, 60, 811440, 0.86, 10800, 1.95),
(10, 8, '15 - 100', 'TR 8A', 99927050, 1040907, 70, 23, 13910400, 58800, 1352400, 25, 338100, 0.86, 10800, 3.08),
(11, 10, '15 - 100', 'TR 8A', 99927050, 1040907, 70, 23, 13910400, 58800, 1352400, 25, 338100, 0.86, 10800, 3.08);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `parentId` int(1) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `allowed` varchar(255) NOT NULL,
  `iconCls` varchar(255) NOT NULL,
  `type` enum('dialog','messager','tabs','window') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `parentId`, `uri`, `allowed`, `iconCls`, `type`) VALUES
(1, 'Master', 0, '', '+1+2+', 'icon-master', ''),
(2, 'Transaksi', 0, '', '+1+2+3+', 'icon-transaksi', ''),
(3, 'Report', 0, '', '+1+2+', 'icon-print', ''),
(4, 'Admin', 0, '', '+1+', 'icon-admin', ''),
(5, 'Setting', 0, '', '+1+2+', 'icon-setup', ''),
(6, 'Admin User', 4, 'admin/user', '+1+', 'icon-user', 'tabs'),
(7, 'Admin Menu', 4, 'admin/menu', '+1+', 'icon-menu', 'tabs'),
(8, 'Supplier', 1, 'master/supplier', '+1+2+', 'icon-master', 'tabs'),
(9, 'Customer', 1, 'master/customer', '+1+2+', 'icon-master', 'tabs'),
(11, 'Wire Price', 1, 'master/wire', '+1+2+', 'icon-master', 'tabs'),
(12, 'Wire Type', 1, 'master/typewire', '+1+2+', 'icon-master', 'tabs'),
(13, 'Washer', 1, 'master/washer', '+1+2+', 'icon-master', 'tabs'),
(15, 'Process', 1, '', '+1+2+', 'icon-master', 'tabs'),
(16, 'Coating', 15, 'master/process/coating', '+1+2+', 'icon-master', 'tabs'),
(17, 'Furnace (kg)', 15, 'master/process/furnace', '+1+2+', 'icon-master', 'tabs'),
(18, 'Assembly', 15, 'master/process/assembly', '+1+2+', 'icon-master', 'tabs'),
(19, 'Tools', 1, '', '+1+2+', 'icon-master', 'tabs'),
(20, 'Heading Category', 19, 'master/tools/headingcat', '+1+2+', 'icon-master', 'tabs'),
(21, 'Heading 1 dies', 19, 'master/tools/heading1', '+1+2+', 'icon-master', 'tabs'),
(22, 'Heading 2 dies', 19, 'master/tools/heading2', '+1+2+', 'icon-master', 'tabs'),
(23, 'Heading 4 dies', 19, 'master/tools/heading4', '+1+2+', 'icon-master', 'tabs'),
(24, 'Rolling', 19, 'master/tools/rolling', '+1+2+', 'icon-master', 'tabs'),
(25, 'Cutting', 19, 'master/tools/cutting', '+1+2+', 'icon-master', 'tabs'),
(26, 'Slotting', 19, 'master/tools/slotting', '+1+2+', 'icon-master', 'tabs'),
(27, 'Trimming', 19, 'master/tools/trimming', '+1+2+', 'icon-master', 'tabs'),
(28, 'Machine', 1, '', '+1+2+', 'icon-master', 'tabs'),
(29, 'Heading', 28, 'master/machine/heading_mchn', '+1+2+', 'icon-master', 'tabs'),
(30, 'Rolling', 28, 'master/machine/rolling_mchn', '+1+2+', 'icon-master', 'tabs'),
(31, 'Cutting', 28, 'master/machine/cutting_mchn', '+1+2+', 'icon-master', 'tabs'),
(32, 'Slotting', 28, 'master/machine/slotting_mchn', '+1+2+', 'icon-master', 'tabs'),
(33, 'Calculation', 2, 'transaksi/calculation', '+1+2+', 'icon-money', 'tabs'),
(34, 'Trimming', 28, 'master/machine/trimming_mchn', '+1+2+', 'icon-master', 'tabs'),
(35, 'Straightening', 28, 'master/machine/straightening_mchn', '+1+2+', 'icon-master', 'tabs'),
(36, 'Pressing', 28, 'master/machine/pressing_mchn', '+1+2+', 'icon-master', 'tabs'),
(37, 'Rolling Category', 19, 'master/tools/rollingcat', '+1+2+', 'icon-master', 'tabs'),
(38, 'Plating (kg)', 15, 'master/process/plating', '+1+2+', 'icon-master', 'tabs'),
(39, 'Labor', 15, 'master/process/labor', '+1+2+', 'icon-master', 'tabs'),
(40, 'Turret (int)', 15, 'master/process/turret', '+1+2+', 'icon-master', 'dialog'),
(41, 'Utility', 15, 'master/process/utility', '+1+2+', 'icon-master', 'tabs'),
(42, 'Furnace 2(pcs)', 15, 'master/process/furnace2', '+1+2+', 'icon-master', 'tabs'),
(43, 'Turret 2(ext)', 15, 'master/process/turret2', '+1+2+', 'icon-master', 'tabs'),
(44, 'Straightening', 15, 'master/process/straightening', '+1+2+', 'icon-master', 'dialog'),
(45, 'CalculationAppAccMgr', 2, 'transaksi/calculationAppAccMgr', '+1+3+', 'icon-money', 'tabs'),
(46, 'CalculationAppMktStaff', 2, 'transaksi/calculationAppMktStaff', '+1+4+', 'icon-money', 'tabs'),
(47, 'CalculationAppMktMgr', 2, 'transaksi/calculationAppMktMgr', '+1+5+', 'icon-money', 'tabs'),
(48, 'CalculationPI', 2, 'transaksi/calculationPI', '+1+6+', 'icon-money', 'tabs'),
(49, 'Plating 2(pcs)', 15, 'master/process/plating2', '+1+2+', 'icon-master', 'tabs');

-- --------------------------------------------------------

--
-- Table structure for table `plating`
--

CREATE TABLE IF NOT EXISTS `plating` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `plating`
--

INSERT INTO `plating` (`Id`, `Kode_Supp`, `Name`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'HJP-CBT', 'SRK 4 X 12.7 TIN ANL', 15000, 'IDR', '2014-09-09', 'YES'),
(2, 'HJP-CBT', 'SRK 4 X 7.9 TIN ANL', 15000, 'IDR', '2014-09-09', 'YES'),
(3, 'HJP-CBT', 'COPPER ANTIK', 10500, 'IDR', '2014-05-21', 'YES'),
(4, 'HJP-CBT', 'MC3', 4000, 'IDR', '2014-01-17', 'YES'),
(5, 'HJP-CBT', 'CF', 4000, 'IDR', '2014-01-17', 'YES'),
(6, 'HJP-CBT', 'BRASS', 18500, 'IDR', '2013-12-16', 'YES'),
(7, 'HJP-CBT', 'BLACK NICKEL', 15000, 'IDR', '2013-10-14', 'YES'),
(8, 'HJP-CBT', 'BLACK OXIDE (SUS 430)', 3800, 'IDR', '2013-10-03', 'YES'),
(9, 'HJP-CBT', 'COPPER + ANTIOKSIDAN (SUS 430)', 19700, 'IDR', '2013-10-03', 'YES'),
(10, 'HJP-CBT', 'WAX', 1800, 'IDR', '2013-04-10', 'YES'),
(11, 'HJP-CBT', 'BLACKENING ALKALINE', 3700, 'IDR', '2013-04-10', 'YES'),
(12, 'HJP-CBT', 'TIN COPPER', 12500, 'IDR', '2014-04-02', 'YES'),
(13, 'HJP-CBT', 'PHOSPATING', 2500, 'IDR', '2013-02-21', 'YES'),
(14, 'HJP-CBT', 'RUST PREVENTIVE', 2000, 'IDR', '2013-02-21', 'YES'),
(15, 'HJP-CBT', 'BLACK PHOSPATE', 2000, 'IDR', '2012-10-12', 'YES'),
(16, 'HJP-CBT', 'BLACK OXIDE', 2000, 'IDR', '2012-10-12', 'YES'),
(17, 'HJP-CBT', 'BC', 2500, 'IDR', '2012-10-12', 'YES'),
(18, 'HJP-CBT', 'BC3', 9750, 'IDR', '2012-10-12', 'YES'),
(19, 'HJP-CBT', 'BR', 15000, 'IDR', '2012-12-03', 'YES'),
(20, 'HJP-CBT', 'CU', 7000, 'IDR', '2012-12-03', 'YES'),
(21, 'HJP-CBT', 'EB', 8600, 'IDR', '2012-12-03', 'YES'),
(22, 'HJP-CBT', 'GR', 3200, 'IDR', '2012-12-03', 'YES'),
(23, 'HJP-CBT', 'HO', 2000, 'IDR', '2012-12-03', 'YES'),
(24, 'HJP-CBT', 'CUCI', 1850, 'IDR', '2012-12-03', 'YES'),
(25, 'HJP-CBT', 'MC', 1500, 'IDR', '2012-12-03', 'YES'),
(26, 'HJP-CBT', 'NI', 14000, 'IDR', '2012-12-03', 'YES'),
(27, 'HJP-CBT', 'NI3', 10500, 'IDR', '2012-12-03', 'YES'),
(28, 'HJP-CBT', 'PS', 1850, 'IDR', '2012-12-03', 'YES'),
(29, 'HJP-CBT', 'SUS', 1850, 'IDR', '2012-12-03', 'YES'),
(30, 'HJP-CBT', 'TN', 9000, 'IDR', '2012-12-03', 'YES'),
(31, 'HJP-CBT', 'UC', 2000, 'IDR', '2012-12-03', 'YES'),
(32, 'HJP-CBT', 'ZK', 4300, 'IDR', '2012-12-03', 'YES'),
(33, 'HJP-CBT', 'ZN', 2500, 'IDR', '2012-12-03', 'YES'),
(34, 'HJP-CBT', 'GB', 6500, 'IDR', '2012-12-03', 'YES'),
(35, 'HJP-CBT', 'BN', 17000, 'IDR', '2012-12-03', 'YES'),
(36, 'HJP-CBT', 'NC', 26500, 'IDR', '2012-12-03', 'YES'),
(37, 'HJP-CBT', 'KF', 8600, 'IDR', '2012-12-03', 'YES'),
(38, 'HJP-CBT', 'BAKING', 650, 'IDR', '2012-12-03', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `plating2`
--

CREATE TABLE IF NOT EXISTS `plating2` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sesdata`
--

CREATE TABLE IF NOT EXISTS `sesdata` (
  `Scrap` int(1) NOT NULL,
  `Exch_rate` double NOT NULL,
  `Profit_rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sesdata`
--

INSERT INTO `sesdata` (`Scrap`, `Exch_rate`, `Profit_rate`) VALUES
(5, 13073, 19);

-- --------------------------------------------------------

--
-- Table structure for table `straightening`
--

CREATE TABLE IF NOT EXISTS `straightening` (
  `Gaji` double NOT NULL,
  `Estimasi` double NOT NULL,
  `Working_day` double NOT NULL,
  `Working_hour` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `straightening`
--

INSERT INTO `straightening` (`Gaji`, `Estimasi`, `Working_day`, `Working_hour`) VALUES
(3245000, 85, 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `Id` varchar(20) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `PayTerm` int(1) NOT NULL,
  `SuppGroup` enum('LOKAL','IMPORT') NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Id`, `Name`, `PayTerm`, `SuppGroup`) VALUES
('AKB', 'ANUGRAH KEMENANGAN BERSAMA', 30, 'LOKAL'),
('BIMA', 'PT. BIMA EKARAYA TEKNIK', 30, 'LOKAL'),
('CP', 'PT. CHUNPAO STEEL INDONESIA', 30, 'LOKAL'),
('HJP-CBT', 'PT. HOTMAL JAYA PERKASA', 30, 'LOKAL'),
('HMP', 'PT. HIKARI METALINDO PRATAMA', 30, 'LOKAL'),
('IWWI', 'PT. IRON WIRE WORKS INDONESIA', 30, 'LOKAL'),
('JML', 'PT. JAKARTA MARTEN LOGAMINDO', 30, 'LOKAL'),
('KOS', 'KOS LIMITED', 30, 'IMPORT'),
('MAM', 'PT. MANDIRI AKSARA MULIA', 30, 'LOKAL'),
('MASTER', 'PD. MASTER', 30, 'LOKAL'),
('NIC', 'PT. NIC INDONESIA', 30, 'LOKAL'),
('OMI', 'PT. OCHIAI MENARA INDONESIA', 30, 'LOKAL'),
('PARKER', 'PT. PARKER METAL', 30, 'LOKAL'),
('SIM', 'CV. SIGMA INDONESIA MANUFACTURING', 30, 'LOKAL'),
('SPS', 'SRIREJEKI PERDANA STEEL', 30, 'LOKAL'),
('STEP', 'PT. SARI TAKAGI ELOK PRODUK', 30, 'LOKAL'),
('STS', 'PT. SAGATEKNINDO SEJATI', 30, 'LOKAL'),
('TBM', 'PT. THREE BOND MANUFACTURING IND.', 30, 'LOKAL'),
('TMI', 'PT. TECHNO METAL INDUSTRY', 30, 'LOKAL'),
('TMS', 'PT. TEMBAGA MULIA SEMANAN', 30, 'LOKAL'),
('ZHE JIANG', 'ZHEJIANG TOKUHATSU METALPROD.CORP', 30, 'IMPORT');

-- --------------------------------------------------------

--
-- Table structure for table `tools_cutting`
--

CREATE TABLE IF NOT EXISTS `tools_cutting` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Diameter` double NOT NULL,
  `Min_panjang` double NOT NULL,
  `Max_panjang` double NOT NULL,
  `Cost` double NOT NULL,
  `Currency` enum('IDR','USD') NOT NULL,
  `Tgl_Update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tools_cutting`
--

INSERT INTO `tools_cutting` (`Id`, `Diameter`, `Min_panjang`, `Max_panjang`, `Cost`, `Currency`, `Tgl_Update`, `Active`) VALUES
(1, 3, 10, 100, 1.18, 'IDR', '2010-01-01', 'YES'),
(2, 3.5, 10, 100, 1.18, 'IDR', '2010-01-01', 'YES'),
(3, 4, 10, 100, 2.24, 'IDR', '2010-01-01', 'YES'),
(4, 5, 10, 100, 2.24, 'IDR', '2010-01-01', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_heading1`
--

CREATE TABLE IF NOT EXISTS `tools_heading1` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Category1` varchar(50) NOT NULL,
  `Diameter` double NOT NULL,
  `Min_panjang` double NOT NULL,
  `Max_panjang` double NOT NULL,
  `Cost` double NOT NULL,
  `Currency` enum('IDR','USD') NOT NULL,
  `Tgl_Update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=187 ;

--
-- Dumping data for table `tools_heading1`
--

INSERT INTO `tools_heading1` (`Id`, `Category1`, `Diameter`, `Min_panjang`, `Max_panjang`, `Cost`, `Currency`, `Tgl_Update`, `Active`) VALUES
(1, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 2, 4, 20, 2.96, 'IDR', '2010-01-02', 'YES'),
(2, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 2.6, 4, 20, 2.96, 'IDR', '2010-01-02', 'YES'),
(3, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 3, 4, 19, 3.35, 'IDR', '2010-01-02', 'YES'),
(4, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 3, 20, 30, 3.46, 'IDR', '2010-01-02', 'YES'),
(5, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 3.5, 4, 19, 3.35, 'IDR', '2010-01-02', 'YES'),
(6, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 3.5, 20, 30, 3.46, 'IDR', '2010-01-02', 'YES'),
(7, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 4, 6, 17, 4.32, 'IDR', '2010-01-02', 'YES'),
(8, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 4, 18, 50, 4.43, 'IDR', '2010-01-02', 'YES'),
(9, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 4.5, 6, 17, 4.32, 'IDR', '2010-01-02', 'YES'),
(10, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 4.5, 18, 50, 4.43, 'IDR', '2010-01-02', 'YES'),
(11, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 5, 6, 21, 5.27, 'IDR', '2010-01-02', 'YES'),
(12, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 5, 22, 50, 5.38, 'IDR', '2010-01-02', 'YES'),
(13, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 6, 6, 21, 7.18, 'IDR', '2010-01-02', 'YES'),
(14, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 6, 22, 57, 7.79, 'IDR', '2010-01-02', 'YES'),
(15, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 6, 58, 110, 8.23, 'IDR', '2010-01-02', 'YES'),
(16, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 8, 10, 27, 9.36, 'IDR', '2010-01-02', 'YES'),
(17, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 8, 28, 57, 9.54, 'IDR', '2010-01-02', 'YES'),
(18, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 8, 58, 110, 11.51, 'IDR', '2010-01-02', 'YES'),
(19, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 10, 12, 27, 17.87, 'IDR', '2010-01-02', 'YES'),
(20, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 10, 28, 57, 17.89, 'IDR', '2010-01-02', 'YES'),
(21, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 10, 58, 140, 18.53, 'IDR', '2010-01-02', 'YES'),
(22, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 12, 141, 200, 66.11, 'IDR', '2010-01-02', 'YES'),
(23, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 2, 4, 20, 3.21, 'IDR', '2010-01-02', 'YES'),
(24, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 2.6, 4, 20, 3.21, 'IDR', '2010-01-02', 'YES'),
(25, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 3, 4, 19, 3.61, 'IDR', '2010-01-02', 'YES'),
(26, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 3, 20, 30, 3.81, 'IDR', '2010-01-02', 'YES'),
(27, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 3.5, 4, 19, 3.61, 'IDR', '2010-01-02', 'YES'),
(28, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 3.5, 20, 30, 3.81, 'IDR', '2010-01-02', 'YES'),
(29, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 4, 6, 17, 4.67, 'IDR', '2010-01-02', 'YES'),
(30, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 4, 18, 50, 4.97, 'IDR', '2010-01-02', 'YES'),
(31, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 4.5, 6, 17, 4.67, 'IDR', '2010-01-02', 'YES'),
(32, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 4.5, 18, 50, 4.97, 'IDR', '2010-01-02', 'YES'),
(33, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 5, 6, 21, 5.61, 'IDR', '2010-01-02', 'YES'),
(34, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 5, 22, 50, 6.33, 'IDR', '2010-01-02', 'YES'),
(35, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 6, 6, 21, 7.49, 'IDR', '2010-01-02', 'YES'),
(36, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 6, 22, 57, 8.25, 'IDR', '2010-01-02', 'YES'),
(37, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 6, 58, 110, 9.09, 'IDR', '2010-01-02', 'YES'),
(38, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 8, 10, 27, 9.66, 'IDR', '2010-01-02', 'YES'),
(39, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 8, 28, 57, 9.96, 'IDR', '2010-01-02', 'YES'),
(40, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 8, 58, 110, 12.38, 'IDR', '2010-01-02', 'YES'),
(41, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 10, 12, 27, 18.01, 'IDR', '2010-01-02', 'YES'),
(42, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 10, 28, 57, 18.31, 'IDR', '2010-01-02', 'YES'),
(43, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 10, 58, 140, 19.55, 'IDR', '2010-01-02', 'YES'),
(44, 'TAPTITE SCREW', 2, 4, 20, 3.33, 'IDR', '2010-01-02', 'YES'),
(45, 'TAPTITE SCREW', 2.6, 4, 20, 3.33, 'IDR', '2010-01-02', 'YES'),
(46, 'TAPTITE SCREW', 3, 4, 19, 3.76, 'IDR', '2010-01-02', 'YES'),
(47, 'TAPTITE SCREW', 3, 20, 30, 4.37, 'IDR', '2010-01-02', 'YES'),
(48, 'TAPTITE SCREW', 3.5, 4, 19, 3.76, 'IDR', '2010-01-02', 'YES'),
(49, 'TAPTITE SCREW', 3.5, 20, 30, 4.37, 'IDR', '2010-01-02', 'YES'),
(50, 'TAPTITE SCREW', 4, 6, 17, 4.72, 'IDR', '2010-01-02', 'YES'),
(51, 'TAPTITE SCREW', 4, 18, 50, 5.34, 'IDR', '2010-01-02', 'YES'),
(52, 'TAPTITE SCREW', 4.5, 6, 17, 4.72, 'IDR', '2010-01-02', 'YES'),
(53, 'TAPTITE SCREW', 4.5, 18, 50, 5.34, 'IDR', '2010-01-02', 'YES'),
(54, 'TAPTITE SCREW', 5, 6, 21, 5.72, 'IDR', '2010-01-02', 'YES'),
(55, 'TAPTITE SCREW', 5, 22, 50, 6.4, 'IDR', '2010-01-02', 'YES'),
(56, 'TAPTITE SCREW', 6, 6, 21, 8.19, 'IDR', '2010-01-02', 'YES'),
(57, 'TAPTITE SCREW', 6, 22, 56, 9.93, 'IDR', '2010-01-02', 'YES'),
(58, 'FLANGE BOLT', 5, 6, 21, 17.58, 'IDR', '2010-01-02', 'YES'),
(59, 'FLANGE BOLT', 5, 22, 50, 17.7, 'IDR', '2010-01-02', 'YES'),
(60, 'FLANGE BOLT', 6, 6, 21, 28.32, 'IDR', '2010-01-02', 'YES'),
(61, 'FLANGE BOLT', 6, 22, 57, 28.93, 'IDR', '2010-01-02', 'YES'),
(62, 'FLANGE BOLT', 6, 58, 110, 29.37, 'IDR', '2010-01-02', 'YES'),
(63, 'FLANGE BOLT', 8, 10, 27, 44.77, 'IDR', '2010-01-02', 'YES'),
(64, 'FLANGE BOLT', 8, 28, 57, 44.95, 'IDR', '2010-01-02', 'YES'),
(65, 'FLANGE BOLT', 8, 58, 110, 57.99, 'IDR', '2010-01-02', 'YES'),
(66, 'FLANGE BOLT', 10, 12, 27, 81.27, 'IDR', '2010-01-02', 'YES'),
(67, 'FLANGE BOLT', 10, 28, 57, 81.3, 'IDR', '2010-01-02', 'YES'),
(68, 'FLANGE BOLT', 10, 58, 140, 81.93, 'IDR', '2010-01-02', 'YES'),
(69, 'FLANGE BOLT', 12, 141, 200, 169.86, 'IDR', '2010-01-02', 'YES'),
(70, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 2, 4, 20, 2.16, 'IDR', '2010-01-02', 'YES'),
(71, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 2.6, 4, 20, 2.16, 'IDR', '2010-01-02', 'YES'),
(72, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 3, 4, 19, 2.55, 'IDR', '2010-01-02', 'YES'),
(73, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 3, 20, 30, 2.67, 'IDR', '2010-01-02', 'YES'),
(74, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 3.5, 4, 19, 2.55, 'IDR', '2010-01-02', 'YES'),
(75, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 3.5, 20, 30, 2.67, 'IDR', '2010-01-02', 'YES'),
(76, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 4, 6, 17, 3.55, 'IDR', '2010-01-02', 'YES'),
(77, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 4, 18, 50, 3.66, 'IDR', '2010-01-02', 'YES'),
(78, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 4.5, 6, 17, 3.55, 'IDR', '2010-01-02', 'YES'),
(79, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 4.5, 18, 50, 3.66, 'IDR', '2010-01-02', 'YES'),
(80, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 5, 6, 21, 3.57, 'IDR', '2010-01-02', 'YES'),
(81, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 5, 22, 50, 3.68, 'IDR', '2010-01-02', 'YES'),
(82, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 6, 6, 21, 5.45, 'IDR', '2010-01-02', 'YES'),
(83, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 6, 22, 57, 6.06, 'IDR', '2010-01-02', 'YES'),
(84, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 6, 58, 110, 6.49, 'IDR', '2010-01-02', 'YES'),
(85, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 8, 10, 27, 6.58, 'IDR', '2010-01-02', 'YES'),
(86, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 8, 28, 57, 6.76, 'IDR', '2010-01-02', 'YES'),
(87, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 8, 58, 110, 8.73, 'IDR', '2010-01-02', 'YES'),
(88, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 10, 12, 27, 8.68, 'IDR', '2010-01-02', 'YES'),
(89, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 10, 28, 57, 8.7, 'IDR', '2010-01-02', 'YES'),
(90, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 10, 58, 140, 9.34, 'IDR', '2010-01-02', 'YES'),
(91, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 3, 4, 19, 4.66, 'IDR', '2010-01-02', 'YES'),
(92, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 3, 20, 30, 4.68, 'IDR', '2010-01-02', 'YES'),
(93, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 3.5, 4, 19, 4.66, 'IDR', '2010-01-02', 'YES'),
(94, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 3.5, 20, 30, 4.68, 'IDR', '2010-01-02', 'YES'),
(95, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 4, 6, 17, 5.82, 'IDR', '2010-01-02', 'YES'),
(96, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 4, 18, 50, 5.82, 'IDR', '2010-01-02', 'YES'),
(97, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 4.5, 6, 17, 5.82, 'IDR', '2010-01-02', 'YES'),
(98, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 4.5, 18, 50, 5.82, 'IDR', '2010-01-02', 'YES'),
(99, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 5, 6, 21, 7.4, 'IDR', '2010-01-02', 'YES'),
(100, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 5, 22, 50, 7.4, 'IDR', '2010-01-02', 'YES'),
(101, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 6, 6, 21, 9.71, 'IDR', '2010-01-02', 'YES'),
(102, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 6, 22, 57, 10.17, 'IDR', '2010-01-02', 'YES'),
(103, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 6, 58, 110, 10.19, 'IDR', '2010-01-02', 'YES'),
(104, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 8, 10, 27, 11.95, 'IDR', '2010-01-02', 'YES'),
(105, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 8, 28, 57, 11.95, 'IDR', '2010-01-02', 'YES'),
(106, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 8, 58, 110, 13.54, 'IDR', '2010-01-02', 'YES'),
(107, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 10, 12, 27, 14.3, 'IDR', '2010-01-02', 'YES'),
(108, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 10, 28, 57, 14.3, 'IDR', '2010-01-02', 'YES'),
(109, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 10, 58, 140, 14.56, 'IDR', '2010-01-02', 'YES'),
(110, 'WOOD SCREW', 2, 4, 20, 2.22, 'IDR', '2010-01-02', 'YES'),
(111, 'WOOD SCREW', 2.6, 4, 20, 2.22, 'IDR', '2010-01-02', 'YES'),
(112, 'WOOD SCREW', 3, 4, 19, 2.61, 'IDR', '2010-01-02', 'YES'),
(113, 'WOOD SCREW', 3, 20, 30, 2.61, 'IDR', '2010-01-02', 'YES'),
(114, 'WOOD SCREW', 3.5, 4, 19, 2.61, 'IDR', '2010-01-02', 'YES'),
(115, 'WOOD SCREW', 3.5, 20, 30, 2.61, 'IDR', '2010-01-02', 'YES'),
(116, 'WOOD SCREW', 4, 6, 17, 4.35, 'IDR', '2010-01-02', 'YES'),
(117, 'WOOD SCREW', 4, 18, 50, 4.39, 'IDR', '2010-01-02', 'YES'),
(118, 'WOOD SCREW', 4.5, 6, 17, 4.35, 'IDR', '2010-01-02', 'YES'),
(119, 'WOOD SCREW', 4.5, 18, 50, 4.39, 'IDR', '2010-01-02', 'YES'),
(120, 'WOOD SCREW', 5, 6, 21, 5.57, 'IDR', '2010-01-02', 'YES'),
(121, 'WOOD SCREW', 5, 22, 50, 5.77, 'IDR', '2010-01-02', 'YES'),
(122, 'WOOD SCREW', 6, 6, 21, 9.59, 'IDR', '2010-01-02', 'YES'),
(123, 'WOOD SCREW', 6, 22, 56, 9.59, 'IDR', '2010-01-02', 'YES'),
(124, 'TUBULAR RIVET', 2, 4, 20, 3.79, 'IDR', '2010-01-02', 'YES'),
(125, 'TUBULAR RIVET', 2.6, 4, 20, 3.79, 'IDR', '2010-01-02', 'YES'),
(126, 'TUBULAR RIVET', 3, 4, 19, 3.9, 'IDR', '2010-01-02', 'YES'),
(127, 'TUBULAR RIVET', 3, 20, 30, 3.9, 'IDR', '2010-01-02', 'YES'),
(128, 'TUBULAR RIVET', 3.5, 4, 19, 3.9, 'IDR', '2010-01-02', 'YES'),
(129, 'TUBULAR RIVET', 3.5, 20, 30, 3.9, 'IDR', '2010-01-02', 'YES'),
(130, 'TUBULAR RIVET', 4, 6, 17, 5.1, 'IDR', '2010-01-02', 'YES'),
(131, 'TUBULAR RIVET', 4, 18, 50, 5.14, 'IDR', '2010-01-02', 'YES'),
(132, 'TUBULAR RIVET', 4.5, 6, 17, 5.1, 'IDR', '2010-01-02', 'YES'),
(133, 'TUBULAR RIVET', 4.5, 18, 50, 5.14, 'IDR', '2010-01-02', 'YES'),
(134, 'TUBULAR RIVET', 5, 6, 21, 5.58, 'IDR', '2010-01-02', 'YES'),
(135, 'TUBULAR RIVET', 5, 22, 50, 5.78, 'IDR', '2010-01-02', 'YES'),
(136, 'SUS MACHINE SCREW', 2, 4, 20, 4.25, 'IDR', '2010-01-02', 'YES'),
(137, 'SUS MACHINE SCREW', 2.6, 4, 20, 4.25, 'IDR', '2010-01-02', 'YES'),
(138, 'SUS MACHINE SCREW', 3, 4, 19, 5.13, 'IDR', '2010-01-02', 'YES'),
(139, 'SUS MACHINE SCREW', 3, 20, 30, 5.13, 'IDR', '2010-01-02', 'YES'),
(140, 'SUS MACHINE SCREW', 3.5, 4, 19, 5.13, 'IDR', '2010-01-02', 'YES'),
(141, 'SUS MACHINE SCREW', 3.5, 20, 30, 5.13, 'IDR', '2010-01-02', 'YES'),
(142, 'SUS MACHINE SCREW', 4, 6, 17, 5.54, 'IDR', '2010-01-02', 'YES'),
(143, 'SUS MACHINE SCREW', 4, 18, 50, 5.69, 'IDR', '2010-01-02', 'YES'),
(144, 'SUS MACHINE SCREW', 4.5, 6, 17, 5.54, 'IDR', '2010-01-02', 'YES'),
(145, 'SUS MACHINE SCREW', 4.5, 18, 50, 5.69, 'IDR', '2010-01-02', 'YES'),
(146, 'SUS MACHINE SCREW', 5, 6, 21, 6.82, 'IDR', '2010-01-02', 'YES'),
(147, 'SUS MACHINE SCREW', 5, 22, 50, 7.24, 'IDR', '2010-01-02', 'YES'),
(148, 'SUS MACHINE SCREW', 6, 6, 21, 12.06, 'IDR', '2010-01-02', 'YES'),
(149, 'SUS MACHINE SCREW', 6, 22, 57, 12.06, 'IDR', '2010-01-02', 'YES'),
(150, 'SUS MACHINE SCREW', 6, 58, 110, 13.07, 'IDR', '2010-01-02', 'YES'),
(151, 'SUS MACHINE SCREW', 8, 10, 27, 14.62, 'IDR', '2010-01-02', 'YES'),
(152, 'SUS MACHINE SCREW', 8, 28, 57, 14.62, 'IDR', '2010-01-02', 'YES'),
(153, 'SUS MACHINE SCREW', 8, 58, 110, 16.1, 'IDR', '2010-01-02', 'YES'),
(154, 'SUS HEXAGONAL TRIMMING', 2, 4, 20, 4.25, 'IDR', '2010-01-02', 'YES'),
(155, 'SUS HEXAGONAL TRIMMING', 2.6, 4, 20, 4.25, 'IDR', '2010-01-02', 'YES'),
(156, 'SUS HEXAGONAL TRIMMING', 3, 4, 19, 5.13, 'IDR', '2010-01-02', 'YES'),
(157, 'SUS HEXAGONAL TRIMMING', 3, 20, 30, 5.13, 'IDR', '2010-01-02', 'YES'),
(158, 'SUS HEXAGONAL TRIMMING', 3.5, 4, 19, 5.13, 'IDR', '2010-01-02', 'YES'),
(159, 'SUS HEXAGONAL TRIMMING', 3.5, 20, 30, 5.13, 'IDR', '2010-01-02', 'YES'),
(160, 'SUS HEXAGONAL TRIMMING', 4, 6, 17, 5.54, 'IDR', '2010-01-02', 'YES'),
(161, 'SUS HEXAGONAL TRIMMING', 4, 18, 50, 5.69, 'IDR', '2010-01-02', 'YES'),
(162, 'SUS HEXAGONAL TRIMMING', 4.5, 6, 17, 5.54, 'IDR', '2010-01-02', 'YES'),
(163, 'SUS HEXAGONAL TRIMMING', 4.5, 18, 50, 5.69, 'IDR', '2010-01-02', 'YES'),
(164, 'SUS HEXAGONAL TRIMMING', 5, 6, 21, 6.82, 'IDR', '2010-01-02', 'YES'),
(165, 'SUS HEXAGONAL TRIMMING', 5, 22, 50, 7.24, 'IDR', '2010-01-02', 'YES'),
(166, 'SUS HEXAGONAL TRIMMING', 6, 6, 21, 12.06, 'IDR', '2010-01-02', 'YES'),
(167, 'SUS HEXAGONAL TRIMMING', 6, 22, 57, 12.06, 'IDR', '2010-01-02', 'YES'),
(168, 'SUS HEXAGONAL TRIMMING', 6, 58, 110, 13.07, 'IDR', '2010-01-02', 'YES'),
(169, 'SUS HEXAGONAL TRIMMING', 8, 10, 27, 14.62, 'IDR', '2010-01-02', 'YES'),
(170, 'SUS HEXAGONAL TRIMMING', 8, 28, 57, 14.62, 'IDR', '2010-01-02', 'YES'),
(171, 'SUS HEXAGONAL TRIMMING', 8, 58, 110, 16.1, 'IDR', '2010-01-02', 'YES'),
(172, 'SUS HEXAGONAL TRIMMING', 10, 12, 26, 16.16, 'IDR', '2010-01-02', 'YES'),
(173, 'SUS TAPPING SCREW', 2, 4, 20, 4.48, 'IDR', '2010-01-02', 'YES'),
(174, 'SUS TAPPING SCREW', 2.6, 4, 20, 4.48, 'IDR', '2010-01-02', 'YES'),
(175, 'SUS TAPPING SCREW', 3, 4, 19, 5.18, 'IDR', '2010-01-02', 'YES'),
(176, 'SUS TAPPING SCREW', 3, 20, 30, 5.18, 'IDR', '2010-01-02', 'YES'),
(177, 'SUS TAPPING SCREW', 3.5, 4, 19, 5.18, 'IDR', '2010-01-02', 'YES'),
(178, 'SUS TAPPING SCREW', 3.5, 20, 30, 5.18, 'IDR', '2010-01-02', 'YES'),
(179, 'SUS TAPPING SCREW', 4, 6, 17, 5.45, 'IDR', '2010-01-02', 'YES'),
(180, 'SUS TAPPING SCREW', 4, 18, 50, 5.64, 'IDR', '2010-01-02', 'YES'),
(181, 'SUS TAPPING SCREW', 4.5, 6, 17, 5.45, 'IDR', '2010-01-02', 'YES'),
(182, 'SUS TAPPING SCREW', 4.5, 18, 50, 5.64, 'IDR', '2010-01-02', 'YES'),
(183, 'SUS TAPPING SCREW', 5, 6, 21, 6.85, 'IDR', '2010-01-02', 'YES'),
(184, 'SUS TAPPING SCREW', 5, 22, 50, 7.47, 'IDR', '2010-01-02', 'YES'),
(185, 'SUS TAPPING SCREW', 6, 6, 21, 11.74, 'IDR', '2010-01-02', 'YES'),
(186, 'SUS TAPPING SCREW', 6, 22, 56, 11.74, 'IDR', '2010-01-02', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_heading2`
--

CREATE TABLE IF NOT EXISTS `tools_heading2` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_screw` varchar(20) NOT NULL,
  `Diameter_nominal` varchar(10) NOT NULL,
  `HD_Price` double NOT NULL,
  `HD_Lifetime` double NOT NULL,
  `HDI_Price` double NOT NULL,
  `HDI_Lifetime` double NOT NULL,
  `HDP_Price` double NOT NULL,
  `HDP_Lifetime` double NOT NULL,
  `HDC_Price` double NOT NULL,
  `HDC_Lifetime` double NOT NULL,
  `HR_Price` double NOT NULL,
  `HR_Lifetime` double NOT NULL,
  `S_Price` double NOT NULL,
  `S_Lifetime` double NOT NULL,
  `SP_Price` double NOT NULL,
  `SP_Lifetime` double NOT NULL,
  `SC_Price` double NOT NULL,
  `SC_Lifetime` double NOT NULL,
  `SB_Price` double NOT NULL,
  `SB_Lifetime` double NOT NULL,
  `CD_Price` double NOT NULL,
  `CD_Lifetime` double NOT NULL,
  `CK_Price` double NOT NULL,
  `CK_Lifetime` double NOT NULL,
  `P_Price` double NOT NULL,
  `P_Lifetime` double NOT NULL,
  `SPu_Price` double NOT NULL,
  `SPu_Lifetime` double NOT NULL,
  `PP_Price` double NOT NULL,
  `PP_Lifetime` double NOT NULL,
  `PC_Price` double NOT NULL,
  `PC_Lifetime` double NOT NULL,
  `PB_Price` double NOT NULL,
  `PB_Lifetime` double NOT NULL,
  `SSCoak_Price` double NOT NULL,
  `SSCoak_Lifetime` double NOT NULL,
  `SSNoCoak_Price` double NOT NULL,
  `SSNoCoak_Lifetime` double NOT NULL,
  `Price_pcs` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tools_heading2`
--

INSERT INTO `tools_heading2` (`Id`, `Type_screw`, `Diameter_nominal`, `HD_Price`, `HD_Lifetime`, `HDI_Price`, `HDI_Lifetime`, `HDP_Price`, `HDP_Lifetime`, `HDC_Price`, `HDC_Lifetime`, `HR_Price`, `HR_Lifetime`, `S_Price`, `S_Lifetime`, `SP_Price`, `SP_Lifetime`, `SC_Price`, `SC_Lifetime`, `SB_Price`, `SB_Lifetime`, `CD_Price`, `CD_Lifetime`, `CK_Price`, `CK_Lifetime`, `P_Price`, `P_Lifetime`, `SPu_Price`, `SPu_Lifetime`, `PP_Price`, `PP_Lifetime`, `PC_Price`, `PC_Lifetime`, `PB_Price`, `PB_Lifetime`, `SSCoak_Price`, `SSCoak_Lifetime`, `SSNoCoak_Price`, `SSNoCoak_Lifetime`, `Price_pcs`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'UMS', '5', 0, 1, 192.66, 500000, 4.08, 200000, 216.3, 800000, 229.75, 30000, 69.19, 700000, 3.12, 100000, 14.16, 2000000, 7.16, 2000000, 33.2, 4000000, 38.35, 5000000, 55.24, 3000000, 18.51, 20000, 12.51, 10000, 25.25, 2000000, 0, 1, 10.08, 200000, 10.08, 1000000, 0.010759, 'USD', '2015-06-04', 'YES'),
(2, 'RVF', '5', 99.28, 2000000, 0, 1, 2.16, 200000, 0, 1, 0, 1, 69.19, 700000, 0, 1, 14.16, 2000000, 7.16, 2000000, 19.47, 4000000, 37.6, 5000000, 119, 3000000, 0, 1, 0, 1, 13.91, 2000000, 0, 1, 10.08, 200000, 10.08, 1000000, 0.000289, 'USD', '2015-06-05', 'YES'),
(3, 'RVK', '5', 141.36, 2000000, 0, 1, 4.74, 200000, 0, 1, 0, 1, 69.19, 700000, 0, 1, 14.16, 2000000, 7.16, 2000000, 33.2, 4000000, 38.35, 5000000, 119, 3000000, 0, 1, 0, 1, 13.91, 2000000, 0, 1, 10.08, 200000, 10.08, 1000000, 0.000327, 'USD', '2015-06-05', 'YES'),
(4, 'TSBIP', '3', 415.93, 700000, 0, 1, 2.94, 200000, 0, 1, 0, 1, 69.19, 200000, 3.12, 100000, 0, 1, 0, 1, 33.2, 4000000, 38.5, 3000000, 122.65, 300000, 3.02, 20000, 0, 1, 0, 1, 0, 1, 9.361, 200000, 9.361, 1000000, 0.001623, 'USD', '2015-06-25', 'YES'),
(5, 'UMF', '7', 0, 1, 51.72, 400000, 0, 1, 67.59, 800000, 54.62, 30000, 66.64, 700000, 1.84, 100000, 0, 1, 0, 1, 38.75, 4000000, 57.1, 2000000, 0, 1, 5.18, 10000, 0, 1, 25.25, 2000000, 0, 1, 19.507, 200000, 19.507, 10000000, 0.002816, 'USD', '2015-06-29', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_heading4`
--

CREATE TABLE IF NOT EXISTS `tools_heading4` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Type_screw` varchar(20) NOT NULL,
  `Diameter_nominal` varchar(10) NOT NULL,
  `HD_Price` double NOT NULL,
  `HD_Lifetime` double NOT NULL,
  `HDI_Price` double NOT NULL,
  `HDI_Lifetime` double NOT NULL,
  `HDP_Price` double NOT NULL,
  `HDP_Lifetime` double NOT NULL,
  `HDC_Price` double NOT NULL,
  `HDC_Lifetime` double NOT NULL,
  `HR_Price` double NOT NULL,
  `HR_Lifetime` double NOT NULL,
  `S_Price` double NOT NULL,
  `S_Lifetime` double NOT NULL,
  `SP_Price` double NOT NULL,
  `SP_Lifetime` double NOT NULL,
  `SC_Price` double NOT NULL,
  `SC_Lifetime` double NOT NULL,
  `SB_Price` double NOT NULL,
  `SB_Lifetime` double NOT NULL,
  `CD_Price` double NOT NULL,
  `CD_Lifetime` double NOT NULL,
  `CK_Price` double NOT NULL,
  `CK_Lifetime` double NOT NULL,
  `P_Price` double NOT NULL,
  `P_Lifetime` double NOT NULL,
  `SPu_Price` double NOT NULL,
  `SPu_Lifetime` double NOT NULL,
  `PP_Price` double NOT NULL,
  `PP_Lifetime` double NOT NULL,
  `PC_Price` double NOT NULL,
  `PC_Lifetime` double NOT NULL,
  `PB_Price` double NOT NULL,
  `PB_Lifetime` double NOT NULL,
  `TR_Price` double NOT NULL,
  `TR_Lifetime` double NOT NULL,
  `SSCoak_Price` double NOT NULL,
  `SSCoak_Lifetime` double NOT NULL,
  `SSNoCoak_Price` double NOT NULL,
  `SSNoCoak_Lifetime` double NOT NULL,
  `Price_pcs` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tools_heading4`
--

INSERT INTO `tools_heading4` (`Id`, `Type_screw`, `Diameter_nominal`, `HD_Price`, `HD_Lifetime`, `HDI_Price`, `HDI_Lifetime`, `HDP_Price`, `HDP_Lifetime`, `HDC_Price`, `HDC_Lifetime`, `HR_Price`, `HR_Lifetime`, `S_Price`, `S_Lifetime`, `SP_Price`, `SP_Lifetime`, `SC_Price`, `SC_Lifetime`, `SB_Price`, `SB_Lifetime`, `CD_Price`, `CD_Lifetime`, `CK_Price`, `CK_Lifetime`, `P_Price`, `P_Lifetime`, `SPu_Price`, `SPu_Lifetime`, `PP_Price`, `PP_Lifetime`, `PC_Price`, `PC_Lifetime`, `PB_Price`, `PB_Lifetime`, `TR_Price`, `TR_Lifetime`, `SSCoak_Price`, `SSCoak_Lifetime`, `SSNoCoak_Price`, `SSNoCoak_Lifetime`, `Price_pcs`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'HSMS', '6', 279.71, 2000000, 275.12, 1000000, 8.15, 200000, 449.12, 800000, 173.74, 30000, 0, 1, 30.83, 100000, 0, 1, 0, 1, 45.41, 4000000, 52.71, 2000000, 185.83, 1000000, 0, 1, 16.89, 300000, 117.14, 5000000, 85.7, 5000000, 0, 1, 9.03, 200000, 9.15, 1000000, 0.007491, 'USD', '2015-06-09', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_headingcat`
--

CREATE TABLE IF NOT EXISTS `tools_headingcat` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Category1` varchar(50) NOT NULL,
  `Type_screw` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `tools_headingcat`
--

INSERT INTO `tools_headingcat` (`Id`, `Category1`, `Type_screw`) VALUES
(1, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'BMP'),
(2, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'BMN'),
(3, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'HANGBOLT'),
(4, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'KONTAK PIN'),
(5, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'PIN'),
(6, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMB'),
(7, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMKS'),
(8, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMN'),
(9, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMP'),
(10, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMQ'),
(11, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMR'),
(12, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMT'),
(13, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'SMX'),
(14, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSA'),
(15, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAB'),
(16, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAK'),
(17, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAN'),
(18, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAP'),
(19, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAT'),
(20, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAV'),
(21, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSAZ'),
(22, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSB'),
(23, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBAB'),
(24, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBAP'),
(25, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBB'),
(26, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBK'),
(27, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBN'),
(28, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBP'),
(29, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBT'),
(30, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBV'),
(31, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSCB'),
(32, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSCN'),
(33, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSCP'),
(34, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSCT'),
(35, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSCV'),
(36, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'WELD BOLT'),
(37, 'MACHINE SCREW & TAPPING SCREW KEPALA R', 'TSBAX'),
(38, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'SMF'),
(39, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'SMO'),
(40, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSAF'),
(41, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSAO'),
(42, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSBF'),
(43, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSBO'),
(44, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSBAF'),
(45, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'TSCF'),
(46, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'BMF'),
(47, 'MACHINE SCREW & TAPPING SCREW KEPALA F DAN O', 'BWF'),
(48, 'TAPTITE SCREW', 'BTN'),
(49, 'TAPTITE SCREW', 'CTN'),
(50, 'TAPTITE SCREW', 'PTB'),
(51, 'TAPTITE SCREW', 'STN'),
(52, 'FLANGE BOLT', 'FB'),
(53, 'FLANGE BOLT', 'SMW'),
(54, 'FLANGE BOLT', 'STW'),
(55, 'FLANGE BOLT', 'TSABW'),
(56, 'FLANGE BOLT', 'TSBW'),
(57, 'FLANGE BOLT', 'SMKW'),
(58, 'FLANGE BOLT', 'TSAW'),
(59, 'FLANGE BOLT', 'STUD BOLT'),
(60, 'FLANGE BOLT', 'HSMW'),
(61, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 'SMH TRIMMING'),
(62, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 'RVK SQ'),
(63, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL TRIMMING', 'TAPPING TRIMMING'),
(64, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'SMH NON TRIMMING'),
(65, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'SMH UP SET'),
(66, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'BMH'),
(67, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'BMK'),
(68, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'SMK'),
(69, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'PCAH'),
(70, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'PCH'),
(71, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'TSABH'),
(72, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'TSAH'),
(73, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'TSBH'),
(74, 'MACHINE SCREW & TAPPING SCREW HEXAGONAL UPSET', 'TSCH'),
(75, 'WOOD SCREW', 'SWF'),
(76, 'WOOD SCREW', 'SWM'),
(77, 'WOOD SCREW', 'SWR'),
(78, 'WOOD SCREW', 'SWZ'),
(79, 'WOOD SCREW', 'SWO'),
(80, 'TUBULAR RIVET', 'SRK'),
(81, 'TUBULAR RIVET', 'SRP'),
(82, 'TUBULAR RIVET', 'SRT'),
(83, 'SUS MACHINE SCREW', 'UMB'),
(84, 'SUS MACHINE SCREW', 'UMF'),
(85, 'SUS MACHINE SCREW', 'UMK'),
(86, 'SUS MACHINE SCREW', 'UMO'),
(87, 'SUS MACHINE SCREW', 'UMP'),
(88, 'SUS MACHINE SCREW', 'UMR'),
(89, 'SUS MACHINE SCREW', 'UMS'),
(90, 'SUS MACHINE SCREW', 'UMT'),
(91, 'SUS MACHINE SCREW', 'UMX'),
(92, 'SUS HEXAGONAL TRIMMING', 'UMH'),
(93, 'SUS HEXAGONAL TRIMMING', 'TRIMMING'),
(94, 'SUS TAPPING SCREW', 'TSB1P'),
(95, 'TAPTITE SCREW', 'PTN'),
(96, 'TAPTITE SCREW', 'PTT'),
(97, 'TAPTITE SCREW', 'PTC'),
(98, 'TAPTITE SCREW', 'BTF');

-- --------------------------------------------------------

--
-- Table structure for table `tools_rolling`
--

CREATE TABLE IF NOT EXISTS `tools_rolling` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Category2` varchar(50) NOT NULL,
  `Diameter` double NOT NULL,
  `Min_panjang` double NOT NULL,
  `Max_panjang` double NOT NULL,
  `Cost` double NOT NULL,
  `Currency` enum('IDR','USD') NOT NULL,
  `Tgl_Update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `tools_rolling`
--

INSERT INTO `tools_rolling` (`Id`, `Category2`, `Diameter`, `Min_panjang`, `Max_panjang`, `Cost`, `Currency`, `Tgl_Update`, `Active`) VALUES
(1, 'MACHINE SCREW', 2, 4, 20, 0.78, 'IDR', '2010-01-01', 'YES'),
(2, 'MACHINE SCREW', 2.6, 4, 20, 0.78, 'IDR', '2010-01-01', 'YES'),
(3, 'MACHINE SCREW', 3, 4, 30, 0.84, 'IDR', '2010-01-01', 'YES'),
(4, 'MACHINE SCREW', 3.5, 4, 30, 0.84, 'IDR', '2010-01-01', 'YES'),
(5, 'MACHINE SCREW', 4, 6, 17, 0.79, 'IDR', '2010-01-01', 'YES'),
(6, 'MACHINE SCREW', 4, 18, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(7, 'MACHINE SCREW', 4.5, 6, 17, 0.79, 'IDR', '2010-01-01', 'YES'),
(8, 'MACHINE SCREW', 4.5, 18, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(9, 'MACHINE SCREW', 5, 6, 21, 0.79, 'IDR', '2010-01-01', 'YES'),
(10, 'MACHINE SCREW', 5, 22, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(11, 'MACHINE SCREW', 6, 6, 21, 1.68, 'IDR', '2010-01-01', 'YES'),
(12, 'MACHINE SCREW', 6, 22, 57, 1.68, 'IDR', '2010-01-01', 'YES'),
(13, 'MACHINE SCREW', 6, 58, 110, 5.07, 'IDR', '2010-01-01', 'YES'),
(14, 'MACHINE SCREW', 8, 10, 27, 2.34, 'IDR', '2010-01-01', 'YES'),
(15, 'MACHINE SCREW', 8, 28, 57, 2.34, 'IDR', '2010-01-01', 'YES'),
(16, 'MACHINE SCREW', 8, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(17, 'MACHINE SCREW', 10, 12, 27, 2.34, 'IDR', '2010-01-01', 'YES'),
(18, 'MACHINE SCREW', 10, 28, 57, 2.34, 'IDR', '2010-01-01', 'YES'),
(19, 'MACHINE SCREW', 10, 58, 140, 5.25, 'IDR', '2010-01-01', 'YES'),
(20, 'MACHINE SCREW', 12, 12, 27, 2.58, 'IDR', '2010-01-01', 'YES'),
(21, 'MACHINE SCREW', 12, 28, 57, 2.58, 'IDR', '2010-01-01', 'YES'),
(22, 'MACHINE SCREW', 12, 58, 140, 19.72, 'IDR', '2010-01-01', 'YES'),
(23, 'TAPPING SCREW', 2, 4, 20, 1.58, 'IDR', '2010-01-01', 'YES'),
(24, 'TAPPING SCREW', 2.6, 4, 20, 1.58, 'IDR', '2010-01-01', 'YES'),
(25, 'TAPPING SCREW', 3, 4, 30, 1.73, 'IDR', '2010-01-01', 'YES'),
(26, 'TAPPING SCREW', 3.5, 4, 30, 1.73, 'IDR', '2010-01-01', 'YES'),
(27, 'TAPPING SCREW', 4, 6, 50, 1.73, 'IDR', '2010-01-01', 'YES'),
(28, 'TAPPING SCREW', 4.5, 6, 50, 1.73, 'IDR', '2010-01-01', 'YES'),
(29, 'TAPPING SCREW', 5, 6, 21, 2.02, 'IDR', '2010-01-01', 'YES'),
(30, 'TAPPING SCREW', 5, 22, 50, 3.83, 'IDR', '2010-01-01', 'YES'),
(31, 'TAPPING SCREW', 6, 6, 56, 3.83, 'IDR', '2010-01-01', 'YES'),
(32, 'TAPPING SCREW', 8, 28, 57, 3.83, 'IDR', '2010-01-01', 'YES'),
(33, 'TAPPING SCREW', 8, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(34, 'TAPPING SCREW', 10, 28, 57, 3.83, 'IDR', '2010-01-01', 'YES'),
(35, 'TAPPING SCREW', 10, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(36, 'WOOD SCREW', 2, 4, 20, 1.58, 'IDR', '2010-01-01', 'YES'),
(37, 'WOOD SCREW', 2.6, 4, 20, 1.58, 'IDR', '2010-01-01', 'YES'),
(38, 'WOOD SCREW', 3, 4, 30, 1.73, 'IDR', '2010-01-01', 'YES'),
(39, 'WOOD SCREW', 3.5, 4, 30, 1.73, 'IDR', '2010-01-01', 'YES'),
(40, 'WOOD SCREW', 4, 6, 50, 1.73, 'IDR', '2010-01-01', 'YES'),
(41, 'WOOD SCREW', 4.5, 6, 50, 1.73, 'IDR', '2010-01-01', 'YES'),
(42, 'WOOD SCREW', 5, 6, 21, 2.02, 'IDR', '2010-01-01', 'YES'),
(43, 'WOOD SCREW', 5, 22, 50, 3.83, 'IDR', '2010-01-01', 'YES'),
(44, 'WOOD SCREW', 6, 6, 56, 3.83, 'IDR', '2010-01-01', 'YES'),
(45, 'WOOD SCREW', 8, 28, 57, 3.83, 'IDR', '2010-01-01', 'YES'),
(46, 'WOOD SCREW', 8, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(47, 'WOOD SCREW', 10, 28, 57, 3.83, 'IDR', '2010-01-01', 'YES'),
(48, 'WOOD SCREW', 10, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(49, 'FLANGE BOLT', 2, 4, 20, 0.78, 'IDR', '2010-01-01', 'YES'),
(50, 'FLANGE BOLT', 2.6, 4, 20, 0.78, 'IDR', '2010-01-01', 'YES'),
(51, 'FLANGE BOLT', 3, 4, 30, 0.84, 'IDR', '2010-01-01', 'YES'),
(52, 'FLANGE BOLT', 3.5, 4, 30, 0.84, 'IDR', '2010-01-01', 'YES'),
(53, 'FLANGE BOLT', 4, 6, 17, 0.79, 'IDR', '2010-01-01', 'YES'),
(54, 'FLANGE BOLT', 4, 18, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(55, 'FLANGE BOLT', 4.5, 6, 17, 0.79, 'IDR', '2010-01-01', 'YES'),
(56, 'FLANGE BOLT', 4.5, 18, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(57, 'FLANGE BOLT', 5, 6, 21, 0.79, 'IDR', '2010-01-01', 'YES'),
(58, 'FLANGE BOLT', 5, 22, 50, 1.07, 'IDR', '2010-01-01', 'YES'),
(59, 'FLANGE BOLT', 6, 6, 21, 1.68, 'IDR', '2010-01-01', 'YES'),
(60, 'FLANGE BOLT', 6, 22, 57, 1.68, 'IDR', '2010-01-01', 'YES'),
(61, 'FLANGE BOLT', 6, 58, 110, 5.07, 'IDR', '2010-01-01', 'YES'),
(62, 'FLANGE BOLT', 8, 10, 27, 2.34, 'IDR', '2010-01-01', 'YES'),
(63, 'FLANGE BOLT', 8, 28, 57, 2.34, 'IDR', '2010-01-01', 'YES'),
(64, 'FLANGE BOLT', 8, 58, 110, 5.25, 'IDR', '2010-01-01', 'YES'),
(65, 'FLANGE BOLT', 10, 12, 27, 2.34, 'IDR', '2010-01-01', 'YES'),
(66, 'FLANGE BOLT', 10, 28, 57, 2.34, 'IDR', '2010-01-01', 'YES'),
(67, 'FLANGE BOLT', 10, 58, 140, 5.25, 'IDR', '2010-01-01', 'YES'),
(68, 'FLANGE BOLT', 12, 12, 27, 2.58, 'IDR', '2010-01-01', 'YES'),
(69, 'FLANGE BOLT', 12, 28, 57, 2.58, 'IDR', '2010-01-01', 'YES'),
(70, 'FLANGE BOLT', 12, 58, 140, 19.72, 'IDR', '2010-01-01', 'YES'),
(71, 'TAPTITE SCREW', 2, 4, 20, 1.94, 'IDR', '2010-01-01', 'YES'),
(72, 'TAPTITE SCREW', 2.6, 4, 20, 1.94, 'IDR', '2010-01-01', 'YES'),
(73, 'TAPTITE SCREW', 3, 4, 30, 1.94, 'IDR', '2010-01-01', 'YES'),
(74, 'TAPTITE SCREW', 3.5, 4, 30, 1.94, 'IDR', '2010-01-01', 'YES'),
(75, 'TAPTITE SCREW', 4, 6, 50, 2.63, 'IDR', '2010-01-01', 'YES'),
(76, 'TAPTITE SCREW', 4.5, 6, 50, 2.63, 'IDR', '2010-01-01', 'YES'),
(77, 'TAPTITE SCREW', 5, 6, 21, 2.63, 'IDR', '2010-01-01', 'YES'),
(78, 'TAPTITE SCREW', 5, 22, 50, 3.6, 'IDR', '2010-01-01', 'YES'),
(79, 'TAPTITE SCREW', 6, 6, 56, 4.2, 'IDR', '2010-01-01', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_rollingcat`
--

CREATE TABLE IF NOT EXISTS `tools_rollingcat` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Category2` varchar(50) NOT NULL,
  `Type_screw` varchar(20) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `tools_rollingcat`
--

INSERT INTO `tools_rollingcat` (`Id`, `Category2`, `Type_screw`) VALUES
(1, 'MACHINE SCREW', 'BMP'),
(2, 'MACHINE SCREW', 'BMN'),
(3, 'MACHINE SCREW ', 'HANGBOLT'),
(4, 'MACHINE SCREW ', 'KONTAK PIN'),
(5, 'MACHINE SCREW', 'PIN'),
(6, 'MACHINE SCREW ', 'SMB'),
(7, 'MACHINE SCREW ', 'SMKS'),
(8, 'MACHINE SCREW', 'SMN'),
(9, 'MACHINE SCREW ', 'SMP'),
(10, 'MACHINE SCREW ', 'SMQ'),
(11, 'MACHINE SCREW ', 'SMR'),
(12, 'MACHINE SCREW ', 'SMT'),
(13, 'MACHINE SCREW ', 'SMX'),
(14, 'TAPPING SCREW ', 'TSA'),
(15, 'TAPPING SCREW', 'TSAB'),
(16, 'TAPPING SCREW', 'TSAK'),
(17, 'TAPPING SCREW', 'TSAN'),
(18, 'TAPPING SCREW', 'TSAP'),
(19, 'TAPPING SCREW ', 'TSAT'),
(20, 'TAPPING SCREW ', 'TSAV'),
(21, 'TAPPING SCREW', 'TSAZ'),
(22, 'TAPPING SCREW ', 'TSB'),
(23, 'TAPPING SCREW ', 'TSBAB'),
(24, 'TAPPING SCREW', 'TSBAP'),
(25, 'TAPPING SCREW', 'TSBB'),
(26, 'TAPPING SCREW ', 'TSBK'),
(27, 'TAPPING SCREW ', 'TSBN'),
(28, 'TAPPING SCREW', 'TSBP'),
(29, 'TAPPING SCREW', 'TSBT'),
(30, 'TAPPING SCREW', 'TSBV'),
(31, 'TAPPING SCREW', 'TSCB'),
(32, 'TAPPING SCREW', 'TSCN'),
(33, 'TAPPING SCREW', 'TSCP'),
(34, 'TAPPING SCREW', 'TSCT'),
(35, 'TAPPING SCREW', 'TSCV'),
(36, 'TAPPING SCREW', 'WELD BOLT'),
(37, 'TAPPING SCREW', 'TSBAX'),
(38, 'MACHINE SCREW ', 'SMF'),
(39, 'MACHINE SCREW ', 'SMO'),
(40, 'MACHINE SCREW ', 'TSAF'),
(41, 'MACHINE SCREW ', 'TSAO'),
(42, 'MACHINE SCREW ', 'TSBF'),
(43, 'MACHINE SCREW', 'TSBO'),
(44, 'MACHINE SCREW ', 'TSBAF'),
(45, 'MACHINE SCREW ', 'TSCF'),
(46, 'MACHINE SCREW ', 'BMF'),
(47, 'MACHINE SCREW', 'BWF'),
(48, 'TAPTITE SCREW', 'BT'),
(49, 'TAPTITE SCREW', 'CT'),
(50, 'TAPTITE SCREW', 'PTB'),
(51, 'TAPTITE SCREW', 'ST'),
(52, 'FLANGE BOLT', 'FB'),
(53, 'FLANGE BOLT', 'SMW'),
(54, 'FLANGE BOLT', 'STW'),
(55, 'FLANGE BOLT', 'TSABW'),
(56, 'FLANGE BOLT', 'TSBW'),
(57, 'FLANGE BOLT', 'SMKW'),
(58, 'FLANGE BOLT', 'TSAW'),
(59, 'FLANGE BOLT', 'STUD BOLT'),
(60, 'FLANGE BOLT', 'HSMW'),
(61, 'MACHINE SCREW ', 'SMH TRIMMING'),
(62, 'MACHINE SCREW ', 'RVK SQ'),
(63, 'TAPPING SCREW ', 'TAPPING TRIMMING'),
(64, 'MACHINE SCREW ', 'SMH NON TRIMMING'),
(65, 'MACHINE SCREW ', 'SMH UP SET'),
(66, 'MACHINE SCREW ', 'BMH'),
(67, 'MACHINE SCREW ', 'BMK'),
(68, 'MACHINE SCREW ', 'SMK'),
(69, 'MACHINE SCREW ', 'PCAH'),
(70, 'MACHINE SCREW ', 'PCH'),
(71, 'TAPPING SCREW ', 'TSABH'),
(72, 'TAPPING SCREW ', 'TSAH'),
(73, 'MACHINE SCREW', 'TSBH'),
(74, 'MACHINE SCREW', 'TSCH'),
(75, 'WOOD SCREW', 'SWF'),
(76, 'WOOD SCREW', 'SWM'),
(77, 'WOOD SCREW', 'SWR'),
(78, 'WOOD SCREW', 'SWZ'),
(79, 'WOOD SCREW', 'SWO'),
(80, 'TUBULAR RIVET', 'SRK'),
(81, 'TUBULAR RIVET', 'SRP'),
(82, 'TUBULAR RIVET', 'SRT'),
(83, 'SUS MACHINE SCREW', 'UMB'),
(84, 'SUS MACHINE SCREW', 'UMF'),
(85, 'SUS MACHINE SCREW', 'UMK'),
(86, 'SUS MACHINE SCREW', 'UMO'),
(87, 'SUS MACHINE SCREW', 'UMP'),
(88, 'SUS MACHINE SCREW', 'UMR'),
(89, 'SUS MACHINE SCREW', 'UMS'),
(90, 'SUS MACHINE SCREW', 'UMT'),
(91, 'SUS MACHINE SCREW', 'UMX'),
(92, 'SUS MACHINE SCREW ', 'UMH'),
(93, 'SUS MACHINE SCREW', 'TRIMMING'),
(94, 'SUS TAPPING SCREW', 'TSB1P'),
(96, 'TAPTITE SCREW', 'PTN'),
(97, 'FLANGE BOLT', 'HSMS'),
(98, 'TAPTITE SCREW', 'BTF');

-- --------------------------------------------------------

--
-- Table structure for table `tools_slotting`
--

CREATE TABLE IF NOT EXISTS `tools_slotting` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Diameter` double NOT NULL,
  `Min_panjang` double NOT NULL,
  `Max_panjang` double NOT NULL,
  `Cost` double NOT NULL,
  `Currency` enum('IDR','USD') NOT NULL,
  `Tgl_Update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tools_slotting`
--

INSERT INTO `tools_slotting` (`Id`, `Diameter`, `Min_panjang`, `Max_panjang`, `Cost`, `Currency`, `Tgl_Update`, `Active`) VALUES
(1, 3, 10, 100, 3.9, 'IDR', '2010-01-01', 'YES'),
(2, 3.5, 10, 100, 3.9, 'IDR', '2015-04-09', 'YES'),
(3, 4, 10, 100, 3.9, 'IDR', '2015-04-09', 'YES'),
(4, 4.5, 10, 100, 3.9, 'IDR', '2015-04-09', 'YES'),
(5, 5, 10, 100, 5.8, 'IDR', '2015-04-09', 'YES'),
(6, 6, 10, 100, 5.8, 'IDR', '2015-04-09', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `tools_trimming`
--

CREATE TABLE IF NOT EXISTS `tools_trimming` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Diameter` double NOT NULL,
  `Min_panjang` double NOT NULL,
  `Max_panjang` double NOT NULL,
  `Cost` double NOT NULL,
  `Currency` enum('IDR','USD') NOT NULL,
  `Tgl_Update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tools_trimming`
--

INSERT INTO `tools_trimming` (`Id`, `Diameter`, `Min_panjang`, `Max_panjang`, `Cost`, `Currency`, `Tgl_Update`, `Active`) VALUES
(1, 4, 10, 100, 2.89, 'IDR', '2010-01-01', 'YES'),
(2, 4.5, 10, 100, 2.89, 'IDR', '2015-04-09', 'YES'),
(3, 5, 10, 100, 4.91, 'IDR', '2015-04-09', 'YES'),
(4, 6, 10, 100, 3.05, 'IDR', '2015-04-09', 'YES'),
(5, 8, 10, 100, 7.11, 'IDR', '2015-04-09', 'YES'),
(6, 10, 10, 100, 12.67, 'IDR', '2015-04-09', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `turret`
--

CREATE TABLE IF NOT EXISTS `turret` (
  `Gaji` double NOT NULL,
  `Estimasi` double NOT NULL,
  `Working_day` double NOT NULL,
  `Working_hour` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turret`
--

INSERT INTO `turret` (`Gaji`, `Estimasi`, `Working_day`, `Working_hour`) VALUES
(3245000, 50, 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `turret2`
--

CREATE TABLE IF NOT EXISTS `turret2` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `typewire`
--

CREATE TABLE IF NOT EXISTS `typewire` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `typewire`
--

INSERT INTO `typewire` (`Id`, `Type`) VALUES
(1, 'Nippon Steel'),
(2, 'Kobe Steel'),
(3, 'Saarstahl Steel'),
(4, 'Posco'),
(5, 'CSC'),
(6, 'China Steel'),
(7, 'Copper Wire'),
(8, 'Stainless Steel'),
(9, 'Brass Wire');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `level`) VALUES
(1, 'Janki', 'admin', '202cb962ac59075b964b07152d234b70', '+1+'),
(2, 'Desi', 'desi', '82aa4b0af34c2313a562076992e50aa3', '+2+'),
(3, 'Flamellia', 'Flamellia', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '+3+'),
(4, 'Yuliana Mung', 'mung', 'a87ff679a2f3e71d9181a67b7542122c', '+4+');

-- --------------------------------------------------------

--
-- Table structure for table `utility`
--

CREATE TABLE IF NOT EXISTS `utility` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) NOT NULL,
  `Biaya_per_year` double NOT NULL,
  `Hasilprod_per_tahun` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `utility`
--

INSERT INTO `utility` (`Id`, `Name`, `Biaya_per_year`, `Hasilprod_per_tahun`) VALUES
(1, 'Electricity', 4388889792, 3916428),
(2, 'Factory Exp', 3858628003, 3916428);

-- --------------------------------------------------------

--
-- Table structure for table `washer`
--

CREATE TABLE IF NOT EXISTS `washer` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Weight` double NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `washer`
--

INSERT INTO `washer` (`Id`, `Kode_Supp`, `Name`, `Weight`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(1, 'STS', 'SW M3 KZ SEMS', 0.07, 8, 'IDR', '2014-07-22', 'YES'),
(2, 'STS', 'SW M3.5 KZ SEMS', 0.1, 9, 'IDR', '2014-07-22', 'YES'),
(3, 'STS', 'SW M4 KZ SEMS', 0.17, 10, 'IDR', '2014-07-22', 'YES'),
(4, 'STS', 'SW M5 KZ SEMS', 0.32, 13, 'IDR', '2014-07-22', 'YES'),
(5, 'STS', 'SW M6 KZ SEMS', 0.83, 20, 'IDR', '2014-07-22', 'YES'),
(6, 'STS', 'SW M8 KZ SEMS', 1.7, 39, 'IDR', '2014-07-22', 'YES'),
(7, 'STS', 'SW M10 KZ SEMS', 3, 65, 'IDR', '2014-07-22', 'YES'),
(8, 'STS', 'SW M12 KZ SEMS', 4.85, 142, 'IDR', '2014-07-22', 'YES'),
(9, 'STS', 'SW SPC M2.6 KZ FOR SEMS', 0.05, 7, 'IDR', '2014-07-22', 'YES'),
(10, 'STS', 'WSW M4 FOR SEMS', 0, 15, 'IDR', '2014-07-22', 'YES'),
(11, 'STS', 'WSW M5 FOR SEMS', 0, 22, 'IDR', '2014-07-22', 'YES'),
(12, 'STS', 'WSW M6 FOR SEMS', 0.54, 56, 'IDR', '2014-07-22', 'YES'),
(13, 'STS', 'SW M3 SUS SEMS', 0, 0.00264, 'USD', '2014-08-25', 'YES'),
(14, 'STS', 'SW M4 SUS SEMS', 0, 0.00624, 'USD', '2014-08-25', 'YES'),
(15, 'STS', 'SW M8 T2.5', 0, 0.01128, 'USD', '2014-08-25', 'YES'),
(16, 'STS', 'SW M5 SUS SEMS', 0.33, 0.01164, 'USD', '2014-08-21', 'YES'),
(17, 'STS', 'SW M6 SUS SEMS', 0, 0.02976, 'USD', '2014-08-21', 'YES'),
(18, 'AKB', 'PW 11.4 X 32 X 3.2 KZ', 0, 650, 'IDR', '2014-01-06', 'YES'),
(19, 'AKB', 'PW 12 X 26 X 2.3 KZ', 0, 238, 'IDR', '2011-10-01', 'YES'),
(20, 'AKB', 'PW 2.3 X 8 X 0.5 CU', 0, 24, 'IDR', '2011-08-01', 'YES'),
(21, 'AKB', 'PW 2.53 X 8 X 0.5 KZ', 0.16, 13, 'IDR', '2011-02-01', 'YES'),
(22, 'AKB', 'PW 2.60 X 6 X 0.5 KZ', 0, 15, 'IDR', '2011-01-01', 'YES'),
(23, 'AKB', 'PW 2.60 X 8 X 0.5 KZ', 0.16, 12, 'IDR', '2011-02-01', 'YES'),
(24, 'AKB', 'PW 2.65 X 10 X 0.8 KZ', 0, 12, 'IDR', '2014-08-25', 'YES'),
(25, 'AKB', 'PW 2.65 X 10 X 1 KZ', 0.52, 17, 'IDR', '2011-02-01', 'YES'),
(26, 'AKB', 'PW 2.65 X 6 X 0.5 KZ', 0.08, 13, 'IDR', '2011-02-01', 'YES'),
(27, 'AKB', 'PW 2.65 X 6 X 0.5 SUS', 0, 28, 'IDR', '2014-08-25', 'YES'),
(28, 'AKB', 'PW 2.65 X 8 X 0.5 KZ', 0.17, 15, 'IDR', '2013-05-28', 'YES'),
(29, 'AKB', 'PW 2.68 X 13 X 1 KZ', 0, 35, 'IDR', '2013-10-28', 'YES'),
(30, 'AKB', 'PW 2.68 X 6 X 0.5 CU', 0.08, 20, 'IDR', '2011-02-01', 'YES'),
(31, 'AKB', 'PW 2.68 X 6 X 0.5 KZ', 0.08, 15, 'IDR', '2010-03-01', 'YES'),
(32, 'AKB', 'PW 2.68 X 7 X 0.5 CU', 0.12, 21, 'IDR', '2011-02-01', 'YES'),
(33, 'AKB', 'PW 2.68 X 7 X 0.5 KZ', 0.12, 15, 'IDR', '2011-02-01', 'YES'),
(34, 'AKB', 'PW 2.68 X 8 X 0.5 CU', 0.16, 24, 'IDR', '2011-02-01', 'YES'),
(35, 'AKB', 'PW 2.68 X 8 X 0.5 KZ', 0.16, 15, 'IDR', '2011-02-01', 'YES'),
(36, 'AKB', 'PW 2.7 X 7.5 X 1 BR', 0.27, 78, 'IDR', '2011-02-01', 'YES'),
(37, 'AKB', 'PW 2.7 X 7.5 X 1 KZ', 0, 65, 'IDR', '2010-03-01', 'YES'),
(38, 'AKB', 'PW 2.82 X 6 X 0.5 CU', 0, 20, 'IDR', '2011-04-01', 'YES'),
(39, 'AKB', 'PW 2.82 X 6 X 0.5 KZ', 0, 17, 'IDR', '2011-03-01', 'YES'),
(40, 'AKB', 'PW 2.82 X 7 X 0.5 CU', 0.12, 21, 'IDR', '2011-06-01', 'YES'),
(41, 'AKB', 'PW 2.82 X 7 X 0.5 KZ', 0, 18, 'IDR', '2011-02-01', 'YES'),
(42, 'AKB', 'PW 2.82 X 8 X 0.5 CU', 0.16, 22, 'IDR', '2011-02-01', 'YES'),
(43, 'AKB', 'PW 2.82 X 8 X 0.5 KZ', 0.16, 17, 'IDR', '2011-02-01', 'YES'),
(44, 'AKB', 'PW 2.90 X 7 X 0.5 KZ', 0, 15, 'IDR', '2009-07-01', 'YES'),
(45, 'AKB', 'PW 2.90 X 8 X 0.5 KZ', 0, 15, 'IDR', '2009-07-01', 'YES'),
(46, 'AKB', 'PW 3.22 X 10 X 1 KZ', 0.48, 15, 'IDR', '2008-12-01', 'YES'),
(47, 'AKB', 'PW 3.28 X 17 X 0.8 KZ', 1.28, 48, 'IDR', '2011-02-01', 'YES'),
(48, 'AKB', 'PW 3.29 X 10 X 0.8 KZ', 0, 21, 'IDR', '2013-07-25', 'YES'),
(49, 'AKB', 'PW 3.29 X 14 X 1 KZ', 1.07, 35, 'IDR', '2011-02-01', 'YES'),
(50, 'AKB', 'PW 3.29 X 8 X 0.8 KZ', 0.23, 13, 'IDR', '2011-02-01', 'YES'),
(51, 'AKB', 'PW  3.35 X 7 X 1.1 SUS', 0, 43, 'IDR', '2011-09-01', 'YES'),
(52, 'AKB', 'PW 3.37 X 12 X 1 KZ', 0.75, 24, 'IDR', '2011-02-01', 'YES'),
(53, 'AKB', 'PW 3.37 X 14 X 0.8 KZ', 0, 25, 'IDR', '2011-02-01', 'YES'),
(54, 'AKB', 'PW 3.37 X 22 X 1 KZ', 0, 95, 'IDR', '2009-05-01', 'YES'),
(55, 'AKB', 'PW 3.37 X 9 X 0.8 KZ', 0.31, 17, 'IDR', '2011-02-01', 'YES'),
(56, 'AKB', 'PW 3.37 X 9 X 1 KZ', 0, 27, 'IDR', '2013-11-28', 'YES'),
(57, 'AKB', 'PW 3.40 X 14 X 0.8 KZ', 0, 25, 'IDR', '2008-12-01', 'YES'),
(58, 'AKB', 'PW 3.40 X 17 X 0.8 KZ', 1.3, 48, 'IDR', '2011-02-01', 'YES'),
(59, 'AKB', 'PW 3.47 X 14 X 0.8 KZ', 0.8, 27, 'IDR', '2011-02-01', 'YES'),
(60, 'AKB', 'PW 3.47 X 19 X 0.8 KZ', 0, 50, 'IDR', '2014-01-22', 'YES'),
(61, 'AKB', 'PW 3.50 X 12 X 1 KZ', 0.75, 27, 'IDR', '2008-12-01', 'YES'),
(62, 'AKB', 'PW 3.52 X 10 X 1 KZ', 0.47, 15, 'IDR', '2008-12-01', 'YES'),
(63, 'AKB', 'PW 3.52 X 10 X 1 SUS', 0, 95, 'IDR', '2013-09-02', 'YES'),
(64, 'AKB', 'PW 3.52 X 11 X 2 KZ', 0, 45, 'IDR', '2009-04-01', 'YES'),
(65, 'AKB', 'PW 3.52 X 16 X 1.6 KZ', 2.28, 75, 'IDR', '2010-03-01', 'YES'),
(66, 'AKB', 'PW 3.52 X 75 X 0.5 KZ', 0, 17, 'IDR', '2013-08-02', 'YES'),
(67, 'AKB', 'PW 3.52 X 8 X 0.5 KZ', 0.15, 20, 'IDR', '2012-06-01', 'YES'),
(68, 'AKB', 'PW 3.52 X 8 X 0.8 KZ', 0.23, 10, 'IDR', '2010-03-01', 'YES'),
(69, 'AKB', 'PW 3.52 X 8 X 0.8 SUS', 0, 45, 'IDR', '2014-08-25', 'YES'),
(70, 'AKB', 'PW 3.52 X 9 X 0.8 KZ', 0.29, 18, 'IDR', '2010-03-01', 'YES'),
(71, 'AKB', 'PW 3.53 X 10 X 0.8 KZ', 0.38, 19, 'IDR', '2009-07-01', 'YES'),
(72, 'AKB', 'PW 3.53 X 18 X 1 KZ', 0, 70, 'IDR', '2009-07-01', 'YES'),
(73, 'AKB', 'PW 4.1 X 10 X 0.8 KZ', 0.37, 16, 'IDR', '2009-07-01', 'YES'),
(74, 'AKB', 'PW 4.1 X 11.5 X 0.8 KZ', 0, 25, 'IDR', '2014-09-09', 'YES'),
(75, 'AKB', 'PW 4.1 X 12 X 0.8 KZ', 0.56, 17, 'IDR', '2010-03-01', 'YES'),
(76, 'AKB', 'PW 4.1 X 14 X 1 KZ', 0, 37, 'IDR', '2009-09-01', 'YES'),
(77, 'AKB', 'PW 4.1 X 16 X 1.2 KZ', 1.66, 58, 'IDR', '2008-12-01', 'YES'),
(78, 'AKB', 'PW 4.1 X 18 X 0.8 KZ', 1.45, 52, 'IDR', '2010-03-01', 'YES'),
(79, 'AKB', 'PW 4.1 X 18 X 1 KZ', 2, 70, 'IDR', '2009-08-01', 'YES'),
(80, 'AKB', 'PW 4.1 X 20 X 1 KZ', 2.25, 77, 'IDR', '2010-03-01', 'YES'),
(81, 'AKB', 'PW 4.2 X 10 X 1 KZ', 0, 19, 'IDR', '2009-05-01', 'YES'),
(82, 'AKB', 'PW 4.45 X 10 X 0.8 KZ', 0.36, 18, 'IDR', '2010-03-01', 'YES'),
(83, 'AKB', 'PW 4.45 X 12 X 0.8 KZ', 0.56, 18, 'IDR', '2010-03-01', 'YES'),
(84, 'AKB', 'PW 4.45 X 14 X 1.6 KZ', 1.65, 74, 'IDR', '2010-03-01', 'YES'),
(85, 'AKB', 'PW 4.45 X 15 X 2 KZ', 2.35, 75, 'IDR', '2008-12-01', 'YES'),
(86, 'AKB', 'PW 4.45 X 16 X 1.6 KZ', 0, 75, 'IDR', '2014-04-10', 'YES'),
(87, 'AKB', 'PW 4.45 X 18 X 1 KZ', 1.76, 63, 'IDR', '2010-03-01', 'YES'),
(88, 'AKB', 'PW 4.5 X 10 X 1 KZ', 0.44, 15, 'IDR', '2010-03-01', 'YES'),
(89, 'AKB', 'PW 4.5 X 10 X 1.2 KZ', 0, 32, 'IDR', '2014-03-11', 'YES'),
(90, 'AKB', 'PW 4.5 X 11 X 0.5 KZ', 0, 30, 'IDR', '2013-06-05', 'YES'),
(91, 'AKB', 'PW 4.5 X 14 X 1 KZ', 1.02, 33, 'IDR', '2010-03-01', 'YES'),
(92, 'AKB', 'PW 4.5 X 16 X 1.2 KZ', 1.63, 61, 'IDR', '2010-05-01', 'YES'),
(93, 'AKB', 'PW 4.5 X 20 X 1 KZ', 1.98, 66, 'IDR', '2008-12-01', 'YES'),
(94, 'AKB', 'PW 5.35 X 11.5 X 0.8 KZ', 0.46, 20, 'IDR', '2008-12-01', 'YES'),
(95, 'AKB', 'PW 5.35 X 11.5 X 1 KZ', 0.58, 21, 'IDR', '2010-03-01', 'YES'),
(96, 'AKB', 'PW 5.35 X 11.5 X 1.6 KZ', 0.92, 30, 'IDR', '2010-03-01', 'YES'),
(97, 'AKB', 'PW 5.35 X 12 X 1.2 KZ', 0.78, 29, 'IDR', '2010-03-01', 'YES'),
(98, 'AKB', 'PW 5.35 X 12.5 X 1.6 KZ', 0, 43, 'IDR', '2014-11-17', 'YES'),
(99, 'AKB', 'PW 5.35 X 13 X 0.8 KZ', 0, 30, 'IDR', '2013-06-20', 'YES'),
(100, 'AKB', 'PW 5.35 X 13 X 1 KZ', 0.79, 25, 'IDR', '2010-03-01', 'YES'),
(101, 'AKB', 'PW 5.35 X 13 X 1 SUS', 0, 200, 'IDR', '2013-05-17', 'YES'),
(102, 'AKB', 'PW 5.35 X 14 X 1 KZ', 0.93, 33, 'IDR', '2009-12-01', 'YES'),
(103, 'AKB', 'PW 5.35 X 14 X 1.6 KZ', 0, 65, 'IDR', '2013-03-21', 'YES'),
(104, 'AKB', 'PW 5.35 X 16 X 0.5 SUS', 0, 175, 'IDR', '2009-04-01', 'YES'),
(105, 'AKB', 'PW 5.35 X 16 X 1 KZ', 1.31, 42, 'IDR', '2010-03-01', 'YES'),
(106, 'AKB', 'PW 5.35 X 16 X 1.2 KZ', 1.58, 59, 'IDR', '2010-03-01', 'YES'),
(107, 'AKB', 'PW 5.35 X 16 X 1.6 KZ', 2.1, 73, 'IDR', '2010-03-01', 'YES'),
(108, 'AKB', 'PW 5.35 X 18 X 1 KZ', 1.72, 56, 'IDR', '2010-03-01', 'YES'),
(109, 'AKB', 'PW 5.35 X 18 X 1 SUS', 1.69, 400, 'IDR', '2009-05-01', 'YES'),
(110, 'AKB', 'PW 5.35 X 18 X 1.2 KZ', 2.07, 84, 'IDR', '2010-03-01', 'YES'),
(111, 'AKB', 'PW 5.35 X 18 X 1.6 KZ', 2.78, 97, 'IDR', '2010-03-01', 'YES'),
(112, 'AKB', 'PW 5.35 X 20 X 1.2 KZ', 2.61, 84, 'IDR', '2010-03-01', 'YES'),
(113, 'AKB', 'PW 5.35 X 20 X 1.6 KZ', 3.5, 125, 'IDR', '2010-03-01', 'YES'),
(114, 'AKB', 'PW 5.35 X 20 X 2 KZ', 0, 175, 'IDR', '2014-01-22', 'YES'),
(115, 'AKB', 'PW 5.35 X 22 X 1.6 KZ', 0, 175, 'IDR', '2014-09-09', 'YES'),
(116, 'AKB', 'PW 5.35 X 23 X 1.6 KZ', 0, 175, 'IDR', '2013-06-20', 'YES'),
(117, 'AKB', 'PW 5.35 X 24 X 1.6 KZ', 0, 185, 'IDR', '2013-04-19', 'YES'),
(118, 'AKB', 'PW 5.4 X 11.5 X 1.6 SK', 0.91, 175, 'IDR', '2014-03-12', 'YES'),
(119, 'AKB', 'PW 5.4 X 13 X 1 SUS', 0, 210, 'IDR', '2012-09-03', 'YES'),
(120, 'AKB', 'PW 5.50 X 12 X 1 KZ', 0, 95, 'IDR', '2013-03-22', 'YES'),
(121, 'AKB', 'PW 5.50 X 13 X 1 SUS', 0, 185, 'IDR', '2013-03-22', 'YES'),
(122, 'AKB', 'PW 6 X 13 X 1.0 KZ', 0.74, 25, 'IDR', '2012-02-01', 'YES'),
(123, 'AKB', 'PW 7.2 X 24 X 1.6 KZ', 0, 185, 'IDR', '2009-04-01', 'YES'),
(124, 'AKB', 'PW 7.2 X 16 X 1.2 KZ', 0, 53, 'IDR', '2013-04-19', 'YES'),
(125, 'AKB', 'PW 7.2 X 17 X 1.6 KZ', 0, 85, 'IDR', '2014-11-17', 'YES'),
(126, 'AKB', 'PW 7.2 X 18 X 1.6 KZ', 2.5, 82, 'IDR', '2010-03-01', 'YES'),
(127, 'AKB', 'PW 7.2 X 18 X 2.3 KZ', 3.62, 118, 'IDR', '2010-03-01', 'YES'),
(128, 'AKB', 'PW 7.2 X 18 X 3.2 KZ', 0, 210, 'IDR', '2013-06-21', 'YES'),
(129, 'AKB', 'PW 7.2 X 20 X 3.2 KZ', 0, 210, 'IDR', '2014-10-31', 'YES'),
(130, 'AKB', 'PW 7.2 X 22 X 1.6 KZ', 0, 135, 'IDR', '2014-01-06', 'YES'),
(131, 'AKB', 'PW 7.2 X 30 X 1.6 KZ', 0, 300, 'IDR', '2014-11-05', 'YES'),
(132, 'AKB', 'PW 7.3 X 17 X 1.5 SUS', 2.01, 280, 'IDR', '2011-07-01', 'YES'),
(133, 'AKB', 'PW 7.3 X 18 X 1.6 SUS', 0, 279, 'IDR', '2011-07-01', 'YES'),
(134, 'AKB', 'PW 8.5 X 18 X 2.3 KZ', 0, 116, 'IDR', '2012-02-07', 'YES'),
(135, 'AKB', 'PW 9.2 X 16.5 X 2 KZ', 0, 180, 'IDR', '2009-05-01', 'YES'),
(136, 'AKB', 'PW 9.2 X 22 X 1.6 KZ', 3.84, 130, 'IDR', '2008-12-01', 'YES'),
(137, 'AKB', 'PW 9.2 X 22 X 2 KZ', 0, 200, 'IDR', '2009-08-01', 'YES'),
(138, 'AKB', 'PW 9.2 X 22 X 3 KZ', 0, 245, 'IDR', '2009-07-01', 'YES'),
(139, 'AKB', 'PW 9.2 X 22 X 3.2 KZ', 0, 280, 'IDR', '2013-04-19', 'YES'),
(140, 'AKB', 'PW 9.2 X 46 X 2.3 KZ', 0, 1000, 'IDR', '2013-04-19', 'YES'),
(141, 'AKB', 'PW 9.3 X 17 X 2.5 KZ', 0, 110, 'IDR', '2011-01-01', 'YES'),
(142, 'AKB', 'PW 9.3 X 21 X 2 KZ', 0, 200, 'IDR', '2012-04-26', 'YES'),
(143, 'AKB', 'PW 4.98 X 18 X 1 KZ', 2.03, 56, 'IDR', '2015-06-19', 'YES'),
(144, 'AKB', 'PW 4.98 X 22 X 1.6 KZ', 3.11, 175, 'IDR', '2015-06-19', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `wire`
--

CREATE TABLE IF NOT EXISTS `wire` (
  `Id` int(1) NOT NULL AUTO_INCREMENT,
  `Kode_Supp` varchar(20) NOT NULL,
  `Grade` varchar(20) NOT NULL,
  `Min_dia` double NOT NULL,
  `Max_dia` double NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Jenis` enum('wire rod','bar','plate') NOT NULL,
  `Price` double NOT NULL,
  `Currency` enum('USD','IDR') NOT NULL,
  `Tgl_update` date NOT NULL,
  `Active` enum('YES','NO') NOT NULL DEFAULT 'YES',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `wire`
--

INSERT INTO `wire` (`Id`, `Kode_Supp`, `Grade`, `Min_dia`, `Max_dia`, `Type`, `Jenis`, `Price`, `Currency`, `Tgl_update`, `Active`) VALUES
(4, 'IWWI', '8A', 1, 1.99, '1', 'wire rod', 1.522, 'USD', '2014-01-10', 'YES'),
(5, 'IWWI', '8A', 2, 4, '1', 'wire rod', 1.492, 'USD', '2014-01-10', 'YES'),
(6, 'IWWI', '8A', 4.01, 15, '1', 'wire rod', 1.482, 'USD', '2014-01-10', 'YES'),
(7, 'IWWI', '10A', 1, 1.99, '1', 'wire rod', 1.522, 'USD', '2014-01-10', 'YES'),
(10, 'IWWI', '10A', 2, 4, '1', 'wire rod', 1.492, 'USD', '2014-01-10', 'YES'),
(11, 'IWWI', '10A', 4.01, 15, '1', 'wire rod', 1.482, 'USD', '2014-01-10', 'YES'),
(12, 'IWWI', '12A', 1, 1.99, '1', 'wire rod', 1.522, 'USD', '2014-01-10', 'YES'),
(13, 'IWWI', '12A', 2, 4, '1', 'wire rod', 1.492, 'USD', '2014-01-10', 'YES'),
(14, 'IWWI', '12A', 4.01, 15, '1', 'wire rod', 1.482, 'USD', '2014-01-10', 'YES'),
(16, 'IWWI', '16A', 1, 1.99, '1', 'wire rod', 1.522, 'USD', '2014-01-10', 'YES'),
(17, 'IWWI', '16A', 2, 4, '1', 'wire rod', 1.492, 'USD', '2014-01-10', 'YES'),
(18, 'IWWI', '16A', 4.01, 15, '1', 'wire rod', 1.482, 'USD', '2014-01-10', 'YES'),
(19, 'IWWI', '18A', 1, 1.99, '1', 'wire rod', 1.522, 'USD', '2014-01-10', 'YES'),
(20, 'IWWI', '18A', 2, 4, '1', 'wire rod', 1.492, 'USD', '2014-01-10', 'YES'),
(21, 'IWWI', '18A', 4.01, 15, '1', 'wire rod', 1.482, 'USD', '2014-01-10', 'YES'),
(22, 'IWWI', '20K', 2, 4, '1', 'wire rod', 1.535, 'USD', '2014-01-10', 'YES'),
(23, 'IWWI', '20K', 4.01, 15, '1', 'wire rod', 1.523, 'USD', '2014-01-10', 'YES'),
(24, 'IWWI', '35K', 2, 4, '1', 'wire rod', 1.535, 'USD', '2014-01-10', 'YES'),
(25, 'IWWI', '35K', 4.01, 15, '1', 'wire rod', 1.523, 'USD', '2014-01-10', 'YES'),
(26, 'IWWI', '38K', 2, 4, '1', 'wire rod', 1.535, 'USD', '2014-01-10', 'YES'),
(27, 'IWWI', '38K', 4.01, 15, '1', 'wire rod', 1.523, 'USD', '2014-01-10', 'YES'),
(28, 'IWWI', '45K', 2, 4, '1', 'wire rod', 1.535, 'USD', '2014-01-10', 'YES'),
(29, 'IWWI', '45K', 4.01, 15, '1', 'wire rod', 1.523, 'USD', '2014-01-10', 'YES'),
(30, 'IWWI', '8A', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(31, 'IWWI', '10A', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(32, 'IWWI', '12A', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(33, 'IWWI', '16A', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(34, 'IWWI', '18A', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(35, 'IWWI', '10K', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(36, 'IWWI', '20K', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(37, 'IWWI', '35K', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(38, 'IWWI', '38K', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(39, 'IWWI', '45K', 4.01, 15, '2', 'wire rod', 1.798, 'USD', '2014-01-10', 'YES'),
(40, 'IWWI', 'SCM 415', 4.01, 15, '2', 'wire rod', 1.95, 'USD', '2014-01-10', 'YES'),
(41, 'IWWI', 'SCM 435', 4.01, 15, '2', 'wire rod', 1.95, 'USD', '2014-01-10', 'YES'),
(42, 'IWWI', 'SUM 24L', 6, 15, '3', 'bar', 1.908, 'USD', '2014-01-10', 'YES'),
(43, 'IWWI', 'SS41', 6, 15, '8', 'bar', 1835, 'USD', '2014-01-10', 'YES'),
(44, 'IWWI', 'SGD400', 6, 15, '2', 'bar', 1.835, 'USD', '2014-01-10', 'YES'),
(56, 'CP', '10A', 1, 15, '6', 'wire rod', 1.225, 'USD', '2014-11-19', 'NO'),
(57, 'CP', '12A', 1, 15, '6', 'wire rod', 1.225, 'USD', '2014-11-19', 'NO'),
(58, 'CP', '16A', 1, 15, '6', 'wire rod', 1.225, 'USD', '2014-11-19', 'NO'),
(59, 'CP', '18A', 1, 15, '6', 'wire rod', 1.225, 'USD', '2014-11-19', 'NO'),
(60, 'CP', 'S20C', 1, 15, '6', 'wire rod', 1.225, 'USD', '2014-11-19', 'NO'),
(61, 'CP', '10A (AD)', 1, 15, '6', 'wire rod', 1.125, 'USD', '2014-11-19', 'NO'),
(62, 'CP', '12A (AD)', 1, 15, '6', 'wire rod', 1.125, 'USD', '2014-11-19', 'NO'),
(63, 'TMS', 'MMH', 2.96, 2.96, '7', 'wire rod', 9.275, 'USD', '2014-11-14', 'NO'),
(64, 'TMS', 'MMH', 2.4, 2.4, '7', 'wire rod', 9.35, 'USD', '2014-11-14', 'NO'),
(65, 'SPS', 'STKM 13A-EC', 1, 15, '4', 'plate', 18000, 'IDR', '2014-05-21', 'YES'),
(66, 'KOS', 'SUS XM-7 ', 4.37, 4.37, '8', 'wire rod', 8.28, 'USD', '2014-11-14', 'YES'),
(67, 'KOS', 'SUS XM-7 ', 5.25, 5.25, '8', 'wire rod', 6.9, 'USD', '2014-11-11', 'YES'),
(68, 'KOS', 'SUS XM-7 ', 9.4, 9.4, '8', 'wire rod', 7.14, 'USD', '2014-10-20', 'YES'),
(69, 'KOS', 'SUS XM-7 ', 6.75, 6.75, '8', 'wire rod', 7.14, 'USD', '2014-10-14', 'YES'),
(70, 'KOS', 'SUS XM-7 ', 1.67, 1.67, '8', 'wire rod', 7.8, 'USD', '2014-08-20', 'YES'),
(71, 'KOS', 'SUS XM-7 ', 2.58, 2.58, '8', 'wire rod', 7.38, 'USD', '2014-08-20', 'YES'),
(72, 'KOS', 'SUS XM-7 ', 2.42, 2.42, '8', 'wire rod', 7.32, 'USD', '2014-08-06', 'YES'),
(73, 'KOS', 'SUS XM-7 ', 3.44, 3.44, '8', 'wire rod', 7.2, 'USD', '2014-06-02', 'YES'),
(74, 'KOS', 'SUS XM-7 ', 8.87, 8.87, '8', 'wire rod', 7.2, 'USD', '2014-06-02', 'YES'),
(75, 'KOS', 'SUS XM-7 ', 7.02, 7.02, '8', 'wire rod', 7.56, 'USD', '2014-06-02', 'YES'),
(76, 'KOS', 'SUS  305 JI', 3.75, 3.75, '8', 'wire rod', 8.82, 'USD', '2014-10-02', 'YES'),
(77, 'KOS', 'SUS  305 JI', 1.62, 1.62, '8', 'wire rod', 9.24, 'USD', '2014-06-02', 'YES'),
(78, 'KOS', 'SUS  305 JI', 2.42, 2.42, '8', 'wire rod', 8.64, 'USD', '2014-06-02', 'YES'),
(79, 'KOS', 'SUS 305 JI', 3.22, 3.22, '8', 'wire rod', 8.64, 'USD', '2014-06-02', 'NO'),
(80, 'KOS', 'SUS  305 JI', 4.01, 4.01, '8', 'wire rod', 4, 'USD', '2014-06-02', 'YES'),
(81, 'KOS', 'SUS  304 J3', 2.42, 2.42, '8', 'wire rod', 5.64, 'USD', '2014-06-02', 'YES'),
(82, 'KOS', 'SUS  304 J3', 3.44, 3.44, '8', 'wire rod', 5.64, 'USD', '2014-06-02', 'YES'),
(83, 'KOS', 'SUS  304 J3', 4.9, 4.9, '8', 'wire rod', 5.64, 'USD', '2014-06-02', 'YES'),
(84, 'KOS', 'SUS  304 J3', 5.25, 5.25, '8', 'wire rod', 5.64, 'USD', '2014-06-02', 'YES'),
(85, 'KOS ', 'SUS 304 SPC', 9.85, 9.85, '8', 'wire rod', 6, 'USD', '2014-07-22', 'YES'),
(86, 'KOS', 'SUS 410', 3.22, 3.22, '8', 'wire rod', 5.04, 'USD', '2014-06-02', 'YES'),
(87, 'KOS', 'SUS 430', 2.99, 2.99, '8', 'wire rod', 5.04, 'USD', '2014-06-02', 'YES'),
(88, 'KOS', 'SUS 430', 4.9, 4.9, '8', 'wire rod', 5.04, 'USD', '2014-06-02', 'YES'),
(89, 'KOS', 'SUS 430', 4.95, 4.95, '8', 'wire rod', 5.04, 'USD', '2014-06-02', 'YES'),
(90, 'KOS', 'SUS BAR 303', 2, 2, '8', 'bar', 6.24, 'USD', '2014-07-02', 'YES'),
(91, 'KOS', 'BRASS BAR C3604', 8, 8, '9', 'bar', 8.24, 'USD', '2014-07-02', 'YES'),
(92, 'KOS', 'C2700', 2.61, 2.61, '7', 'wire rod', 9.48, 'USD', '2014-11-14', 'YES'),
(93, 'KOS', 'C2700', 4.85, 4.85, '7', 'wire rod', 9.48, 'USD', '2014-11-14', 'YES'),
(94, 'KOS', 'C2700', 4.93, 4.93, '7', 'wire rod', 9.48, 'USD', '2014-11-14', 'YES'),
(95, 'KOS', 'C2700', 3, 3, '7', 'wire rod', 9.54, 'USD', '2014-07-22', 'YES'),
(96, 'KOS', 'C2700 (H65)', 3.35, 3.35, '7', 'wire rod', 9.48, 'USD', '2014-09-23', 'YES'),
(97, 'KOS', 'C2600', 2.91, 2.91, '7', 'wire rod', 9.48, 'USD', '2014-05-28', 'YES'),
(104, 'CP', '12A', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(105, 'CP', '16A', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(106, 'CP', '18A', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(107, 'CP', 'S20C', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(108, 'CP', '10A (AD)', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(109, 'CP', '12A (AD)', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(110, 'CP', '10A', 1, 15, '6', 'wire rod', 1.125, 'USD', '2015-04-01', 'YES'),
(111, 'TMS', 'MMH', 2.96, 2.96, '7', 'wire rod', 9.1, 'USD', '2015-03-25', 'YES'),
(112, 'TMS', 'MMH', 2.4, 2.4, '7', 'wire rod', 9.176, 'USD', '2015-03-25', 'YES'),
(113, 'IWWI', '45K', 5, 10, '6', 'wire rod', 1.29, 'USD', '2015-06-10', 'YES'),
(115, 'KOS', 'SUS 305 JI', 3.22, 3.22, '8', 'wire rod', 8.22, 'USD', '2015-06-25', 'YES');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
