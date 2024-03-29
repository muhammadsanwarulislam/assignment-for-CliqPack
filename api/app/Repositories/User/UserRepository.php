<?php

namespace Repository\User;

use App\Models\User;
use Repository\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository
{

    public function model()
    {
        return User::class;
    }

    protected function applyDefaultCriteria($query)
    {
        parent::applyDefaultCriteria($query);
        $query->where('id', '<>', Auth::id());
    }

    protected function getSearchFields()
    {
        return ['username', 'email'];
    }

    public function generateAccessToken(User $user): string
    {
        return $user->createToken('authToken')->accessToken;
    }

    public function generateDefaultPassword(): string
    {
        return 'password';
    }

    public function updateOrCreate(string $email, array $modelData)
    {
        $existingRecord = $this->model()::where('email', $email)->first();

        if ($existingRecord) {
            $existingRecord->update($modelData);
        } else {
            $this->model()::create(array_merge(['email' => $email], $modelData));
        }
    }

}
