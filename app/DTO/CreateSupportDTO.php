<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

Class CreateSupportDTO {
    public function __construct(
        string $subject,
        string $status,
        string $body,
    ) {}

    public static function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->subject,
            'a',
            $request->body,
        );
    }
}
