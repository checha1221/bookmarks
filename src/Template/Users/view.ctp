<div class="well">
<h2> </h2>
 	<br>
 	<dl>
 	<dt>Nombre</dt>
 	<dd>
 	<?= $user->first_name ?>
 	&nbsp;
 	</dd>
 	<br>

 	<dt>Apellido</dt>
 	<dd>
 	<?= $user->last_name ?>
 	&nbsp;
 	</dd>
 	<br>
 	<dt>Correo electronico </dt>
 	<dd>
 	<?= $user->email ?>
 	&nbsp;
 	</dd>
 	<br>
 	<dt>Habilitado </dt>
 	<dd>
 	<?= $user->active ? 'SI' : 'NO' ?>
 	&nbsp;
 	</dd>
 	<br>
 	<dt>Creado</dt>
 	<dd>
 	<?= $user->created->nice() ?>
 	&nbsp;
 	</dd>
 	<br>

 	<dt>Modificado </dt>
 	<dd>
 	<dd>
 	<?= $user->modified->nice() ?>
 	&nbsp;
 	</dd>
 	</dl>
 	</div>
