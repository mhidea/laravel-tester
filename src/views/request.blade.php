<div class="flexcoloumn">
    <div class="fw">
        <table>
            <tr>
                <td>name</td>
                <td class="wrap">
                    {{$route->getName()}}
                </td>
            </tr>
            <tr>
                <td>uri</td>
                <td class="wrap">
                    {{$route->uri()}}
                </td>
            </tr>
            <tr>
                <td>action method</td>
                <td>
                    <a href="{{$line}}" class="wrap">
                        {{$route->getActionName()}}
                    </a>
                </td>
            </tr>
            <tr>
                <td>methods</td>
                <td class="wrap">
                    {{implode(", ",$route->methods)}}
                </td>
            </tr>
            <tr>
                <td>middlewares</td>
                <td class="wrap">
                    {{implode(", ",$route->gatherMiddleware())}} </td>
            </tr>
        </table>
    </div>
    <div class="fw">
        <button id="btnsend" onclick="sendRequest(event)">send
        </button>

    </div>
    <div class="fw">
        <p>
            @foreach($doc as $row)
            {{$row}}<br>
            @endforeach
        </p>
    </div>
    <div class="fw">
        <div class="flexrow">
            <div class="toggler-active strechable" name="requesttoggler" data-target="requestbody"
                onclick="toggle(event)">
                body / params
            </div>
            <div class="toggler strechable" name="requesttoggler" data-target="requestheader" onclick="toggle(event)">
                header
            </div>
        </div>
    </div>
    <div name="requesttoggler" id="requestbody" class="toggle-active strechable ">
        @if($variables)
        <div class="formtitle">urlparams</div>

        <form class="fw formurlparams" id="formurlparams">
            @foreach($variables as $m)
            <div class="form-row">
                <label>{{$m}}</label>
                <input name="{{$m}}" type="text">
                <div class="wrap">url param</div>

            </div>
            @endforeach
        </form>
        @endif

        @if($optionalvariables)
        <div class="formtitle">optional urlparams</div>

        <form class="fw" id="formoptional">
            @foreach($optionalvariables as $m)
            <div class="form-row">
                <div>{{$m}}</div>
                <input name="{{$m}}" type="text">
                <div class="wrap">url param</div>

            </div>
            @endforeach
        </form>
        @endif



        @if($urlParams)
        <div class="formtitle">urlParams</div>

        <form class="fw " id="urlParams">
            @foreach($urlParams as $Param)
            <div class="form-row">
                <div>{{$Param[0]}}</div>
                <input name="{{$Param[0]}}" type="text">
                <div class="wrap">{{$Param[1]}} </div>

            </div>
            @endforeach
        </form>
        @endif

        @if($queryParams)
        <div class="formtitle">queryParams</div>

        <form class="fw " id="queryParams">
            @foreach($queryParams as $Param)
            <div class="form-row">
                <div>{{$Param[0]}}</div>
                <input name="{{$Param[0]}}" type="text">
                <div class="wrap">{{$Param[1]}} </div>

            </div>
            @endforeach
        </form>
        @endif

        @if($bodyParams)
        <div class="formtitle">bodyParams</div>

        <form class="fw " id="bodyParams">
            @csrf
            @foreach($bodyParams as $Param)
            @if(strtolower($Param[1])=="object")
            <div class="form-row">
                <div>{{$Param[0]}}</div>
                <input name="{{$Param[0]}}" type="text" disabled>
                <div class="wrap">{{$Param[1].$Param[2]}} </div>
            </div>
            @else
            <div class="form-row">
                <div>{{$Param[0]}}</div>
                <input name="{{$Param[0]}}" type="text">
                <div class="wrap">{{$Param[1].$Param[2]}} </div>
            </div>
            @endif
            @endforeach
        </form>
        @endif

    </div>

    <div name="requesttoggler" id="requestheader" class="toggle fw strechable">
        <table>

            @foreach(config('laravel-tester.headers.default') as $key =>$value)
            <tr class="fw">
                <td class="requestheaderkey">{{$key}}</td>
                <td>
                    <input name="{{$key}}" data-value="{{$value}}" class="requestheadervalue" type="text">
                </td>
            </tr>
            @endforeach


            @foreach(config('laravel-tester.headers.api') as $key =>$value)
            <tr class="fw">
                <td class="requestheaderkey">{{$key}}</td>
                <td>
                    <input name="{{$key}}" data-value="{{$value}}" class="requestheadervalue" type="text">
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>