<?php
defined('_JEXEC') or die('Restricted access');

class igGeneralHelper
{
    static function authorise($action, $catid=null, $imgId=null, $profileId=0, $ownerId=0)
    {
    	$assetName = 'com_igallery';

    	if($profileId != 0 && $ownerId != 0)
        {
            $assetName = 'com_igallery.profile.'.$profileId;
        }
        else
        {
            if(!empty($catid) )
            {
                $db	= JFactory::getDBO();
                $query = 'SELECT * FROM #__igallery WHERE id = '.(int)$catid;
                $db->setQuery($query);
                $category = $db->loadObject();
                $assetName = 'com_igallery.profile.'.$category->profile;
                $ownerId = $category->user;
            }

            else if(!empty($imgId))
            {
                $db	= JFactory::getDBO();
                $query = $db->getQuery(true);

                $query->select('i.gallery_id, i.user');
                $query->from('#__igallery_img AS i');

                $query->select('c.profile');
                $query->join('INNER', '`#__igallery` AS c ON c.id = i.gallery_id');

                $query->where('i.id = '. (int)$imgId);

                $db->setQuery($query);
                $row = $db->loadObject();
                $assetName = 'com_igallery.profile.'.$row->profile;
                $ownerId = $row->user;
            }

        }

        if(!JFactory::getUser()->authorise($action, $assetName))
        {
	        //backend edit.own category
	        if($action == 'core.edit' && !empty($catid) )
	        {
	        	if(JFactory::getUser()->authorise('core.edit.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}	
	        }

        	//backend edit.own image
        	if($action == 'core.edit' && !empty($imgId) )
	        {
	        	if(JFactory::getUser()->authorise('core.edit.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}	
	        }

	        //frontend edit.own category
	        if($action == 'core.igalleryfront.edit' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.edit.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend edit.state.own category
	        if($action == 'core.igalleryfront.edit.state' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.edit.state.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend delete.own category
	        if($action == 'core.igalleryfront.delete' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.delete.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend upload.own category
	        if($action == 'core.igalleryfront.upload' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.upload.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend edit.own image
	        if($action == 'core.igalleryfront.editimage' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.editimage.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend edit.state.own image
	        if($action == 'core.igalleryfront.editimage.state' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.editimage.state.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }

	        //frontend delete.own image
	        if($action == 'core.igalleryfront.deleteimage' && !empty($ownerId) )
	        {
	        	if(JFactory::getUser()->authorise('core.igalleryfront.deleteimage.own', $assetName))
        		{
        			if($ownerId == JFactory::getUser()->id)
        			{
        				return true;
        			}
        		}
	        }
        	
            return false;
        }
        
        return true;
    }
    
}