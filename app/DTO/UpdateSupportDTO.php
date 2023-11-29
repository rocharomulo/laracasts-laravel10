<?php

namespace App\DTO;

use App\Http\Requests\StoreUpdateSupport;

Class UpdateSupportDTO {
    public function __construct(
        string $id,
        string $subject,
        string $status,
        string $body,
    ) {}

    public static function makeFromRequest(StoreUpdateSupport $request): self
    {
        return new self(
            $request->id,
            $request->subject,
            'a',
            $request->body,
        );
    }
}
