<?php

namespace App\Observers\Entrant;

use App\Models\Entrant\Entrant;
use App\Models\User;
use Illuminate\Support\Str;

class EntrantObserver
{
    /**
     * Handle the Entrant "created" event.
     *
     * @param  \App\Models\Entrant\Entrant  $entrant
     * @return void
     */
    public function created(Entrant $entrant)
    {
        $tempPassword = Str::random(6);
        $createdUser = User::create([
            'name' => $entrant->name,
            'email' => $entrant->email,
            'password' => bcrypt($tempPassword),
            'account_confirmed' => false
        ]);
        $entrant->update(['user_id' => $createdUser->id]);
    }

    /**
     * Handle the Entrant "updated" event.
     *
     * @param  \App\Models\Entrant\Entrant  $entrant
     * @return void
     */
    public function updated(Entrant $entrant)
    {
        $entrant->user()->update([
            'name' => $entrant->name,
        ]);
    }

    /**
     * Handle the Entrant "deleted" event.
     *
     * @param  \App\Models\Entrant\Entrant  $entrant
     * @return void
     */
    public function deleted(Entrant $entrant)
    {
        //
    }

    /**
     * Handle the Entrant "restored" event.
     *
     * @param  \App\Models\Entrant\Entrant  $entrant
     * @return void
     */
    public function restored(Entrant $entrant)
    {
        //
    }

    /**
     * Handle the Entrant "force deleted" event.
     *
     * @param  \App\Models\Entrant\Entrant  $entrant
     * @return void
     */
    public function forceDeleted(Entrant $entrant)
    {
        //
    }
}
