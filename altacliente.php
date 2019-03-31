<?php
session_start();
    include 'cabezera.php';
   
    if(!isset($_SESSION['cliente'])){
      $_SESSION['cliente']="";}
?>
<div class="container">
    <div class="row">
        <form action="grabarcliente.php" method="POST" class="col s12">
          <div class="row">
            <div class="input-field col s6">
              <input  id="usuario" name="usuario" type="text" class="validate" required >
              <label for="usuario">Usuario</label>
            </div>
         
           <div class="row"> 
            <div class="input-field col s6">
              <input id="password" name="password" type="password" class="validate"  required  >
              <label for="password">Password</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input id="nombre" name="nombre" type="text" class="validate" required  >
              <label for="nombre">First Name</label>
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">
              <input  id="direccion" name="direccion" type="text" class="validate"  required >
              <label for="direccion">Direccion</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="telefono" name="telefono" type="tel" class="validate">
              <label for="telefono">Telefon</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="email" name="email" type="email" class="validate" required >
              <label for="email">Email</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="poblacion" name="poblacion" type="text" class="validate" required >
              <label for="poblacion">Poblacion</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <input id="provincia" name="provincia" type="text" class="validate"  required >
              <label for="provincia">Provincial</label>
            </div>
          </div>
          
          <div class="row">
            <div class="col s6">
              Introduce tu pais actual:
              <div class="input-field inline">
                <input id="pais" name="pais" type="text" class="validate"  required >
                <label for="pais">Pais</label>
                <span class="helper-text" data-error="wrong" data-success="right">Helper text</span>
              </div>
            </div>
            <div class="col s6">
                <input type="submit" class="btn" id="grabarcliente" value="ENVIAR">
            </div>    
          </div>

        </form>
      </div>
            


</div>
<?php
include 'pie.html';
?>