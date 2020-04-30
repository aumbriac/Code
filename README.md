# Caesarian-Shift-Cipher-API
This API allows users to encode messages with a shift cipher.

1) Download a platform for API development, such as Postman
2) Put the api folder on your localhost
3) Open Postman (or API development platform of your choice)
4) Set Request Headers: "Content-Type" must be set to "application/json"
5) Submit a POST request to http://localhost/api/encode/ (utilizes a static string) or http://localhost/api/ascii (utilizes ASCII) in JSON format with two keys, "Shift" and "Message", which are an integer and string, respectively. 
Example raw JSON POST Body:
`
{
	"Shift": 3,
	"Message": "Love"	
}
`
Output: 
`
{
	"EncodedMessage": "Oryh"
}
`

You can also test the API by making a POST request to https://anthonyumbriac.com/code/api/encode/ or https://anthonyumbriac.com/code/api/ascii/ with the above parameters.
