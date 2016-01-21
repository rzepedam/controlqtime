
<!-- forescats | Previsión de Salud -->
INSERT INTO forecasts(name) VALUES ('Banmédica');
INSERT INTO forecasts(name) VALUES ('Isapre Colmena Golden Cross');
INSERT INTO forecasts(name) VALUES ('Isapre Cruz Blanca');
INSERT INTO forecasts(name) VALUES ('Fonasa');


<!-- ratings | Cargos -->
INSERT INTO ratings(name) VALUES ('Administrador');
INSERT INTO ratings(name) VALUES ('Gerente General');
INSERT INTO ratings(name) VALUES ('Contador');
INSERT INTO ratings(name) VALUES ('Secretario');


<!-- certifications | Certificaciones -->
INSERT INTO certifications(name, institution_id) VALUES ('Certificación Java', 1);
INSERT INTO certifications(name, institution_id) VALUES ('Certificación RIGGR', 2);
INSERT INTO certifications(name, institution_id) VALUES ('Certificación Conducción a la Defensiva', 3);
INSERT INTO certifications(name, institution_id) VALUES ('Certificación Cero Daño', 2);


<!-- disabilities | Discapacidades -->
INSERT INTO disabilities(name, description) VALUES ('Lesión Medular', 'Es un daño que se presenta en la medula espinal puede ser por una enfermedad o por un accidente y origína perdida en algunas de las funciones movimientos y/o sensibilidad, estas perdidas se presentan por debajo del lugar donde ocurrió la lesión.');
INSERT INTO disabilities(name, description) VALUES ('Esclerosis Múltiple', 'Es una enfermedad fundamentalmente inmunológica, en la cual se produce una suerte de alergia de una parte del sistema nervioso central, afectando los nervios que están recubiertos por la capa de mielina. Se llama esclerosis porque hay endurecimiento o cicatriz del tejido en las áreas dañadas y múltiple porque se afectan zonas salpicadas del sistema nervioso central, donde los síntomas pueden ser severos o leves, los cuales pueden manifestarse con una periodicidad impredecible y errática, diferente en cada paciente. Existen dos formas básicas de EM: La más corriente se manifiesta con brotes (síntomas) espaciados que pueden durar días o semanas. Los brotes no son necesariamente acumulativos y entre uno y otro pueden pasar meses o años. La segunda es crónica, más compleja, con brotes progresivos. Además, la EM puede expresarse de otras formas mixtas.');
INSERT INTO disabilities(name, description) VALUES ('Paralisis Cerebral','Es un conjunto de desórdenes cerebrales que afecta el movimiento y la coordinación muscular. Es causada por daño a una o más áreas específicas del cerebro, generalmente durante el desarrollo fetal, pero también puede producirse justo antes, durante o poco después del nacimiento, como también por situaciones traumáticas (accidentes). Existen diversos grados de parálisis cerebral. Tradicionalmene se distinguen cuatro tipos: Espástica, Disquinética, Atáxica y Mixta.');
INSERT INTO disabilities(name, description) VALUES ('Mal de Parkinson', 'Entre las enfermedades neurológicas, el Mal de Parkinson (MP) ocupa el cuarto lugar en incidencia. Es una de las afecciones más antiguas que conoce la humanidad y recibe su denominación del médico londinense James Parkinson, quien la padeció y la describió en 1817. De causa desconocida, es una enfermedad crónica y progresiva, que causa una lenta pérdida de la capacidad física en la época de la vida que se creía llegar a un merecido descanso.');


<!-- diseases | Enfermedades -->
INSERT INTO diseases(name, description) VALUES ('Fatiga Visual', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu.');
INSERT INTO diseases(name, description) VALUES ('Dolor de Espalda', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu.');
INSERT INTO diseases(name, description) VALUES ('Estrés', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu.');
INSERT INTO diseases(name, description) VALUES ('El Síndrome de la Fatiga Crónica', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu.');
INSERT INTO diseases(name, description) VALUES ('Síndorme de Tunel Carpiano', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibu.');

<!-- specialities | Especialidades -->
INSERT INTO specialities(name) VALUES ('Administración');
INSERT INTO specialities(name) VALUES ('Mecánica automotriz');
INSERT INTO specialities(name) VALUES ('Muebles y terminaciones de la madera');
INSERT INTO specialities(name) VALUES ('Vestuario y confección textil');

<!-- licenses | Licencias -->
INSERT INTO licenses(name) VALUES ('Licencia A-1');
INSERT INTO licenses(name) VALUES ('Licencia A-2');
INSERT INTO licenses(name) VALUES ('Licencia B');
INSERT INTO licenses(name) VALUES ('Licencia D');


<!-- professions | Profesiones -->
INSERT INTO professions(name) VALUES ('Ingeniería Civil Industrial');
INSERT INTO professions(name) VALUES ('Derecho');
INSERT INTO professions(name) VALUES ('Ingeniería Informática');
INSERT INTO professions(name) VALUES ('Servicio Social');
INSERT INTO professions(name) VALUES ('Teatro');


<!-- kins | Parentesco Familiar -->
INSERT INTO kins(name) VALUES ('Padre');
INSERT INTO kins(name) VALUES ('Madre');
INSERT INTO kins(name) VALUES ('Hijo');
INSERT INTO kins(name) VALUES ('Tía');
INSERT INTO kins(name) VALUES ('Primo');


<!-- type-institutions | Tipos de Institución -->
INSERT INTO type_institutions(name) VALUES ('Universidad');
INSERT INTO type_institutions(name) VALUES ('Centro de Formación Técnica');
INSERT INTO type_institutions(name) VALUES ('Instituto Profesional');


<!-- institutions | Instituciones -->
INSERT INTO institutions(name, type_institution_id) VALUES ('Universidad de Chile', 1);
INSERT INTO institutions(name, type_institution_id) VALUES ('La Araucana', 2);
INSERT INTO institutions(name, type_institution_id) VALUES ('Los Leones', 3);
INSERT INTO institutions(name, type_institution_id) VALUES ('Universidad Tecnológica Metropolitana', 1);
INSERT INTO institutions(name, type_institution_id) VALUES ('Universidad de Chile', 1);


<!-- countries | Países -->
INSERT INTO countries VALUES ('ABW','Aruba');
INSERT INTO countries VALUES ('AFG','Afghanistan');
INSERT INTO countries VALUES ('AGO','Angola');
INSERT INTO countries VALUES ('AIA','Anguilla');
INSERT INTO countries VALUES ('ALB','Albania');
INSERT INTO countries VALUES ('AND','Andorra');
INSERT INTO countries VALUES ('ANT','Netherlands Antilles');
INSERT INTO countries VALUES ('ARE','United Arab Emirates');
INSERT INTO countries VALUES ('ARG','Argentina');
INSERT INTO countries VALUES ('ARM','Armenia');
INSERT INTO countries VALUES ('ASM','American Samoa');
INSERT INTO countries VALUES ('ATF','French Southern territories');
INSERT INTO countries VALUES ('ATG','Antigua and Barbuda');
INSERT INTO countries VALUES ('AUS','Australia');
INSERT INTO countries VALUES ('AUT','Austria');
INSERT INTO countries VALUES ('AZE','Azerbaijan');
INSERT INTO countries VALUES ('BDI','Burundi');
INSERT INTO countries VALUES ('BEL','Belgium');
INSERT INTO countries VALUES ('BEN','Benin');
INSERT INTO countries VALUES ('BFA','Burkina Faso');
INSERT INTO countries VALUES ('BGD','Bangladesh');
INSERT INTO countries VALUES ('BGR','Bulgaria');
INSERT INTO countries VALUES ('BHR','Bahrain');
INSERT INTO countries VALUES ('BHS','Bahamas');
INSERT INTO countries VALUES ('BIH','Bosnia and Herzegovina');
INSERT INTO countries VALUES ('BLR','Belarus');
INSERT INTO countries VALUES ('BLZ','Belize');
INSERT INTO countries VALUES ('BMU','Bermuda');
INSERT INTO countries VALUES ('BOL','Bolivia');
INSERT INTO countries VALUES ('BRA','Brazil');
INSERT INTO countries VALUES ('BRB','Barbados');
INSERT INTO countries VALUES ('BRN','Brunei');
INSERT INTO countries VALUES ('BTN','Bhutan');
INSERT INTO countries VALUES ('BVT','Bouvet Island');
INSERT INTO countries VALUES ('BWA','Botswana');
INSERT INTO countries VALUES ('CAF','Central African Republic');
INSERT INTO countries VALUES ('CAN','Canada');
INSERT INTO countries VALUES ('CCK','Cocos (Keeling) Islands');
INSERT INTO countries VALUES ('CHE','Switzerland');
INSERT INTO countries VALUES ('CHL','Chile');
INSERT INTO countries VALUES ('CHN','China');
INSERT INTO countries VALUES ('CIV','Costa de Marfil');
INSERT INTO countries VALUES ('CMR','Cameroon');
INSERT INTO countries VALUES ('COD','República Democrática del Congo');
INSERT INTO countries VALUES ('COG','Congo');
INSERT INTO countries VALUES ('COK','Cook Islands');
INSERT INTO countries VALUES ('COL','Colombia');
INSERT INTO countries VALUES ('COM','Comoros');
INSERT INTO countries VALUES ('CPV','Cape Verde');
INSERT INTO countries VALUES ('CRI','Costa Rica');
INSERT INTO countries VALUES ('CUB','Cuba');
INSERT INTO countries VALUES ('CXR','Christmas Island');
INSERT INTO countries VALUES ('CYM','Cayman Islands');
INSERT INTO countries VALUES ('CYP','Cyprus');
INSERT INTO countries VALUES ('CZE','Czech Republic');
INSERT INTO countries VALUES ('DEU','Germany');
INSERT INTO countries VALUES ('DJI','Djibouti');
INSERT INTO countries VALUES ('DMA','Dominica');
INSERT INTO countries VALUES ('DNK','Denmark');
INSERT INTO countries VALUES ('DOM','Dominican Republic');
INSERT INTO countries VALUES ('DZA','Algeria');
INSERT INTO countries VALUES ('ECU','Ecuador');
INSERT INTO countries VALUES ('EGY','Egypt');
INSERT INTO countries VALUES ('ERI','Eritrea');
INSERT INTO countries VALUES ('ESH','Western Sahara');
INSERT INTO countries VALUES ('ESP','Spain');
INSERT INTO countries VALUES ('EST','Estonia');
INSERT INTO countries VALUES ('ETH','Ethiopia');
INSERT INTO countries VALUES ('FIN','Finland');
INSERT INTO countries VALUES ('FJI','Fiji Islands');
INSERT INTO countries VALUES ('FLK','Falkland Islands');
INSERT INTO countries VALUES ('FRA','France');
INSERT INTO countries VALUES ('FRO','Faroe Islands');
INSERT INTO countries VALUES ('FSM','Micronesia, Federated States of');
INSERT INTO countries VALUES ('GAB','Gabon');
INSERT INTO countries VALUES ('GBR','United Kingdom');
INSERT INTO countries VALUES ('GEO','Georgia');
INSERT INTO countries VALUES ('GHA','Ghana');
INSERT INTO countries VALUES ('GIB','Gibraltar');
INSERT INTO countries VALUES ('GIN','Guinea');
INSERT INTO countries VALUES ('GLP','Guadeloupe');
INSERT INTO countries VALUES ('GMB','Gambia');
INSERT INTO countries VALUES ('GNB','Guinea-Bissau');
INSERT INTO countries VALUES ('GNQ','Equatorial Guinea');
INSERT INTO countries VALUES ('GRC','Greece');
INSERT INTO countries VALUES ('GRD','Grenada');
INSERT INTO countries VALUES ('GRL','Greenland');
INSERT INTO countries VALUES ('GTM','Guatemala');
INSERT INTO countries VALUES ('GUF','French Guiana');
INSERT INTO countries VALUES ('GUM','Guam');
INSERT INTO countries VALUES ('GUY','Guyana');
INSERT INTO countries VALUES ('HKG','Hong Kong');
INSERT INTO countries VALUES ('HMD','Heard Island and McDonald Islands');
INSERT INTO countries VALUES ('HND','Honduras');
INSERT INTO countries VALUES ('HRV','Croatia');
INSERT INTO countries VALUES ('HTI','Haiti');
INSERT INTO countries VALUES ('HUN','Hungary');
INSERT INTO countries VALUES ('IDN','Indonesia');
INSERT INTO countries VALUES ('IND','India');
INSERT INTO countries VALUES ('IOT','British Indian Ocean Territory');
INSERT INTO countries VALUES ('IRL','Ireland');
INSERT INTO countries VALUES ('IRN','Iran');
INSERT INTO countries VALUES ('IRQ','Iraq');
INSERT INTO countries VALUES ('ISL','Iceland');
INSERT INTO countries VALUES ('ISR','Israel');
INSERT INTO countries VALUES ('ITA','Italy');
INSERT INTO countries VALUES ('JAM','Jamaica');
INSERT INTO countries VALUES ('JOR','Jordan');
INSERT INTO countries VALUES ('JPN','Japan');
INSERT INTO countries VALUES ('KAZ','Kazakstan');
INSERT INTO countries VALUES ('KEN','Kenya');
INSERT INTO countries VALUES ('KGZ','Kyrgyzstan');
INSERT INTO countries VALUES ('KHM','Cambodia');
INSERT INTO countries VALUES ('KIR','Kiribati');
INSERT INTO countries VALUES ('KNA','Saint Kitts and Nevis');
INSERT INTO countries VALUES ('KOR','South Korea');
INSERT INTO countries VALUES ('KWT','Kuwait');
INSERT INTO countries VALUES ('LAO','Laos');
INSERT INTO countries VALUES ('LBN','Lebanon');
INSERT INTO countries VALUES ('LBR','Liberia');
INSERT INTO countries VALUES ('LBY','Libyan Arab Jamahiriya');
INSERT INTO countries VALUES ('LCA','Saint Lucia');
INSERT INTO countries VALUES ('LIE','Liechtenstein');
INSERT INTO countries VALUES ('LKA','Sri Lanka');
INSERT INTO countries VALUES ('LSO','Lesotho');
INSERT INTO countries VALUES ('LTU','Lithuania');
INSERT INTO countries VALUES ('LUX','Luxembourg');
INSERT INTO countries VALUES ('LVA','Latvia');
INSERT INTO countries VALUES ('MAC','Macao');
INSERT INTO countries VALUES ('MAR','Morocco');
INSERT INTO countries VALUES ('MCO','Monaco');
INSERT INTO countries VALUES ('MDA','Moldova');
INSERT INTO countries VALUES ('MDG','Madagascar');
INSERT INTO countries VALUES ('MDV','Maldives');
INSERT INTO countries VALUES ('MEX','Mexico');
INSERT INTO countries VALUES ('MHL','Marshall Islands');
INSERT INTO countries VALUES ('MKD','Macedonia');
INSERT INTO countries VALUES ('MLI','Mali');
INSERT INTO countries VALUES ('MLT','Malta');
INSERT INTO countries VALUES ('MMR','Myanmar');
INSERT INTO countries VALUES ('MNG','Mongolia');
INSERT INTO countries VALUES ('MNP','Northern Mariana Islands');
INSERT INTO countries VALUES ('MOZ','Mozambique');
INSERT INTO countries VALUES ('MRT','Mauritania');
INSERT INTO countries VALUES ('MSR','Montserrat');
INSERT INTO countries VALUES ('MTQ','Martinique');
INSERT INTO countries VALUES ('MUS','Mauritius');
INSERT INTO countries VALUES ('MWI','Malawi');
INSERT INTO countries VALUES ('MYS','Malaysia');
INSERT INTO countries VALUES ('MYT','Mayotte');
INSERT INTO countries VALUES ('NAM','Namibia');
INSERT INTO countries VALUES ('NCL','New Caledonia');
INSERT INTO countries VALUES ('NER','Nigeria');
INSERT INTO countries VALUES ('NFK','Norfolk Island');
INSERT INTO countries VALUES ('NGA','Nigeria');
INSERT INTO countries VALUES ('NIC','Nicaragua');
INSERT INTO countries VALUES ('NIU','Niue');
INSERT INTO countries VALUES ('NLD','Netherlands');
INSERT INTO countries VALUES ('NOR','Norway');
INSERT INTO countries VALUES ('NPL','Nepal');
INSERT INTO countries VALUES ('NRU','Nauru');
INSERT INTO countries VALUES ('NZL','New Zealand');
INSERT INTO countries VALUES ('OMN','Oman');
INSERT INTO countries VALUES ('PAK','Pakistan');
INSERT INTO countries VALUES ('PAN','Panama');
INSERT INTO countries VALUES ('PCN','Pitcairn');
INSERT INTO countries VALUES ('PER','Peru');
INSERT INTO countries VALUES ('PHL','Philippines');
INSERT INTO countries VALUES ('PLW','Palau');
INSERT INTO countries VALUES ('PNG','Papua New Guinea');
INSERT INTO countries VALUES ('POL','Poland');
INSERT INTO countries VALUES ('PRI','Puerto Rico');
INSERT INTO countries VALUES ('PRK','North Korea');
INSERT INTO countries VALUES ('PRT','Portugal');
INSERT INTO countries VALUES ('PRY','Paraguay');
INSERT INTO countries VALUES ('PSE','Palestina');
INSERT INTO countries VALUES ('PYF','French Polynesia');
INSERT INTO countries VALUES ('QAT','Qatar');
INSERT INTO countries VALUES ('REU','Réunion');
INSERT INTO countries VALUES ('ROM','Romania');
INSERT INTO countries VALUES ('RUS','Russian Federation');
INSERT INTO countries VALUES ('RWA','Rwanda');
INSERT INTO countries VALUES ('SAU','Saudi Arabia');
INSERT INTO countries VALUES ('SDN','Sudan');
INSERT INTO countries VALUES ('SEN','Senegal');
INSERT INTO countries VALUES ('SGP','Singapore');
INSERT INTO countries VALUES ('SGS','South Georgia and the South Sandwich Islands');
INSERT INTO countries VALUES ('SHN','Saint Helena');
INSERT INTO countries VALUES ('SJM','Svalbard and Jan Mayen');
INSERT INTO countries VALUES ('SLB','Solomon Islands');
INSERT INTO countries VALUES ('SLE','Sierra Leone');
INSERT INTO countries VALUES ('SLV','El Salvador');
INSERT INTO countries VALUES ('SMR','San Marino');
INSERT INTO countries VALUES ('SOM','Somalia');
INSERT INTO countries VALUES ('SPM','Saint Pierre and Miquelon');
INSERT INTO countries VALUES ('STP','Sao Tome and Principe');
INSERT INTO countries VALUES ('SUR','Suriname');
INSERT INTO countries VALUES ('SVK','Slovakia');
INSERT INTO countries VALUES ('SVN','Slovenia');
INSERT INTO countries VALUES ('SWE','Sweden');
INSERT INTO countries VALUES ('SWZ','Swaziland');
INSERT INTO countries VALUES ('SYC','Seychelles');
INSERT INTO countries VALUES ('SYR','Syria');
INSERT INTO countries VALUES ('TCA','Turks and Caicos Islands');
INSERT INTO countries VALUES ('TCD','Chad');
INSERT INTO countries VALUES ('TGO','Togo');
INSERT INTO countries VALUES ('THA','Thailand');
INSERT INTO countries VALUES ('TJK','Tajikistan');
INSERT INTO countries VALUES ('TKL','Tokelau');
INSERT INTO countries VALUES ('TKM','Turkmenistan');
INSERT INTO countries VALUES ('TMP','East Timor');
INSERT INTO countries VALUES ('TON','Tonga');
INSERT INTO countries VALUES ('TTO','Trinidad and Tobago');
INSERT INTO countries VALUES ('TUN','Tunisia');
INSERT INTO countries VALUES ('TUR','Turkey');
INSERT INTO countries VALUES ('TUV','Tuvalu');
INSERT INTO countries VALUES ('TWN','Taiwan');
INSERT INTO countries VALUES ('TZA','Tanzania');
INSERT INTO countries VALUES ('UGA','Uganda');
INSERT INTO countries VALUES ('UKR','Ukraine');
INSERT INTO countries VALUES ('UMI','United States Minor Outlying Islands');
INSERT INTO countries VALUES ('URY','Uruguay');
INSERT INTO countries VALUES ('USA','United States');
INSERT INTO countries VALUES ('UZB','Uzbekistan');
INSERT INTO countries VALUES ('VAT','Holy See (Vatican City State)');
INSERT INTO countries VALUES ('VCT','Saint Vincent and the Grenadines');
INSERT INTO countries VALUES ('VEN','Venezuela');
INSERT INTO countries VALUES ('VGB','Virgin Islands, British');
INSERT INTO countries VALUES ('VIR','Virgin Islands, U.S.');
INSERT INTO countries VALUES ('VNM','Vietnam');
INSERT INTO countries VALUES ('VUT','Vanuatu');
INSERT INTO countries VALUES ('WLF','Wallis and Futuna');
INSERT INTO countries VALUES ('WSM','Samoa');
INSERT INTO countries VALUES ('YEM','Yemen');
INSERT INTO countries VALUES ('YUG','Yugoslavia');
INSERT INTO countries VALUES ('ZAF','South Africa');
INSERT INTO countries VALUES ('ZMB','Zambia');
INSERT INTO countries VALUES ('ZWE','Zimbabwe');