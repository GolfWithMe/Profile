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
            <h3 class="joms-page__title"><?php echo 'Blacklist Members'; ?></h3>
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
				$bid=$row->BlacklistID;
				//user
				$usr = CFactory::getUser($bid);
				//print_r($usr);
			?>
               <div class="joms-list__avatar">
                 <TR><TD><?php echo $nores; ?>. <?php echo $usr->name; ?> &nbsp;&nbsp;&nbsp;</TD><TD><input type="button" onclick="window.location='<?php echo CRoute::_('index.php?option=com_community&view=profile&task=blacklist&stepset=delmem&bid='.$row->uid); ?>';" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Delete";?>"></TD></TR>
               </div>
            
            <?php } ?>
        </table>
    <?php //} else { ?>
    <?php if($nores==0) { ?>
        <div class="cEmpty cAlert"><?php echo 'Your Blacklist is Empty'; ?></div>
    <?php } ?>
    </div>

    <div class="joms-gap"></div>
	<?php //print_r($rows);?>

    	<div id="joms-profile--information" class="joms-tab__content">
            <?php //if ( $rows ) { ?>
            <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=blacklist') ?>" method="POST" class="js-form">
                <legend class="joms-form__legend">Add New Members</legend>
                <div class="joms-form__group has-privacy" for="field2">
                    <span>Select Member</span>
                    <label>Search Member:</label>
                    <input type="text" name="searchkey" id="searchkey" class="joms-text" value="<?php echo $fieldset['searchkey']; ?>" />
                    <br />
                    <span><input type="submit" class="joms-button--neutral joms-button--full-small joms-button--smallest" value="<?php echo "Search";?>"></span>
                </div>
                <input type="hidden" name="stepset" value="search" />
                </form>
                <br />
                <?php if ( $fieldset['searchkey']!='' ) { ?>
                <form name="jsform-group-schedule" id="frmGroupSchedule" action="<?php echo CRoute::_('index.php?option=com_community&view=profile&task=blacklist') ?>" method="POST" class="js-form" >
                <div class="joms-form__group has-privacy" for="field2">
                    <span></span>
                    
                    <select class="joms-select" name="selmember" id="selmember" >
                    <option value="" >Select Member</option>
                    <?php foreach($searchrows as $srow) : ?>
                        <option value="<?php echo $srow->id; ?>" ><?php echo $srow->name; ?></option>
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
