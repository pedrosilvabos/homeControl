<?php
namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimeController extends Controller
{
    /**
     * Returns the string naming the timezone currently in
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //cheias 8:00 -> 9:30
        //ponta 9:30 -> 11:00
        //cheias 11:00 -> 17:30
        //ponta 17:30 -> 20:00
        //cheias 20:00 -> 22:00
        //vazio normal 22:00 -> 1:30
        //super vazio 01:30 -> 5:30
        //vazio normal 05:30 -> 8:00


        $myTime = Carbon::now();

        $currentTime = $myTime->toTimeString();
        $savingHours = [
        'cheias' => ['8:00', '11:00', '20:00'],
        'ponta' => ['9:30', '17:30'],
        'vazioNormal' => ['5:30', '22:00'],
        'superVazio' => ['01:30']
        ];

        foreach ($savingHours as $timezone)
        {
            foreach ($timezone as $hour)
            {

                $stringCreator = 'Today ' . $hour;
                $lowPowerCost = Carbon::parse($stringCreator);

                $lowPowerCostTime = $lowPowerCost->toTimeString();
                $isInSavingTime = ($myTime->lt($lowPowerCost));

                if (empty($isInSavingTime))
                {
                    $retVal = array_search($timezone, $savingHours);
                    return $retVal;
                    break;
                }
            }

        }

    }
}

