<form method="POST" action="./php/cadastroProduto.php" enctype="multipart/form-data">
  <div class="row">
    <div class="col-6">
      <?php
      // echo "<pre>";
      // var_dump($produto);
      // die;
      ?>
      <div class="mb-3">
        <label for="produto" class="form-label">Nome do produto</label>
        <input placeholder="Nome do produto" name="produto" type="text" class="form-control" id="produto" value="<?= $produto['nomeProduto'] ?? '' ?>">
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <label for="marca" class="form-label">Marca</label>
        <input placeholder="Nome da marca" name="marca" type="text" class="form-control" id="marca" value="<?= $produto['marcaProduto'] ?? '' ?>">
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <label for="preco" class="form-label">Preço</label>
        <input placeholder="22,00" name="preco" type="text" class="form-control " id="preco" value="<?= $produto['preco'] ?? '' ?>">
      </div>
    </div>
    <div class="col-6">
      <div class="mb-3">
        <?php
        if (isset($produto)) :
          $categoriaPHP = $produto['nome_categoria'];

        ?>
          <script>
            <?= "let categoriaJS = '$categoriaPHP';";
            ?>

            $(document).ready(function() {
              let select = document.getElementById('categoria');
              let selecionado = select.options
              // console.log(select);
              let posicao = [];

              for (let i = 0; i <= selecionado.length; i++) {
                posicao.push(select.options[i].textContent);

                if (posicao[i] == categoriaJS) {
                  select.options[i].defaultSelected = true;

                }

              }
            });
          </script>
        <?php
        endif
        ?>
        <label for="categoria" class="form-label">Categorias</label>
        <select id="categoria" name="categoria" class="form-select">
          <option selected>Escolha a categoria</option>
          <option value="1">Promoções</option>
          <option value="2">Bebidas</option>
          <option value="3">Açougue</option>
          <option value="4">Laticínios</option>
          <option value="5">Limpeza</option>
          <option value="6">Mercearia</option>
        </select>
      </div>
    </div>
    <?php
    if (isset($produto)) :
    ?>
      <div class="col-10">
        <div class="mb-3">
          <label for="imagemProduto" class="form-label">Imagem do produto</label>
          <input id="img-input" value="<?php echo $produto['imagem'] ?>" name="imagemProduto" type="file" class="form-control" id="imagemProduto">
        </div>
      </div>
      <div class="col-2 mb-3">
        <div id="img-container" >
          <img style="width: 200px" id="preview" class="img-thumbnail" src="<?= $produto['imagem'] ?>" alt="">
        </div>
      </div>
      
    <?php
    else :
    ?>
      <div class="col-10">
        <div class="mb-3">
          <label for="imagemProduto" class="form-label">Imagem do produto</label>
          <input id="img-input" value="<?php echo $produto['imagem'] ?>" name="imagemProduto" type="file" class="form-control" id="imagemProduto">
        </div>
      </div>
      <div class="col-2 mb-3">
        <div id="img-container">
          <img style="width: 200px" id="preview" src="">
        </div>
      </div>
    <?php
    endif
    ?>

    <script>
      function readImage() {
        if (this.files && this.files[0]) {
          var file = new FileReader();
          file.onload = function(e) {
            document.getElementById("preview").src = e.target.result;
          };
          file.readAsDataURL(this.files[0]);
        }
      }
      document.getElementById("img-input").addEventListener("change", readImage, false);
    </script>

    <div class="d-grid gap-2">
      <input type="hidden" name="id" value="<?php echo $produto['id_produto'] ?? ''; ?>">
      <button type="submit" class="btn btn-danger text-white btn-lg">
        <?php
        if (isset($produto)) echo "Atualizar produto";
        else echo 'Cadastrar produto';
        ?>
      </button>
    </div>
  </div>

</form>