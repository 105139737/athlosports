-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2021 at 03:49 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stk_hmtl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_paymtd`
--

CREATE TABLE IF NOT EXISTS `ac_paymtd` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `mtd` varchar(20) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ac_paymtd`
--

INSERT INTO `ac_paymtd` (`sl`, `mtd`) VALUES
(1, 'Cash'),
(2, 'NEFT'),
(3, 'Cheque'),
(4, 'DD'),
(5, 'Card'),
(6, 'RTGS');

-- --------------------------------------------------------

--
-- Table structure for table `main_billdtls`
--

CREATE TABLE IF NOT EXISTS `main_billdtls` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sec` int(11) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `mrp` double NOT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gtamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `retno` varchar(300) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `rate` double NOT NULL,
  `stk_rate` double NOT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `main_billdtls`
--

INSERT INTO `main_billdtls` (`sl`, `sec`, `cat`, `scat`, `prsl`, `mrp`, `imei`, `unit`, `usl`, `uval`, `kg`, `grm`, `pcs`, `betno`, `srt`, `adp`, `prc`, `total`, `disp`, `disa`, `ttl`, `tamm`, `gtamm`, `fst`, `tst`, `cgst_rt`, `cgst_am`, `sgst_rt`, `sgst_am`, `igst_rt`, `igst_am`, `net_am`, `blno`, `refno`, `srtnm`, `retno`, `rdt`, `dt`, `rate`, `stk_rate`, `rqty`) VALUES
(1, 1, '1', '', '2', 0, '', 'sun', '2', 1, 0, 0, 1, '', 0, 0, 56300, 56300, 0, 0, 56300, 47711.8644, 0, '1', '1', 9, 4294.0678, 9, 4294.0678, 0, 0, 56300, 'HM/19-20/00001', '19-20/-P000001', 'ONS', NULL, '0000-00-00', '2019-07-10', 56300, 47711.8644, 0),
(2, 1, '1', '', '2', 0, '', 'sun', '2', 1, 0, 0, 1.52, '', 0, 0, 56299.993421053, 85575.99, 0, 0, 85575.99, 72522.03, 0, '1', '1', 9, 6526.98, 9, 6526.98, 0, 0, 85575.99, 'HM/19-20/00002', '19-20/-P000002', '', NULL, '0000-00-00', '2019-07-10', 56299.993421053, 47711.861842105, 0),
(3, 1, '4', '', '3', 0, '', 'sun', '3', 1, 0, 0, 1, '', 0, 0, 100, 100, 0, 0, 100, 78.125, 0, '1', '1', 14, 10.9375, 14, 10.9375, 0, 0, 100, 'HM/19-20/00003', '19-20/-P000003', 'ONS', NULL, '0000-00-00', '2020-01-31', 100, 78.125, 0),
(4, 1, '6', '', '6', 0, '', 'sun', '6', 1, 0, 0, 10, '', 0, 0, 330, 3300, 0, 0, 3300, 2946.4286, 0, '1', '1', 6, 176.7857, 6, 176.7857, 0, 0, 3300, 'HM/21-22/00001', '21-22/-P000004', 'ONS', NULL, '0000-00-00', '2021-04-20', 330, 294.64, 0),
(5, 1, '6', '', '6', 0, '', 'sun', '6', 1, 0, 0, 5, '', 0, 0, 300, 1500, 0, 0, 1500, 1339.2856, 0, '1', '1', 6, 80.3572, 6, 80.3572, 0, 0, 1500, 'HM/21-22/00002', '21-22/-P000004', 'ONS', NULL, '0000-00-00', '2021-04-20', 300, 267.86, 0),
(6, 1, '5', '', '7', 0, '', 'mun', '7', 4.6, 0, 0, 50, '', 0, 0, 65, 3250, 0, 0, 3250, 2754.2372, 0, '1', '1', 9, 247.8814, 9, 247.8814, 0, 0, 3250, 'HM/21-22/00002', '21-22/-P000004', 'ONS', NULL, '0000-00-00', '2021-04-20', 14.1304347826, 11.9739130435, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_billdtls_log`
--

CREATE TABLE IF NOT EXISTS `main_billdtls_log` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `dblno` varchar(300) NOT NULL,
  `sec` int(11) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `mrp` double NOT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gtamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `retno` varchar(300) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `rate` double NOT NULL,
  `stk_rate` double NOT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_billdtls_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_billdtls_ret`
--

CREATE TABLE IF NOT EXISTS `main_billdtls_ret` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `mrp` double NOT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `old_blno` varchar(300) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `rate` double NOT NULL,
  `stk_rate` double NOT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_billdtls_ret`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_billing`
--

CREATE TABLE IF NOT EXISTS `main_billing` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `sec` int(11) NOT NULL,
  `als` varchar(300) NOT NULL,
  `billno` double NOT NULL,
  `blno` varchar(50) DEFAULT NULL,
  `sto_blno` varchar(300) NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `grp` varchar(300) NOT NULL,
  `cid` varchar(20) DEFAULT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gstam` double NOT NULL,
  `roff` double NOT NULL,
  `tpoint` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` double NOT NULL,
  `car` varchar(50) DEFAULT NULL,
  `dis` varchar(50) DEFAULT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `tmod` varchar(300) NOT NULL,
  `psup` varchar(300) NOT NULL,
  `vno` varchar(300) NOT NULL,
  `lpd` varchar(333) DEFAULT NULL,
  `gstin` varchar(333) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  `cstat` int(11) NOT NULL DEFAULT '0',
  `sto` int(11) NOT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `blno` (`blno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- Dumping data for table `main_billing`
--

INSERT INTO `main_billing` (`sl`, `sec`, `als`, `billno`, `blno`, `sto_blno`, `fst`, `tst`, `gst`, `grp`, `cid`, `amm`, `tamm`, `gstam`, `roff`, `tpoint`, `paid`, `due`, `crdtp`, `cbnm`, `dt`, `edt`, `pdts`, `vat`, `vatamm`, `car`, `dis`, `bcd`, `tmod`, `psup`, `vno`, `lpd`, `gstin`, `eby`, `rstat`, `cstat`, `sto`) VALUES
(1, 1, 'HM', 1, 'HM/19-20/00001', '', '1', '1', 1, '4', '1', 56300, 47711.8644, 8588.1356, 0, 0, 0, 0, '1', '', '2019-07-10', '2019-07-10', '10-07-2019 17:31:30 pm', '', 0, '', '', '1', '', '', '', '', '19DWSPS7416H1ZO', 'admin', 0, 0, 0),
(2, 0, 'HM', 2, 'HM/19-20/00002', '19-20/-P000002', '1', '1', 1, '4', '1', 85576, 72522.04, 13053.96, 0.01, 0, 0, 0, '1', '', '2019-07-10', '2019-07-10', '10-07-2019 17:33:39 pm', '', 0, '', '0', '1', '', '', '000002', '', '19DWSPS7416H1ZO', 'admin', 0, 0, 1),
(3, 1, 'HM', 3, 'HM/19-20/00003', '', '1', '1', 1, '4', '1', 100, 78.125, 21.875, 0, 0, 0, 0, '1', '', '2020-01-31', '2020-01-31', '31-01-2020 15:33:40 pm', '', 0, '', '', '1', '', '', '', '', '19DWSPS7416H1ZO', 'onsadmin', 0, 0, 0),
(4, 1, 'HM', 1, 'HM/21-22/00001', '', '1', '1', 1, '4', '1', 3300, 2946.4286, 353.5714, 0, 0, 0, 0, '1', '', '2021-04-20', '2021-04-20', '20-04-2021 10:51:42 am', '', 0, '', '', '1', '', '', '', '', '19DWSPS7416H1ZO', 'onsadmin', 0, 0, 0),
(5, 1, 'HM', 2, 'HM/21-22/00002', '', '1', '1', 1, '4', '2', 4750, 4093.5228, 656.4772, 0, 0, 0, 0, '1', '', '2021-04-20', '2021-04-20', '20-04-2021 10:53:49 am', '', 0, '', '', '1', '', '', '', '', '', 'onsadmin', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_billing_log`
--

CREATE TABLE IF NOT EXISTS `main_billing_log` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `dblno` varchar(300) NOT NULL,
  `sec` int(11) NOT NULL,
  `als` varchar(300) NOT NULL,
  `billno` double NOT NULL,
  `blno` varchar(50) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `grp` varchar(300) NOT NULL,
  `cid` varchar(20) DEFAULT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gstam` double NOT NULL,
  `roff` double NOT NULL,
  `tpoint` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` double NOT NULL,
  `car` varchar(50) DEFAULT NULL,
  `dis` varchar(50) DEFAULT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `tmod` varchar(300) NOT NULL,
  `psup` varchar(300) NOT NULL,
  `vno` varchar(300) NOT NULL,
  `lpd` varchar(333) DEFAULT NULL,
  `gstin` varchar(333) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  `cstat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`),
  UNIQUE KEY `blno` (`blno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_billing_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_billing_ret`
--

CREATE TABLE IF NOT EXISTS `main_billing_ret` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `billno` double NOT NULL,
  `blno` varchar(50) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `invdt` date NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `grp` varchar(300) NOT NULL,
  `cid` varchar(20) DEFAULT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gstam` double NOT NULL,
  `roff` double NOT NULL,
  `tpoint` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` double NOT NULL,
  `car` varchar(50) DEFAULT NULL,
  `dis` varchar(50) DEFAULT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `tmod` varchar(300) NOT NULL,
  `psup` varchar(300) NOT NULL,
  `vno` varchar(300) NOT NULL,
  `lpd` varchar(333) DEFAULT NULL,
  `gstin` varchar(333) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  `cstat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_billing_ret`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_branch`
--

CREATE TABLE IF NOT EXISTS `main_branch` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `bnm` varchar(100) DEFAULT NULL,
  `als` varchar(5) DEFAULT NULL,
  `addr` varchar(150) DEFAULT NULL,
  `bcnt` varchar(50) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  `vat` varchar(300) NOT NULL,
  `lat` varchar(333) NOT NULL,
  `lng` varchar(333) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `main_branch`
--

INSERT INTO `main_branch` (`sl`, `bnm`, `als`, `addr`, `bcnt`, `stat`, `vat`, `lat`, `lng`) VALUES
(1, 'Krishnanagar', 'HM', 'NH 34 , MOTINAGAR BHATJANGLA, KRISHNAGAR , NADIA  741102', '9434604573', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_catg`
--

CREATE TABLE IF NOT EXISTS `main_catg` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sec` varchar(11) NOT NULL DEFAULT '1',
  `cnm` varchar(200) DEFAULT NULL,
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `eby` varchar(500) NOT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `main_catg`
--

INSERT INTO `main_catg` (`sl`, `sec`, `cnm`, `edt`, `eby`, `stat`) VALUES
(1, '1', 'TMT11', '2019-07-10', 'admin', 0),
(2, '1', 'TMT122', '2020-01-30', 'admin', 0),
(3, '', 'TMT13', '2020-01-30', 'admin', 0),
(4, '1', 'test', '2020-01-30', 'admin', 0),
(5, '1', 'TMT BAR', '2020-01-31', 'admin', 0),
(6, '1', 'Cement', '2021-04-20', 'onsadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_cdnr`
--

CREATE TABLE IF NOT EXISTS `main_cdnr` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `refno` varchar(300) NOT NULL,
  `sup` varchar(300) NOT NULL,
  `sgstin` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `note_no` varchar(300) NOT NULL,
  `dt` date NOT NULL,
  `inv` varchar(300) NOT NULL,
  `invdt` date NOT NULL,
  `note_typ` varchar(300) NOT NULL,
  `typ` varchar(300) NOT NULL,
  `tax_rate` double NOT NULL,
  `tax` double NOT NULL,
  `net` double NOT NULL,
  `amm` double NOT NULL,
  `styp` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `dsl` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_cdnr`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_cnm`
--

CREATE TABLE IF NOT EXISTS `main_cnm` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cnm` varchar(300) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `cont` varchar(300) NOT NULL,
  `vat` varchar(300) NOT NULL,
  `cst` varchar(300) NOT NULL,
  `gstin` varchar(300) NOT NULL,
  `branch1` varchar(300) NOT NULL,
  `branch2` varchar(300) NOT NULL,
  `ifsc1` varchar(300) NOT NULL,
  `ifsc2` varchar(300) NOT NULL,
  `ac1` varchar(300) NOT NULL,
  `ac2` varchar(300) NOT NULL,
  `acnm1` varchar(300) NOT NULL,
  `acnm2` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `main_cnm`
--

INSERT INTO `main_cnm` (`sl`, `cnm`, `addr`, `cont`, `vat`, `cst`, `gstin`, `branch1`, `branch2`, `ifsc1`, `ifsc2`, `ac1`, `ac2`, `acnm1`, `acnm2`) VALUES
(1, 'Hindusthan Metal', 'M M Ghosh Street, Patra Market, Krishnanagar, Nadia, WB-741101', '7718499699', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `main_cust`
--

CREATE TABLE IF NOT EXISTS `main_cust` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `typ` varchar(300) NOT NULL,
  `nm` varchar(200) DEFAULT NULL,
  `addr` varchar(200) DEFAULT NULL,
  `cont` varchar(200) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `vat_no` varchar(300) DEFAULT NULL,
  `dob` date NOT NULL DEFAULT '0000-00-00',
  `doa` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `edtm` varchar(200) DEFAULT NULL,
  `eby` varchar(200) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  `gstin` varchar(300) NOT NULL,
  `pan` varchar(300) NOT NULL,
  `gstdt` date NOT NULL,
  `st` varchar(333) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_cust`
--

INSERT INTO `main_cust` (`sl`, `typ`, `nm`, `addr`, `cont`, `mail`, `vat_no`, `dob`, `doa`, `edt`, `edtm`, `eby`, `stat`, `gstin`, `pan`, `gstdt`, `st`) VALUES
(1, '', 'jafar Ikbal', 'Krishnagar', '8101236848', 'ikbal.jafar46@gmail.com', '', '0000-00-00', '0000-00-00', '2019-07-10', '10-07-2019 17:20:11', 'admin', 0, '19DWSPS7416H1ZO', 'DWSPS7416H', '2019-03-01', '1'),
(2, '', 'Jafar', '', '81023658', '', NULL, '0000-00-00', '0000-00-00', '2021-04-20', '20-04-2021 10:49:56', 'onsadmin', 0, '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `main_cus_typ`
--

CREATE TABLE IF NOT EXISTS `main_cus_typ` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `tp` varchar(300) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_cus_typ`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_deg`
--

CREATE TABLE IF NOT EXISTS `main_deg` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `deg` varchar(300) DEFAULT NULL,
  `lvl` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `main_deg`
--

INSERT INTO `main_deg` (`sl`, `deg`, `lvl`) VALUES
(1, 'Godown', '3'),
(2, 'Sale Person', '4'),
(3, 'System Admin', '-1'),
(4, 'Manager', '10'),
(5, 'Billing', '5'),
(6, 'Accountant', '7'),
(7, 'Cashier', '6'),
(8, 'Customer', '20'),
(9, 'Shop Sale Person', '8'),
(10, 'Office Staff', '30');

-- --------------------------------------------------------

--
-- Table structure for table `main_drcr`
--

CREATE TABLE IF NOT EXISTS `main_drcr` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `vno` varchar(30) DEFAULT NULL,
  `blno` varchar(300) NOT NULL,
  `sbill` varchar(50) DEFAULT NULL,
  `cbill` varchar(50) DEFAULT NULL,
  `sid` varchar(300) DEFAULT NULL,
  `cid` varchar(300) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `nrtn` varchar(300) DEFAULT NULL,
  `typ` varchar(50) DEFAULT NULL,
  `ttyp` varchar(300) NOT NULL,
  `idt` date NOT NULL DEFAULT '0000-00-00',
  `mtd` varchar(30) DEFAULT NULL,
  `mtddtl` varchar(25) DEFAULT NULL,
  `dldgr` varchar(300) DEFAULT NULL,
  `cldgr` varchar(200) DEFAULT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `brncd` varchar(25) DEFAULT NULL,
  `eby` varchar(75) DEFAULT NULL,
  `edtm` varchar(50) DEFAULT NULL,
  `pno` int(11) NOT NULL DEFAULT '0',
  `it` int(11) NOT NULL DEFAULT '0',
  `stat` int(11) NOT NULL DEFAULT '1',
  `paid` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `blnon` varchar(300) NOT NULL,
  `retn_stat` int(11) NOT NULL,
  `path` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `main_drcr`
--

INSERT INTO `main_drcr` (`sl`, `vno`, `blno`, `sbill`, `cbill`, `sid`, `cid`, `dt`, `nrtn`, `typ`, `ttyp`, `idt`, `mtd`, `mtddtl`, `dldgr`, `cldgr`, `amm`, `brncd`, `eby`, `edtm`, `pno`, `it`, `stat`, `paid`, `pay`, `blnon`, `retn_stat`, `path`) VALUES
(1, 'SV0000001', '', '19-20/-P000001', NULL, '1', NULL, '2019-07-10', 'Purchase', NULL, '', '0000-00-00', NULL, NULL, '-3', '12', 325289.9, '1', 'admin', '10-07-2019 17:27:42 pm', 0, 0, 1, 0, 0, '', 0, ''),
(2, 'SV0000001', '', '19-20/-P000001', NULL, '1', NULL, '2019-07-10', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '37', '12', 29276.05, '1', 'admin', '10-07-2019 17:27:42 pm', 0, 0, 1, 0, 0, '', 0, ''),
(3, 'SV0000001', '', '19-20/-P000001', NULL, '1', NULL, '2019-07-10', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '38', '12', 29276.05, '1', 'admin', '10-07-2019 17:27:42 pm', 0, 0, 1, 0, 0, '', 0, ''),
(4, 'SV0000002', '', NULL, 'HM/19-20/00001', NULL, '1', '2019-07-10', 'Sale', NULL, '', '0000-00-00', NULL, NULL, '4', '-2', 47711.8644, '1', 'admin', '10-07-2019 17:31:30 pm', 0, 0, 1, 0, 1, '', 0, ''),
(5, 'SV0000002', '', NULL, 'HM/19-20/00001', NULL, '1', '2019-07-10', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '37', 4294.0678, '1', 'admin', '10-07-2019 17:31:30 pm', 0, 0, 1, 0, 1, '', 0, ''),
(6, 'SV0000002', '', NULL, 'HM/19-20/00001', NULL, '1', '2019-07-10', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '38', 4294.0678, '1', 'admin', '10-07-2019 17:31:30 pm', 0, 0, 1, 0, 1, '', 0, ''),
(7, 'SV0000003', '', '19-20/-P000002', NULL, '1', NULL, '2019-07-10', 'Purchase', NULL, '', '0000-00-00', NULL, NULL, '-3', '12', 72522.04, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 0, '', 0, ''),
(8, 'SV0000003', '', '19-20/-P000002', NULL, '1', NULL, '2019-07-10', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '37', '12', 6526.98, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 0, '', 0, ''),
(9, 'SV0000003', '', '19-20/-P000002', NULL, '1', NULL, '2019-07-10', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '38', '12', 6526.98, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 0, '', 0, ''),
(10, 'SV0000004', '', NULL, 'HM/19-20/00002', NULL, '1', '2019-07-10', 'Sale', NULL, '', '0000-00-00', NULL, NULL, '4', '-2', 72522.04, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 1, '', 0, ''),
(11, 'SV0000004', '', NULL, 'HM/19-20/00002', NULL, '1', '2019-07-10', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '37', 6526.98, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 1, '', 0, ''),
(12, 'SV0000004', '', NULL, 'HM/19-20/00002', NULL, '1', '2019-07-10', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '38', 6526.98, '1', 'admin', '10-07-2019 17:33:39 pm', 0, 0, 1, 0, 1, '', 0, ''),
(13, 'SV0000005', '', '19-20/-P000003', NULL, '1', NULL, '2020-01-31', 'Purchase', NULL, '', '0000-00-00', NULL, NULL, '-3', '12', 574042.38, '1', 'onsadmin', '31-01-2020 15:26:58 pm', 0, 0, 1, 0, 0, '', 0, ''),
(14, 'SV0000005', '', '19-20/-P000003', NULL, '1', NULL, '2020-01-31', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '37', '12', 51738.81, '1', 'onsadmin', '31-01-2020 15:26:58 pm', 0, 0, 1, 0, 0, '', 0, ''),
(15, 'SV0000005', '', '19-20/-P000003', NULL, '1', NULL, '2020-01-31', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '38', '12', 51738.81, '1', 'onsadmin', '31-01-2020 15:26:58 pm', 0, 0, 1, 0, 0, '', 0, ''),
(16, 'SV0000006', '', NULL, 'HM/19-20/00003', NULL, '1', '2020-01-31', 'Sale', NULL, '', '0000-00-00', NULL, NULL, '4', '-2', 78.125, '1', 'onsadmin', '31-01-2020 15:33:40 pm', 0, 0, 1, 0, 1, '', 0, ''),
(17, 'SV0000006', '', NULL, 'HM/19-20/00003', NULL, '1', '2020-01-31', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '37', 10.9375, '1', 'onsadmin', '31-01-2020 15:33:40 pm', 0, 0, 1, 0, 1, '', 0, ''),
(18, 'SV0000006', '', NULL, 'HM/19-20/00003', NULL, '1', '2020-01-31', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '38', 10.9375, '1', 'onsadmin', '31-01-2020 15:33:40 pm', 0, 0, 1, 0, 1, '', 0, ''),
(19, 'SV0000007', '', NULL, NULL, '', '', '2020-03-17', '12235', '33', '', '0000-00-00', '1', '', '3', '-2', 200, '1', 'onsadmin', '17/03/2020 05:00:00 pm', 0, 0, 1, 0, 0, '', 0, 'img/income/SV0000007.'),
(20, 'SV0000008', '', '21-22/-P000004', NULL, '2', NULL, '2021-04-20', 'Purchase', NULL, '', '0000-00-00', NULL, NULL, '-3', '12', 35050, '1', 'onsadmin', '20-04-2021 10:48:25 am', 0, 0, 1, 0, 0, '', 0, ''),
(21, 'SV0000008', '', '21-22/-P000004', NULL, '2', NULL, '2021-04-20', 'I-GST', NULL, '', '0000-00-00', NULL, NULL, '39', '12', 4116, '1', 'onsadmin', '20-04-2021 10:48:25 am', 0, 0, 1, 0, 0, '', 0, ''),
(22, 'SV0000008', '', '21-22/-P000004', NULL, '2', NULL, '2021-04-20', 'Purchase ADD Charge', NULL, '', '0000-00-00', NULL, NULL, '21', '12', 1000, '1', 'onsadmin', '20-04-2021 10:48:25 am', 0, 0, 1, 0, 0, '', 0, ''),
(23, 'SV0000009', '', NULL, 'HM/21-22/00001', NULL, '1', '2021-04-20', 'Sale', NULL, '', '0000-00-00', NULL, NULL, '4', '-2', 2946.4286, '1', 'onsadmin', '20-04-2021 10:51:42 am', 0, 0, 1, 0, 1, '', 0, ''),
(24, 'SV0000009', '', NULL, 'HM/21-22/00001', NULL, '1', '2021-04-20', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '37', 176.7857, '1', 'onsadmin', '20-04-2021 10:51:42 am', 0, 0, 1, 0, 1, '', 0, ''),
(25, 'SV0000009', '', NULL, 'HM/21-22/00001', NULL, '1', '2021-04-20', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '38', 176.7857, '1', 'onsadmin', '20-04-2021 10:51:42 am', 0, 0, 1, 0, 1, '', 0, ''),
(26, 'SV0000010', '', NULL, 'HM/21-22/00002', NULL, '2', '2021-04-20', 'Sale', NULL, '', '0000-00-00', NULL, NULL, '4', '-2', 4093.5228, '1', 'onsadmin', '20-04-2021 10:53:49 am', 0, 0, 1, 0, 1, '', 0, ''),
(27, 'SV0000010', '', NULL, 'HM/21-22/00002', NULL, '2', '2021-04-20', 'C-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '37', 328.2386, '1', 'onsadmin', '20-04-2021 10:53:49 am', 0, 0, 1, 0, 1, '', 0, ''),
(28, 'SV0000010', '', NULL, 'HM/21-22/00002', NULL, '2', '2021-04-20', 'S-GST', NULL, '', '0000-00-00', NULL, NULL, '4', '38', 328.2386, '1', 'onsadmin', '20-04-2021 10:53:49 am', 0, 0, 1, 0, 1, '', 0, ''),
(29, 'SV0000011', '', NULL, NULL, '', '2', '2021-04-20', 'payment', '77', '', '0000-00-00', '1', '', '3', '4', 4700, '1', 'onsadmin', '20/04/2021 10:56:51 am', 0, 0, 1, 0, 0, '', 0, 'img/recv_reg/SV0000011.'),
(30, 'SV0000011', '', NULL, NULL, '', '2', '2021-04-20', 'Discount', 'D77', '', '0000-00-00', '1', '', '29', '4', 50, '1', 'onsadmin', '20/04/2021 10:56:51 am', 0, 0, 1, 0, 0, '', 0, 'img/recv_reg/SV0000011.');

-- --------------------------------------------------------

--
-- Table structure for table `main_dt`
--

CREATE TABLE IF NOT EXISTS `main_dt` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `dt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `main_dt`
--

INSERT INTO `main_dt` (`sl`, `dt`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_group`
--

CREATE TABLE IF NOT EXISTS `main_group` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `pcd` int(11) NOT NULL DEFAULT '0',
  `nm` varchar(200) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `main_group`
--

INSERT INTO `main_group` (`sl`, `pcd`, `nm`, `stat`) VALUES
(1, 5, 'Bank Ac.', 0),
(2, 5, 'Cash Ac.', 0),
(3, 7, 'Direct Income', 0),
(4, 7, 'Indirect Income', 0),
(5, 8, 'Direct Expenses', 0),
(6, 8, 'Indirect Expenses', 0),
(7, 5, 'Customer', 0),
(8, 3, 'Supplier', 0),
(9, 5, 'Sales from  Vehicle', 0),
(10, 8, 'MTS Recharge', 1),
(11, 8, 'Gift Purpose', 1),
(12, 5, 'Credit Note', 0),
(13, 3, 'GST', 0),
(14, 5, 'Round Off', 1),
(16, 8, 'Salary', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_gst`
--

CREATE TABLE IF NOT EXISTS `main_gst` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sgst` double NOT NULL,
  `cgst` double NOT NULL,
  `igst` double NOT NULL,
  `fdt` date NOT NULL,
  `tdt` date NOT NULL,
  `cat` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_gst`
--

INSERT INTO `main_gst` (`sl`, `sgst`, `cgst`, `igst`, `fdt`, `tdt`, `cat`) VALUES
(1, 9, 9, 18, '2017-07-01', '2030-12-31', '1'),
(2, 9, 9, 18, '2017-07-01', '2030-12-31', '2'),
(3, 14, 14, 28, '2017-07-01', '2030-12-31', '3'),
(4, 9, 9, 18, '2017-07-01', '2030-12-31', '4'),
(5, 0, 0, 0, '2017-07-01', '2030-12-31', '5'),
(6, 6, 6, 12, '2017-07-01', '2030-12-31', '6'),
(7, 9, 9, 18, '2017-07-01', '2030-12-31', '7'),
(8, 0, 0, 0, '2017-07-01', '2030-12-31', '8');

-- --------------------------------------------------------

--
-- Table structure for table `main_ledg`
--

CREATE TABLE IF NOT EXISTS `main_ledg` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `gcd` int(11) NOT NULL DEFAULT '0',
  `nm` varchar(200) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `main_ledg`
--

INSERT INTO `main_ledg` (`sl`, `gcd`, `nm`, `stat`) VALUES
(-1, 0, 'Opening Balance', 0),
(1, 1, 'UBI, UMORPUR (A/C NO- 1377050012254)', 1),
(2, 1, 'NEFT MODE', 1),
(3, 2, 'Main Cash', 1),
(-2, 3, 'Sales or Service', 0),
(4, 7, 'Customer', 1),
(6, 3, 'Sale Vat', 1),
(8, 3, 'FREIGHT', 1),
(10, 5, 'Purchase Vat', 0),
(12, 8, 'Supplier', 0),
(-3, 5, 'Purchase', 0),
(17, 5, 'Office Expenses', 1),
(18, 5, 'Tea & tiffin', 1),
(19, 5, 'Electric Bill ', 1),
(20, 5, 'Telephone Bill', 1),
(21, 5, 'Labour Charge', 1),
(22, 6, 'Car Expenses', 1),
(23, 5, 'Salary A/C', 1),
(24, 5, 'Internet Expenses', 1),
(25, 5, 'CHANDA', 1),
(26, 5, 'Godown Rent', 1),
(27, 5, 'Fuel', 1),
(29, 6, 'DISCOUNT ', 1),
(30, 6, 'Sale Return', 1),
(31, 5, 'Gift', 1),
(35, 12, 'Credit Note', 0),
(36, 1, 'ALLAHABAD BANK (50459766550)', 1),
(37, 13, 'C-GST', 0),
(38, 13, 'S-GST', 0),
(39, 13, 'I-GST', 0),
(40, 14, 'Round OFF', 1),
(42, 16, 'salary A', 1),
(43, 16, 'Salary B', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_primary`
--

CREATE TABLE IF NOT EXISTS `main_primary` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_primary`
--

INSERT INTO `main_primary` (`sl`, `nm`) VALUES
(1, 'Capital A/c'),
(2, 'Loans'),
(4, 'Fixed Assets'),
(5, 'Current Assets'),
(7, 'Income'),
(8, 'Expenses'),
(3, 'Liabilities');

-- --------------------------------------------------------

--
-- Table structure for table `main_product`
--

CREATE TABLE IF NOT EXISTS `main_product` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(15) DEFAULT NULL,
  `scat` varchar(300) NOT NULL,
  `pnm` varchar(300) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `mrp` varchar(300) DEFAULT NULL,
  `smvlu` double NOT NULL,
  `mdvlu` double NOT NULL,
  `bgvlu` double NOT NULL,
  `hsn` varchar(300) NOT NULL,
  `typ` int(11) NOT NULL DEFAULT '0',
  `stat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_product`
--

INSERT INTO `main_product` (`sl`, `cat`, `scat`, `pnm`, `unit`, `mrp`, `smvlu`, `mdvlu`, `bgvlu`, `hsn`, `typ`, `stat`) VALUES
(1, '1', '', '8 MM TMT ROD', '', '', 0, 0, 0, '7214', 0, 0),
(2, '1', '', '10 MM TMT ROD', '', '', 0, 0, 0, '7214', 0, 0),
(3, '4', '', 'test Product', '', '', 0, 0, 0, '5547', 0, 0),
(4, '1', '', 'asd', '', '', 0, 0, 0, '123445', 0, 0),
(5, '5', '', '5.5 MM TMT', '', '', 0, 0, 0, '', 0, 0),
(6, '6', '', 'ACC ', '', '', 0, 0, 0, '2569845', 0, 0),
(7, '5', '', 'SRMB 8MM', '', '', 0, 0, 0, '36598', 0, 0),
(8, '6', '', 'ACC NG', '', '', 0, 0, 0, '32256', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_project`
--

CREATE TABLE IF NOT EXISTS `main_project` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_project`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_ptemp`
--

CREATE TABLE IF NOT EXISTS `main_ptemp` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `total` varchar(250) DEFAULT NULL,
  `disp` varchar(250) DEFAULT NULL,
  `disa` varchar(250) DEFAULT NULL,
  `ldis` varchar(250) DEFAULT NULL,
  `ldisa` varchar(250) DEFAULT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(25) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` varchar(150) DEFAULT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `eby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `main_ptemp`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchase`
--

CREATE TABLE IF NOT EXISTS `main_purchase` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `blno` varchar(50) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `sid` varchar(20) DEFAULT NULL,
  `addr` varchar(300) NOT NULL,
  `inv` varchar(300) DEFAULT NULL,
  `sttl` double NOT NULL,
  `tmm2` double NOT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `sdis` double NOT NULL,
  `tamm` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `roff` double NOT NULL,
  `adl` varchar(300) NOT NULL,
  `adlv` int(11) NOT NULL,
  `remk` varchar(300) NOT NULL,
  `lfr` varchar(200) DEFAULT NULL,
  `lcd` varchar(255) DEFAULT NULL,
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` varchar(300) NOT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  `app` int(11) NOT NULL,
  `vstat` int(11) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `main_purchase`
--

INSERT INTO `main_purchase` (`sl`, `blno`, `fst`, `tst`, `gst`, `sid`, `addr`, `inv`, `sttl`, `tmm2`, `amm`, `sdis`, `tamm`, `paid`, `due`, `roff`, `adl`, `adlv`, `remk`, `lfr`, `lcd`, `crdtp`, `cbnm`, `dt`, `edt`, `rdt`, `pdts`, `vat`, `vatamm`, `bcd`, `eby`, `rstat`, `app`, `vstat`) VALUES
(1, '19-20/-P000001', '1', '1', 1, '1', '1', '00325', 383841.52, 383842, 325289.42, 0, 383842, 0, 0, 0.48, '+', 0, '', '', '', '1', '', '2019-07-10', '2019-07-10', '0000-00-00', '10-07-2019 17:27:42 pm', '', '', '1', 'admin', 0, 0, 0),
(2, '19-20/-P000002', '1', '1', 1, '1', '1', '63524', 85575.99, 85576, 72522.03, 0, 85576, 0, 0, 0.01, '+', 0, '', '', '', '1', '', '2019-07-10', '2019-07-10', '0000-00-00', '10-07-2019 17:33:39 pm', '', '', '1', 'admin', 0, 0, 0),
(3, '19-20/-P000003', '1', '1', 1, '1', '1', '123434', 677519.94, 677520, 574042.32, 0, 677520, 0, 0, 0.06, '+', 0, '', '', '', '1', '', '2020-01-31', '2020-01-31', '0000-00-00', '31-01-2020 15:26:58 pm', '', '', '1', 'onsadmin', 0, 0, 0),
(4, '21-22/-P000004', '6', '1', 1, '2', '2', '236597', 39166, 40166, 35050, 0, 39166, 0, 0, 0, '+', 1000, '21', '', '', '1', '', '2021-04-20', '2021-04-20', '0000-00-00', '20-04-2021 10:48:25 am', '', '', '1', 'onsadmin', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_purchasedet`
--

CREATE TABLE IF NOT EXISTS `main_purchasedet` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sup` varchar(300) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ldis` double NOT NULL,
  `ldisa` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `stk_rate` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `eby` varchar(300) DEFAULT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_purchasedet`
--

INSERT INTO `main_purchasedet` (`sl`, `sup`, `cat`, `scat`, `unit`, `betno`, `usl`, `uval`, `pck`, `prsl`, `qty`, `prc`, `ttl`, `dis`, `amm`, `total`, `disp`, `disa`, `ldis`, `ldisa`, `fst`, `tst`, `cgst_rt`, `cgst_am`, `sgst_rt`, `sgst_am`, `igst_rt`, `igst_am`, `net_am`, `mrp`, `bcd`, `rate`, `stk_rate`, `blno`, `rdt`, `dt`, `eby`, `rqty`) VALUES
(1, '1', '1', '', 'sun', '', '2', 1, 0, '2', 5.34, 0, 254781.33, 0, 254781.33, 254781.33, 0, 0, 0, 0, '1', '1', 9, 22930.32, 9, 22930.32, 0, 0, 300641.97, 47711.86, '1', 56299.994382022, 47711.859550562, '19-20/-P000001', '0000-00-00', '2019-07-10', 'admin', 0),
(2, '1', '1', '', 'sun', '', '1', 1, 0, '1', 1.51, 0, 70508.09, 0, 70508.09, 70508.09, 0, 0, 0, 0, '1', '1', 9, 6345.73, 9, 6345.73, 0, 0, 83199.55, 46694.1, '1', 55099.039735099, 46694.099337748, '19-20/-P000001', '0000-00-00', '2019-07-10', 'admin', 0),
(3, '1', '1', '', 'sun', '', '2', 1, 0, '2', 1.52, 0, 72522.03, 0, 72522.03, 72522.03, 0, 0, 0, 0, '1', '1', 9, 6526.98, 9, 6526.98, 0, 0, 85575.99, 47711.86, '1', 56299.993421053, 47711.861842105, '19-20/-P000002', '0000-00-00', '2019-07-10', 'admin', 0),
(4, '1', '4', '', 'sun', '', '3', 1, 0, '3', 10, 0, 1500, 0, 1500, 1500, 0, 0, 0, 0, '1', '1', 14, 210, 14, 210, 0, 0, 1920, 150, '1', 192, 150, '19-20/-P000003', '0000-00-00', '2020-01-31', 'onsadmin', 0),
(5, '1', '1', '', 'sun', '', '2', 1, 0, '2', 12, 0, 572542.32, 0, 572542.32, 572542.32, 0, 0, 0, 0, '1', '1', 9, 51528.81, 9, 51528.81, 0, 0, 675599.94, 47711.86, '1', 56299.995, 47711.86, '19-20/-P000003', '0000-00-00', '2020-01-31', 'onsadmin', 0),
(6, '2', '6', '', 'sun', '', '6', 1, 0, '6', 100, 0, 27550, 0, 27550, 29000, 5, 1450, 0, 0, '6', '1', 0, 0, 0, 0, 12, 3306, 30856, 290, '1', 308.56, 275.5, '21-22/-P000004', '0000-00-00', '2021-04-20', 'onsadmin', 0),
(7, '2', '5', '', 'mun', '', '7', 4.6, 0, '7', 100, 0, 4500, 0, 4500, 5000, 10, 500, 0, 0, '6', '1', 0, 0, 0, 0, 18, 810, 5310, 50, '1', 11.5434782609, 9.78260869565, '21-22/-P000004', '0000-00-00', '2021-04-20', 'onsadmin', 0),
(8, '2', '6', '', 'sun', '', '8', 1, 0, '8', 10, 0, 3000, 0, 3000, 3000, 0, 0, 0, 0, '6', '1', 0, 0, 0, 0, 0, 0, 3000, 300, '1', 300, 300, '21-22/-P000004', '0000-00-00', '2021-04-20', 'onsadmin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_purchasedet_del`
--

CREATE TABLE IF NOT EXISTS `main_purchasedet_del` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `refno` varchar(300) NOT NULL,
  `sup` varchar(300) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ldis` double NOT NULL,
  `ldisa` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `stk_rate` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `eby` varchar(300) DEFAULT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchasedet_del`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchasedet_edt`
--

CREATE TABLE IF NOT EXISTS `main_purchasedet_edt` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `uval` double NOT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ldis` double NOT NULL,
  `ldisa` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `blno` varchar(30) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `eby` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `main_purchasedet_edt`
--

INSERT INTO `main_purchasedet_edt` (`sl`, `cat`, `scat`, `unit`, `usl`, `betno`, `uval`, `pck`, `prsl`, `qty`, `prc`, `ttl`, `dis`, `amm`, `total`, `disp`, `disa`, `ldis`, `ldisa`, `fst`, `tst`, `cgst_rt`, `cgst_am`, `sgst_rt`, `sgst_am`, `igst_rt`, `igst_am`, `net_am`, `mrp`, `bcd`, `rate`, `blno`, `rdt`, `eby`) VALUES
(1, '1', '', 'sun', '2', '', 1, 0, '2', 5.34, 0, 254781.33, 0, 254781.33, 254781.33, 0, 0, 0, 0, '1', '1', 9, 22930.32, 9, 22930.32, 0, 0, 300641.97, 47711.86, '1', 56299.994382022, '19-20/-P000001', '0000-00-00', 'admin'),
(2, '1', '', 'sun', '1', '', 1, 0, '1', 1.51, 0, 70508.09, 0, 70508.09, 70508.09, 0, 0, 0, 0, '1', '1', 9, 6345.73, 9, 6345.73, 0, 0, 83199.55, 46694.1, '1', 55099.039735099, '19-20/-P000001', '0000-00-00', 'admin'),
(3, '6', '', 'sun', '6', '', 1, 0, '6', 100, 0, 27550, 0, 27550, 29000, 5, 1450, 0, 0, '6', '1', 0, 0, 0, 0, 12, 3306, 30856, 290, '1', 308.56, '21-22/-P000004', '0000-00-00', 'onsadmin'),
(4, '5', '', 'mun', '7', '', 4.6, 0, '7', 100, 0, 4500, 0, 4500, 5000, 10, 500, 0, 0, '6', '1', 0, 0, 0, 0, 18, 810, 5310, 50, '1', 11.5434782609, '21-22/-P000004', '0000-00-00', 'onsadmin'),
(5, '6', '', 'sun', '8', '', 1, 0, '8', 10, 0, 3000, 0, 3000, 3000, 0, 0, 0, 0, '6', '1', 0, 0, 0, 0, 0, 0, 3000, 300, '1', 300, '21-22/-P000004', '0000-00-00', 'onsadmin');

-- --------------------------------------------------------

--
-- Table structure for table `main_purchasedet_edt_log`
--

CREATE TABLE IF NOT EXISTS `main_purchasedet_edt_log` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `edt_blno` varchar(300) DEFAULT NULL,
  `sup` varchar(300) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ldis` double NOT NULL,
  `ldisa` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `stk_rate` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `eby` varchar(300) DEFAULT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchasedet_edt_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchasedet_ret`
--

CREATE TABLE IF NOT EXISTS `main_purchasedet_ret` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sup` varchar(300) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `unit` varchar(300) NOT NULL,
  `betno` varchar(300) DEFAULT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `pck` double NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `qty` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `ttl` double NOT NULL DEFAULT '0',
  `dis` double NOT NULL,
  `amm` double NOT NULL,
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ldis` double NOT NULL,
  `ldisa` double NOT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `mrp` double NOT NULL,
  `bcd` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0',
  `stk_rate` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `refno` varchar(300) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `eby` varchar(300) DEFAULT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchasedet_ret`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchase_del`
--

CREATE TABLE IF NOT EXISTS `main_purchase_del` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `blno` varchar(50) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `typ` varchar(300) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `sid` varchar(20) DEFAULT NULL,
  `addr` varchar(300) NOT NULL,
  `inv` varchar(300) DEFAULT NULL,
  `sttl` double NOT NULL,
  `tmm2` double NOT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `sdis` double NOT NULL,
  `tamm` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `roff` double NOT NULL,
  `adl` varchar(300) NOT NULL,
  `adlv` int(11) NOT NULL,
  `remk` varchar(300) NOT NULL,
  `lfr` varchar(200) DEFAULT NULL,
  `lcd` varchar(255) DEFAULT NULL,
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` varchar(300) NOT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchase_del`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchase_edt_log`
--

CREATE TABLE IF NOT EXISTS `main_purchase_edt_log` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `edt_blno` varchar(300) DEFAULT NULL,
  `blno` varchar(50) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `sid` varchar(20) DEFAULT NULL,
  `addr` varchar(300) NOT NULL,
  `inv` varchar(300) DEFAULT NULL,
  `sttl` double NOT NULL,
  `tmm2` double NOT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `sdis` double NOT NULL,
  `tamm` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `roff` double NOT NULL,
  `adl` varchar(300) NOT NULL,
  `adlv` int(11) NOT NULL,
  `remk` varchar(300) NOT NULL,
  `lfr` varchar(200) DEFAULT NULL,
  `lcd` varchar(255) DEFAULT NULL,
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `edttm` varchar(300) NOT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` varchar(300) NOT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `bill_by` varchar(300) NOT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchase_edt_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_purchase_ret`
--

CREATE TABLE IF NOT EXISTS `main_purchase_ret` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `blno` varchar(50) DEFAULT NULL,
  `refno` varchar(300) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `sid` varchar(20) DEFAULT NULL,
  `addr` varchar(300) NOT NULL,
  `inv` varchar(300) DEFAULT NULL,
  `invdt` date NOT NULL,
  `sttl` double NOT NULL,
  `tmm2` double NOT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `sdis` double NOT NULL,
  `tamm` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `roff` double NOT NULL,
  `adl` varchar(300) NOT NULL,
  `adlv` int(11) NOT NULL,
  `remk` varchar(300) NOT NULL,
  `lfr` varchar(200) DEFAULT NULL,
  `lcd` varchar(255) DEFAULT NULL,
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` varchar(300) NOT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_purchase_ret`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_scat`
--

CREATE TABLE IF NOT EXISTS `main_scat` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(300) NOT NULL,
  `nm` varchar(300) NOT NULL,
  `hsn` varchar(300) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_scat`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_sec`
--

CREATE TABLE IF NOT EXISTS `main_sec` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `nm` varchar(300) NOT NULL,
  `als` varchar(300) NOT NULL,
  `edt` date NOT NULL,
  `edtm` varchar(300) NOT NULL,
  `eby` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `main_sec`
--

INSERT INTO `main_sec` (`sl`, `nm`, `als`, `edt`, `edtm`, `eby`) VALUES
(1, 'ALL', 'HM', '2019-07-10', '10-07-2019 12:07:12', 'onsadmin');

-- --------------------------------------------------------

--
-- Table structure for table `main_ser_billdtls`
--

CREATE TABLE IF NOT EXISTS `main_ser_billdtls` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sec` int(11) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(300) DEFAULT NULL,
  `mrp` double NOT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` double NOT NULL DEFAULT '0',
  `total` double NOT NULL,
  `disp` double NOT NULL,
  `disa` double NOT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gtamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `blno` varchar(30) DEFAULT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `retno` varchar(300) DEFAULT NULL,
  `rdt` date NOT NULL DEFAULT '0000-00-00',
  `dt` date NOT NULL,
  `rate` double NOT NULL,
  `stk_rate` double NOT NULL,
  `rqty` double NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_ser_billdtls`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_ser_billing`
--

CREATE TABLE IF NOT EXISTS `main_ser_billing` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `sec` int(11) NOT NULL,
  `als` varchar(300) NOT NULL,
  `billno` double NOT NULL,
  `blno` varchar(50) DEFAULT NULL,
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `gst` int(11) NOT NULL,
  `grp` varchar(300) NOT NULL,
  `cid` varchar(20) DEFAULT NULL,
  `amm` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL,
  `gstam` double NOT NULL,
  `roff` double NOT NULL,
  `tpoint` double NOT NULL,
  `paid` double NOT NULL DEFAULT '0',
  `due` double NOT NULL DEFAULT '0',
  `crdtp` varchar(50) DEFAULT NULL,
  `cbnm` varchar(50) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `edt` date NOT NULL DEFAULT '0000-00-00',
  `pdts` varchar(50) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `vatamm` double NOT NULL,
  `car` varchar(50) DEFAULT NULL,
  `dis` varchar(50) DEFAULT NULL,
  `bcd` varchar(300) DEFAULT NULL,
  `tmod` varchar(300) NOT NULL,
  `psup` varchar(300) NOT NULL,
  `vno` varchar(300) NOT NULL,
  `lpd` varchar(333) DEFAULT NULL,
  `gstin` varchar(333) DEFAULT NULL,
  `eby` varchar(30) DEFAULT NULL,
  `rstat` int(11) NOT NULL DEFAULT '0',
  `cstat` int(11) NOT NULL DEFAULT '0',
  `sto` int(11) NOT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `blno` (`blno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `main_ser_billing`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_ser_slt`
--

CREATE TABLE IF NOT EXISTS `main_ser_slt` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(250) DEFAULT NULL,
  `disp` varchar(250) DEFAULT NULL,
  `disa` varchar(250) DEFAULT NULL,
  `sec` int(11) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(25) DEFAULT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` varchar(150) DEFAULT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `eby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `main_ser_slt`
--


-- --------------------------------------------------------

--
-- Table structure for table `main_signup`
--

CREATE TABLE IF NOT EXISTS `main_signup` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `brncd` int(11) NOT NULL DEFAULT '0',
  `mob` varchar(15) DEFAULT NULL,
  `addr` varchar(300) DEFAULT NULL,
  `mailadres` varchar(100) DEFAULT NULL,
  `actnum` int(11) DEFAULT '1',
  `userlevel` tinyint(4) DEFAULT '0',
  `signupdate` varchar(16) DEFAULT NULL,
  `lastlogin` varchar(16) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `lastloginfail` bigint(20) DEFAULT '0',
  `numloginfail` tinyint(4) DEFAULT '0',
  `imei` varchar(300) NOT NULL,
  `devid` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_signup`
--

INSERT INTO `main_signup` (`sl`, `username`, `password`, `name`, `brncd`, `mob`, `addr`, `mailadres`, `actnum`, `userlevel`, `signupdate`, `lastlogin`, `ip`, `lastloginfail`, `numloginfail`, `imei`, `devid`) VALUES
(1, 'admin', 'admin', 'SBH', 1, '9434604573', 'NH 34 , MOTINAGAR BHATJANGLA, KRISHNAGAR , NADIA  741102', '', 0, -1, NULL, '31-01-2020 6:53 ', '157.43.183.201', 20720190914, 0, '', ''),
(2, 'onsadmin', 'onsadmin', 'ONS', 1, '', '', '', 0, -1, '', '20-04-2021 5:01 ', '127.0.0.1', 130820180424, 0, '869906032839472', 'eJwzTMBVIt0:APA91bGBpnvVn7giDgEXA7NO32XPQYkbj0G2u6JUwK6CxNe4O4dkG5enIgyttEDJNmZHd4mOkBO6CXIiUSlAedkfIoyzweMpEMWVYWYtPVU7R4bBUrx_fe1IamW6w61oPWVdEsT0uHiv');

-- --------------------------------------------------------

--
-- Table structure for table `main_slt`
--

CREATE TABLE IF NOT EXISTS `main_slt` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `total` varchar(250) DEFAULT NULL,
  `disp` varchar(250) DEFAULT NULL,
  `disa` varchar(250) DEFAULT NULL,
  `sec` int(11) NOT NULL,
  `cat` varchar(300) NOT NULL,
  `scat` varchar(300) NOT NULL,
  `prsl` varchar(25) DEFAULT NULL,
  `imei` varchar(333) DEFAULT NULL,
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `kg` double NOT NULL,
  `grm` double NOT NULL,
  `pcs` double NOT NULL,
  `betno` varchar(300) NOT NULL,
  `srt` double NOT NULL DEFAULT '0',
  `adp` double NOT NULL DEFAULT '0',
  `prc` varchar(150) DEFAULT NULL,
  `ttl` double NOT NULL DEFAULT '0',
  `tamm` double NOT NULL DEFAULT '0',
  `fst` varchar(300) NOT NULL,
  `tst` varchar(300) NOT NULL,
  `cgst_rt` double NOT NULL,
  `cgst_am` double NOT NULL,
  `sgst_rt` double NOT NULL,
  `sgst_am` double NOT NULL,
  `igst_rt` double NOT NULL,
  `igst_am` double NOT NULL,
  `net_am` double NOT NULL,
  `brate` double NOT NULL,
  `refno` varchar(300) NOT NULL,
  `srtnm` varchar(300) NOT NULL,
  `eby` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `main_slt`
--

INSERT INTO `main_slt` (`sl`, `total`, `disp`, `disa`, `sec`, `cat`, `scat`, `prsl`, `imei`, `unit`, `usl`, `kg`, `grm`, `pcs`, `betno`, `srt`, `adp`, `prc`, `ttl`, `tamm`, `fst`, `tst`, `cgst_rt`, `cgst_am`, `sgst_rt`, `sgst_am`, `igst_rt`, `igst_am`, `net_am`, `brate`, `refno`, `srtnm`, `eby`) VALUES
(3, '100', '', '0', 1, '1', '', '2', NULL, 'sun', '', 0, 0, 1, '', 0, 0, '100', 100, 84.7458, '1', '1', 9, 7.6271, 9, 7.6271, 0, 0, 100, 0, '19-20/-P000001', 'ONS', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `main_state`
--

CREATE TABLE IF NOT EXISTS `main_state` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `cn` varchar(75) NOT NULL DEFAULT 'India',
  `sn` varchar(75) NOT NULL,
  `cd` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `main_state`
--

INSERT INTO `main_state` (`sl`, `cn`, `sn`, `cd`) VALUES
(1, 'India', 'West Bengal', '19'),
(2, 'India', 'Andaman and Nicobar Islands', '35'),
(3, 'India', 'Andhra Pradesh', '28'),
(4, 'India', 'Andhra Pradesh (New)', '37'),
(5, 'India', 'Arunachal Pradesh', '12'),
(6, 'India', 'Assam', '18'),
(7, 'India', 'Bihar', '10'),
(8, 'India', 'Chandigarh', '04'),
(9, 'India', 'Chattisgarh', '22'),
(10, 'India', 'Dadra and Nagar Haveli', '26'),
(11, 'India', 'Daman and Diu', '25'),
(12, 'India', 'Delhi', '07'),
(13, 'India', 'Goa', '30'),
(14, 'India', 'Gujarat', '24'),
(15, 'India', 'Haryana', '06'),
(16, 'India', 'Himachal Pradesh', '02'),
(17, 'India', 'Jammu and Kashmir', '01'),
(18, 'India', 'Jharkhand', '20'),
(19, 'India', 'Karnataka', '29'),
(20, 'India', 'Kerala', '32'),
(21, 'India', 'Lakshadweep Islands', '31'),
(22, 'India', 'Madhya Pradesh', '23'),
(23, 'India', 'Maharashtra', '27'),
(24, 'India', 'Manipur', '14'),
(25, 'India', 'Meghalaya', '17'),
(26, 'India', 'Mizoram', '15'),
(27, 'India', 'Nagaland', '13'),
(28, 'India', 'Odisha', '21'),
(29, 'India', 'Pondicherry', '34'),
(30, 'India', 'Punjab', '03'),
(31, 'India', 'Rajasthan', '08'),
(32, 'India', 'Sikkim', '11'),
(33, 'India', 'Tamil Nadu', '33'),
(34, 'India', 'Telangana', '36'),
(35, 'India', 'Tripura', '16'),
(36, 'India', 'Uttar Pradesh', '09'),
(37, 'India', 'Uttarakhand', '05');

-- --------------------------------------------------------

--
-- Table structure for table `main_stock`
--

CREATE TABLE IF NOT EXISTS `main_stock` (
  `sl` double NOT NULL AUTO_INCREMENT,
  `sec` int(11) NOT NULL,
  `pcd` varchar(20) DEFAULT NULL,
  `bcd` varchar(15) DEFAULT NULL,
  `dt` date NOT NULL DEFAULT '0000-00-00',
  `unit` varchar(300) NOT NULL,
  `usl` varchar(300) NOT NULL,
  `uval` double NOT NULL,
  `opst` double NOT NULL DEFAULT '0',
  `stin` double NOT NULL DEFAULT '0',
  `stout` double NOT NULL DEFAULT '0',
  `nrtn` varchar(300) DEFAULT NULL,
  `expdt` date NOT NULL DEFAULT '0000-00-00',
  `betno` varchar(300) DEFAULT NULL,
  `ret` varchar(50) DEFAULT NULL,
  `pret` varchar(50) DEFAULT NULL,
  `stat` int(11) NOT NULL DEFAULT '0',
  `lef` varchar(50) DEFAULT NULL,
  `dtm` varchar(300) DEFAULT NULL,
  `eby` varchar(300) DEFAULT NULL,
  `clst` double NOT NULL DEFAULT '0',
  `refno` varchar(300) DEFAULT NULL,
  `srtnm` varchar(300) NOT NULL,
  `pbill` varchar(300) DEFAULT NULL,
  `sbill` varchar(300) DEFAULT NULL,
  `rbill` varchar(200) DEFAULT NULL,
  `prbill` varchar(300) DEFAULT NULL,
  `tout` varchar(300) DEFAULT NULL,
  `tin` varchar(200) DEFAULT NULL,
  `rate` double NOT NULL DEFAULT '0' COMMENT 'With GST',
  `stk_rate` double NOT NULL COMMENT 'Without GST',
  `trn_sl` varchar(300) NOT NULL,
  `bd_sl` varchar(300) NOT NULL,
  `lot` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=15 ;

--
-- Dumping data for table `main_stock`
--

INSERT INTO `main_stock` (`sl`, `sec`, `pcd`, `bcd`, `dt`, `unit`, `usl`, `uval`, `opst`, `stin`, `stout`, `nrtn`, `expdt`, `betno`, `ret`, `pret`, `stat`, `lef`, `dtm`, `eby`, `clst`, `refno`, `srtnm`, `pbill`, `sbill`, `rbill`, `prbill`, `tout`, `tin`, `rate`, `stk_rate`, `trn_sl`, `bd_sl`, `lot`) VALUES
(1, 0, '2', '1', '2019-07-10', 'sun', '2', 1, 0, 5.34, 0, 'Purchase', '0000-00-00', '', '47711.86', NULL, 1, NULL, '10-07-2019 17:27:42 pm', 'admin', 0, '19-20/-P000001', '', '19-20/-P000001', NULL, NULL, NULL, NULL, NULL, 56299.994382022, 47711.859550562, '', '', ''),
(2, 0, '1', '1', '2019-07-10', 'sun', '1', 1, 0, 1.51, 0, 'Purchase', '0000-00-00', '', '46694.1', NULL, 1, NULL, '10-07-2019 17:27:42 pm', 'admin', 0, '19-20/-P000001', '', '19-20/-P000001', NULL, NULL, NULL, NULL, NULL, 55099.039735099, 46694.099337748, '', '', ''),
(3, 0, '2', '1', '2019-07-10', 'sun', '2', 1, 0, 0, 1, 'Sale', '0000-00-00', '', '56300', NULL, 1, NULL, '10-07-2019 17:31:30 pm', 'admin', 0, '19-20/-P000001', 'ONS', NULL, 'HM/19-20/00001', NULL, NULL, NULL, NULL, 56300, 47711.8644, '', '', ''),
(4, 0, '2', '1', '2019-07-10', 'sun', '2', 1, 0, 1.52, 0, 'Purchase', '0000-00-00', '', '47711.86', NULL, 1, NULL, '10-07-2019 17:33:39 pm', 'admin', 0, '19-20/-P000002', '', '19-20/-P000002', NULL, NULL, NULL, NULL, NULL, 56299.993421053, 47711.861842105, '', '', ''),
(5, 0, '2', '1', '2019-07-10', 'sun', '2', 1, 0, 0, 1.52, 'Sale', '0000-00-00', '', '56299.993421053', NULL, 1, NULL, '10-07-2019 17:33:39 pm', 'admin', 0, '19-20/-P000002', '', NULL, 'HM/19-20/00002', NULL, NULL, NULL, NULL, 56299.993421053, 47711.861842105, '', '', ''),
(6, 0, '3', '1', '2020-01-31', 'sun', '3', 1, 0, 10, 0, 'Purchase', '0000-00-00', '', '150', NULL, 1, NULL, '31-01-2020 15:26:58 pm', 'onsadmin', 0, '19-20/-P000003', '', '19-20/-P000003', NULL, NULL, NULL, NULL, NULL, 192, 150, '', '', ''),
(7, 0, '2', '1', '2020-01-31', 'sun', '2', 1, 0, 12, 0, 'Purchase', '0000-00-00', '', '47711.86', NULL, 1, NULL, '31-01-2020 15:26:58 pm', 'onsadmin', 0, '19-20/-P000003', '', '19-20/-P000003', NULL, NULL, NULL, NULL, NULL, 56299.995, 47711.86, '', '', ''),
(8, 0, '3', '1', '2020-01-31', 'sun', '3', 1, 0, 0, 1, 'Sale', '0000-00-00', '', '100', NULL, 1, NULL, '31-01-2020 15:33:40 pm', 'onsadmin', 0, '19-20/-P000003', 'ONS', NULL, 'HM/19-20/00003', NULL, NULL, NULL, NULL, 100, 78.125, '', '', ''),
(9, 0, '6', '1', '2021-04-20', 'sun', '6', 1, 0, 100, 0, 'Purchase', '0000-00-00', '', '290', NULL, 1, NULL, '20-04-2021 10:48:25 am', 'onsadmin', 0, '21-22/-P000004', '', '21-22/-P000004', NULL, NULL, NULL, NULL, NULL, 308.56, 275.5, '', '', ''),
(10, 0, '7', '1', '2021-04-20', 'mun', '7', 4.6, 0, 460, 0, 'Purchase', '0000-00-00', '', '50', NULL, 1, NULL, '20-04-2021 10:48:25 am', 'onsadmin', 0, '21-22/-P000004', '', '21-22/-P000004', NULL, NULL, NULL, NULL, NULL, 11.5434782609, 9.78260869565, '', '', ''),
(11, 0, '8', '1', '2021-04-20', 'sun', '8', 1, 0, 10, 0, 'Purchase', '0000-00-00', '', '300', NULL, 1, NULL, '20-04-2021 10:48:25 am', 'onsadmin', 0, '21-22/-P000004', '', '21-22/-P000004', NULL, NULL, NULL, NULL, NULL, 300, 300, '', '', ''),
(12, 0, '6', '1', '2021-04-20', 'sun', '6', 1, 0, 0, 10, 'Sale', '0000-00-00', '', '330', NULL, 1, NULL, '20-04-2021 10:51:42 am', 'onsadmin', 0, '21-22/-P000004', 'ONS', NULL, 'HM/21-22/00001', NULL, NULL, NULL, NULL, 330, 294.64, '', '', ''),
(13, 0, '6', '1', '2021-04-20', 'sun', '6', 1, 0, 0, 5, 'Sale', '0000-00-00', '', '300', NULL, 1, NULL, '20-04-2021 10:53:49 am', 'onsadmin', 0, '21-22/-P000004', 'ONS', NULL, 'HM/21-22/00002', NULL, NULL, NULL, NULL, 300, 267.86, '', '', ''),
(14, 0, '7', '1', '2021-04-20', 'mun', '7', 4.6, 0, 0, 230, 'Sale', '0000-00-00', '', '65', NULL, 1, NULL, '20-04-2021 10:53:49 am', 'onsadmin', 0, '21-22/-P000004', 'ONS', NULL, 'HM/21-22/00002', NULL, NULL, NULL, NULL, 14.1304347826, 11.9739130435, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_suppl`
--

CREATE TABLE IF NOT EXISTS `main_suppl` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `spn` varchar(150) DEFAULT NULL,
  `nm` text,
  `addr` text,
  `srtnm` varchar(300) NOT NULL,
  `mob1` varchar(20) DEFAULT NULL,
  `mob2` varchar(20) DEFAULT NULL,
  `email` text,
  `stat` int(11) NOT NULL DEFAULT '1',
  `edt` date NOT NULL,
  `edtm` text,
  `eby` text,
  `gstin` varchar(300) NOT NULL,
  `pan` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_suppl`
--

INSERT INTO `main_suppl` (`sl`, `spn`, `nm`, `addr`, `srtnm`, `mob1`, `mob2`, `email`, `stat`, `edt`, `edtm`, `eby`, `gstin`, `pan`) VALUES
(1, 'Onnetsolution', 'JAFAR', NULL, 'ONS', '8101236848', '8101236848', 'ikbal.jafar46@gmail.com', 1, '2019-07-10', '10-07-2019 17:18:40', 'admin', '', ''),
(2, 'XYZ', 'JAFAR', NULL, 'ONS', '8101236848', '', '', 1, '2021-04-20', '20-04-2021 10:43:07', 'onsadmin', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_suppl_gst`
--

CREATE TABLE IF NOT EXISTS `main_suppl_gst` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `spn` varchar(150) DEFAULT NULL,
  `st` varchar(300) DEFAULT NULL,
  `addr` text,
  `edt` date NOT NULL,
  `edtm` text,
  `eby` text,
  `gstin` varchar(300) NOT NULL,
  `pan` varchar(300) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- Dumping data for table `main_suppl_gst`
--

INSERT INTO `main_suppl_gst` (`sl`, `spn`, `st`, `addr`, `edt`, `edtm`, `eby`, `gstin`, `pan`) VALUES
(1, '1', '1', 'Krishnagar', '2019-07-10', '10-07-2019 17:18:40', 'admin', '19DWSPS7416H1ZO', 'DWSPS7416H'),
(2, '2', '1', 'KNG', '2021-04-20', '20-04-2021 10:43:07', 'onsadmin', '19njhujsdhkujdfs', 'njhujsdhku');

-- --------------------------------------------------------

--
-- Table structure for table `main_unit`
--

CREATE TABLE IF NOT EXISTS `main_unit` (
  `sl` int(11) NOT NULL AUTO_INCREMENT,
  `sun` varchar(200) NOT NULL,
  `mun` varchar(200) NOT NULL,
  `bun` varchar(200) NOT NULL,
  `smvlu` double NOT NULL,
  `mdvlu` double NOT NULL,
  `bgvlu` double NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`sl`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- Dumping data for table `main_unit`
--

INSERT INTO `main_unit` (`sl`, `sun`, `mun`, `bun`, `smvlu`, `mdvlu`, `bgvlu`, `cat`) VALUES
(1, 'MT', '', '', 1, 0, 0, 1),
(2, 'MT', '', '', 1, 0, 0, 2),
(3, 'PCS', 'BOX', '', 1, 12, 0, 3),
(4, 'kg', 'mt', '', 1, 1000, 0, 4),
(5, '', '', '', 1, 0, 0, 5),
(6, 'PCS', '', '', 1, 0, 0, 6),
(7, 'PCS', 'KG', '', 1, 4.6, 0, 7),
(8, 'BAG', '', '', 1, 0, 0, 8);
