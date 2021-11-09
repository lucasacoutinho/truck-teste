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
        var baseUrl = "http://localhost";
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
            <li>Last updated: November 9 2021</li>
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
<pre><code class="language-yaml">http://localhost</code></pre>

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
    --get "http://localhost/api/cidades" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre>

<pre><code class="language-php">$client = new \GuzzleHttp\Client();
$response = $client-&gt;get(
    'http://localhost/api/cidades',
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

url = 'http://localhost/api/cidades'
headers = {
  'Content-Type': 'application/json',
  'Accept': 'application/json'
}

response = requests.request('GET', url, headers=headers)
response.json()</code></pre>

<pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/cidades"
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