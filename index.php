<?php
require_once('./redis.php');
$redis = new redis_cli ( 'redis', 6379 );
function addVote() {
	global $redis;
	$equipo = $_POST["equipo"];
	$redis->cmd('INCR',$equipo)->set();
	echo "<header>Gracias por participar. Puedes votar las veces que quieras.</header>";
}
function showVotes() {
	global $redis;

	$votos_wilstermann = $redis->cmd('GET','wilstermann')->get();
	$votos_wilstermann = $votos_wilstermann >= 1 ? $votos_wilstermann : 0 ;

	$votos_aurora = $redis->cmd('GET','aurora')->get();
	$votos_aurora = $votos_aurora >= 1 ? $votos_aurora : 0 ;

	echo "<li>$votos_wilstermann - Wilstermann</li>";
	echo "<li>$votos_aurora - Aurora</li>";
}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Wilstermann vs. Aurora</title>
		<link rel="stylesheet" href="normalize.min.css" media="screen">
		<link rel="stylesheet" href="estilos.css" media="screen">
	</head>
	<body>
		<?php if (!empty($_POST["equipo"])) {addVote();} ?>
		<div id='wrapper'>
			<h1>Wilstermann vs. Aurora</h1>
			<ul>
			<form class="" action="/" method="post">
				<li class="wilstermann">
					<input id="wilstermann" type="radio" name="equipo" onclick="this.form.submit();" value="wilstermann">
					<label for="wilstermann">Wilstermann</label>
				</li>
				<li class="aurora">
					<input id="aurora" type="radio" name="equipo" onclick="this.form.submit();" value="aurora">
					<label for="aurora">Aurora</label>
				</li>
			</form>
			</ul>
			<h2>Resultados de la votación</h2>
			<ul>
				<?php showVotes(); ?>
			</ul>
			<footer>
				<p>
					Procesado por el contenedor con ID <br>
					<?php echo getenv('HOSTNAME');?>
				</p>
			</footer>
		</div>
	</body>
</html>
