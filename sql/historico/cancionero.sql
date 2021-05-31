-- MySQL dump 10.13  Distrib 5.5.62, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cancionero
-- ------------------------------------------------------
-- Server version	5.5.62-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `canciones`
--

DROP TABLE IF EXISTS `canciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canciones` (
  `idcancion` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `letra` text,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idcancion`),
  KEY `FK_canciones_idcategoria` (`idcategoria`),
  CONSTRAINT `FK_canciones_idcategoria` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=655;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canciones`
--

LOCK TABLES `canciones` WRITE;
/*!40000 ALTER TABLE `canciones` DISABLE KEYS */;
INSERT INTO `canciones` VALUES (1,17,343,NULL,'Santa Rosita de Lima',NULL,'paz_amor_y_bendicion.php'),(2,2,37,NULL,'Perdon de los apostoles',NULL,'perdon_de_los_apostoles.php'),(3,3,47,NULL,'Gloria, gloria aleluya',NULL,'gloria_gloria_aleluya.php'),(4,5,86,NULL,'Canto aleluya',NULL,'canto_aleluya.php'),(5,6,104,NULL,'Blanco Pan',NULL,'te_ofrezco_el_blanco_pan.php'),(6,7,119,NULL,'Santo colombiano',NULL,'santo_de_las_alabanzas.php'),(7,8,132,NULL,'Padre nuestro del silencio',NULL,'padre_nuestro_del_silencio.php'),(8,10,163,NULL,'Cordero Exo',NULL,'cordero.php'),(9,11,173,NULL,'Como no creer en Dios',NULL,'como_no_creer_en_dios.php'),(10,11,180,NULL,'Hablame',NULL,'hablame.php'),(11,17,344,NULL,'Santa Rosa de Lima',NULL,'tu_presencia_en_mi_vida.php'),(12,17,323,NULL,'Amor eterno',NULL,'amor_eterno.php'),(13,5,81,NULL,'Busca primero',NULL,'busca_primero.php'),(14,5,76,NULL,'Como te pagare',NULL,'como_te_pagare.php'),(15,2,42,NULL,'Zamba del perdon',NULL,'zamba_del_perdon.php'),(16,3,52,NULL,'Gloria Gabarain',NULL,'gloria_gabarain.php'),(17,5,91,NULL,'Aleluya, por esa gente',NULL,'aleluya_por_esa_gente.php'),(18,6,106,NULL,'Tomad Senor',NULL,'tomad_senor.php'),(19,10,157,NULL,'Cordero de Dios huayno',NULL,'corder_de_dios_huayno.php'),(20,11,345,NULL,'Milagro de amor',NULL,'milagro_de_amor.php'),(22,1,7,NULL,'Tomado de la mano',NULL,'tomado_de_la_mano.php'),(23,2,40,NULL,'Perdon Jesus',NULL,'perdon_jesus.php'),(24,3,48,NULL,'Gloria andino',NULL,'gloria_andino.php'),(25,5,83,NULL,'Pueblo de Dios (Saya)',NULL,'pueblo_de_dios.php'),(26,6,111,NULL,'Arrancarte las espinas',NULL,'arrancarte_las_espinas.php'),(27,7,122,NULL,'Santo Zaireno',NULL,'santo_zaireno.php'),(28,10,347,NULL,'Cordero dialogado',NULL,'cordero_dialogado.php'),(29,14,233,NULL,'Santa Maria del camino',NULL,'santa_maria_del_camino.php'),(30,1,1,NULL,'A Dios creador',NULL,'a_dios_creador.php'),(31,11,348,NULL,'Adorador',NULL,'adorador.php'),(32,9,147,NULL,'La paz sea con nosotros',NULL,'cancion_por_la_paz.php'),(33,2,35,NULL,'Como el hijo prodigo',NULL,'como_el_hijo_prodigo.php'),(36,11,191,NULL,'Danos un corazon',NULL,'danos_un_corazon.php'),(37,13,226,NULL,'Demos gracias al Senor',NULL,'demos_gracias_al_senor.php'),(38,4,63,NULL,'El Senor es mi fuerza',NULL,'el_senor_es_mi_fuerza.php'),(39,6,99,NULL,'El Senor nos ha reunido',NULL,'el_senor_nos_ha_reunido.php'),(40,3,49,NULL,'El Gloria Giombini',NULL,'gloria_giombini.php'),(41,11,350,NULL,'Haciendote pan',NULL,'haciendote_pan.php'),(42,11,190,NULL,'Jesus estoy aqui',NULL,'jesus_estoy_aqui.php'),(43,1,10,NULL,'Juntos como hermanos',NULL,'juntos_como_hermanos.php'),(44,9,138,NULL,'Mensajeros de la paz',NULL,'mensajero_de_la_paz.php'),(45,4,67,NULL,'Mi pensamiento eres tu',NULL,'mi_pensamiento_eres_tu.php'),(46,11,186,NULL,'Nadie te ama como yo',NULL,'nadie_te_ama_como_yo.php'),(48,11,187,NULL,'Pescador de hombres',NULL,'pescador_de_hombre.php'),(49,6,96,NULL,'Por los ninos',NULL,'por_los_ninos.php'),(50,12,207,NULL,'Renuevame',NULL,'renuevame.php'),(51,5,84,NULL,'Aleluya (Salmo 100)',NULL,'salmo100.php'),(52,14,238,NULL,'Salve, salve',NULL,'salve_salve.php'),(53,7,124,NULL,'Santo palestra',NULL,'santo_palestra.php'),(54,6,112,NULL,'Te ofrecemos Senor',NULL,'te_ofrecemos_senor.php'),(55,2,36,NULL,'Ten piedad, Senor',NULL,'ten_piedad_senor.php'),(56,11,351,NULL,'Yo soy el camino',NULL,'yo_soy_el_camino.php'),(57,1,14,NULL,'Iglesia joven',NULL,'iglesia_joven.php'),(59,11,249,NULL,'Dame un nuevo corazon',NULL,'dame_un_nuevo_corazon.php'),(60,3,53,NULL,'Gloria del universo',NULL,'gloria_del_universo.php'),(61,5,79,NULL,'Aleluya - Hallelujah',NULL,'aleluya_hallelujah.php'),(62,7,127,NULL,'Santo de los querubines',NULL,'santo_de_los_querubines.php'),(63,11,181,NULL,'Ven Jesus',NULL,'ven_jesus.php'),(64,11,200,NULL,'Angeles de Dios',NULL,'angeles_de_dios.php'),(65,2,43,NULL,'Hoy perdoname',NULL,'hoy_perdoname.php'),(66,3,56,NULL,'Gloria misa andina',NULL,'gloria_misa_andina.php'),(67,6,108,NULL,'Negra es la uva',NULL,'negra_es_la_uva.php'),(68,7,352,NULL,'Santo Takillakkta',NULL,'santo_takillakkta.php'),(69,8,134,NULL,'Padre nuestro misionero',NULL,'padre_nuestro_misionero.php'),(70,9,144,NULL,'Escucha padre a tu pueblo',NULL,'escucha_padre_a_tu_pueblo.php'),(71,12,212,NULL,'Yo creo en las promesas',NULL,'yo_creo_en_las_promesas.php'),(72,11,166,NULL,'El Senor nos da su amor',NULL,'el_senor_nos_da_su_amor.php'),(73,13,219,NULL,'Alma misionera',NULL,'alma_misionera.php'),(74,17,283,NULL,'Danza a mi pais',NULL,'danza_a_mi_pais.php'),(75,1,27,NULL,'Canta trovador',NULL,'canta_trovador.php'),(76,9,151,NULL,'Hay una paloma blanca',NULL,'hay_una_paloma_blanca.php'),(77,11,183,NULL,'Con nosotros esta',NULL,'con_nosotros_esta.php'),(78,13,224,NULL,'Mi Dios esta vivo',NULL,'mi_dios_esta_vivo.php'),(79,11,178,NULL,'Mi amigo Jesus',NULL,'mi_amigo_jesus.php'),(80,11,184,NULL,'Dios esta aqui (Corintios 13)',NULL,'dios_esta_aqui_corintios_13.php'),(81,11,353,NULL,'Tal como soy',NULL,'tal_como_soy.php'),(82,13,354,NULL,'Granito de mostaza',NULL,'granito_de_mostaza.php'),(83,1,12,NULL,'Juntos cantando la alegria',NULL,'juntos_cantando_la_alegria.php'),(84,1,13,NULL,'Un pueblo que camina',NULL,'un_pueblo_que_camina.php'),(85,6,116,NULL,'Recibeme',NULL,'recibeme.php'),(86,7,128,NULL,'Santo giombini',NULL,'santo_giombini.php'),(87,11,168,NULL,'Cristo mio',NULL,'cristo_mio.php'),(88,11,355,NULL,'En mi Getsemani',NULL,'en_mi_getsemani.php'),(89,12,356,NULL,'Toma Senor',NULL,'toma_senor.php'),(90,1,5,NULL,'Dios trino',NULL,'dios_trino.php'),(91,2,29,NULL,'Una vez mas rezare',NULL,'una_vez_mas_rezare.php'),(92,11,192,NULL,'Yo creo',NULL,'yo_creo.php'),(93,10,162,NULL,'Cordero de Dios cumbia II',NULL,'cordero_de_dios_cumbia2.php'),(94,6,357,NULL,'Senor ante ti',NULL,'senor_ante_ti.php'),(95,17,358,NULL,'Como el nino que no sabe dormise',NULL,'como_el_nino_que_no_sabe_dormise.php'),(96,14,359,NULL,'Madre del silencio',NULL,'madre_del_silencio.php'),(97,3,51,NULL,'Gloria al Senor',NULL,'gloria_al_senor.php'),(98,5,85,NULL,'Canta Aleluya',NULL,'canta_aleluya.php'),(99,5,94,NULL,'Cantale Aleluya al Senor',NULL,'cantale_aleluya_al_senor.php'),(100,2,45,NULL,'Ten piedad de nuestras vidas',NULL,'ten_piedad_de_nuestras_vidas.php'),(101,1,21,NULL,'Los caminos',NULL,'los_caminos.php'),(102,12,214,NULL,'Hay momentos',NULL,'hay_momentos.php'),(103,11,189,NULL,'Ya no eres pan y vino',NULL,'ya_no_eres_pan_y_vino.php'),(104,13,227,NULL,'Hoy Senor, te damos gracias',NULL,'hoy_senor_te_damos_gracias.php'),(105,7,126,NULL,'Santo amazonense',NULL,'santo_amazonense.php'),(106,2,41,NULL,'Perdon Beatles',NULL,'perdon_beatles.php'),(107,1,11,NULL,'Iglesia soy',NULL,'iglesia_soy.php'),(108,1,2,NULL,'Llego el momento',NULL,'llego_el_momento.php'),(109,1,3,NULL,'Iglesia peregrina',NULL,'iglesia_peregrina.php'),(110,1,4,NULL,'Libertador de Nazaret',NULL,'libertador_de_nazaret.php'),(111,1,6,NULL,'Nueva generacion',NULL,'nueva_generacion.php'),(112,17,285,NULL,'Himno a San Martin',NULL,'himno_a_san_martin.php'),(113,4,71,NULL,'Tu palabra me da vida',NULL,'tu_palabra_me_da_vida.php'),(114,15,248,NULL,'Iluminame Senor',NULL,'iluminame_senor.php'),(116,17,303,NULL,'Esta es la luz de Cristo',NULL,'esta_es_la_luz_de_cristo.php'),(117,11,177,NULL,'Cristo te necesita',NULL,'cristo_te_necesita.php'),(118,7,121,NULL,'Santo es el Senor Aleluya',NULL,'santo_es_el_senor_aleluya.php'),(119,9,136,NULL,'Paz Senor',NULL,'paz_senor.php'),(120,4,74,NULL,'Salmo 23',NULL,'salmo_23.php'),(121,17,360,NULL,'Cancion de Zaqueo',NULL,'cancion_de_zaqueo.php'),(122,2,30,NULL,'Piedad Eco',NULL,'piedad_eco.php'),(123,11,165,NULL,'Aqui estoy, Senor',NULL,'aqui_estoy_senor.php'),(124,15,252,NULL,'Maranatha, Espiritu de Dios',NULL,'maranatha_espiritu_de_dios.php'),(125,17,327,NULL,'La guerra del amor',NULL,'la_guerra_del_amor.php'),(126,17,361,NULL,'Secuencia de pentecostes',NULL,'secuencia_de_pentecostes.php');
/*!40000 ALTER TABLE `canciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=20;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Cantos de Entrada'),(2,'Cantos de Perdon'),(3,'Gloria'),(4,'Lecturas y Salmos'),(5,'Aleluya'),(6,'Ofertorio'),(7,'Santo'),(8,'Padre Nuestro'),(9,'Paz'),(10,'Cordero'),(11,'Comunion'),(12,'Meditacion'),(13,'Despedida'),(14,'Cantos a Maria'),(15,'Cantos al Espiritu Santo'),(16,'Navidad'),(17,'Cantos Diversos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `misas`
--

DROP TABLE IF EXISTS `misas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `misas` (
  `idmisa` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idmisa`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=5461;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `misas`
--

LOCK TABLES `misas` WRITE;
/*!40000 ALTER TABLE `misas` DISABLE KEYS */;
INSERT INTO `misas` VALUES (1,'Misa difuntos','misa_difuntos.php','2019-08-27'),(2,'Misa Santa Rosa','misa_santa_rosa.php','2019-08-30'),(3,'Misa XXII Domingo del Tiempo Ordinario','misa_xxii_tiempo_ordinario.php','2019-09-01'),(4,'Misa XXIII Domingo del Tiempo Ordinario','misa_xxiii_tiempo_ordinario.php','2019-09-08'),(5,'Misa XXIV Domingo del Tiempo Ordinario','misa_xxiv_tiempo_ordinario.php','2019-09-15'),(6,'Misa juvenil 2019','misa_juvenil_2019.php','2019-09-21'),(7,'Misa XXV Domingo del Tiempo Ordinario','misa_xxv_tiempo_ordinario.php','2019-09-22'),(8,'Misa XXVI Domingo del Tiempo Ordinario','misa_xxvi_tiempo_ordinario.php','2019-09-29'),(9,'Misa XXVII Domingo del Tiempo Ordinario','misa_xxvii_tiempo_ordinario.php','2019-10-06'),(10,'Cantos nuevos','cantos_nuevos.php','2019-01-01'),(11,'Misa XXVIII Domingo del Tiempo Ordinario','misa_xxviii_tiempo_ordinario.php','2019-10-13'),(12,'Misa cumpleaños del Padre Manuel','misa_cumpleanos_padre.php','2019-10-09'),(13,'Misa San Ignacio de Antioquia','misa_san_ignacio_antioquia.php','2019-10-17'),(14,'Misa XXIX Domingo del tiempo Ordinario','misa_xxix_tiempo_ordinario.php','2019-10-20'),(15,'Misa XXX Domingo del tiempo Ordinario','misa_xxx_tiempo_ordinario.php','2019-10-27'),(16,'Misa XXXI Domingo del tiempo Ordinario','misa_xxxi_tiempo_ordinario.php','2019-11-03'),(17,'Misa XXXII Domingo tiempo Ordinario','misa_xxxii_tiempo_ordinario.php','2019-11-10'),(18,'Misa Bautizo','misa_bautizo.php','2019-08-28'),(19,'Misa confirmacion','misa_confirmacion2019.php','2019-12-21'),(20,'Misa 1er domingo Adviento','misa_i_domingo_adviento.php','2019-12-01');
/*!40000 ALTER TABLE `misas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-07  3:51:33
