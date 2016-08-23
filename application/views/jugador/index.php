<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PokeNba</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col col-sm-6">
          <h3>PokeNBA</h3>
          <form  action="http://localhost/pokenba/index.php?/jugador/guardar" method="post">

            <div class="form-group input-group">
              <input type="hidden" name="codigo" value="<?php echo $jugador->id; ?>"placeholder='Codigo'/>
            </div>

            <div class="form-group input-group">
              <span class='input-group-addon'>Nombre</span>
              <input type="text" class="form-control" name="nombre" value="<?php echo $jugador->nombre; ?>"  placeholder='Nombre'/>
            </div>

            <div class="form-group input-group">
              <span class='input-group-addon'>Peso</span>
              <input type="number" class="form-control" name="peso" value="<?php echo $jugador->peso; ?>" placeholder='Peso'/>
            </div>

            <div class="form-group input-group">
              <span class='input-group-addon'>Juegos ganados</span>
              <input type="number" class="form-control" name="ganados" value="<?php echo $jugador->ganados; ?>" placeholder='Juegos ganados'/>
            </div>

            <div class="form-group input-group">
              <input type="submit" class="btn btn-primary" value='Guardar'/>
            </div>

          </form>
          </div>
        </div>
        <div class="col col-sm-12">
          <h3>Registros guardados</h3>
          <table class="table">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nombre</th>
                  <th>Peso</th>
                  <th>Ganados</th>
                  <th>Accion</th>
                </tr>
              </thead>

              <tbody>
                  <?php
                    foreach($jugadores as $jugador){
                      $linkEdit = "http://localhost/pokenba/index.php?/jugador/?id={$jugador->id}";
                      echo "<tr>
                              <td>{$jugador->id}</td>
                              <td>{$jugador->nombre}</td>
                              <td>{$jugador->peso}</td>
                              <td>{$jugador->ganados}</td>
                              <td><a href='{$linkEdit}' class='btn btn-info btn-sm'>Edit</a>
                              <input type='button' class='btn btn-warning btn-sm' onclick='confirmDelete({$jugador->id});' value='Del'><td>
                            </tr>
                      ";
                    }
                   ?>
              </tbody>
          </table>
        </div>
      </div>
      <script type="text/javascript">
        function confirmDelete(id){
          if(confirm("Seguro que desea borrar?")){
              document.location = 'http://localhost/pokenba/index.php?/jugador/delete/?id='+id;
          }
        }
      </script>
  </body>
</html>
