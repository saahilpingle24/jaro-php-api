A PHP implementation of Jaro Winkler distance algorithm exposed as an API.
Didn't use any off the shelf frameworks for creating the API; HTTP verb and basic error handling done in vanilla php.

Rename .env.example to .env
Provide DB details in the .env file

run composer install in the project root directory.

API test endpoint providing sample response
GET /v1/test

API endpoint for generating access key
GET /v1/register
Response
{"error":"false","access_key":"6a4b15612c64814fcc8aad182a246825"}

API endpoint for application consumption
GET /v1/alias?name=martha&alias=marhta&key=yout_api_key
Response
{"error":"false","response":{"name":"martha","comparisons":{"marhta":0.96}}}
