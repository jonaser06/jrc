<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>A Pen by  suranegara</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div style="max-width:600px;margin:0 auto;margin-top:20px;padding:20px;text-align:center;background:#5ca3dc;border-radius:5px 5px 0 0;">
	<h2 style="display:inline;color:#fff;vertical-align: middle;position: relative;top: -15px;"> Nuevo Requerimiento</h2>
</div>

<div style="background:#fcfcfc;margin:0 auto;padding:20px 20px 50px 20px;max-width:600px;color:#5a5a5a;font-size:15px;">
	<div style="padding:0 0 20px 0;">
		<p style="font-weight: 600;font-size:20px;">Hola !</p>
		<p style="font-size:15px;">Se detalla el requerimiento a continuación:</p>
	</div>
    
    <div style="padding:20px 0 30px 0;text-align:left;">
      <p style="font-size:20px;font-weight:600;">Requerido por: <?php echo $user; ?></p>
      <p style="font-size:20px;font-weight:600;">Descripcion: <?php echo $descripcion; ?></p>
      <p style="font-size:20px;font-weight:600;">Otros: <?php echo $otros; ?></p>
      <p style="font-size:20px;font-weight:600;">Cantidad: <?php echo $cantidad; ?></p>
	</div>
</div>

<div style="background:#f2f2f2;padding:20px;text-align:center;font-size:12px;border-bottom:3px solid #cccccc;margin:0 auto;margin-bottom:20px;max-width:600px;">
	<p>Copyright © 2019 JRC. Todos los derechos reservados.</p>
</div>
<!-- partial -->
  
</body>
</html>