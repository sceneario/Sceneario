<?php

class Zend_View_Helper_SocialButtons {

    public function socialButtons($url = null)
    {
        if(!null == $url) { ?>
            <div class="social-links">
                <div class="fb-like"  data-send="true" data-layout="button_count" data-width="100" data-show-faces="false" data-action="recommend" data-font="arial"></div>
                <a data-url="<?php echo $url ?>" rel="canonical" href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
                <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="120"></div>
            </div>
            <?php
        }
    }
}
