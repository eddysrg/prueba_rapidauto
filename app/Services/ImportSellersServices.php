<?php

namespace App\Services;

use App\Models\Seller;
use Exception;
use Illuminate\Support\Facades\Http;

class ImportSellersServices
{
    public function import($lotId) 
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/users');

        if($response->failed()) {
            throw new Exception("Error al conectar con la API");
        }

        $users = $response->json();
        $count = 0;

        foreach($users as $user) {
            Seller::updateOrCreate(
                ['email' => $user['email']],
                [
                    'external_id' => $user['id'],
                    'name' => $user['name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'address' => $user['address'],
                    'phone' => $user['phone'],
                    'website' => $user['website'],
                    'company' => $user['company'],
                    'lot_id' => $lotId
                ],
            );

            $count++;
        }

        return $count;
    }
}