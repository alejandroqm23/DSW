<?php

?>

<table cellSpacing="0" cellPadding="0" width="100%" border="" align="center" height="100%" bgcolor='#F2F2F2'>
	<tr><td align="center" width="100%">
		<table cellSpacing="0" cellPadding="0"  style='border-collapse:collapse;'  bordercolor='#CCCCCC' border="1" align="center" bgcolor='white'>
		<?php if ((isset($error))){ ?>
		<tr><td align="center" colspan="2"><font color='blue'><b>ERROR:</b> Usuario y/o contraseña erronea. Intentalo de nuevo.</font></td></tr><?php } ?>
		<tr><td align="center" class="texto_gris" valign="bottom" width="450" height="250" background="fondo_login.jpg">
		<form method="POST">
		<table cellSpacing=0 cellPadding=2 border=0 align="center" width="330">
		<tr><td colspan=2 align='center'><img src='<?php echo URL::base_url()."/resource/images/pokeball.png" ?>' width='60%'></td></tr>
		<tr height='10px'></tr>
		<tr><td><font color='#4F82CB'>Usuario</font></td><td align="left" ><input type="text" size="25" name="usuario"></td></tr>
		<tr><td><font color='#4F82CB'>Contraseña</font></td><td align="left"><input type="password" size="25" name="clave"></td></tr>
		<tr height='10px'></tr>
		<tr><td align="center" colspan="2"><font color='#4F82CB'><input type="image" src="<?php echo URL::base_url()."/resource/images/boton_login.png" ?>" alt="enviar"></font></td></tr>
		</table>
		</form>
		</td></tr>

		</table>
	</td></tr>
</table>
