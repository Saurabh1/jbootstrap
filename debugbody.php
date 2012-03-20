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

$gridsize = JRequest::getInt('gridsize', 12);

// load and inititialize gantry class
require_once('lib/gantry/gantry.php');

$jspath = $this->baseurl . '/templates/' . $this->template . '/js';
$imgpath = $this->baseurl . '/templates/' . $this->template . '/images';

//        'mb12' => array(''),
//
//        'mb6-sa6' => array ('',''),
//        'mb8-sa4' => array ('',''),
//        'mb9-sa3' => array ('',''),
//
//        'sa6-mb6' => array ('rt-pull-6','rt-push-6'),
//        'sa4-mb8' => array ('rt-pull-4','rt-push-4'),
//        'sa3-mb9' => array ('rt-pull-3','rt-push-3'),
//
//        'mb4-sa4-sb4' => array('','',''),
//        'mb6-sa3-sb3' => array('','',''),
//        'mb8-sa2-sb2' => array('','',''),
//
//        'sa4-mb4-sb4' => array('rt-push-4','rt-pull-4',''),
//        'sa3-mb6-sb3' => array('rt-push-3','rt-pull-6',''),
//        'sa2-mb8-sb2' => array('rt-push-2','rt-pull-8',''),
//
//        'sa4-sb4-mb4' => array('rt-push-8','rt-pull-4','rt-pull-4'),
//        'sa3-sb3-mb6' => array('rt-push-6','rt-pull-6','rt-pull-6'),
//        'sa2-sb2-mb8' => array('rt-push-4','rt-pull-8','rt-pull-8'),
//
//        'mb3-sa3-sb3-sc3' => array('','',''),
//        'mb4-sa2-sb3-sc3' => array('','',''),
//        'mb4-sa3-sb2-sc3' => array('','',''),
//        'mb4-sa3-sb3-sc2' => array('','',''),
//        'mb6-sa2-sb2-sc2' => array('','',''),
//
//        'sa3-mb3-sb3-sc3' => array('rt-push-3','rt-push-3','',''),
//        'sa3-mb4-sb2-sc3' => array('rt-push-3','rt-pull-4','',''),
//        'sa2-mb4-sb3-sc3' => array('rt-push-2','rt-pull-4','',''),
//        'sa3-mb4-sb3-sc2' => array('rt-push-3','rt-pull-4','',''),
//        'sa2-mb6-sb2-sc2' => array('rt-push-2','rt-pull-6','',''),
//
//        'sa3-sb3-mb3-sc3' => array('rt-push-6','rt-pull-3','rt-pull-3',''),
//        'sa3-sb2-mb4-sc3' => array('rt-push-5','rt-pull-4','rt-pull-4',''),
//        'sa2-sb4-mb4-sc3' => array('rt-push-6','rt-pull-4','rt-pull-4',''),
//        'sa3-sb4-mb4-sc2' => array('rt-push-7','rt-pull-4','rt-pull-4',''),
//        'sa2-sb2-mb6-sc2' => array('rt-push-4','rt-pull-6','rt-pull-6',''),
//
//        'sa3-sb3-sc3-mb3' => array('rt-push-9','rt-pull-3','rt-pull-3','rt-pull-3'),
//        'sa3-sb3-sc2-mb4' => array('rt-push-8','rt-pull-4','rt-pull-4','rt-pull-4'),
//        'sa3-sb2-sc3-mb4' => array('rt-push-8','rt-pull-4','rt-pull-4','rt-pull-4'),
//        'sa2-sb3-sc3-mb4' => array('rt-push-8','rt-pull-4','rt-pull-4','rt-pull-4'),
//        'sa2-sb2-sc2-mb6' => array('rt-push-6','rt-pull-6','rt-pull-6','rt-pull-6')
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language; ?>" >
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <jdoc:include type="head" />
        <?php $gantry->addStyles(array('bootstrap.css', 'bootstrap-responsive.css')); ?>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->            

        <link rel="apple-touch-icon" href="<?php echo $imgpath; ?>/apple-touch-icon-iphone.png"/>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $imgpath; ?>/apple-touch-icon-ipad.png"/>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $imgpath; ?>/apple-touch-icon-114x114.png"/>
    </head>
    <body id="debug">
        <div class="jb-container">

            <?php echo $gantry->debugMainbody('debugmainbody', 'sidebar', 'standard', $gridsize); ?>

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
<?php
$gantry->finalize();
?>