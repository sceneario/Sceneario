<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Zend_View_Helper_SocialButtons {
    
    public function socialButtons($url = null)
    {
        if(!null == $url){
        /*
         * data-href="<?php echo $url ?>"
         */
            ?>
              <!-- Bloc de liens réseaux sociaux -->
             <div class="social-links">
                    
                     <div class="fb-like"  data-send="true" data-layout="button_count" data-width="100" data-show-faces="false" data-action="recommend" data-font="arial"></div>


                     <a data-url="<?php echo $url ?>" rel="canonical" href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

                     <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120"></div>

                     <script type="text/javascript">
                       window.___gcfg = {lang: 'fr'};

                       (function() {
                             var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                             po.src = 'https://apis.google.com/js/plusone.js';
                             var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                       })();
                     </script>
             </div>
             <?php
        }
    }
}
