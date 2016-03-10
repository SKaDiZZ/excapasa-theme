<?php
/**
 * Custom Nekretnine Pretraga
 */

function ideja_search_nekretnine($atts) {

  ?>

  <dic class="row">
    <div class="col-sm-12">
      <form class="search" action="<?php echo home_url( '/' ); ?>/pretraga">

       <div class="input-group">
         <input type="hidden" name="s" class="form-control" placeholder="Unesite pojam za pretragu">
         <span class="input-group-btn">
           <input class="btn btn-default" type="submit" value="Trazi">
         </span>
       </div><!-- /input-group -->

       <div class="input-group">
         <select name="tip" class="c-select">
            <option selected>Vrsta nekretnine</option>
            <option value="kuca">Kuca</option>
					  <option value="stan">Stan</option>
					  <option value="vikendica">Vikendica</option>
						<option value="soba">Soba</option>
						<option value="montazni_objekat">Montazni Objekat</option>
						<option value="apartman">Apartman</option>
						<option value="garaza">Garaza</option>
						<option value="poslovni prostor">Poslovni prostor</option>
						<option value="zemljiste">Zemljiste</option>
						<option value="ostalo">Ostalo</option>
          </select>
        </div><!-- /input-group -->

    </form>
   </div><!-- /.col-lg-12 -->
 </div><!--search row -->

  <?php
}

add_shortcode('ideja-pretraga', 'ideja_search_nekretnine');
