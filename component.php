<?php
/* ------------------------------------------------------------------------
  # JBootstrap - Twitter's Bootstrap for Joomla (with RocketTheme's Gantry administration)
  # ------------------------------------------------------------------------
  # author    Prieco S.A.
  # copyright Copyright (C) 2012 Prieco.com. All Rights Reserved.
  # @license - http://http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
  # Websites: http://www.prieco.com
  # Technical Support:  Forum - http://www.prieco.com/en/forum/index.html
  ------------------------------------------------------------------------- */

// no direct access
defined('_JEXEC') or die('Restricted index access');

// load and inititialize gantry class
require_once('lib/gantry/gantry.php');

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';
?>
<?php if (JRequest::getString('type') == 'raw'): ?>
    <jdoc:include type="component" />
<?php else: ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language; ?>" >
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

            <?php
            $gantry->displayHead();
            $gantry->addStyles(array('bootstrap.css', 'bootstrap-responsive.css'));
            ?>

            <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
            <!--[if lt IE 9]>
              <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->            

            <link rel="apple-touch-icon" href="<?php echo $imgpath; ?>/apple-touch-icon-iphone.png"/>
            <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $imgpath; ?>/apple-touch-icon-ipad.png"/>
            <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $imgpath; ?>/apple-touch-icon-114x114.png"/>
        </head>
        <body <?php echo $gantry->displayBodyTag(); ?>>
            <div id="rt-main">
                <div class="jb-container">
                    <div class="jb-block">
                        <div id="rt-mainbody">
                            <jdoc:include type="component" />
                        </div>
                    </div>
                </div>
            </div>

            <script src="<?php echo $jspath; ?>/jquery.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-transition.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-alert.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-modal.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-dropdown.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-scrollspy.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-tab.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-tooltip.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-popover.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-button.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-collapse.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-carousel.js"></script>
            <script src="<?php echo $jspath; ?>/bootstrap-typeahead.js"></script>

        </body>
    </html>
<?php endif; ?>
<?php
$gantry->finalize();
?>