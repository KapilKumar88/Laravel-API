# User


## Profile

<small class="badge badge-darkred">requires authentication</small>

Show user profile

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/user" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```


> Example response (200, On success):

```json
{
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
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
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



