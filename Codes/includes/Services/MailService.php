<?php

class MailService{
    public static function mailTo($to, $subject, $message){
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <webmaster@example.com>' . "\r\n";
        $headers .= 'Cc: myboss@example.com' . "\r\n";
        mail($to,$subject,$message,$headers);
    }
    
    public static function priceChangeNotification($listing){
        $subject = "Price change for ".$listing->getTitle()." from HDB Market";

        $message = "
        <html>
        <head>
        <title>Price change for ".$listing->getTitle()." from HDB Market</title>
        </head>
        <body>
        <p>The price of the listing \"".$listing->getTitle()."\" has changed. Please follow this <a href=\"http://172.21.148.163/property/view/".$listing->getId()."\" to check with the price!!</p>
        </body>
        </html>
        ";
        $watchlists = WatchlistQuery::create()->filterByListingId($listing->getId())->find();
        foreach($watchlists as $v){
            $user = NormalUserQuery::create()->findPK($v->getUserId());
            $this->mailTo($user->getEmail(), $subject, $message);
        }
    }
}