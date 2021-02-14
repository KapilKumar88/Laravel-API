<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/style.css") }}" media="screen" />
        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/print.css") }}" media="print" />
        <script src="{{ asset("vendor/scribe/js/all.js") }}"></script>

        <link rel="stylesheet" href="{{ asset("vendor/scribe/css/highlight-darcula.css") }}" media="" />
        <script src="{{ asset("vendor/scribe/js/highlight.pack.js") }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>

</head>

<body class="" data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">
<a href="#" id="nav-button">
      <span>
        NAV
            <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="-image" class=""/>
      </span>
</a>
<div class="tocify-wrapper">
                <div class="lang-selector">
                            <a href="#" data-language-name="bash">bash</a>
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
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI (Swagger) spec</a></li>
                            <li><a href='http://github.com/knuckleswtf/scribe'>Documentation powered by Scribe ✍</a></li>
                    </ul>
            <ul class="toc-footer" id="last-updated">
            <li>Last updated: February 14 2021</li>
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
<pre><code class="language-yaml">http://127.0.0.1:8000/</code></pre><h1>Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p><h1>Authentication</h1>
<h2>Register</h2>
<p>This endpoint helps you to register the user in the
application by entering the email, name, password</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"voluptatem","email":"jrodriguez@example.com","password":"eius"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatem",
    "email": "jrodriguez@example.com",
    "password": "eius"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (201, On success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "name": "client",
        "email": "client@mail.com",
        "updated_at": "2021-02-14 14:15:49",
        "created_at": "2021-02-14 14:15:49",
        "id": 23
    }
}</code></pre>
<blockquote>
<p>Example response (422, Validation error):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "name": [
            "The name field is required."
        ],
        "email": [
            "The E-Mail Address field is required."
        ],
        "password": [
            "The Password field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-POSTapi-v1-register" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-register"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-register"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-register"></code></pre>
</div>
<form id="form-POSTapi-v1-register" data-method="POST" data-path="api/v1/register" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-register', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/register</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="name" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
</p>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-register" data-component="body" required  hidden>
<br>
</p>

</form>
<h2>Login</h2>
<p>This api endpoint help Login user to application by entering the email
and password</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"harvey.brenda@example.org","password":"repudiandae"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "harvey.brenda@example.org",
    "password": "repudiandae"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Login successfull",
    "data": {
        "token": "2|Vltso7paTw28uJ0BXtSuaEDVOTTC9Ro08jVvwjqn"
    }
}</code></pre>
<blockquote>
<p>Example response (422, Validation error):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The E-Mail Address field is required."
        ],
        "password": [
            "The Password field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Credentials does not match"
}</code></pre>
<blockquote>
<p>Example response (404, Not found):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "User does not exists"
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-POSTapi-v1-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-login"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-login"></code></pre>
</div>
<form id="form-POSTapi-v1-login" data-method="POST" data-path="api/v1/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/login</code></b>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="email" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
The value must be a valid email address.</p>
<p>
<b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="password" data-endpoint="POSTapi-v1-login" data-component="body" required  hidden>
<br>
</p>

</form>
<h2>Logout</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This api endpoint revoke the access token provides by login api</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/logout"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Logout successfully"
}</code></pre>
<blockquote>
<p>Example response (503, Service Unavailable):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Something went wrong plrase try again."
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-GETapi-v1-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-logout"></code></pre>
</div>
<div id="execution-error-GETapi-v1-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-logout"></code></pre>
</div>
<form id="form-GETapi-v1-logout" data-method="GET" data-path="api/v1/logout" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/logout</code></b>
</p>
<p>
<label id="auth-GETapi-v1-logout" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-logout" data-component="header"></label>
</p>
</form><h1>Task</h1>
<h2>Task List</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This API endpoint is used to get the list of all
task created by the user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/task" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/task"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On Success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Tasks retrived successfully",
    "data": [
        {
            "id": 1,
            "user_id": 20,
            "title": "Sit.",
            "description": "I wonder what they said. The executioner's.",
            "status": "IN_PROGRESS",
            "created_at": "2021-02-14 13:49:55",
            "updated_at": "2021-02-14 13:49:55"
        },
        {
            "id": 16,
            "user_id": 20,
            "title": "Maiores.",
            "description": "March Hare. The Hatter opened his eyes very wide on hearing this.",
            "status": "OPEN",
            "created_at": "2021-02-14 13:49:56",
            "updated_at": "2021-02-14 13:49:56"
        },
        {
            "id": 29,
            "user_id": 20,
            "title": "Id.",
            "description": "Duchess. 'Everything's got a moral, if only you can have no answers.' 'If you please.",
            "status": "OPEN",
            "created_at": "2021-02-14 13:49:57",
            "updated_at": "2021-02-14 13:49:57"
        },
        {
            "id": 71,
            "user_id": 20,
            "title": "Incidunt maiores.",
            "description": "Queen, 'and he shall tell you my.",
            "status": "CLOSE",
            "created_at": "2021-02-14 13:50:00",
            "updated_at": "2021-02-14 13:50:00"
        },
        {
            "id": 96,
            "user_id": 20,
            "title": "Asperiores.",
            "description": "Dormouse sulkily remarked, 'If you can't be civil, you'd better leave off,' said the youth, 'as I mentioned.",
            "status": "IN_PROGRESS",
            "created_at": "2021-02-14 13:50:02",
            "updated_at": "2021-02-14 13:50:02"
        }
    ]
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (404, Not found):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Fail"
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-GETapi-v1-task" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-task"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-task"></code></pre>
</div>
<div id="execution-error-GETapi-v1-task" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-task"></code></pre>
</div>
<form id="form-GETapi-v1-task" data-method="GET" data-path="api/v1/task" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-task', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/task</code></b>
</p>
<p>
<label id="auth-GETapi-v1-task" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-task" data-component="header"></label>
</p>
</form>
<h2>Create Task</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This API endpoint is used to create the task</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "http://127.0.0.1:8000/api/v1/task" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"necessitatibus","description":"maiores","status":"eligendi"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/task"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "necessitatibus",
    "description": "maiores",
    "status": "eligendi"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On Success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Task created successfully",
    "data": {
        "title": "Sit",
        "description": "I wonder what they said. The executioner's.",
        "status": "OPEN",
        "user_id": 20,
        "updated_at": "2021-02-14 14:50:31",
        "created_at": "2021-02-14 14:50:31",
        "id": 101
    }
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (422, Validation errors):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "title": [
            "The Title field is required."
        ],
        "description": [
            "The Description field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-POSTapi-v1-task" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTapi-v1-task"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-task"></code></pre>
</div>
<div id="execution-error-POSTapi-v1-task" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-task"></code></pre>
</div>
<form id="form-POSTapi-v1-task" data-method="POST" data-path="api/v1/task" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-task', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>api/v1/task</code></b>
</p>
<p>
<label id="auth-POSTapi-v1-task" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="POSTapi-v1-task" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="title" data-endpoint="POSTapi-v1-task" data-component="body" required  hidden>
<br>
Title of the task</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="description" data-endpoint="POSTapi-v1-task" data-component="body" required  hidden>
<br>
Description of the task</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="status" data-endpoint="POSTapi-v1-task" data-component="body" required  hidden>
<br>
Status of the task and the value must be one of <code>open</code>, <code>in_progress</code>, or <code>close</code>.</p>

</form>
<h2>Show Task</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This API endpoint is used to show a particular task
of the user</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/task/11" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/11"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On Success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Task details fetched successfully",
    "data": {
        "id": 96,
        "user_id": 20,
        "title": "Asperiores.",
        "description": "Dormouse sulkily remarked, 'If you can't be civil, you'd better leave off,' said the youth, 'as I mentioned.",
        "status": "IN_PROGRESS",
        "created_at": "2021-02-14 13:50:02",
        "updated_at": "2021-02-14 13:50:02"
    }
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (404, Not found):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Task does not exists"
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-GETapi-v1-task--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-task--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-task--task-"></code></pre>
</div>
<div id="execution-error-GETapi-v1-task--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-task--task-"></code></pre>
</div>
<form id="form-GETapi-v1-task--task-" data-method="GET" data-path="api/v1/task/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-task--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/task/{task}</code></b>
</p>
<p>
<label id="auth-GETapi-v1-task--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-task--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="task" data-endpoint="GETapi-v1-task--task-" data-component="url" required  hidden>
<br>
The ID of the task.</p>
</form>
<h2>Edit/Update Task</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This API endpoint update the specific task details in storage.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "http://127.0.0.1:8000/api/v1/task/14" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"accusamus","description":"consequatur","status":"maxime"}'
</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/14"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "accusamus",
    "description": "consequatur",
    "status": "maxime"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (422, Validation errors):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "The given data was invalid.",
    "errors": {
        "title": [
            "The Title field is required."
        ],
        "description": [
            "The Description field is required."
        ]
    }
}</code></pre>
<blockquote>
<p>Example response (200, On Success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "Task details updated successfully"
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (404, Not found):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Task not found"
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-PUTapi-v1-task--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-PUTapi-v1-task--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-v1-task--task-"></code></pre>
</div>
<div id="execution-error-PUTapi-v1-task--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-v1-task--task-"></code></pre>
</div>
<form id="form-PUTapi-v1-task--task-" data-method="PUT" data-path="api/v1/task/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('PUTapi-v1-task--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-darkblue">PUT</small>
 <b><code>api/v1/task/{task}</code></b>
</p>
<p>
<small class="badge badge-purple">PATCH</small>
 <b><code>api/v1/task/{task}</code></b>
</p>
<p>
<label id="auth-PUTapi-v1-task--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="PUTapi-v1-task--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="task" data-endpoint="PUTapi-v1-task--task-" data-component="url" required  hidden>
<br>
The ID of the task.</p>
<h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
<p>
<b><code>title</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="title" data-endpoint="PUTapi-v1-task--task-" data-component="body"  hidden>
<br>
Title of the task</p>
<p>
<b><code>description</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
<input type="text" name="description" data-endpoint="PUTapi-v1-task--task-" data-component="body"  hidden>
<br>
Description of the task</p>
<p>
<b><code>status</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
<input type="text" name="status" data-endpoint="PUTapi-v1-task--task-" data-component="body" required  hidden>
<br>
Status of the task and the value must be one of <code>open</code>, <code>in_progress</code>, or <code>close</code>.</p>

</form>
<h2>Delete Task</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>This API endpoint delete the task</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "http://127.0.0.1:8000/api/v1/task/11" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/11"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On Success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Task deleted successfully"
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (404, Not found):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Task not found"
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<blockquote>
<p>Example response (503, Service unavailable):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Something went wrong please try again"
}</code></pre>
<div id="execution-results-DELETEapi-v1-task--task-" hidden>
    <blockquote>Received response<span id="execution-response-status-DELETEapi-v1-task--task-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-v1-task--task-"></code></pre>
</div>
<div id="execution-error-DELETEapi-v1-task--task-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-v1-task--task-"></code></pre>
</div>
<form id="form-DELETEapi-v1-task--task-" data-method="DELETE" data-path="api/v1/task/{task}" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('DELETEapi-v1-task--task-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-red">DELETE</small>
 <b><code>api/v1/task/{task}</code></b>
</p>
<p>
<label id="auth-DELETEapi-v1-task--task-" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="DELETEapi-v1-task--task-" data-component="header"></label>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>task</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="task" data-endpoint="DELETEapi-v1-task--task-" data-component="url" required  hidden>
<br>
The ID of the task.</p>
</form><h1>User</h1>
<h2>Profile</h2>
<p><small class="badge badge-darkred">requires authentication</small></p>
<p>Show user profile</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/v1/user"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre>
<blockquote>
<p>Example response (200, On success):</p>
</blockquote>
<pre><code class="language-json">{
    "success": true,
    "message": "User profile retrived successfully",
    "data": {
        "id": 20,
        "name": "Nathanael Brown",
        "email": "heath78@example.net",
        "email_verified_at": "2021-02-14T13:49:53.000000Z",
        "created_at": "2021-02-14 13:49:55",
        "updated_at": "2021-02-14 13:49:55"
    }
}</code></pre>
<blockquote>
<p>Example response (401, Unauthorized):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<blockquote>
<p>Example response (500, Internal server error):</p>
</blockquote>
<pre><code class="language-json">{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}</code></pre>
<div id="execution-results-GETapi-v1-user" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-v1-user"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-user"></code></pre>
</div>
<div id="execution-error-GETapi-v1-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-user"></code></pre>
</div>
<form id="form-GETapi-v1-user" data-method="GET" data-path="api/v1/user" data-authed="1" data-hasfiles="0" data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-user', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/v1/user</code></b>
</p>
<p>
<label id="auth-GETapi-v1-user" hidden>Authorization header: <b><code>Bearer </code></b><input type="text" name="Authorization" data-prefix="Bearer " data-endpoint="GETapi-v1-user" data-component="header"></label>
</p>
</form>
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                            </div>
            </div>
</div>
<script>
    $(function () {
        var languages = ["bash","javascript"];
        setupLanguages(languages);
    });
</script>
</body>
</html>