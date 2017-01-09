

 

 <table width="100%"  height="150" id="example1" class="table table-bordered table-striped">
                    
 
 
<thead>
<tr>
 
<th><center>Nombre</center></th>

<th>Telefono(s)</th>

<th><center>Correo</center></th>

<th><center>Dirección</center></th>


<th><center>Vendedor</center></th>

<th><center>Modificar</center></th>

</tr>
</thead>


<tbody>



 <?php 
require("clases/claseusuario.php");
$a= new Usuarios();
$datas=$a->clientes();


 foreach ($datas as $rs) {
  

  ?>

 
<tr>
  

<td>    <center> <?php echo $rs->nombre; ?> </center>   </td>

<td>  <center>  <?php echo $rs->telefono."/"; echo $rs->telefono2; ?> </center>  </td>
<td>    <center><?php echo $rs->correo;  ?> </center>  </td>
<td>    <center><?php echo $rs->direccion;  ?> </center>  </td>
<td>    <center><?php echo $rs->vendedor;  ?> </center>  </td>

<td> <center><?php 


echo "<a href='modificar_client.php?id=$rs->idcliente';\"><img src='img/09_pencil-512.png' width='32' height='27'</a>";
  
?></center></td>
</tr>





 
  



 <?php  } ?>
</tbody>


</table>
