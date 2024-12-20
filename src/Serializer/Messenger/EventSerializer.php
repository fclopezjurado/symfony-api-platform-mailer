<?php

namespace Mailer\Serializer\Messenger;

use Mailer\Messenger\Message\RequestResetPasswordMessage;
use Mailer\Messenger\Message\UserRegisteredMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Serialization\Serializer;

class EventSerializer extends Serializer
{
    public function decode(array $encodedEnvelope): Envelope
    {
        $encodedEnvelope['headers']['type'] = $this->translateType($encodedEnvelope['headers']['type']);

        return parent::decode($encodedEnvelope);
    }

    private function translateType(string $type): string
    {
        $map = [
            'App\Messenger\Message\UserRegisteredMessage' => UserRegisteredMessage::class,
            'App\Messenger\Message\RequestResetPasswordMessage' => RequestResetPasswordMessage::class,
        ];

        if (array_key_exists($type, $map)) {
            return $map[$type];
        }

        return $type;
    }
}