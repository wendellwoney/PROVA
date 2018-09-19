<?php
    require_once 'Classes/Controle.php';
    $controle = new Controle();


?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Controle de Tarefas</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- style -->
    <link href="css/resume.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
        #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
        #sortable li span { position: absolute; margin-left: -1.3em; }
    </style>
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Controle de Tarefas</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile  mx-auto mb-2" src="img/logo.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#nova">Nova Tarefa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#minhas">Minhas Tarefas</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="sobre">
        <div class="my-auto">
          <h1 class="mb-0">Controle de
            <span class="text-primary">Tarefas</span>
          </h1>
          <div class="subheading mb-5">Sistema para controle de tarefas BDS</div>
          <p class="lead mb-5">
              Versão: <?php echo $controle->getVersaoSistema();?>
          </p>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="nova">

        <div class="my-auto">
          <h2 class="mb-5">Nova Tarefa</h2>
            <?php
            if (@$_GET['s'] == 2) :
                ?>
                <div class="alert alert-error" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Erro:</span>
                    Não foi possivel Cadastrar a nova Tarefa!
                </div>
            <?php endif;?>
          <form action="Classes/formCadastro.php" method="post">
          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0">Descreva abaixo sua nova tarefa</h3>
            </div>
          </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-lg" name="titulo"  placeholder="Título" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-lg" name="descricao" id="descricao" placeholder="Descrição" cols="10" rows="4"></textarea>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" name="prioridade" id="prioridade">
                    <option>Prioridade</option>
                    <option value="1">Alta</option>
                    <option value="1">Média</option>
                    <option value="1">Baixa</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg">Cadastrar</button>
            </div>
          </div>
          </form>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="minhas">
        <div class="my-auto">
          <h2 class="mb-5">Minhas Tarefas</h2>
          <?php
            if (@$_GET['s'] == 1) :
          ?>
            <div class="alert alert-success" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Sucesso:</span>
                Tarefa Cadastrada!
            </div>
          <?php endif;?>

            <?php
            if (@$_GET['s'] == 3) :
                ?>
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Sucesso:</span>
                    Tarefa Modificada!
                </div>
            <?php endif;?>

            <?php
            if (@$_GET['s'] == 5) :
                ?>
                <div class="alert alert-success" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Sucesso:</span>
                    Tarefa Removida!
                </div>
            <?php endif;?>

          <input type='button' class="btn-primary btn btn-lg" value='Salvar Ordem' onclick='saveOrder();'/>

          <div class="resume-item d-flex flex-column flex-md-row" style="width: 100%">
              <div id="sortable" style="width: 100%">
                  <?php
                    $listaTarefas = $controle->getTarefas();
                    foreach ($listaTarefas as $tarefa) :
                  ?>

                  <div data-tarefa-id = '<?php echo $tarefa->id?>' class="ui-state-default" style="padding: 15px; margin: 3px;">
                      <div class="row">
                          <div class="col-md-5"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $tarefa->titulo?></div>
                          <?php if ($tarefa->prioridade == 1) :?>
                            <div class="col-md-2"><button type="button" class="btn-sm btn btn-danger">Prioridade: Alta</button></div>
                          <?php endif;?>
                          <?php if ($tarefa->prioridade == 2) :?>
                              <div class="col-md-2"><button type="button" class="btn-sm btn btn-warning">Prioridade: Média</button></div>
                          <?php endif;?>
                          <?php if ($tarefa->prioridade == 3) :?>
                              <div class="col-md-2"><button type="button" class="btn-sm btn btn-info">Prioridade: Baixa</button></div>
                          <?php endif;?>
                          <div class="col-md-2"><button class="btn-sm btn btn-primary">N° ORDEM: <?php echo $tarefa->id;?></button></div>
                          <div class="col-md-3">
                              <center>
                                  <a href="" data-toggle="modal" data-target="#modal<?php echo $tarefa->id?>"><li class="fa fa-edit" title="Editar Tarefa"></li></a>
                                  <a style="cursor: pointer;" onclick="confirmaRemocao('<?php echo $tarefa->id?>', '<?php echo $tarefa->titulo?>')"><li class="fa fa-times-circle" title="Remover Tarefa"></li></a>
                              </center>

                              <div id="modal<?php echo $tarefa->id?>" class="modal fade" role="dialog">
                                  <div class="modal-dialog">
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h4 class="modal-title">Editar Tarefa : <?php echo $tarefa->titulo; ?></h4>
                                          </div>
                                          <div class="modal-body">
                                              <form name="tarefa<?php echo $tarefa->id;?>" method="post" action="Classes/formUpdate.php">
                                                  <input type="hidden" name="id" value="<?php echo $tarefa->id;?>">
                                              <p>
                                              <div class="form-group">
                                                  <input type="text" class="form-control form-control-lg" name="titulo"  placeholder="Título" aria-describedby="basic-addon1" value="<?php echo $tarefa->titulo;?>">
                                              </div>
                                              <div class="form-group">
                                                  <textarea class="form-control form-control-lg" name="descricao" id="descricao" placeholder="Descrição" cols="10" rows="4"><?php echo $tarefa->descricao;?></textarea>
                                              </div>
                                              <div class="form-group">
                                                  <select class="form-control form-control-lg" name="prioridade" id="prioridade">
                                                      <option>Prioridade</option>
                                                      <option value="1" <?php if ($tarefa->prioridade == 1) { ?> selected <?php } ?>>Alta</option>
                                                      <option value="2" <?php if ($tarefa->prioridade == 2) { ?> selected <?php } ?>>Média</option>
                                                      <option value="3" <?php if ($tarefa->prioridade == 3) { ?> selected <?php } ?>>Baixa</option>
                                                  </select>
                                              </div>
                                              <div class="form-group">
                                                  <button type="submit" class="btn btn-success btn-lg">Atualizar</button>
                                              </div>
                                              </p>
                                              </form>
                                          </div>
                                      </div>

                                  </div>
                              </div>

                          </div>
                      </div>

                  </div>

                  <?php endforeach;?>

              </div>
          </div>

        </div>
      </section>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();
        } );
    </script>

  <script>
      function confirmaRemocao(id, tarefa) {
          var conf = confirm("Deseja realmente remover a tarefa" + tarefa);

          if (conf == true) {
              window.location = "<?php echo ConfiguracaoServico::URL_SISTEMA?>/Classes/formDelete.php?id=" + id;
          } else {
              return false;
          }
      }
  </script>

    <script type="text/javascript">
        function saveOrder() {
            var tarefaorder="";
            $("#sortable div").each(function(i) {
                if (tarefaorder=='')
                    tarefaorder = $(this).attr('data-tarefa-id');
                else
                    tarefaorder += "," + $(this).attr('data-tarefa-id');
            });
            //articleorder now contains a comma separated list of the ID's of the articles in the correct order.
            $.post('Classes/saveorder.php', { order: tarefaorder })
                .success(function(data) {
                    alert('Ordem Salva!');
                })
                .error(function(data) {
                    alert('Error: ' + data);
                });
        }
    </script>

  </body>

</html>
