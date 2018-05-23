<!--COLETA-->
<div class="boxLog">

 <div class="row">

  <div class="col-md-12">
    Registro<div class="closeLog">X</div>
    <br /><br />
    <form class="form" role="form" method="post" action="coletaDAO.php" accept-charset="UTF-8" id="login-nav">

      <!--CAMPO NOME -->
      <div class="form-group col-md-7">
       <label class="">Nome</label>
       <input type="text" class="form-control" name="nome" id="" placeholder="Digite seu nome" required>
     </div>

     <!--CAMPO TELEFONE -->
     <div class="form-group col-md-5">
       <label class="">Telefone</label>
       <input type="text" class="form-control" name="telefone" id="" placeholder="(00) 00000-0000" required>
     </div>

     <!--CAMPO EMAIL -->
          <div class="form-group col-md-12">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" id="formEmail" required="requered">
          </div>

     <!--CAMPO SEXO -->
      <div class="form-group col-md-6">
        <label for="sexo">Sexo:</label><br>
        <input class="form-check-input" type="radio" name="radio" value="m" id="formMasculino" checked="">
        <label>M</label>
        <input class="form-check-input" type="radio" name="radio" value="f" id="formFeminino">
        <label>F</label>
      </div>

      <!--CAMPO NASCIMENTO -->
      <script type='text/javascript'>
        function MascaraData(obj) 
        {
         switch (obj.value.length) 
         {
          case 2:
          obj.value = obj.value + "/";
          break;
          case 5:
          obj.value = obj.value + "/";
          break;
        }
      }
    </script>
    <div class="form-group col-md-6">
      <label>Nascimento:</label>
      <input class="form-control" type="text" name="nascimento" id="nascimento" placeholder="dd/mm/aaaa" maxlength="10"  size="14"  onKeyPress='MascaraData(this);' autocomplete="off" required="required" style="width: 110px">       
    </div>

    <!--CAMPO CEP -->
      <div class="form-group col-md-6">
       <label class="">Cep</label>
       <input type="text" class="form-control" name="cep" id="" placeholder="Digite seu CEP" required>
     </div>
     <div class="form-group col-md-6"><br>
      <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/" target="_blank">Não sei meu CEP</a>            
    </div>
     <div class="form-group col-md-12">
       <button type="submit" class="btn btn-primary btn-block" style="width: 100px">Entrar</button>
     </div>
   </form>
  </div>
</div>
  </div><!-- //COLETA -->