### DB Tanımı

```SQL

DROP TABLE IF EXISTS `dersler`;
CREATE TABLE `dersler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adi` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;

INSERT INTO `dersler` (`id`, `adi`) VALUES
(1,	'PHP'),
(2,	'VUE'),
(3,	'MySQL'),
(4,	'HTML'),
(5,	'CSS'),
(6,	'JS'),
(7,	'Redis'),
(8,	'Python');


DROP TABLE IF EXISTS `formlar`;
CREATE TABLE `formlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(50) NOT NULL,
  `tc` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sehir_id` int(11) NOT NULL,
  `dersler` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_turkish_ci;


DROP TABLE IF EXISTS `iller`;
CREATE TABLE `iller` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `il_adi` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

INSERT INTO `iller` (`id`, `il_adi`) VALUES
(1,	'Adana'),
(2,	'Adıyaman'),
(3,	'Afyonkarahisar'),
(4,	'Ağrı'),
(5,	'Aksaray'),
(6,	'Amasya'),
(7,	'Ankara'),
(8,	'Antalya'),
(9,	'Ardahan'),
(10,	'Artvin'),
(11,	'Aydın'),
(12,	'Balıkesir'),
(13,	'Bartın'),
(14,	'Batman'),
(15,	'Bayburt'),
(16,	'Bilecik'),
(17,	'Bingöl'),
(18,	'Bitlis'),
(19,	'Bolu'),
(20,	'Burdur'),
(21,	'Bursa'),
(22,	'Çanakkale'),
(23,	'Çankırı'),
(24,	'Çorum'),
(25,	'Denizli'),
(26,	'Diyarbakır'),
(27,	'Düzce'),
(28,	'Edirne'),
(29,	'Elazığ'),
(30,	'Erzincan'),
(31,	'Erzurum'),
(32,	'Eskişehir'),
(33,	'Gaziantep'),
(34,	'Giresun'),
(35,	'Gümüşhane'),
(36,	'Hakkari'),
(37,	'Hatay'),
(38,	'Iğdır'),
(39,	'Isparta'),
(40,	'İstanbul'),
(41,	'İzmir'),
(42,	'Kahramanmaraş'),
(43,	'Karabük'),
(44,	'Karaman'),
(45,	'Kars'),
(46,	'Kastamonu'),
(47,	'Kayseri'),
(48,	'Kırıkkale'),
(49,	'Kırklareli'),
(50,	'Kırşehir'),
(51,	'Kilis'),
(52,	'Kocaeli'),
(53,	'Konya'),
(54,	'Kütahya'),
(55,	'Malatya'),
(56,	'Manisa'),
(57,	'Mardin'),
(58,	'Mersin'),
(59,	'Muğla'),
(60,	'Muş'),
(61,	'Nevşehir'),
(62,	'Niğde'),
(63,	'Ordu'),
(64,	'Osmaniye'),
(65,	'Rize'),
(66,	'Sakarya'),
(67,	'Samsun'),
(68,	'Siirt'),
(69,	'Sinop'),
(70,	'Sivas'),
(71,	'Şanlıurfa'),
(72,	'Şırnak'),
(73,	'Tekirdağ'),
(74,	'Tokat'),
(75,	'Trabzon'),
(76,	'Tunceli'),
(77,	'Uşak'),
(78,	'Van'),
(79,	'Yalova'),
(80,	'Yozgat'),
(81,	'Zonguldak');

```

### Projeye başlama

```bash
npm create vue@latest
```

# vue-form-kullanimi

This template should help get you started developing with Vue 3 in Vite.

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur) + [TypeScript Vue Plugin (Volar)](https://marketplace.visualstudio.com/items?itemName=Vue.vscode-typescript-vue-plugin).

## Customize configuration

See [Vite Configuration Reference](https://vitejs.dev/config/).

## Project Setup

```sh
npm install
```

### Compile and Hot-Reload for Development

```sh
npm run dev
```

### Compile and Minify for Production

```sh
npm run build
```

### Lint with [ESLint](https://eslint.org/)

```sh
npm run lint
```
