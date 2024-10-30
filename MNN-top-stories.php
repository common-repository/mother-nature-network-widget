<?php
/*
Plugin Name: MNN.com top stories
Plugin URI: http://www.mnn.com
Description: MNN widgets allow you to add continuously updated most popular stories to your website.
Author: Steve Pollak	
Version: 1.0
Author URI: http://www.mnn.com
*/
  
require_once('inc/simplepie.inc');

function mnnnews_widget() {

				$feed1 = new SimplePie('http://www.mnn.com/rss/all-mnn-content');
                $feed1->set_stupidly_fast(true);

?>
<h3>Mother Nature Network - Latest News</h3>
               <ul>

				<?php foreach ($feed1->get_items(0, 8) as $item): ?>

					<li>

						<a title="<?php print $item->get_title(); ?>" href="<?php print $item->get_link(); ?>"><?php print $item->get_title(); ?></a>

                    </li>

				<?php endforeach; ?>

				</ul>
                Visit our site for more <a title="Environmental News" href="http://www.mnn.com">environmental news</a>.
<?php
      }
      function init_mnnnews(){
          register_sidebar_widget("MNN Top News", "mnnnews_widget");    
      }
      add_action("plugins_loaded", "init_mnnnews");
?>