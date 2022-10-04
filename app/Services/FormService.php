<?php
namespace App\Services;

use App\DTO\FormDTO;
use Illuminate\Support\Facades\Log;

class FormService
{
    private array $users = [
        ['id' => 1, 'email' => 'nick@dev.loc', 'name' => 'Nick'],
        ['id' => 2, 'email' => 'katy@dev.loc', 'name' => 'Katy'],
        ['id' => 3, 'email' => 'john@dev.loc', 'name' => 'John'],
    ];

    /**
     * @return string Error message if fail and empty on success
     */
    public function process(FormDTO $formDTO): string
    {
        Log::debug(var_export($formDTO->toArray(), true));

        $emailsFromDB = collect($this->users)->pluck('email')->all();

        if (!in_array($formDTO->email, $emailsFromDB)) {
            return 'Email not found. Try ' . implode(', ', $emailsFromDB);
        }

        return '';
    }
}
