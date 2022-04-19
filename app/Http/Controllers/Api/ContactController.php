<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Mail\NewContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    //In questo metodo gestisco i dati che arrivano dal form di front end per un nuovo contatto
    public function store(Request $request)
    {

        //inserisco tutti i valori in una mia variabile "data"
        $data = request()->all();


        //a differenza del back end utilizzo l'oggetto Validator
        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        //Gestisco il caso in cui la validazione fallisca
        if ($validator->fails()) {

            //voglio che mi ritorni un json con lo stato della richiesta, e con gli errori che l'hanno fatta fallire
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        //Gestisco il caso in cui la validazione abbia successo
        else {
            //creo un nuovo oggetto di tipo Lead e lo compilo con i dati (validi) del form
            $lead = new Lead();
            $lead->fill($data);
            //salva nel database
            $lead->save();

            //invio effettivo della mail all'amministrazione (intercettata da Mailtrap)
            Mail::to('supporto@boolpress.com')->send(new NewContact($lead));

            //comunica al front end che la richiesta è andata a buon fine
            return response()->json([
                'succes' => true
            ]);
        }
    }
}
