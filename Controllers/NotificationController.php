<?php

require_once 'Notification.php';
require_once 'Model/NotificationModel.php';

/**
 * Controller for notifications
 */
 class NotificationController extends Controller
 {
 	function __construct()
 	{
 		# code...
 	}

 	public function create($notification='')
 	{
 		// return NotificationModel::create($notification);
 		return 0;
 	}

 	public function receive()
 	{
 		// return NotificationModel::getNotifications();
 		return 0;
 	}

 	public function view($id='')
 	{
 		// return NotificationModel::getNotificationById($id);
 		return 0;
 	}

 	public function dismiss($id='')
 	{
 		// check for notifications that are not read
 		// if all read then delete
 		// return NotificationModel::delete($id);
 		return 0;
 	}
 }