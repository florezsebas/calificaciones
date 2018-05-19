$jor = new App\Jornada;
$jor->nombre = "Jornada manana";
$jor->hora_inicio = "2018:05:17 07:30:00";
$jor->hora_fin = "2018:05:17 07:30:00";
$jor->save();

$gra = new App\Grado;
$gra->nombre = "Septimo";
$gra->save();

$grp = new App\Grupo;
$grp->nombre = "A";
$grp->jornada_id = 1;
$grp->grado_id = 1;
$grp->save();

$acu = new App\Acudiente;
$acu->codigo = "000";
$acu->nombres = "Carlos Alberto";
$acu->apellidos = "Acosta Castano";
$acu->email = "caralb@gmail.com";
$acu->password = bcrypt('salado');
$acu->save();

$est = new App\Estudiante;
$est->codigo = "111";
$est->codigo_acudiente = "1";
$est->grupo_id = 1;
$est->nombres = "Carlos Mario";
$est->apellidos = "Otalvaro Garcia";
$est->email = "otamar@gmail.com";
$est->password = bcrypt('senador');
$est->save();
