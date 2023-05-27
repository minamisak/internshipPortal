<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\User;

class UserImporter implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     * @return User|null
     */
    public function model(array $row)
    {
        $user = User::where('email', $row['email'])->first();

        if ($user) {
            $user->name = $row['name'];
            $user->type = $row['type'];
            $user->industry = $row['industry'];
            $user->save();
        } else {
            $user = new User([
                'name' => $row['name'],
                'email' => $row['email'],
                'type' => $row['type'],
                'industry' => $row['industry'],
                'password' => '123456',
            ]);
            $user->save();
        }

        return $user;
    }
}

