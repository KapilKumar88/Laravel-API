# Authentication


## Register


This endpoint helps you to register the user in the
application by entering the email, name, password

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/v1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"voluptatem","email":"jrodriguez@example.com","password":"eius"}'

```

```javascript
const url = new URL(
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
}).then(response => response.json());
```


> Example response (201, On success):

```json
{
    "success": true,
    "message": "User registered successfully",
    "data": {
        "name": "client",
        "email": "client@mail.com",
        "updated_at": "2021-02-14 14:15:49",
        "created_at": "2021-02-14 14:15:49",
        "id": 23
    }
}
```
> Example response (422, Validation error):

```json
{
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
}
```
> Example response (500, Internal server error):

```json
{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}
```
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


## Login


This api endpoint help Login user to application by entering the email
and password

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/v1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"email":"harvey.brenda@example.org","password":"repudiandae"}'

```

```javascript
const url = new URL(
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
}).then(response => response.json());
```


> Example response (200, On success):

```json
{
    "success": true,
    "message": "Login successfull",
    "data": {
        "token": "2|Vltso7paTw28uJ0BXtSuaEDVOTTC9Ro08jVvwjqn"
    }
}
```
> Example response (422, Validation error):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The E-Mail Address field is required."
        ],
        "password": [
            "The Password field is required."
        ]
    }
}
```
> Example response (401, Unauthorized):

```json
{
    "success": false,
    "message": "Credentials does not match"
}
```
> Example response (404, Not found):

```json
{
    "success": false,
    "message": "User does not exists"
}
```
> Example response (500, Internal server error):

```json
{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}
```
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


## Logout

<small class="badge badge-darkred">requires authentication</small>

This api endpoint revoke the access token provides by login api

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/logout" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```


> Example response (200, On success):

```json
{
    "success": true,
    "message": "Logout successfully"
}
```
> Example response (503, Service Unavailable):

```json
{
    "success": false,
    "message": "Something went wrong plrase try again."
}
```
> Example response (500, Internal server error):

```json
{
    "success": false,
    "message": "Internal server error.",
    "error_id": "7c4a15e1-7b8a-4556-a1f4-e8fa7fed71d2"
}
```
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
</form>



