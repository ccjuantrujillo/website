/*
SQLyog Community v12.4.3 (64 bit)
MySQL - 5.7.21-log : Database - blogBoostrap
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blogBoostrap` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `blogBoostrap`;

/*Table structure for table `comentario` */

DROP TABLE IF EXISTS `comentario`;

CREATE TABLE `comentario` (
  `idcomentario` int(6) NOT NULL AUTO_INCREMENT,
  `idtema` int(6) NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`idcomentario`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

/*Data for the table `comentario` */

insert  into `comentario`(`idcomentario`,`idtema`,`fecha`,`comentario`,`nombre`) values 
(1,1,'2007-12-06','Amigo estoy tratando de instalar el apache en el Ubuntu, como hago esto','Ricardo'),
(2,1,'2007-12-02','No puedes escribir mas???','Ruben'),
(3,1,'2008-02-05','Una consulta, como utilizo los procesos crond\r\nSaludos','carlos'),
(4,1,'2008-03-31','afds','f'),
(5,2,'2008-03-31','afds','adf'),
(6,2,'2008-03-31','afds','adf'),
(7,2,'2008-03-31','afds','adf'),
(8,2,'2008-03-31','afds','adf'),
(43,1,'2017-06-11','asdf','Martin'),
(44,1,'2017-06-11','asdf','Juan'),
(45,1,'2017-06-11','asdf','Juan'),
(46,1,'2017-06-11','asdf','Juan');

/*Table structure for table `tema` */

DROP TABLE IF EXISTS `tema`;

CREATE TABLE `tema` (
  `idtema` int(6) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `resumen` text NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `visitas` int(4) NOT NULL DEFAULT '0',
  `fecha` datetime NOT NULL,
  `estado` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`idtema`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `tema` */

insert  into `tema`(`idtema`,`titulo`,`resumen`,`contenido`,`imagen`,`visitas`,`fecha`,`estado`) values 
(1,'El arte digital y sus infinitas posibilidades','El arte digital es, seguramente, la disciplina más novedosa dentro del mundo de las artes plásticas. Muchos la consideran la expresión artística del futuro por las nuevas   posibilidades creativas con la que, cada día, es capaz de sorprendernos. Las nuevas tecnologías se ponen al servicio del arte interconectando sectores muy diversos que abarcan desde […]','El arte digital es, seguramente, la disciplina más novedosa dentro del mundo de las artes plásticas. Muchos la consideran la expresión artística del futuro por las nuevas   posibilidades creativas con la que, cada día, es capaz de sorprendernos.\r\nLas nuevas tecnologías se ponen al servicio del arte interconectando sectores muy diversos que abarcan desde la imagen y la fotografía tradicional hasta los más espectaculares efectos especiales. Arte digital puede ser un cuadro en el que casi podemos sumergirnos gracias a su diseño en 3D, un videojuego en el que participamos de manera activa junto a personajes virtuales, un corto de animación, una fotografía en la que nada es lo que parece… la creatividad no tiene límites y con las herramientas actuales puede llegar a donde se proponga.\r\nTambién el propio concepto de artista ha cambiado radicalmente. A las técnicas tradicionales de dibujo, pintura o escultura, basadas principalmente en la representación de la realidad, se han unido conceptos rompedores como el modelado de escenarios y personajes, los objetos “interactivos”, los entornos virtuales o las interfaces gráficas que han supuesto una verdadera revolución. Podría decirse que el campo del arte y el de la comunicación se han unido definitivamente abriendo nuevas vías de expresión, aún inexploradas, que tienen en cuenta los nuevos soportes: pcs, consolas, tablets, Iphones…\r\nSin duda, éste el motivo principal por el que también la formación relacionada con el Arte ha cambiado, ampliando horizontes y ofreciendo nuevas opciones que no se limitan, únicamente, al Grado en Bellas Artes. Novedosos estudios como el Grado en Diseño, Animación y Arte Digital son un buen ejemplo de cómo aprender a combinar la propia creatividad con las nuevas tecnologías.\r\nSe trata de un grado que incluye materias muy diversas: fotografía, modelaje, diseño 3D, narrativa audiovisual, comunicación, game desing y por supuesto, Historia del Arte una asignatura que no puede faltar como fuente de inspiración para los artistas del siglo XXI.\r\nHay que tener en cuenta que el arte digital está muy presente en nuestro día a día (no solo en una exposición puntual que puedas ver en un museo). Basta pensar, por ejemplo, en el mundo de la publicidad y el marketing, con anuncios, campañas, banners, carteles, cortos… nadie puede negar que algunas piezas son realmente obras de arte. Lo mismo ocurre con los actuales videojuegos, que no dejan de sorprender por su impactante realismo, por la calidad en el diseño detallado de personajes y “mundos” y por la capacidad de interactuación que permiten.\r\nProductores digitales, animadores en 2D y 3D, responsables de post producción, expertos en efectos especiales, creativos publicitarios, diseñadores de contenidos audiovisuales… nuevas profesiones que hacen de un trabajo basado en la tecnología, un verdadero arte.','foto1.jpg',7,'2008-05-12 00:00:00',''),
(2,'Slate de HP, la competencia de iPad','HP ha presentado su nueva joya, Slate. Aun se desconoce cuando llegará a España, y el precio por el cual podremos adquirir este dispositivo. Pero si sabemos que podremos comprarlo en su página web o bien por los medios de canal convencionales, y es que HP sigue siendo fiel a su sistema de distribución […]','HP ha presentado su nueva joya, Slate. Aun se desconoce cuando llegará a España, y el precio por el cual podremos adquirir este dispositivo. Pero si sabemos que podremos comprarlo en su página web o bien por los medios de canal convencionales, y es que HP sigue siendo fiel a su sistema de distribución y no tiene intención de cambiarlo. Abrir una división de venta paralela de dispositivos ajena al canal de distribución sería un error y enfrentaría a los Partners con HP. Algo que es mejor evitar.\r\nEl Slate de HP nos recuerda mucho al nuevo iPad de Apple, y es que parece que han tomado ejemplo del nuevo dispositivo de Apple. Aunque el director de marketing comenta que no tiene nada que ver y no será un producto para sustituir a otros sino que abre una vía de negocio nueva.\r\nSlate de HP vendrá con Windows 7 como sistema operativo y podrá leer flash, cosa que iPad no puede. Y esto será un punto positivo para Slate. Pretende ser un dispositivo con un alto rendimiento multimedia y orientado al ocio, descartando así que sea un producto de gama profesional.','foto2.jpg',3,'2008-07-12 00:00:00',''),
(3,'Windows Phone 7','Microsoft presenta en el Mobile World Congress de Barcelona el nuevo sistema operativo para móviles, el Windows Phone 7. Este nuevo sistema operativo pretende arrebatar cuota de mercado a Apple y Google con sus respectivos móviles iPhone y Nexus One. Steve Balmer presentó ayer el Windows Phone 7, con pretensiones de arañar a Apple […]','Microsoft presenta en el Mobile World Congress de Barcelona el nuevo sistema operativo para móviles, el Windows Phone 7. Este nuevo sistema operativo pretende arrebatar cuota de mercado a Apple y Google con sus respectivos móviles iPhone y Nexus One.\r\nSteve Balmer presentó ayer el Windows Phone 7, con pretensiones de arañar a Apple y a Google y adentrarse en una batalla hoy por hoy lidiada por estos. Aunque Apple saca una mayor ventaja frente a sus competidores. Y es que hasta Nokia, el gran fabricante de telefonía, se ha quedado atrás con los avances que ha ido presentando Apple en sus terminales táctiles.\r\nWindows Phone 7 ha sido presentado en el hotel Catalonia, con una gran expectación de japoneses que debido al Mobile World Congress han invadido la ciudad.','foto3.jpg',1,'2010-03-12 00:56:27',''),
(4,'Trucos para conseguir tráfico web','Hace tiempo me llegó un documento donde hablaba de 77 formas de conseguir tráfico para nuestras webs. Unos trucos, algunos de ellos muy obvios, y otros que quizás omitimos. Se trata de un documento muy curioso e interesante para los webmasters que desean mejorar la rentabilidad de su web y quieren potenciar el tráfico […]','Hace tiempo me llegó un documento donde hablaba de 77 formas de conseguir tráfico para nuestras webs. Unos trucos, algunos de ellos muy obvios, y otros que quizás omitimos. Se trata de un documento muy curioso e interesante para los webmasters que desean mejorar la rentabilidad de su web y quieren potenciar el tráfico web entrante a esta.\r\nEsta guía de trucos está desarrollada por Allan Gardyne y traducida por José Rosselló.\r\nComo bien dice el informe, en ocasiones no se pueden aplicar los 77 trucos para conseguir tráfico web, pero podemos aplicar tantos como podamos o nos permita nuestra página web. Sin lugar a dudas este documento se debe leer detenidamente y es una lectura que recomiendo a todos los webmasters, que aunque ya los sepan, no va bien recordarlos de vez en cuando.\r\nSe trata de un informe realizado en el 2006, pero a pesar de ello sigue siendo muy actual. Aquí os dejo el link de la descarga del informe de trucos para conseguir tráfico.','',8,'2010-03-12 01:02:42','');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `perfil` int(11) DEFAULT NULL,
  `estado` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `usuario` */

insert  into `usuario`(`id`,`login`,`password`,`nombres`,`apellidos`,`perfil`,`estado`) values 
(1,'demo','e10adc3949ba59abbe56e057f20f883e','MARTIN','TRUJILLO BUSTAMANTE',1,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
