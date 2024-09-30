<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * La vue racine utilisée par Inertia.
     */
    public function rootView(Request $request) // Changer protected en public
    {
        return 'app'; // Assurez-vous que cela correspond à votre vue Blade principale.
    }

    /**
     * Les données à partager avec toutes les pages.
     */
    public function share(Request $request) // Changer protected en public
    {
        return [
            'user' => $request->user(),
            // Ajoutez d'autres données à partager ici si nécessaire
        ];
    }
}
