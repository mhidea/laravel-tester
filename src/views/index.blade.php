<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaravelTester</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        .wrap {
            white-space: -moz-pre-wrap !important;
            white-space: -pre-wrap;
            white-space: -o-pre-wrap;
            white-space: pre-wrap;
            word-wrap: break-word;
            white-space: -webkit-pre-wrap;
            word-break: break-all;
            white-space: normal;
        }

        body {
            position: relative;
            height: 100vh;
            width: 100vw;
            margin: 0;
            background-color: #fff;
            color: #1f2020;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            overflow-x: hidden;

        }

        .flexrow {
            display: flex;
            flex-direction: row;
            overflow-x: hidden;
        }

        .flexcoloumn {
            display: flex;
            flex-direction: column;
            overflow-y: hidden;
        }

        .strechable {
            flex: 1;
            overflow: hidden;
        }

        .header {
            width: 100%;
            font-size: 56px;
            color: lightcoral;
            text-align: center;

        }

        .content {
            position: relative;
            flex: 1;
            overflow: hidden;
        }

        .list-col,
        .request-col,
        .response-col {
            float: left;
            height: 100%;
            width: 33.33%;
            position: relative;
            overflow-y: auto;
            background-color: #cecece;
        }



        .request-col {
            border-left: 1px solid lightcoral;
            border-right: 1px solid lightcoral;

        }

        .col-title {
            text-align: center;
            width: 100%;
            font-size: larger;
            background-color: lightcoral;
            color: white;
        }

        .routelistname {
            width: 15%;
            color: teal;
            font-weight: bold;
        }

        .routelistmiddleware {
            width: 15%;
            color: rgb(184, 158, 14);
        }

        table,
        th,
        tr,
        td {
            text-align: left;
            color: black;
            word-wrap: break-word;
        }

        tr {
            border-bottom: 1px solid #acabab;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .form-row {
            width: 100%;
            display: flex;
            flex-direction: row;
            margin-bottom: 5px;
        }

        .form-row div,
        label {
            width: 30%;
            text-align: center;
            border-bottom: 1px solid slategrey;
        }

        .form-row:last-child {
            border-bottom: 1px solid seagreen;

        }

        .formtitle {
            text-align: center;
            color: seagreen;
            font-weight: bold;
        }

        .form-row input {
            width: 40%;
        }

        tr.active {
            background-color: #e0e0e0;
            font-weight: bolder;
            font-weight: bold;
        }

        .selectmiddleware {
            background-color: lightsteelblue;
            display: grid;
            grid-template-columns: auto auto auto;
        }

        .middlewaretype {
            background-color: transparent;
            text-align: center;
            color: black;
            transition: 1s;
        }

        .middlewaretype.selected {
            background-color: teal;
            border-bottom: 2px solid #01443f;
            text-align: center;
            color: white;
        }

        .d-none {
            display: none;
        }

        .notsearched {
            display: none;

        }

        .jsonkey,
        .jsonkey-off {
            color: black;
            position: relative;
            padding-left: 10%;
        }

        .keytitle {
            cursor: pointer;
        }

        .jsonkey-off div {
            display: none;
            background-color: aquamarine;
        }

        .jsonkey .keytitle::before {
            content: "-";
            margin-right: 5px;

        }

        .jsonkey-off .keytitle::before {
            content: "+";
            margin-right: 5px;
        }

        .jsonkey-off::after {
            content: "{...}";
        }

        .objectvalue {
            position: relative;
        }

        .stringvalue {
            color: orangered;
            margin-left: .5rem;
        }


        .fh {
            height: 100%;
        }

        .toggle-active {
            width: 100%;
            height: 90%;
            padding-bottom: 5px;
            overflow: auto;
        }

        .resultheader {
            color: black;
        }


        .toggle {
            display: none
        }

        .toggler {
            background-color: lightsteelblue;
            text-align: center;
            color: black;
        }

        .fw {
            width: 100%;
        }

        .hw {
            width: 50%;
        }

        .toggler-active {
            background-color: teal;
            border-bottom: 2px solid #01443f;
            text-align: center;
            color: white;
        }

        .danger {
            background-color: red;
            color: white;
        }

        .success {
            background-color: green;
            color: white;
        }

        .statusdanger {
            color: red;
            font-weight: bold;
        }

        .statussuccess span,
        .statusdanger span {
            color: black;
            font-weight: normal;
            margin-left: 10px;
        }

        .statussuccess {
            color: green;
            font-weight: bold;
        }



        #modal {
            position: absolute;
            right: -80vw;
            top: 10vh;
            width: 80vw;
            height: 80vh;
            background-color: white;
            border: 1px solid teal;
            transition: 1s;
            overflow-y: auto;
            overflow-x: hidden;
            word-wrap: break-word;
            padding: 0;
            z-index: 7;
        }

        .shadow {
            display: none;
            width: 100vw;
            height: 100vh;
            background-color: #636b6f;
            opacity: .5;
            position: absolute;
            z-index: 5;
        }

        .form-inline {
            display: flex;
            flex-flow: row wrap;
            align-items: center;
            padding: 20px 10px;
        }

        /* Add some margins for each label */
        .form-inline label {
            float: left;
            width: 40%;
        }

        #btnsend {
            background-color: darkcyan;
            border-radius: 50px;
            font-size: 1.5rem;
            padding: .2rem 1.5rem;
            border: none;
            outline: none;
            float: right;
            margin: auto;
        }

        a {
            word-wrap: break-word;
        }

        #btnsend:hover {
            background-color: rgb(3, 99, 99);
            padding: .2rem 1.4rem;
        }

        #btnsend:disabled {
            background-color: rgb(41, 56, 56);
            color: white;
            padding: .2rem 1.4rem;
        }

        /* Style the input fields */
        .form-inline input {
            width: 50%;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        #searchfield {
            width: 90%;
            margin-left: 5%;
        }

        .bigsize {
            position: absolute;
            width: 200%;
            height: 200%;
        }

        .fa-github {
            color: black;
            text-decoration: none;
        }

        .fa-github:hover {
            color: lightcoral;
        }

        .fa.fa-arrows-alt {
            position: absolute;
            left: 5px;
            line-height: 24px;
            vertical-align: middle;
        }

        .fa-arrows-alt:hover {
            color: black;
        }

        @media screen and (max-width: 800px) {
            .content {
                position: relative;
                flex: 1;
                overflow: auto;
                margin-bottom: 10px;

            }

            .list-col,
            .request-col,
            .response-col {
                width: 100%;
                padding: 0;
            }



        }
    </style>
</head>


<body class="flexcoloumn">
    <div class="shadow" id="shadow" onclick="togglesettings(event)">
    </div>
    <div id="modal">
    </div>
    <div class="header">
        LaravelTester
        <a class="fa fa-github" aria-hidden="true" href="https://github.com/mhidea/laravel-tester"></a>

    </div>
    <div class="content strechable">
        <div class="list-col">
            <div class="col-title">routes list</div>
            @include('laraveltester::list')
        </div>
        <div class="request-col">
            <div class="col-title">request</div>
            <div id="request-content"></div>
        </div>
        <div class="response-col">
            <div class="col-title">response</div>
            <div id="response-content">
                @include('laraveltester::response')
            </div>
        </div>
    </div>
    </div>
    <script>
        function bigsize(event) {
            event.preventDefault()
            document.getElementById("modal").innerHTML = document.getElementById("result").innerHTML
            if (event.target.id == "expand-result") {
                document.getElementById("modal").style.right = "10vw"
                document.getElementById("shadow").style.display = "block"
            }
        }
        function search(event) {
            event.preventDefault()
            var elements = document.getElementsByClassName("routelistitem")

            for (let i = 0; i < elements.length; i++) {
                if (event.target.value.length === 0) {
                    elements[i].className = elements[i].className.replace("routelistitem notsearched", "routelistitem")
                } else if (!elements[i].getAttribute('data-uri').includes(event.target.value)) {
                    if (!elements[i].className.includes("notsearched")) {
                        elements[i].className = elements[i].className.replace("routelistitem", "routelistitem notsearched")
                    }
                } else {
                    elements[i].className = elements[i].className.replace("routelistitem notsearched", "routelistitem")

                }


            }
        }
        function togglesettings(event) {
            event.preventDefault
            if (event.target.id == "setting-icon") {
                document.getElementById("shadow").style.display = "block"
            } else if (event.target.id == "shadow") {
                document.getElementById("shadow").style.display = "none"
                document.getElementById("modal").style.right = "-80vw"
            }
        }
        var middlewares = document.getElementsByClassName("middlewaretype");
        for (var i = 0; i < middlewares.length; i++) {
            middlewares[i].addEventListener('click', function (event) {
                var current = document.getElementsByClassName("selected");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" selected", "");
                }
                var current = document.getElementsByClassName("routelistitem");
                for (let index = 0; index < current.length; index++) {
                    current[index].className = current[index].className.replace("d-none routelistitem", "routelistitem");

                }
                this.className += " selected";
                switch (this.innerHTML) {
                    case "API":
                        current = document.getElementsByName("WEB");
                        for (let index = 0; index < current.length; index++) {
                            current[index].className = current[index].className.replace("routelistitem", "d-none routelistitem");
                        }
                        current = document.getElementsByName("NONE");
                        for (let index = 0; index < current.length; index++) {
                            current[index].className = current[index].className.replace("routelistitem", "d-none routelistitem");
                        }
                        break;
                    case "WEB":
                        current = document.getElementsByName("API");
                        for (let
                            index = 0; index < current.length; index++) {
                            current[index].className = current[index].className.replace("routelistitem", "d-none routelistitem");
                        }
                        current = document.getElementsByName("NONE");
                        for (let index = 0; index < current.length; index++) {
                            current[index].className = current[index].className.replace("routelistitem", "d-none routelistitem");
                        }
                        break;
                    default:
                        break;
                }
            });
        } var
            elements = document.getElementsByClassName("routelistitem");
        for (var i = 0; i < elements.length; i++) {
            elements[i].addEventListener('click', function (event) {
                var current = document.getElementsByClassName("active");
                if (current.length > 0) {
                    current[0].className = current[0].className.replace(" active", "");
                }
                this.className += " active";
                const Http = new XMLHttpRequest();
                const url =
                    "{{route('laraveltester.request')}}" + "?uri=" + this.dataset.uri + "&method=" + this.dataset.method;
                Http.open("GET", url);
                Http.send();
                Http.onreadystatechange = (e) => {
                    document.getElementById("request-content").innerHTML = Http.responseText;
                    const values = document.getElementsByClassName("requestheadervalue");
                    for (let index = 0; index < values.length; index++) {
                        if (values[index].getAttribute('data-value').includes("testertoken")) {
                            values[index].value = localStorage.getItem(values[index].name, "");
                        } else {
                            values[index].value = values[index].getAttribute('data-value')
                        }
                    }
                }
            });
        }
        //
        function toggle(e) {
            var elements = document.getElementsByName(e.target.getAttribute("name"))
            elements.forEach(element => {
                element.className = element.className.replace("toggle-active", "toggle")
                element.className = element.className.replace("toggler-active", "toggler")
            });
            e.target.className = e.target.className.replace("toggler", "toggler-active")
            let elm = document.getElementById(e.target.getAttribute("data-target"))
            elm.className = elm.className.replace("toggle", "toggle-active");
        }
        function collapse(event) {
            event.preventDefault()
            if (event.target.parentElement.className.trim() === "jsonkey") {
                event.target.parentElement.className = "jsonkey-off"
            } else {
                event.target.parentElement.className = "jsonkey"

            }

        }
        function jToh(param) {
            if (typeof (param) == "object") {
                let r = ""
                for (var key in param) {
                    let c = typeof (param[key]) == "object" ? "class='keytitle' onclick='collapse(event)'" : ""
                    r += "<div class='jsonkey'> <span " + c + ">" + key + ":</span>" + jToh(param[key]) + "</div>";
                }
                return r;
            } else {
                return "<span class='stringvalue'>" + param + " </span>";
            }


        }
        function update(data, keys, value) {
            if (keys.length === 0) {
                // Leaf node
                return value;
            }

            let key = keys.shift();
            if (!key) {
                data = data || [];
                if (Array.isArray(data)) {
                    key = data.length;
                }
            }

            // Try converting key to a numeric value
            let index = +key;
            if (!isNaN(index)) {
                // We have a numeric index, make data a numeric array
                // This will not work if this is a associative array 
                // with numeric keys
                data = data || [];
                key = index;
            }

            // If none of the above matched, we have an associative array
            data = data || {};

            let val = update(data[key], keys, value);
            data[key] = val;

            return data;
        }

        function serializeForm(form) {
            return Array.from((new FormData(form)).entries())
                .reduce((data, [field, value]) => {
                    let [_, prefix, keys] = field.match(/^([^\[]+)((?:\[[^\]]*\])*)/);

                    if (keys) {
                        keys = Array.from(keys.matchAll(/\[([^\]]*)\]/g), m => m[1]);
                        value = update(data[prefix], keys, value);
                    }
                    data[prefix] = value;
                    return data;
                }, {});
        }
        function sendRequest(e) {
            if (e.target.disabled) {
                return;
            }
            e.target.disabled = true
            const Http = new XMLHttpRequest();
            var url = document.getElementsByClassName("routelistitem active")[0].getAttribute("data-uri").trim();
            const method = document.getElementsByClassName("routelistitem active")[0].getAttribute("data-method").trim()
            document.getElementById("resultstatus").innerHTML = "SENDING"
            Http.onreadystatechange = function () {
                document.getElementById("resultstatus").innerHTML = this.status + "<span>" + this.statusText + "</sapn>"
                if (this.status < 300) {
                    document.getElementById("resultstatus").className = "statussuccess"
                }
                else {
                    document.getElementById("resultstatus").className = "statusdanger"
                }
                let rshow = ''
                try {
                    rshow = jToh(JSON.parse(Http.responseText));
                }
                catch (error) {
                    rshow = Http.responseText;
                }
                document.getElementById("result").innerHTML = rshow;
                var headers = this.getAllResponseHeaders()
                headers = headers.replace(/: /g, "</td> <td>")
                headers = headers.replace(/\n/g, "</td></tr><tr><td>");
                document.getElementById("resultheader").innerHTML =
                    "<table><tbody><tr><td>" + headers + "</td></tr></tbody></table>"
                e.target.disabled = false

            }

            let helement = document.getElementById("formurlparams");
            let urlparams = new FormData();
            if (helement) {
                urlparams = new FormData(helement);
                urlparams.forEach((v, k) => {
                    url = url.replace("{" + k.trim() + "}", v)
                })
            }

            helement = document.getElementById("formoptional")
            if (helement) {
                urlparams = new FormData(helement)
                urlparams.forEach((v, k) => {
                    let r = new RegExp('(/?)\\{' + k + '\\?\\}', 'g')
                    url = url.replace(r, v ? '$1' + v : '')
                })
            }

            var queryParams = {}
            helement = document.getElementById("queryParams")
            if (helement) {
                let params = new FormData(helement)
                params.forEach((v, k) => {
                    queryParams[k] = v
                })
            }
            var bodyParams = {}
            helement = document.getElementById("bodyParams")
            if (helement) {
                let params = new FormData(helement)
                bodyParams = serializeForm(helement)
            }
            let sp = new URLSearchParams(queryParams);
            urlquery = sp && ("?" + sp)
            Http.open(method, url + urlquery);
            if (document.getElementsByClassName('selected')[0].innerHTML.trim() == "API") {
                var ks = document.getElementsByClassName('requestheaderkey')
                var vs = document.getElementsByClassName('requestheadervalue')
                for (let i = 0; i < ks.length; i++) {
                    if (vs[i].getAttribute('data-value').includes("testertoken")) {
                        var v = vs[i].value;
                        localStorage.setItem(vs[i].name, v)
                        Http.setRequestHeader(ks[i].innerHTML, vs[i].getAttribute('data-value').replace("testertoken", v));
                    } else {
                        Http.setRequestHeader(ks[i].innerHTML, vs[i].value);
                    }
                }
            }
            Http.setRequestHeader("X-CSRF-TOKEN", "{{ csrf_token() }}");
            Http.send(JSON.stringify(bodyParams));
        };
    </script>
</body>

</html>