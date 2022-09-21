<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client)
    {
        $client->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server'),
        ]);
    }

    public function suscribe(string $email, string $list = null) {
        
        $list ??= config('services.mailchimp.list');
        
        $response = $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed"
        ]);
        
        return $response;
    }
}