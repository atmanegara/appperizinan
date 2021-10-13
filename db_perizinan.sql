-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.3.9-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6337
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_perizinan
CREATE DATABASE IF NOT EXISTS `db_perizinan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_perizinan`;

-- Dumping structure for table db_perizinan.berita
DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_label` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` longtext NOT NULL DEFAULT '',
  `content` longtext NOT NULL DEFAULT '',
  `slug` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`),
  KEY `FK_ejafung_berita_ejafung_berita_label` (`id_label`),
  KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.berita_acara
DROP TABLE IF EXISTS `berita_acara`;
CREATE TABLE IF NOT EXISTS `berita_acara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon_pengajuan` int(11) NOT NULL DEFAULT 0,
  `no_berita` char(50) DEFAULT NULL,
  `tgl_berita` date DEFAULT NULL,
  `isi_berita` longtext DEFAULT NULL,
  `file_berita` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `no_berita` (`no_berita`),
  KEY `tgl_berita` (`tgl_berita`),
  KEY `id_pemohon_pengajuan` (`id_pemohon_pengajuan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.berita_label
DROP TABLE IF EXISTS `berita_label`;
CREATE TABLE IF NOT EXISTS `berita_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.content
DROP TABLE IF EXISTS `content`;
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('TAB','ACCORDION','FOOTER') NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `type` (`type`),
  KEY `position` (`position`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.daftar_formulir
DROP TABLE IF EXISTS `daftar_formulir`;
CREATE TABLE IF NOT EXISTS `daftar_formulir` (
  `id` int(11) NOT NULL,
  `nm_formulir` varchar(50) DEFAULT NULL,
  `file_formulir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_biaya_sewa
DROP TABLE IF EXISTS `data_biaya_sewa`;
CREATE TABLE IF NOT EXISTS `data_biaya_sewa` (
  `id` int(11) NOT NULL,
  `id_bangunan` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT 0,
  `lama` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `id_bangunan` (`id_bangunan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_hasil_tinjauan
DROP TABLE IF EXISTS `data_hasil_tinjauan`;
CREATE TABLE IF NOT EXISTS `data_hasil_tinjauan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` char(50) DEFAULT NULL,
  `id_pemohon_pengajuan` int(11) DEFAULT NULL,
  `id_tim_teknis` char(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`no_registrasi`),
  KEY `id_pemohon_pengajuan` (`id_pemohon_pengajuan`),
  KEY `id_tim_teknis` (`id_tim_teknis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_izin
DROP TABLE IF EXISTS `data_izin`;
CREATE TABLE IF NOT EXISTS `data_izin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penetapan_nomor` int(11) NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_surat` longtext NOT NULL,
  `file_surat` varchar(50) NOT NULL,
  `id_ref_ttd` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ref_ttd` (`id_ref_ttd`),
  KEY `tgl_surat` (`tgl_surat`),
  KEY `id_penetapan_nomor` (`id_penetapan_nomor`),
  CONSTRAINT `id_ref_ttd` FOREIGN KEY (`id_ref_ttd`) REFERENCES `ref_tanda_tangan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_pemohon
DROP TABLE IF EXISTS `data_pemohon`;
CREATE TABLE IF NOT EXISTS `data_pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipe_pemohon` int(11) DEFAULT NULL,
  `no_ktp` char(50) DEFAULT NULL,
  `no_npwp` char(50) DEFAULT NULL,
  `id_jns_bdn_usaha` int(11) DEFAULT NULL,
  `nm_pemohon` char(50) DEFAULT NULL,
  `nm_pmilik_bu` char(50) DEFAULT NULL COMMENT 'nama pemilik badan usaha',
  `alamat_pemohon` char(50) DEFAULT NULL,
  `id_prov` char(50) DEFAULT NULL,
  `id_kabkot` char(50) DEFAULT NULL,
  `id_desa` char(50) DEFAULT NULL,
  `id_kec` char(50) DEFAULT NULL,
  `email_pemohon` char(50) DEFAULT NULL,
  `telp_pemohon` char(50) DEFAULT NULL,
  `foto_profil` text DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_tipe_pemohon` (`id_tipe_pemohon`),
  KEY `no_ktp` (`no_ktp`),
  KEY `no_npwp` (`no_npwp`),
  KEY `id_desa` (`id_desa`),
  KEY `id_kec` (`id_kec`),
  KEY `id_jns_bdn_usaha` (`id_jns_bdn_usaha`),
  KEY `id_prov` (`id_prov`),
  KEY `id_kabkot` (`id_kabkot`),
  CONSTRAINT `id_jns_bdn_usaha` FOREIGN KEY (`id_jns_bdn_usaha`) REFERENCES `ref_jenis_bdn_usaha` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_perusahaan
DROP TABLE IF EXISTS `data_perusahaan`;
CREATE TABLE IF NOT EXISTS `data_perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon` int(11) NOT NULL,
  `id_ref_jenis_bdn_usaha` int(11) NOT NULL,
  `no_npwp` char(50) DEFAULT NULL,
  `nm_perusahaan` varchar(50) DEFAULT NULL,
  `nm_gedung` varchar(50) DEFAULT NULL,
  `lantai` char(10) DEFAULT NULL,
  `alamat` varchar(160) DEFAULT NULL,
  `rt` char(5) DEFAULT NULL,
  `rw` char(5) DEFAULT NULL,
  `id_prov` char(50) DEFAULT NULL,
  `id_kab` char(50) DEFAULT NULL,
  `id_kec` char(50) DEFAULT NULL,
  `kodepos` char(10) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `long` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_pemohon`,`id_ref_jenis_bdn_usaha`),
  KEY `id_prov` (`id_prov`),
  KEY `id_kab` (`id_kab`),
  KEY `id_kec` (`id_kec`),
  KEY `id_pemohon` (`id_pemohon`),
  KEY `id_ref_jenis_bdn_usaha` (`id_ref_jenis_bdn_usaha`),
  CONSTRAINT `id_pemohon` FOREIGN KEY (`id_pemohon`) REFERENCES `data_pemohon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `id_ref_jenis_bdn_usaha` FOREIGN KEY (`id_ref_jenis_bdn_usaha`) REFERENCES `ref_jenis_bdn_usaha` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_petugas_loket
DROP TABLE IF EXISTS `data_petugas_loket`;
CREATE TABLE IF NOT EXISTS `data_petugas_loket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_id` char(50) DEFAULT NULL,
  `nama_petugas` char(50) DEFAULT NULL,
  `alamat` char(50) DEFAULT NULL,
  `jkel` char(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_pribadi
DROP TABLE IF EXISTS `data_pribadi`;
CREATE TABLE IF NOT EXISTS `data_pribadi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tmp_lahir` char(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jkel` set('Laki - Laki','Perempuan') DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `rt` char(50) DEFAULT NULL,
  `rw` char(50) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  `id_kab` int(11) DEFAULT NULL,
  `id_kec` int(11) DEFAULT NULL,
  `id_kel` int(11) DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `telp` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nik` (`nik`),
  KEY `id_agama` (`id_agama`),
  KEY `id_prov` (`id_prov`),
  KEY `id_kab` (`id_kab`),
  KEY `id_kec` (`id_kec`),
  KEY `id_kel` (`id_kel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_skpd
DROP TABLE IF EXISTS `data_skpd`;
CREATE TABLE IF NOT EXISTS `data_skpd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_skpd` int(11) DEFAULT NULL,
  `alamat_skpd` int(11) DEFAULT NULL,
  `telp_skpd` int(11) DEFAULT NULL,
  `status_skpd` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.data_tarif_reklame
DROP TABLE IF EXISTS `data_tarif_reklame`;
CREATE TABLE IF NOT EXISTS `data_tarif_reklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_reklame` int(11) DEFAULT NULL,
  `alat_media` text DEFAULT NULL COMMENT 'isinya jenis_reklame + alat/media reklame',
  `waktu` char(50) DEFAULT NULL,
  `tarif` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ref_reklame` (`id_ref_reklame`),
  CONSTRAINT `id_ref_reklame` FOREIGN KEY (`id_ref_reklame`) REFERENCES `ref_jenis_reklame` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Data Reklame dan tarifnya';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.detail_jenis_izin
DROP TABLE IF EXISTS `detail_jenis_izin`;
CREATE TABLE IF NOT EXISTS `detail_jenis_izin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_izin` int(11) DEFAULT NULL,
  `id_jenis_permohonan` int(11) DEFAULT NULL,
  `no_urut` int(11) DEFAULT NULL,
  `nm_dok` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_izin` (`id_jenis_izin`),
  KEY `id_jenis_permohonan` (`id_jenis_permohonan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COMMENT='Detail Ref. Jenis Izin berupa syarat kelengkapan dokumen berdasarkan jenis permohonan';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.detail_tim_teknis
DROP TABLE IF EXISTS `detail_tim_teknis`;
CREATE TABLE IF NOT EXISTS `detail_tim_teknis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tim_teknis` int(11) DEFAULT NULL,
  `nip` char(50) DEFAULT NULL,
  `nama` varchar(160) DEFAULT NULL,
  `jabatan` varchar(160) DEFAULT NULL,
  `ket` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tim_teknis` (`id_tim_teknis`),
  CONSTRAINT `id_tim_teknis` FOREIGN KEY (`id_tim_teknis`) REFERENCES `ref_tim_teknis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.faq
DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text DEFAULT NULL,
  `jawab` longtext DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.file
DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_file_jenis` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_post` (`id_post`),
  KEY `FK_ejafung_file_ejafung_file_jenis` (`id_file_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.file_hasil_tinjauan
DROP TABLE IF EXISTS `file_hasil_tinjauan`;
CREATE TABLE IF NOT EXISTS `file_hasil_tinjauan` (
  `id` int(11) NOT NULL,
  `tahun` int(11) DEFAULT NULL,
  `no_registrasi` char(50) DEFAULT NULL,
  `tgl_upload` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_tinjauan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.file_jenis
DROP TABLE IF EXISTS `file_jenis`;
CREATE TABLE IF NOT EXISTS `file_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.izin_ho
DROP TABLE IF EXISTS `izin_ho`;
CREATE TABLE IF NOT EXISTS `izin_ho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_data_pemohon` int(11) DEFAULT NULL,
  `no_registrasi` char(50) DEFAULT NULL,
  `jns_tl` int(11) DEFAULT NULL COMMENT 'Jenis Tarif Lingkungan',
  `kawasan` int(11) DEFAULT NULL,
  `luas_tinggi` int(11) DEFAULT NULL,
  `jns_jalan` int(11) DEFAULT NULL COMMENT 'Jenis Jalan (Index Lokasi)',
  `id_ref_nilai_skala` int(11) DEFAULT NULL,
  `nilai_investasi` float DEFAULT NULL,
  `tarif_retribusi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_data_pemohon` (`id_data_pemohon`),
  KEY `id_jns_tl` (`jns_tl`),
  KEY `id_ref_nilai_skala` (`id_ref_nilai_skala`),
  CONSTRAINT `id_data_pemohon` FOREIGN KEY (`id_data_pemohon`) REFERENCES `data_pemohon` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id_jns_tl` FOREIGN KEY (`jns_tl`) REFERENCES `ref_jns_tl` (`id`) ON DELETE CASCADE,
  CONSTRAINT `id_ref_nilai_skala` FOREIGN KEY (`id_ref_nilai_skala`) REFERENCES `ref_nilai_skala` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='izin undang-undang gangguan (HO)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.jadwal_peninjauan
DROP TABLE IF EXISTS `jadwal_peninjauan`;
CREATE TABLE IF NOT EXISTS `jadwal_peninjauan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon_pengajuan` int(11) DEFAULT NULL,
  `id_tim_teknis` int(11) DEFAULT NULL,
  `tgl_peninjauan` date DEFAULT NULL,
  `ket` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pemohon_pengajuan` (`id_pemohon_pengajuan`),
  KEY `id_tim_teknis` (`id_tim_teknis`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='data jadwal peninjauan lapangan oleh tim teknis';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.jadwal_petugas_loket
DROP TABLE IF EXISTS `jadwal_petugas_loket`;
CREATE TABLE IF NOT EXISTS `jadwal_petugas_loket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_data_petugas_loket` int(11) DEFAULT NULL,
  `id_ref_loket` int(11) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `jam_pagi` char(50) DEFAULT NULL,
  `jam_siang` char(50) DEFAULT NULL,
  `jam_sore` char(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `id_data_petugas_loket` (`id_data_petugas_loket`),
  KEY `id_ref_loket` (`id_ref_loket`),
  CONSTRAINT `id_data_petugas_loket` FOREIGN KEY (`id_data_petugas_loket`) REFERENCES `data_petugas_loket` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `id_ref_loket` FOREIGN KEY (`id_ref_loket`) REFERENCES `ref_loket` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.konfir_byr_sewa
DROP TABLE IF EXISTS `konfir_byr_sewa`;
CREATE TABLE IF NOT EXISTS `konfir_byr_sewa` (
  `id` int(11) NOT NULL,
  `no_reg_sewa` char(50) DEFAULT NULL,
  `file_bukti` char(50) DEFAULT NULL,
  `tgl_konfir` date DEFAULT NULL,
  `tgl_dikonfir` date DEFAULT NULL,
  `status_konfir` int(2) DEFAULT 0 COMMENT '0:belum bayar,1:minta konfirmasi,2:dikonfirmasi,3:tolak',
  PRIMARY KEY (`id`),
  KEY `no_reg_sewa` (`no_reg_sewa`),
  KEY `tgl_konfir` (`tgl_konfir`),
  KEY `tgl_dikonfir` (`tgl_dikonfir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.legalitas_perusahaan
DROP TABLE IF EXISTS `legalitas_perusahaan`;
CREATE TABLE IF NOT EXISTS `legalitas_perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_data_perusahaan` int(11) DEFAULT NULL,
  `no_akta` char(50) DEFAULT NULL,
  `tgl_berdiri` date DEFAULT NULL,
  `nm_notaris` char(50) DEFAULT NULL,
  `no_sk_pengesahan` char(50) DEFAULT NULL,
  `tgl_pengesahan` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_data_perusahaan` (`id_data_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.log_petugas_loket
DROP TABLE IF EXISTS `log_petugas_loket`;
CREATE TABLE IF NOT EXISTS `log_petugas_loket` (
  `id` int(11) NOT NULL,
  `id_data_petugas_loket` int(11) DEFAULT NULL,
  `tgljam_masuk` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.menu_header
DROP TABLE IF EXISTS `menu_header`;
CREATE TABLE IF NOT EXISTS `menu_header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL DEFAULT 0,
  `nama_menu` varchar(90) DEFAULT NULL,
  `icon` varchar(50) DEFAULT 'fa fa-th-large',
  `url` varchar(90) DEFAULT '#',
  `group_menu` char(1) DEFAULT 'H',
  `sub_menu` enum('Y','N') DEFAULT 'N',
  `group_user` char(160) DEFAULT 'SA',
  `status_menu` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `urutan` (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.pembayaran
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` char(50) NOT NULL DEFAULT '0',
  `status_bayar` int(2) NOT NULL DEFAULT 12 COMMENT '0:menuggu,1:lunas,2:batal',
  `via_bayar` int(1) NOT NULL COMMENT '0:Langsung ditempat,1:ATM trasfer',
  `no_rek_pemohon` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Pembayaran Retribusi HO / Reklame';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.pemohon_pengajuan
DROP TABLE IF EXISTS `pemohon_pengajuan`;
CREATE TABLE IF NOT EXISTS `pemohon_pengajuan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL DEFAULT 0,
  `no_registrasi` char(50) NOT NULL,
  `id_user` int(11),
  `id_data_pemohon` int(11),
  `id_data_perusahaan` int(11),
  `id_jenis_izin` int(11),
  `id_jenis_permohonan` int(11),
  `id_jenis_bdn_usaha` int(11),
  `lokasi_izin` longtext DEFAULT NULL,
  `status_pengajuan` int(1) DEFAULT 0 COMMENT 'pengajuan ke loket ,0:proses,1:selesai,2:tolak',
  `status_verifikasi` int(1) DEFAULT 0 COMMENT 'verifikasi dr kasi, 0:proses,1 selesai,2:tolak',
  `status_selesai` int(1) DEFAULT 0 COMMENT 'verifikasi SK , selesai : 0:proses,1 selesai,2:tolak ',
  `tgl_pengajuan` datetime DEFAULT NULL COMMENT 'tanggal pegajuan / upload berkas',
  `tgl_verifikasi_pengajuan` datetime DEFAULT NULL COMMENT 'tanggal verifikasi pengajuan berkas Onllie oleh loket ',
  `tgl_verifikasi` datetime DEFAULT NULL COMMENT 'tanggal verifikasi kasi',
  `tgl_selesai` datetime DEFAULT NULL COMMENT 'tanggal selesai keluar SK',
  `id_status_daftar` int(1) DEFAULT 1 COMMENT '1:online,2:offline',
  `status_kunci` enum('Y','N') DEFAULT NULL,
  `catatan_verifikasi_pengajuan` text DEFAULT NULL,
  `catatan_verifikasi` text DEFAULT NULL,
  `catatan_selesai` text DEFAULT NULL,
  PRIMARY KEY (`id`,`no_registrasi`),
  KEY `id_user` (`id_user`),
  KEY `id_data_pemohon` (`id_data_pemohon`),
  KEY `id_jenis_izin` (`id_jenis_izin`),
  KEY `id_jenis_permohonan` (`id_jenis_permohonan`),
  KEY `no_registrasi` (`no_registrasi`),
  KEY `tgl_pengajuan` (`tgl_pengajuan`),
  KEY `tgl_verifikasi` (`tgl_verifikasi`),
  KEY `tgl_selesai` (`tgl_selesai`),
  KEY `id_jenis_bdn_usaha` (`id_jenis_bdn_usaha`),
  KEY `id_data_perusahaan` (`id_data_perusahaan`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.pemohon_sewa
DROP TABLE IF EXISTS `pemohon_sewa`;
CREATE TABLE IF NOT EXISTS `pemohon_sewa` (
  `id` int(11) NOT NULL,
  `no_reg_sewa` char(50) NOT NULL,
  `id_data_pemohon` int(11) DEFAULT NULL,
  `id_bangunan` int(11) DEFAULT NULL,
  `biaya_sewa` int(11) DEFAULT NULL,
  `hari` char(50) DEFAULT NULL,
  `tgl_sewa` date DEFAULT NULL,
  `jam_awal` time DEFAULT NULL,
  `jam_akhir` time DEFAULT NULL,
  `kegunaan` longtext DEFAULT NULL,
  `nm_pnggung_jwb` char(50) DEFAULT NULL,
  `telp` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_data_pemohon` (`id_data_pemohon`),
  KEY `id_bangunan` (`id_bangunan`),
  KEY `tgl_sewa` (`tgl_sewa`),
  KEY `jam_awal` (`jam_awal`),
  KEY `jam_akhir` (`jam_akhir`),
  KEY `no_reg_sewa` (`no_reg_sewa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.pemohon_upload_file
DROP TABLE IF EXISTS `pemohon_upload_file`;
CREATE TABLE IF NOT EXISTS `pemohon_upload_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) DEFAULT NULL,
  `no_registrasi` char(50) DEFAULT NULL,
  `id_jenis_izin` int(11) DEFAULT NULL,
  `id_jenis_permohonan` int(11) DEFAULT NULL,
  `id_detail_jenis_izin` int(11) DEFAULT NULL,
  `data_file_upload` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status_berkas` int(1) DEFAULT 0 COMMENT '0:file proses,1:file OK,2:file Failed',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `no_registrasi` (`no_registrasi`),
  KEY `tahun` (`tahun`),
  KEY `id_jenis_izin` (`id_jenis_izin`),
  KEY `id_jenis_permohonan` (`id_jenis_permohonan`),
  KEY `id_detail_jenis_izin` (`id_detail_jenis_izin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.penetapan_nomor
DROP TABLE IF EXISTS `penetapan_nomor`;
CREATE TABLE IF NOT EXISTS `penetapan_nomor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` int(11) NOT NULL DEFAULT 0,
  `id_pemohon_pengajuan` int(11) DEFAULT NULL,
  `no_sk` char(50) DEFAULT NULL,
  `tgl_sk` date DEFAULT NULL,
  `tgl_tempo_sk` date DEFAULT NULL,
  `id_tanda_tangan` int(11) DEFAULT NULL,
  `status_perizinan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pemohon_pengajuan` (`id_pemohon_pengajuan`),
  KEY `no_sk` (`no_sk`),
  KEY `tgl_sk` (`tgl_sk`),
  KEY `tgl_tempo_sk` (`tgl_tempo_sk`),
  KEY `status_perizinan` (`status_perizinan`),
  KEY `id_tanda_tangan` (`id_tanda_tangan`),
  CONSTRAINT `id_tanda_tangan` FOREIGN KEY (`id_tanda_tangan`) REFERENCES `ref_tanda_tangan` (`id`),
  CONSTRAINT `pemohon_pengajuan` FOREIGN KEY (`id_pemohon_pengajuan`) REFERENCES `pemohon_pengajuan` (`id`),
  CONSTRAINT `status_perizinan` FOREIGN KEY (`status_perizinan`) REFERENCES `ref_status_perizinan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.persetujuan_permohonan
DROP TABLE IF EXISTS `persetujuan_permohonan`;
CREATE TABLE IF NOT EXISTS `persetujuan_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_registrasi` char(50) DEFAULT NULL,
  `pilih` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `no_registrasi` (`no_registrasi`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COMMENT='disclimer dari pernyataan bahwa file yang di upload benar ASli dr scan dokumen sebenernya';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_bangunan
DROP TABLE IF EXISTS `ref_bangunan`;
CREATE TABLE IF NOT EXISTS `ref_bangunan` (
  `id` int(11) NOT NULL,
  `nm_bangunan` char(50) DEFAULT NULL,
  `hak_milik` char(50) DEFAULT NULL,
  `lokasi_bangunan` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_desa
DROP TABLE IF EXISTS `ref_desa`;
CREATE TABLE IF NOT EXISTS `ref_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kec` int(11) DEFAULT NULL,
  `nm_desa` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kec` (`id_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Nama Desa';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_group_user
DROP TABLE IF EXISTS `ref_group_user`;
CREATE TABLE IF NOT EXISTS `ref_group_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(10) NOT NULL,
  `uraian` varchar(50) DEFAULT NULL,
  `url` char(160) DEFAULT NULL,
  `layout_menu` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_indeks_lok
DROP TABLE IF EXISTS `ref_indeks_lok`;
CREATE TABLE IF NOT EXISTS `ref_indeks_lok` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jns_index` char(50) DEFAULT NULL,
  `nilai_index` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Indeks Lokasi (HO)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_jenis_bdn_usaha
DROP TABLE IF EXISTS `ref_jenis_bdn_usaha`;
CREATE TABLE IF NOT EXISTS `ref_jenis_bdn_usaha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jns_bdn_usaha` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_jenis_izin
DROP TABLE IF EXISTS `ref_jenis_izin`;
CREATE TABLE IF NOT EXISTS `ref_jenis_izin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jenis_izin` char(50) NOT NULL,
  `nm_jenis_izin` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_jenis_izin` (`kd_jenis_izin`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_jenis_permohonan
DROP TABLE IF EXISTS `ref_jenis_permohonan`;
CREATE TABLE IF NOT EXISTS `ref_jenis_permohonan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jenis_permohonan` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_jenis_reklame
DROP TABLE IF EXISTS `ref_jenis_reklame`;
CREATE TABLE IF NOT EXISTS `ref_jenis_reklame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_reklame` char(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Jenis Reklame';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_jns_tl
DROP TABLE IF EXISTS `ref_jns_tl`;
CREATE TABLE IF NOT EXISTS `ref_jns_tl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jns_tl` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_kategori
DROP TABLE IF EXISTS `ref_kategori`;
CREATE TABLE IF NOT EXISTS `ref_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Kategori Usaha (HO)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_kec
DROP TABLE IF EXISTS `ref_kec`;
CREATE TABLE IF NOT EXISTS `ref_kec` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kec` char(50) DEFAULT NULL,
  KEY `id` (`id`),
  CONSTRAINT `ref_kec_ibfk_1` FOREIGN KEY (`id`) REFERENCES `ref_desa` (`id_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='kecamatan';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_loket
DROP TABLE IF EXISTS `ref_loket`;
CREATE TABLE IF NOT EXISTS `ref_loket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_loket` char(160) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_lok_jns_tl
DROP TABLE IF EXISTS `ref_lok_jns_tl`;
CREATE TABLE IF NOT EXISTS `ref_lok_jns_tl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_jns_lok_tl` char(50) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='Ref. Jenis Tarif Lingkungan (HO)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_media_alat
DROP TABLE IF EXISTS `ref_media_alat`;
CREATE TABLE IF NOT EXISTS `ref_media_alat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_alat` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `aktf` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='media atau alat yang digunakan pada reklame (table ref_reklame)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_nilai_skala
DROP TABLE IF EXISTS `ref_nilai_skala`;
CREATE TABLE IF NOT EXISTS `ref_nilai_skala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kd_gol` int(11) DEFAULT NULL,
  `id_ref_kategori` int(11) DEFAULT NULL,
  `skala_1` float DEFAULT NULL,
  `skala_2` float DEFAULT NULL,
  `ket` varchar(160) DEFAULT NULL,
  `tarif` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kd_gol` (`kd_gol`),
  KEY `id_kategori` (`id_ref_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='NIlai Skala (HO)';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_status_daftar
DROP TABLE IF EXISTS `ref_status_daftar`;
CREATE TABLE IF NOT EXISTS `ref_status_daftar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_daftar` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='pemohon mengajukan menggunakan media ONLINE / Offline';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_status_perizinan
DROP TABLE IF EXISTS `ref_status_perizinan`;
CREATE TABLE IF NOT EXISTS `ref_status_perizinan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_perizinan` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_tanda_tangan
DROP TABLE IF EXISTS `ref_tanda_tangan`;
CREATE TABLE IF NOT EXISTS `ref_tanda_tangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(50) DEFAULT NULL,
  `nm_pejabat` char(50) DEFAULT NULL,
  `jabatan` char(50) DEFAULT NULL,
  `status_ttd` enum('Y','N') DEFAULT NULL COMMENT 'Y:aktif;N:non Aktif',
  PRIMARY KEY (`id`),
  KEY `nip` (`nip`),
  KEY `status_ttd` (`status_ttd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_tim_teknis
DROP TABLE IF EXISTS `ref_tim_teknis`;
CREATE TABLE IF NOT EXISTS `ref_tim_teknis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nm_teknisi` char(50) DEFAULT NULL,
  `tgl_terbentuk` date DEFAULT NULL,
  `status_tim` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_tipe_pemohon
DROP TABLE IF EXISTS `ref_tipe_pemohon`;
CREATE TABLE IF NOT EXISTS `ref_tipe_pemohon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kdjenis` char(50) DEFAULT NULL,
  `nmjenis` char(50) DEFAULT NULL,
  `aktif` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `kdjenis` (`kdjenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.ref_ttd
DROP TABLE IF EXISTS `ref_ttd`;
CREATE TABLE IF NOT EXISTS `ref_ttd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rpt` char(50) NOT NULL DEFAULT '',
  `nip_ttd` char(50) DEFAULT NULL,
  `nm_ttd` char(50) DEFAULT NULL,
  `jbt_ttd` char(50) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for procedure db_perizinan.sp_cetak_bukti_pendaftaran
DROP PROCEDURE IF EXISTS `sp_cetak_bukti_pendaftaran`;
DELIMITER //
CREATE PROCEDURE `sp_cetak_bukti_pendaftaran`(
	IN `no_registrasi` CHAR(50)


)
BEGIN
SELECT a.no_registrasi,a.id_data_pemohon,b.nm_pemohon,c.nm_perusahaan,b.alamat_pemohon,  
b.telp_pemohon,c.telp AS kontak_person,a.id_jenis_permohonan,d.nm_jenis_permohonan,
a.id_jenis_izin,e.nm_jenis_izin,a.lokasi_izin,date(a.tgl_pengajuan) tgl_pengajuan,date(a.tgl_verifikasi_pengajuan) tgl_verifikasi_pengajuan ,a.id_status_daftar,
f.status_daftar
FROM pemohon_pengajuan a
INNER JOIN data_pemohon b ON b.id=a.id_data_pemohon
LEFT JOIN data_perusahaan c ON c.id=a.id_data_perusahaan
LEFT JOIN ref_jenis_permohonan d ON a.id_jenis_permohonan=d.id
LEFT JOIN ref_jenis_izin e ON a.id_jenis_izin=e.id
left join ref_status_daftar f on a.id_status_daftar=f.id
where a.no_registrasi=no_registrasi;
END//
DELIMITER ;

-- Dumping structure for procedure db_perizinan.sp_lap_rekap_bulanan
DROP PROCEDURE IF EXISTS `sp_lap_rekap_bulanan`;
DELIMITER //
CREATE PROCEDURE `sp_lap_rekap_bulanan`(
	IN `bulan` INT
,
	IN `tahun` INT

)
BEGIN
SELECT a.nm_jenis_izin, (SELECT COUNT( aa.id) FROM ref_jenis_izin aa
LEFT JOIN pemohon_pengajuan bb ON aa.id=bb.id_jenis_izin
 WHERE MONTH(bb.tgl_pengajuan)=bulan AND YEAR(bb.tgl_pengajuan)=tahun AND aa.id=a.id
 GROUP BY aa.id)  AS jml_pengajuan
 FROM ref_jenis_izin a
LEFT JOIN pemohon_pengajuan b ON a.id=b.id_jenis_izin
 GROUP BY a.id ;
END//
DELIMITER ;

-- Dumping structure for procedure db_perizinan.sp_lap_rekap_tahunan
DROP PROCEDURE IF EXISTS `sp_lap_rekap_tahunan`;
DELIMITER //
CREATE PROCEDURE `sp_lap_rekap_tahunan`(
	IN `tahun` INT
)
    READS SQL DATA
    DETERMINISTIC
    SQL SECURITY INVOKER
BEGIN
SELECT a.nm_jenis_izin, (SELECT COUNT( aa.id) FROM ref_jenis_izin aa
LEFT JOIN pemohon_pengajuan bb ON aa.id=bb.id_jenis_izin
 WHERE YEAR(bb.tgl_pengajuan)=tahun AND aa.id=a.id
 GROUP BY aa.id)  AS jml_pengajuan
 FROM ref_jenis_izin a
LEFT JOIN pemohon_pengajuan b ON a.id=b.id_jenis_izin
 GROUP BY a.id ;
END//
DELIMITER ;

-- Dumping structure for table db_perizinan.sub_menu
DROP TABLE IF EXISTS `sub_menu`;
CREATE TABLE IF NOT EXISTS `sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu_header` int(11) NOT NULL DEFAULT 0,
  `nomor_urut` int(11) NOT NULL DEFAULT 0,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL DEFAULT 'fa fa-gem',
  `url` varchar(50) NOT NULL DEFAULT '#',
  `group_user` varchar(50) NOT NULL DEFAULT 'G,SA',
  `group_menu` varchar(1) NOT NULL DEFAULT 'D',
  `level_menu` varchar(50) NOT NULL DEFAULT '1',
  `status_menu` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `id_menu_header` (`id_menu_header`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.tarif_jns_tl
DROP TABLE IF EXISTS `tarif_jns_tl`;
CREATE TABLE IF NOT EXISTS `tarif_jns_tl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ref_jns_tl` int(11) DEFAULT NULL,
  `id_lok_jns_tl` int(11) DEFAULT NULL,
  `awal_luas_t` float DEFAULT NULL,
  `akhir_luas_t` float DEFAULT NULL,
  `tarif` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Tarif Jenis Tarif Lingkungan';

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'id_pemohon',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `kode_group_user` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_tipe_pemohon` int(11) DEFAULT NULL,
  `id_ref_jenis_izin` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`),
  KEY `kode_group_user` (`kode_group_user`),
  KEY `nip` (`nip`),
  KEY `id_tipe_pemohon` (`id_tipe_pemohon`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_perizinan.verifikasi_bap_tim
DROP TABLE IF EXISTS `verifikasi_bap_tim`;
CREATE TABLE IF NOT EXISTS `verifikasi_bap_tim` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemohon_pengajuan` int(11) DEFAULT NULL,
  `id_berita_acara` int(11) DEFAULT NULL,
  `status_verifikasi` int(1) DEFAULT NULL COMMENT '1:setuju,2:batal',
  `catatan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_berita_acara` (`id_berita_acara`),
  KEY `id_pemohon_pengajuan` (`id_pemohon_pengajuan`),
  CONSTRAINT `id_berita_acara` FOREIGN KEY (`id_berita_acara`) REFERENCES `berita_acara` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
