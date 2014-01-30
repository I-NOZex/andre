 <!-- Second Band (Image Left with Text) -->
<?php
$this->img = Tshirt::model()->getImg($model->ID);
$this->detail = array($model->Nome,"Preço: ".$model->Preco."€");
?>
<?php //var_dump($model->imagem[0]->getImg()); ?>
  <div class="large-9 columns">
  <h4><?php echo $model->Nome; ?></h4>
    <div class="large-3 columns">
          <ul class="clearing-thumbs" data-clearing>
        	<li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
        	<li ><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
        	<li><a href="http://placehold.it/200x200&text=[img]"><img data-caption="caption here..." src="http://placehold.it/100x100&text=[img]"></a></li>
        </ul>
        <!--<ul data-orbit
            data-options="animation:slide;
                          animation_speed:1000;
                          pause_on_hover:true;
                          animation_speed:500;
                          navigation_arrows:true;
                          bullets:false;">
        	<li><img src="http://placehold.it/200x200&text=[img]" alt="slide 1" width="100%"/>
        	<div class="orbit-caption">
        		 Caption One.
        	</div>
        	</li>
        	<li><img src="http://placehold.it/200x200&text=[img]" alt="slide 2" width="100%"/>
        	<div class="orbit-caption">
        		 Caption Two.
        	</div>
        	</li>
        	<li><img src="http://placehold.it/200x200&text=[img]" alt="slide 3" />
        	<div class="orbit-caption">
        		 Caption Three.
        	</div>
        	</li>
        </ul>-->

    </div>
    <div class="large-9 columns">
      <!--<h4>This is a content section.</h4>-->
      <!--<div class="row">-->
        <div class="large-6 columns">
          <p>
Item #: 3347<br />

Preço T-shirt / T-shirt Price :  €24,95 <br />


<small>Portes grátis para encomendas iguais ou superiores a €29,90 (Portugal)</small>
 </p>
        </div>
        <div class="large-6 columns">
<div align="center">
                <table cellspacing="0" cellpadding="2" border="0">
          <tbody><tr>
            <td colspan="2" class="main">Opções:</td>
          </tr>
                    <tr>
            <td class="main"> TAMANHO:</td>
            <td class="main"><select name="id[4]"><option value="38">ESCOLHE AQUI-----------</option><option value="39">6 anos</option><option value="40">8 anos</option><option value="41">10 anos</option><option value="42">12 anos</option><option value="43">S</option><option value="45">M</option><option value="46">L</option><option value="47">XL</option><option value="471">XXL (t-shirts homem e sweats unissexo)</option><option value="511">2 anos (só t-shirts manga curta)</option><option value="639">XS (sweats)</option><option value="832">4 anos</option></select></td>
          </tr>
                    <tr>
            <td class="main">-T-shirt Criança:</td>
            <td class="main"><select name="id[17]"><option value="159">ESCOLHE AQUI-----------</option><option value="163">Verde Erva</option><option value="167">Azul Navy</option><option value="171">Rosa Bebé</option><option value="175">Encarnado</option><option value="187">Amarelo Torrado</option><option value="191">Laranja</option><option value="271">Branco</option><option value="664">Preto</option></select></td>
          </tr>
                    <tr>
            <td class="main">-T-shirt Homem:</td>
            <td class="main"><select name="id[9]"><option value="79">ESCOLHE AQUI-----------</option><option value="83">Cinzento Mesclado</option><option value="87">Preto</option><option value="91">Verde Erva</option><option value="95">Verde Tropa</option><option value="103">Encarnado</option><option value="111">Azul Navy</option><option value="115">Azul Royal</option><option value="119">Azul Denim</option><option value="263">Branco</option><option value="291">Verde Garrafa</option><option value="295">Laranja</option><option value="375">Amarelo Torrado</option><option value="503">Cinzento Escuro</option><option value="712">Amarelo Limão</option><option value="1008">Cinza Mesclado Claro</option></select></td>
          </tr>
                    <tr>
            <td class="main">-T-shirt Mulher:</td>
            <td class="main"><select name="id[13]"><option value="123">ESCOLHE AQUI-----------</option><option value="127">Preto</option><option value="135">Rosa</option><option value="139">Encarnado</option><option value="267">Branco</option><option value="531">Azul Navy</option><option value="535">Azul Royal</option><option value="716">Cinzento Mesclado</option></select></td>
          </tr>
                    <tr>
            <td class="main">-T-shirt Mulher Decote em V :</td>
            <td class="main"><select name="id[77]"><option value="888">ESCOLHE AQUI-----------</option><option value="896">Fuschia</option><option value="900">Branco</option><option value="908">Preto</option><option value="912">Rosa</option></select></td>
          </tr>
                    <tr>
            <td class="main">Sweat - Unissexo:</td>
            <td class="main"><select name="id[41]"><option value="383">ESCOLHE AQUI-----------</option><option value="387">Branco (+€7,00)</option><option value="519">Cinzento Mesclado (+€7,00)</option></select></td>
          </tr>
                  </tbody></table>
      </div>
          <p align="center">
                      </p>
          <p align="center"><input type="hidden" value="3347" name="products_id"><input type="image" border="0" title=" Comprar Agora " alt="Comprar Agora" src="includes/languages/portugues/images/buttons/button_in_cart.gif"> </p>          <p align="center">&nbsp;</p><
        </div>
      <!--</div>-->
    </div>
  </div>