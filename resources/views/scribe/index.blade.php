<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">
    <script src="{{ asset("vendor/scribe/js/theme-default-3.15.0.js") }}"></script>

    <link rel="stylesheet"
          href="//unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="//unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>

    <script src="//cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script>
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.15.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;php&quot;,&quot;python&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
                            <a href="#" data-language-name="php">php</a>
                            <a href="#" data-language-name="python">python</a>
                            <a href="#" data-language-name="javascript">javascript</a>
                    </div>
        <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>

    <ul id="toc">
    </ul>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: November 10 2021</li>
        </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1>Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1>Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="cidade">Cidade</h1>

    

            <h2 id="cidade-GETapi-cidades">Listar cidades</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-cidades">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/cidades" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/cidades',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/cidades'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/cidades"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-GETapi-cidades">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;nome&quot;: &quot;Abadia dos Dourados&quot;,
            &quot;estado_sigla&quot;: &quot;MG&quot;,
            &quot;created_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;nome&quot;: &quot;Abaet&eacute;&quot;,
            &quot;estado_sigla&quot;: &quot;MG&quot;,
            &quot;created_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;nome&quot;: &quot;Abre Campo&quot;,
            &quot;estado_sigla&quot;: &quot;MG&quot;,
            &quot;created_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;nome&quot;: &quot;Acaiaca&quot;,
            &quot;estado_sigla&quot;: &quot;MG&quot;,
            &quot;created_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-09T05:24:45.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-cidades" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-cidades"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-cidades"></code></pre>
</span>
<span id="execution-error-GETapi-cidades" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-cidades"></code></pre>
</span>
<form id="form-GETapi-cidades" data-method="GET"
      data-path="api/cidades"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-cidades', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-cidades"
                    onclick="tryItOut('GETapi-cidades');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-cidades"
                    onclick="cancelTryOut('GETapi-cidades');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-cidades" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/cidades</code></b>
        </p>
                    </form>

        <h1 id="endereco">Endereço</h1>

    

            <h2 id="endereco-GETapi-enderecos">Listar endereços</h2>

<p>
</p>

<p>Retonar todos os registros do banco</p>

<span id="example-requests-GETapi-enderecos">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/enderecos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/enderecos',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/enderecos'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/enderecos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-GETapi-enderecos">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;logradouro&quot;: &quot;Versiani Andrade Alvares&quot;,
            &quot;numero&quot;: &quot;71&quot;,
            &quot;bairro&quot;: &quot;Ferreira&quot;,
            &quot;cidade_id&quot;: 6,
            &quot;created_at&quot;: &quot;2021-11-10T05:58:42.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-10T06:04:14.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;logradouro&quot;: &quot;Francisco Veritas Jos&eacute;&quot;,
            &quot;numero&quot;: &quot;555&quot;,
            &quot;bairro&quot;: &quot;Candida Camara&quot;,
            &quot;cidade_id&quot;: 2,
            &quot;created_at&quot;: &quot;2021-11-10T05:59:43.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-10T05:59:43.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;logradouro&quot;: &quot;Viera Tavares Jos&eacute;&quot;,
            &quot;numero&quot;: &quot;555&quot;,
            &quot;bairro&quot;: &quot;Alto S&atilde;o Jo&atilde;o&quot;,
            &quot;cidade_id&quot;: 5,
            &quot;created_at&quot;: &quot;2021-11-10T06:00:33.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2021-11-10T06:00:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-enderecos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-enderecos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-enderecos"></code></pre>
</span>
<span id="execution-error-GETapi-enderecos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-enderecos"></code></pre>
</span>
<form id="form-GETapi-enderecos" data-method="GET"
      data-path="api/enderecos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-enderecos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-enderecos"
                    onclick="tryItOut('GETapi-enderecos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-enderecos"
                    onclick="cancelTryOut('GETapi-enderecos');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-enderecos" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/enderecos</code></b>
        </p>
                    </form>

            <h2 id="endereco-DELETEapi-enderecos--id-">Excluir endereço</h2>

<p>
</p>

<p>Excluir um endereço</p>

<span id="example-requests-DELETEapi-enderecos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/enderecos/8" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;delete(
    'http://localhost:8000/api/enderecos/8',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/enderecos/8'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('DELETE', url, headers=headers)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/enderecos/8"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-DELETEapi-enderecos--id-">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>[Empty response]</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Endereco] 3&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEapi-enderecos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-enderecos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-enderecos--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-enderecos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-enderecos--id-"></code></pre>
</span>
<form id="form-DELETEapi-enderecos--id-" data-method="DELETE"
      data-path="api/enderecos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-enderecos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-enderecos--id-"
                    onclick="tryItOut('DELETEapi-enderecos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-enderecos--id-"
                    onclick="cancelTryOut('DELETEapi-enderecos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-enderecos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/enderecos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-enderecos--id-"
               value="8"
               data-component="url" hidden>
    <br>
<p>O id do endereço</p>
            </p>
                    </form>

            <h2 id="endereco-POSTapi-enderecos">Criar endereço</h2>

<p>
</p>

<p>Cria uma novo endereço</p>

<span id="example-requests-POSTapi-enderecos">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/enderecos" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"logradouro\": \"Gabriel H3rtz Seiscentos e Sessenta e Oito\",
    \"numero\": \"255\",
    \"bairro\": \"São José\",
    \"cidade_id\": 1
}"
</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;post(
    'http://localhost:8000/api/enderecos',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'logradouro' =&gt; 'Gabriel H3rtz Seiscentos e Sessenta e Oito',
            'numero' =&gt; '255',
            'bairro' =&gt; 'São José',
            'cidade_id' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/enderecos'
payload = {
    "logradouro": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "numero": "255",
    "bairro": "São José",
    "cidade_id": 1
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('POST', url, headers=headers, json=payload)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/enderecos"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "logradouro": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "numero": "255",
    "bairro": "São José",
    "cidade_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-POSTapi-enderecos">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;logradouro&quot;: &quot;Versiani Andrade Alvares&quot;,
        &quot;numero&quot;: &quot;71&quot;,
        &quot;bairro&quot;: &quot;Ferreira&quot;,
        &quot;cidade_id&quot;: 6,
        &quot;created_at&quot;: &quot;2021-11-10T05:58:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-10T06:04:14.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;logradouro&quot;: [
            &quot;The logradouro field is required.&quot;,
            &quot;The logradouro must be a string.&quot;,
            &quot;The logradouro must not be greater than 191 characters.&quot;
        ],
        &quot;numero&quot;: [
            &quot;The numero field is required.&quot;,
            &quot;The numero must be a string.&quot;,
            &quot;The numero must not be greater than 191 characters.&quot;
        ],
        &quot;bairro&quot;: [
            &quot;The bairro field is required.&quot;,
            &quot;The bairro must be a string.&quot;,
            &quot;The bairro must not be greater than 191 characters.&quot;
        ],
        &quot;cidade_id&quot;: [
            &quot;The selected cidade id is invalid.&quot;,
            &quot;The cidade id must be an integer.&quot;,
            &quot;The cidade id must be at least 1.&quot;,
            &quot;The cidade id field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-enderecos" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-enderecos"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-enderecos"></code></pre>
</span>
<span id="execution-error-POSTapi-enderecos" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-enderecos"></code></pre>
</span>
<form id="form-POSTapi-enderecos" data-method="POST"
      data-path="api/enderecos"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-enderecos', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-enderecos"
                    onclick="tryItOut('POSTapi-enderecos');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-enderecos"
                    onclick="cancelTryOut('POSTapi-enderecos');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-enderecos" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/enderecos</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>logradouro</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="logradouro"
               data-endpoint="POSTapi-enderecos"
               value="Gabriel H3rtz Seiscentos e Sessenta e Oito"
               data-component="body" hidden>
    <br>
<p>Logradouro do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>numero</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="numero"
               data-endpoint="POSTapi-enderecos"
               value="255"
               data-component="body" hidden>
    <br>
<p>Número do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="bairro"
               data-endpoint="POSTapi-enderecos"
               value="São José"
               data-component="body" hidden>
    <br>
<p>Bairro do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>cidade_id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="cidade_id"
               data-endpoint="POSTapi-enderecos"
               value="1"
               data-component="body" hidden>
    <br>
<p>ID da cidade. Must be at least 1.</p>
        </p>
        </form>

            <h2 id="endereco-GETapi-enderecos--id-">Detalhar endereço</h2>

<p>
</p>

<p>Retorna os dados do endereço</p>

<span id="example-requests-GETapi-enderecos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/enderecos/15" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost:8000/api/enderecos/15',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/enderecos/15'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/enderecos/15"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-GETapi-enderecos--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Endereco] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;logradouro&quot;: &quot;Versiani Andrade Alvares&quot;,
        &quot;numero&quot;: &quot;71&quot;,
        &quot;bairro&quot;: &quot;Ferreira&quot;,
        &quot;cidade_id&quot;: 6,
        &quot;created_at&quot;: &quot;2021-11-10T05:58:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-10T06:04:14.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-enderecos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-enderecos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-enderecos--id-"></code></pre>
</span>
<span id="execution-error-GETapi-enderecos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-enderecos--id-"></code></pre>
</span>
<form id="form-GETapi-enderecos--id-" data-method="GET"
      data-path="api/enderecos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-enderecos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-enderecos--id-"
                    onclick="tryItOut('GETapi-enderecos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-enderecos--id-"
                    onclick="cancelTryOut('GETapi-enderecos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-enderecos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/enderecos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-enderecos--id-"
               value="15"
               data-component="url" hidden>
    <br>
<p>O id do endereço</p>
            </p>
                    </form>

            <h2 id="endereco-PUTapi-enderecos--id-">Atualizar endereço</h2>

<p>
</p>

<p>Atualiza os dados do endereço</p>

<span id="example-requests-PUTapi-enderecos--id-">
<blockquote>Example request:</blockquote>


<pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/enderecos/20" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"logradouro\": \"Gabriel H3rtz Seiscentos e Sessenta e Oito\",
    \"numero\": \"255\",
    \"bairro\": \"São José\",
    \"cidade_id\": 1
}"
</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;put(
    'http://localhost:8000/api/enderecos/20',
    [
        'headers' =&gt; [
            'Content-Type' =&gt; 'application/json',
            'Accept' =&gt; 'application/json',
        ],
        'json' =&gt; [
            'logradouro' =&gt; 'Gabriel H3rtz Seiscentos e Sessenta e Oito',
            'numero' =&gt; '255',
            'bairro' =&gt; 'São José',
            'cidade_id' =&gt; 1,
        ],
    ]
);
$body = $response-&gt;getBody();
print_r(json_decode((string) $body));</code></pre>

<pre><code class="language-python">import requests
import json

url = 'http://localhost:8000/api/enderecos/20'
payload = {
    "logradouro": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "numero": "255",
    "bairro": "São José",
    "cidade_id": 1
}
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('PUT', url, headers=headers, json=payload)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/enderecos/20"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "logradouro": "Gabriel H3rtz Seiscentos e Sessenta e Oito",
    "numero": "255",
    "bairro": "São José",
    "cidade_id": 1
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
</span>

<span id="example-responses-PUTapi-enderecos--id-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Endereco] 3&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;logradouro&quot;: &quot;Versiani Andrade Alvares&quot;,
        &quot;numero&quot;: &quot;71&quot;,
        &quot;bairro&quot;: &quot;Ferreira&quot;,
        &quot;cidade_id&quot;: 6,
        &quot;created_at&quot;: &quot;2021-11-10T05:58:42.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2021-11-10T06:04:14.000000Z&quot;
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (422):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;The given data was invalid.&quot;,
    &quot;errors&quot;: {
        &quot;logradouro&quot;: [
            &quot;The logradouro field must have a value.&quot;,
            &quot;The logradouro must be a string.&quot;,
            &quot;The logradouro must not be greater than 191 characters.&quot;
        ],
        &quot;numero&quot;: [
            &quot;The numero field must have a value.&quot;,
            &quot;The numero must be a string.&quot;,
            &quot;The numero must not be greater than 191 characters.&quot;
        ],
        &quot;bairro&quot;: [
            &quot;The bairro field must have a value.&quot;,
            &quot;The bairro must be a string.&quot;,
            &quot;The bairro must not be greater than 191 characters.&quot;
        ],
        &quot;cidade_id&quot;: [
            &quot;The cidade id field must have a value.&quot;,
            &quot;The cidade id must be an integer.&quot;,
            &quot;The cidade id must be at least 1.&quot;,
            &quot;The cidade id field is required.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-enderecos--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-enderecos--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-enderecos--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-enderecos--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-enderecos--id-"></code></pre>
</span>
<form id="form-PUTapi-enderecos--id-" data-method="PUT"
      data-path="api/enderecos/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-enderecos--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-enderecos--id-"
                    onclick="tryItOut('PUTapi-enderecos--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-enderecos--id-"
                    onclick="cancelTryOut('PUTapi-enderecos--id-');" hidden>Cancel
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-enderecos--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/enderecos/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/enderecos/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-enderecos--id-"
               value="20"
               data-component="url" hidden>
    <br>
<p>O id do endereço</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>logradouro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="logradouro"
               data-endpoint="PUTapi-enderecos--id-"
               value="Gabriel H3rtz Seiscentos e Sessenta e Oito"
               data-component="body" hidden>
    <br>
<p>Logradouro do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>numero</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="numero"
               data-endpoint="PUTapi-enderecos--id-"
               value="255"
               data-component="body" hidden>
    <br>
<p>Número do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>bairro</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="bairro"
               data-endpoint="PUTapi-enderecos--id-"
               value="São José"
               data-component="body" hidden>
    <br>
<p>Bairro do endereço. Must not be greater than 191 characters.</p>
        </p>
                <p>
            <b><code>cidade_id</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="cidade_id"
               data-endpoint="PUTapi-enderecos--id-"
               value="1"
               data-component="body" hidden>
    <br>
<p>ID da cidade. Must be at least 1.</p>
        </p>
        </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="php">php</a>
                                    <a href="#" data-language-name="python">python</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var exampleLanguages = ["bash","php","python","javascript"];
        setupLanguages(exampleLanguages);
    });
</script>
</body>
</html>