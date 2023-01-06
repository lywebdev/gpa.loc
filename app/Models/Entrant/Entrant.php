<?php

namespace App\Models\Entrant;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name Имя абитуриента
 * @property string $surname Фамилия
 * @property string $patronymic Отчество
 * @property string $birthdate Дата рождения
 * @property string $phone Номер телефона
 * @property string $email Email
 * @property string $citizenship Гражданство
 * @property string $passport_number Номер паспорта
 * @property User $user Привязанный пользователь в системе
 */
class Entrant extends Model
{
    use HasFactory;

    protected $table = 'entrants';

    protected $guarded = [];

    public $timestamps = false;


    public const CITIZENSHIP_RUSSIA = 'РФ';
    public const CITIZENSHIP_UKRAINE = 'Украина';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Mutators
    public function setPhoneAttribute(?string $phone)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/', '', $phone);
    }


    public static function getCitizenshipList()
    {
        return [
            self::CITIZENSHIP_RUSSIA => self::CITIZENSHIP_RUSSIA,
            self::CITIZENSHIP_UKRAINE => self::CITIZENSHIP_UKRAINE
        ];
    }
}
