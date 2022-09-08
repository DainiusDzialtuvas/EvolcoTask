<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
//require __DIR__ . "/../../../vendor/autoload.php";

class TwitterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function getTweetPDF()
    {
        $correctID = false;
        $IDArray = [100];
        while (!$correctID){
        for ($i = 0; $i < 100; $i++){
        $IDArray[$i] = rand(1228393702244134912, 1228393702244134912); //1228393702244134912
        }
        $url = "https://api.twitter.com/2/tweets?ids=$IDArray[0],$IDArray[1],$IDArray[2],$IDArray[3],$IDArray[4],$IDArray[5],$IDArray[6],$IDArray[7],$IDArray[8],$IDArray[9],$IDArray[10],$IDArray[11],$IDArray[12],$IDArray[13],$IDArray[14],$IDArray[15],$IDArray[16],$IDArray[17],$IDArray[18],$IDArray[19],$IDArray[20],$IDArray[21],$IDArray[22],$IDArray[23],$IDArray[24],$IDArray[25],$IDArray[26],$IDArray[27],$IDArray[28],$IDArray[29],$IDArray[30],$IDArray[31],$IDArray[32],$IDArray[33],$IDArray[34],$IDArray[35],$IDArray[36],$IDArray[37],$IDArray[38],$IDArray[39],$IDArray[40],$IDArray[41],$IDArray[42],$IDArray[43],$IDArray[44],$IDArray[45],$IDArray[46],$IDArray[47],$IDArray[48],$IDArray[49],$IDArray[50],$IDArray[51],$IDArray[52],$IDArray[53],$IDArray[54],$IDArray[55],$IDArray[56],$IDArray[57],$IDArray[58],$IDArray[59],$IDArray[60],$IDArray[61],$IDArray[62],$IDArray[63],$IDArray[64],$IDArray[65],$IDArray[66],$IDArray[67],$IDArray[68],$IDArray[69],$IDArray[70],$IDArray[71],$IDArray[72],$IDArray[73],$IDArray[74],$IDArray[75],$IDArray[76],$IDArray[77],$IDArray[78],$IDArray[79],$IDArray[80],$IDArray[81],$IDArray[82],$IDArray[83],$IDArray[84],$IDArray[85],$IDArray[86],$IDArray[87],$IDArray[88],$IDArray[89],$IDArray[90],$IDArray[91],$IDArray[92],$IDArray[93],$IDArray[94],$IDArray[95],$IDArray[96],$IDArray[97],$IDArray[98],$IDArray[99]&tweet.fields=created_at&expansions=author_id&user.fields=created_at";
        $curl = curl_init($url);
        curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer AAAAAAAAAAAAAAAAAAAAAF%2F8bgEAAAAAOfhMFG48XB9icptVc1haxQQneao%3DS5ZHupgdZNPYJPGwThrlJOBqgfwNXZPoIurBCpXWyK9PMPcGlT"
        ),
        ));

        $result = curl_exec($curl); 
        curl_close($curl);
        $result = json_decode($result, true);
        if (array_key_exists('data', $result))
        {
        $correctID = true;
        view()->share('result', $result);
        //dump($result['data'][0]['text']);
        }

    }
    $pdf = PDF::loadView('tweet');
        return $pdf->download('tweet.pdf');
    }

}
