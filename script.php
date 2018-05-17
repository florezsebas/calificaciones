$jor = new Jornada;
$jor->nombre = "Jornada manana";
$jor->hora_inicio = "2018:05:17 07:30:00";
$jor->hora_fin = "2018:05:17 07:30:00";
$jor->save();

$gra = new Grado;
$gra->nombre = "Septimo";
$gra->save();

$grp = new Grupo;
$grp->nombre = "A";
$grp->jornada_id = 1;
$grp->grado_id = 1;

$acu = new Acudiente;
$acu->codigo = "1";
$acu->nombres = "Carlos Alberto";
$acu->apellidos = "Acosta Castano";
$acu->email = "caralb@gmail.com";
$acu->password = bcrypt('salado');
$acu->save();

$est = new Estudiante;
$est->codigo = "1";
$est->codigo_acudiente = "1";
$est->grupo_id = 1;
$est->nombres = "Carlos Mario";
$est->apellidos = "Otalvaro Garcia";
$est->email = "otamar@gmail.com";
$est->password = bcrypt('senador');
$est->save();
