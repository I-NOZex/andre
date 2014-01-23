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
                    Top Bar Title
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
                  <a href="#">Main Item 1</a>
                  <ul class="dropdown">
                    <li><label>Section Name</label></li>
                    <li class="has-dropdown">
                      <a href="#" class="">Has Dropdown, Level 1</a>
                      <ul class="dropdown">
                        <li><a href="#">Dropdown Options</a></li>
                        <li><a href="#">Dropdown Options</a></li>
                        <li><a href="#">Level 2</a></li>
                        <li><a href="#">Subdropdown Option</a></li>
                        <li><a href="#">Subdropdown Option</a></li>
                        <li><a href="#">Subdropdown Option</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><label>Section Name</label></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all →</a></li>
                  </ul>
                </li>
                <li class="divider"></li>
                <li><a href="#">Main Item 2</a></li>
                <li class="divider"></li>
                <li class="has-dropdown">
                  <a href="#">Main Item 3</a>
                  <ul class="dropdown">
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li><a href="#">Dropdown Option</a></li>
                    <li class="divider"></li>
                    <li><a href="#">See all →</a></li>
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



    <!-- Managed By -->
          <div class="row">
            <div class="large-12 columns">
              <div class="panel">
                <div class="row">

                  <div class="large-2 small-6 columns">
                    <img src="http://placehold.it/300x300&text=Site Owner">
                  </div>

                  <div class="large-10 small-6 columns">
                    <strong>This Site Is Managed By<hr/></strong>

                    Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Donec dignissim nibh fermentum odio ornare sagittis
                  </div>

                </div>
              </div>
            </div>

    <!-- End Managed By -->

          </div>
        </div>
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
