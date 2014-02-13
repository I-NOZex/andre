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
    <title><?php echo CHtml::encode(strip_tags(Yii::app()->name.' | '.$this->pageTitle)) ?></title>
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
        bottom: 8px;
        display: inline;
        position: relative;
    }
    .clearing-featured-img div {
        text-align: right;
    }
    span.required {
    color: #DF0D0E;
    font-size: 15px;
    }
    .avatar {
        display: inline;
    }
    nav .avatar img, nav img.avatar {
        border-radius: 10px;
        margin-bottom: 2px;
        margin-right: 10px;
        max-height: 30px;
        max-width: 30px;
        float: none;
    }
    .button-group button.button, .button-group input.button {
        padding-bottom: 14px;
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
                  <a href="<?php echo Yii::app()->homeUrl; ?>">
                    <?php echo Yii::app()->name;?>
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
                    <li><?php echo CHtml::link('Mais Antigas',array('/site/search','q' => 'data'))?></li>
                    <li><?php echo CHtml::link('Preço Menor',array('/site/search','q' => 'barato'))?></li>
                    <li><?php echo CHtml::link('Preço Maior',array('/site/search','q' => 'caro'))?></li>
<!--                <li><a href="#">Modelo D</a></li>
                    <li class="divider"></li>
                    <li><label>Camisolas</label></li>
                    <li><a href="#">Modelo A</a></li>
                    <li><a href="#">Modelo B</a></li>
                    <li><a href="#">Modelo C</a></li>
                    <li><a href="#">Modelo D</a></li>-->
                    <li class="divider"></li>
                    <li><?php echo CHtml::link('Todos Produtos &rarr;',array('/site'))?></li>
                  </ul>
                </li>
                <li class="divider"></li>
                <li><?php echo CHtml::link('Carrinho <span class="round label">'.Yii::app()->shoppingCart->getItemsCount().'</span>',array('/site/carrinho'))?></li>
                <li class="divider"></li>
                <li class="has-dropdown">
                  <a href="#">
                  <?php echo Yii::app()->user->data()->getAvatar(true); ?>
                  <span>Área de Cliente</span>
                  </a>
                  <ul class="dropdown">
                  <?php if (Yii::app()->user->isGuest): ?>
                    <li><?php echo CHtml::link('Iniciar Sessão',array('//user/user'))?></li>
                    <li><?php echo CHtml::link('Registar',array('//registration/registration'))?></li>
                    <li><?php echo CHtml::link('Recuperar Password',array('//registration/registration/recovery'))?></li>
                  <?php else: ?>
                    <li><?php echo CHtml::link('Conta',array('//profile/profile/view'))?></li>
                    <li><?php echo CHtml::link('Privacidade',array('//profile/privacy/update'))?></li>
                    <li><?php echo CHtml::link('Terminar Sessão',array('/site/logout'))?></li>
                  <?php endif; ?>
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
              <p>Andre & ABCDE - <em>Todos os Direitos Reservados © <?php echo date('Y',time()) ?></em></p>
            </div>

            <div class="large-6 columns">
              <!--<ul class="inline-list right">
                <li><a href="#">Link 1</a></li>
                <li><a href="#">Link 2</a></li>
                <li><a href="#">Link 3</a></li>
                <li><a href="#">Link 4</a></li>
              </ul>-->
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
