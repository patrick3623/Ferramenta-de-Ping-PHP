<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta http-equiv="refresh" content="30">
    <title>Ferramenta de Ping</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome/Local</th>
        <th scope="col">IP/Dominio</th>
      <th scope="col">Status</th>
      <th scope="col">Opções</th>
    </tr>
  </thead>
        <tbody>
    <?php
      include("ping.php");
?>
        </tbody>
    </table>
    </div>
    
    <script src="assets/js/bootstrap.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>