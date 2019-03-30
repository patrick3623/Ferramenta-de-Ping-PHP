<?php
ini_set('max_execution_time', 60);
$contador = 1;
$arrayL = fopen("lista.txt","r");

$config = fopen("config.txt","r");
$config_linha =fgets($config);
$dados = strtok($config_linha, ":"); 

$error = array();
$html = "";

while(!feof($arrayL)){
    $linha =fgets($arrayL);
    $nome = strtok($linha, ":");
    $pingando = " ";
    $numeroip = strtok(strtr(strrchr($linha,":"), ":", " "), " ");
    $id = strtok(strtr(strrchr($linha," "), " ", " "), " ");
    if(empty($numeroip)){
       $html = $html . "Final, sem ip";
       exit;
    }else{

       $html = $html .  "<tr>
      <th scope='row'>$contador</th>
      <td>$nome</td><td>$numeroip</td>";
       $pingando = shell_exec("ping -w 20 -n 2 $numeroip");

       if(preg_match("/Perdidos = 2/", $pingando)){
            $error[] = $id;
           if($dados == "false"){
               $config_w = fopen("config.txt","w");
               fwrite($config_w, "true:");
               fclose($config_w);
           }
         $html = $html .  "<td><span class='badge badge-danger'>Host OFF</span></td>";
       }else{
         $html = $html .  "<td><span class='badge badge-success'>Host OK</span></td>";
         $html = $html .  "<!-- <td><div class='alert alert-success' role='alert'>
<p>$pingando</p></div></td> -->";
       }
        $html = $html .  "<td><a target='_blank' href='http://$numeroip' class='badge badge-primary'>Abrir nova aba</a></td>";
    }
    $contador += 1;
}
    if(sizeof($error) >= 1) {
        if($dados == "true") {
        if(sizeof($error) == 1) {
        $html = $html .  "<audio id='audio' autoplay>
   <source src='$error[0].mp3' type='audio/mp3' />
</audio>";
        }else{
            $html = $html .  "<audio id='audio' autoplay>
   <source src='all.mp3' type='audio/mp3' />
</audio>";
        }
        }
        fclose($arrayL);
        header("Refresh: 0");
    }else{
            fclose($config);
            $config = fopen("config.txt","w");
               fwrite($config, "false:");
               fclose($config);
        }
echo $html;
?>
