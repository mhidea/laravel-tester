<div class="selectmiddleware">
    <div class="middlewaretype selected">ALL</div>
    <div class="middlewaretype">WEB</div>
    <div class="middlewaretype">API</div>
</div>
<input id="searchfield" oninput="search(event)">
</input>
<div class="strechable">
    <table>
        <tr>
            <th>Method{{config('laravel-tester.api_middleware_name')}}</th>
            <th>name/uri</th>
            <th>api/web</th>
        </tr>
        @foreach ($routes as $route)
        @php
        $type=in_array(config('laravel-tester.api_middleware_name','api'),$route->gatherMiddleware())?"API":(in_array(config('laravel-tester.web_middleware_name','web'),$route->gatherMiddleware())?"WEB":"NONE");
        @endphp
        <tr class="routelistitem" name="{{$type}}" data-uri="{{$route->uri()}}" data-method="{{$route->methods[0]}}">
            <td class="routelistname">{{$route->methods[0]}}</td>
            <td>
                {{$route->getName()??$route->uri()}}
            </td>
            <td class="routelistmiddleware">{{$type}}
            </td>

        </tr>
        @endforeach
    </table>
</div>