<?php
 
class Notification 
{
    
    private $notification;
    
    public function __construct($notification)
    {
	$this->notification = $notification;
    }
    
    public function __get($param)
    {
	switch ($param)
	{
	    case "idNotification":
		return $this->notification['idNotification'];
	    case "text":
		return $this->notification['text'];
	    case "title":
		return $this->notification['title'];
	    case "urgency":
		return $this->notification['urgency'];
	    case "idUserSend":
		return $this->notification['idUserSend'];
	    case "idUserReceive":
		return $this->notification['idUserReceive'];	 	    
	}
    }

}