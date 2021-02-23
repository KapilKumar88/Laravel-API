# Task


## Task List

<small class="badge badge-darkred">requires authentication</small>

This API endpoint is used to get the list of all
task created by the user

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/task" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
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
}).then(response => response.json());
```


> Example response (200, On Success):

```json
{
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
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
}
```
> Example response (404, Not found):

```json
{
    "success": false,
    "message": "Fail"
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


## Create Task

<small class="badge badge-darkred">requires authentication</small>

This API endpoint is used to create the task

> Example request:

```bash
curl -X POST \
    "http://127.0.0.1:8000/api/v1/task" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"ut","description":"et","status":"sed"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/v1/task"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "ut",
    "description": "et",
    "status": "sed"
}

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (200, On Success):

```json
{
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
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
}
```
> Example response (422, Validation errors):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "title": [
            "The Title field is required."
        ],
        "description": [
            "The Description field is required."
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


## Show Task

<small class="badge badge-darkred">requires authentication</small>

This API endpoint is used to show a particular task
of the user

> Example request:

```bash
curl -X GET \
    -G "http://127.0.0.1:8000/api/v1/task/17" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/17"
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


> Example response (200, On Success):

```json
{
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
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
}
```
> Example response (404, Not found):

```json
{
    "success": false,
    "message": "Task does not exists"
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


## Edit/Update Task

<small class="badge badge-darkred">requires authentication</small>

This API endpoint update the specific task details in storage.

> Example request:

```bash
curl -X PUT \
    "http://127.0.0.1:8000/api/v1/task/10" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"title":"ut","description":"fugit","status":"cupiditate"}'

```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/10"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "title": "ut",
    "description": "fugit",
    "status": "cupiditate"
}

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response => response.json());
```


> Example response (422, Validation errors):

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "title": [
            "The Title field is required."
        ],
        "description": [
            "The Description field is required."
        ]
    }
}
```
> Example response (200, On Success):

```json
{
    "success": true,
    "message": "Task details updated successfully"
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
}
```
> Example response (404, Not found):

```json
{
    "success": false,
    "message": "Task not found"
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


## Delete Task

<small class="badge badge-darkred">requires authentication</small>

This API endpoint delete the task

> Example request:

```bash
curl -X DELETE \
    "http://127.0.0.1:8000/api/v1/task/4" \
    -H "Authorization: Bearer {YOUR_AUTH_KEY}" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://127.0.0.1:8000/api/v1/task/4"
);

let headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response => response.json());
```


> Example response (200, On Success):

```json
{
    "success": false,
    "message": "Task deleted successfully"
}
```
> Example response (401, Unauthorized):

```json
{
    "message": "Unauthenticated."
}
```
> Example response (404, Not found):

```json
{
    "success": false,
    "message": "Task not found"
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
> Example response (503, Service unavailable):

```json
{
    "success": false,
    "message": "Something went wrong please try again"
}
```
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
</form>



