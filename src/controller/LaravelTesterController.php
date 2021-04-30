<?php

namespace Mhidea\laraveltester\controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use ReflectionClass;
use ReflectionFunction;
use ReflectionMethod;
use Illuminate\Routing\Controller;

class LaravelTesterController extends Controller
{

    /**
     * LaravelTester Home page
     *
     * You can view all routes and test them quickly.
     *
     * @return view
     **/
    public function index()
    {
        $routes = Route::getRoutes();

        return view("laraveltester::index", ["routes" => $routes]);
    }

    /**
     * Get details of a route
     *
     * Send the view of a route to be loaded in request pane.
     *
     * @param  \Illuminate\Http\Request  $request
     
     * @return view
     **/
    public function request(Request $request)
    {

        $request->validate([
            'uri' => 'required',
            'method' => 'required'
        ]);
        /*
        $route = collect(\Route::getRoutes())->first(function ($route) use ($request) {
            return $route->matches(request()->create($request->uri, $request->method));
        });
*/

        $route = null;
        $rs = Route::getRoutes();
        foreach ($rs as $key => $value) {
            if ($value->uri == $request->uri && $value->methods[0] == $request->method) {
                $route = $value;
                break;
            }
        }
        $variables = array();
        $optionalvariables = array();

        preg_match_all('/\{(\w*?)\}/', $route->uri, $variables);

        preg_match_all('/\{(\w+?)\?\}/', $route->uri, $optionalvariables);


        $line = '';
        $queryParams = array();
        $bodyParams = array();
        $urlParams = array();
        $doc = array();
        if ($route->getActionName() === "Closure") {
            $f = new ReflectionFunction($route->action['uses']);
            $line = $f->getFileName() . ":" . $f->getStartLine();
            $line = "vscode://file/" . urlencode($line);
        } else {
            $s = explode("@", $route->getActionName());
            if (count($s) > 1) {

                $reflector = new ReflectionClass($s[0]);
                $mr = new ReflectionMethod($s[0], $s[1]);
                $line = $mr->getFileName() . ":" . $mr->getStartLine();
                $line = "vscode://file/" . urlencode($line);
                $matches = [];
                $docstring = $reflector->getMethod($s[1])->getDocComment();
                preg_match_all('/^.*queryParam\s+(\S+)\s+(.*)$/m', $docstring, $matches);
                for ($i = 0; $i < count($matches[1]); $i++) {
                    array_push($queryParams, [$matches[1][$i], $matches[2][$i]]);
                }
                $matches = [];
                preg_match_all('/^.*bodyParam\s+(\S+)\s+(\S+)?(.*)$/m', $docstring, $matches);
                for ($i = 0; $i < count($matches[1]); $i++) {
                    $matchedArray = explode(".", $matches[1][$i]);
                    $matchedString = $matchedArray[0];
                    for ($j = 1; $j < count($matchedArray); $j++) {
                        $matchedString = $matchedString . "[" . $matchedArray[$j] . "]";
                    }
                    array_push($bodyParams, [$matchedString, $matches[2][$i], $matches[3][$i]]);
                }
                $matches = [];
                preg_match_all('/^.*urlParam\s+(.+)\s+(\S*)$/m', $docstring, $matches);
                for ($i = 0; $i < count($matches[1]); $i++) {
                    array_push($urlParams, [$matches[1][$i], $matches[2][$i]]);
                }
                $matches = [];
                preg_match_all('/^(.*)$/m', $docstring, $doc);
            }
            $doc = array_filter(
                $doc[1],
                function ($value, $key) {
                    return (strlen(str_replace(" ", "", $value)) > 1) &&
                        !strpos($value, "@param");
                },
                ARRAY_FILTER_USE_BOTH
            );
        }



        return view("laraveltester::request", [
            "route" => $route, "doc" => $doc, "urlParams" => $urlParams, "queryParams" => $queryParams, "bodyParams" => $bodyParams, "line" => $line, "variables" => $variables[1], "optionalvariables" => $optionalvariables[1]
        ]);
    }
}
