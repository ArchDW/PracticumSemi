<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $alumnos = join_alumnos_table();
  $cont = 0;
 
  $titulo = ''; if(isset($_POST['titulo'])){ $titulo = trim($_POST['titulo']); } // definimos $titulo para evitar errores, y guardamos su valor por el ingresado.
  if(isset($_POST['enviar'])){
    if($titulo != ""){
        $num = $_POST['opciones']; // este valor lo vamos a obtener de lo que el usuario ingrese como numero de opciones al crear la encuesta
        $fecha = date('Y-m-d');
        $query = "INSERT INTO encuestas (";
        $query .="id,titulo,fecha";
        $query .=") VALUES (";
        $query .=" NULL,'{$titulo}','{$fecha}'";
        $query .=")"; // si han ingresado si quiera un titulo insertamos esta encuesta en la tabla
        $db->query($query);
        
 
        $query = "SELECT MAX(id) as id FROM encuestas"; // ahora obtenemos el id de la ultima fila,
                                                      // la que acabamos de ingresar,
                                                      // esto lo hacemos para poder asociarle las opciones
        $req =  find_by_sql($query);
 
        foreach ($req as $req) {
            $id_encuesta = $req['id'];       
        }
        
        $query2 = "INSERT INTO opciones (";
        $query2 .="id,id_encuesta,nombre,valor";
        $query2 .=") VALUES ";// En esta parte estamos armando un query SQL dinamico el cual sera modificado de acuerdo a lo que el usuario ingrese en el formulario.
        for($i=1;$i<=$num;$i++){
            $opcnativa = trim($_POST['opc'.$i]); // obtenemos el nombre de cada opcion indivudalmente.
            if($opcnativa != ""){
                $query2 .= "(NULL ,  '{$id_encuesta}',  '{$opcnativa}',  0)"; // el id de la opcion ira null para que se ponga automaticamente, en id_encuesta pues ira el id de la encuesta que acabamos de crear, en 'nombre' ira el nombre de la opcion y valor ira 0, puesto que es una nueva opcion sin votos, esto se repetira con todas las opciones que el usuario haya definido.
                $cont++;
            } 
            if($i == $num){
                // si es que se llega al final, termina la consulta
            }else{
                $query2 .= ", "; // sino se pone una , y se continua.
            }
        }
 
        if($cont < 2){ // si el usuario no definio ninguna opcion, se elimina la encuesta recien creada, esto es poco probable que suceda ya que la definicion de opciones la haremos con un select, y aqui se seleccionara el valor de 2 por defecto.
            $query2 = "DELETE FROM `encuestas` WHERE id = ".$id_encuesta;
            echo "<div class='error'>Tiene que llevar por lo menos 2 opciones.</div>";
        }else{
            header('location: act.php'); // por ultimo si todo salio bien, redireccionamos al act para que el usuario vea su encuesta recien creada.
        }
        $db->query($query2); // y ejecutamos el query
    }
}
?>
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <link rel="stylesheet" href="estiloss.css">
          <div class="wrap">
            <h1>Agregar Encuesta</h1>
              <form action="" method="post">
           
              <div class="fl titulo">
                  <label>Titulo:</label>
                  <input name="titulo" type="text" value="<?php echo $titulo; ?>" size="26">
              </div>
              <?php
                  // esto es simplemente un formulario, pero aqui hacemos una condicion, identificamos si se ha definido un numero de opciones, si es si hacemos un bucle, si es no mostramos el select para definir un numero de opciones, como es obvio por defecto se mostrara el bucle:
              if(isset($_POST['opc'])){
                  $num = $_POST['opciones']; // guardamos el valor del numero de opciones
                  for($i=1;$i<=$num;$i++){ // hacemos el bucle mostrando los campos respectivos.
              ?>
              <div class="cf">
                  <label>Opcion <?php echo $i; ?>: </label>
                  <input name="opc<?php echo $i; ?>" type="text" size="43">
              </div>
              <?php } // aqui termina el bucle ?>
              <div class="cf">
                  <input name="enviar" type="submit" value="Enviar">
                  <input name="opciones" type="hidden" value="<?php echo $num; // le pasamos el valor de num al proceso del formulario mediante un campo oculto. ?>">
                  <input name="cont" type="hidden" value="<?php echo cont; ?>">
              </div>
              <?php }else{ // sino se ha definido nro de opciones: ?>
              <div class="fl">
                  <label>Nº de opciones:</label>
                  <select name="opciones">
                      <?php for($i=2;$i<=20;$i++){ // esto es un loop simple, solo para ahorrarnos trabajo, este select tendra de 2 a 20 opciones, si deseas cambiarlo lo puedes hacer aqui. ?>
                      <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php } ?>
                  </select>
              </div>
           
              <div class="cf">
                  <input name="opc" type="submit" value="continuar">
              </div>
           
                <?php } // Sino se han definido opciones, que en vez de salir el boton de Enviar, salga uno que sea Continuar. ?>
              <a href="act.php?cl=<?php echo $_GET['cl']; ?>" class="volver">← Volver</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php include_once('layouts/footer.php'); ?>
