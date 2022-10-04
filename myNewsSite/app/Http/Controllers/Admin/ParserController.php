<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use Illuminate\Http\Request;
use App\Contracts\ParserContract;
use App\Models\Source;
use \Illuminate\Http\Response;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     * @param ParserContract $parser
     * @param  Request  $request
     * @return Response
     */
    public function __invoke(Request $request, ParserContract $parser)
    {
        $urls = Source::all()->pluck('url');

        foreach($urls as $url) {
            dispatch(new JobNewsParsing($url));
        }

        return "Parsing complited";

    }
}
