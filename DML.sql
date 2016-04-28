
/* genders | Género */
INSERT INTO genders(name) VALUES ('Masculino');
INSERT INTO genders(name) VALUES ('Femenino');

/* countries | Países */
INSERT INTO countries(name) VALUES ('Argentina');
INSERT INTO countries(name) VALUES ('Bolivia');
INSERT INTO countries(name) VALUES ('Colombia');
INSERT INTO countries(name) VALUES ('Chile');
INSERT INTO countries(name) VALUES ('Ecuador');
INSERT INTO countries(name) VALUES ('Peru');
INSERT INTO countries(name) VALUES ('Paraguay');
INSERT INTO countries(name) VALUES ('Uruguay');
INSERT INTO countries(name) VALUES ('Venezuela');

/* nationalities | Nacionalidades */
INSERT INTO nationalities(name) VALUES ('Argentina');
INSERT INTO nationalities(name) VALUES ('Bolivia');
INSERT INTO nationalities(name) VALUES ('Colombia');
INSERT INTO nationalities(name) VALUES ('Chile');
INSERT INTO nationalities(name) VALUES ('Ecuador');
INSERT INTO nationalities(name) VALUES ('Peru');
INSERT INTO nationalities(name) VALUES ('Paraguay');
INSERT INTO nationalities(name) VALUES ('Uruguay');
INSERT INTO nationalities(name) VALUES ('Venezuela');


/* cities | Ciudades */

/* Argentina */
INSERT INTO cities(name, country_id) VALUES ('Buenos Aires', 1);
INSERT INTO cities(name, country_id) VALUES ('Córdoba', 1);
INSERT INTO cities(name, country_id) VALUES ('La Plata', 1);
INSERT INTO cities(name, country_id) VALUES ('Mar del Plata', 1);
INSERT INTO cities(name, country_id) VALUES ('Mendoza', 1);
INSERT INTO cities(name, country_id) VALUES ('Rosario', 1);
INSERT INTO cities(name, country_id) VALUES ('Bariloche', 1);
INSERT INTO cities(name, country_id) VALUES ('Salta', 1);

/* Brasil */
INSERT INTO cities(name, country_id) VALUES ('Río de Janeiro', 2);
INSERT INTO cities(name, country_id) VALUES ('Brasilia', 2);
INSERT INTO cities(name, country_id) VALUES ('Belo Horizonte', 2);
INSERT INTO cities(name, country_id) VALUES ('Curitiba', 2);
INSERT INTO cities(name, country_id) VALUES ('Manus', 2);
INSERT INTO cities(name, country_id) VALUES ('Recife', 2);
INSERT INTO cities(name, country_id) VALUES ('Porto Alegre', 2);
INSERT INTO cities(name, country_id) VALUES ('Fortaleza', 2);

/* Colombia */
INSERT INTO cities(name, country_id) VALUES ('Bogotá', 3);
INSERT INTO cities(name, country_id) VALUES ('Medellín', 3);
INSERT INTO cities(name, country_id) VALUES ('Cali', 3);
INSERT INTO cities(name, country_id) VALUES ('Barranquilla', 3);
INSERT INTO cities(name, country_id) VALUES ('Cartagena de Indias', 3);

/* Chile */
INSERT INTO cities(name, country_id) VALUES ('Santiago', 4);
INSERT INTO cities(name, country_id) VALUES ('Concepción', 4);
INSERT INTO cities(name, country_id) VALUES ('Valparaíso', 4);
INSERT INTO cities(name, country_id) VALUES ('Viña del Mar', 4);
INSERT INTO cities(name, country_id) VALUES ('Iquique', 4);
INSERT INTO cities(name, country_id) VALUES ('Arica', 4);
INSERT INTO cities(name, country_id) VALUES ('Temuco', 4);

/* Ecuador */
INSERT INTO cities(name, country_id) VALUES ('Guayaquil', 5);
INSERT INTO cities(name, country_id) VALUES ('Quito', 5);
INSERT INTO cities(name, country_id) VALUES ('Cuenca', 5);
INSERT INTO cities(name, country_id) VALUES ('Loja', 5);
INSERT INTO cities(name, country_id) VALUES ('Ambato', 5);
INSERT INTO cities(name, country_id) VALUES ('Santo Domingo', 5);

/* Perú */
INSERT INTO cities(name, country_id) VALUES ('Arequipa', 6);
INSERT INTO cities(name, country_id) VALUES ('Cajamarca', 6);
INSERT INTO cities(name, country_id) VALUES ('Chiclayo', 6);
INSERT INTO cities(name, country_id) VALUES ('Lima', 6);
INSERT INTO cities(name, country_id) VALUES ('Trujillo', 6);
INSERT INTO cities(name, country_id) VALUES ('Tacna', 6);

/* Paraguay */
INSERT INTO cities(name, country_id) VALUES ('Asunción', 7);
INSERT INTO cities(name, country_id) VALUES ('Filadelfia', 7);
INSERT INTO cities(name, country_id) VALUES ('Areguá', 7);
INSERT INTO cities(name, country_id) VALUES ('Pilar', 7);
INSERT INTO cities(name, country_id) VALUES ('San Juan Bautista', 7);
INSERT INTO cities(name, country_id) VALUES ('Salto', 7);

/* Uruguay */
INSERT INTO cities(name, country_id) VALUES ('Montevideo', 8);
INSERT INTO cities(name, country_id) VALUES ('Punta del Este', 8);
INSERT INTO cities(name, country_id) VALUES ('Ciudad de la Costa', 8);
INSERT INTO cities(name, country_id) VALUES ('Las Piedras', 8);
INSERT INTO cities(name, country_id) VALUES ('Rivera', 8);
INSERT INTO cities(name, country_id) VALUES ('Paisandú', 8);


/* Venezuela */
INSERT INTO cities(name, country_id) VALUES ('Maturin', 9);
INSERT INTO cities(name, country_id) VALUES ('Coro', 9);
INSERT INTO cities(name, country_id) VALUES ('Ciudad Bolivar', 9);
INSERT INTO cities(name, country_id) VALUES ('Maracay', 9);
INSERT INTO cities(name, country_id) VALUES ('Margarita', 9);
INSERT INTO cities(name, country_id) VALUES ('Caracas', 9);


/* forescats | Previsión de Salud */
INSERT INTO forecasts(name) VALUES ('Banmédica S.A');
INSERT INTO forecasts(name) VALUES ('Chuquicamata Ltda.');
INSERT INTO forecasts(name) VALUES ('Colmena Golden Cross');
INSERT INTO forecasts(name) VALUES ('Consalud');
INSERT INTO forecasts(name) VALUES ('Cruz Blanca');
INSERT INTO forecasts(name) VALUES ('Cruz del Norte');
INSERT INTO forecasts(name) VALUES ('Fonasa');
INSERT INTO forecasts(name) VALUES ('Fundación Ltda.');
INSERT INTO forecasts(name) VALUES ('Fusat Ltda.');
INSERT INTO forecasts(name) VALUES ('Masvida S.A');
INSERT INTO forecasts(name) VALUES ('Óptima S.A');
INSERT INTO forecasts(name) VALUES ('Río Blanco Ltda.');
INSERT INTO forecasts(name) VALUES ('San Lorenzo Ltda.');
INSERT INTO forecasts(name) VALUES ('Vida Tres S.A');


/* ratings | Cargos */
INSERT INTO ratings(name) VALUES ('Administrador');
INSERT INTO ratings(name) VALUES ('Gerente General');
INSERT INTO ratings(name) VALUES ('Contador');
INSERT INTO ratings(name) VALUES ('Secretario');


/* type_certifications | Tipos de Certificaciones */
INSERT INTO type_certifications(name) VALUES ('Certificación Java');
INSERT INTO type_certifications(name) VALUES ('Certificación RIGGR');
INSERT INTO type_certifications(name) VALUES ('Certificación Conducción a la Defensiva');
INSERT INTO type_certifications(name) VALUES ('Certificación Cero Daño');


/* mutualities | mutualidades */
INSERT INTO mutualities(name) VALUES ('Instituto de Seguridad del Trabajo');
INSERT INTO mutualities(name) VALUES ('Asociación Chilena de Seguridad (ACHS)');
INSERT INTO mutualities(name) VALUES ('Mutual de Seguridad');
INSERT INTO mutualities(name) VALUES ('Instituto de Seguridad Laboral');
INSERT INTO mutualities(name) VALUES ('Sin Mutualidad');


/* pensions | AFP  */
INSERT INTO pensions(name) VALUES ('Hábitat');
INSERT INTO pensions(name) VALUES ('Capital');
INSERT INTO pensions(name) VALUES ('Modelo');
INSERT INTO pensions(name) VALUES ('CUPRUM');
INSERT INTO pensions(name) VALUES ('PlanVital');
INSERT INTO pensions(name) VALUES ('Provida');


/* type_exams | Tipos de Exámenes Preocupacionales */
INSERT INTO type_exams(name) VALUES ('Antropometría');
INSERT INTO type_exams(name) VALUES ('Test Visual');
INSERT INTO type_exams(name) VALUES ('Glicemia');
INSERT INTO type_exams(name) VALUES ('Hemograma');
INSERT INTO type_exams(name) VALUES ('Declaración de salud');


/* degrees | grados académicos */
INSERT INTO degrees(name) VALUES ('Técnico Nivel Medio');
INSERT INTO degrees(name) VALUES ('Técnico Nivel Profesional');
INSERT INTO degrees(name) VALUES ('Licenciado');
INSERT INTO degrees(name) VALUES ('Licenciado');
INSERT INTO degrees(name) VALUES ('Título Profesional');
INSERT INTO degrees(name) VALUES ('Magister');
INSERT INTO degrees(name) VALUES ('Doctorado');


/* type_disabilities | Typos de Discapacidad */
INSERT INTO type_disabilities(name) VALUES ('Lesión Medular');
INSERT INTO type_disabilities(name) VALUES ('Esclerosis Múltiple');
INSERT INTO type_disabilities(name) VALUES ('Paralisis Cerebral');
INSERT INTO type_disabilities(name) VALUES ('Mal de Parkinson');


/* type_diseases | Tipos de Enfermedades */
INSERT INTO type_diseases(name) VALUES ('Fatiga Visual');
INSERT INTO type_diseases(name) VALUES ('Dolor de Espalda');
INSERT INTO type_diseases(name) VALUES ('Estrés');
INSERT INTO type_diseases(name) VALUES ('El Síndrome de la Fatiga Crónica');
INSERT INTO type_diseases(name) VALUES ('Síndorme de Tunel Carpiano');

/* type_specialities | Tipos de Especialidades */
INSERT INTO type_specialities(name) VALUES ('Administración');
INSERT INTO type_specialities(name) VALUES ('Mecánica automotriz');
INSERT INTO type_specialities(name) VALUES ('Muebles y terminaciones de la madera');
INSERT INTO type_specialities(name) VALUES ('Vestuario y confección textil');

/* type_professional_licenses | Tipos de Licencias Profesionales */
INSERT INTO type_professional_licenses(name) VALUES ('Licencia A-1');
INSERT INTO type_professional_licenses(name) VALUES ('Licencia A-2');
INSERT INTO type_professional_licenses(name) VALUES ('Licencia B');
INSERT INTO type_professional_licenses(name) VALUES ('Licencia D');


/* professions | Profesiones */
INSERT INTO professions(name) VALUES ('Ingeniería Civil Industrial');
INSERT INTO professions(name) VALUES ('Derecho');
INSERT INTO professions(name) VALUES ('Ingeniería Informática');
INSERT INTO professions(name) VALUES ('Servicio Social');
INSERT INTO professions(name) VALUES ('Teatro');


/* relationships | Tipo Parentesco Familiar */
INSERT INTO relationships(name) VALUES ('Padre');
INSERT INTO relationships(name) VALUES ('Madre');
INSERT INTO relationships(name) VALUES ('Hijo');
INSERT INTO relationships(name) VALUES ('Tía');
INSERT INTO relationships(name) VALUES ('Primo');


/* type-institutions | Tipos de Institución */
INSERT INTO type_institutions(name) VALUES ('Universidad');
INSERT INTO type_institutions(name) VALUES ('Centro de Formación Técnica');
INSERT INTO type_institutions(name) VALUES ('Instituto Profesional');


/* institutions | Instituciones */
/* univerisities | universidades */
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica de Valparaíso", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Adolfo Ibáñez", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Academia de Humanismo Cristiano", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Adventista de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Alberto Hurtado", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Andrés Bello", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Arturo Prat", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Austral de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Autónoma de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Bernardo O'Higgins", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Bolivariana", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica Cardenal Raúl Silva Henríquez", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica de la Santísima Concepción", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica de Temuco", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica del Maule", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Católica del Norte", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Central de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Chileno Británica de Cultura", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Aconcagua", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Antofagasta", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Arte y Ciencias Sociales Arcis", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Artes, Ciencias y Comunicación Uniacc", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Atacama", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Ciencias de la Informática UCINF", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Concepción", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de La Frontera", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de La Serena", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Las Américas", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Los Andes", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Los Lagos", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Magallanes", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Playa Ancha de Ciencias de la Educación", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Santiago de Chile", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Talca", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Tarapacá", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Valparaíso", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad de Viña del Mar", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad del Bío-Bío", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad del Desarrollo", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad del Pacífico", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Diego Portales", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Finis Terrae", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Gabriela Mistral", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Iberoamericana de Ciencias y Tecnología, UNICYT", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Internacional Sek", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad La Araucana", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad La República", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Los Leones", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Mayor", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Metropolitana de Ciencias de la Educación", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Miguel de Cervantes", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Pedro de Valdivia", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad San Sebastián", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Santo Tomás", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Técnica Federico Santa María", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Tecnológica de Chile INACAP", 1);
INSERT INTO institutions(name, type_institution_id) VALUES("Universidad Tecnológica Metropolitana", 1);


/* cft */
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Alexander Von Humboldt", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT ALFA", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Alpes", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Andrés Bello", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Barros Arana ex Pitagoras", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Cámara de Comercio de Santiago", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CEDUC – UCN", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CEITEC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CENCO", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Centro de Enseñanza de Alta Costura Paulina Diard", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Centro Tecnológico Superior INFOMED", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CEPA de la III Región", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CEPONAL", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CRECIC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT CROWNLIET", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT de ENAC o de los Establecimientos Nacionales de Educación Caritas-Chile", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT de la Industria Gráfica o CFT INGRAF", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT de Tarapacá", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT del Medio Ambiente", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Diego Portales (Santiago sede 5)", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT DUOC UC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT EDUCAP", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Escuela Culinaria Francesa ECOLE", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Escuela de Altos Estudios de la Comunicación y Educación EACE", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Escuela de Artes Aplicadas Oficios del Fuego", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Escuela de Interpretes INCENI", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Escuela Superior de Administración de Negocios del Norte - ESANE DEL NORTE", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Estudio Profesor Valero", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Finning", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT ICEL", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT INACAP ex INACAP Santiago Centro", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto Central de Capacitación Educacional ICCE", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto de Secretariado INSEC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto INTEC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto Superior Alemán de Comercio INSALCO", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto Superior de Estudios Jurídicos CANON", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Instituto Tecnológico de Chile", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT IPROSEC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Jorge Alvarez Echeverría", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Juan Bohon", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT La Araucana", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT LAPLACE o de Estudios Superiores y Capacitación Profesional LAPLACE", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Los Leones", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Lota-Arauco", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Luis Alberto Vera", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Magnos", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Manpower", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Massachusetts", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT PRODATA", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT PROFASOC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT PROTEC", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT San Agustín de Talca", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Santo Tomás", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Simón Bolivar", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT SOEDUC Aconcagua", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT Teodoro Wickel Kluwen", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT U. Valpo", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT UCEVALPO", 2);
INSERT INTO institutions(name, type_institution_id) VALUES("CFT UDA", 2);


/* institutions */
INSERT INTO institutions(name, type_institution_id) VALUES("IP Adventista", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Agrario Adolfo Matthei", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Aiep", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Alemán Wilhelm Von Humboldt", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Alpes", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Arturo Prat", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP CAMPUS", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Carlos Casanueva", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP CENAFOM", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Chileno Norteamericano", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Chileno-Britanico de Cultura", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP CIISA", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Arte y Comunicación ARCOS", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Chile", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Ciencias de la Computación Acuario Data", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Ciencias y Artes INCACEA", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Ciencias y Educación Helen Keller", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de ENAC", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Los Ángeles", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP de Providencia", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP del Valle Central", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Diego Portales", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Dr. Virginio Gómez", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP DUOC UC", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP EATRI", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Escuela de Cine de Chile", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Escuela de Contadores Auditores de Santiago", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Escuela Moderna de Música", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Escuela Nacional de Relaciones Públicas", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Esucomex", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Hogar Catequístico", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Inacap", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Instituto de Estudios Bancarios Guillermo Subercaseaux", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Instituto Internacional de Artes Culinarias y Servicios", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Instituto Nacional del Fútbol", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Instituto Superior de Artes y Ciencias de la Comunicación", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP La Araucana", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Latinoamericano de Comercio Exterior", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Libertador de Los Andes", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Los Lagos", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Los Leones", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Luis Galdames", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Mar Futuro", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP PROJAZZ", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Santo Tomás", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Teatro la Casa", 3);
INSERT INTO institutions(name, type_institution_id) VALUES("IP Vertical Instituto Profesional", 3);


/* regions | Regiones */
INSERT INTO regions(name) VALUES ('Región de Arica y Parinacota');
INSERT INTO regions(name) VALUES ('Región de Tarapacá');
INSERT INTO regions(name) VALUES ('Región de Antofagasta');
INSERT INTO regions(name) VALUES ('Región de Atacama');
INSERT INTO regions(name) VALUES ('Región de Coquimbo');
INSERT INTO regions(name) VALUES ('Región de Valparaiso');
INSERT INTO regions(name) VALUES ('Región Metropolitana de Santiago');
INSERT INTO regions(name) VALUES ('Región de Libertador General Bernardo OHiggins');
INSERT INTO regions(name) VALUES ('Región del Maule');
INSERT INTO regions(name) VALUES ('Región del Biobío');
INSERT INTO regions(name) VALUES ('Región de La Araucanía');
INSERT INTO regions(name) VALUES ('Región de Los Ríos');
INSERT INTO regions(name) VALUES ('Región de Los Lagos');
INSERT INTO regions(name) VALUES ('Región de Aisén del General Carlos Ibáñez del Campo');
INSERT INTO regions(name) VALUES ('Región de Magallanes y de la Antártica Chilena');


/* provinces | Provincias */
INSERT INTO provinces(name, region_id) VALUES('Arica',1);
INSERT INTO provinces(name, region_id) VALUES('Parinacota',1);
INSERT INTO provinces(name, region_id) VALUES('Iquique',2);
INSERT INTO provinces(name, region_id) VALUES('El Tamarugal',2);
INSERT INTO provinces(name, region_id) VALUES('Antofagasta',3);
INSERT INTO provinces(name, region_id) VALUES('El Loa',3);
INSERT INTO provinces(name, region_id) VALUES('Tocopilla',3);
INSERT INTO provinces(name, region_id) VALUES('Chañaral',4);
INSERT INTO provinces(name, region_id) VALUES('Copiapó',4);
INSERT INTO provinces(name, region_id) VALUES('Huasco',4);
INSERT INTO provinces(name, region_id) VALUES('Choapa',5);
INSERT INTO provinces(name, region_id) VALUES('Elqui',5);
INSERT INTO provinces(name, region_id) VALUES('Limarí',5);
INSERT INTO provinces(name, region_id) VALUES('Isla de Pascua',6);
INSERT INTO provinces(name, region_id) VALUES('Los Andes',6);
INSERT INTO provinces(name, region_id) VALUES('Petorca',6);
INSERT INTO provinces(name, region_id) VALUES('Quillota',6);
INSERT INTO provinces(name, region_id) VALUES('San Antonio',6);
INSERT INTO provinces(name, region_id) VALUES('San Felipe de Aconcagua',6);
INSERT INTO provinces(name, region_id) VALUES('Valparaiso',6);
INSERT INTO provinces(name, region_id) VALUES('Chacabuco',7);
INSERT INTO provinces(name, region_id) VALUES('Cordillera',7);
INSERT INTO provinces(name, region_id) VALUES('Maipo',7);
INSERT INTO provinces(name, region_id) VALUES('Melipilla',7);
INSERT INTO provinces(name, region_id) VALUES('Santiago',7);
INSERT INTO provinces(name, region_id) VALUES('Talagante',7);
INSERT INTO provinces(name, region_id) VALUES('Cachapoal',8);
INSERT INTO provinces(name, region_id) VALUES('Cardenal Caro',8);
INSERT INTO provinces(name, region_id) VALUES('Colchagua',8);
INSERT INTO provinces(name, region_id) VALUES('Cauquenes',9);
INSERT INTO provinces(name, region_id) VALUES('Curicó',9);
INSERT INTO provinces(name, region_id) VALUES('Linares',9);
INSERT INTO provinces(name, region_id) VALUES('Talca',9);
INSERT INTO provinces(name, region_id) VALUES('Arauco',10);
INSERT INTO provinces(name, region_id) VALUES('Bio Bío',10);
INSERT INTO provinces(name, region_id) VALUES('Concepción',10);
INSERT INTO provinces(name, region_id) VALUES('Ñuble',10);
INSERT INTO provinces(name, region_id) VALUES('Cautín',11);
INSERT INTO provinces(name, region_id) VALUES('Malleco',11);
INSERT INTO provinces(name, region_id) VALUES('Valdivia',12);
INSERT INTO provinces(name, region_id) VALUES('Ranco',12);
INSERT INTO provinces(name, region_id) VALUES('Chiloé',13);
INSERT INTO provinces(name, region_id) VALUES('Llanquihue',13);
INSERT INTO provinces(name, region_id) VALUES('Osorno',13);
INSERT INTO provinces(name, region_id) VALUES('Palena',13);
INSERT INTO provinces(name, region_id) VALUES('Aisén',14);
INSERT INTO provinces(name, region_id) VALUES('Capitán Prat',14);
INSERT INTO provinces(name, region_id) VALUES('Coihaique',14);
INSERT INTO provinces(name, region_id) VALUES('General Carrera',14);
INSERT INTO provinces(name, region_id) VALUES('Antártica Chilena',15);
INSERT INTO provinces(name, region_id) VALUES('Magallanes',15);
INSERT INTO provinces(name, region_id) VALUES('Tierra del Fuego',15);
INSERT INTO provinces(name, region_id) VALUES('Última Esperanza',15);


/* communes | Comunas */
INSERT INTO communes(name, province_id) VALUES('Arica',1);
INSERT INTO communes(name, province_id) VALUES('Camarones',1);
INSERT INTO communes(name, province_id) VALUES('General Lagos',2);
INSERT INTO communes(name, province_id) VALUES('Putre',2);
INSERT INTO communes(name, province_id) VALUES('Alto Hospicio',3);
INSERT INTO communes(name, province_id) VALUES('Iquique',3);
INSERT INTO communes(name, province_id) VALUES('Camiña',4);
INSERT INTO communes(name, province_id) VALUES('Colchane',4);
INSERT INTO communes(name, province_id) VALUES('Huara',4);
INSERT INTO communes(name, province_id) VALUES('Pica',4);
INSERT INTO communes(name, province_id) VALUES('Pozo Almonte',4);
INSERT INTO communes(name, province_id) VALUES('Antofagasta',5);
INSERT INTO communes(name, province_id) VALUES('Mejillones',5);
INSERT INTO communes(name, province_id) VALUES('Sierra Gorda',5);
INSERT INTO communes(name, province_id) VALUES('Taltal',5);
INSERT INTO communes(name, province_id) VALUES('Calama',6);
INSERT INTO communes(name, province_id) VALUES('Ollague',6);
INSERT INTO communes(name, province_id) VALUES('San Pedro de Atacama',6);
INSERT INTO communes(name, province_id) VALUES('María Elena',7);
INSERT INTO communes(name, province_id) VALUES('Tocopilla',7);
INSERT INTO communes(name, province_id) VALUES('Chañaral',8);
INSERT INTO communes(name, province_id) VALUES('Diego de Almagro',8);
INSERT INTO communes(name, province_id) VALUES('Caldera',9);
INSERT INTO communes(name, province_id) VALUES('Copiapó',9);
INSERT INTO communes(name, province_id) VALUES('Tierra Amarilla',9);
INSERT INTO communes(name, province_id) VALUES('Alto del Carmen',10);
INSERT INTO communes(name, province_id) VALUES('Freirina',10);
INSERT INTO communes(name, province_id) VALUES('Huasco',10);
INSERT INTO communes(name, province_id) VALUES('Vallenar',10);
INSERT INTO communes(name, province_id) VALUES('Canela',11);
INSERT INTO communes(name, province_id) VALUES('Illapel',11);
INSERT INTO communes(name, province_id) VALUES('Los Vilos',11);
INSERT INTO communes(name, province_id) VALUES('Salamanca',11);
INSERT INTO communes(name, province_id) VALUES('Andacollo',12);
INSERT INTO communes(name, province_id) VALUES('Coquimbo',12);
INSERT INTO communes(name, province_id) VALUES('La Higuera',12);
INSERT INTO communes(name, province_id) VALUES('La Serena',12);
INSERT INTO communes(name, province_id) VALUES('Paihuaco',12);
INSERT INTO communes(name, province_id) VALUES('Vicuña',12);
INSERT INTO communes(name, province_id) VALUES('Combarbalá',13);
INSERT INTO communes(name, province_id) VALUES('Monte Patria',13);
INSERT INTO communes(name, province_id) VALUES('Ovalle',13);
INSERT INTO communes(name, province_id) VALUES('Punitaqui',13);
INSERT INTO communes(name, province_id) VALUES('Río Hurtado',13);
INSERT INTO communes(name, province_id) VALUES('Isla de Pascua',14);
INSERT INTO communes(name, province_id) VALUES('Calle Larga',15);
INSERT INTO communes(name, province_id) VALUES('Los Andes',15);
INSERT INTO communes(name, province_id) VALUES('Rinconada',15);
INSERT INTO communes(name, province_id) VALUES('San Esteban',15);
INSERT INTO communes(name, province_id) VALUES('La Ligua',16);
INSERT INTO communes(name, province_id) VALUES('Papudo',16);
INSERT INTO communes(name, province_id) VALUES('Petorca',16);
INSERT INTO communes(name, province_id) VALUES('Zapallar',16);
INSERT INTO communes(name, province_id) VALUES('Hijuelas',17);
INSERT INTO communes(name, province_id) VALUES('La Calera',17);
INSERT INTO communes(name, province_id) VALUES('La Cruz',17);
INSERT INTO communes(name, province_id) VALUES('Limache',17);
INSERT INTO communes(name, province_id) VALUES('Nogales',17);
INSERT INTO communes(name, province_id) VALUES('Olmué',17);
INSERT INTO communes(name, province_id) VALUES('Quillota',17);
INSERT INTO communes(name, province_id) VALUES('Algarrobo',18);
INSERT INTO communes(name, province_id) VALUES('Cartagena',18);
INSERT INTO communes(name, province_id) VALUES('El Quisco',18);
INSERT INTO communes(name, province_id) VALUES('El Tabo',18);
INSERT INTO communes(name, province_id) VALUES('San Antonio',18);
INSERT INTO communes(name, province_id) VALUES('Santo Domingo',18);
INSERT INTO communes(name, province_id) VALUES('Catemu',19);
INSERT INTO communes(name, province_id) VALUES('Llaillay',19);
INSERT INTO communes(name, province_id) VALUES('Panquehue',19);
INSERT INTO communes(name, province_id) VALUES('Putaendo',19);
INSERT INTO communes(name, province_id) VALUES('San Felipe',19);
INSERT INTO communes(name, province_id) VALUES('Santa María',19);
INSERT INTO communes(name, province_id) VALUES('Casablanca',20);
INSERT INTO communes(name, province_id) VALUES('Concón',20);
INSERT INTO communes(name, province_id) VALUES('Juan Fernández',20);
INSERT INTO communes(name, province_id) VALUES('Puchuncaví',20);
INSERT INTO communes(name, province_id) VALUES('Quilpué',20);
INSERT INTO communes(name, province_id) VALUES('Quintero',20);
INSERT INTO communes(name, province_id) VALUES('Valparaíso',20);
INSERT INTO communes(name, province_id) VALUES('Villa Alemana',20);
INSERT INTO communes(name, province_id) VALUES('Viña del Mar',20);
INSERT INTO communes(name, province_id) VALUES('Colina',21);
INSERT INTO communes(name, province_id) VALUES('Lampa',21);
INSERT INTO communes(name, province_id) VALUES('Tiltil',21);
INSERT INTO communes(name, province_id) VALUES('Pirque',22);
INSERT INTO communes(name, province_id) VALUES('Puente Alto',22);
INSERT INTO communes(name, province_id) VALUES('San José de Maipo',22);
INSERT INTO communes(name, province_id) VALUES('Buin',23);
INSERT INTO communes(name, province_id) VALUES('Calera de Tango',23);
INSERT INTO communes(name, province_id) VALUES('Paine',23);
INSERT INTO communes(name, province_id) VALUES('San Bernardo',23);
INSERT INTO communes(name, province_id) VALUES('Alhué',24);
INSERT INTO communes(name, province_id) VALUES('Curacaví',24);
INSERT INTO communes(name, province_id) VALUES('María Pinto',24);
INSERT INTO communes(name, province_id) VALUES('Melipilla',24);
INSERT INTO communes(name, province_id) VALUES('San Pedro',24);
INSERT INTO communes(name, province_id) VALUES('Cerrillos',25);
INSERT INTO communes(name, province_id) VALUES('Cerro Navia',25);
INSERT INTO communes(name, province_id) VALUES('Conchalí',25);
INSERT INTO communes(name, province_id) VALUES('El Bosque',25);
INSERT INTO communes(name, province_id) VALUES('Estación Central',25);
INSERT INTO communes(name, province_id) VALUES('Huechuraba',25);
INSERT INTO communes(name, province_id) VALUES('Independencia',25);
INSERT INTO communes(name, province_id) VALUES('La Cisterna',25);
INSERT INTO communes(name, province_id) VALUES('La Granja',25);
INSERT INTO communes(name, province_id) VALUES('La Florida',25);
INSERT INTO communes(name, province_id) VALUES('La Pintana',25);
INSERT INTO communes(name, province_id) VALUES('La Reina',25);
INSERT INTO communes(name, province_id) VALUES('Las Condes',25);
INSERT INTO communes(name, province_id) VALUES('Lo Barnechea',25);
INSERT INTO communes(name, province_id) VALUES('Lo Espejo',25);
INSERT INTO communes(name, province_id) VALUES('Lo Prado',25);
INSERT INTO communes(name, province_id) VALUES('Macul',25);
INSERT INTO communes(name, province_id) VALUES('Maipú',25);
INSERT INTO communes(name, province_id) VALUES('Ñuñoa',25);
INSERT INTO communes(name, province_id) VALUES('Pedro Aguirre Cerda',25);
INSERT INTO communes(name, province_id) VALUES('Peñalolén',25);
INSERT INTO communes(name, province_id) VALUES('Providencia',25);
INSERT INTO communes(name, province_id) VALUES('Pudahuel',25);
INSERT INTO communes(name, province_id) VALUES('Quilicura',25);
INSERT INTO communes(name, province_id) VALUES('Quinta Normal',25);
INSERT INTO communes(name, province_id) VALUES('Recoleta',25);
INSERT INTO communes(name, province_id) VALUES('Renca',25);
INSERT INTO communes(name, province_id) VALUES('San Miguel',25);
INSERT INTO communes(name, province_id) VALUES('San Joaquín',25);
INSERT INTO communes(name, province_id) VALUES('San Ramón',25);
INSERT INTO communes(name, province_id) VALUES('Santiago',25);
INSERT INTO communes(name, province_id) VALUES('Vitacura',25);
INSERT INTO communes(name, province_id) VALUES('El Monte',26);
INSERT INTO communes(name, province_id) VALUES('Isla de Maipo',26);
INSERT INTO communes(name, province_id) VALUES('Padre Hurtado',26);
INSERT INTO communes(name, province_id) VALUES('Peñaflor',26);
INSERT INTO communes(name, province_id) VALUES('Talagante',26);
INSERT INTO communes(name, province_id) VALUES('Codegua',27);
INSERT INTO communes(name, province_id) VALUES('Coínco',27);
INSERT INTO communes(name, province_id) VALUES('Coltauco',27);
INSERT INTO communes(name, province_id) VALUES('Doñihue',27);
INSERT INTO communes(name, province_id) VALUES('Graneros',27);
INSERT INTO communes(name, province_id) VALUES('Las Cabras',27);
INSERT INTO communes(name, province_id) VALUES('Machalí',27);
INSERT INTO communes(name, province_id) VALUES('Malloa',27);
INSERT INTO communes(name, province_id) VALUES('Mostazal',27);
INSERT INTO communes(name, province_id) VALUES('Olivar',27);
INSERT INTO communes(name, province_id) VALUES('Peumo',27);
INSERT INTO communes(name, province_id) VALUES('Pichidegua',27);
INSERT INTO communes(name, province_id) VALUES('Quinta de Tilcoco',27);
INSERT INTO communes(name, province_id) VALUES('Rancagua',27);
INSERT INTO communes(name, province_id) VALUES('Rengo',27);
INSERT INTO communes(name, province_id) VALUES('Requínoa',27);
INSERT INTO communes(name, province_id) VALUES('San Vicente de Tagua Tagua',27);
INSERT INTO communes(name, province_id) VALUES('La Estrella',28);
INSERT INTO communes(name, province_id) VALUES('Litueche',28);
INSERT INTO communes(name, province_id) VALUES('Marchihue',28);
INSERT INTO communes(name, province_id) VALUES('Navidad',28);
INSERT INTO communes(name, province_id) VALUES('Peredones',28);
INSERT INTO communes(name, province_id) VALUES('Pichilemu',28);
INSERT INTO communes(name, province_id) VALUES('Chépica',29);
INSERT INTO communes(name, province_id) VALUES('Chimbarongo',29);
INSERT INTO communes(name, province_id) VALUES('Lolol',29);
INSERT INTO communes(name, province_id) VALUES('Nancagua',29);
INSERT INTO communes(name, province_id) VALUES('Palmilla',29);
INSERT INTO communes(name, province_id) VALUES('Peralillo',29);
INSERT INTO communes(name, province_id) VALUES('Placilla',29);
INSERT INTO communes(name, province_id) VALUES('Pumanque',29);
INSERT INTO communes(name, province_id) VALUES('San Fernando',29);
INSERT INTO communes(name, province_id) VALUES('Santa Cruz',29);
INSERT INTO communes(name, province_id) VALUES('Cauquenes',30);
INSERT INTO communes(name, province_id) VALUES('Chanco',30);
INSERT INTO communes(name, province_id) VALUES('Pelluhue',30);
INSERT INTO communes(name, province_id) VALUES('Curicó',31);
INSERT INTO communes(name, province_id) VALUES('Hualañé',31);
INSERT INTO communes(name, province_id) VALUES('Licantén',31);
INSERT INTO communes(name, province_id) VALUES('Molina',31);
INSERT INTO communes(name, province_id) VALUES('Rauco',31);
INSERT INTO communes(name, province_id) VALUES('Romeral',31);
INSERT INTO communes(name, province_id) VALUES('Sagrada Familia',31);
INSERT INTO communes(name, province_id) VALUES('Teno',31);
INSERT INTO communes(name, province_id) VALUES('Vichuquén',31);
INSERT INTO communes(name, province_id) VALUES('Colbún',32);
INSERT INTO communes(name, province_id) VALUES('Linares',32);
INSERT INTO communes(name, province_id) VALUES('Longaví',32);
INSERT INTO communes(name, province_id) VALUES('Parral',32);
INSERT INTO communes(name, province_id) VALUES('Retiro',32);
INSERT INTO communes(name, province_id) VALUES('San Javier',32);
INSERT INTO communes(name, province_id) VALUES('Villa Alegre',32);
INSERT INTO communes(name, province_id) VALUES('Yerbas Buenas',32);
INSERT INTO communes(name, province_id) VALUES('Constitución',33);
INSERT INTO communes(name, province_id) VALUES('Curepto',33);
INSERT INTO communes(name, province_id) VALUES('Empedrado',33);
INSERT INTO communes(name, province_id) VALUES('Maule',33);
INSERT INTO communes(name, province_id) VALUES('Pelarco',33);
INSERT INTO communes(name, province_id) VALUES('Pencahue',33);
INSERT INTO communes(name, province_id) VALUES('Río Claro',33);
INSERT INTO communes(name, province_id) VALUES('San Clemente',33);
INSERT INTO communes(name, province_id) VALUES('San Rafael',33);
INSERT INTO communes(name, province_id) VALUES('Talca',33);
INSERT INTO communes(name, province_id) VALUES('Arauco',34);
INSERT INTO communes(name, province_id) VALUES('Cañete',34);
INSERT INTO communes(name, province_id) VALUES('Contulmo',34);
INSERT INTO communes(name, province_id) VALUES('Curanilahue',34);
INSERT INTO communes(name, province_id) VALUES('Lebu',34);
INSERT INTO communes(name, province_id) VALUES('Los Álamos',34);
INSERT INTO communes(name, province_id) VALUES('Tirúa',34);
INSERT INTO communes(name, province_id) VALUES('Alto Biobío',35);
INSERT INTO communes(name, province_id) VALUES('Antuco',35);
INSERT INTO communes(name, province_id) VALUES('Cabrero',35);
INSERT INTO communes(name, province_id) VALUES('Laja',35);
INSERT INTO communes(name, province_id) VALUES('Los Ángeles',35);
INSERT INTO communes(name, province_id) VALUES('Mulchén',35);
INSERT INTO communes(name, province_id) VALUES('Nacimiento',35);
INSERT INTO communes(name, province_id) VALUES('Negrete',35);
INSERT INTO communes(name, province_id) VALUES('Quilaco',35);
INSERT INTO communes(name, province_id) VALUES('Quilleco',35);
INSERT INTO communes(name, province_id) VALUES('San Rosendo',35);
INSERT INTO communes(name, province_id) VALUES('Santa Bárbara',35);
INSERT INTO communes(name, province_id) VALUES('Tucapel',35);
INSERT INTO communes(name, province_id) VALUES('Yumbel',35);
INSERT INTO communes(name, province_id) VALUES('Chiguayante',36);
INSERT INTO communes(name, province_id) VALUES('Concepción',36);
INSERT INTO communes(name, province_id) VALUES('Coronel',36);
INSERT INTO communes(name, province_id) VALUES('Florida',36);
INSERT INTO communes(name, province_id) VALUES('Hualpén',36);
INSERT INTO communes(name, province_id) VALUES('Hualqui',36);
INSERT INTO communes(name, province_id) VALUES('Lota',36);
INSERT INTO communes(name, province_id) VALUES('Penco',36);
INSERT INTO communes(name, province_id) VALUES('San Pedro de La Paz',36);
INSERT INTO communes(name, province_id) VALUES('Santa Juana',36);
INSERT INTO communes(name, province_id) VALUES('Talcahuano',36);
INSERT INTO communes(name, province_id) VALUES('Tomé',36);
INSERT INTO communes(name, province_id) VALUES('Bulnes',37);
INSERT INTO communes(name, province_id) VALUES('Chillán',37);
INSERT INTO communes(name, province_id) VALUES('Chillán Viejo',37);
INSERT INTO communes(name, province_id) VALUES('Cobquecura',37);
INSERT INTO communes(name, province_id) VALUES('Coelemu',37);
INSERT INTO communes(name, province_id) VALUES('Coihueco',37);
INSERT INTO communes(name, province_id) VALUES('El Carmen',37);
INSERT INTO communes(name, province_id) VALUES('Ninhue',37);
INSERT INTO communes(name, province_id) VALUES('Ñiquen',37);
INSERT INTO communes(name, province_id) VALUES('Pemuco',37);
INSERT INTO communes(name, province_id) VALUES('Pinto',37);
INSERT INTO communes(name, province_id) VALUES('Portezuelo',37);
INSERT INTO communes(name, province_id) VALUES('Quillón',37);
INSERT INTO communes(name, province_id) VALUES('Quirihue',37);
INSERT INTO communes(name, province_id) VALUES('Ránquil',37);
INSERT INTO communes(name, province_id) VALUES('San Carlos',37);
INSERT INTO communes(name, province_id) VALUES('San Fabián',37);
INSERT INTO communes(name, province_id) VALUES('San Ignacio',37);
INSERT INTO communes(name, province_id) VALUES('San Nicolás',37);
INSERT INTO communes(name, province_id) VALUES('Treguaco',37);
INSERT INTO communes(name, province_id) VALUES('Yungay',37);
INSERT INTO communes(name, province_id) VALUES('Carahue',38);
INSERT INTO communes(name, province_id) VALUES('Cholchol',38);
INSERT INTO communes(name, province_id) VALUES('Cunco',38);
INSERT INTO communes(name, province_id) VALUES('Curarrehue',38);
INSERT INTO communes(name, province_id) VALUES('Freire',38);
INSERT INTO communes(name, province_id) VALUES('Galvarino',38);
INSERT INTO communes(name, province_id) VALUES('Gorbea',38);
INSERT INTO communes(name, province_id) VALUES('Lautaro',38);
INSERT INTO communes(name, province_id) VALUES('Loncoche',38);
INSERT INTO communes(name, province_id) VALUES('Melipeuco',38);
INSERT INTO communes(name, province_id) VALUES('Nueva Imperial',38);
INSERT INTO communes(name, province_id) VALUES('Padre Las Casas',38);
INSERT INTO communes(name, province_id) VALUES('Perquenco',38);
INSERT INTO communes(name, province_id) VALUES('Pitrufquén',38);
INSERT INTO communes(name, province_id) VALUES('Pucón',38);
INSERT INTO communes(name, province_id) VALUES('Saavedra',38);
INSERT INTO communes(name, province_id) VALUES('Temuco',38);
INSERT INTO communes(name, province_id) VALUES('Teodoro Schmidt',38);
INSERT INTO communes(name, province_id) VALUES('Toltén',38);
INSERT INTO communes(name, province_id) VALUES('Vilcún',38);
INSERT INTO communes(name, province_id) VALUES('Villarrica',38);
INSERT INTO communes(name, province_id) VALUES('Angol',39);
INSERT INTO communes(name, province_id) VALUES('Collipulli',39);
INSERT INTO communes(name, province_id) VALUES('Curacautín',39);
INSERT INTO communes(name, province_id) VALUES('Ercilla',39);
INSERT INTO communes(name, province_id) VALUES('Lonquimay',39);
INSERT INTO communes(name, province_id) VALUES('Los Sauces',39);
INSERT INTO communes(name, province_id) VALUES('Lumaco',39);
INSERT INTO communes(name, province_id) VALUES('Purén',39);
INSERT INTO communes(name, province_id) VALUES('Renaico',39);
INSERT INTO communes(name, province_id) VALUES('Traiguén',39);
INSERT INTO communes(name, province_id) VALUES('Victoria',39);
INSERT INTO communes(name, province_id) VALUES('Corral',40);
INSERT INTO communes(name, province_id) VALUES('Lanco',40);
INSERT INTO communes(name, province_id) VALUES('Los Lagos',40);
INSERT INTO communes(name, province_id) VALUES('Máfil',40);
INSERT INTO communes(name, province_id) VALUES('Mariquina',40);
INSERT INTO communes(name, province_id) VALUES('Paillaco',40);
INSERT INTO communes(name, province_id) VALUES('Panguipulli',40);
INSERT INTO communes(name, province_id) VALUES('Valdivia',40);
INSERT INTO communes(name, province_id) VALUES('Futrono',41);
INSERT INTO communes(name, province_id) VALUES('La Unión',41);
INSERT INTO communes(name, province_id) VALUES('Lago Ranco',41);
INSERT INTO communes(name, province_id) VALUES('Río Bueno',41);
INSERT INTO communes(name, province_id) VALUES('Ancud',42);
INSERT INTO communes(name, province_id) VALUES('Castro',42);
INSERT INTO communes(name, province_id) VALUES('Chonchi',42);
INSERT INTO communes(name, province_id) VALUES('Curaco de Vélez',42);
INSERT INTO communes(name, province_id) VALUES('Dalcahue',42);
INSERT INTO communes(name, province_id) VALUES('Puqueldón',42);
INSERT INTO communes(name, province_id) VALUES('Queilén',42);
INSERT INTO communes(name, province_id) VALUES('Quemchi',42);
INSERT INTO communes(name, province_id) VALUES('Quellón',42);
INSERT INTO communes(name, province_id) VALUES('Quinchao',42);
INSERT INTO communes(name, province_id) VALUES('Calbuco',43);
INSERT INTO communes(name, province_id) VALUES('Cochamó',43);
INSERT INTO communes(name, province_id) VALUES('Fresia',43);
INSERT INTO communes(name, province_id) VALUES('Frutillar',43);
INSERT INTO communes(name, province_id) VALUES('Llanquihue',43);
INSERT INTO communes(name, province_id) VALUES('Los Muermos',43);
INSERT INTO communes(name, province_id) VALUES('Maullín',43);
INSERT INTO communes(name, province_id) VALUES('Puerto Montt',43);
INSERT INTO communes(name, province_id) VALUES('Puerto Varas',43);
INSERT INTO communes(name, province_id) VALUES('Osorno',44);
INSERT INTO communes(name, province_id) VALUES('Puero Octay',44);
INSERT INTO communes(name, province_id) VALUES('Purranque',44);
INSERT INTO communes(name, province_id) VALUES('Puyehue',44);
INSERT INTO communes(name, province_id) VALUES('Río Negro',44);
INSERT INTO communes(name, province_id) VALUES('San Juan de la Costa',44);
INSERT INTO communes(name, province_id) VALUES('San Pablo',44);
INSERT INTO communes(name, province_id) VALUES('Chaitén',45);
INSERT INTO communes(name, province_id) VALUES('Futaleufú',45);
INSERT INTO communes(name, province_id) VALUES('Hualaihué',45);
INSERT INTO communes(name, province_id) VALUES('Palena',45);
INSERT INTO communes(name, province_id) VALUES('Aisén',46);
INSERT INTO communes(name, province_id) VALUES('Cisnes',46);
INSERT INTO communes(name, province_id) VALUES('Guaitecas',46);
INSERT INTO communes(name, province_id) VALUES('Cochrane',47);
INSERT INTO communes(name, province_id) VALUES('Ohiggins',47);
INSERT INTO communes(name, province_id) VALUES('Tortel',47);
INSERT INTO communes(name, province_id) VALUES('Coihaique',48);
INSERT INTO communes(name, province_id) VALUES('Lago Verde',48);
INSERT INTO communes(name, province_id) VALUES('Chile Chico',49);
INSERT INTO communes(name, province_id) VALUES('Río Ibáñez',49);
INSERT INTO communes(name, province_id) VALUES('Antártica',50);
INSERT INTO communes(name, province_id) VALUES('Cabo de Hornos',50);
INSERT INTO communes(name, province_id) VALUES('Laguna Blanca',51);
INSERT INTO communes(name, province_id) VALUES('Punta Arenas',51);
INSERT INTO communes(name, province_id) VALUES('Río Verde',51);
INSERT INTO communes(name, province_id) VALUES('San Gregorio',51);
INSERT INTO communes(name, province_id) VALUES('Porvenir',52);
INSERT INTO communes(name, province_id) VALUES('Primavera',52);
INSERT INTO communes(name, province_id) VALUES('Timaukel',52);
INSERT INTO communes(name, province_id) VALUES('Natales',53);
INSERT INTO communes(name, province_id) VALUES('Torres del Paine',53);


/* type_vehicles | Tipos de Vehículos */
INSERT INTO type_vehicles(name) VALUES('Bus');
INSERT INTO type_vehicles(name) VALUES('Moto');
INSERT INTO type_vehicles(name) VALUES('Auto');

/* trademarks | Marcas */
INSERT INTO trademarks(name) VALUES('Mercedes Benz');
INSERT INTO trademarks(name) VALUES('Volvo');
INSERT INTO trademarks(name) VALUES('Scannia');
INSERT INTO trademarks(name) VALUES('Honda');

/* model_vehicle | Modelos de Vehículos */
INSERT INTO model_vehicles(trademark_id, name) VALUES(1, 'Caio Foz');
INSERT INTO model_vehicles(trademark_id, name) VALUES(1, 'Caio Mondego H');
INSERT INTO model_vehicles(trademark_id, name) VALUES(1, 'Metalpar Tronador');
INSERT INTO model_vehicles(trademark_id, name) VALUES(2, 'Marcopolo Viale BRS');
INSERT INTO model_vehicles(trademark_id, name) VALUES(2, 'Caio Mondego');
INSERT INTO model_vehicles(trademark_id, name) VALUES(3, 'Marcopolo Gran Viale LE');

/* terminals | Terminales */
INSERT INTO terminals(name) VALUES('Terminal Norte');
INSERT INTO terminals(name) VALUES('Terminal Oriente');
INSERT INTO terminals(name) VALUES('Terminal Sur');

/* areas | Áreas */
INSERT INTO areas(terminal_id, name) VALUES(1, 'COF');
INSERT INTO areas(terminal_id, name) VALUES(1, 'Mantención');
INSERT INTO areas(terminal_id, name) VALUES(1, 'Gerencia');
