<?php
	Yii::app()->clientscript
		->registerCssFile( Yii::app()->theme->baseUrl . '/css/foundation.css' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/vendor/modernizr.js' )
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <style type="text/css">
    /*<![CDATA[*/
    .row.top {
        margin-top: 1.5em;
    }
    .row.full {
        max-width: 100%;
    }
    [class*="column"] + [class*="column"]:last-child {
        float: left;
    }
    [data-clearing] li {
        margin-bottom: 10px;
    }
    .row.top .clearing-featured-img {
        margin: 0;
    }
    .row.top .clearing-featured-img img {
        width: 100%;
    }
    .clearing-featured-img span.button.tiny {
        position: absolute;
        right: 12px;
        top: 278px;
    }
    /*]]>*/
    </style>
  </head>
  <body>
  <div class="row full">
    <div class="large-12 columns">

    <!-- Navigation -->

      <div class="row">
        <div class="large-12">

          <nav class="top-bar" data-topbar>
            <ul class="title-area">
              <!-- Title Area -->
              <li class="name">
                <h1>
                  <a href="#">
                    <?php echo CHtml::encode(Yii::app()->name);?>
                  </a>
                </h1>
              </li>
              <li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
            </ul>

            <section class="top-bar-section">
              <!-- Right Nav Section -->
              <ul class="right">
                <li class="divider"></li>
                <li class="has-dropdown">
                  <a href="#">Produtos</a>
                  <ul class="dropdown">
                    <li><label>T-shirts</label></li>
                    <li><a href="#">Modelo A</a></li>
                    <li><a href="#">Modelo B</a></li>
                    <li><a href="#">Modelo C</a></li>
                    <li><a href="#">Modelo D</a></li>
                    <li class="divider"></li>
                    <li><label>Camisolas</label></li>
                    <li><a href="#">Modelo A</a></li>
                    <li><a href="#">Modelo B</a></li>
                    <li><a href="#">Modelo C</a></li>
                    <li><a href="#">Modelo D</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Todos Produtos →</a></li>
                  </ul>
                </li>
                <li class="divider"></li>
                <li><a href="#">Main Item 2</a></li>
                <li class="divider"></li>
                <li class="has-dropdown">
                  <a href="#">Área de Cliente</a>
                  <ul class="dropdown">
                    <li><a href="#">Iniciar Sessão</a></li>
                    <li><a href="#">Registar</a></li>
                    <li><a href="#">Recuperar Password</a></li>
                  </ul>
                </li>
              </ul>
            </section>
          </nav>
          <!-- End Top Bar -->
        </div>
      </div>

    <!-- End Navigation -->

      <div class="row top">
        <?php echo $content; ?>
      </div>

    <!-- Footer -->

      <footer class="row">
        <div class="large-12 columns"><hr />
          <div class="row">

            <div class="large-6 columns">
              <p>© Copyright no one at all. Go to town.</p>
            </div>

            <div class="large-6 columns">
              <ul class="inline-list right">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
              </ul>
            </div>

          </div>
        </div>
      </footer>

    <!-- End Footer -->

    </div>
  </div>
<?php
	Yii::app()->clientscript
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/vendor/jquery.js' )
		->registerScriptFile( Yii::app()->theme->baseUrl . '/js/foundation.min.js' )
?>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
