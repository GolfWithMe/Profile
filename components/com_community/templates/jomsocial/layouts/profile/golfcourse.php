<?php
error_reporting(1);
/**
* @copyright (C) 2013 iJoomla, Inc. - All rights reserved.
* @license GNU General Public License, version 2 (http://www.gnu.org/licenses/gpl-2.0.html)
* @author iJoomla.com <webmaster@ijoomla.com>
* @url https://www.jomsocial.com/license-agreement
* The PHP code portions are distributed under the GPL license. If not otherwise stated, all images, manuals, cascading style sheets, and included JavaScript *are NOT GPL, and are released under the IJOOMLA Proprietary Use License v1.0
* More info at https://www.jomsocial.com/license-agreement
*/
defined('_JEXEC') or die();
?>

<div class="joms-page">
    <div class="joms-list__search">
        <div class="joms-list__search-title">
            <h3 class="joms-page__title"><?php echo 'Home Golf Course'; ?></h3>
        </div>
    </div>
    <?php //echo $submenu;?>
    
    <div class="joms-tab__content">
    	

    <?php //if ( $newrequest ) { 
	$nores=0;
        //print_r($rowsHome);
	?>
            <?php foreach ( $rowsHome as $row ) { ?>
            <?php 
                $nores++;
                $cid=$row->CourseID;
                //print_r($row);
                $pModel = CFactory::getModel('profile');
                //user
                $course = $pModel->getCourseDetails($cid);
                //print_r($usr);
            ?>
               <div class="joms-list__avatar">
                 <p><span><?php echo $nores; ?>. <?php echo $course->Name; ?></span> &nbsp; <input type="button" onclick="window.location='<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse&stepset=delcouHome&cid='.$row->uid); ?>';" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Delete";?>">
                 </p>
               </div>
            
            <?php } ?>

    <?php //} else { ?>
    <?php if($nores==0) { ?>
        <div class="cEmpty cAlert"><?php echo 'You have no Home Golf Course Set.'; ?></div>
    <?php } ?>
    </div>
	<?php if($nores==0) { ?>
    <div class="joms-gap"></div>
	<?php //print_r($rows);?>

    	<div id="joms-profile--information" class="joms-tab__content">
            <?php //if ( $rows ) { ?>
            <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse') ?>" method="POST" class="js-form">
                <legend class="joms-form__legend">Add Home Golf Course</legend>
                <div class="joms-form__group has-privacy" for="field2">
                    <span>Select Course</span>
                    <label>Search Courses:</label>
                    <input type="text" name="searchkey" id="searchkey" class="joms-text" value="<?php echo $fieldset['searchkey']; ?>" />
                    <br />
                    <span><input type="submit" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Search";?>"></span>
                </div>
                <input type="hidden" name="stepset" value="searchHome" />
                </form>
                <br />
                <?php if ( $fieldset['searchkey']!='' ) { ?>
                <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse') ?>" method="POST" class="js-form" >
                <div class="joms-form__group has-privacy" for="field2">
                    <span></span>
                    
                    <select class="joms-select" name="selcourse">
                    <option value="" >Select Course From This List</option>
                    <?php foreach($searchrows as $srow) : ?>
                        <option value="<?php echo $srow->uid; ?>" ><?php echo $srow->Name; ?> - <?php echo $srow->City; ?>, <?php echo $srow->State; ?></option>
                    <?php endforeach; ?>
                    </select>       
                </div>
                <div class="joms-form__group">
                    <span></span>
                    <input type="hidden" name="searchkey" value="<?php echo $fieldset['searchkey']; ?>" />
                    <input type="hidden" name="stepset" value="savedataHome" />
                    <input type="submit" class="joms-button--primary joms-button--full-small" value="<?php echo "Submit";?>">
                </div>
            </form>
            <?php } ?>
        </div>
         <?php } ?>
</div>

<div class="joms-page">
    <div class="joms-list__search">
        <div class="joms-list__search-title">
            <h3 class="joms-page__title"><?php echo 'Favorite Golf Courses'; ?></h3>
        </div>
    </div>
    <?php //echo $submenu;?>
    
    <div class="joms-tab__content">
    	

    <?php //if ( $newrequest ) { 
	$nores=0;
	?>
        <table border='0'>
            <?php foreach ( $rows as $row ) { ?>
            <?php 
				$nores++;
				$cid=$row->CourseID;
				$pModel = CFactory::getModel('profile');
				//user
				$course = $pModel->getCourseDetails($cid);
				//print_r($usr);
			?>
               <div class="joms-list__avatar">
                   <TR><TD><?php echo $nores; ?>. <?php echo $course->Name; ?>&nbsp;&nbsp;&nbsp;</TD><TD><input type="button" onclick="window.location='<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse&stepset=delcou&cid='.$row->uid); ?>';" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Delete";?>"></TD></TR>
               </div>
            
            <?php } ?>
        </table>
    <?php //} else { ?>
    <?php if($nores==0) { ?>
        <div class="cEmpty cAlert"><?php echo 'Your Favorite Golf Course List is Empty'; ?></div>
    <?php } ?>
    </div>

    <div class="joms-gap"></div>
	<?php //print_r($rows);?>

    	<div id="joms-profile--information" class="joms-tab__content">
            <?php //if ( $rows ) { ?>
            <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse') ?>" method="POST" class="js-form">
                <legend class="joms-form__legend">Add a New Favorite Golf Course</legend>
                <div class="joms-form__group has-privacy" for="field2">
                    
                    <label>Search Courses:</label>
                    <input type="text" name="searchkey" id="searchkey" class="joms-text" value="<?php echo $fieldset['searchkey']; ?>" />
                    <br />
                    <span><input type="submit" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Search";?>"></span>
                </div>
                <input type="hidden" name="stepset" value="search" />
                </form>
                <br />
                <?php if ( $fieldset['searchkey']!='' ) { ?>
                <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=golfcourse') ?>" method="POST" class="js-form" >
                <div class="joms-form__group has-privacy" for="field2">
                    <span></span>
                    
                    <select class="joms-select" name="selcourse">
                    <option value="" >Select Course From This List</option>
                    <?php foreach($searchrows as $srow) : ?>
                        <option value="<?php echo $srow->uid; ?>" ><?php echo $srow->Name; ?> - <?php echo $srow->City; ?>, <?php echo $srow->State; ?></option>
                    <?php endforeach; ?>
                    </select>       
                </div>
                <div class="joms-form__group">
                    <span></span>
                    <input type="hidden" name="searchkey" value="<?php echo $fieldset['searchkey']; ?>" />
                    <input type="hidden" name="stepset" value="savedata" />
                    <input type="submit" class="joms-button--primary joms-button--full-small" value="<?php echo "Submit";?>">
                </div>
            </form>
            <?php } ?>
        </div>
</div>



