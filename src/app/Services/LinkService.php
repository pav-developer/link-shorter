<?php

namespace App\Services;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkService
{

    public function __construct(protected Request $request)
    {
        //
    }
    public function generateToken(int $length = 7): string
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $token .= $chars[random_int(0, strlen($chars) - 1)];
        }

        return $token;
    }

    public function createLink(array $data): Link
    {
        $data = array_merge($data, [
            'token' => $this->generateToken(),
            'ip' => $this->request->ip(),
            'user_agent' => $this->request->userAgent()
        ]);

        return Link::create($data);
    }

}
