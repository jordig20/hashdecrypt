<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Spintax;
use Illuminate\Http\Request;
use PhpParser\Parser;

class HashController extends Controller
{
    public function url() {

        $text = request()->text;
        $hash = request()->hash;

        $url = '/'.$hash.'/'.$text.'/textplain/'.$text;
        return redirect($url);
    }

    //
    public function sha1(String $hash,String $textPlain){
        $output = "";

        foreach (hash_algos() as $v) {
            $r = hash($v, $textPlain, false);
            $output .= printf("<p>%-12s %3d %s</p>\n", $v, strlen($r), $r);
        }

        return $output;
    }


    public function hash(String $hash, String $encrypt,String $textPlain){
        //si hem trolejes el hash et dono un error
        if(!in_array($hash,hash_algos())){
            return abort(404);
        }

        //Si el hash no coincideix amb el textPlain et redirigeixo cap a la url bona, evita indexar brossa
        if($encrypt != hash($hash, $textPlain, false)){
            return  redirect()->route('hashpage', ['hash' => $hash,
                'encrypt' => hash($hash, $textPlain, false),
                'textPlain' => $textPlain
            ]);
        }

        $dades = array();
        //$arrayHash = array("md5","sha1","sha256","sha512");
        //foreach ($arrayHash as $v) {
        foreach (hash_algos() as $v) {
            $r = hash($v, $textPlain, false);
            array_push($dades,array($v,strlen($r), $r));
        }

        $comments = Comment::all();

        $spintax = new Spintax();
        $spinText = "{Benvingut a Hashdecrypt | Ben acollit a Hashdecrypt } - {La web | El lloc} per encriptar qualsevol text - $textPlain";

        return view('hashpage',[
            'dades' => $dades,
            'textPlain' => $textPlain,
            'encrypt' => $encrypt,
            'hash' => $hash,
            'comments' => $comments,
            'spin' => $spintax->process($spinText)
        ]);
    }

}
