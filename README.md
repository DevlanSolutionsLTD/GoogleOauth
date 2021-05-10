# GoogleOauth Sign in users with GoogleOauth.

Google APIs use the OAuth 2.0 protocol for authentication and authorization. Google supports common OAuth 2.0 scenarios such as those for web server, client-side, installed, and limited-input device applications. <br>

To begin, obtain OAuth 2.0 client credentials from the <a target='_blank' href="https://console.developers.google.com/">Google API Console</a>. Then your client application requests an access token from the Google Authorization Server, extracts a token from the response, and sends the token to the Google API that you want to access. <br>

# How To Set Up

1. Obtain OAuth 2.0 credentials from the Google API Console. <br>

Visit the Google API Console to obtain OAuth 2.0 credentials such as a client ID and client secret that are known to both Google and your application. The set of values varies based on what type of application you are building. For example, a JavaScript application does not require a secret, but a web server application does. <br>

2. Obtain an access token from the Google Authorization Server. <br>

Before your application can access private data using a Google API, it must obtain an access token that grants access to that API. A single access token can grant varying degrees of access to multiple APIs. A variable parameter called scope controls the set of resources and operations that an access token permits. During the access-token request, your application sends one or more values in the scope parameter. <br>

There are several ways to make this request, and they vary based on the type of application you are building. For example, a JavaScript application might request an access token using a browser redirect to Google, while an application installed on a device that has no browser uses web service requests. <br>

Some requests require an authentication step where the user logs in with their Google account. After logging in, the user is asked whether they are willing to grant one or more permissions that your application is requesting. This process is called user consent. <br>

If the user grants at least one permission, the Google Authorization Server sends your application an access token (or an authorization code that your application can use to obtain an access token) and a list of scopes of access granted by that token. If the user does not grant the permission, the server returns an error. <br>

It is generally a best practice to request scopes incrementally, at the time access is required, rather than up front. For example, an app that wants to support saving an event to a calendar should not request Google Calendar access until the user presses the "Add to Calendar" button; see Incremental authorization. <br>

3. Examine scopes of access granted by the user. <br>

Compare the scopes included in the access token response to the scopes required to access features and functionality of your application dependent upon access to a related Google API. Disable any features of your app unable to function without access to the related API. <br>

The scope included in your request may not match the scope included in your response, even if the user granted all requested scopes. Refer to the documentation for each Google API for the scopes required for access. An API may map multiple scope string values to a single scope of access, returning the same scope string for all values allowed in the request. Example: the Google People API may return a scope of https://www.googleapis.com/auth/contacts when an app requested a user authorize a scope of https://www.google.com/m8/feeds/; the Google People API method people.updateContact requires a granted scope of https://www.googleapis.com/auth/contacts. <br>

4. Send the access token to an API. <br>

After an application obtains an access token, it sends the token to a Google API in an HTTP Authorization request header. It is possible to send tokens as URI query-string parameters, but we don't recommend it, because URI parameters can end up in log files that are not completely secure. Also, it is good REST practice to avoid creating unnecessary URI parameter names. Note that the query-string support will be deprecated on June 1st, 2021. <br>

Access tokens are valid only for the set of operations and resources described in the scope of the token request. For example, if an access token is issued for the Google Calendar API, it does not grant access to the Google Contacts API. You can, however, send that access token to the Google Calendar API multiple times for similar operations. <br>

5. Refresh the access token, if necessary. <br>
   Access tokens have limited lifetimes. If your application needs access to a Google API beyond the lifetime of a single access token, it can obtain a refresh token. A refresh token allows your application to obtain new access tokens. <br>

<hr>
For more information refer <a target="_blank" href="https://developers.google.com/identity/protocols/oauth2">Here</a>
